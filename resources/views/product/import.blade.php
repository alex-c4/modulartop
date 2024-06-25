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

                    <form id="form_product" method="POST" action="{{ route('product.storeImport') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <!-- Archivo a exportar -->
                        <div class="row form-group">
                            <label for="image_0" class="col-md-4 col-form-label text-md-right">Cargar archivo<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="import_file" name="import_file" accept=".xlsx,.xls,.csv" class="form-control mt-2" placeholder="Archivo" > 
                                <small id="sizeFile" class="form-text text-muted sizeFile">Seleccione el archivo</small>
                            </div>
                            
                            @error('archivo')
                                <span class="invalid-field text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</section>

@endsection

@section('script')

    <script src="{{ asset('js/product/product-update.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

@endsection
