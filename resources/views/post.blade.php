@extends('layouts.layout')

@section('meta')
<!-- META DATA DE REDES SOCIALES -->
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $newsletter->title }}" />
<meta property="og:description" content="{{ $newsletter->summary }}" />
<meta property="og:image" content="{{ asset('images/newsletters/'.$newsletter->name_img) }}" />
<!-- <meta property="og:url" content="ENLACE PERMANENTE" /> -->
<meta property="og:site_name" content="MODULAR TOP" />


<title>Novedades - Modular Top</title> 
<meta name="description" content="{{ $newsletter->summary }}" />

<!-- 
<title>{{ $newsletter->title }}</title> 
<meta name="description" 
content="{{ $newsletter->summary }}" />
 -->

 

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5efa285e4b89f600120fcd12&product=inline-share-buttons&cms=website' 
async='async'></script>


@endsection

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg')}});" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h2 style="color:white;">NOVEDADES</h2>
            <p class="mb-5"><strong class="text-white">de la Industria Mobiliaria.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


 <!-- Blog particular -->
 <section class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-8 blog-content">
          <div class="vcard bio">
                    <img src="{{ asset('images/newsletters/'.$newsletter->name_img) }}" alt="Image placeholder">
                  </div>
            <p class="lead">
              <br>
              <!-- Botonera compartir redes sociales -->
              <div class="sharethis-inline-share-buttons"></div>
              
              <h1 class="section-title-modulartop mb-3"><br>{{ $newsletter->title }}</h1> 
              <div class="blog-widget">
                  <div class="blog-info">
                  <img src="images/clock.png" alt="">
                      <span>{{ explode(' ', $newsletter->published_at)[0] }}</span><span class="mx-2">&bullet;
                      </span><i class="lnr lnr-user"></i> {{ $newsletter->userName }} {{ $newsletter->userLastName }}
                  </div>
                  
              </div>
              @if(Auth::check())
                @if(auth()->user()->hasRoles('Administrator') || auth()->user()->hasRoles('Marketing')) 
                  <div class="botonesEditList">
                    <a href="{{ route('newsletter.edit', $newsletter->id) }}" title="Editar"><span class="icon-pencil-square-o"></span></a>
                    &nbsp;
                    <a href="{{ route('newsletter.index') }}"><span class="icon-list"></span></a>
                  </div>
                @endif
              @endif
            </p>
            
              
                <blockquote>
                  <p>
                    {!! $newsletter->content !!}
                  </p>
                </blockquote>

            <div class="pt-5">
              <p>Categorias:  <a href="{{ route('novedades', $newsletter->category_id) }}">{{ $newsletter->category }}</a> <!-- Tags: @foreach($tags_array as $tag) <a href="#">{{$tag}}</a>@endforeach</p> -->
            </div>

            
            <div class="pt-1">
              <p>Tags:  
              @foreach($tags as $tag)
                  <a href="{{ route('tags', ['id' => $tag->id, 'tag' => $tag->name]) }}">#{{ $tag->name }}</a>
              @endforeach
            </div>

            <div class="divFormSubscribeNewsletter2"> 
              <div>
                <img src="{{ asset('images/email-box-web.png') }}" alt="" srcset="">
              </div>
              <div class="titleSubcripcion">
                Si te gusto el articulo suscribete para recibir cuando hayan nuevos
              </div>
              <div class="col-sm-12 col-md-9">
                <form action="{{ route('contact.contact') }}" method="post" class="" id="form_send_contact3">
                  {{csrf_field()}}
                  <input type="hidden" name="hform" id="hform" value="3">
                  <div class="input-group mb-3">
                    <input id="emailnews3" name="emailnews3" type="text" class="form-control border-secondary bg-transparent" placeholder="Ingrese su Email" aria-label="Enter Email" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" style="height: 43px" type="submit" id="button-addon3" name="button-addon3">Enviar</button>
                    </div>
                  </div>

                  <div class="alert alert-success" role="alert" id="alertContact3">
                    <label id="divMessage3" class="text-black"></label> 
                  </div>
                  
                </form>
              </div>
            </div>
            
    
                         

          </div>
          <div class="col-md-4 sidebar">
           
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categorias</h3>
                @foreach($categoryList as $cat)
                    <li><a href="{{ route('novedades', $cat->id) }}">{{ $cat->name }} <span>({{ $cat->cant }})</span></a></li>
                @endforeach
              </div>
            </div>
            <div class="sidebar-box">
              <!--
              <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              <h3>Bryan Becerra</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              -->
              <div class="recent-post" id="post1">
                        <h3 class="text-black">POST RECIENTES</h3>
                        @foreach($newsletter_top3 as $news)
                            <div class="single-recent-post">
                                <div class="recent-pic">
                                    <img src="{{ asset('images/newsletters/'.$news->name_img) }}" alt="">
                                </div>
                                <div class="recent-text">

                                  <h5 class="font-size-regular"><a href="{{ route('show', [$news->id, $news->url]) }}"><br>{{ $news->title }}</a></h5>
                                  <div class="meta mb-4"><!-- {{ $news->author }}  -->
                                    <span class="mx-2">&bullet;</span> {{ explode(' ', $news->created_at)[0] }}
                                    <span class="mx-2">&bullet;</span> 
                                    <a href="{{ route('show', [$news->id, $news->url]) }}">Leer</a>
                                  </div>
                                                                 
                                </div>
                            </div>
                        @endforeach
                            

              </div>
            </div>

            
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Section End -->
 
    <script>
      $(function(){
        //ajuste de url
      })
    </script>

@endsection    