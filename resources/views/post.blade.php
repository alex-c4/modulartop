@extends('layouts.layout')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg')}});" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Novedades</h1>
            <p class="mb-5"><strong class="text-white">de la Industra Mobiliaria.</strong></p>
            
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
              {{ $newsletter->title }}
            </p>
            
              
              @foreach($content_array as $p)
                <blockquote>
                  <p>
                    @if($p != "") 
                      {{$p}}
                    @endif
                  </p>
                </blockquote>
              @endforeach

            <div class="pt-5">
              <p>Categories:  <a href="#">{{ $newsletter->category }}</a> Tags: @foreach($tags_array as $tag) <a href="#">{{$tag}}</a>@endforeach</p>
            </div>
    
                         

          </div>
          <div class="col-md-4 sidebar">
           
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="#">Creatives <span>(12)</span></a></li>
                <li><a href="#">News <span>(22)</span></a></li>
                <li><a href="#">Design <span>(37)</span></a></li>
                <li><a href="#">HTML <span>(42)</span></a></li>
                <li><a href="#">Web Development <span>(14)</span></a></li>
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

                                  <h5 class="font-size-regular"><a href="{{ route('show', $news->id) }}"><br>{{ $news->title }}</a></h5>
                                  <div class="meta mb-4">{{ $news->author }} 
                                    <span class="mx-2">&bullet;</span> {{ explode(' ', $news->created_at)[0] }}
                                    <span class="mx-2">&bullet;</span> 
                                    <a href="{{ route('show', $news->id) }}">Leer</a>
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
 

    
@endsection    