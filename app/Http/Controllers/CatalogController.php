<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Catalog;
use App\Contact;
use DB;
use Carbon\Carbon;
use Mail;

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
        
        $product_categories = DB::table("product_categories")
            ->orderby('name', 'asc')
            ->where('is_deleted', 0)
            ->get();

        return view('catalog.import', compact("product_types", "proyectistas", "product_categories"));
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

        $product_categories = DB::table("product_categories")
        ->orderby('name', 'asc')
        ->where('is_deleted', 0)
        ->get();

        return view('catalog.import', compact(
            "msgCatalog",
            "product_types",
            "proyectistas",
            "product_categories"
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

    public function addProyectista(Request $request){
        $validated = Validator::make($request->all(), [
            'name' => 'required|unique:proyectistas'
        ],
        [
            'name.required' => 'El campo nombre es requerido.',
            'name.unique' => 'Ya existe un tipo con este nombre.'
        ]);
        if($validated->fails()){
            return [
                "result" => false,
                "message" => $validated->errors()->first()
            ];
        }
        try {
            $name = $request->input("name");
            $id = DB::table("proyectistas")->insertGetId([
                'name' => $name
            ]);
            $data = array(
                'id' => $id,
                'name' => $name
            );
            $result = [
                "result" => true,
                "data" => $data,
                "message" => "Se agregó el aliado correctamente."
            ];
        } catch (\Throwable $th) {
            $result = [
                "result" => false,
                "message" => "No se pudo agregar el aliado al sistema, por favor intente nuevamente."
            ];
        }

        return $result;
    }

    public function addEmail(Request $request){
        $validated = Validator::make($request->all(), [
            'txtEmail' => 'required|email'
        ],
        [
            'txtEmail.required' => 'El campo email es requerido.',
            'txtEmail.email' => 'Por favor colocar un email válido.'
        ]);
        if($validated->fails()){
            return [
                "result" => false,
                "message" => $validated->errors()->first()
            ];
        }
        try {
            $userEmail = $request->input("txtEmail");
            //Validacion que no exista ya resgitrado el correo electrónico
            $contact = Contact::where('emailContact', $userEmail)->first();

            if($contact == null){
                // Envío de correo electrónico
                $subject = "Solicitud de catálogo";
                $req = array(
                    "correo" => env('EMAIL_ADMIN')
                );
                $catalogInfo = array(
                    'aliado' => 'Nombre del aliado comercial'
                );
                $file = public_path('catalogs/RIF-2023-10-25.pdf');
                Mail::send('emails.downloadcatalog', $catalogInfo, function($message) use($req, $subject, $userEmail, $file){
                    $message->from($req["correo"], 'Web Modular Top');
                    $message->to($userEmail)->subject($subject);
                    $message->attach($file);
                });
                
                // Registro de nuevo contacto
                Contact::create([
                    'emailContact' => $userEmail,
                    'form' => 3
                ]);
            }

            $result = [
                "result" => true,
                "message" => "El catálogo fue enviado al correo suministrado."
            ];
            
        } catch (\Throwable $th) {
            // "error" => $th->getMessage()
            $result = [
                "error" => $th->getMessage(),
                "result" => false,
                "message" => "No se pudo enviar el catálogo, por favor intente nuevamente."
            ];
        }

        return $result;
    }

}
