<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

class FichaTecnicaController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'checkIfAreClient', 'administrative'], ['except' => [
            'downloadFichaTecnica', 
            'showFichaTecnica'
        ]]);
    }

    public function showFormFichaTecnica(){
        $fichas = DB::table("fichas_tecnicas")->get();
        
        return view("fichaTecnica.uploadFichaTecnica", compact("fichas"));
    }

    public function storeFichaTecnica(Request $request){

        $this->validateFichaTecnica(request()->all())->validate();

        try {
            $name = $request->input("name");
            $file = $request->file("ficha");

            $file_name = $file->getClientOriginalName();
            $file->storeAs('', $file_name, 'fichaTecnica');

            DB::table("fichas_tecnicas")->insert([
                "name" => $name,
                "file_name" => $file_name,
                "created_at" => Carbon::now(),
                "created_by" => auth()->user()->id
            ]);

            $msgPost = "¡Registro realizado satisfactoriamente!.";
            

        } catch (\Throwable $th) {
            //throw $th;
            $msgPost = "Ocurrio un error, por favor intente nuevamente.".$th->getMessage();
        }

        $fichas = DB::table("fichas_tecnicas")->get();

        return view("fichaTecnica.uploadFichaTecnica", compact("msgPost", "fichas"));

    }

    public function validateFichaTecnica(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'name' => 'required',
            'ficha' => 'required',
        ], $messages);
    }

    public function downloadFichaTecnica($id){

        $ficha = DB::table("fichas_tecnicas")->where("id", $id)->first();

        return Storage::disk("fichaTecnica")->download($ficha->file_name);

    }

    public function deleteFichaTecnica($id){

        try {
            $ficha = DB::table("fichas_tecnicas")
                ->where("id", "=", $id)
                ->first();
            
            Storage::disk('fichaTecnica')->delete($ficha->file_name);
            
            DB::table("fichas_tecnicas")
                ->where("id", "=", $ficha->id)
                ->delete();

            $msgPost = "¡Ficha técnica borrada satisfactoriamente!.";

        } catch (\Throwable $th) {
            //throw $th;
            $msgPost = "¡Hubo un error la Ficha técnica no pudo ser borrada!.";
        }

        $fichas = DB::table("fichas_tecnicas")->get();

        return view("fichaTecnica.uploadFichaTecnica", compact("msgPost", "fichas"));
    }

    public function showFichaTecnica(){
        
        $fichas = DB::table("fichas_tecnicas")->get();

        return view("fichaTecnica.showFichaTecnica", compact("fichas"));
    }
}
