@extends('layouts.layoutSidebar')

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Usuario
@endsection

@section('subtitle')
Darse de baja en el sistema
@endsection

<div class="container">
<br>
    <div class="row justify-content-center">
        <div class="card-body">
            <form method="POST" action="{{ route('user.delete') }}" >
                @csrf
                <input type="hidden" name="hIdUser" name="hIdUser" value="{{ auth()->user()->id }}">

                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Eliminar cuenta</h5>
                        <p class="card-text">Si realmente desea eliminar la cuenta, por favor confirmar la petición.</p>
                        <button type="submit" class="btn btn-primary">
                            Confirmar
                        </button>
                    </div>
                </div>

                <!-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                    </div>
                </div> -->
            </form>
        </div>
    </div>
</div>


@endsection
