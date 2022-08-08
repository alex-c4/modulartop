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
            "userClient.create",
            "userClient.store",
            "user.edit_from_table",
        );

        $_user_routes = array(
            "user.edit",
            "user.update",
            "password.showFormResetPassw",
            "user.delete.confirm"
        );

        $_products_routes = array(
            "product.create",
            "product.index",
            "product.edit",
            "fichaTecnica.uploadFichaTecnica",
            "product.storeFichaTecnica",
            "product.store",
            "product.show",
            "fichaTecnica.showFichaTecnica"
        );

        $_compra_routes = array(
            "purchase.create",
            "purchase.store",
            "purchase.index",
            "purchase.searchPurchase"
        );

        $_venta_routes = array(
            "sale.create",
            "sale.store",
            "sale.saleslist",
            "sale.statistics"
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
            "project.create",
            "project.index",
            "project.edit",
            "project.store",
            "project.update"
        );

        $_leds_routes = array(
            "leds.ledsget"
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
            case "leds":
                $class  = Utils::getClass($_leds_routes, $route);
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
        $users = DB::table("users as u")->where("u.validationByAdmin", "0")
            ->join("company_types as c", "u.company_type_id", "=", "c.id", "left", false)
            ->select("u.id", "u.name", "u.lastName", "u.razonSocial", "c.name as client_type_name")
            ->where("u.confirmed", "1")
            ->where("u.roll_id", "2")
            ->where("u.is_client", "1")
            ->where("u.is_deleted", "0")
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
     * Funcion para validar la existencia del producto en el inventario
     * 
     * @param $productId id del producto a validar existencia en el inventario
     * @param $quantity cantidad del producto que se desea validar
     */
    public static function validar_existencia_inventario_porProducto($productId, $quantity){
        $inventory = DB::table("inventory")->where("id_product", $productId)->first();

        if($inventory->quantity < $quantity){
            $result = array(
                "result" => false,
                "message" => "Excede el máximo del inventario, capacidad actual <strong>".$inventory->quantity ."</strong>"
            );
        }else{
            $result = array(
                "result" => true,
                "message" => "Capacidad aceptada"
            );
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

    static public function getRollName($userId){

        $roll = DB::table("users")->select("roles.nombre")
            ->where("users.id", $userId)
            ->join("roles", "users.roll_id", "=", "roles.id", "inner", false)
            ->first();

        return $roll->nombre;

    }

    static public function getAvatar($userId){
        
        $avatar = "no_image.png";

        $user = DB::table("users")->select("users.avatar")
            ->where("users.id", $userId)
            ->first();
        
        if($user->avatar != null){
            $avatar = $user->avatar;
        }

        return $avatar;
    }

    static public function getBanner($userRoll){
        $userRoll = intval($userRoll);
        switch ($userRoll) {
            case 1:
                $banner = "super.jpg";
                break;
            case 2:
                $banner = "estandar.jpg";
                break;
            case 3:
                $banner = "marketing.jpg";
                break;
            case 4:
                $banner = "cliente.jpg";
                break;
            case 5:
                $banner = "admin.jpg";
                break;
            default:
                $banner = "estandar.jpg";
                break;
        }

        return $banner;
    }


}
