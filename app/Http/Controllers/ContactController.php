<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
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
        try {

            $name = request()->fname;
            $lastName = request()->lname;
            $email = request()->email;
            $subject = request()->subject;
            $messageContact = request()->message;

            // $result = array(
            //     "success" => true,
            //     "message" => $name . "/ " .$lastName. "/ " .$email. "/ " .$subject. "/ " .$messageContact
            // );
            // return $result;

            Contact::create([
                'nameContact' => $name,
                'lastNameContact' => $lastName,
                'emailContact' => $email,
                'subject' => $subject,
                'message' => $messageContact
            ]);

            $result = array(
                "success" => true,
                "message" => "Su mensaje a sido enviado. Muchas gracias!"
            );
            return $result;

        } catch (\Throwable $th) {
            //throw $th;

            $result = array(
                "success" => false,
                "message" => "Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!"
            );
        }
            
        return $result;
    }

    public function newsletter(Request $request){

        $email = request()->emailnews;

        try {
            Contact::create([
            'emailContact' => $email
            ]);
                
            $result = array(
                "success" => true,
                "message" => "Registro satisfactorio!"
            );

        } catch (\Throwable $th) {
            $result = array(
                "success" => false,
                "message" => "Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!"
            );
        }

        return $result;
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

    public function tellUs(){
        return view('contact.tellus');
    }
    public function tellUs2(){
        return view('tellus2');
    }
}
