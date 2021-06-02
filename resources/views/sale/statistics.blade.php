@extends('layouts.layoutSidebar')

@section('header')

@endsection


@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Estadistica</h1>
                <p class="mb-5"><strong class="text-white">Estadística de venta</strong></p>
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

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

<div class="container m-4">
    <form class="form-inline">

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" name="hGetStatistics" id="hGetStatistics" value="{{ route('sale.getStatisticsData') }}">
    
    
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Rango de consulta</label>
        <select class="custom-select mr-sm-2" id="cbRange" name="cbRange">
            <option value="1" selected>Últimos 7 días</option>
            <option value="2">Por mes</option>
        </select>

        <select class="custom-select mr-sm-2" id="cbMonth" name="cbMonth" disabled>
        @foreach($months as $key => $month)
            <option value="{{ $key += 1 }}" >{{ $month }}</option>
        @endforeach
        </select>

        <input type="button" value="Buscar" class="btn btn-primary" id="btnBuscar" name="btnBuscar">
    </form>
</div>


<div class="container">
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
</div>

</div>

</section>

@endsection

@section('script')
    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION') }}"></script>

    <script src="{{ asset('js/canvasjs.min.js') }}"></script>

    <script>
    var chart = null;
    var _title_chart = "{{ $title_chart }}";
    
    window.onload = function () {

    chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title:{
            text: _title_chart
        },
        axisY: {
            title: "Cantidad",
            titleFontSiza: 24,
            includeZero: true
        },
        axisX: {
            title: "Productos",
            titleFontSiza: 24
        },
        data: [{
            type: "column", //change type to bar, line, area, pie, etc
            //indexLabel: "{y}", //Shows y value on all Data Points
            indexLabelFontColor: "#5A5757",
            indexLabelFontSize: 16,
            indexLabelPlacement: "outside",
            dataPoints: []
        }]
    });
// chart.render();

}

$("#btnBuscar").on("click", function(){
    $("#btnBuscar").prop("disabled", true);
    $("#btnBuscar").val("buscando...");

    var _url = $("#hGetStatistics").val();
    var _token = $("#token").val();
    var _type = "POST";

    var _data = {
        range: $("#cbRange").val(),
        month: $("#cbMonth").val(),
        monthText: $("#cbMonth option:selected").text()
    }
    Utils.getData(_url, _token, _type, _data)
    .then(function(result){
        debugger
        chart.options.title.text = result.title;
        chart.options.data[0].dataPoints = result.data;
        chart.render();

        $("#btnBuscar").prop("disabled", false);
        $("#btnBuscar").val("Buscar");
    })
    .fail(function(qXHR, textStatus, errorThrown){
        debugger
        // showAlertModal(result.message, "alert-warning");
        console.log(qXHR);
        $("#btnBuscar").prop("disabled", false);
        $("#btnBuscar").val("Buscar");
    })
});

$("#cbRange").on("change", function(){debugger
    var _val = parseInt(this.value);
    if(_val == 1){
        $("#cbMonth").prop("disabled", true);
    }else{
        $("#cbMonth").prop("disabled", false);

    }
})

</script>
@endsection
