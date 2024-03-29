@extends('layouts.layout')

@section('meta') 
<title>Novedades - Modular Top</title> 
<meta name="description" 
content="Noticias y contenido de valor con todo lo relacionado a diseño de interiores, tipos de 
muebles, historia, servicios de madera y fabricación de mueblería." />
@endsection

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Novedades</h1>
            <p class="mb-5"><strong class="text-white">de la Industria Mobiliaria.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


 <!-- Blog Section Begin -->
 <section class="blog-section spad" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 order-2 order-lg-1">
                    <div class="side-bar">
                        <div class="sidebar-box">
                            <div class="categories">
                                <h3><br>Categorias</h3>
                                @foreach($categoryList as $cat)
                                    <li><a href="{{ route('novedades', $cat->id) }}">{{ $cat->name }} <span>({{ $cat->cant }})</span></a></li>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="tags-item">
                            <h4>Tags</h4>
                            <div class="tag-links">
                            @foreach($tags as $tag)
                                <a href="{{ route('tags', ['id' => $tag->id, 'tag' => $tag->name]) }}">{{ $tag->name }}</a>
                            @endforeach

                                <!-- <a href="#">Fabricacion</a>
                                <a href="#">Maquilado</a>
                                <a href="#">Corte</a>
                                <a href="#">Routeado</a>
                                <a href="#">Pantografiado</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2">
                    <div class="blog-post">

                    @foreach($newsletters as $newsletter)

                        <div class="single-blog-post">
                            <div class="blog-pic">
                                <img src="{{ asset('images/newsletters/'.$newsletter->name_img) }}" alt="">
                            </div>
                            <div class="blog-text">
                                <h4>{{ $newsletter->title }}</h4>
                                <div class="blog-widget">
                                    <div class="blog-info">
                                    <img src="images/clock.png" alt="">
                                        <span>{{ explode(' ', $newsletter->published_at)[0] }}</span><span class="mx-2">&bullet;
                                        </span><i class="lnr lnr-user"></i> {{ $newsletter->userName }} {{ $newsletter->userLastName }}
                                    </div>
                                   
                                </div>
                                
                                <p>
                                    {{ $newsletter->summary }}...
                                </p>
                                <a href="{{ route('show', [$newsletter->id, $newsletter->url]) }}" class="btn btn-primary btn-sm">Leer más</a>
                            </div>
                        </div>

                    @endforeach

                        <div id="contentOtherPost"></div>
                    
                        {{csrf_field()}}
                        <input type="hidden" name="hOtherPost" id="hOtherPost" value="{{ route('newsletter.otherpostajax') }}">
                        <input type="hidden" name="hRouteImage" id="hRouteImage" value="{{ url('images/newsletters/') }}">
                        <input type="hidden" name="hRoutePost" id="hRoutePost" value="{{ url('post/') }}">
                        <input type="hidden" name="hOptNewsletter" id="hOptNewsletter" value="{{ $hOptNewsletter}}">
                        <input type="hidden" name="hTag_id" id="hTag_id" value="{{ $tag_id2 ?? ''}}">

                        @if($total_newsletters > 8)
                        <!-- boton ver mas novedades -->
                        <div class="single-blog-post" style="text-align: center" id="divVerOtrosPost">
                            <a href="javascript:void(0)" id="btnShowOtherPost" class="btn btn-primary btn-sm" onclick="Utils.onclick_VerOtrosPost()"> Ver más</a>
                        </div>
                        @endif
                        <!--
                        <div class="blog-pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
 

    
@endsection 

@section('script')
    
<script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

@endsection
