<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Catalog;
use DB;
use Carbon\Carbon;

class CatalogController extends Controller
{
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
     * Display a form to download the catalog.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $product_types = DB::table("product_types")
            ->where('is_deleted', 0)
            ->orderby('name', 'asc')
            ->get();
        
        $proyectistas = DB::table("proyectistas")
            ->orderby('name', 'asc')
            ->get();
        
        return view('catalog.import', compact("product_types", "proyectistas"));
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
        $this->validateCatalog(request()->all())->validate();

        $result = DB::transaction(function() use($request){

            $file = $request->file('catalog');
            $fileName = $file->getClientOriginalName();

            //Borrar archivos cargos anteriormente y registro en la BD
            $this->deletedIfExist($request);

            $file->storeAs('catalogs', $fileName, 'global');

            $catalog = Catalog::create([
                "id_product_type" => $request->input('type'),
                "id_proyectista" => $request->input('proyectista'),
                "file_name" => $fileName,
                "created_at" => Carbon::now(),
                "created_by" => auth()->user()->id
            ]);
    
            $catalog->save();
            
            $result = array([
                "msg" => "¡Importación realizada satisfactoriamente!."
            ]);

            return $result;
        });

        $msgCatalog = $result[0]["msg"];

        $product_types = DB::table("product_types")
            ->where('is_deleted', 0)
            ->orderby('name', 'asc')
            ->get();
        
        $proyectistas = DB::table("proyectistas")
            ->orderby('name', 'asc')
            ->get();

        return view('catalog.import', compact(
            "msgCatalog",
            "product_types",
            "proyectistas"
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

    public function validateCatalog(array $data){
        $messages = [
            'required' => 'El campo es requerido.',
            'mimes' => 'El formato del archivo debe ser PDF.'
        ];

        return Validator::make($data, [
            'type' => 'required',
            'proyectista' => 'required',
            'catalog' => 'required|mimes:pdf',
        ], $messages);
    }

    public function deletedIfExist($request){
        $id_product_type = $request->input('type');
        $id_proyectista = $request->input('proyectista');
        $catalog = Catalog::where('id_product_type', $id_product_type)
            ->where('id_proyectista', $id_proyectista)
            ->first();
        if($catalog != null){
            // Borrar PDF
            Storage::disk('global')->delete('catalogs/' . $catalog->file_name);

            //Borrar registro de la BD
            Catalog::where('id_product_type', $id_product_type)
            ->where('id_proyectista', $id_proyectista)
            ->delete();
        }
    }
}
