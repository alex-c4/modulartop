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
        $this->middleware(['auth', 'administrative'], ['except' => ['ShowViewByVisualEfect', 'descriptionByProducto', 'showImagesByProduct']]);
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

    public function searchProduct(Request $request){
        $productName = request()->productName;

        $products = $this->getProducts($productName);
            
        return view('product.index', compact("products", "productName"));

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
        $product_subtypes = DB::table("product_subtypes")->get();
        $product_acabados = DB::table("product_acabados")->get();
        $product_subacabados = DB::table("product_subacabados")->get();
        $product_materials = DB::table("product_materials")->get();
        $product_sustrato = DB::table("product_sustratos")->get();
        $product_colors = DB::table("product_colors")->get();
        $product_origen = DB::table("product_origen")->get();

        //temporal
        // $product_subcategory = DB::table("product_subcategory")->where("id_product_type", 1)->get();
        // $product_subcategory_classification = DB::table("product_subcategory_classification")->get();
        
        return view('product.create', compact(
                "product_categories", 
                "product_types", 
                "product_subtypes", 
                "product_acabados",
                "product_subacabados",
                "product_materials",
                "product_sustrato",
                "product_colors",
                "product_origen"
            ));
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
        $product_subtypes = DB::table("product_subtypes")->get();
        $product_acabados = DB::table("product_acabados")->get();
        $product_subacabados = DB::table("product_subacabados")->get();
        $product_materials = DB::table("product_materials")->get();
        $product_sustrato = DB::table("product_sustratos")->get();
        $product_colors = DB::table("product_colors")->get();
        $product_origen = DB::table("product_origen")->get();

        return view('product.create', compact(
            "product_categories", 
            "product_types", 
            "product_subtypes", 
            "product_acabados",
            "product_subacabados",
            "product_materials",
            "product_sustrato",
            "product_colors",
            "product_origen",
            "msgPost"
        ));
    }

    public function storeajax(Request $request){

        try {
            $resultProduct = $this->addProduct($request);
    
            $result = array([
                "result" => true,
                "msgPost" => $resultProduct[0]["msg"],
                "data" => array([
                    "id" => $resultProduct[0]["id"],
                    "name" => $request->input("name"),
                    "width" => $resultProduct[0]["width"],
                    "thickness" => $resultProduct[0]["thickness"],
                    "length" => $resultProduct[0]["length"],
                    "code" => $resultProduct[0]["code"]
                ])
            ]);
            return $result;
        } catch (\Throwable $th) {
            $result = array([
                "result" => false,
                "msgPost" => "Hubo un error en la operación." . $th->getmessage()
            ]);
            return $result;
        }
    }

    public function addProduct($request){
        $type = $request->input("type");
        /* 
            1 - tableros; 
            2 - tapacanto
        */ 

        if($type == 1) {
            $this->validateTablero(request()->all())->validate();
        }else{
            $this->validateTapacanto(request()->all())->validate();
        }
        
        $result = DB::transaction(function() use($request, $type){
            // Tableros
            if($type == 1) {
                $product = Product::create([
                    "id_product_category" => $request->input("category"),
                    "id_product_type" => $request->input("type"),
                    "id_product_subtype" => $request->input("subtype"),
                    "code" => $request->input("code"),
                    "name" => $request->input("name"),
                    "id_product_origen" => $request->input("origen"),
                    "id_product_acabado" => $request->input("acabado"),
                    "id_product_subacabado" => $request->input("sub_acabado"),
                    "width" => $request->input("width"),
                    "thickness" => $request->input("thickness"),
                    "length" => $request->input("length"),
                    "id_product_material" => $request->input("material"),
                    "id_product_sustrato" => $request->input("sustrato"),
                    "id_product_color" => $request->input("color"),
                    "description" => $request->input("description"),
                    "img_product" => "",
                    "img_alt" => $request->input("image_alt"),
                    "created_at" => Carbon::now(),
                    "created_by" => auth()->user()->id,
                    "updated_at" => Carbon::now()
                ]);
            }else{
                $product = Product::create([
                    "id_product_category" => $request->input("category"),
                    "id_product_type" => $request->input("type"),
                    "id_product_subtype" => $request->input("subtype"),
                    "code" => $request->input("code"),
                    "name" => $request->input("name"),
                    "id_product_origen" => $request->input("origen"),
                    "id_product_acabado" => $request->input("acabado"),
                    "id_product_subacabado" => $request->input("sub_acabado"),
                    "width" => $request->input("width"),
                    "thickness" => $request->input("thickness"),
                    "img_product" => "",
                    "img_alt" => $request->input("image_alt"),
                    "created_at" => Carbon::now(),
                    "created_by" => auth()->user()->id,
                    "updated_at" => Carbon::now()
                ]);
            }
    
            // Registro de imagenes subidas
            $cycles = 50;
            
            for ($i=1; $i < $cycles; $i++) { 
                if($request->file('image_'.$i) != null){
                    $file = request()->file('image_'.$i);
                    $fileName = $product->id."_". $file->getClientOriginalName();
    
                    $file->storeAs('image_products', $fileName, 'local');
                    $textAlt = $request->input("image_alt_".$i);
    
                    DB::table('image_products')->insert([
                        "id_product" => $product->id,
                        "name" => $fileName,
                        "text_alt" => $textAlt
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
            // $pdf_file = request()->file('pdf_file');
            // if($pdf_file != null){
            //     $fileName = $product->id."_". $pdf_file->getClientOriginalName();
            //     $file->storeAs('', $fileName, 'fichaTecnica');
            //     $product->pdf_file = $fileName;
            // }
            
            $product->save();

            /**
             * Si existe cantidad inicial, se debe sumar al inventario
             */
            $cantinit = intval($request->input("cantinit"));
            $this->aumentarInventario($cantinit, $product->id);
            
            $result = array([
                "msg" => "¡Registro realizado satisfactoriamente!.",
                "id" => $product->id,
                "width" => $product->width,
                "thickness" => $product->thickness,
                "length" => $product->length,
                "code" => $product->code
            ]);

            return $result;
        });

        return $result;
    }

    public function aumentarInventario($cantinit, $id_product){
        if($cantinit >= 0 || $cantinit != ""){
            $inventory = DB::table("inventory")->where("id_product", $id_product)->first();
            if($inventory == null){
                DB::table("inventory")->insert([
                    "id_product" => $id_product,
                    "quantity" => $cantinit
                ]);
            }

            if($inventory != null){
                $crr_quantity = $inventory->quantity;
                $crr_quantity += $cantinit;
                DB::table("inventory")->where("id_product", $id_product)->update(["quantity" => $crr_quantity]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $product_categories = DB::table("product_categories")->get();
        $product_types = DB::table("product_types")->get();
        $product_subtypes = DB::table("product_subtypes")->get();
        $product_acabados = DB::table("product_acabados")->get();
        $product_subacabados = DB::table("product_subacabados")->get();
        $product_materials = DB::table("product_materials")->get();
        $product_sustrato = DB::table("product_sustratos")->get();
        $product_colors = DB::table("product_colors")->get();
        $product_origen = DB::table("product_origen")->get();

        $product_images = DB::table("image_products")->where("id_product", $id)->get();
        
        return view("product.show", compact(
            "product", 
            "product_categories", 
            "product_types", 
            "product_subtypes", 
            "product_acabados",
            "product_subacabados",
            "product_materials",
            "product_sustrato",
            "product_colors",
            "product_origen",
            "product_images"
        ));
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
        $product_subtypes = DB::table("product_subtypes")->get();
        $product_acabados = DB::table("product_acabados")->get();
        $product_subacabados = DB::table("product_subacabados")->get();
        $product_materials = DB::table("product_materials")->get();
        $product_sustrato = DB::table("product_sustratos")->get();
        $product_colors = DB::table("product_colors")->get();
        $product_origen = DB::table("product_origen")->get();

        $product_images = DB::table("image_products")->where("id_product", $id)->get();
        
        return view("product.edit", compact(
            "product", 
            "product_categories", 
            "product_types", 
            "product_subtypes", 
            "product_acabados",
            "product_subacabados",
            "product_materials",
            "product_sustrato",
            "product_colors",
            "product_origen",
            "product_images"
        ));
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
        // $this->validateProduct_update(request()->all())->validate();
        $type = $request->input("type");
        /* 
            1 - tableros; 
            2 - tapacanto
        */ 

        if($type == 1) {
            $this->validateTablero_update(request()->all())->validate();
        }else{
            $this->validateTapacanto_update(request()->all())->validate();
        }
        
        $result = DB::transaction(function() use($request, $type, $id){
            $product = Product::find($id);

            
            if($type == 1) { // Tablero
                $product->price = $request->input("cost");
                $product->id_product_category = $request->input("category");
                $product->id_product_type = $request->input("type");
                $product->id_product_subtype = $request->input("subtype");
                $product->code = $request->input("code");
                $product->name = $request->input("name");
                $product->id_product_origen = $request->input("origen");
                $product->id_product_acabado = $request->input("acabado");
                $product->id_product_subacabado = $request->input("sub_acabado");
                $product->width = $request->input("width");
                $product->thickness = $request->input("thickness");
                $product->length = $request->input("length");
                $product->id_product_material = $request->input("material");
                $product->id_product_sustrato = $request->input("sustrato");
                $product->id_product_color = $request->input("color");
                $product->description = $request->input("description");
                $product->img_alt = $request->input("image_alt");
                $product->updated_at = Carbon::now();

            }else{ // cualquier otro tipo de producto
                $product->price = $request->input("cost");
                $product->id_product_category = $request->input("category");
                $product->id_product_type = $request->input("type");
                $product->id_product_subtype = $request->input("subtype");
                $product->code = $request->input("code");
                $product->name = $request->input("name");
                $product->id_product_origen = $request->input("origen");
                $product->id_product_acabado = $request->input("acabado");
                $product->id_product_subacabado = $request->input("sub_acabado");
                $product->width = $request->input("width");
                $product->thickness = $request->input("thickness");
                $product->img_alt = $request->input("image_alt");
                $product->updated_at = Carbon::now();
                
            }

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
                    $textAlt = $request->input("image_alt_".$i);

                    DB::table('image_products')->insert([
                        "id_product" => $product->id,
                        "name" => $fileName,
                        "text_alt" => $textAlt
                    ]);
                }
            }

            $product->save();

            //Se actualiza el precio en la tabla [purchase_items]
            $purchaseItem = DB::table("purchase_items")
                ->where("id_product", $id)
                ->orderBy("id", "desc")
                ->first();
            if($purchaseItem != null){
                DB::table("purchase_items")->where("id", $purchaseItem->id)->update(['cost' => $request->input("cost")]);
            }

            return "¡Registro actualizado satisfactoriamente!.";

        });



        

        // Registro de PDF
        // $pdf_file = $request->file('pdf_file');
        // if($pdf_file != null){
        //     if($product->pdf_file != ""){
        //         $f_delete = $product->pdf_file;
        //         Storage::disk('fichaTecnica')->delete($f_delete);
        //     }

        //     $fileName = $product->id."_". $pdf_file->getClientOriginalName();
        //     $pdf_file->storeAs('', $fileName, 'fichaTecnica');
        //     $product->pdf_file = $fileName;
        // }


        $msgPost = $result;

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

    public function validateTablero(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'category' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'code' => 'required',
            'name' => 'required',
            'origen' => 'required',
            'acabado' => 'required',
            "width" => 'required',
            "thickness" => 'required',
            "length" => 'required',
            'material' => 'required',
            'sustrato' => 'required',
            'color' => 'required',
            'description' => 'required',
            'image_0' => 'required',
            'image_alt' => 'required'
        ], $messages);
    }
    public function validateTablero_update(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'cost' => 'required',
            'category' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'code' => 'required',
            'name' => 'required',
            'origen' => 'required',
            'acabado' => 'required',
            "width" => 'required',
            "thickness" => 'required',
            "length" => 'required',
            'material' => 'required',
            'sustrato' => 'required',
            'color' => 'required',
            'description' => 'required',
            'image_alt' => 'required'
        ], $messages);
    }

    public function validateTapacanto(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'category' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'code' => 'required',
            'name' => 'required',
            'origen' => 'required',
            'acabado' => 'required',
            "width" => 'required',
            "thickness" => 'required',
            'image_0' => 'required',
            'image_alt' => 'required'
        ], $messages);
    }
    public function validateTapacanto_update(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'cost' => 'required',
            'category' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'code' => 'required',
            'name' => 'required',
            'acabado' => 'required',
            'origen' => 'required',
            'acabado' => 'required',
            "width" => 'required',
            "thickness" => 'required',
            'image_alt' => 'required'
        ], $messages);
    }

    

    public function getProducts($productName = ""){

        if($productName != ""){
            return DB::table("products as p")
                ->select("p.id", 
                        "p.code",
                        "p.name as product_name",
                        "p.width",
                        "p.thickness",
                        "p.length",
                        "p.price",
                        "pc.name as category_product_name",
                        "pt.name as product_type_name",
                        "p.is_deleted as product_isdeleted",
                        "pa.name as acabado",
                        "pm.name as material",
                        "ps.name as sustrato"
                        )
                ->join("product_categories as pc", "pc.id", "=", "p.id_product_category", "inner", false)
                ->join("product_types as pt", "pt.id", "=", "p.id_product_type", "inner", false)
                ->leftjoin("product_acabados as pa", "pa.id", "=", "p.id_product_acabado", "inner", false)
                ->leftjoin("product_materials as pm", "pm.id", "=", "p.id_product_material", "inner", false)
                ->leftjoin("product_sustratos as ps", "ps.id", "=", "p.id_product_sustrato", "inner", false)
                ->where("p.name", "LIKE", "%{$productName}%")
                ->get();
        }

        if($productName == ""){
            return DB::table("products as p")
                ->select("p.id", 
                        "p.code",
                        "p.name as product_name",
                        "p.width",
                        "p.thickness",
                        "p.length",
                        "p.price",
                        "pc.name as category_product_name",
                        "pt.name as product_type_name",
                        "p.is_deleted as product_isdeleted",
                        "pa.name as acabado",
                        "pm.name as material",
                        "ps.name as sustrato"
                        )
                ->join("product_categories as pc", "pc.id", "=", "p.id_product_category", "inner", false)
                ->join("product_types as pt", "pt.id", "=", "p.id_product_type", "inner", false)
                ->leftjoin("product_acabados as pa", "pa.id", "=", "p.id_product_acabado", "inner", false)
                ->leftjoin("product_materials as pm", "pm.id", "=", "p.id_product_material", "inner", false)
                ->leftjoin("product_sustratos as ps", "ps.id", "=", "p.id_product_sustrato", "inner", false)
                ->get();
        }

    }

    public function ShowViewByVisualEfect($id){
        $IDsToGroupTableros = array();
        $products_tapacantos = array();
        // $products = DB::select("CALL sp_getProductBy_product_subcategory_classification(?)", array($id));
        $products_tableros = DB::select("CALL sp_getProducts_materiaPrima(?, ?)", array(1, $id));
        $products_tapacantos = DB::select("CALL sp_getProducts_materiaPrima(?, ?)", array(2, $id));
        
        foreach($products_tableros as $product) {
            array_push($IDsToGroupTableros, array(
                "id" => $product->id_subcategory_color, 
                "name" => $product->name_subcategory_color
            ));
        }
        
        $IDsToGroupTableros = $this->unique_multidim_array($IDsToGroupTableros, "id");

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

        
        return view("tableros.byVisualEfect", compact("products_tableros", "products_tapacantos", "IDsToGroupTableros", "imgToBanner", "title", "sub_title"));
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
            $content = "Se requiere tener una cuenta de usuario en nuestro sitio web para poder consultar y descargar todas las características de nuestros productos.<br>";
            $content .= "Beneficios de tener una cuenta en <strong>modulartop.com</strong>:<br>";
            $content .= "<br>";
            $content .= "<ul>";
            $content .= "<li>Acceso y descarga de características, descripción y ficha técnica de productos.</li>";
            $content .= "<li>Acceso a precios e inventario actualizado de productos.</li>";
            $content .= "<li>Consultar galería de imágenes de los productos.</li>";
            $content .= "<li>Generar orden de compra y seguimiento online de mi compra.</li>";
            $content .= "</ul>";
            $content .= "<br>";
            $content .= "Haga click <a href='" . asset("login") . "'><strong>aqui</strong></a> para ingresar con su cuenta de usuario, de lo contrario créela en pocos segundos a través del siguiente enlace <a href='" . asset("register") . "'><strong>registrarse</strong></a>.";

            $img = asset('images/information.png');

            return view("layouts.layoutMessage", compact("title", "content", "img"));
        }

    }

    public function getBannerBySubcategoryColor($id){
        $bannerBySubcategoryColor = array([
            "id" => 3, 
            "name" => "banner-tradicional.png",
            "title" => "Acabados Tradicionales",
            "sub_title" => "Tableros melamínicos hidrófugos y natural MDP importados y nacionales."
        ],
        [
            "id" => 2, 
            "name" => "banner-premium.jpg",
            "title" => "Acabados Premium",
            "sub_title" => "Tableros melamínicos MDF en Super Mate Importados."
        ],
        [
            "id" => 1, 
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
        // dd($product, $images);
        return view("tableros.showImageByProduct", compact("product", "images"));
    }

    // public function fichatecnica($id){
    //     $product = Product::find($id);
    //     $name = "Ficha tecnica " . $product->name .".pdf";
    //     return Storage::disk("fichaTecnica")->download($product->pdf_file, $name);
    //     // $publicPath = public_path('ficha_tecnica');
    //     // return Storage::download($product->pdf_file, $name);
    // }

    public function addCategory(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|unique:product_categories'
        ],
        [
            'name.required' => 'El campo nombre es requerido.',
            'name.unique' => 'Ya existe una categoría con este nombre.'
        ]);

        if($validated->fails()){
            return [
                "result" => false,
                "message" => $validated->errors()->first()
            ];
        }

        try {
            $name = $request->input("name");
            $id = DB::table("product_categories")->insertGetId([
                'name' => $name
            ]);

            $data = array(
                'id' => $id,
                'name' => $name
            );

            $result = [
                "result" => true,
                "data" => $data,
                "message" => "Se agregó la categoría correctamente."
            ];

        } catch (\Throwable $th) {
            $result = [
                "result" => false,
                "message" => "No se pudo agregar la categoría al sistema, por favor intente nuevamente."
            ];
        }

        return $result;
    }

    public function addType(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|unique:product_types',
            'category' => 'required'
        ],
        [
            'name.required' => 'El campo nombre es requerido.',
            'name.unique' => 'Ya existe una categoría con este nombre.',
            'category.required' => 'Debe seleccionar una categoría.'
        ]);
        if($validated->fails()){
            return [
                "result" => false,
                "message" => $validated->errors()->first()
            ];
        }
        try {
            $name = $request->input("name");
            $category = $request->input("category");
            $id = DB::table("product_types")->insertGetId([
                'category_id' => $category,
                'name' => $name
            ]);

            $data = array(
                'category_id' => $category,
                'id' => $id,
                'name' => $name
            );

            $result = [
                "result" => true,
                "data" => $data,
                "message" => "Se agregó la categoría correctamente."
            ];
        } catch (\Throwable $th) {
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el tipo al sistema, por favor intente nuevamente."
            ];
        }
        
        return $result;
    }

    public function addSubType(Request $request){
        try {
            $type_id = $request->input("modal_type");
            $name = $request->input("subtype");
            
            DB::table("product_subtypes")->insert([
                "type_id" => $type_id,
                "name" => $name
            ]);

            $product_subtypes = DB::table("product_subtypes")->get();
            

            $result = [
                "result" => true,
                "data" => $product_subtypes
            ];

        } catch (\Throwable $th) {
            //throw $th;
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el sub-tipo al sistema, por favor intente nuevamente."
            ];
        }

        return $result;
    }

    public function addAcabado(Request $request){
        try {
            $name = $request->input("name");
            DB::table("product_acabados")->insert([
                "name" => $name
            ]);

            $product_acabados = DB::table("product_acabados")->get();

            $result = [
                "result" => true,
                "data" => $product_acabados
            ];

        } catch (\Throwable $th) {
            //throw $th;
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el Acabado al sistema, por favor intente nuevamente."
            ];
        }

        return $result;

    }

    public function addSubacabado(Request $request){
        try {
            $id_acabado = $request->input("id_acabado");
            $name = $request->input("name");

            DB::table("product_subacabados")->insert([
                "id_acabado" => $id_acabado,
                "name" => $name
            ]);

            $product_subacabados = DB::table("product_subacabados")->get();

            $result = [
                "result" => true,
                "data" => $product_subacabados
            ];

        } catch (\Throwable $th) {
            //throw $th;
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el Sub-acabado al sistema, por favor intente nuevamente."
            ];
        }

        return $result;
    }

    public function addMaterial(Request $request){
        try {
            $name = $request->input("name");

            DB::table("product_materials")->insert([
                "name" => $name
            ]);

            $product_materials = DB::table("product_materials")->get();

            $result = [
                "result" => true,
                "data" => $product_materials
            ];
        } catch (\Throwable $th) {
            //throw $th;
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el Material al sistema, por favor intente nuevamente."
            ];
        }

        return $result;
    }

    public function addSustrato(Request $request){
        try {
            $name = $request->input("name");

            DB::table("product_sustratos")->insert([
                "name" => $name
            ]);

            $product_sustratos = DB::table("product_sustratos")->get();

            $result = [
                "result" => true,
                "data" => $product_sustratos
            ];
        } catch (\Throwable $th) {
            //throw $th;
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el Tipo de Sustrato al sistema, por favor intente nuevamente."
            ];
        }

        return $result;
    }

    public function addColor(Request $request){
        try {
            $name = $request->input("name");

            DB::table("product_colors")->insert([
                "name" => $name
            ]);

            $product_colors = DB::table("product_colors")->get();

            $result = [
                "result" => true,
                "data" => $product_colors
            ];
        } catch (\Throwable $th) {
            //throw $th;
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el Color al sistema, por favor intente nuevamente."
            ];
        }

        return $result;
    }

    
}

