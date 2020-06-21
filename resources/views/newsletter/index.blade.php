@extends('layouts.layout')

@section('content')

<div class="site-block-wrap">
    <div class="owl-carousel with-dots">
        <div class="site-blocks-cover overlay overlay-2" style="background-image: url({{ asset('images/banner/fabricacion.jpg')}});" data-aos="fade" id="home-section">  
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 mt-lg-5 text-center">
                        <h1 class="text-shadow">Novedades</h1>
                        <p class="mb-5 text-shadow">Lista de novedades</p>
                    </div>
                </div>
            </div>        
        </div> 
    </div>
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
                <th scope="col" colspan="4">Fecha de publicación</th>
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
                    <a href="{{ route('newsletter.edit', $news->id) }}"><span class="icon-pencil-square-o"></span></a>
                    &nbsp;
                </td>
                <td>
                    @if($news->isDeleted == 0)
                        <form id="formDestroy_{{ $news->id }}" action="{{ route('newsletter.delete', $news->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a href="#" title="Ocultar novedad" onclick="document.getElementById('formDestroy_{{ $news->id }}').submit()"><span class="icon-trash-o"></span></a>
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
