@extends('layouts.layoutSidebar')

@section('header')

    <!-- Bootstrap CSS CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->

    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->

    <!-- <link rel="stylesheet" href="{{ asset('css/style4.css') }}"> -->

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">


@endsection

@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/banner/fabricacion.jpg') }});" data-aos="fade">
    <div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-5 mx-auto mt-lg-5 text-center">
        <h1>Bienvenido</h1>
        <p class="mb-5"><strong class="text-white">home</strong></p>
        
        </div>
    </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

@endsection

<div class="wrapper">
        

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info ">
                        <!-- <i class="fas fa-align-left"></i> -->
                        <span class="icon-align-left"></span>
                        <!-- <span>Toggle Sidebar</span> -->
                    </button>

                    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-align-justify"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div> -->

                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="container-dash">
                            <div class="nodo">
                                <div class="nodo-title">
                                    <span class="icon-newspaper-o"></span>
                                    Novedades
                                </div>
                                <div class="nodo-content">
                                    @if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 3)  

                                        <div class="content-btn">
                                            <a href="{{ route('newsletter.create') }}" class="btn btn-plus"><span class="icon-plus"></a>
                                            <!-- <button type="button" class="btn btn-plus"><span class="icon-plus"></button> -->
                                            <div>
                                                Agregar
                                            </div>

                                        </div>
                                        <div class="content-btn">
                                            <a href="{{ route('newsletter.index') }}" class="btn btn-list"><span class="icon-list"></a>
                                            <!-- <button type="button" class="btn btn-list"><span class="icon-list"></button> -->
                                            <div>
                                                Listar
                                            </div>

                                        </div>
                                    @endif

                                        <div class="content-btn">
                                            <a href="{{ route('novedades') }}" class="btn btn-show"><span class="icon-th-large"></a>
                                            <!-- <button type="button" class="btn btn-show"><span class="icon-th-large"></button> -->
                                            <div>
                                                Visualizar
                                            </div>

                                        </div>
                                        <!-- <div class="nodo-content-icon">
                                            <span class="icon-plus"></span>
                                        </div>
                                        <div>
                                            <h5>Agregar</h5>
                                            <p>
                                                Modulo para
                                            </p>
                                        </div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                    @if(Auth::user()->roll_id == 1)  

                    <div class="col-lg-6">
                        <div class="container-dash">
                            <div class="nodo">
                                <div class="nodo-title">
                                    <span class="icon-users"></span>
                                    Nuevos usuarios @if($total > 0)<span class="cantNews">{{ $total }}</span> @endif
                                </div>
                                <div class="nodo-content">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Apellido</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($usersToValidate as $key => $user)
                                            <tr>
                                                <th scope="row">{{ $key += 1 }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->lastName }}</td>
                                            <tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    @endif
                    @if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5)  

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="hRouteAttendFromHome" id="hRouteAttendFromHome" value="{{ route('ordersale.attendFromHome') }}">
                    
                    <div class="col-lg-6">
                        <div class="container-dash">
                            <div class="nodo">
                                <div class="nodo-title">
                                    <span class="icon-file"></span>
                                    Ordenes de compra @if($totalOrders > 0)<span class="cantNews" id="cantOrders">{{ $totalOrders }}</span> @endif
                                </div>
                                <div class="nodo-content">

                                    <div id="divTableOrders" style="width: 100%;">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th >ID</th>
                                                    <th >Fecha de creación</th>
                                                    <th ></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key => $order)
                                                <tr>
                                                    <th scope="row">{{ $order->id }}</th>
                                                    <td>{{ $order->created_at }}</td>
                                                    <th>
                                                        <a href="#" title="Atender" onclick="attend_order(event, {{ $order->id }})"><span class="icon-square-o"></span></a>
                                                    </th>
                                                <tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    
                    @endif

                    
                </div>
            </div>
        </div>
    </div>



    <br>
@endsection

@section('script')

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    
    <!-- Bootstrap JS -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script> -->

    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>

<script>

<script src="{{ asset('js/bootstrap-table.min') }}"></script>

</script>
@endsection