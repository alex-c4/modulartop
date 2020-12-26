@extends('layouts.layout')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Novedades</h1>
                <p class="mb-5"><strong class="text-white">Lista de novedades</strong></p>
        
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 


<section class="site-section bg-light bg-image" id="contact-section">
    <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Novedades</h2>
          </div>
        </div>
    </div>    

</section>


<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col" colspan="5">Fecha de publicación</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletters as $news)

            <tr @if($news->isDeleted == 1) class="bg-warning" @endif>
                <th scope="row">{{$news->id}}</th>
                <td>{{ $news->title }}</td>
                <td>{{ $news->name }}</td>
                <td>{{ $news->created_at }}</td>
                <td>
                    <a href="{{ route('newsletter.edit', $news->id) }}" title="Editar"><span class="icon-pencil-square-o"></span></a>
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
