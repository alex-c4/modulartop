@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/user-register.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Usuario
@endsection

@section('subtitle')
Edición de información
@endsection


<section class="blog-section spad" id="blog">
        @if(isset($msg) != null)
            <div class="container">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{$msg}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        @else

        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" id="formEditUser" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <!-- Nombre -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" maxlength="20" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label text-md-right">Apellido<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="lastName" name="lastName" type="text" maxlength="20" class="form-control @error('lastName') is-invalid @enderror" value="{{ $user->lastName }}" required>
                                        @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico<span>*</span></label>
                                    <div class="col-md-6">
                                        <input id="email" disabled type="email" maxlength="60" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="off">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" style="display: flex; justify-content: center;">
                                    <div class="text-center">
                                        <img src="{{ asset('images/customers_logos/avatars') }}/@if($user->avatar == '')no_image.png @else{{ $user->avatar }}@endif" width="100px" class="rounded" alt="...">
                                    </div>
                                </div>

                                <!-- Imagen del cliente -->
                                <div class="form-group row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                    <div class="col-md-6">
                                        <input id="avatar" type="file" maxlength="60" class="form-control" name="avatar" accept="image/png,image/jpeg,image/jpg">
                                        <small id="emailHelp" class="form-text text-muted small-register-user" >Se recomienda imagen de tamaño (200 x 200 pixeles)</small>
                                    </div>
                                </div>

                                <!-- Telefono del cliente -->
                                <div class="form-group row">
                                    <label for="clientPhone" class="col-md-4 col-form-label text-md-right">Teléfono<span>*</span></label>
                                    <div class="col-md-6">
                                        <input id="clientPhone" type="number" maxlength="15" class="form-control @error('clientPhone') is-invalid @enderror" name="clientPhone" value="{{ $user->phone }}">
                                        @error('clientPhone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                @if(auth()->user()->roll_id == 1 || auth()->user()->roll_id == 5)
                                <!-- Rol en el sistema  -->
                                <div class="form-group row">
                                    <label for="rolId" class="col-md-4 col-form-label text-md-right">Rol<span>*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="rolId" name="rolId">
                                        @foreach($roles as $rol)
                                            @if($user->roll_id == $rol->id)
                                                <option selected value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                            @else
                                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif

                                <!-- Direccion del cilente -->
                                <div class="form-group row">
                                    <label for="clientAddress" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="clientAddress" name="clientAddress" rows="3" >{{ old('address', $user->address) }}</textarea>
                                    </div>
                                </div>

                                <!-- Es cliente -->
                                <div class="form-group row">
                                    <div class="col-md-4 text-md-right">
                                        <label class="form-check-label" for="chkClient"><strong>Soy o quiero ser cliente</strong> </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" @if($isCompanyClient == true) checked @endif class="form-check-input" id="chkClient" name="chkClient">
                                        </div>
                                    </div>
                                </div>

                                <!-- contenedor cliente -->
                                <div class="container-hidden" id="divContainer">

                                    <!-- RIF -->
                                    <div class="form-group row">
                                        <label for="rif" class="col-md-4 col-form-label text-md-right">Rif<span>*</span></label>
                                        <div class="col-md-6">
                                            <input maxlength="20" id="rif" type="text" class="form-control @error('rif') is-invalid @enderror uppercase-field" name="rif" value="{{ old('rif', $user->rif) }}" >
                                            @error('rif')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Razon social -->
                                    <div class="form-group row">
                                        <label for="rsocial" class="col-md-4 col-form-label text-md-right">Razón social<span>*</span></label>
                                        <div class="col-md-6">
                                            <input maxlength="50" id="rsocial" name="rsocial" type="text" class="form-control @error('rsocial') is-invalid @enderror" value="{{ old('rsocial', $user->razonSocial) }}">
                                            @error('rsocial')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Direccion del cliente -->
                                    <div class="form-group row">
                                        <label for="companyAddress" class="col-md-4 col-form-label text-md-right">Dirección fiscal<span>*</span></label>
                                        <div class="col-md-6">
                                            <textarea class="form-control @error('companyAddress') is-invalid @enderror" id="companyAddress" name="companyAddress" rows="3">{{ old('companyAddress', $user->companyAddress) }}</textarea>
                                            @error('companyAddress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Telefono -->
                                    <div class="form-group row">
                                        <label for="companyPhone" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                                        <div class="col-md-6">
                                            <input id="companyPhone" type="number" class="form-control @error('companyPhone') is-invalid @enderror" name="companyPhone" value="{{ old('companyPhone', $user->companyPhone) }}">
                                            @error('companyPhone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Tipo de empresa  -->
                                    <div class="form-group row">
                                        <label for="company_type" class="col-md-4 col-form-label text-md-right">Tipo de empresa<span>*</span></label>
                                        <div class="col-md-6">
                                            <select class="form-control @error('company_type') is-invalid @enderror" id="company_type" name="company_type">
                                            @foreach($company_types as $type)
                                                @if($user->company_type_id == $type->id)
                                                    <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                                                @else
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                            @error('company_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row" style="display: flex; justify-content: center;">
                                        <div class="text-center">
                                            <img src="{{ asset('images/customers_logos/companyLogo') }}/@if($user->companyLogo == '')no_image.png @else{{ $user->companyLogo }}@endif" width="100px" class="rounded" alt="...">
                                        </div>
                                    </div> -->
                                
                                    <!-- Imagen de la compañia -->
                                    <!-- <div class="form-group row">
                                        <label for="companyLogo" class="col-md-4 col-form-label text-md-right">Logo</label>

                                        <div class="col-md-6">
                                            <input id="companyLogo" type="file" class="form-control" name="companyLogo" accept="image/png,image/jpeg,image/jpg">
                                        </div>
                                    </div> -->

                                </div><!-- fin contenedor cliente -->

                                <div class="form-group row">
                                    <div class="col-md-3 text-md-right">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <small id="emailHelp" class="form-text text-muted"><span>*</span> Campos obligatorios</small>
                                    </div>
                                </div>
    
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <br>

                </div>
            </div>
        </div>

        @endif
    </section>

<!-- </div> -->
@endsection

@section('script')
    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/user-register.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script>
        
        var is_client;
        try {
            is_client = "{{ old('chkClient') }}";
        } catch (error) {
            is_client = "";
        }
        
        var isCompanyClient = '{{ $isCompanyClient }}';
        $(function() {
            if(isCompanyClient == 1){
                $("#chkClient").trigger("change")
            }else{
                check_isClient();
            }
        });

        function check_isClient(){
            if(is_client == "on"){
                Utils.trigger_chkClient(true);
            }
        }
    </script>
@endsection

