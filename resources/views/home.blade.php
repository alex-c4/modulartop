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

    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ env('APP_VERSION') }}">

    <style>
        .text-sm{
            font-size: smaller;
        }

        .soy-cliente{
            color: blue !important;
            text-decoration: underline !important;
            font-size: smaller;
        }

        .icons-orders{
            display: flex; 
            justify-content: space-around;
        }

        .icon-check:hover{
            color: green;
        }

        .icon-close:hover{
            color: red;
        }
        .icon-remove:hover{
            color: red;
        }
    </style>


@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Bienvenido
@endsection

@section('subtitle')
home
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

                    @if(Auth::user()->roll_id == 2)
                    <div class="ml-auto pr-4">
                        <a href="{{ route('user.edit') }}" class="soy-cliente" >Soy o quiero ser cliente</a>
                    </div>
                    @endif

                    <div class="" id="navbarSupportedContent">

                        <div class="dropdown ml-auto">
                            <button class="btn dropdown-toggle menu-boton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="contenedor-menu">
                                    <div class="menu-img">
                                        <img src="{{ asset('images/customers_logos/avatars') }}/{{ $avatar }}" width="40px" height="40px" alt="" srcset="">
                                    </div>
                                    <div class="contendor-name">
                                        <div class="menu-name">{{ $userName }} {{ $userLastName }}</div>
                                        <div class="menu-roll">{{ $roll }}</div>
                                    </div>
                                </div>
                            </button>
                            <div class="dropdown-menu menu-dropdown" aria-labelledby="dropdownMenuButton" id="menuDropdown">
                                <a class="dropdown-item" href="{{ route('user.edit') }}">
                                    <span class="icon-pencil"></span>
                                    Mis datos
                                </a>
                                <a class="dropdown-item" href="{{ route('password.showFormResetPassw') }}">
                                    <span class="icon-lock"></span>
                                    Cambio de clave
                                </a>
                                <a class="dropdown-item" href="{{ route('user.delete.confirm') }}">
                                    <span class="icon-trash"></span>
                                    Eliminar mi cuenta
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <span class="icon-close"></span>
                                    Salir
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </nav>

            <div class="container">
                <div class="row" style="justify-content: center">
                    @if(Auth::user()->roll_id != 5) 
                    <!-- Novedades -->
                    <div class="col-sm-12 col-md-6 class-overflow">

                        <div class="container-dash"  style="width: 100%;">
                            <div class="nodo"  style="width: 100%;">
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
                    @endif

                    @if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5)  

                    <input type="hidden" name="hRouteUserUpdateFromHome" id="hRouteUserUpdateFromHome" value="{{ route('userValidation.updateFromHome') }}">

                    <!-- Clientes por confirmar -->
                    <div class="col-sm-12 col-md-6 class-overflow">
                        <div class="container-dash">
                            <div class="nodo">
                                <div class="nodo-title">
                                    <span class="icon-users"></span>
                                    Clientes por confirmar @if($total > 0)<span class="cantNews">{{ $total }}</span> @endif
                                </div>
                                <div class="nodo-content">
                                    <div id="divTableUsers" style="width: 100%;">
                                        <table class="table table-sm text-sm">
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
                                                    <th scope="row">{{ $key += 1 }}</th>
                                                    <td>{{ $user->name }} {{ $user->lastName }}</td>
                                                    <td>{{ $user->razonSocial }}</td>
                                                    <td>{{ $user->client_type_name }}</td>
                                                    <td class="icons-orders">

                                                        <a href="#" title="Validar usuario" onclick="update_usuario(event, {{ $user->id }}, 1)"><span class="icon-check"></span></a>
                                                        <a href="#" title="Rechazar usuario" onclick="update_usuario(event, {{ $user->id }}, 0)"><span class="icon-close"></span></a>

                                                        <!-- <form id="formValidationUserValidate" action="{{ route('userValidation.update', $user->id ) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="hOption" id="hOption" value="1">
                                                            <a href="#" title="Validar usuario" onclick="document.getElementById('formValidationUserValidate').submit()"><span class="icon-check"></span></a>
                                                        </form>
                                                        
                                                        <form id="formValidationUserInvalidate" action="{{ route('userValidation.update', $user->id) }}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="hOption" id="hOption" value="0">
                                                            <a href="#" title="Rechazar usuario" onclick="document.getElementById('formValidationUserInvalidate').submit()"><span class="icon-close"></span></a>
                                                        </form> -->
                                                    </td>
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
                    @if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5)  

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="hRouteAttendFromHome" id="hRouteAttendFromHome" value="{{ route('ordersale.attendFromHome') }}">
                    <input type="hidden" name="hRouteWelcome" id="hRouteWelcome" value="{{ route('welcome') }}">
                    <input type="hidden" name="hRouteCancelFromHome" id="hRouteCancelFromHome" value="{{ route('ordersale.cancelFromHome') }}">

                    <!-- Ordenes de compra -->
                    <div class="col-sm-12 col-md-6 class-overflow">
                        <div class="container-dash">
                            <div class="nodo">
                                <div class="nodo-title">
                                    <span class="icon-file"></span>
                                    Requerimientos @if($totalOrders > 0)<span class="cantNews" id="cantOrders">{{ $totalOrders }}</span> @endif
                                </div>
                                <div class="nodo-content">

                                    <div id="divTableOrders" style="width: 100%;">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th >ID</th>
                                                    <th >Cliente</th>
                                                    <th >Fecha de creación</th>
                                                    <th ></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key => $order)
                                                <tr>
                                                    <th scope="row">{{ $order->id }}</th>
                                                    <td>{{ $order->userName }} {{ $order->userLastName }}</td>
                                                    <!-- <td>{{ $order->created_at }}</td> -->
                                                    <td>{{ Utils::getLocalTime($order->created_at, 'America/Caracas') }}</td>
                                                    <th class="icons-orders">
                                                        @if($order->status == 2)
                                                            <a href="#" title="Atender" onclick="attend_order(event, {{ $order->id }})"><span class="icon-square-o"></span></a>
                                                        @elseif($order->status == 3)
                                                            <form id="formOrderProcess_{{ $order->id}}" action="{{ route('ordersale.process', $order->id) }}" method="post">
                                                                {{ csrf_field() }}
                                                                <a href="#" title="Procesar" onclick="document.getElementById('formOrderProcess_{{ $order->id}}').submit()"><span class="icon-check m-1"></span></a>
                                                            </form>
                                                            
                                                            <a href="#" title="Cancelar orden" onclick="cancel_order(event, {{ $order->id }})"><span class="icon-remove"></span></a>
                                                        @endif
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

                    <!-- Tableros -->
                    <div class="col-sm-12 col-md-6 class-overflow">
                        <div class="container-dash">
                            <div class="nodo">
                                <div class="nodo-title">
                                    <span class="icon-square"></span>
                                    Tableros
                                </div>
                                <div class="nodo-content">

                                    <div id="divTableros" style="width: 100%;">
                                        
                                        <div class="fondo-rojo">
                                            &nbsp;
                                        </div>

                                        <div class="div-subacabado">
                                            <a href="{{ route('tablero.byVisualEfect', 1) }}">
                                                <img src="images/tableros/tablero-altobrillo.jpg" alt="Tablero melaminico alto brillo MDF importado, acabado premium oneskin" class="img-tm">
                                            </a>
                                            <div class="title-tableros">
                                                <a href="{{ route('tablero.byVisualEfect', 1) }}">ACABADOS PREMIUM</a>
                                                <p>MDF-ALTO BRILLO-IMPORTADO</p>
                                            </div>
                                        </div>

                                        <div class="div-subacabado">
                                            <a href="{{ route('tablero.byVisualEfect', 2) }}">
                                                <img src="images/tableros/tablero-supermate.jpg" alt="Tablero melaminico super mate MDF importado, acabado premium oneskin" class="img-tm">
                                            </a>
                                            <div class="title-tableros">
                                                <a href="{{ route('tablero.byVisualEfect', 2) }}">ACABADOS PREMIUM</a>
                                                <p>MDF-SUPER MATE-IMPORTADO</p>
                                            </div>
                                        </div>

                                        <div class="div-subacabado">
                                            <a href="{{ route('tablero.byVisualEfect', 3) }}">
                                                <img src="images/tableros/tablero-cuerpo.jpg" alt="Tablero melaminico hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" class="img-tm">
                                            </a>
                                            <div class="title-tableros">
                                                <a href="{{ route('tablero.byVisualEfect', 3) }}">ACABADOS TRADICIONALES</a>
                                                <p>
                                                    MDP HR (HIDRÓFUGOS) Y ESTÁNDAR<br>
                                                    IMPORTADOS Y NACIONALES
                                                </p>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
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

    <script src="{{ asset('js/bootstrap-table.min.js') }}"></script>

@endsection