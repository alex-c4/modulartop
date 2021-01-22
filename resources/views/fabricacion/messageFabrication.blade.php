@extends('layouts.layout')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/banner/contacto_fabricacion.jpg')}});" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 mx-auto mt-lg-8 text-center">
            <!-- <h1>¡MUCHAS GRACIAS POR HACERNOS PARTE DE TU PROYECTO!</h1> -->
            <h1>{{ $result["title"] }}</h1>
            
          </div>
        </div>
      </div>

      <a href="#modular-top" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div> 

<section class="site-section" id="modular-top">
    <div class="container">
        <div class="row large-gutters">
            <div class="col-lg-12 mb-5">
            <!-- <p align="center">{{ $result["title"] }}</p> -->
            <p align="center">{{ $result["subtitle"] }}</p>
            @foreach($result["content_arr"] as $parr)
                {!! $parr !!}
                <br>
            @endforeach

            </div>

            @foreach($newsletter_top3 as $newsletter)
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('images/newsletters') }}/{{ $newsletter->name_img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $newsletter->title }}</h5>
                        <div class="blog-widget">
                            <div class="blog-info">
                                <img src="{{ url('images/clock.png') }}" alt="">
                                <span>{{ explode(' ', $newsletter->created_at)[0] }}</span><span class="mx-2">&bullet;
                                <!-- </span><i class="lnr lnr-user"></i> Author Name -->
                            </div>
                        </div>
                        
                        <p class="card-text">{{ $newsletter->summary }}</p>
                        <a href="{{ route('show', [$newsletter->id, $newsletter->url]) }}" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(function() { 
        setTimeout(function(){
            $('html, body').animate({scrollTop:450}, 'slow')
        }, 300);
    })
</script>
@endsection
