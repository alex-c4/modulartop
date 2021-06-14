<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use DB;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'administrative'], ['except' => ['ShowViewByVisualEfect', 'descriptionByProducto', 'showImagesByProduct', 'fichatecnica']]);
        // , 'showImagesByProduct', 'fichatecnica'
        // $this->middleware(['administrative'])->except('ShowViewByVisualEfect', 'descriptionByProducto');
        // $this->middleware('auth');
        // $this->middleware('administrative');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->getProducts();
            
        return view('product.index', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = DB::table("product_categories")->get();
        $product_types = DB::table("product_types")->get();
        $product_subcategory = DB::table("product_subcategory")->where("id_product_type", 1)->get();
        $product_subcategory_classification = DB::table("product_subcategory_classification")->get();
        
        return view('product.create', compact("product_categories", "product_types", "product_subcategory", "product_subcategory_classification"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $resultProduct = $this->addProduct($request);
        $msgPost = $resultProduct[0]["msg"];

        $product_categories = DB::table("product_categories")->get();
        $product_types = DB::table("product_types")->get();
        $product_subcategory = DB::table("product_subcategory")->where("id_product_type", 1)->get();
        $product_subcategory_classification = DB::table("product_subcategory_classification")->get();

        return view('product.create', compact("product_categories", "product_types", "product_subcategory", "product_subcategory_classification", "msgPost"));

    }

    public function storeajax(Request $request){

        try {
            $resultProduct = $this->addProduct($request);
    
            $result = array([
                "result" => true,
                "msgPost" => $resultProduct[0]["msg"],
                "data" => array([
                    "id" => $resultProduct[0]["id"],
                    "name" => $request->input("name")
                ])
            ]);
            return $result;
        } catch (\Throwable $th) {
            $result = array([
                "result" => false,
                "msgPost" => "Hubo un error en la operacion." . $th->getmessage()
            ]);
            return $result;
        }
    }

    public function addProduct($request){
        $this->validateProduct(request()->all())->validate();

        $result = DB::transaction(function() use($request){
            $product = Product::create([
                "code" => $request->input("code"),
                "name" => $request->input("name"),
                "id_product_category" => $request->input("category"),
                "id_product_type" => $request->input("type"),
                "id_subcategory_acabado" => $request->input("sub_acabado"),
                "id_subcategory_efecto_v" => $request->input("sub_efectov"),
                "id_subcategory_material" => $request->input("sub_material"),
                "id_subcategory_origen" => $request->input("sub_origen"),
                "id_subcategory_sustrato" => $request->input("sub_sustrato"),
                "id_subcategory_color" => $request->input("sub_color"),
                "description" => $request->input("description"),
                "price" => $request->input("price"),
                "img_product" => "",
                "pdf_file" => $request->input("pdf_file"),
                "created_at" => Carbon::now(),
                "created_by" => auth()->user()->id,
                "updated_at" => Carbon::now()
            ]);
    
            // Registro de imagenes subidas
            $cycles = 50;
            
            for ($i=1; $i < $cycles; $i++) { 
                if($request->file('image_'.$i) != null){
                    $file = request()->file('image_'.$i);
                    $fileName = $product->id."_". $file->getClientOriginalName();
    
                    $file->storeAs('image_products', $fileName, 'local');
    
                    DB::table('image_products')->insert([
                        "id_product" => $product->id,
                        "name" => $fileName
                    ]);
                }
            }
            
            // Guardar la imagen del producto
            $img_0 = $request->file('image_0');
            if($img_0 != null){
                $fileName = $product->id."_". $img_0->getClientOriginalName();
                $img_0->storeAs('image_products', $fileName, 'local');
                $product->img_product = $fileName;
            }
    
            // Registro de PDF
            $pdf_file = request()->file('pdf_file');
            if($pdf_file != null){
                $fileName = $product->id."_". $pdf_file->getClientOriginalName();
                $file->storeAs('', $fileName, 'fichaTecnica');
                $product->pdf_file = $fileName;
            }
            
            $product->save();
            
            $result = array([
                "msg" => "¡Registro realizado satisfactoriamente!.",
                "id" => $product->id
                ]);

            return $result;
        });

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $product_categories = DB::table("product_categories")->get();
        $product_types = DB::table("product_types")->get();
        $product_subcategory = DB::table("product_subcategory")->where("id_product_type", 1)->get();
        $product_subcategory_classification = DB::table("product_subcategory_classification")->get();

        $product_images = DB::table("image_products")->where("id_product", $id)->get();
        
        return view("product.edit", compact("product", "product_categories", "product_types", "product_subcategory", "product_subcategory_classification", "product_images"));
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
        $this->validateProduct_update(request()->all())->validate();

        $product = Product::find($id);

        $product->code = $request->input("code");
        $product->name = $request->input("name");
        $product->id_product_category = $request->input("category");
        $product->id_product_type = $request->input("type");
        $product->id_subcategory_acabado = $request->input("sub_acabado");
        $product->id_subcategory_efecto_v = $request->input("sub_efectov");
        $product->id_subcategory_material = $request->input("sub_material");
        $product->id_subcategory_origen = $request->input("sub_origen");
        $product->id_subcategory_sustrato = $request->input("sub_sustrato");
        $product->id_subcategory_color = $request->input("sub_color");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->updated_at = Carbon::now();

        // Registro de imagenes subidas
        $cycles = 50;

        //se actualiza imagen del producto
        $img_0 = $request->file('image_0');
        if($img_0 != null){
            $old_name = $product->img_product;
            if($old_name != ""){
                Storage::disk('local')->delete('image_products/' . $old_name);
            }
            $fileName = $product->id."_". $img_0->getClientOriginalName();
            $img_0->storeAs('image_products', $fileName, 'local');
            $product->img_product = $fileName;
        }
        
        for ($i=1; $i < $cycles; $i++) { 
            $image_file = $request->file('image_'.$i);
            if($image_file != null){
                $file = $image_file;

                $fileName = $product->id."_". $file->getClientOriginalName();
                
                $file->storeAs('image_products', $fileName, 'local');

                DB::table('image_products')->insert([
                    "id_product" => $product->id,
                    "name" => $fileName
                ]);
            }
        }

        // Registro de PDF
        $pdf_file = $request->file('pdf_file');
        if($pdf_file != null){
            if($product->pdf_file != ""){
                $f_delete = $product->pdf_file;
                Storage::disk('fichaTecnica')->delete($f_delete);
            }

            $fileName = $product->id."_". $pdf_file->getClientOriginalName();
            $pdf_file->storeAs('', $fileName, 'fichaTecnica');
            $product->pdf_file = $fileName;
        }

        $product->save();

        $msgPost = "¡Registro actualizado satisfactoriamente!.";

        $products = $this->getProducts();

        return view('product.index', compact("msgPost", "products"));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);

        $product->is_deleted = true;
        $product->save();

        $products = $this->getProducts();
        
        $msgPost = "El producto '" . $product->name . "' fue inactivado satisfactoriamente";

        return view('product.index', compact("products", "msgPost"));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $product = Product::find($id);

        $product->is_deleted = false;
        $product->save();

        $products = $this->getProducts();
        
        $msgPost = "El producto '" . $product->name . "' fue restaurado satisfactoriamente";

        return view('product.index', compact("products", "msgPost"));
    }

    /**
     * Obtiene la lista de Subcategoria y Tipo por clasificacion
     * 
     * @param opt
     * @param id
     */
    public function fillCombo(Request $request){

        $list = [];

        $opt = $request->input("opt");
        $id = $request->input("id");

        switch ($opt) {
            case 1:
                // Obtener subcategorias
                $list = DB::table("product_subcategory")->where("id_product_type", $id)->get();
                break;
            
            case 2:
                // Obtener tipo de clasificacion
                $list = DB::table("product_subcategory_classification")->where("id_product_subcategory", $id)->get();
                break;
        }

        return $list;

    }

    public function deleteimg(Request $request){
        try {
            $id = $request->input("id");
            $name = $request->input("name");
            $id_product = $request->input("id_product");
    
            //$item = DB::table("image_products")->find($id);
    
            // Borrar archivo del servidor
            Storage::disk('local')->delete('image_products/' . $name);
    
            // Borrar registro de la tabla "image_products"
            DB::table('image_products')->where('id', '=', $id)->delete();
    
            $product_images = DB::table("image_products")->where("id_product", $id_product)->get();

            $result = array(
                "result" => true,
                "data" => $product_images
            );

        } catch (\Throwable $th) {
            // $th->getMessage();
            $result = array(
                "result" => false,
                "data" => null
            );
        }

        return $result;
    }

    public function validateProduct(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'code' => 'required',
            'name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'sub_acabado' => 'required',
            'sub_efectov' => 'required',
            'sub_material' => 'required',
            'sub_origen' => 'required',
            'sub_sustrato' => 'required',
            'sub_color' => 'required',
            'description' => 'required',
            'image_0' => 'required',
            'price' => 'required'
        ], $messages);
    }

    public function validateProduct_update(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];
    
        return Validator::make($data, [
            'code' => 'required',
            'name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'sub_acabado' => 'required',
            'sub_efectov' => 'required',
            'sub_material' => 'required',
            'sub_origen' => 'required',
            'sub_sustrato' => 'required',
            'sub_color' => 'required',
            'description' => 'required',
            'price' => 'required'
        ], $messages);
    }

    public function getProducts(){
        return DB::table("products as p")
        ->select("p.id", 
                "p.code",
                "p.name as product_name",
                "pc.name as category_product_name",
                "pt.name as product_type_name",
                "p.is_deleted as product_isdeleted")
        ->join("product_categories as pc", "pc.id", "=", "p.id_product_category", "inner", false)
        ->join("product_types as pt", "pt.id", "=", "p.id_product_type", "inner", false)
        ->get();
    }

    public function ShowViewByVisualEfect($id){
        $IDsToGroup = array();
        $products = DB::select("CALL sp_getProductBy_product_subcategory_classification(?)", array($id));
        
        foreach($products as $product) {
            array_push($IDsToGroup, array(
                "id" => $product->id_subcategory_color, 
                "name" => $product->name_subcategory_color
            ));
        }
        $IDsToGroup = $this->unique_multidim_array($IDsToGroup, "id");

        // dd($IDsToGroup);

        
        $bannerBySubcategoryColor = $this->getBannerBySubcategoryColor($id);
        $imgToBanner = $bannerBySubcategoryColor["name"];
        $title = $bannerBySubcategoryColor["title"];
        $sub_title = $bannerBySubcategoryColor["sub_title"];

        // foreach($bannerBySubcategoryColor as $item){
        //     if($item["id"] == $id){
        //         $imgToBanner = $item["name"];
        //         $title = $item["title"];
        //         $sub_title = $item["sub_title"];
        //     }
        // }

        
        return view("tableros.byVisualEfect", compact("products", "IDsToGroup", "imgToBanner", "title", "sub_title"));
    }

    function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
       
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public function descriptionByProducto($id){
        // $bannerBySubcategoryColor = $this->getBannerBySubcategoryColor($id);
        //$imgToBanner = $bannerBySubcategoryColor["name"];
        // $title = $bannerBySubcategoryColor["title"];
        // $sub_title = $bannerBySubcategoryColor["sub_title"];


        // la descripcion solo la podra ver los usuarios logueado
        if(auth()->check()){
            $product = DB::select("CALL sp_getInformationProduct(?)", array($id));
            $product = $product[0];
    
            // $image = DB::table("image_products")
            //     ->where("id_product", $id)->first();
             
            return view("tableros.description", compact("product"));
        }else{
            $title = "Información";
            $content = "Se requiere estar registrado en el sistema para poder ver todas las caracteristicas del producto.<br>";
            $content .= "Acá podrá encontrar las siguientes caracteristicas:<br>";
            $content .= "<ul>";
            $content .= "<li>Precio.</li>";
            $content .= "<li>Categoría.</li>";
            $content .= "<li>Acabado.</li>";
            $content .= "<li>Efecto visual.</li>";
            $content .= "<li>Material.</li>";
            $content .= "<li>Tipo de sustrato.</li>";
            $content .= "<li>Color.</li>";
            $content .= "<li>Descargar ficha técnica.</li>";
            $content .= "<li>Acceso a la galería de imágenes del producto.</li>";
            $content .= "<li>Descripción completa del producto.</li>";
            $content .= "</ul>";
            $content .= "<br>";
            $content .= "Haga click <a href='" . asset("login") . "'><strong>aqui</strong></a> para realizar el ingreso al sistema, de lo contrario lo invitamos a registrarse en el sistema a través del siguiente enlace <a href='" . asset("register") . "'><strong>registrarse</strong></a>.";

            $img = asset('images/information.png');

            return view("layouts.layoutMessage", compact("title", "content", "img"));
        }

    }

    public function getBannerBySubcategoryColor($id){
        $bannerBySubcategoryColor = array([
            "id" => 5, 
            "name" => "banner-tradicional.png",
            "title" => "Acabados Tradicionales",
            "sub_title" => "Tableros melamínicos hidrófugos y natural MDP importados y nacionales."
        ],
        [
            "id" => 4, 
            "name" => "banner-premium.jpg",
            "title" => "Acabados Premium",
            "sub_title" => "Tableros melamínicos MDF en Super Mate Importados."
        ],
        [
            "id" => 3, 
            "name" => "banner-premium.jpg",
            "title" => "Acabados Premium",
            "sub_title" => "Tableros melamínicos MDF en Alto Brillo Importados."
        ]);

        foreach ($bannerBySubcategoryColor as $key => $value) {
            if($value["id"] == $id){
                $result = $value;
            }
        }

        return $result;
    }

    public function showImagesByProduct($id){

        $product = DB::table("products")
            ->select("id", "name")
            ->where("id", $id)->first();

        $images = DB::table("image_products")
            ->where("id_product", $id)->get();

        return view("tableros.showImageByProduct", compact("product", "images"));
    }

    public function fichatecnica($id){
        $product = Product::find($id);
        $name = "Ficha tecnica " . $product->name .".pdf";
        return Storage::disk("fichaTecnica")->download($product->pdf_file, $name);
        // $publicPath = public_path('ficha_tecnica');
        // return Storage::download($product->pdf_file, $name);
    }
}

