<?php

namespace App\Helper;
use DB;
use App\User;
use App\Inventory;

class Utils
{
    static public $ORDER_STATUS = array("Cancelada", "Procesada", "Inicial", "En proceso");

    public static function getCountNews(){
        $countNews = DB::select('CALl sp_CountNews');
        
        return $countNews[0]->countNews;
    }

    public static function getActiveRouteClass($route, $modulo){

        $_newsletter_routes = array(
            "newsletter.create",
            "newsletter.index",
            "newsletter.store",
            "newsletter.update",
            "newsletter.edit",
            "newsletter.delete"
        );

        $_home_routes = array(
            "home"
        );

        $_user_validate_routes = array(
            "userValidation.index",
            "userValidation.update",
            "user.create",
            "user.showUser",
            "userClient.index",
            "userClient.create"
        );

        $_user_routes = array(
            "user.edit",
            "user.update"
        );

        $_products_routes = array(
            "product.create",
            "product.index"
        );

        $_compra_routes = array(
            "purchase.create",
            "purchase.store"
        );

        $_venta_routes = array(
            "sale.create",
            "sale.store",
            "sale.saleslist"
        );

        $_order_sale_routes = array(
            "ordersale.store",
            "ordersale.create",
            "ordersale.index",
            "ordersale.delete",
            "ordersale.show",
            "ordersale.process"
        );

        $_inventory_routes = array(
            "inventory.index"
        );

        $_project_routes = array(
            "project.create"
        );

        switch($modulo){
            case "newsletter":
                // foreach ($_newsletter_routes as $key => $value) {
                //     if($route == $value){
                //         $class = "class='active'";
                //     }
                // }
                $class  = Utils::getClass($_newsletter_routes, $route);
                break;
            case "home":
                // foreach ($_home_routes as $key => $value) {
                //     if($route == $value){
                //         $class = "class='active'";
                //     }
                // }
                $class  = Utils::getClass($_home_routes, $route);
                break;
            case "user_validation":
                $class  = Utils::getClass($_user_validate_routes, $route);
                break;
            case "user":
                $class  = Utils::getClass($_user_routes, $route);
                break;
            case "product":
                $class  = Utils::getClass($_products_routes, $route);
                break;
            case "compra":
                $class  = Utils::getClass($_compra_routes, $route);
                break;
            case "venta":
                $class  = Utils::getClass($_venta_routes, $route);
                break;
            case "order_sale":
                $class  = Utils::getClass($_order_sale_routes, $route);
                break;
            case "inventory":
                $class  = Utils::getClass($_inventory_routes, $route);
                break;
            case "project":
                $class  = Utils::getClass($_project_routes, $route);
                break;

        }

        return $class;
    }

    private static function getClass($_arr, $route){
        $class = "";
        foreach ($_arr as $key => $value) {
            if($route == $value){
                $class = "class=active";
            }
        }
        return $class;
    }

    public static function getUsersToValidate(){
        $users = User::where("validationByAdmin", "0")
            ->where("confirmed", "1")
            ->where("roll_id", "2")
            ->where("is_client", "1")
            ->where("is_deleted", "0")
            ->get();

        return $users;
    }

    /**
     * 
     * Funcion para validar la existencia de los productos en el inventario general
     * 
     * @param $product productos a validar, si existen en el inventario
     */
    public static function validar_existencia_inventario($products){
        $result = array();
        $inventory = DB::table("inventory")->get();
        
        foreach ($products as $product) {
            foreach($inventory as $item){
                if($product->id == $item->id_product){
                    if($product->quantity > $item->quantity){
                        array_push($result, array([
                            "id" => $product->id,
                            "name" => $product->name,
                            "info" => "Excede la totalidad del inventario"
                            ]));
                    }
                }
            }
        }
        
        return $result;
    }

    /**
     * 
     * Funcion para restar del inventario por producto
     * 
     * @param $product productos a validar, si existen en el inventario
     */
    static public function descontar_inventario($id_product, $quantity){
        try {
            DB::select("CALL sp_descontarInventario(?,?)", array($quantity, $id_product));
        } catch (\Throwable $th) {
            return "false";
        }

        return "true";
    }

    static public function get_orderStatus($orders){
        $status = Utils::$ORDER_STATUS;
        foreach ($orders as $value) {
            $value->statusName = $status[$value->status];
        }

        return $orders;
    }

    static public function getLowInventoryProducts($products){
        $result = [];
        $crrInventory = Inventory::get();

        foreach ($products as $product) {
            foreach ($crrInventory as $item) {
                if($item->id_product == $product->id){
                    if($item->quantity < 10){
                        array_push($result, array(
                            "productName" => $product->name,
                            "productQuantity" => $item->quantity
                        ));
                        break;
                    }
                }
            }
        }

        return $result;
    }

    static public function addToInventoryAudit($idPurchase, $idSale, $idProduct, $qty, $oper, $createdBy){

        try {
            DB::table("inventory_audit")->insert([
                "id_purchase" => $idPurchase,
                "id_sale" => $idSale,
                "id_product" => $idProduct,
                "quantity" => $qty,
                "operation" => $oper,
                "created_by" => $createdBy
            ]);
            
            $result = array(
                "result" => true,
                "message" => "Inserción en auditoria correctamente"
            );
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getmessage());
            $result = array(
                "result" => true,
                "message" => "Inserción en auditoria correctamente"
            );
        }

        return $result;


    }

}
