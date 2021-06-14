@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/layout-message.css') }}">
@endsection

@section('content')

<div class="messageContainer">

</div>
    <div class="container sm-width internalContainer">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="logoContainer">
                    <div class="logoMessage">
                        <img src="{{ $img }}" alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9" >
                <div>
                    <div class="titleContainer">
                        <h1>{!! $title !!}</h1>
                    </div>
                    <div class="contentContainer">
                        {!! $content !!}

                        @if(isset($fromLogin) != null)
                            Ubique el correo de validación en la bandeja de entrada de su cuenta de correo. De no haber recibido ninguno,
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <input type="hidden" name="email" id="email" value="{{ $email }}">
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">haga clic aquí para solicitar otro.</button>.
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <!-- <script src="{{ asset('js/user-register.js') }}"></script> -->
@endsection