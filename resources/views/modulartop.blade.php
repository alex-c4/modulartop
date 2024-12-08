@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/modulartop.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('meta') 
<title>Modular Top - Fabricación de Muebles - Tableros Melamínicos</title> 
<meta name="description" 
content="40 años en Caracas, Venezuela ofreciendo muebles funcionales con diseño y garantía.
Tendencias, servicio personalizado y tableros melaminicos importados." />

@endsection

@section('content')
<!-- <script src="{{ asset('js/videos.js')}}"></script> -->
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/modulartop/marca.png);" data-aos="fade">
  <!-- <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-5 mx-auto mt-lg-5 text-center">
        <h1>Modular Top</h1>
        <p class="mb-5"><strong class="text-white">Superando retos y evolución constante.
        </strong></p>
      </div>
    </div>
  </div> -->

  <!-- <a href="#modular-top" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div>  


<!-- Nosotros-->
<!-- class="site-section" -->
<section  id="modular-top">
    <div class="contenedor-message">
      <div class="mensaje">
        <p>
          En Modular Top creemos en la importancia de espacios funcionales, hermosos y sostenibles, siendo el diseño, la ingeniería y la arquitectura algunas de las disciplinas que tienen el poder de transformar los ambientes que habitamos. Por ello, asumimos el compromiso de ser un socio estratégico para nuestros clientes, colaborándoles en la creación de espacios que generen un impacto positivo en las personas y el planeta, de la mano de nuestros aliados comerciales.
        </p>
        <p>
          Nuestra marca inspira a soñar en grande y a definir espacios que reflejen la personalidad y satisfagan las necesidades de los usuarios. Por eso, establecemos alianzas estratégicas con personas, organizaciones y marcas apasionadas por lo que hacen y que comparten con nosotros un compromiso de excelencia.
        </p>
        <p>
          Todo esto lo hacemos apegados a una esencia de marca definida por nuestro conjunto de valores fundamentales: excelencia, innovación, compromiso con la atención al cliente y trabajo en equipo, que se mezcla con la honestidad y la responsabilidad intrínsecas en nuestro ADN.
        </p>
      </div>
    </div>

    <div class="contenedor-mision">
      <div class="marco">
        <div class="mision-title">
          <h1>Nuestra misión</h1>
        </div>
        <div class="mision-text">
          Ser el proveedor líder en Venezuela de tableros melamínicos, materiales afines y revestimientos de interiores y exteriores de alta calidad, así como el prestador de servicios de seccionado, mecanizado, prensado y pegado de canto con garantía comprobable; ofreciendo innovación, sostenibilidad y atención personalizada a clientes en las áreas de arquitectura, diseño y desarrollo de interiorismo y exteriorismo.
        </div>
      </div>
    </div>

    <div class="contenedor-vision">
      <div class="marco">
        <div class="vision-title">
          <h1>Nuestra visión</h1>
        </div>
        <div class="vision-text">
        Consolidarnos como la marca de referencia para los profesionales de las áreas de arquitectura, diseño y desarrollo de interiorismo y exteriorismo. Llegando a ser una marca reconocida por la excelencia en el servicio prestado, en la calidad de los materiales que ofrecemos, a la vez que fomentamos el compromiso ético empresarial, generamos empleo, crecimiento y desarrollo sostenible a nivel nacional.
        </div>
      </div>
    </div>

    <div class="contenedor-valores">
      <div class="marco">
        <div class="valores-title">
          <h1>Nuestros valores</h1>
        </div>
        <div class="valores-text">
          <ul>
            <li>Excelencia: Contamos con productos y servicios de altos estándares en acabados y calidad, cumpliendo con los requerimientos más exigentes.</li>
            <li>Innovación: Diversificamos constantemente nuestra oferta de productos y optimizamos nuestra prestación de servicios para mantenernos a la vanguardia y tendencias del mercado.</li>
            <li>Compromiso con la atención: Nos caracterizamos por prestar una atención de excelencia, satisfaciendo las necesidades, exigencias y expectativas del cliente, ofreciendo la mejor asesoría y orientaciones en tema de materiales, insumos y servicios a nuestros aliados.</li>
            <li>Trabajo en equipo: Fomentamos la colaboración y el trabajo en equipo, entre nuestro talento humano, clientes y aliados comerciales, con la finalidad de lograr exitosamente los objetivos comunes.</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="contenedor-nota">
      <div class="marco">
        <div class="nota-title">
          <div>
            <img src="{{ asset('images/modulartop/quote.png') }}" alt="">
          </div>
        </div>
        <div class="nota-text">
          Nos comprometemos a trabajar con nuestros aliados y clientes para crear espacios únicos y funcionales que satisfagan sus expectativas de diseño, construcción y necesidades funcionales.
        </div>
      </div>
    </div>









      <div class="container">
        
        <div class="row large-gutters">
          <div class="col-lg-6 mb-5">

               <div>
                   <!-- <div><img src="images/modulartop/mt_corporativa.jpg" alt="Comercializadora de Tableros Melaminicos, 
                  especialistas en la fabricación de muebles y servicios de madera con maquinarias de última generación en Caracas, Venezuela." class="img-fluid"></div> -->

                  <div id="modulartop" class="youtube-player" data-id="ZgsyZvxPdGk"></div>
                  
                  <!-- <video src="ejemplo.mp4" width=320  height=240 controls poster="vistaprevia.jpg">
                    Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
                    La versión descargable está disponible en <a href="URL">Enlace</a>. 
                  </video> -->
                  <!-- <video src="images/videos/MT_TablerosV2.0.mp4" width=550  height=312 controls poster="images/modulartop/mt_corporativa.jpg">
                    Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
                    La versión descargable está disponible en <a href="URL">Enlace</a>. 
                  </video>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/G30Pmez2J9Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  -->
                </div>
                <!-- <div class="video-contenedor">
                  <div class="reproductor" data-id="G30Pmez2J9Q"></div>
                </div>         -->

               
          </div>
          <div class="col-lg-6 ml-auto">              
                <p align="justify">Somos la Generación de Relevo y en 40 años de experiencia acumulada nos hemos dado cuenta de la exigencia, responsabilidad y pasión que dedican todas las personas relacionadas a la industria de la madera y el diseño de interiores.</p>
                <p align="justify">Nos complace saber que hemos mantenido una larga trayectoria cumpliendo los 
                sueños de profesionales y familias venezolanas.</p>
                <p align="justify">Logramos que los espacios vacíos se conviertan en un ambiente ideal para  
                compartir.</p>
                <p align="justify">Satisfacemos las necesidades y expectativas de cada cliente por tener muebles con diseños creativos, minimalistas, sofisticados, multifuncionales y en tendencia.</p>
                <p align="justify">La diversidad es un detalle que nos distingue.</p>         
                               
          </div> 
        </div>      

        <div class="row large-gutters">
          <div class="col-lg-12 mb-5">
          <p align="justify">Somos un apoyo importante para carpinteros y fabricantes, ya que disponemos de maquinarias sofisticadas con Softwares de Centro Numérico Computarizado (CNC). </p>
          <p align="justify">Las cuales facilitan los procesos de corte y mecanizado de tableros, pegado de tapa canto, minimizando los costes de producción con una entrega rápida del producto.  </p>         
          <p align="justify">Hoy nos sentimos convencidos de seguir siempre con pie firme de manera 
          optimista.  </p>
          <p align="justify">Tenemos el hábito de convertir las adversidades en fuente de inspiración para crear 
          nuevas oportunidades de negocio.   </p>
          <p align="justify">Tú puedes ser nuestro mejor aliado.</p>
                    
          <h2 class="section-title-modulartop mb-3"><br>HISTORIA</h2>
          <p>Iniciamos como una industria prestadora de servicio de maquilado a grandes  
          corporaciones de la industria mobiliaria nacional.</p>  
          <p>Ofreciendo maquinaria especializada para cubrir la demanda de manufactura de  
          partes y piezas, con cortes mecanizados precisos, acabados de primera y tiempos             
          competitivos. </p>
          <p>Hemos evolucionado y crecido ante las amenazas exógenas, transformándolas en oportunidades de negocio, permitiéndonos diversificarnos dentro de nuestro sector industrial.</p>
          <p>Ahora estamos en la posibilidad de ofrecer materia prima, diseños arquitectónicos, fabricación e instalación de mobiliario para usuarios finales. Sin dejar de atender nuestros clientes primarios en  
          servicio de maquilado.  </p>
         
          <h2 class="section-title-modulartop mb-3"><br>Nuestros colaboradores</h2>
          <p>Contamos con un excelente grupo de colaboradores, tanto técnico como operativo, 
          altamente calificado y formado constantemente en cada una de sus disciplinas, con 
          la finalidad de garantizar el crecimiento profesional y una atención óptima que
          satisfaga las necesidades de cada cliente.  </p>  
          <p>Además, disponemos de especialistas que brindan asesoría para cumplir con los   
          diseños y proyectos que tengas en mente.</p>
          <p>Nuestro control de calidad, logra mantenernos a la vanguardia del mercado.</p>
                  
          <h2 class="section-title-modulartop mb-3"><br>Alianzas Comerciales</h2>
          <p>En Modular Top mantenemos siempre un espíritu de trabajo en equipo, colaborativo 
          e integrado.</p>  
          <p>Por esta razón, nos sentimos orgullosos de nuestra alianza comercial, conformada 
          por destacadas empresas venezolanas e internacionales, ofreciendo variedad de 
          productos y marcas de alto nivel y de gran importancia en la industria mobiliaria y  la
          construcción.
          </p>
          <p>Nos caracteriza la calidad, el compromiso y atención personalizada en cada uno de 
          los requerimientos de nuestra distinguida clientela. 
          </p> 
          <p>Hemos mantenido relaciones sólidas y convenios con las empresas ONESKIN de Portugal y
          la Española LOSAN, con el propósito de ofrecer materia prima de alta gama
          para la industria del mueble.          
          </p> 
          <p>Nuestras alianzas nos permite ofrecer productos innovadores de gran calidad. </p>
        
          <h2 class="section-title-modulartop mb-3"><br>Misión</h2>
          <p>Ofrecer a nuestros clientes servicios y productos de calidad, con el objetivo de  
          satisfacerlos basándonos en criterios funcionales, diseño y garantía. Siempre 
          tomando en cuenta las tendencias del mercado, con un servicio personalizado, a 
          precios competitivos. 
          </p>  
          
          <h2 class="section-title-modulartop mb-3"><br>Visión</h2>
          <p>Lograr consolidarnos como la empresa más importante en servicio y fabricación de 
          mobiliario, generando empleo, crecimiento y desarrollo sostenible a nivel nacional.
         
          </p>  

          <h2 class="section-title-modulartop mb-3"><br>Valores</h2>
          <p>Nuestra satisfacción siempre estará en cumplir con la necesidad de nuestros 
          clientes, brindándoles:

          <ul class="list-unstyled ul-check success">
                  <li>Honestidad.</li>
                  <li>Sentido de Compromiso.</li>
                  <li>Calidad.</li>
                  <li>Diseño Vanguardista.</li>
                  <li>Creatividad e Innovación.</li>
                  <li>Capital Humano.</li>
                </ul>
         
          </p>  
          </div>
        </div>

        

      </div>
    </section>
    <!--Fin Nosotros-->

    
@endsection    