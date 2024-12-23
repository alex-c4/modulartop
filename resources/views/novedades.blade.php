@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/novedades/novedades.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('meta') 
<title>Novedades - Modular Top</title> 
<meta name="description" 
content="Noticias y contenido de valor con todo lo relacionado a diseño de interiores, tipos de 
muebles, historia, servicios de madera y fabricación de mueblería." />
@endsection

@section('content')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<input type="hidden" id="hShowNewsletterById" value="{{ route('newsletter.showNewsletterById') }}">



<div class="site-blocks-cover inner-page-cover overlay backgroundHeader"  style="background-image: url({{ asset('images/novedades/novedades-2.png') }});" data-aos="fade">
    <div class="container">
    <div class="row align-items-center justify-content-center">
        <!-- <div class="col-md-5 mx-auto mt-lg-5 text-center">
        <h1>Novedades</h1>
        <p class="mb-5"><strong class="text-white">de la Industria Mobiliaria.</strong></p>
        
        </div> -->
    </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div>

<div class="contenedor-principal">
    <div class="contenedor-lista-categorias">
        <!-- lista de categorias -->
         <div class="categoria-title">
            CATEGORÍAS
         </div>
         <div class="categoria-lista">
             @foreach($categoryList as $cat)
                <div class="categoria-fila">
                    <a href="{{ route('novedades', $cat->id) }}">{{ $cat->name }} <span>({{ $cat->cant }})</span></a>    
                </div>
             @endforeach

         </div>
    </div>
    <div class="contenedor-ultima-novedad">
        <img src="{{ asset('images/newsletters/'.$newsletters[0]->name_img) }}" id="imgHeaderNewsletter" style="max-width: 95%">
        <div class="contenedor-title-ult-nov">
            <div id="tip-ult-nov">TIPS</div>
            <div id="title-ult-nov">
                {{ $newsletters[0]->title }}
            </div>
            <div id="sumarry-ult-nov">
                {{ $newsletters[0]->summary }}...
            </div>

            <div id="btn-ult-nov">
                <input type="button" id="btnLeerMas" value="Leer más" class="btn btn-dark btn-leer-mas" onclick="displayInformation({{ $newsletters[0]->id }}, true)" />
            </div>

        </div>

    </div>
</div>
        
<section class="blog-section spad" id="blog" style="margin-top: 50px">
<div class="contenedor-newsletter">
    <!-- @for($i=0; $i < count($newsletters); $i++)
    <div class="contenedor-novedad">
        <img src="{{ asset('images/newsletters/'.$newsletters[$i]->name_img) }}">
        <div style="display: flex; justify-content: flex-end;">
            <input type="button" id="btnLeerMas" value="Leer más" class="btn btn-dark btn-leer-mas" onclick="displayInformation({{ $newsletters[$i]->id }}, false)" />
        </div>
    </div>
    @endfor -->

    <!-- @for($i=0; $i < count($newsletters); $i++)
    <div style="background-image: url({{ asset('images/newsletters/'.$newsletters[$i]->name_img) }});" class="contenedor-novedad">
        <div style="position: relative;
                top: 40%;" class="contenedor-novedad-secundario">
            <div class="contenedor-novedad-titulo">
                <div id="titulo">
                    {{ $newsletters[$i]->title }}
                </div>
            </div>

        </div>
        <div style="display: flex; justify-content: flex-end;">
            <input type="button" id="btnLeerMas" value="Leer más" class="btn btn-dark btn-leer-mas" />
        </div>
    </div>
    @endfor -->
    @for($i=0; $i < count($newsletters); $i++)
    <div class="container-newsletter box-shadow-mt" style="background-image: url({{ asset('images/newsletters/'.$newsletters[$i]->name_img) }});">
        <div class="container-title">{{ $newsletters[$i]->title }}</div>
        <div class="container-summary">
            <div class="border-top-title">&nbsp;</div>
            <span>{{ $newsletters[$i]->summary }}</span>
        </div>
        <div class="container-boton">
            <input type="button" id="btnLeerMas" value="Leer más" class="btn btn-dark btn-leer-mas" onclick="displayInformation({{ $newsletters[$i]->id }}, false)"/>
        </div>
    </div>
    @endfor

</div>
    
<div id="contentOtherPost" class="contenedor-newsletter"></div>
                
{{csrf_field()}}
<input type="hidden" name="hOtherPost" id="hOtherPost" value="{{ route('newsletter.otherpostajax') }}">
<input type="hidden" name="hRouteImage" id="hRouteImage" value="{{ url('images/newsletters/') }}">
<input type="hidden" name="hRoutePost" id="hRoutePost" value="{{ url('post/') }}">
<input type="hidden" name="hOptNewsletter" id="hOptNewsletter" value="{{ $hOptNewsletter}}">
<input type="hidden" name="hTag_id" id="hTag_id" value="{{ $tag_id2 ?? ''}}">

@if($total_newsletters > 8)
<!-- boton ver mas novedades -->
<div class="single-blog-post" style="text-align: center" id="divVerOtrosPost">
    <a href="javascript:void(0)" id="btnShowOtherPost" class="btn btn-dark btn-sm" onclick="Utils.onclick_VerOtrosPost()"> Ver más</a>
</div>
@endif
</section>

    <!-- Blog Section End -->
 

    
@endsection 

@section('script')
    
<script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
<script src="{{ asset('js/novedades.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

@endsection
