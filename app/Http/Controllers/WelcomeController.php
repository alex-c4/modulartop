<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //comentado temporalmente, para no mostrar mensaje navideño 
        $show_image = env("SHOW_BANNER", false);
        $show = "false";
        // $exist = session()->has('showMessage');
            // var_dump($exist);
        if($show_image){
            $exist = session()->has('showMessage');
            if($exist){
                $show = "false";
            } else{
                session(['showMessage' => 'true']);
                $show = "true";
            }
            // $show = "false";
        }

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
                    "p.prefix",
                    "p.name as proyectista_name",
                    "p.id"
                    )
                ->join("proyectistas as p", "p.id", "=", "pr.proyectista_id", "inner", false)
                ->limit(6, 0)
                ->where("pr.proyectista_id", "=", $proyectista->id)
                ->where("pr.is_deleted", "=", 0)
                ->orderby("pr.project_date", "DESC")
                ->get();
                array_push($allProjects, $projects);
        }

        
        return view('welcome', compact('show', 'proyectistas', 'allProjects'));
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

}
