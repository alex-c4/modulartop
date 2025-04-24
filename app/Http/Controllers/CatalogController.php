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
        
        $aliados = DB::table("aliados")
            ->orderby('name', 'asc')
            ->get();
        
        $product_categories = DB::table("product_categories")
            ->orderby('name', 'asc')
            ->where('is_deleted', 0)
            ->get();

        return view('catalog.import', compact("product_types", "aliados", "product_categories"));
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
                "id_aliado" => $request->input('aliado'),
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
        
        $aliados = DB::table("aliados")
            ->orderby('name', 'asc')
            ->get();

        $product_categories = DB::table("product_categories")
        ->orderby('name', 'asc')
        ->where('is_deleted', 0)
        ->get();

        return view('catalog.import', compact(
            "msgCatalog",
            "product_types",
            "aliados",
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
            'aliado' => 'required',
            'catalog' => 'required|mimes:pdf',
        ], $messages);
    }

    public function deletedIfExist($request){
        $id_product_type = $request->input('type');
        $id_aliado = $request->input('aliado');
        // $catalog = Catalog::where('id_product_type', $id_product_type)
        $catalog = Catalog::where('id_aliado', $id_aliado)
            ->first();
        if($catalog != null){
            // Borrar PDF
            Storage::disk('global')->delete('catalogs/' . $catalog->file_name);

            //Borrar registro de la BD
            // Catalog::where('id_product_type', $id_product_type)
            Catalog::where('id_aliado', $id_aliado)
            ->delete();
        }
    }

    public function addAliado(Request $request){
        $validated = Validator::make($request->all(), [
            'name' => 'required|unique:aliados'
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
            $id = DB::table("aliados")->insertGetId([
                'name' => $name,
                'prefix' => strtolower(str_replace(" ", "", $name))
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
            'txtEmail' => 'required|email',
            'hAliado' => 'required'
        ],
        [
            'txtEmail.required' => 'El campo email es requerido.',
            'txtEmail.email' => 'Por favor colocar un email válido.',
            'hAliado.required' => 'Hay datos incompletos en la solicitud. Por favor, cierre la ventana y vuelva a seleccionar el aliado comercial.'
        ]);
        if($validated->fails()){
            return [
                "result" => false,
                "message" => $validated->errors()->first()
            ];
        }
        try {
            $userEmail = $request->input("txtEmail");
            $aliado = $request->input("hAliado");
            //Validacion que no exista ya resgistrado el correo electrónico
            $contact = Contact::where('emailContact', $userEmail)->first();

            if($contact == null){
                // Envío de correo electrónico
                $result = $this->sendEmail($userEmail, $aliado);
                
                // Registro de nuevo contacto
                Contact::create([
                    'emailContact' => $userEmail,
                    'form' => 3
                ]);
            }else{
                // Envío de correo electrónico
                $result = $this->sendEmail($userEmail, $aliado);
            }
            
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

    public function sendEmail($userEmail, $aliado){
        $subject = "Solicitud de catálogo";
        $req = array(
            "correo" => env('EMAIL_ADMIN')
        );
        $file = $this->getFile($aliado);
        if($file == null){
            $result = [
                "result" => false,
                "message" => "El aliado comercial seleccionado no posee aún un catálogo cargado en el sistema."
            ];
        }else{
            //Obtener nombre del Aliado (antiguamente proyectista)
            $aliado = DB::table('aliados')->where('prefix', $aliado)->first();
            $catalogInfo = array(
                'aliado' => $aliado->name
            );
            // Mail::send('emails.downloadcatalog', $catalogInfo, function($message) use($req, $subject, $userEmail, $file){
            //     $message->from($req["correo"], 'Web Modular Top');
            //     $message->to($userEmail)->subject($subject);
            //     $message->attach($file);
            // });

            $result = [
                "result" => true,
                "file_name" => $file,
                "file_url" => asset('catalogs'),
                "message" => "El catálogo se descargará automaticamente."
            ];
        }
        return $result;
    }

    public function getFile($aliado){
        $aliado = DB::table('aliados')->where('prefix', $aliado)->first();
        
        if($aliado == null){
            return null;
        }else{
            $file = Catalog::where('id_aliado', $aliado->id)->first();
            if($file == null){
                return null;
            }else{
                return $file->file_name;
            }
        }
    }

}
