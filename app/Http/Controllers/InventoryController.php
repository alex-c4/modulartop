<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empty = '';
        $inventory = DB::select("CALL sp_getInventory(?)", array($empty));
        return view("inventory.index", compact("inventory"));
    }

    public function searchProduct(Request $request){
        $productName = request()->productName;
        $inventory = DB::select("CALL sp_getInventory(?)", array($productName));
            
        return view('inventory.index', compact("inventory", "productName"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Descarga el inventario a PDF
     */
    public function download(Request $request){
        $productName = request()->hProductName;
        $inventory = DB::select("CALL sp_getInventory(?)", array($productName));

        $pdf = PDF::loadView('inventory.downloadinventorypdf', ["inventory" => $inventory])
            ->setPaper('A4', 'landscape');
        
        return $pdf->download('inventario-modular-top.pdf');
    }
}
