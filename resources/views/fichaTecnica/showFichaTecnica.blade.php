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
Descarga de ficha técnica
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


        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        
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
