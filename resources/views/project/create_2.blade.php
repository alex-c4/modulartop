@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/project.css')}}?v={{ env('APP_VERSION') }}">
@endsection


@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Proyecto</h1>
                <p class="mb-5"><strong class="text-white">Imágenes del proyecto</strong></p>
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

@endsection

<section class="blog-section spad" id="blog">
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info ">
                <!-- <i class="fas fa-align-left"></i> -->
                <span class="icon-align-left"></span>
                <!-- <span>Toggle Sidebar</span> -->
            </button>

        </div>
    </nav>

    <div class="row mb-5">
        <div class="col-12 text-center">
        <h2 class="section-title mb-3 text-black">Imágenes</h2>
        </div>
    </div>

    <!-- mensaje para la creacion de los post -->
    @if(isset($result) == null)

        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Haga click <strong><a href="{{ route('project.create') }}">aqui</a></strong>  para crear un proyecto.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>

    @else

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form id="form_upload_image" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" id="hProjectId" name="hProjectId" value="{{ $result['projectId'] }}">
                            <input type="hidden" name="hrouteUploadImage" id="hrouteUploadImage" value="{{ route('project.uploadimg') }}">
                            <input type="hidden" name="hrouteDeleteImage" id="hrouteDeleteImage" value="{{ route('project.deleteimg') }}">

                            <!-- Nombre -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Proyecto</label>
                                <div class="col-md-6">
                                    <input id="name" name="name" disabled type="text" class="form-control" value="{{ $result['projectName'] }}">
                                </div>
                            </div>


                            <!-- Fotos -->
                            <div class="row form-group">
                                <label for="project_photo" class="col-md-4 col-form-label text-md-right">Foto del proyecto<span>*</span></label>
                                <div class="col-md-6">
                                    <input type="file" id="project_photo" name="project_photo" accept="image/png, image/jpeg, image/jpg" class="form-control" placeholder="Imagen"> 
                                    <small id="emailHelp" class="form-text text-muted">Se permitira subir un total de seis (6) imágenes</small>
                                </div>
                            </div>


                            <!-- Texto alterno -->
                            <div class="form-group row">
                                <label for="alt_text" class="col-md-4 col-form-label text-md-right">Texto alterno<span>*</span></label>
                                <div class="col-md-6">
                                    <textarea name="alt_text" id="alt_text"rows="3" class="form-control"></textarea>
                                </div>
                            </div>


                            <div class="form-group row mb-1 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary" id="btnUpload" name="btnUpload">
                                        Subir
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div id="div-message" class="mt-3">
                            
                        </div>


                        <div class="col-12 text-center mt-3 img_container">
                            

                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endif

</div>

</section>

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="{{ asset('js/project.js') }}?v={{ env('APP_VERSION') }}"></script>

    <script>
        var validator;
        var GLOBAL_URL = "{{ asset('images/proyectos/') }}";
        var GLOBAL_IS_UPDATING = false;
        
        $(function(){
            validator = $("#form_upload_image").validate({
                rules: {
                    project_photo: {
                        required: true
                    },
                    alt_text: {
                        required: true
                    },
                },
                messages: {
                    project_photo: {
                        required: "Por favor seleccione una foto"
                    },
                    alt_text: {
                        required: "Pro favor ingrese un texto alterno para la imagen"
                    }
                }
            });

        })
    </script>

@endsection
