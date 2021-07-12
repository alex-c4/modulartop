@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/ficha_tecnica.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Ficha técnica
@endsection

@section('subtitle')
Carga de ficha técnica
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
                <div class="alert alert-info alert-dismissible fade show" role="alert">
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
                        <form id="form_ficha_tecnica" method="POST" action="{{ route('fichaTecnica.storeFichaTecnica') }}" enctype="multipart/form-data">
                            
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                            <!-- nombre -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>
                                <div class="col-md-6">
                                    <input maxlength="60" id="name" name="name" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <!-- Ficha tecnica -->
                            <div class="row form-group">
                                <label for="ficha" class="col-md-4 col-form-label text-md-right">Ficha técnica<span>*</span></label>
                                <div class="col-md-6">
                                    <input type="file" id="ficha" name="ficha" accept="" class="form-control mt-2" placeholder="Imagen" required> 
                                </div>
                                
                                @error('ficha')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btnSave">
                                        Guardar
                                    </button>
                                </div>
                            </div>

                        </form>

                        @if(count($fichas) > 0)
                        <table class="table table-hover mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha de actualización</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fichas as $key => $ficha)
                                <tr>
                                    <th>{{$key += 1}}</th>
                                    <td>{{ $ficha->name }}</td>
                                    <td>{{ explode(' ', $ficha->created_at)[0] }}</td>
                                    <td>
                                        <a class="mr-3" href="{{ route('fichaTecnica.downloadFichaTecnica', $ficha->id) }}" target="_blank" title="Descargar {{ $ficha->name }}"><span class="icon-download"></span></a>
                                        <a href="{{ route('fichaTecnica.deleteFichaTecnica', $ficha->id) }}" title="Borrar {{ $ficha->name }}"><span class="icon-trash"></span></a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    
                    </div>
                </div>
            </div>
        </div>






    </div>

</section>

@endsection
