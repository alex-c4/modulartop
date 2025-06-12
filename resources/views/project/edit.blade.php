@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/project.css')}}?v={{ env('APP_VERSION') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
¡Editar!
@endsection

@section('subtitle')
Edición proyecto
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


    <!-- mensaje para la creacion de los post -->
    @if(isset($msgPost) != null)
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$msgPost}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="form_project" method="POST" action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hrouteDeleteImage" id="hrouteDeleteImage" value="{{ route('project.deleteimg') }}">
                        <input type="hidden" name="hrouteUploadImage" id="hrouteUploadImage" value="{{ route('project.uploadimg') }}">
                        <input type="hidden" name="hSearchAltTextRoute" id="hSearchAltTextRoute" value="{{ route('project.searchalttext') }}">
                        <input type="hidden" id="hUpdateAltTextRoute" name="hUpdateAltTextRoute" value="{{ route('project.updatetext') }}">


                        <!-- Proyectistas -->
                        <div class="row form-group" >
                            <label class="col-lg-4 col-form-label text-md-right" for="proyectista">Proyectista<span>*</span></label>
                            <div class="col-md-6">
                                <select class="custom-select @error('proyectista') is-invalid @enderror" id="proyectista" name="proyectista">
                                    <option value>Seleccione...</option>
                                    @foreach($proyectistas as $proyectista)
                                        @if($proyectista->id == $project->proyectista_id)
                                            <option selected value="{{ $proyectista->id }}">{{ $proyectista->name }}</option>
                                        @else
                                            <option value="{{ $proyectista->id }}">{{ $proyectista->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('proyectista')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Partner company -->
                        <div class="form-group row" style="display: none" id="div_partner_company">
                            <label for="partner_company" class="col-md-4 col-form-label text-md-right">Empresa aliada<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="partner_company" name="partner_company" type="text" class="form-control @error('partner_company') is-invalid @enderror" value="{{ $project->partner_company }}" >
                                @error('partner_company')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Proveedores -->
                        <div class="row form-group" style="display: none" id="div_provider">
                            <label class="col-lg-4 col-form-label text-md-right" for="provider">Proveedor<span>*</span></label>
                            <div class="col-md-6">
                                <select class="custom-select" id="provider" name="provider">
                                    <option value="0">Seleccione...</option>
                                    @foreach($providers as $provider)
                                        @if($provider->id == $project->provider_id)
                                            <option selected value="{{ $provider->id }}">{{ $provider->name}}</option>
                                        @else
                                            <option value="{{ $provider->id }}">{{ $provider->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('provider')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Nombre del proyecto<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="120" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $project->name }}" autofocus>
                                @error('name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Cover photo -->
                        <div class="row form-group">
                            <label for="cover_photo" class="col-md-4 col-form-label text-md-right">Foto portada<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="cover_photo" name="cover_photo" accept="image/png, image/jpeg, image/jpg" class="form-control @error('cover_photo') is-invalid @enderror" placeholder="Imagen"> 
                                <small id="sizeImage" class="form-text text-muted sizeImage">Tamaño de la imagen (700 x 500 pixeles)</small>
                            </div>
                            
                            @error('cover_photo')
                                <span class="invalid-field text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="display: flex; justify-content: center; margin: 5px">
                            <img height="100px" src="{{ asset('images/proyectos') }}/{{ $project->cover_photo }}" alt="" srcset="">
                        </div>

                        <!-- cover photo alt_text -->
                        <div class="row form-group">
                            <label for="cover_photo_alt_text" class="col-md-4 col-form-label text-md-right">Texto alternativo<span>*</span></label>
                            <div class="col-md-6">
                                <textarea id="cover_photo_alt_text" name="cover_photo_alt_text" rows="2" class="form-control @error('cover_photo_alt_text') is-invalid @enderror" >{{ $project->cover_photo_alt_text }}</textarea>
                                @error('cover_photo_alt_text')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <!-- Descripcion -->
                        <div class="row form-group">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción<span id="span_description"></span></label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror" >{{ $project->description }}</textarea>
                                @error('description')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <!-- Plane photo -->
                        <div class="row form-group">
                            <label for="plane_photo" class="col-md-4 col-form-label text-md-right">Foto del plano</label>
                            <div class="col-md-6">
                                <input type="file" id="plane_photo" name="plane_photo" accept="image/png, image/jpeg, image/jpg" class="form-control @error('plane_photo') is-invalid @enderror" placeholder="Imagen"> 
                            </div>
                        </div>

                        <div style="display: flex; justify-content: center; margin: 5px">
                            <img height="100px" src="{{ asset('images/proyectos') }}/{{ $project->plane_photo }}" alt="" srcset="">
                        </div>

                        <!-- Ubication -->
                        <div class="row form-group">
                            <label for="ubication" class="col-md-4 col-form-label text-md-right">Ubicación</label>
                            <div class="col-md-6">
                                <textarea id="ubication" name="ubication" rows="4" class="form-control" >{{ $project->ubication }}</textarea>
                            </div>
                        </div>

                        <!-- Client name -->
                        <div class="form-group row" style="display: none" id="div_client_name">
                            <label for="client_name" class="col-md-4 col-form-label text-md-right">Nombre del cliente<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="client_name" name="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" value="{{ $project->client_name }}" >
                                @error('client_name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Fecha -->
                        <div class="form-group row" id="div_project_date">
                            <label for="project_date" class="col-lg-4 col-form-label text-lg-right">Fecha<span>*</span></label>
                            <div class="col-lg-6">
                                <input id="project_date" name="project_date" autocomplete="off" type="text" class="form-control @error('project_date') is-invalid @enderror" value="{{ $project->project_date }}" >

                                @error('project_date')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave" name="btnSave">
                                    Guardar
                                </button>
                            </div>
                        </div>

                        </form>

                        <hr>

                        <h5 class="card-title mt-2 mb-4">
                            Galería de imágenes del Proyecto
                        </h5>

                        <!-- <div class="row mb-5">
                            <div class="col-12 text-center">
                                <h2 class="section-title mb-3 text-black">Galeria de fotos</h2>
                            </div>
                        </div> -->

                        <form id="form_upload_image" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="hProjectId" name="hProjectId" value="{{ $project->id }}">

                        <div class="col-12 text-center m-3 img_container">
                            @foreach($project_photos as $photo)
                                <div class="img_div" id="img_div_{{ $photo->id }}">
                                    <img src="{{ asset('images/proyectos') }}/{{ $photo->name }}" alt="{{ $photo->alt_text }}">
                                    <span title="eliminar" onclick="delete_image('img_div_{{ $photo->id }}', {{ $photo->id }}, true)" class="icon-delete"></span>
                                    <span title="editar" class="icon-pencil" data-toggle="modal" data-target="#exampleModal" data-photoid="{{ $photo->id }}"></span>
                                </div>
                            @endforeach
                        </div>

                        <div id="div-message" class="mt-3"></div>

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
                                    Agregar
                                </button>
                            </div>
                        </div>

                        
                        </form>


                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Texto alternativo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

            <div class="modal-body">

                <!-- Nombre -->
                <div class="row form-group" >
                    <label for="cover_photo_alt_text_modal" class="col-lg-5 col-form-label text-md-right">Texto alternativo<span>*</span></label>
                    <div class="col-md-7">
                        <input id="cover_photo_alt_text_modal" name="cover_photo_alt_text_modal" type="text" class="form-control" value="" autofocus>
                    </div>
                </div>

                <div id="div-message-modal">
                    
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnSaveAltText" name="btnSaveAltText">Guardar</button>
            </div>
        </div>
    </div>
</div> <!-- End modal -->


</div>

</section>

@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script src="{{ asset('js/project.js') }}?v={{ env('APP_VERSION') }}"></script>

    <script>
        var validator;
        var GLOBAL_URL = "{{ asset('images/proyectos/') }}";
        var GLOBAL_ID_ALT_TEXT = 0;
        var GLOBAL_IS_UPDATING = true;

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

            // setTimeout(() => {
            // }, 500);
                GLOBAL_IS_UPDATING = true;
                $("#proyectista").trigger("change");

            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var photoid = button.data('photoid');
                GLOBAL_ID_ALT_TEXT = photoid;
                debugger
                var _url = $("#hSearchAltTextRoute").val();
                var _token = $("#token").val();
                var _type = "POST";
                var _data = {
                    id: GLOBAL_ID_ALT_TEXT,
                };

                Utils.getData(_url, _token, _type, _data)
                .then(function(result){
                    if(result.result == true){
                        $("#cover_photo_alt_text_modal").val(result.alt_text);
                    }else{
                        showAlertModal(result.message, "alert-warning");
                    }
                })
                .fail(function(qXHR, textStatus, errorThrown){
                    debugger
                    console.log(qXHR);
                })
            });

            $('#exampleModal').on('hidden.bs.modal', function (event) {
                $("#div-message-modal").html("");
                $("#cover_photo_alt_text_modal").val("");
            });

        })
    </script>
@endsection
