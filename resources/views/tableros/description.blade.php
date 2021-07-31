@extends('layouts.layout')

@section('meta') 
<title>Tableros Melamínicos - Acabado Tradicional - Modular Top</title> 
<meta name="description" 
content="Tablero melaminico hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" />

<style>
.containerActionButtons{
    display: flex;
    width: 100%;
    justify-content: center;
}
.actionButtons{
    display: flex;
}
.actionButtons span{
    margin: 5px
}
</style>
@endsection

@section('content')


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/tableros/banner-premium.jpg') }}" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Tableros Melamínicos</h1>
            <p class="mb-5"><strong class="text-white">Belleza, calidad, alta resistencia y variedad de colores.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


    <!-- Seccion Tableros Melaminicos-->
    <div class="site-section" id="about-section">

        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12 text-left">
                    <h2 class="section-title mb-3">Descripción</h2>
                    <p class="lead">{{ $product->name_product_type }}</p>
                </div>
            </div>

            <div class="card mb-3 text-center" style="max-width: 650px; margin:auto">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('images/image_products') }}/{{ $product->img_product }}" alt="{{ $product->name_product_type }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name_product }}</h5>
                            <form>
                                <div class="form-group row mb-1">
                                    <label class="col-sm-5 col-form-label text-right"><strong>Código:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label class="col-form-label">{{ $product->code_product }}</label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-1">
                                    <label class="col-sm-5 col-form-label text-right"><strong>Precio:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label class="col-form-label">{{ $product->price_product }} <strong>P.V.P</strong></label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-1">
                                    <label  class="col-sm-5 col-form-label text-right"><strong>Categoria:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label  class="col-form-label">{{ $product->name_product_category }}</label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-1">
                                    <label  class="col-sm-5 col-form-label text-right"><strong>Acabado:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label  class="col-form-label">{{ $product->name_subcategory_acabado }}</label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-1">
                                    <label  class="col-sm-5 col-form-label text-right"><strong>Sub-acabado:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label  class="col-form-label">{{ $product->name_subcategory_efecto_v }}</label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-1">
                                    <label class="col-sm-5 col-form-label text-right"><strong>Material:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label  class="col-form-label">{{ $product->name_subcategory_material }}</label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-1">
                                    <label class="col-sm-5 col-form-label text-right"><strong>Tipo de sustrato:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label  class="col-form-label">{{ $product->name_subcategory_sustrato }}</label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-1">
                                    <label class="col-sm-5 col-form-label text-right"><strong>Color:</strong></label>
                                    <div class="col-sm-7 text-left">
                                        <label class="col-form-label">{{ $product->name_subcategory_color }}</label>
                                        <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-md-12 p-2">
                        <div class="form-group row mb-1">
                            <div class="containerActionButtons">
                                <div class="actionButtons">
                                <a href="{{ route('tablero.showImages', $product->id_product) }}" alt="Ver galería del producto" class="p-2">
                                    <span class="icon-circle-o"></span>
                                    Ver galería del producto
                                </a>

                                </div>
                            </div>
                            

                        </div>
                        <div class="form-group row mb-1">
                            <label for="inputEmail3" class="col-sm-12 col-form-label text-left"><strong>Descripción:</strong></label>
                            <div class="col-sm-12 text-justify">
                                <label for="inputEmail3" class="col-form-label">{{ $product->description_product }}</label>
                                <!-- <input disabled type="email" class="form-control" id="inputEmail3"> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    
    </div>
    <!-- Fin Seccion Materia Prima-->


@endsection

@section("script")
    <script>

        $(function(){
            $(".alert").hide();
        });


    </script>
@endsection