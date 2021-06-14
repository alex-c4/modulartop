<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\OrderSale;
use Utils;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('verified');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Búsqueda de nuevos usuarios por validar
        $usersToValidate = Utils::getUsersToValidate(); 
        $total = count($usersToValidate);

        // Búsqueda de nuevas ordedes de compra donde el status sea 2=inicial
        $orders = OrderSale::where("status", 2)->get();
        $totalOrders = count($orders);

        $userName = ucfirst(auth()->user()->name);
        $userLastName = ucfirst(auth()->user()->lastName);
        $roll = Utils::getRollName(auth()->user()->id);
        $avatar = Utils::getAvatar(auth()->user()->id);

        return view('home', compact("usersToValidate", "total", "orders", "totalOrders", "userName", "userLastName", "roll", "avatar"));
    }
}
