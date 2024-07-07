@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/product-import.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection


@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Producto
@endsection

@section('subtitle')
Import producto
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

        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="import-products-tab" data-toggle="tab" data-target="#import-products" type="button" role="tab" aria-controls="import-product" aria-selected="true">Importar productos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="import-images-tab" data-toggle="tab" data-target="#import-images" type="button" role="tab" aria-controls="import-images" aria-selected="false">Importar imagenes</button>
                    </li>
                </ul>
                <div class="tab-content borde-tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="import-products" role="tabpanel" aria-labelledby="import-products-tab">

                        <!-- Importar productos en archivo excel -->
                        <form id="form_import" method="POST" action="{{ route('product.storeImport') }}" enctype="multipart/form-data">
                    
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        
                            <!-- Archivo a importar -->
                            <div class="row form-group">
                                <label for="import_file" class="col-md-4 col-form-label text-md-right">Cargar archivo<span>*</span></label>
                                <div class="col-md-6">
                                    <input type="file" id="import_file" name="import_file" accept=".xlsx,.xls,.csv" class="form-control mt-2" placeholder="Archivo"> 
                                    <small id="sizeFile" class="form-text text-muted sizeFile">Archivos .xlsx .csv</small>
                                </div>
                                
                                @error('import_file')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="container-error">
                                <div id="errorDivImport"></div>
                            </div>
        
                            <br>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btnSave">
                                        Importar productos
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="import-images" role="tabpanel" aria-labelledby="import-images-tab">

                        <!-- Importar imagenes -->
                        <form id="form_import_images" method="POST" action="{{ route('product.storeImportImages') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                            <!-- Imagenes a importar -->
                            <div class="row form-group">
                                <label for="import_images" class="col-md-4 col-form-label text-md-right">Seleccionar imagenes<span>*</span></label>
                                <div class="col-md-6">
                                    <input type="file" id="import_images[]" name="import_images[]" accept=".png,.jpg" class="form-control mt-2" placeholder="Archivo" multiple> 
                                    <small id="sizeFile" class="form-text text-muted sizeFile">Archivos: .png .jpg</small>
                                    <small id="sizeFile" class="form-text text-muted sizeFile">Cantidad máxima de archivo: <b>{{ $max_file_uploads }}</b></small>
                                    <small id="sizeFile" class="form-text text-muted sizeFile">Tamaña máximo de carga: {{ $upload_max_filesize }}</small>
                                </div>
                                
                                @error('import_images')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="container-error">
                                <div id="errorDivImportImage"></div>
                            </div>
        
                            <br>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btnSave">
                                        Importar imágenes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>

</section>

@endsection

@section('script')
    <script src="{{ asset('js/jquery-validate-1_19.js') }}"></script>

    <script src="{{ asset('js/product/product-import.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script>
        $(document).ready(function(){
            MAX_FILE_UPLOADS = {{ $max_file_uploads }}
            validator();

            validator_images();

        })
        // $(function(){
        //     validator();

        //     validator_images();
        // });
    </script>

@endsection
