<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\OrderSale;
use App\Sale;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Mail;
use Utils;
use DB;

class OrderSaleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('verified');
        // $this->middleware(['auth', 'checkIfAreClient', 'administrative'], ['except' => ['create', 'downloadexcel', 'store', 'show', 'delete']]);
        $this->middleware(['auth'], ['except' => ['create', 'downloadexcel', 'store', 'show', 'delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('checkIfAreClient');

        $orders = $this->getOrders();
        
        return view("ordersale.index", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ordersale.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateOrderSale(request()->all())->validate();
        try {

            $file = $request->file("filepdf");

            $order_sale = OrderSale::create([
                "id_user" => auth()->user()->id,
                "created_at" => Carbon::now()
            ]);

            if($file != null){
                $file_name = $order_sale->id . "_" . $file->getClientOriginalName();
                $file->storeAs('file_user_excel', $file_name, 'global');
                $order_sale->file_name = $file_name;
                $order_sale->save();
            }

            // Envio de correo
            $userInfo = array(
                "name" => auth()->user()->name,
                "lastName" => auth()->user()->lastName
            );
            $userEmail = auth()->user()->email;

            $subject = "Registro de orden de compra";

            $req = array(
                "correo" => env('EMAIL_ADMIN')
            );
            // Correo a la Administracion del Modular Top
            Mail::send('emails.createordersale', $userInfo, function($message) use($req, $subject){
                $message->from($req["correo"], 'Web Modular Top');
                $message->to($req["correo"])->subject($subject);
            });

            // Correo al cliente creador de la orde de venta
            Mail::send('emails.createordersale', $userInfo, function($message) use($req, $subject, $userEmail){
                $message->from($req["correo"], 'Web Modular Top');
                $message->to($userEmail)->subject($subject);
            });

            $msgPost = "Su Orden de compra fue registrada correctamente, la misma será atendida lo más pronto posible. Puede hacer seguimiento de su orden desde <a href='" . route('ordersale.index') . "'>aqui</a>";

        } catch (\Throwable $th) {
            $msgPost = "Hubo un error creando la order.".$th->getmessage();

        }

        return view("ordersale.create", compact("msgPost"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->getOrderById($id);
        return view("ordersale.show", compact("order"));
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
    public function delete($id)
    {
        // 0 = cancelado
        $order = $this->changeStatus($id, 0);

        $orders = $this->getOrders();

        return view("ordersale.index", compact("orders"));
    }

    public function attend($id)
    {
        // 3 = en proceso
        $order = $this->changeStatus($id, 3);

        $orders = $this->getOrders();

        return view("ordersale.index", compact("orders"));
    }

    public function attendFromHome(Request $request)
    {
        try {
            $idOrderSale = $request->input("idOrderSale");

            // 3 = en proceso
            $order = $this->changeStatus($idOrderSale, 3);
    
            // Búsqueda de nuevas ordedes de compra donde el status sea 2=inicial
            $orders = OrderSale::where("status", 2)
                ->orWhere("status", 3)
                ->get();
            $totalOrders = count($orders);
    
            $result = array(
                "result" => true,
                "orders" => $orders,
                "totalOrders" => $totalOrders
            );

            
            //code...
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Ocurrio un error durante la actualización de la orden de compra."
            );
        }
     
        return $result;
    }

    public function process($ordersale_id)
    {
        $sales = DB::table("sales")
            ->select(
                "users.name as userName",
                "users.lastName as userLastName",
                "sales.id as id",
                "sales.created_at as created_at"
            )
            ->join("users", "users.id", "=", "sales.id_client", "inner", false)
            ->where("sales.id_order_sale", 0)
            ->get(); 
            
        $order = DB::table("order_sales")
            ->select(
                "order_sales.id as id", 
                "users.name as userName", 
                "users.lastName as userLastName",
                "order_sales.created_at as created_at"
                )
            ->join("users", "users.id", "=", "order_sales.id_user", "inner", false)
            ->where("order_sales.id", $ordersale_id)
            ->first();
        

        return view("ordersale.process", compact("sales", "order"));
    }

    public function processorder(Request $request){
        $idOrderSale = $request->input("hIdOrderSale");
        $idSale = $request->input("sale");

        $msgPost = DB::transaction(function() use($idSale, $idOrderSale){

            try {
        
                // Actualizacion de la venta
                $sale = Sale::find($idSale);
                $sale->id_order_sale = $idOrderSale;
                $sale->save();
        
                // Actualizacion de la orden de compra status 1=procesada
                $orderSale = OrderSale::find($idOrderSale);
                $orderSale->status = 1; 
                $orderSale->save();
        
                
                
                    return "Orden de compra fue asociada a la venta correctamente";
            } catch (\Throwable $th) {
                return "Hubo un error en el proceso de asociación de la orden de compra con la venta.".$th->getmessage();
            }
        });

        $order = DB::table("order_sales")
            ->select(
                "order_sales.id as id", 
                "users.name as userName", 
                "users.lastName as userLastName",
                "order_sales.created_at as created_at"
                )
            ->join("users", "users.id", "=", "order_sales.id_user", "inner", false)
            ->where("order_sales.id", $idOrderSale)
            ->first();

        return view("ordersale.process", compact("order", "msgPost")); 
    }

    private function changeStatus($id, $status){
        /**
         * 0 = cancelado
         * 1 = procesado
         * 2 = inicial
         * 3 = en proceso
         */
        $order = OrderSale::find($id);
        $order->status = $status; // 0=En proceso
        $order->save();
    }

    public function downloadexcel(){
        $name_plantilla = env("PLANTILLA_NAME");
        return Storage::disk("global")->download("file_user_excel/".$name_plantilla, $name_plantilla);
    }

    public function uploadexcel(Request $request){
        try {
            $name_plantilla = env("PLANTILLA_NAME");

            $file = $request->file("planilla");

            $file->storeAs('file_user_excel', $name_plantilla, 'global');

            $result = array(
                "result" => true,
                "message" => "Planilla actualizada satisfactoriamente."
            );

        } catch (\Throwable $th) {
            //throw $th;

            $result = array(
                "result" => false,
                "message" => "ha ocurrido un error actualizando la planilla."
            );
        }

        return $result;
    }

    public function validateOrderSale(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];
    
        return Validator::make($data, [
            'filepdf' => 'required'
        ], $messages);
    }

    public function getOrders(){

        if(auth()->user()->roll_id == 1 || auth()->user()->roll_id == 5){
            $orders_temp = DB::table("order_sales")
            ->select("order_sales.id as id", "users.name as userName", "users.lastName as userLastName", "order_sales.status as status", "order_sales.status as statusName", "order_sales.created_at as created_at")
            ->join("users", "users.id", "=", "order_sales.id_user", "inner", false)
            ->orderBy("order_sales.created_at", "desc")
            ->get();
        }else{
            $crrUserId = auth()->user()->id;
            $orders_temp = DB::table("order_sales")->select("id as id", "status as status", "status as statusName", "created_at as created_at")
                ->where("id_user", $crrUserId)
                ->orderBy("order_sales.created_at", "desc")
                ->get();
        }

        $orders = Utils::get_orderStatus($orders_temp);

        return $orders;
    }

    public function getOrderById($id){
        $order = DB::table("order_sales")
            ->select("order_sales.id as id", "users.name as userName", "users.lastName as userLastName", "order_sales.status as status", "order_sales.status as statusName", "order_sales.created_at as created_at", "order_sales.file_name")
            ->join("users", "users.id", "=", "order_sales.id_user", "inner", false)
            ->where("order_sales.id", $id)
            ->first();
            
        $order->statusName = Utils::$ORDER_STATUS[$order->status];

        return $order;
    }

    public function downloadplanilla($ordersale_id){
        $order = OrderSale::find($ordersale_id)->find($ordersale_id);

        return Storage::disk("global")->download("file_user_excel/" . $order->file_name, $order->file_name);
        
    }

    public function cancelFromHome(Request $request){
        try {
            $id = $request->input("idOrderSale");
            
            $order = $this->changeStatus($id, 0);

            // Búsqueda de nuevas ordedes de compra donde el status sea 2=inicial
            $orders = OrderSale::where("status", 2)
                ->orWhere("status", 3)
                ->get();
            $totalOrders = count($orders);
    
            $result = array(
                "result" => true,
                "orders" => $orders,
                "totalOrders" => $totalOrders
            );
            
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Ocurrio un error durante la actualización de la orden de compra."
            );
        }

        return $result;

    }

}
