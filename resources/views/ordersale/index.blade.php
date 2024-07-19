@extends('layouts.layoutSidebar')

@section('header')

@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
requerimiento
@endsection

@section('subtitle')
Listado de requerimientos
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
                <th scope="col">ID</th>
                <th scope="col">Estatus</th>
                @if(Auth::user()->roll_id == 1)
                    <th scope="col">Cliente</th>
                @endif
                <th scope="col">Fecha de creación</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $key => $order)
            <tr >
                <th>{{ $order->id }}</th>
                <td>{{ $order->statusName }}</td>
                @if(Auth::user()->roll_id == 1)
                    <td>{{ $order->userName }} {{ $order->userLastName }}</td>
                @endif
                <!-- <td>{{ $order->created_at }}</td> -->
                <td>{{ Utils::getLocalTime($order->created_at, 'America/Caracas') }}</td>
                <td style="display: flex; justify-content: space-around;" >

                    
                    @if($order->status == 1) <!-- Procesado -->
                        <a href="javascript:void(0)" title="Procesada" ><span class="icon-check-square-o icon-green"></span></a>
                    @endif

                    @if($order->status == 0)
                        <a href="javascript:void(0)" title="Cancelada" ><span class="icon-ban icon-red"></span></a>
                    @endif

                    @if($order->status == 2 && (Auth::user()->roll_id == 5 || Auth::user()->roll_id == 1) ) <!-- Inicial -->
                        <form id="formOrderAttend_{{ $order->id}}" action="{{ route('ordersale.attend', $order->id) }}" method="post">
                            {{ csrf_field() }}
                            <a href="#" title="Atender" onclick="document.getElementById('formOrderAttend_{{ $order->id}}').submit()"><span class="icon-square-o"></span></a>
                        </form>
                    @endif
                    
                    @if($order->status == 3) <!-- En proceso -->
                        <a href="javascript:void(0)" title="En proceso" ><span class="icon-hourglass-start"></span></a>
                        
                        @if(Auth::user()->roll_id == 5 || Auth::user()->roll_id == 1)
                            <form id="formOrderProcess_{{ $order->id}}" action="{{ route('ordersale.process', $order->id) }}" method="post">
                                {{ csrf_field() }}
                                <a href="#" title="Procesar" onclick="document.getElementById('formOrderProcess_{{ $order->id}}').submit()"><span class="icon-check"></span></a>
                            </form>
                        @endif

                    @endif


                    @if($order->status == 2)
                        <form id="formOrderCancel_{{ $order->id}}" action="{{ route('ordersale.delete', $order->id) }}" method="post">
                            {{ csrf_field() }}
                            <a href="#" title="Cancelar orden" onclick="document.getElementById('formOrderCancel_{{ $order->id}}').submit()"><span class="icon-remove icon-gray"></span></a>
                        </form>
                    @else
                        @if($order->status == 3 && (Auth::user()->roll_id == 5 || Auth::user()->roll_id == 1))
                            <form id="formOrderCancel_{{ $order->id}}" action="{{ route('ordersale.delete', $order->id) }}" method="post">
                                {{ csrf_field() }}
                                <a href="#" title="Cancelar orden" onclick="document.getElementById('formOrderCancel_{{ $order->id}}').submit()"><span class="icon-remove"></span></a>
                            </form>
                        @endif
                    @endif

                    <a href="{{ route('ordersale.show', $order->id) }}" title="Consultar orden" ><span class="icon-eye"></span></a>

                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

</section>

@endsection

@section('script')


@endsection
