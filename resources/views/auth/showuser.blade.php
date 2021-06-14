@extends('layouts.layoutSidebar')

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Usuarios
@endsection

@section('subtitle')
Lista de usuarios registrados en el sistema
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
                <th scope="col">Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users_admin as $key => $user)
            <tr class="@if($user->is_deleted == 1)table-danger @endif">
                <th>{{ $key += 1 }}</th>
                <td>{{ ucfirst($user->name) }} {{ ucfirst($user->lastName) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rolName }}</td>
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

    <div class="m-5">
        
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Tipo de cliente</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr class="@if($user->is_deleted == 1)table-danger @endif">
                <th>{{ $key += 1 }}</th>
                <td>{{ ucfirst($user->name) }} {{ ucfirst($user->lastName) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rolName }}</td>
                <td>{{ $user->typeClientName }}</td>
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
