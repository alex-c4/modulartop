@extends('layouts.layoutSidebar')

@section('content')

@section('banner')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Validacion de usuarios</h1>
                <p class="mb-5"><strong class="text-white">Lista de usuarios a validar</strong></p>
        
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
            @foreach($usersToValidate as $key => $user)
            <tr>
                <th>{{ $key += 1 }}</th>
                <td>{{ ucfirst($user->name) }} {{ ucfirst($user->lastName) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td style="display: flex; justify-content: space-around;">
                    <form id="formValidationUserValidate" action="{{ route('userValidation.update', $user->id ) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="hOption" id="hOption" value="1">
                        <a href="#" title="Validar usuario" onclick="document.getElementById('formValidationUserValidate').submit()"><span class="icon-check"></span></a>
                    </form>
                &nbsp;
                    <form id="formValidationUserInvalidate" action="{{ route('userValidation.update', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="hOption" id="hOption" value="0">
                        <a href="#" title="Rechazar usuario" onclick="document.getElementById('formValidationUserInvalidate').submit()"><span class="icon-close"></span></a>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
