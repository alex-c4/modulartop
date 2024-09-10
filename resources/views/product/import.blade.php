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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="download-template-tab" data-toggle="tab" data-target="#download-template" type="button" role="tab" aria-controls="download-template" aria-selected="false">Descargar plantillas</button>
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
                                        <small id="sizeFile" class="form-text text-muted sizeFile">Archivos .xlsx .xls .csv</small>
                                    </div>
                                    
                                    @error('import_file')
                                        <span class="invalid-field text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @if(isset($failures) != null)
                                        <ul>
                                        @foreach($failures as $error)
                                            @foreach($error->errors() as $msg)
                                                <li>Fila <b>{{ $error->row() }}</b>, {!! $msg !!}</li>
                                            @endforeach
                                        @endforeach
                                        </ul>
                                    @endif
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

                        <div class="tab-pane fade" id="download-template" role="tabpanel" aria-labelledby="download-template-tab">
                            <div class="container-buttons">
                                <div>
                                    <input type="hidden" id="routeCurrent" value="{{ route('product.exportProductFile') }}">
                                    <input type="hidden" id="routeCurrent2" value="{{ route('product.exportTemplateFile') }}">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                    <button type="button" class="btn btn-primary" onclick="Utils.onclick_downloadIDs()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM7.86 14.841a1.13 1.13 0 0 0 .401.823q.195.162.479.252.284.091.665.091.507 0 .858-.158.355-.158.54-.44a1.17 1.17 0 0 0 .187-.656q0-.336-.135-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.565-.21l-.621-.144a1 1 0 0 1-.405-.176.37.37 0 0 1-.143-.299q0-.234.184-.384.188-.152.513-.152.214 0 .37.068a.6.6 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.199-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.44 0-.777.15-.336.149-.527.421-.19.273-.19.639 0 .302.123.524t.351.367q.229.143.54.213l.618.144q.31.073.462.193a.39.39 0 0 1 .153.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.168.07-.413.07-.176 0-.32-.04a.8.8 0 0 1-.249-.115.58.58 0 0 1-.255-.384zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036zm1.923 3.325h1.697v.674H5.266v-3.999h.791zm7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036z"/>
                                    </svg>
                                    Descargar IDs
                                </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" onclick="Utils.onclick_downloadTemplate()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h7v1a1 1 0 0 1-1 1zm7-3H6v-2h7z"/>
                                    </svg>  
                                    Descargar plantilla
                                    </button>
                                </div>
                            </div>
                            <div class="container-msg">
                                <b id="messageFile" style="display: none"></b>
                            </div>

                            
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
    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

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
