<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Mail;
use Carbon\Carbon;

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
            // proceso llamdao desde formulario de contacto
            $file = $request->file('name_file');
            $fileName = "";
            if($file != null){
                $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();
            }
            
            $name = $request->input('fname');
            $lastName = $request->input('lname');
            $email = $request->input('email');
            $subject = $request->input('subject');
            $messageContact = $request->input('message');

            Contact::create([
                'nameContact' => $name,
                'lastNameContact' => $lastName,
                'emailContact' => $email,
                'subject' => $subject,
                'message' => $messageContact,
                'name_file' => $fileName
            ]);

            $data = array(
                'email' => $email,
                'name' => $name,
                'lastName' => $lastName,
                'subject' => $subject,
                'messageContact' => $messageContact
            );
            
            if($file != null){
                $request->file('name_file')->storeAs('files', $fileName, 'filesContact');
            }

            $req = array(
                "correo" => env('EMAIL_ADMIN')
            );
            
            $pathToFile = public_path('filesContact/files') . '\\' . $fileName;

            if($file != null){
                Mail::send('emails.contactuser', $data, function($message) use($req, $pathToFile){
                    $message->from($req["correo"], 'Web Modular Top');
                    $message->to($req["correo"])->subject('Nuevo Contacto');
                    $message->attach($pathToFile);
                });
            }else{
                Mail::send('emails.contactuser', $data, function($message) use($req){
                    $message->from($req["correo"], 'Web Modular Top');
                    $message->to($req["correo"])->subject('Nuevo Contacto');
                });
            }

            $result = array(
                "success" => true,
                "message" => "Su mensaje a sido enviado. Muchas gracias!"
            );
            return $result;

        } catch (\Throwable $th) {
            //throw $th;

            $result = array(
                "success" => false,
                "message" => "Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!" . $th
            );
        }
            
        return $result;
    }

    public function contact(Request $request){
        // proceso llamdao desde suscripcion a novedades
        if(request()->emailnews != null){
            $email = request()->emailnews;
        }else if(request()->emailnews3 != null){
            $email = request()->emailnews3;
        }else if(request()->emailnews4 != null){
            $email = request()->emailnews4;
        }

        try {
            Contact::create([
            'emailContact' => $email
            ]);

            //envio de correo al administrador de Modular Top
            $data = array(
                'email' => $email
            );
            $req = array(
                "correo" => env('EMAIL_ADMIN')
            );
            
            Mail::send('emails.suscriptionnews', $data, function($message) use($req){
                $message->from($req["correo"], 'Web Modular Top');
                $message->to($req["correo"])->subject('Subcripción a novedades');
            });
                
            $result = array(
                "success" => true,
                "message" => "Registro satisfactorio!"
            );

        } catch (\Throwable $th) {
            $result = array(
                "success" => false,
                "message" => "Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!->".$th
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
