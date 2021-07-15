<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use DB;
use Carbon\Carbon;
use App\Newsletter;
use App\User;
use App\Tag;


class NewsletterController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'marketing'], ['except' => ['novedades', 'show', 'other_post_ajax', 'tags'] ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rollId = auth()->user()->roll_id;
        $userId = auth()->user()->id;

        if($rollId == 1){ // Administrativo ve todos los newsletter
            $newsletters = DB::table('newsletters')
                            ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
                            ->join('users', 'newsletters.user_id', '=', 'users.id', 'inner', false)
                            ->select('newsletters.id', 'newsletters.title', 'newsletters.published_at', 'newsletters.isDeleted', 'categories.name', 'newsletters.title as url', 'users.name as userName', 'users.lastName as userLastName')
                            ->orderby('newsletters.created_at', 'desc')
                            ->get();
        }else{

            $newsletters = DB::table('newsletters')
                            ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
                            ->join('users', 'newsletters.user_id', '=', 'users.id', 'inner', false)
                            ->select('newsletters.id', 'newsletters.title', 'newsletters.published_at', 'newsletters.isDeleted', 'categories.name', 'newsletters.title as url', 'users.name as userName', 'users.lastName as userLastName')
                            ->where("user_id", $userId)
                            ->orderby('newsletters.created_at', 'desc')
                            ->get();
        }
        
        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }

        return view('newsletter.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getCategories(0);
        
        $files = $this->getImagesURL();

        return view('newsletter.create', compact('categories', 'files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateNewsletter(true, request()->all())->validate();
        
        $file = $request->file('name_img');
        $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();

        $user_id = auth()->user()->id; 

        $newsletter = Newsletter::create([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'content' => $request->input('content-wysiwyg'),
            'user_id' => $user_id,
            'category_id' => $request->input('category'),
            'tags' => $request->input('tags'),
            'name_img' => $fileName
        ]);

        $tagIDs = $request->input("HiddenFielTag");
        if($tagIDs != ""){
            $arrIDs = explode(",", $tagIDs);
            foreach ($arrIDs as $value) {
                DB::table("newsletter_tags")->insert([
                    "id_newsletter" => $newsletter->id,
                    "id_tag" => $value
                ]);
            }
        }

        // Storage::putFileAs('newsletters/', $file, $fileName);
        $request->file('name_img')->storeAs('newsletters', $fileName, 'newsletter');

        $categories = $this->getCategories(0);
        
        // return view('newsletter.create', compact('categories'));
        $msgPost = "¡Registro realizado satisfactoriamente!.";
        $files = $this->getImagesURL();

        return view('newsletter.create', compact('categories', 'msgPost', 'files'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $name)
    {
        // #post1
        $newsletter = DB::table('newsletters')
                        ->join('categories', 'newsletters.category_id', '=', 'categories.id','inner', false)
                        ->join('users', 'users.id', '=', 'newsletters.user_id','inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.content', 'newsletters.tags', 'newsletters.name_img', 'newsletters.created_at', 'users.name as author', 'users.name as userName', 'users.lastName as userLastName', 'categories.id as category_id', 'categories.name as category', 'newsletters.summary', 'newsletters.published_at')
                        ->where('newsletters.id', $id)
                        ->first();

        $newsletter_top3 = DB::table('newsletters')
                        ->join('users', 'users.id', '=', 'newsletters.user_id','inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.name_img', 'newsletters.created_at', 'users.name as author', 'users.name as userName', 'users.lastName as userLastName', 'newsletters.summary', 'newsletters.title as url', 'newsletters.published_at')
                        ->where('newsletters.isDeleted', '0')
                        ->orderby('newsletters.published_at', 'desc')
                        ->take(3)
                        ->get();
        
        // $tmp = $newsletter->content;
        // $content_array = explode("\r\n", $tmp);
        $tmp = $newsletter->tags;
        $tags_array = explode(" ", $tmp);

        $categoryList = $this->getCatagoriesList();

        foreach($newsletter_top3 as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }

        $tags = $this->getTagsByNewsletter($id);
        
        return view('post', compact('newsletter', 'newsletter_top3', 'tags_array', 'categoryList', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rollId = auth()->user()->roll_id;
        $userId = auth()->user()->id;

        if($rollId == 1){ // Administrador
            $newsletter = Newsletter::where('id', $id)->first();
        }else{
            $newsletter = Newsletter::where('id', $id)
                ->where("user_id", $userId)
                ->first();
        }
        
        $categories = $this->getCategories(0);

        $tags = DB::table("newsletter_tags")
            ->join("tags", "tags.id", "=", "newsletter_tags.id_tag", "inner", false)
            ->select("newsletter_tags.id_tag  as value", "tags.name as text")
            ->where("id_newsletter", "$id")->get();
        // $_tags = [];
        // foreach ($tags as $value) {
        //     array_push($_tags, $value->id_tag);
        // }
        // $tags = implode(",", $_tags);
        // dd($tags);
        return view('newsletter.edit', compact('newsletter', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('name_img');

        if($file != null){
            $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();
        }

        $this->validateNewsletter(false, request()->all())->validate();

        $user_id = auth()->user()->id; 

        $newsletter = Newsletter::where('id', $id)->first();
        $newsletter->title = $request->input('title');
        $newsletter->summary = $request->input('summary');
        $newsletter->content = $request->input('content-wysiwyg');
        $newsletter->category_id = $request->input('category');
        $newsletter->tags = $request->input('tags');

        if($file != null){
            Storage::delete('newsletters/'. $request->input('hname_img'));
            // Storage::disk('newsletter')->delete('newsletters/'. $request->input('hname_img'));
            
            Storage::putFileAs('newsletters/', $file, $fileName);
            // Storage::disk('newsletter')->put('newsletters/', $file, $fileName);

            $newsletter->name_img = $fileName;
        }

        $newsletter->updated_at = Carbon::now();
        $newsletter->updated_by = $user_id;
        $newsletter->update();

        $msgPost = "¡Registro actualizado satisfactoriamente!.";

        $newsletters = DB::table('newsletters')
                        ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
                        ->join('users', 'newsletters.user_id', '=', 'users.id', 'inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.published_at', 'newsletters.isDeleted', 'categories.name', 'newsletters.title as url', 'users.name as userName', 'users.lastName as userLastName')
                        ->orderby('newsletters.created_at', 'desc')
                        ->get();
        
        $tagIDs = $request->input("HiddenFielTag");
        DB::table("newsletter_tags")
            ->where("id_newsletter", "=", $id)
            ->delete();
        if($tagIDs != ""){
            $arrIDs = explode(",", $tagIDs);
            foreach ($arrIDs as $value) {
                DB::table("newsletter_tags")->insert([
                    "id_newsletter" => $newsletter->id,
                    "id_tag" => $value
                ]);
            }
        }

        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }

        return view('newsletter.index', compact('newsletters', 'msgPost'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $_newsletter = Newsletter::where('id', $id)->first();

        $_newsletter->isDeleted = 1;
        $_newsletter->update();

        $newsletters = DB::table('newsletters')
                        ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
                        ->join('users', 'users.id', '=', 'newsletters.user_id','inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.created_at', 'newsletters.isDeleted', 'categories.name', 'newsletters.title as url', 'newsletters.published_at', 'users.name as userName', 'users.lastName as userLastName')
                        ->orderby('newsletters.created_at', 'desc')
                        ->get();

        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }
        return view('newsletter.index', compact('newsletters'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        
        $_newsletter = Newsletter::where('id', $id)->first();
        
        $_newsletter->isDeleted = 0;
        
        //valida que sea la primera vez que activa para setear la fecha de publicacion
        if($_newsletter->published_at == null){
            $_newsletter->published_at = Carbon::now();
        }

        $_newsletter->update();

        $newsletters = DB::table('newsletters')
                        ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
                        ->join('users', 'users.id', '=', 'newsletters.user_id','inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.created_at', 'newsletters.isDeleted', 'newsletters.published_at', 'categories.name', 'newsletters.title as url', 'users.name as userName', 'users.lastName as userLastName')
                        ->orderby('newsletters.created_at', 'desc')
                        ->get();
        
        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }

        $msgPost = "¡Registro activado satisfactoriamente!.";

        return view('newsletter.index', compact('newsletters', 'msgPost'));
    }

    public function validateNewsletter($isNew, array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        if($isNew){
            return Validator::make($data, [
                'title' => 'required|string',
                'summary' => 'required',
                'content-wysiwyg' => 'required|string',
                'category' => 'required',
                'name_img' => 'required'
            ], $messages);
        }else{
            return Validator::make($data, [
                'title' => 'required|string',
                'summary' => 'required',
                'content-wysiwyg' => 'required|string',
                'category' => 'required'
            ], $messages);
        }


    }

    public function getCategories($isDeleted){
        return DB::table('categories')
        ->where('isDeleted', $isDeleted)
        ->get();
    }

    public function novedades($category_id=0){
        // $newsletters = DB::table('newsletters')
        //                 ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
        //                 ->join('users', 'users.id', '=', 'newsletters.user_id')
        //                 ->select('newsletters.id', 'newsletters.title', 'newsletters.created_at', 'newsletters.isDeleted', 'newsletters.name_img', 'newsletters.content', 'categories.name', 'users.name as username')
        //                 ->where('newsletters.isDeleted', '0')
        //                 ->orderby('newsletters.created_at', 'desc')
        //                 ->get();
        
        if($category_id == 0){
            $allFields = false;
            $newsletters = DB::select('CALl sp_getNewsletter(?)', array($allFields));


            // dd($tags);  
        }else{
            $newsletters = DB::select('CALl sp_getNewsletterFilterByCategory(?)', array($category_id));
        }
        
        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }

        // dd($newsletters);
        $total_newsletters = DB::table('newsletters')
            ->where('newsletters.isDeleted', '0')
            ->count();
        
        $categoryList = $this->getCatagoriesList();
        
        $tags = $this->getTags();

        $hOptNewsletter = "NEWSLETTER";

        return view('novedades', compact('newsletters', 'categoryList', 'total_newsletters', 'tags', 'hOptNewsletter'));
    }

    // public function novedadesFilter($category_id){
    //     $newsletters = DB::select('CALl sp_getNewsletterFilterByCategory(?)', array($category_id));

    //     $categoryList = $this->getCatagoriesList();

    //     return view('novedades', compact('newsletters', 'categoryList'));

    // }

    public function getCatagoriesList(){
        return DB::select('CALl sp_getCatagoriesList()');   
    }

    public function other_post_ajax(Request $request){
        $hOptNewsletter = $request->input("hOptNewsletter");
        
        switch ($hOptNewsletter) {
            case 'NEWSLETTER':
                $allFields = true;
                $newsletters = DB::select('CALl sp_getNewsletter(?)', array($allFields));
                return $newsletters;
                break;
            
            case 'TAGS':
                $tag_id = $request->input("hTag_id");
                $allFields = true;
                $newsletters = DB::select('CALl sp_getNewsletterByTagId(?,?)', array($tag_id, $allFields));
                return $newsletters;
                break;
        }
    }

    public function tags($tag_id, $tag_name){

        $allFields = false;
        $newsletters = DB::select('CALL sp_getNewsletterByTagId(?, ?)', array($tag_id, $allFields));
        
        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }

        $total_newsletters = DB::table('newsletters')
            ->join("newsletter_tags", "newsletter_tags.id_newsletter", "=", "newsletters.id", "inner", false)
            ->where('newsletters.isDeleted', '0')
            ->where('newsletter_tags.id_tag', $tag_id)
            ->count();
        
        $categoryList = $this->getCatagoriesList();
        
        $tags = $this->getTags();

        $hOptNewsletter = "TAGS";
        $tag_id2 = $tag_id;
        
        return view('novedades', compact('newsletters', 'categoryList', 'total_newsletters', 'tags', 'hOptNewsletter', 'tag_id2'));
        
    }

    public function getTags(){
        // return DB::table("newsletter_tags")
        // ->join("tags", "tags.id", "=", "newsletter_tags.id_tag", "inner", false)
        // ->select("tags.id", "tags.name")
        // ->orderby("newsletter_tags.updated_at", "desc")
        // ->groupby("tags.name", "tags.id")
        // ->get();

        $tags = DB::select('CALl sp_getTags()');

        return $tags;
            
    }

    public function getTagsByNewsletter($id_newsletter){
        // return DB::table("newsletter_tags")
        // ->join("tags", "tags.id", "=", "newsletter_tags.id_tag", "inner", false)
        // ->select("tags.id", "tags.name")
        // ->orderby("newsletter_tags.updated_at", "desc")
        // ->where("newsletter_tags.id_newsletter", $id_newsletter)
        // ->groupby("tags.name", "tags.id")
        // ->get();

        
        $tags = DB::select('CALl sp_getTagsByNewsletterId(?)', array($id_newsletter));

        return $tags;
    }

    public function uploadimage(Request $request){
        
        try {
            $file = $request->file("image_link");

            if($file != null){
                $file_name = $file->getClientOriginalName();
                // Validar que no exista el archivo
                $exist = Storage::disk("newsletter")->exists("newsletters/images_links/" . $file_name);
                if($exist){
                    $result = array(
                        "result" => false,
                        "message" => "Ya existe un archivo con ese nombre"
                    );
                }else{
                    $file->storeAs("newsletters/images_links", $file_name, "newsletter");

                    $result = array(
                        "result" => true,
                        "message" => "Se guardo la imagen correctamente",
                        "file_name" => $file_name
                    );
                }

            }
            
        } catch (\Throwable $th) {
            //throw $th;
            $result = array(
                "result" => false,
                "message" => "Ocurrio un error subiendo la imagen, por favor verifique que la imagen no pesa mas de 2MB.".$th->getmessage()
            );
        }
        // dd($files);
        return $result;

    }

    public function getImagesURL(){

        $directory = "newsletters/images_links";
        $files = Storage::files($directory);

        return $files;
    }

    public function ledsget(){
        return view("led.getleds");
    }

    public function ledsdownload(Request $request){

        try {
            $opt = intval($request->input("gridRadios"));
            $arrayDetalle = [];

            switch ($opt) {
                case 1:
                    $users = DB::table('contacts')
                        ->where("form", 3)
                        ->get();
                    $fileName = "leds-newsletter.csv";
    
                    foreach ($users as $item){
                        // 'name' => ucfirst(strtolower(trim($item->nameContact)))." ". ucfirst(strtolower(trim($item->lastNameContact))),
                        $arrayDetalle[] = array(
                            'email' => $item->emailContact,
                            'created_at' => $item->created_at
                        );
                    }
    
                    //construyamos un arreglo para la información de las columnas
                    $columns = array('email', 'created_at');
                break;
                case 2:
                    $users = User::where("is_client", 1)
                        ->where("roll_id", 4)
                        ->get();
                    $fileName = "leds-clients.csv";
                    foreach ($users as $item){
                        $fecha = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
                        $arrayDetalle[] = array(
                            'name' => ucfirst($item->name)." ". ucfirst($item->lastName),
                            'email' => $item->email,
                            'created_at' => $fecha->toDateString()
                        );
                    }
                    $columns = array('name', 'email', 'created_at');

                    break;

                case  3:
                    $users = User::where("is_client", 0)
                        ->where("confirmed", 1)
                        ->where("roll_id", 2)
                        ->get();
                        $fileName = "leds-estandar.csv";
                        foreach ($users as $item){
                            $fecha = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
                            $arrayDetalle[] = array(
                                'name' => ucfirst($item->name)." ". ucfirst($item->lastName),
                                'email' => $item->email,
                                'created_at' => $fecha->toDateString()
                            );
                        }
                        $columns = array('name', 'email', 'created_at');

                    break;
                case  4:
                    $users = User::where("confirmed", 1)->get();
                    $fileName = "leds-all.csv";
                    foreach ($users as $item){
                        $fecha = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
                        $arrayDetalle[] = array(
                            'name' => ucfirst($item->name)." ". ucfirst($item->lastName),
                            'email' => $item->email,
                            'created_at' => $fecha->toDateString()
                        );
                    }
                    $columns = array('name', 'email', 'created_at');
                    break;

            }
    
            //El encabezado que le dice al explorador el tipo de archivo que estamos generando
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            
            $callback = function() use($arrayDetalle, $columns) {
                $BOM = "\xEF\xBB\xBF"; // UTF-8 BOM
                $file = fopen('php://output', 'w');
                
                fwrite($file, $BOM);
                fputcsv($file, $columns);
                foreach ($arrayDetalle as $item) {
                    fputcsv($file, $item);
                }
    
                fclose($file);
            };
            
            return response()->stream($callback, 200, $headers);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getmessage());
        }

    }

    public function getTypeContact($typeId){
        $result = "";

        switch ($typeId) {
            case 1:
                $result = "Contacto";
                break;
            case 2:
                $result = "Fabricacion";
                break;
        }

        return $result;
    }

}
