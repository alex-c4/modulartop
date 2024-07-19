@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/user-register.css') }}?v={{ env('APP_VERSION', '1') }}">

    {!! NoCaptcha::renderJs() !!}

@endsection

@section('content')
<!-- <div class="container"> -->
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banner/fabricacion.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Bienvenido</h1>
            <p class="mb-5"><strong class="text-white">registro de nuevo cliente. aqui</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div> 

    <section class="blog-section spad" id="blog">
        <div class="container">
        <br>
            <div class="row justify-content-center">
                <div class="col-md-4 benefits d-flex">
                    <div class="benefits-container">

                        <div class="benefits-header">
                            <img src="{{ asset('images/modulartop.png') }}" alt="" srcset="">
                            <hr class="white">
                        </div>
    
                        <div>
                            <h1>Beneficios de tener una cuenta en <a href="{{ env('APP_URL') }}">modulartop.com</a></h1>
                            <div class="flex-d contenedor m-3">
                                <div>
                                    <ul>
                                        <li>Acceso y descarga de características, descripción y ficha técnica de productos.</li>
                                        <li>Acceso a precios e inventario actualizado de productos.</li>
                                        <li>Consultar galería de imágenes de los productos.</li>
                                        <li>Generar requerimiento y seguimiento online de mi compra.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-8">
                    <div class="">

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Nombre -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>

                                    <div class="col-md-6">
                                        <input maxlength="20" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label text-md-right">Apellido<span>*</span></label>

                                    <div class="col-md-6">
                                        <input maxlength="20" id="lastName" name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required>

                                        @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico<span>*</span></label>

                                    <div class="col-md-6">
                                        <input maxlength="60" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Clave -->
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Clave<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- confirmar clave -->
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirmar clave<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required >
                                    </div>
                                </div>

                                <!-- Imagen del cliente -->
                                <!-- <div class="form-group row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">Imagen</label>

                                    <div class="col-md-6">
                                        <input id="avatar" type="file" class="form-control" name="avatar" accept="image/png,image/jpeg,image/jpg">
                                    </div>
                                </div> -->

                                <!-- Telefono del cliente -->
                                <div class="form-group row">
                                    <label for="clientPhone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                    <div class="col-md-6">
                                        <input id="clientPhone" type="number" class="form-control" name="clientPhone" value="{{ old('clientPhone') }}">
                                    </div>
                                </div>

                                <!-- Direccion del cilente -->
                                <input type="hidden" name="clientAddress" id="clientAddress">
                                <!-- <div class="form-group row">
                                    <label for="clientAddress" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="clientAddress" name="clientAddress" rows="3">{{ old('clientAddress') }}</textarea>
                                    </div>
                                </div> -->

                                <!-- Es cliente -->
                                <div class="form-group row">
                                    <div class="col-md-4 text-md-right">
                                        <label class="form-check-label" for="chkClient">Soy o quiero ser cliente</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="chkClient" name="chkClient">
                                        </div>
                                    </div>
                                </div>

                                <!-- contenedor cliente -->
                                <div class="container-hidden" id="divContainer">

                                    <!-- RIF -->
                                    <div class="form-group row">

                                        <label for="rif" class="col-md-4 col-form-label text-md-right">Rif<span>*</span></label>

                                        <div class="col-md-6">
                                            <input maxlength="20" id="rif" type="text" class="form-control @error('rif') is-invalid @enderror uppercase-field" name="rif" >

                                            @error('rif')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Razon social -->
                                    <div class="form-group row">

                                        <label for="rsocial" class="col-md-4 col-form-label text-md-right">Razón social<span>*</span></label>

                                        <div class="col-md-6">
                                            <input maxlength="50" id="rsocial" name="rsocial" type="text" class="form-control @error('rsocial') is-invalid @enderror" >

                                            @error('rsocial')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Direccion del cliente -->
                                    <div class="form-group row">
                                        <label for="companyAddress" class="col-md-4 col-form-label text-md-right">Dirección fiscal<span>*</span></label>
                                        <div class="col-md-6">
                                            <textarea class="form-control @error('companyAddress') is-invalid @enderror" id="companyAddress" name="companyAddress" rows="3"></textarea>
                                            @error('companyAddress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Telefono -->
                                    <div class="form-group row">
                                        <label for="companyPhone" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                                        <div class="col-md-6">
                                            <input id="companyPhone" type="number" class="form-control @error('companyPhone') is-invalid @enderror" name="companyPhone" >
                                            @error('companyPhone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Tipo de empresa  -->
                                    <div class="form-group row">
                                        <label for="company_type" class="col-md-4 col-form-label text-md-right">Tipo de empresa<span>*</span></label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="company_type" name="company_type">
                                            @foreach($company_types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Imagen de la compañia -->
                                    <!-- <div class="form-group row">
                                        <label for="companyLogo" class="col-md-4 col-form-label text-md-right">Logo</label>

                                        <div class="col-md-6">
                                            <input id="companyLogo" type="file" class="form-control" name="companyLogo" accept="image/png,image/jpeg,image/jpg">
                                        </div>
                                    </div> -->

                                </div><!-- fin contenedor cliente -->

                                <div class="form-group row">
                                    <div class="col-md-3 text-md-right">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <small id="emailHelp" class="form-text text-muted"><span>*</span> Campos obligatorios</small>
                                    </div>
                                </div>
    
                                @if ($errors->has('g-recaptcha-response'))
                                    <div class="row form-group">
                                    <div class="col-md-3 text-md-right">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <div class="invalid-field">
                                            {{ $errors->first('g-recaptcha-response') }}
                                        </div>
                                    </div>
                                    </div>
                                @endif
                                
                                <div class="row form-group">
                                    <div class="col-md-3 text-md-right">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                    {!! NoCaptcha::display() !!}
                                    <!-- <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_KEY') }}"></div> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registrarme
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row m-3">
                                    <div class="col-md-12">
                                    Al hacer clic en el botón “Registrarme“, acepto expresamente los <ins><a href="javascript:void(0)" data-toggle="modal" data-target="#termCondictionModal">Términos y Condiciones de Modular Top</a></ins> y entiendo que la información de mi cuenta será usada de acuerdo con la <ins><a href="javascript:void(0)" data-toggle="modal" data-target="#privacyPoliciesModal">Política de Privacidad de Modular Top</a></ins>.
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                    <br>

                </div>
            </div>
        </div>
    </section>


<!-- Modal -->
<div class="modal fade" id="termCondictionModal" tabindex="-1" aria-labelledby="termCondictionModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <strong>Términos y condiciones de contratación electrónica con Modular Top C.A.</strong>
        <!-- <h5 class="modal-title" id="termCondictionModalLabel">Términos y condiciones</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body m-3 font-size-sm small">
        <div class="mb-2">
            El sitio web se encuentra en la dirección https://www.modulartop.com (en lo sucesivo, La
            &quot;Plataforma&quot;) y pertenece a la sociedad MODULAR TOP C.A., RIF J-40035133-2 con domicilio en la
            ciudad de Caracas, Venezuela. Asimismo, se entenderá como “Usuario” a aquellas personas que
            independientemente se hubieran registrado o no como usuarios de la Plataforma, contraten los
            servicios ofrecidos a través de esta.
        </div>
        <div class="mb-2">
            1. La plataforma digital “MODULARTOP.COM”, está orientada comercialización y contratación de
            servicios de corte o seccionado, mecanizado, pegado de tapa canto de tableros de madera,
            además de fabricación de mobiliarios. Cuando crea una cuenta y acepta estos términos, se
            convierte en miembro de nuestra comunidad. Mediante el registro y contratación de los servicios
            que brinda, usted está dando su expreso consentimiento a los presentes términos y condiciones
            de contratación electrónica que se describen en este documento (en adelante, los “Términos y
            Condiciones”), como asimismo a nuestra política de privacidad y de protección de datos.
            Navegación:
        </div>

        <div class="mb-2">
            2. Las personas que ingresen al dominio de la Plataforma podrán navegar por ella libremente sin
            necesidad de tener una cuenta registrada, no obstante será requisito esencial que los Usuarios
            sean mayores de dieciocho años y tengan plena capacidad de ejercicio sobre sus actos.
            Afiliación
        </div>

        <div class="mb-2">
            3. Para acceder a servicios exclusivos que ofrece Modular Top a través de su plataforma, el usuario
            deberá adquirir una afiliación o registro, ingresando ciertos datos que le serán requeridos, los
            cuales serán solicitados únicamente para los efectos de comunicación y contacto. El Usuario podrá
            en todo momento darse de baja o eliminar su cuenta directamente en la Plataforma o solicitarlo
            por escrito al correo electrónico de soporte técnico.
        </div>
        <div class="mb-2">
            4. Su responsabilidad: Usted promete que la información que nos brinda es verdadera, precisa y
            completa y, si se registra para obtener una cuenta de Modular Top, mantendrá actualizada la
            información de su cuenta. Usted es responsable de cualquier uso en la plataforma, incluida
            cualquier actividad que ocurra con su nombre de usuario y contraseña, así que mantenga su
            contraseña segura y no permita que ninguna otra persona use su nombre de usuario o contraseña.
            Si se da cuenta de que hay un uso no autorizado de su contraseña o de una violación de la
            seguridad, debe informarnos de inmediato.
        </div>

        <div class="mb-2">
            5. Modular Top tendrá en todo momento el derecho a cancelar la cuenta de un Usuario o no
            permitir el acceso a ella, si el mismo llegase a incumplir con cualquiera de las obligaciones que se
            imponen a través de los presentes Términos y Condiciones o haga un uso inadecuado dentro de la
            Plataforma.
        </div>
        
        <div class="mb-2">
            <strong>Privacidad y protección de datos personales.</strong>
        </div>

        <div class="mb-2">
            6. Valoramos su información y tomamos precauciones para protegerla. El Usuario, al aceptar los
            presentes términos y condiciones, autoriza a Modular Top a hacer uso de dichos datos que ésta
            pudiera obtener del registro y uso de la Plataforma. No obstante, se mantendrán en estricta
            reserva todos aquellos datos de carácter personal que cada Usuario ingrese. Los datos personales
            de los usuarios no serán transmitidos, entregados, ni puestos a disposición de terceras personas,
            sino que serán únicamente utilizados para efectos de proceder a la formalización de la
            contratación de los Servicios o para fines estadísticos. Al ingresar su correo electrónico a la base de
            datos, el Usuario autoriza a Modular Top a enviar de forma periódica, información de productos y
            servicios indicando en cada correo el asunto, la identidad del remitente y contener una dirección
            válida a la que el Usuario pueda solicitar la suspensión de los envíos.
        </div>
        
        <div class="mb-2">
            7. Al aceptar los términos y condiciones, el Usuario permitirá el tratamiento de sus datos para la
            elaboración de perfiles y segmentación de los datos. Los citados tratamientos pueden tener como
            finalidad el análisis y la realización de estadísticas para conocer el tráfico y utilización de la
            Plataforma, determinación de sus gustos y preferencias, a los fines de remitir información
            proporcional acorde a sus intereses.
            Enlace; aplicaciones creadas por otros
        </div>

        <div class="mb-2">
            8. La Plataforma puede contener hipervínculos (en adelante, “Links”) a otros sitios web que no
            sean controlados, editados, ni tengan relación legal alguna con los sitios de MODULAR TOP, no
            siendo esta última responsable por el contenido ni por la exactitud de la información contenida en
            ellos. La función de los Links que se encuentran en este sitio es meramente informativa, y se limita
            sólo a dar a conocer al Usuario otras fuentes de información relacionadas a las materias propias de
            la Plataforma. MODULAR TOP no se hace responsable de la información que, directa o
            indirectamente, se pueda obtener de los sitios a los que se acceda a través de los hipervínculos
            contenidos en la Plataforma.
            Cookies
        </div>

        <div class="mb-2">
            9. La Plataforma puede utilizar un sistema de seguimiento mediante “Cookies”, con el objeto de
            acceder a la información de forma más rápida, recordar e identificar al Usuario, generar
            estadísticas internas para el Desarrollar de la Plataforma y generar estrategias de marketing con
            terceros proveedores. Algunos datos que podrán ser obtenidos a través de las Cookies son:
            páginas visitadas, productos vistos, preferencias como ubicación entre otros. Estas cookies son
            pequeños archivos que envía la página visitada y se alojan en el disco duro del ordenador o
            dispositivo móvil, ocupando poco espacio. Se hace saber a los Usuarios que utilizando las opciones
            de su navegador podrán limitar o restringir según su voluntad el alojamiento de estas “cookies”,
            aunque no es aconsejable restringirlas totalmente ya que existen para brindar una mejor
            experiencia del Usuario al visitar la Plataforma. El sistema podrá recoger información sobre sus
            preferencias e intereses. En el caso de que esto ocurra, la información será utilizada
            exclusivamente con fines estadísticos para mejorar los servicios que se prestan en la Plataforma.
        </div>

        <div class="mb-2">
            10. Al autorizar los presente términos y condiciones el usuario autoriza a MODULAR TOP C.A. a
            transferir o trasmitir este tipo de información a otros sitios o enlaces con el objeto de facilitar una
            mejor navegación del usuario en la plataforma o a través de su computador, celular inteligente o
            cualquier otro dispositivo electrónico con el cual tenga acceso a la plataforma.
        </div>

        <div class="mb-2">

        </div>

        <div class="mb-2">
            <strong>Propiedad intelectual e industrial</strong>
        </div>

        <div class="mb-2">
            11. El contenido, gráficos, diseños, y otros aspectos de la Plataforma se encuentran protegidos por
            leyes de Propiedad Industrial e Intelectual a nombre de MODULAR TOP C.A. La copia,
            redistribución, uso o publicación de cualquiera de tales materias o partes que cualquier Usuario
            haga está prohibida, y será sancionada conforme lo señale la ley. El acceso, impresión, descarga o
            transmisión de cualquier contenido, gráficas, imágenes, logotipos, formularios o documentos de
            MODULAR TOP, le otorgan al Usuario únicamente el derecho para su uso propio, pero éste en
            ningún caso podrá proceder a su reproducción, re-publicación, distribución, cesión, sub-licencia,
            venta o cualquier otro uso. MODULAR TOP hace expresa reserva del ejercicio de todas las
            acciones, tanto civiles como penales, destinadas al resguardo de sus legítimos derechos de
            propiedad intelectual e industrial.
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="privacyPoliciesModal" tabindex="-1" aria-labelledby="privacyPoliciesModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <strong>Política de privacidad de datos con Modular Top C.A.</strong>
        <!-- <h5 class="modal-title" id="termCondictionModalLabel">Términos y condiciones</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body m-3 font-size-sm small">
        <div class="mb-2">
            Su privacidad y seguridad son de suma importancia para nosotros. Describimos en esta política cómo recopilamos y usamos información sobre usted en nuestro sitio web.
        </div>
        
        <div class="mb-2">
            ¿Quiénes somos?
        </div>
        
        <div class="mb-2">
            1. El sitio web se encuentra en la dirección https://www.modulartop.com (en lo sucesivo, La
            &quot;Plataforma&quot;) y pertenece a la sociedad MODULAR TOP C.A., RIF J-40035133-2 con domicilio en la
            ciudad de Caracas, Venezuela.
        </div>
        
        <div class="mb-2">
            2. Cuando recopilamos información sobre nuestros clientes o visitantes de nuestra plataforma,
            estamos calificados como &quot;controlador de datos&quot; según las leyes de protección de datos. Esto
            significa que somos responsables de decidir cómo almacenamos y usamos sus datos personales.
            ¿Qué datos recopilamos y cómo?
        </div>
        
        <div class="mb-2">
            3. Información personal: Es la información que nos permite saber quién es usted. Esto incluye la
            información que nos proporciona al registrarse como usuario para utilizar la plataforma (es decir,
            su nombre, nombre de la empresa, dirección de correo electrónico, otra información de contacto
            que comparte con nosotros). Sus credenciales de inicio de sesión también son datos personales.
            Esta categoría también incluye información relacionada con su identidad que nos proporciona a
            través de otros medios, como correos electrónicos.
        </div>
        
        <div class="mb-2">
            4. Recopilamos información sobre usted cuando completa un formulario de registro o contacto en
            nuestro sitio web o nos envía un correo electrónico. También podemos recibir sus datos
            personales de terceros, cuando les exprese su interés por nuestros servicios.
            6. Los datos que envíe no deben incluir ningún dato personal confidencial, como identificadores
            gubernamentales, números completos de tarjetas de crédito o tarjetas bancarias personales,
            registros médicos o detalles relacionados con las solicitudes de atención o tratamiento asociado a
            particulares.
        </div>
        
        <div class="mb-2">
            5. Recopilamos información por medios automatizados. Cuando visita nuestro sitio web o lee
            nuestro correo electrónico de marketing, recopilamos automáticamente información sobre usted
            a través de cookies. Estos son pequeños archivos que se envían a tu navegador y se instalan en el
            terminal desde el que navegas con la finalidad de almacenar información que podrá ser
            recuperada posteriormente para el correcto funcionamiento, integridad, disponibilidad y
            pertinencia de los contenidos de este Sitio Web, y aportan importantes ventajas en la prestación
            de los servicios, facilitando la navegación y usabilidad. Las cookies no pueden leer informaciones
            almacenadas en ningún terminal. Tampoco pueden dañar ni alterar tu equipo.
        </div>
        
        <div class="mb-2">
            ¿Cómo utilizamos sus datos?
        </div>
        
        <div class="mb-2">
            6. Cuando usted es uno de nuestros usuarios registrados o clientes, usamos la información que
            recopilamos sobre usted para brindarle los servicios ofrecidos a través de la plataforma y para
            mejorar la experiencia de usuario a través de ella. Como parte de ese propósito, usamos sus datos:
            <ul>
                <li>
                    Para permitir la gestión de la cuenta y perfil de Usuario, cuando se disponga de esta tal
                    funcionalidad.
                </li>
                <li>
                    Permitir y gestionar la recepción de las alertas, noticias, eventos o actividades definidas en
                    el perfil de Usuario, cuando se disponga de tal funcionalidad.
                </li>
                <li>
                    Proporcionar nuestros servicios y facilitar el desempeño, incluidas las verificaciones
                    relacionadas con usted y las verificaciones por correo electrónico.
                </li>
                <li>
                    Mantenerlo informado de novedades, noticias y acciones promovidas por MODULAR TOP
                    y el Grupo de empresas aliada al que pertenece, y los productos y servicios que ponemos a
                    su disposición.
                </li>
                <li>
                    Para responder a cualquier solicitud que pueda enviar de soporte o información de ventas,
                    o comunicaciones similares.
                </li>
                <li>
                    Enviarle información sobre las funcionalidades, cambios, mejoras y actualizaciones.
                </li>
                <li>
                    Comunicarnos con usted acerca de nuestros servicios (por ejemplo, a través de boletines,
                    correos electrónicos de marketing, anuncios u ofertas especiales).
                </li>
                <li>
                    Para fines de facturación y cobro.
                </li>
                <li>
                    Para la investigación y prevención de fraudes e incumplimientos de los Términos de
                    servicio.
                </li>
                <li>
                    Personalizar, evaluar y mejorar nuestros servicios, contenido y materiales.
                </li>
                <li>
                    Garantizar la seguridad de la red y de la información, incluyendo el acceso no autorizado a
                    las redes de comunicaciones electrónicos, distribución malintencionada de códigos, frenar
                    ataques de “denegación de servicio” y daños a los sistemas informáticos y de
                    comunicaciones electrónicas.
                </li>
                <li>
                    ¿Cuál es la duración de conservación de mis datos?
                </li>
            </ul>
        </div>
        
        <div class="mb-2">
            7. La sociedad MODULAR TOP conserva los datos durante el tiempo necesario para el
            cumplimiento de la finalidad para la que han sido recogidos, tiempo que será prolongado por el
            período que permita a la sociedad MODULAR TOP responder a sus obligaciones legales o el
            período autorizado por la ley.
        </div>
        
        <div class="mb-2">
            8. Los datos obtenidos para la creación y la gestión de la cuenta se conservarán hasta la
            eliminación o la desactivación de la cuenta. Posteriormente estos datos serán archivados, con
            acceso restringido, durante un período de 3 años.
            Los datos recogidos para la realización de prospecciones se conservarán durante el tiempo en el
            que el interesado interactúe con el Sitio o reciba el boletín de noticias al que se ha suscrito,
            prolongado por un período de 3 años.
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- </div> -->
@endsection

@section('script')
    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/user-register.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script>
        var is_client = "{{ old('chkClient') }}";

        $(function(){
            check_isClient();
        })

        function check_isClient(){
            if(is_client){
                Utils.trigger_chkClient(true);
            }
        }
    </script>
@endsection

