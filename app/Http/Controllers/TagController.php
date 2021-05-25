<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
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

    public function search_tags(Request $request){
        $result = "";
        // $result = array([
        //         "value" => 1,
        //         "text" => "Casa"
        //     ]);
        // $result = array("Casa", "madera");

        // $result = User::where("id", "26")
        //     ->select("id", "name")
        //     ->get();

        $_filter = '%' . $request->input('q'). '%';
        $result = Tag::where('name', 'like', $_filter)
            ->select('id as value', 'name as text')
            ->get();

        return $result;
    }

    public function store_ajax(Request $request)
    {
        $result = "";
        
        try {
            $tagName = $request->input("tagName");

            $tag = Tag::create([
                'name' => $tagName,
            ]);

            $result = array(
                "result" => true,
                "value" => $tag->id,
                "text" => $tag->name
            );

        } catch (\Illuminate\Database\QueryException $ex) {
            $result = array(
                "result" => false,
                "value" => 0,
                "text" => $tagName
            );
        }

           
        return $result;
    }
}
