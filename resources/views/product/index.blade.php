@extends('layouts.layoutSidebar')


@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Productos</h1>
                <p class="mb-5"><strong class="text-white">Lista de productos registrados</strong></p>
        
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($products as $key => $product)
            <tr @if($product->product_isdeleted == 1) class="table-danger" @endif>
                <th>{{ $key += 1 }}</th>
                <td>{{ $product->code }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->category_product_name }}</td>
                <td>{{ $product->product_type_name }}</td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}" title="Editar" ><span class="icon-pencil p-1"></span></a>
                    @if($product->product_isdeleted == 1)
                        <a href="{{ route('product.restore', $product->id) }}" title="Restaurar" ><span class="icon-check p-1"></span></a>
                    @else
                        <a href="{{ route('product.delete', $product->id) }}" title="Inactivar" ><span class="icon-close p-1"></span></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

</section>

@endsection

