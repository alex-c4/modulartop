<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Project;
use Validator;
use Storage;
use Utils;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function __construct()
    {
        // $this->middleware('verified');
        $this->middleware(['auth', 'marketing'], ['except' => ['showphotos', 'showphotosbyproyectista']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table("projects as p")
                    ->select(
                        "p.id", 
                        "p.name",
                        "p.description",
                        "pr.name as proyectista",
                        "p.is_deleted"
                        )
                    ->join("proyectistas as pr", "pr.id", "p.proyectista_id", "=", "inner", false)
                    ->orderby("p.project_date", "DESC")
                    ->get();

        return view("project.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = DB::table("providers")->get();
        $proyectistas = DB::table("proyectistas")->get();
        
        return view("project.create_1", compact('providers', 'proyectistas'));
    }
    public function create_2()
    {
        $result = array(
            "projectId" => 1,
            "projectName" => "Alex proyecto",
            "result" => true
        );
        return view("project.create_2", compact('result'));
    }
    public function create_3(){
        $result = array(
            "result" => true
        );

        return view('project.create_3', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate_proyectista($request);

        try {
            $idProyectista = intval($request->input("proyectista"));

            switch ($idProyectista) {
                case 1:
                    $this->validate_modulartop(request()->all())->validate();
                    $result = $this->save_modulartop($request);
                    break;
                case 2:
                    $this->validate_partner(request()->all())->validate();
                    $result = $this->save_partner($request);
                    break;
                case 3:
                    $this->validate_provider(request()->all())->validate();
                    $result = $this->save_provider($request);
                    break;

                default:
                    return $this->create();
                    break;
            }
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Hubo un error en el almacenamiento del proyecto, por favor intente de nuevo."
            );
        }

        if($result['result'] == true){
            // enviar al 2do paso - carga de imagenes del proyecto
            return view("project.create_2", compact("result"));
        }else{
            $msgPost = $result['message'];
            return view("project.create", compact("msgPost"));
        }

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
        $proyectistas = DB::table("proyectistas")->get();
        $providers = DB::table("providers")->get();
        $project_photos = DB::table("project_photos")->where("project_id", $id)->get();

        $project = Project::where("id", $id)->first();

        return view("project.edit", compact("project", "proyectistas", "providers", "project_photos"));
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
        $this->validate_proyectista($request);
        
        try {
            $idProyectista = intval($request->input("proyectista"));
            $projectId = intval($id);
            
            switch ($idProyectista) {
                case 1:
                    $this->validate_modulartop_update(request()->all())->validate();
                    $result = $this->update_modulartop($request, $projectId);
                    break;
                
                case 2:
                    $this->validate_partner_update(request()->all())->validate();
                    $result = $this->update_partner($request, $projectId);
                    break;
                
                case 3:
                    $this->validate_provider_update(request()->all())->validate();
                    $result = $this->update_provider($request, $projectId);

                    break;
            }

            $msgPost = "Proyecto actualizado correctamente.";
        } catch (\Throwable $th) {
            $msgPost = "Hubo un error en el almacenamiento del proyecto, por favor intente de nuevo.";
        }

        $proyectistas = DB::table("proyectistas")->get();
        $providers = DB::table("providers")->get();
        $project_photos = DB::table("project_photos")->where("project_id", $id)->get();

        $project = Project::where("id", $id)->first();

        return view("project.edit", compact("project", "proyectistas", "providers", "project_photos", "msgPost"));
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

    public function validate_proyectista($request){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        $request->validate([
            'proyectista' => 'required'
        ], $messages);
    }

    public function validate_modulartop($data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'name' => 'required',
            'client_name' => 'required',
            'project_date' => 'required',
            'description' => 'required',
            'cover_photo' => 'required',
            'cover_photo_alt_text' => 'required'
        ], $messages);
    }

    public function validate_partner($data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'partner_company' => 'required',
            'name' => 'required',
            'cover_photo' => 'required',
            'cover_photo_alt_text' => 'required'
        ], $messages);
    }

    public function validate_provider($data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'provider' => 'required',
            'name' => 'required',
            'cover_photo' => 'required',
            'cover_photo_alt_text' => 'required'
        ], $messages);
    }

    public function validate_modulartop_update($data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'name' => 'required',
            'client_name' => 'required',
            'project_date' => 'required',
            'description' => 'required',
            'cover_photo_alt_text' => 'required'
        ], $messages);
    }

    public function validate_partner_update($data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'partner_company' => 'required',
            'name' => 'required',
            'cover_photo_alt_text' => 'required'
        ], $messages);
    }

    public function validate_provider_update($data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'provider' => 'required',
            'name' => 'required',
            'cover_photo_alt_text' => 'required'
        ], $messages);
    }

    public function save_modulartop($request){
        try {
            $project = Project::create([
                "proyectista_id" => $request->input("proyectista"),
                "name" => $request->input("name"),
                "client_name" => $request->input("client_name"),
                "project_date" => $request->input("project_date"),
                "description" => $request->input("description"),
                "ubication" => $request->input("ubication"),
                "created_by" => auth()->user()->id
            ]);

            $result = $this->save_images($request, $project);

            return $result;
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Error en el almacenamiento del proyecto."
            );
        }

        return $result;
    }

    public function save_partner($request){
        try {
            $project = Project::create([
                "proyectista_id" => $request->input("proyectista"),
                "partner_company" => $request->input("partner_company"),
                "name" => $request->input("name"),
                "description" => $request->input("description"),
                "ubication" => $request->input("ubication"),
                "created_by" => auth()->user()->id
            ]);

            $result = $this->save_images($request, $project);

            return $result;
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Error en el almacenamiento del proyecto.".$th->getmessage()
            );
        }

        return $result;
    }

    public function save_provider($request){
        try {
            $project = Project::create([
                "proyectista_id" => $request->input("proyectista"),
                "provider_id" => $request->input("provider"),
                "name" => $request->input("name"),
                "description" => $request->input("description"),
                "ubication" => $request->input("ubication"),
                "created_by" => auth()->user()->id
            ]);

            $result = $this->save_images($request, $project);

            return $result;
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Error en el almacenamiento del proyecto.".$th->getmessage()
            );
        }

        return $result;
    }

    public function update_modulartop($request, $projectId){
        try {
            $project = Project::where("id", $projectId)->first();

            $project->proyectista_id = $request->input("proyectista");
            $project->name = $request->input("name");
            $project->client_name = $request->input("client_name");
            $project->project_date = $request->input("project_date");
            $project->description = $request->input("description");
            $project->cover_photo_alt_text = $request->input("cover_photo_alt_text");
            $project->ubication = $request->input("ubication");
            $project->updated_by = auth()->user()->id;
            $project->updated_at = Carbon::now();
            $project->save();

            $result = $this->update_images($request, $project);

            return $result;
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Error en el almacenamiento del proyecto."
            );
        }

        return $result;
    }

    public function update_partner($request, $projectId){
        try {
            $project = Project::where("id", $projectId)->first();

            $project->proyectista_id = $request->input("proyectista");
            $project->partner_company = $request->input("partner_company");
            $project->name = $request->input("name");
            $project->cover_photo_alt_text = $request->input("cover_photo_alt_text");
            $project->description = $request->input("description");
            $project->ubication = $request->input("ubication");
            $project->updated_by = auth()->user()->id;
            $project->updated_at = Carbon::now();
            $project->save();

            $result = $this->update_images($request, $project);

            return $result;
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Error en el almacenamiento del proyecto."
            );
        }

        return $result;
    }

    public function update_provider($request, $projectId){
        try {
            $project = Project::where("id", $projectId)->first();

            $project->proyectista_id = $request->input("proyectista");
            $project->provider_id = $request->input("provider");
            $project->name = $request->input("name");
            $project->cover_photo_alt_text = $request->input("cover_photo_alt_text");
            $project->description = $request->input("description");
            $project->ubication = $request->input("ubication");
            $project->updated_by = auth()->user()->id;
            $project->updated_at = Carbon::now();

            $result = $this->update_images($request, $project);

            return $result;
        } catch (\Throwable $th) {
            $result = array(
                "result" => false,
                "message" => "Error en el almacenamiento del proyecto.".$th->getmessage()
            );
        }

        return $result;
    }

    public function uploadimg(Request $request){
        $result = "";

        $validator = Validator::make($request->all(),[
            'project_photo' => 'required',
            'alt_text' => 'required'
        ]);

        if($validator->fails()){
            $result = array(
                "result" => false,
                "message" => "No se realizó la operación debido que faltan datos, por favor complete toda la información."
            );
        }else{
            try {
                $projectId = $request->input("hProjectId");
                $alt_text = $request->input("alt_text");
                $file = $request->file("project_photo");

                $file_name = $projectId . "_" . $file->getClientOriginalName();
                $file->storeAs("proyectos", $file_name, "local");

                $id = DB::table("project_photos")->insertGetId([
                    "project_id" => $projectId,
                    "name" => $file_name,
                    "alt_text" => $alt_text
                ]);

                $result = array(
                    "result" => true,
                    "message" => "Registro de la imagen correctamente.",
                    "data" => array(
                        "id" => $id,
                        "name" => $file_name,
                        "alt_text" => $alt_text
                    )
                );
            } catch (\Throwable $th) {
                //throw $th;
                $result = array(
                    "result" => false,
                    "message" => $th->getmessage()
                );
            }

        }


        return $result;
    }

    public function deleteimg(Request $request){
        try {
            $id = $request->input("id");
            $project_photo = DB::table('project_photos')->where('id', $id)->first();
            $file_name = $project_photo->name;
            Storage::disk('local')->delete('proyectos/' . $file_name);

            DB::table('project_photos')->where('id', '=', $id)->delete();

            $result = array(
                "result" => true,
                "message" => "Imágen eliminada correctamente"
            );

        } catch (\Throwable $th) {
            //throw $th;

            $result = array(
                "result" => false,
                "message" => "Ocurrio un error la imágen no fue eliminada.".$th->getmessage()
            );
        }

        return $result;
    }

    private function save_images($request, $project){

            // Almacenamiento de imagenes
            // Portada
            $cover_photo = $request->file("cover_photo");
            $file_name = $project->id . "_" . $cover_photo->getClientOriginalName();
            $cover_photo->storeAs('proyectos', $file_name, 'local');
            $project->cover_photo = $file_name;
            $project->cover_photo_alt_text = $request->input("cover_photo_alt_text");

            //Foto de plano
            $plane_photo = $request->file("plane_photo");
            if($plane_photo != null){
                $file_name = $project->id . "_" . $plane_photo->getClientOriginalName();
                $plane_photo->storeAs('proyectos', $file_name, 'local');
                $project->plane_photo = $file_name;
            }

            $project->save();

            $result = array(
                "projectId" => $project->id,
                "projectName" => $project->name,
                "result" => true
            );

            return $result;
    }

    private function update_images($request, $project){

            // Almacenamiento de imagenes
            // Portada
            $cover_photo = $request->file("cover_photo");
            if($cover_photo != null){
                $file_name = $project->id . "_" . $cover_photo->getClientOriginalName();
                // Se borra la foto anterior
                Storage::disk('local')->delete('proyectos/' . $project->cover_photo);

                // Se guarda la nueva foto
                $cover_photo->storeAs('proyectos', $file_name, 'local');
                $project->cover_photo = $file_name;
            }

            //Foto de plano
            $plane_photo = $request->file("plane_photo");
            if($plane_photo != null){
                $file_name = $project->id . "_" . $plane_photo->getClientOriginalName();

                // Validar la existencia del archivo para borrarlo
                if($project->plane_photo != ""){
                    $exist = Storage::disk("local")->exists("proyectos/" . $project->plane_photo);
                    if($exist){
                        Storage::disk('local')->delete('proyectos/' . $project->plane_photo);
                    }
                }

                $plane_photo->storeAs('proyectos', $file_name, 'local');
                $project->plane_photo = $file_name;
            }

            $project->save();

            $result = array(
                "projectId" => $project->id,
                "projectName" => $project->name,
                "result" => true
            );

            return $result;
    }

    public function searchalttext(Request $request){
        try {
            $id = $request->input("id");
            $value = DB::table("project_photos")->where("id", $id)->first();
            $result = array(
                "result" => true,
                "alt_text" => $value->alt_text
            );
        } catch (\Throwable $th) {
            //throw $th;
            $result = array(
                "result" => false,
                "message" => "Hubo un error en la consulta."
            );
        }

        return $result;

    }

    public function updatetext(Request $request){
        try {
            $name = $request->input("alt_text");
            $id = intval($request->input("id"));
            
            $photo = DB::table("project_photos")
                ->where("id", $id)
                ->update([
                    "alt_text" => $name
                ]);

            $result = array(
                "result" => true,
                "message" => "Se actualizo el registro correctamente"
            );
        } catch (\Throwable $th) {
            //throw $th;
            $result = array(
                "result" => false,
                "message" => "Hubo un error en la consulta.".$th->getmessage()
            );
        }

        return $result;
    }

    public function showphotos($id){
        $proyectista_name = "";
        $project_description = "";
        $project_name = "";

        $photos = DB::table("project_photos as pp")
            ->select(
                "pp.name as photo",
                "pp.alt_text",
                "pr.name as project_name",
                "pr.project_date",
                "pr.description as project_description",
                "pro.name as proyectista"
            )
            ->join("projects as pr", "pp.project_id", "=", "pr.id", "inner", false)
            ->join("proyectistas as pro", "pr.proyectista_id", "=", "pro.id", "inner", false)
            ->where("pp.project_id", $id)->get();
            
            if(count($photos) > 0){
                $proyectista_name = $photos[0]->proyectista;
                $project_description = $photos[0]->project_description;
                $project_name = $photos[0]->project_name;

            }
            
        return view("project.showphotos", compact("photos", "proyectista_name", "project_description", "project_name"));
    }

    public function showphotosbyproyectista(){

        $proyectistas = DB::table("proyectistas")->get();
        $allProjects = array();

        foreach($proyectistas as $proyectista){
            $projects = DB::table("projects as pr")
                ->select(
                    "pr.id as projectId",
                    "pr.name as project_name",
                    "pr.cover_photo",
                    "pr.cover_photo_alt_text",
                    "pr.proyectista_id",
                    "pr.project_date",
                    "p.prefix",
                    "p.name as proyectista_name",
                    "p.id"
                    )
                ->join("proyectistas as p", "p.id", "=", "pr.proyectista_id", "inner", false)
                ->where("pr.proyectista_id", "=", $proyectista->id)
                ->orderby("pr.project_date", "DESC")
                ->get();
            
                array_push($allProjects, $projects);
        }

        return view("project.showphotosbyproyectista", compact("proyectistas", "allProjects"));
    }
    
    public function delete($id){

        try{
            $msgPost = $this->changeStatus($id, 1);
        }catch(\Throwable $th){
            $msgPost = "Hubo un error en la eliminación del proyecto, por favor intente de nuevo.";
        }

        $projects = $projects = $this->getProjects();

        return view("project.index", compact("projects", "msgPost"));        
    }   
    
    public function restore($id){
        try {
            $msgPost = $this->changeStatus($id, 0);
        } catch (\Throwable $th) {
            //throw $th;
        }

        $projects = $this->getProjects();

        return view("project.index", compact("projects", "msgPost"));
    }

    private function changeStatus($id, $status){
        try {
            $project = Project::where("id", $id)->first();
            $project->is_deleted = $status;
            $project->updated_at = Carbon::now();
            $project->update();
    
            switch($status){
                case 1:
                    $msgPost = "Proyecto eliminado correctamente.";
                    break;
                case 2:
                    $msgPost = "Proyecto activado correctamente.";
                    break;
                default:
                    $msgPost = "Operación llevada a cabo satisfactoriamente.";
                    break;
            }
        } catch (\Throwable $th) {
            $msgPost = "Hubo un error en la operación, por favor intente nuevamente!";
        }
        return $msgPost;
    }

    private function getProjects(){
        return DB::table("projects as p")
                ->select(
                    "p.id", 
                    "p.name",
                    "p.description",
                    "pr.name as proyectista",
                    "p.is_deleted"
                    )
                ->join("proyectistas as pr", "pr.id", "p.proyectista_id", "=", "inner", false)
                ->orderby("p.project_date", "DESC")
                ->get();
    }
}
