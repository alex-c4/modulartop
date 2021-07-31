@extends('layouts.layout')

@section('content')


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/tableros/banner-premium.jpg') }}" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Proyecto</h1>
            <p class="mb-5"><strong class="text-white">Galería de imágenes</strong></p>
            
          </div>
        </div>
      </div>
    </div>  

    <!-- Blog Start -->
    <section class="section" id="news">
            <div class="container mb-3">

                <div class="row">

                    @foreach($allProjects as $items)
                        @foreach($items as $project)
                        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                            <div class="blog-post rounded shadow">
                                <img src="{{ asset('images/proyectos') }}/{{ $project->cover_photo }}" class="img-fluid rounded-top" alt="{{ $project->cover_photo_alt_text }}">
                                <div class="content pt-4 pb-4 p-3">
                                    <ul class="list-unstyled post-meta">
                                        <li class="float-right">
                                            <!-- <span class="icon-tag"></span> -->
                                            <a href="javascript:void(0)" class="text-dark">&nbsp;</a>
                                        </li>
                                        <li>
                                            <i class="mdi mdi-account-heart mr-1"></i>
                                            <a href="javascript:void(0)" class="text-dark">{{ $project->proyectista_name }}</a>
                                        </li> 
                                    </ul> 
                                    <a href="{{ route('project.showphotos', $project->projectId) }}"><h5 class="title text-dark">{{ $project->project_name }}</h5></a> 
                                    <ul class="list-unstyled post-meta mb-0 mt-3">
                                        <li class="float-right">
                                            <i class="mdi mdi-calendar-edit mr-1"></i>
                                            {{ $project->project_date }}
                                        </li>                                    
                                        <li>
                                            <a href="{{ route('project.showphotos', $project->projectId) }}" class="text-dark">Ver más <span class="icon-chevron-right"></span></a>
                                        </li> 
                                    </ul>
                                </div><!--end content-->
                            </div><!--end blog post-->
                        </div><!--end col-->
                        @endforeach
                    @endforeach

                </div><!--end row-->

            </div><!--end container-->
        </section><!--end section-->
        <!-- Blog Start -->


@endsection

@section('script')

@endsection
