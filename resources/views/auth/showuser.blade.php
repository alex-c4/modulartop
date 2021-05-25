@extends('layouts.layoutSidebar')

@section('content')

@section('banner')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Usuarios</h1>
                <p class="mb-5"><strong class="text-white">Lista de usuarios registrados en el sistema</strong></p>
        
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

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
                <th scope="col">Cliente</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr class="@if($user->is_deleted == 1)table-danger @endif">
                <th>{{ $key += 1 }}</th>
                <td>{{ ucfirst($user->name) }} {{ ucfirst($user->lastName) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td style="display: flex; justify-content: space-around;" >
                    <form id="formUserRead_{{ $user->id}}" action="{{ route('user.read', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        <a href="#" title="Consultar" onclick="document.getElementById('formUserRead_{{ $user->id}}').submit()"><span class="icon-eye"></span></a>
                    </form>
                
                    @if($user->is_deleted == 0)
                        <form id="formUserEdit_{{ $user->id}}" action="{{ route('user.edit', $user->id) }}" method="get">
                            {{ csrf_field() }}
                            <a href="#" title="Editar" onclick="document.getElementById('formUserEdit_{{ $user->id}}').submit()"><span class="icon-pencil"></span></a>
                        </form>
                        <form id="formUserInactive_{{ $user->id}}" action="{{ route('user.inactive_form', $user->id) }}" method="get">
                            {{ csrf_field() }}
                            <a href="#" title="Inactivar" onclick="document.getElementById('formUserInactive_{{ $user->id}}').submit()"><span class="icon-trash"></span></a>
                        </form>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
