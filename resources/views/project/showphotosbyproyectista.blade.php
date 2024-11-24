@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/showphotosproyec.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('content')


    <!-- <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/tableros/banner-premium.jpg') }}" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Proyecto</h1>
            <p class="mb-5"><strong class="text-white">Galería de imágenes</strong></p>
            
          </div>
        </div>
      </div>
    </div>   -->
    <div style="height: 80px"></div>
    <span id='spanheader'></span>
    <!-- Blog Start -->
    <section class="section" id="news">
            <div class="container mb-3">

                <div class="row">
                    <div class="col-12 m-2"></div>
                    <div class='pr-0'>
                        <div class="contenedor-grid mt-4">
                            <!-- Carousel -->
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="franja-roja">
                                    <span>{{ $lastProject[0]->name }}</span>
                                </div>
                                
                                <div class="carousel-inner">
                                    @foreach($lastProject as $key => $imgProject)
                                        <div class="carousel-item @if($key == 0) active @endif">
                                            <img src="{{ asset('images/proyectos/'.$imgProject->photo_name) }}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach
                                    <!-- 
                                    <div class="carousel-item active">
                                        <img src="{{asset('images/fabricacion/fabricacion-cocina-1.jpg')}}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset('images/fabricacion/fabricacion-cocina-2.jpg')}}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset('images/fabricacion/fabricacion-habitacion-1.jpg')}}" class="d-block w-100" alt="...">
                                    </div>
                                     -->
                                </div>
                                    
                                <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                            <!-- Fin Carousel -->


                            <div class='pl-1 contendor-grid2'>
                                @for($i = 0; $i < 3; $i++)
                                    <div>
                                        <img src="{{asset('images/proyectos/'.$lastProject[$i]->photo_name) }}" alt="" srcset="">
                                    </div>
                                @endfor
                                <!-- <div>
                                    <img src="{{asset('images/fabricacion/fabricacion-cocina-1.jpg')}}" alt="" srcset="">
                                </div>
                                <div>
                                    <img src="{{asset('images/fabricacion/fabricacion-habitacion-2.jpg')}}" alt="" srcset="">
                                </div>
                                <div>
                                    <img src="{{asset('images/fabricacion/fabricacion-mobiliario.jpg')}}" alt="" srcset="">
                                </div> -->
                            </div>

                        </div>

                    </div>

                    <div class="col-12 container-oneskin">
                        <div class="title-oneskin">
                            Cocina con ONESKIN: Un oasis de elegancia y funcionalidad
                        </div>
                        <div class="content-oneskin">
                            <p>Imagina una cocina que no solo sea un espacio para cocinar, sino un oasis de elegancia y funcionalidad. Una cocina donde cada elemento está cuidadosamente diseñado para crear un ambiente armonioso y eficiente. Esta es la cocina con ONESKIN.</p>
                            <p>Superficies impecables y duraderas:</p>
                            <p>Los tableros lacados de alta calidad de ONESKIN son la base de esta cocina. Con una amplia gama de colores y texturas disponibles, puedes crear un espacio que refleje tu estilo único. Las superficies son impecables, fáciles de limpiar y altamente resistentes al desgaste, lo que las hace perfectas para el uso diario.</p>
                            <p>Diseno a medida:</p>
                            <p>ONESKIN ofrece soluciones personalizadas para cada cocina. Desde diseños minimalistas hasta cocinas clásicas con un toque moderno, nuestros expertos trabajan contigo para crear un espacio que se adapte a tus necesidades y presupuesto.</p>
                            <p>Funcionalidad inteligente</p>
                            <p>La cocina con ONESKIN no solo es hermosa, sino también inteligente. Los electrodomésticos integrados y los sistemas de almacenamiento inteligentes te ayudan a aprovechar al máximo el espacio y a cocinar con mayor eficiencia.</p>
                        </div>
                        <div class="footer-oneskin">
                            <div>
                                <img src="{{asset('images/db_groupLogo.png')}}" alt="" srcset="">
                            </div>
                            <div>
                                <img src="{{asset('images/logo145_42.png')}}" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 title-project-gallery">
                        Galeria de Proyectos
                    </div>

                    <div class="col-12 gallery">
                        <!-- Seccion para la galeria -->
                    </div>
                    <div class='col-12 arroy-gallery mt-3 mb-5'>
                        <div>
                            <div class="arrow" id="btnArrowLeft">
                                <span class="icon-arrow-left"></span>
                            </div>
                            <div class="arrowDisabled" id="btnArrowLeftDisabled">
                                <span class="icon-arrow-left"></span>
                            </div>
                        </div>

                        <div>
                            <div class="arrow" id="btnArrowRight">
                                <span class="icon-arrow-right"></span>
                            </div>
                            <div class="arrowDisabled" id="btnArrowRightDisabled">
                                <span class="icon-arrow-right"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 footer-gallery bg-footer-contact">
                        
                        <div class="container-contact-info-project">
                            <!-- Contact info section -->
                            <div class="contact-info-project">
                                <div class="contact-header-project">
                                Contáctenos
                                </div>
                                <div class="contact-phones-project">

                                <div class="contact-row">
                                    <div class="contact-col-icon-project">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path fill="#8a181b" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                    </div>
                                    <div class="contact-col-phones-project">
                                    <div>{{env('CONTACT_001')}}</div>
                                    <div>{{env('CONTACT_002')}}</div>
                                    </div>
                                </div>
                                
                                <div class="contact-row-project">
                                    <div class="contact-col-icon-project">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path fill="#8a181b" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                    </div>
                                    <div class="contact-col-phones-project">
                                    <div>{{env('CONTACT_EMAIL')}}</div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="contact-row-project">
                                <div class="contact-col-icon-project">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 384 512"><path fill="#8a181b" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                </div>
                                <div class="contact-col-phones-project">
                                    <div>{{env('ADDRESS')}}</div>
                                </div>
                                </div>
                            </div>
                                    
                        </div>
                    </div>
                    



                </div><!--end row-->

            </div><!--end container-->
        </section><!--end section-->
        <!-- Blog Start -->


@endsection

@section('script')
<script src="{{ asset('js/project/project.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

<script>
    GLOBAL_URL = '{{ asset("images/proyectos/") }}';
    GLOBAL_ROUTE_URL = '{{ route('project.showphotos', '') }}'

    $('#logoClass').attr('src', '{{ asset('images/modulartop.png') }}')              
    $(document).scroll(function(){
        if($(this).scrollTop() > 1){
            $('#logoClass').attr('src', '{{ asset('images/modulartop.png') }}')              
        }else{
            setTimeout(() => {
                $('#logoClass').attr('src', '{{ asset('images/modulartop.png') }}')
            }, 150); 
        }
    });

    allProjects = @json($allProjects);
    setTimeout(() => {
        // fillProjects(allProjects);
        
        // Inicialmente mostramos la primera página
        updateUI(currentPage);

    }, 500);
</script>

@endsection
