<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use DB;
use Carbon\Carbon;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['novedades', 'show', 'other_post_ajax'] ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = DB::table('newsletters')
                        ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.created_at', 'newsletters.isDeleted', 'categories.name', 'newsletters.title as url')
                        ->orderby('newsletters.created_at', 'desc')
                        ->get();
        
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

        return view('newsletter.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('name_img');
        $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();
        
        $this->validateNewsletter(request()->all())->validate();

        $user_id = auth()->user()->id; 

        $newsletter = Newsletter::create([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'content' => $request->input('content'),
            'user_id' => $user_id,
            'category_id' => $request->input('category'),
            'tags' => $request->input('tags'),
            'name_img' => $fileName
        ]);

        // Storage::putFileAs('newsletters/', $file, $fileName);
        $request->file('name_img')->storeAs('newsletters', $fileName, 'newsletter');

        $categories = $this->getCategories(0);
        
        // return view('newsletter.create', compact('categories'));
        $msgPost = "¡Registro realizado satisfactoriamente!.";
        return view('home', compact('msgPost'));
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
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.content', 'newsletters.tags', 'newsletters.name_img', 'newsletters.created_at', 'users.name as author', 'categories.id as category_id', 'categories.name as category', 'newsletters.summary')
                        ->where('newsletters.id', $id)
                        ->first();

        $newsletter_top3 = DB::table('newsletters')
                        ->join('users', 'users.id', '=', 'newsletters.user_id','inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.name_img', 'newsletters.created_at', 'users.name as author', 'newsletters.summary', 'newsletters.title as url')
                        ->where('newsletters.isDeleted', '0')
                        ->orderby('newsletters.created_at', 'desc')
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
        
        return view('post', compact('newsletter', 'newsletter_top3', 'tags_array', 'categoryList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = Newsletter::where('id', $id)->first();
        
        $categories = $this->getCategories(0);

        return view('newsletter.edit', compact('newsletter', 'categories'));
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

        $this->validateNewsletter(request()->all())->validate();

        $user_id = auth()->user()->id; 

        $newsletter = Newsletter::where('id', $id)->first();
        $newsletter->title = $request->input('title');
        $newsletter->summary = $request->input('summary');
        $newsletter->content = $request->input('content');
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

        return view('home');
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
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.created_at', 'newsletters.isDeleted', 'categories.name', 'newsletters.title as url')
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
        $_newsletter->update();

        $newsletters = DB::table('newsletters')
                        ->join('categories', 'categories.id', '=', 'newsletters.category_id', 'inner', false)
                        ->select('newsletters.id', 'newsletters.title', 'newsletters.created_at', 'newsletters.isDeleted', 'categories.name', 'newsletters.title as url')
                        ->orderby('newsletters.created_at', 'desc')
                        ->get();

        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }
        return view('newsletter.index', compact('newsletters'));
    }

    public function validateNewsletter(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'title' => 'required|string',
            'content' => 'required|string',
            'category' => 'required'
        ], $messages);
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
        }else{
            $newsletters = DB::select('CALl sp_getNewsletterFilterByCategory(?)', array($category_id));
        }
        
        foreach($newsletters as $row){
            $row->url =  str_replace(" ", "-", $row->url);
        }

        $total_newsletters = DB::table('newsletters')
            ->where('newsletters.isDeleted', '0')
            ->count();
        
        $categoryList = $this->getCatagoriesList();

        return view('novedades', compact('newsletters', 'categoryList', 'total_newsletters'));
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
        $allFields = true;
        $newsletters = DB::select('CALl sp_getNewsletter(?)', array($allFields));
        return $newsletters;
    }

}
