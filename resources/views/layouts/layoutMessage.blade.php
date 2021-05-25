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