@extends('layouts.layoutSidebar')

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Validacion de usuarios
@endsection

@section('subtitle')
Lista de usuarios a validar
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
                <th scope="col">Razón social</th>
                <th scope="col">Tipo de cliente</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usersToValidate as $key => $user)
            <tr>
                <th>{{ $key += 1 }}</th>
                <td>{{ ucfirst($user->name) }} {{ ucfirst($user->lastName) }}</td>
                <td>{{ $user->razonSocial }}</td>
                <td>{{ $user->client_type_name }}</td>
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
