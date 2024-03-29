<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Sale;
use App\OrderSale;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Utils;
use PDF;

class SaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('verified');
        $this->middleware(['auth', 'administrative'], ["except" => ["getStatisticsData", "statistics"]]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::select("id", "name", "lastName")
            ->where("is_client", "1")
            ->where("is_deleted", "0")
            ->orderby("name", "asc")
            ->get();
        
        // $products = Product::where("is_deleted", 0)->get();
        $products = DB::table("products")
            ->join("inventory", "inventory.id_product", "=", "products.id", "inner", false)
            ->where("is_deleted", 0)
            ->where("inventory.quantity", ">", 0)
            ->get();

        $orders = $this->getOrderByEstatus(3);
        
        foreach ($orders as $value) {
            $_arr = explode(" ", $value->orderSaleCreatedAt);
            $value->orderSaleCreatedAt = $_arr[0];  
        }

        $roles = DB::table("roles")->get();

        $company_types = DB::table("company_types")->get();

        return view("sale.create", compact("clients", "orders", "products", "roles", "company_types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateSale(request()->all())->validate();

        $hProducts = $request->input("hProducts");
        $products_req = json_decode($hProducts);
        

        $msgPost = DB::transaction(function() use($request, $products_req){
            try {
                $message = "";
                // validar existencia de productos
                $resp = Utils::validar_existencia_inventario($products_req);
                
                if(count($resp) > 0){
                    $message = "Existen productos que exceden la capacidad del inventario";
                    new Exception("Existen productos que exceden la capacidad del inventario");
                }

                $idOrderSaleId = intval($request->input("id_order_sale"));

                $sale = Sale::create([
                    "sale_date" => $request->input("sale_date"),
                    "id_client" => $request->input("client"),
                    "id_invoice_sale" => $request->input("invoice_sale"),
                    "id_order_sale" => $idOrderSaleId,
                    "observations" => $request->input("observations"),
                    "created_by" => auth()->user()->id,
                    "created_at" => Carbon::now()
                ]);

                // Cambio de estatus de la orden de compra
                if($idOrderSaleId > 0){
                    $orderSale = OrderSale::find($idOrderSaleId);
                    $orderSale->status = 1; // 1=procesada
                    $orderSale->save();
                }

                // Se agregan item a la tabla - sale_items
                $items = array();
                foreach ($products_req as $key => $product) {
                    $temp = [
                        "id_sale" => $sale->id,
                        "id_product" => $product->id,
                        "quantity" => intval($product->quantity)
                    ];
                    array_push($items, $temp);
                }
                DB::table("sale_items")->insert($items);

                // Descuento de inventario
                foreach ($products_req as $key => $product) {
                    Utils::descontar_inventario($product->id, $product->quantity);
                }
                
                $invoice_filepdf = $request->file("invoice_filepdf");
                if($invoice_filepdf != null){
                    $file_name = $sale->id. "_" . $invoice_filepdf->getClientOriginalName();
                    $invoice_filepdf->storeAs('invoice_client_bySale', $file_name, 'global');
                    $sale->invoice_filepdf = $file_name;
                    $sale->save();
                }


                // se realiza el ingreso a la auditoria
                foreach ($products_req as $key => $product) {
                    $idPurchase = 0;
                    $idSale = $sale->id;
                    $idProduct = $product->id;
                    $qty = intval($product->quantity);
                    $oper = 0; //1 = salida
                    $createdBy = auth()->user()->id;
                    Utils::addToInventoryAudit($idPurchase, $idSale, $idProduct, $qty, $oper, $createdBy);
                }

                return "Venta realizada satisfactoriamente";

            } catch (\Throwable $th) {
                return ($message == "") ? "Hubo un error en el proceso de almacenamiento." : $message;
            }
        });
        
        $clients = User::select("id", "name", "lastName")
            ->where("is_client", "1")
            ->where("is_deleted", "0")
            ->orderby("name", "asc")
            ->get();
        
        $products = Product::get();

        $orders = $this->getOrderByEstatus(3);

        $lowInventoryProducts = Utils::getLowInventoryProducts($products_req);
        
        $roles = DB::table("roles")->get();

        $company_types = DB::table("company_types")->get();

        return view("sale.create", compact("clients", "orders", "products", "msgPost", "lowInventoryProducts", "roles", "company_types"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = DB::table("sales as s")
            ->select(
                "s.*",
                "u.name as clientName",
                "u.lastName as clientLastName"
            )
            ->join("users as u", "u.id", "=", "s.id_client")
            ->where("s.id", $id)->first();

        $sale_items = DB::table('sale_items as s')
            ->select(
                's.*',
                'p.name'
                )
            ->join('products as p', 'p.id', '=', 's.id_product')
            ->where('s.id_sale', $id)->get();
        
        return view("sale.show", compact("sale", "sale_items"));
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
    
    public function validateSale(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'sale_date' => 'required',
            'client' => 'required',
            'invoice_sale' => 'required'
        ], $messages);
    }

    public function saleslist(){
        $sales = DB::select("CALL sp_getSales()");

        return view("sale.saleslist", compact("sales"));
    }

    public function downloadsales(){
        $sales = DB::select("CALL sp_getSales()");

        // return view("sale.downloassalespdf", compact("sales"));

        $pdf = PDF::loadView('sale.downloadsalespdf', ["sales" => $sales]);
        
        return $pdf->download('ventas-modular-top.pdf');


    }

    public function getOrderByEstatus($estatus){
        return DB::table("order_sales")
            ->select(
                    "users.name as userName",
                    "users.lastName as userLastName",
                    "users.id as userId",
                    "order_sales.id as orderSaleId",
                    "order_sales.created_at as orderSaleCreatedAt"
                    )
            ->where("status", $estatus)
            ->join("users", "users.id", "=", "order_sales.id_user", "inner", false)
            ->orderby("order_sales.created_at", "asc")
            ->get();
    }
    
    public function statistics(){
        $months = array(
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        );
        
        $title_chart = "Estadísticas de Ventas";
        
        return view("sale.statistics", compact("title_chart", "months"));
    }

    public function getStatisticsData(Request $request){
        $range = intval($request->input("range"));
        $month = intval($request->input("month"));
        $monthText = $request->input("monthText");

        if($range == 1){
            //ultimos 7 dias
            $title_chart = "Estadística de ventas últimos 7 días";
            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(7);
        }

        if($range == 2){
            $title_chart = "Estadística de ventas del mes de ". $monthText;

            $dt = Carbon::now();
            
            $year = $dt->year;
            $fday = 1;
            $startDate = Carbon::create($year, $month);
            
            $lday = $startDate->daysInMonth;
            $endDate = Carbon::create($year, $month, $lday);
        }

        $statistics = DB::select("CALL sp_salesStatistics(?, ?)", array($startDate->format("Y-m-d"), $endDate->format("Y-m-d")));
        $data = [];

        foreach ($statistics as $row) {
            array_push($data, ["label" => $row->name, "y" => intval($row->total)]);
        }

        return collect(["data" => $data, "title" => $title_chart]);
    }

    public function validarExistencia(Request $request){
        $productId = $request->input("product_id");
        $quantity = $request->input("quantity");
        $resp = Utils::validar_existencia_inventario_porProducto($productId, $quantity);

        return $resp;

    }

}

