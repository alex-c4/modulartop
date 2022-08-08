<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Purchase;
use Carbon\Carbon;
use Validator;
use Utils;
use PDF;

class PurchaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('verified');
        $this->middleware(['auth', 'administrative']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = DB::table('purchases as p')
            ->select(
                'p.id',
                'p.purchase_date',
                'pr.name as provider',
                'p.id_invoice')
            ->join('providers as pr', 'p.id_provider', '=', 'pr.id')
            ->orderBy('p.purchase_date', 'DESC')
            ->get();
        $purchase_date_end = Carbon::now()->format('Y-m-d');
        $purchase_date_start = '';
        
        return view('purchase.index', compact(
            'purchases',
            'purchase_date_end',
            'purchase_date_start'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = DB::table("providers")->get();

        $products = Product::where("is_deleted", 0)->get();

        // $product_categories = DB::table("product_categories")->get();
        // $product_types = DB::table("product_types")->get();
        // $product_subcategory = DB::table("product_subcategory")->where("id_product_type", 1)->get();
        // $product_subcategory_classification = DB::table("product_subcategory_classification")->get();

        $product_categories = DB::table("product_categories")->get();
        $product_types = DB::table("product_types")->get();
        $product_subtypes = DB::table("product_subtypes")->get();
        $product_acabados = DB::table("product_acabados")->get();
        $product_subacabados = DB::table("product_subacabados")->get();
        $product_materials = DB::table("product_materials")->get();
        $product_sustrato = DB::table("product_sustratos")->get();
        $product_colors = DB::table("product_colors")->get();
        $product_origen = DB::table("product_origen")->get();

        return view("purchase.create", compact(
            "providers", 
            "products", 
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
        $this->validatePurchase(request()->all())->validate();
        
        $msgPost = DB::transaction(function() use($request){
            
            try {
                $products = json_decode($request->input("hProducts"));
            
                $purchase = Purchase::create([
                    "purchase_date" => $request->input("purchase_date"),
                    "id_provider" => $request->input("provider"),
                    "id_invoice" => $request->input("id_invoice"),
                    "observations" => $request->input("observations"),
                    "created_by" => auth()->user()->id
                ]);

                // Se agregan item a la tabla - purchase_items
                $items = array();
                foreach ($products as $key => $product) {
                    $temp = [
                        "id_purchase" => $purchase->id,
                        "id_product" => $product->id,
                        "quantity" => intval($product->quantity),
                        "cost" => intval($product->cost)
                    ];
                    array_push($items, $temp);
                    
                    // Actualiza el precio del producto en la tabla de producto
                    Product::where("id", $product->id)
                        ->update([
                            "price" => $product->cost
                        ]);

                }
                
                DB::table("purchase_items")->insert($items);

                // Actualización de inventario
                foreach($items as $item){
                    $row = DB::table("inventory")->where("id_product", $item["id_product"])->first();
                    
                    if($row == null){
                        DB::table("inventory")->insert([
                            "id_product" => $item["id_product"],
                            "quantity" => intval($item["quantity"])
                        ]);
                        
                    }else{
                        $qty = $row->quantity;
                        $row = DB::table("inventory")
                            ->where("id_product", $item["id_product"])
                            ->update([
                                "quantity" => $qty + intval($item["quantity"])
                            ]);
                            
                    }
                }

                // Registro en tabla de auditoria
                foreach($items as $item){
                    $idSale = 0;
                    $idPurchase = $purchase->id;
                    $idProduct = $item["id_product"];
                    $qty = $item["quantity"];
                    $oper = 1; //1 = entrada
                    $createdBy = auth()->user()->id;

                    // se realiza el ingreso a la auditoria
                    Utils::addToInventoryAudit($idPurchase, $idSale, $idProduct, $qty, $oper, $createdBy);
                    
                    // DB::select("CALL sp_addInventoryAuditory(?,?,?,?,?,?)", array($idPurchase, $idProduct, $qty, $oper, $createdAt, $createdBy));
                }

                $msg = "Compra registrada satisfactoriamente";
                return $msg;

            } catch (\Throwable $th) {
                $msg = "Hubo un error en registro de la compra. ".$th->getmessage();
                return $msg;
            }
            
        });

        $providers = DB::table("providers")->get();

        $products = Product::get();


        $product_categories = DB::table("product_categories")->get();
        $product_types = DB::table("product_types")->get();
        $product_subtypes = DB::table("product_subtypes")->get();
        $product_acabados = DB::table("product_acabados")->get();
        $product_subacabados = DB::table("product_subacabados")->get();
        $product_materials = DB::table("product_materials")->get();
        $product_sustrato = DB::table("product_sustratos")->get();
        $product_colors = DB::table("product_colors")->get();
        $product_origen = DB::table("product_origen")->get();



        // $product_categories = DB::table("product_categories")->get();
        // $product_types = DB::table("product_types")->get();
        // $product_subcategory = DB::table("product_subcategory")->where("id_product_type", 1)->get();
        // $product_subcategory_classification = DB::table("product_subcategory_classification")->get();

        return view("purchase.create", compact(
            "providers", 
            "products", 
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = DB::table('purchases')->find($id);
        $providers = DB::table("providers")->get();
        $items = DB::table("purchase_items as pi")
            ->select(
                "pi.id",
                "pi.cost",
                "pi.quantity",
                "p.name"
            )
            ->join("products as p", "pi.id_product", "=", "p.id")
            ->join("purchases as pu", "pi.id_purchase", "=", "pu.id")
            ->where("pu.id", "=", $id)
            ->get();
            
        return view("purchase.show", compact(
            'purchase',
            'providers',
            'items'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validatePurchase(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'purchase_date' => 'required',
            'provider' => 'required',
            'id_invoice' => 'required'
        ], $messages);
    }

    public function searchPurchase(Request $request)
    {
        $purchase_date_start = $request->input('purchase_date_start');
        $purchase_date_end = $request->input('purchase_date_end');
        
        $purchases = $this->getPurchases($purchase_date_start, $purchase_date_end);

        return view('purchase.index', compact(
            'purchases',
            'purchase_date_start',
            'purchase_date_end'
        ));
    }

    public function downloadpurchase(Request $request)
    {
        $purchase_date_start = $request->input("startDate");
        $purchase_date_end = $request->input("endDate");
        
        $purchases = $this->getPurchases($purchase_date_start, $purchase_date_end);
        
        $pdf = PDF::loadView('purchase.pdf.downloadpurchases', ["purchases" => $purchases]);
        return $pdf->download('compras-modular-top.pdf');

    }

    public function getPurchases($purchase_date_start, $purchase_date_end)
    {
        $purchases = [];
        if($purchase_date_start == null){
            $purchases = DB::table('purchases as p')
                ->select(
                    'p.id',
                    'p.purchase_date',
                    'pr.name as provider',
                    'p.id_invoice',
                    'p.observations')
                ->join('providers as pr', 'p.id_provider', '=', 'pr.id')
                ->where('p.purchase_date', "<=", $purchase_date_end)
                ->get();
        }

        if($purchase_date_start != null && $purchase_date_end != null){
            $purchases = DB::table('purchases as p')
                ->select(
                    'p.id',
                    'p.purchase_date',
                    'pr.name as provider',
                    'p.id_invoice',
                    'p.observations')
                ->join('providers as pr', 'p.id_provider', '=', 'pr.id')
                ->whereBetween('p.purchase_date', [$purchase_date_start, $purchase_date_end])
                ->get();
        }

        return $purchases;
    }
}
