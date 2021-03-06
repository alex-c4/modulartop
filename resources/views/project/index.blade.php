@extends('layouts.layoutSidebar')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Proyectos
@endsection

@section('subtitle')
Lista de proyectos
@endsection

@section('content')


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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Proyectista</th>
                <th scope="col">Descripción</th>
                <th scope="col"></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($projects as $key => $project)
            <tr>
                <th>{{ $key += 1 }}</th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->proyectista }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    <a href="{{ route('project.edit', $project->id) }}" title="Editar" ><span class="icon-pencil p-1"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

</section>

@endsection

