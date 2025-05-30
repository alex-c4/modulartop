<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Newsletter;
use Illuminate\Support\Facades\Validator;

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

    public function formContact(Request $request){
        // $this->validation(request()->all())->validate();
        $validator = $this->validation(request()->all());
        if($validator->fails()){
            return redirect("/#contact-section")
                ->withErrors($validator)
                ->withInput();
        }else{
            return $this->store($request);
        }


    }

    public function formFabricacion(Request $request){
        
        $this->validation(request()->all())->validate();
        
        dd("paso!!!");
        return $this->store($request);
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
            // proceso llamado desde formulario de contacto
            $file = $request->file('name_file');
            $fileName = "";
            if($file != null){
                $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();
            }
            
            $name = $request->input('fname');
            // $lastName = $request->input('lname');
            $email = $request->input('email');
            $messageContact = $request->input('message');
            $form = $request->input('hform');
            $whatsapp = $request->input('whatsapp');
            $linkedin = $request->input('linkedin');
            $instagram = $request->input('instagram');
            $facebook = $request->input('facebook');
            $pinterest = $request->input('pinterest');

            Contact::create([
                'nameContact' => $name,
                'emailContact' => $email,
                'message' => $messageContact,
                'name_file' => $fileName,
                'form' => $form,
                'whatsapp' => $whatsapp,
                'linkedin' => $linkedin,
                'instagram' => $instagram,
                'facebook' => $facebook,
                'pinterest' => $pinterest
            ]);

            $data = array(
                'email' => $email,
                'name' => $name,
                'messageContact' => $messageContact
            );
            
            if($file != null){
                $request->file('name_file')->storeAs('files', $fileName, 'filesContact');
            }

            $req = array(
                "correo" => env('EMAIL_ADMIN')
            );
            
            $pathToFile = public_path('filesContact/files') . '//' . $fileName;

            switch ($form) {
                case '1':
                    $subject = "Nuevo contacto";
                    break;
                case '2':
                    $subject = "Nuevo contacto (Fabricación)";
                    break;
            }

            // if($file != null){
            //     Mail::send('emails.contactuser', $data, function($message) use($req, $pathToFile, $subject){
            //         $message->from($req["correo"], 'Web Modular Top');
            //         $message->to($req["correo"])->subject($subject);
            //         $message->attach($pathToFile);
            //     });
            // }else{
            //     Mail::send('emails.contactuser', $data, function($message) use($req, $subject){
            //         $message->from($req["correo"], 'Web Modular Top');
            //         $message->to($req["correo"])->subject($subject);
            //     });
            // }

            //obtener los tres primeros newsletters
            $newsletter_top3 = Newsletter::select('newsletters.id', 'newsletters.title', 'newsletters.created_at', 'newsletters.isDeleted', 'newsletters.title as url', 'newsletters.name_img', 'newsletters.summary')
                ->orderby("created_at", "desc")
                ->where("isDeleted", "0")
                ->limit(3)
                ->get();

            foreach($newsletter_top3 as $row){
                $row->url =  str_replace(" ", "-", $row->url);
            }
            
            $url_novedades = route('novedades');
            // dd($form);
            switch ($form) {
                case '1':
                    $result = array(
                        "success" => true,
                        "title" => "¡MUCHAS GRACIAS POR CONTACTARNOS!",
                        "subtitle" => "¡En breve estaremos dando respuesta a tu solicitud!",
                        "content_arr" => array(
                            "<div class='mb-'>Aprovechamos esta oportunidad para invitarte a conocer nuestro <a href='". $url_novedades ."'>blog de novedades</a>, donde podrás conseguir publicaciones interesantes y si lo deseas puedes suscribirte a nuestro Newsletter y recibir por correo cuando se publiquen novedades.</div>",
                            "<div class='contenido'>Visita nuestras últimas publicaciones:</div>"
                        )
                    );
                    return view("contact.messageContact", compact("result", "newsletter_top3"));

                break;
                case '2':
                    $result = array(
                        "success" => true,
                        "title" => "¡MUCHAS GRACIAS POR HACERNOS PARTE DE TU PROYECTO!",
                        "subtitle" => "¡En breve te contactaremos desde el departamento de proyectos para que hagamos juntos realidad tu idea!",
                        "content_arr" => array(
                            "<div class='mb-'>Aprovechamos esta oportunidad para invitarte a conocer nuestro <a href='". $url_novedades ."'>blog de novedades</a>, donde podrás conseguir publicaciones interesantes que inspiraran aún más tu proyecto. Si lo deseas puedes suscribirte a nuestro Newsletter y recibir por correo las nuevas publicaciones.</div>",
                            "<div class='contenido'>Inspírate con nuestras últimas publicaciones:</div>"
                        )
                    );
                    return view("fabricacion.messageFabrication", compact("result", "newsletter_top3"));
                break;
            };
            //return $result;

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
        $form = request()->hform;
        if(request()->emailnews != null){
            $email = request()->emailnews;
        }else if(request()->emailnews3 != null){
            $email = request()->emailnews3;
        }else if(request()->emailnews4 != null){
            $email = request()->emailnews4;
        }

        try {
            Contact::create([
            'emailContact' => $email,
            'form' => $form
            ]);

            //envio de correo al administrador de Modular Top
            $data = array(
                'email' => $email
            );
            $req = array(
                "correo" => env('EMAIL_ADMIN')
            );
            
            // Mail::send('emails.suscriptionnews', $data, function($message) use($req){
            //     $message->from($req["correo"], 'Web Modular Top');
            //     $message->to($req["correo"])->subject('Subcripción a novedades');
            // });
                
            $result = array(
                "success" => true,
                "message" => "Registro satisfactorio!"
            );

        } catch (\Throwable $th) {
            $result = array(
                "success" => false,
                "message" => "Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!->"
            );
            // "message" => "Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!->".$th
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

    public function validation_bk($data){
        $messages = [
            'required' => 'El campo es requerido',
            'g-recaptcha-response.required' => 'Debe realizar la selección del captcha',
            'g-recaptcha-response.captcha' => '¡Error de CAPTCHA! inténtelo de nuevo más tarde o comuníquese con el administrador del sitio.'
        ];
        return Validator::make($data, [
            'g-recaptcha-response' => 'required|captcha',
            'fname' => 'required',
            'email' => 'required',
        ], $messages);

    }
    public function validation($data){
        $messages = [
            'required' => 'El campo es requerido'
        ];
        return Validator::make($data, [
            'fname' => 'required',
            'email' => 'required',
        ], $messages);

    }
}
