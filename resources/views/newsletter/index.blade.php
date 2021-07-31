@extends('layouts.layoutSidebar')

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Novedades
@endsection

@section('subtitle')
Lista de novedades
@endsection



<div class="container">
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
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Fecha de publicación</th>
                <th scope="col" colspan="4">Autor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletters as $news)

            <tr @if($news->isDeleted == 1) class="bg-warning" @endif>
                <th scope="row">{{$news->id}}</th>
                <td>{{ $news->title }}</td>
                <td>{{ $news->name }}</td>
                <td>{{ $news->published_at }}</td>
                <td>{{ $news->userName }} {{ $news->userLastName }}</td>
                <td>
                    <a href="{{ route('newsletter.edit', $news->id) }}" title="Editar"><span class="icon-pencil-square-o"></span></a>
                </td>
                <td>
                    <a href="{{ route('show', [$news->id, $news->url]) }}" title="Previsualizar"><span class="icon-binoculars"></span></a>
                </td>
                <td>
                    @if($news->isDeleted == 0)
                        <form id="formDestroy_{{ $news->id }}" action="{{ route('newsletter.delete', $news->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a href="#" title="Ocultar novedad" onclick="document.getElementById('formDestroy_{{ $news->id }}').submit()"><span class="icon-eye-slash"></span></a>
                        </form>
                    @else
                        <form id="formRestore_{{ $news->id }}" action="{{ route('newsletter.restore', $news->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <a href="#" title="Activar novedad" onclick="document.getElementById('formRestore_{{ $news->id }}').submit()"><span class="icon-undo"></span></a>
                        </form>
                    @endif
                </td>
            </tr>
            
            @endforeach
        </tbody>

    </table>

</div>


@endsection
