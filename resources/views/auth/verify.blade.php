@extends('layouts.layout')

@section('header')
<style>
    .margin-top-bottom{
        margin-top: 100px !important;
        margin-bottom: 100px !important;
    }
</style>

@endsection


@section('content')
<div class="separador">

</div>

<div class="container margin-top-bottom">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Debe validar su cuenta de correo antes de ingresar al sistema</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                        </div>
                    @endif

                    Ubique el correo de validación en la bandeja de entrada de su cuenta de correo. De no haber recibido ninguno,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">haga clic aquí para solicitar otro.</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
