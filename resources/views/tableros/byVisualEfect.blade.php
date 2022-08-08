@extends('layouts.layout')

@section('meta') 
<title>Tableros Melamínicos - Acabado Tradicional - Modular Top</title> 
<meta name="description" 
content="Tablero melaminico hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" />

@endsection

@section('content')


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/tableros') }}/{{ $imgToBanner }});" data-aos="fade">
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
    <div class="site-section" id="properties-section">
        <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 text-left">
            <h2 class="section-title mb-3">{{ $title }}</h2>
            <p class="lead">{{ $sub_title }}</p>
          </div>
        </div>

        @if(count($IDsToGroupTableros) > 0)
          <h4>Tableros</h4>
          <hr>
          <!-- mostrar primero tableros "id_product_type 1=tableros; 2=tapacanto" -->
          @foreach($IDsToGroupTableros as $item)
            <div class="row mb-5">
                <div class="col-md-12 text-left">
                    <h3 class="section-title mb-3">{{ $item["name"] }}</h3>
                    <!-- <p class="lead">Tableros melamínicos hidrófugos y natural MDP importados y nacionales.</p> -->
                </div>
            </div>

            <div class="row large-gutters">
                @foreach($products_tableros as $product)
                    @if($product->id_subcategory_color == $item["id"] && $product->id_product_type==1)
                      <div class="col-md-6 col-lg-3 mb-5 mb-lg-5 ">
                        <div class="ftco-media-1">
                          <div class="ftco-media-1-inner">
                            <img src="{{ asset('images/image_products') }}/{{ $product->img_product }}" alt="{{ $product->description_product }}" class="img-fluid">
                            <div class="ftco-media-details">
                              <h3><BR>{{ $product->name_product }}</h3>
                              <p><a href="{{ route('tablero.description', $product->id_product) }}">Ver más</a></p>
                              <!-- <strong>BLANCO 100</strong>-->
                            </div>
                          </div> 
                        </div>
                      </div>
                    @endif
                @endforeach
            </div>

          @endforeach
        @endif

        <!-- Tapacantos -->
        @if(count($products_tapacantos) > 0)
          <h4>Tapacantos</h4>
          <hr>
          <!-- Luego mostrar los tapacantos "id_product_type 1=tableros; 2=tapacanto" -->
          <div class="row large-gutters">
            @foreach($products_tapacantos as $product)
              @if($product->id_product_type==2)
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-5 ">
                  <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                      <img src="{{ asset('images/image_products') }}/{{ $product->img_product }}" alt="{{ $product->description_product }}" class="img-fluid">
                      <div class="ftco-media-details">
                        <h3><BR>{{ $product->name_product }}</h3>
                        <p><a href="{{ route('tablero.description', $product->id_product) }}">Ver más</a></p>
                        <!-- <strong>BLANCO 100</strong>-->
                      </div>
                    </div> 
                  </div>
                  </div>
              @endif
            @endforeach
          </div>
        @endif

      </div>
    </div>
    <!-- Fin Seccion Materia Prima-->


@endsection
