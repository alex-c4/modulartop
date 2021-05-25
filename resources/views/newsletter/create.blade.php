@extends('layouts.layoutSidebar')

@section('content')

<link rel="stylesheet" href="{{ asset('js/sceditor/minified/themes/square.min.css') }}" id="theme-style" />
<script src="{{asset('js/sceditor/minified/sceditor.min.js?v=4')}} "></script>
<script src="{{asset('js/sceditor/minified/icons/monocons.js')}} "></script>
<script src="{{asset('js/sceditor/minified/formats/xhtml.js')}} "></script>

<link rel="stylesheet" href="{{ asset('css/newsletter.css') }}">
<style>
    .sceditor-container{
        width: 100% !important;
    }
    #content-div-tags{
        display: flex;
        background-color: #fffefe;
        padding: 5px;
        justify-content: flex-start;
        flex-wrap: wrap;
    }

    .div-tags{
        background-color: #f4f4f4;
        width: fit-content;
        padding: 5px;
        font-size: small;
        color: #666666;
        font-weight: bold;
        border-radius: 5px;
        border: 1px solid #ccd2d8;
        display: flex;
        align-content: center;
        justify-content: center;
        align-items: center;
        margin: 2px;
    }

    .div-tags button{
        border: none;
        cursor: pointer;
        color: #8b171a;
    }

    #tags{
        height: 38px !important;
    }
    
</style>

@section('banner')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5 mx-auto mt-lg-5 text-center">
                    <h1>Novedades</h1>
                <!-- <p class="mb-5"><strong class="text-white">Nuevo Post</strong></p>-->
            
                </div>
            </div>
        </div>

        <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
    </div>

@endsection

<section class="site-section bg-light bg-image" id="contact-section">
    <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Nuevo Post</h2>
          </div>
        </div>

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

        <div class="row">
            <div class="col-12">
                <form action="{{ route('newsletter.store') }}" method="post" class="p-5 bg-white" id="form_send_newsletter_create" enctype="multipart/form-data">
                    
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                    <input type="hidden" name="HiddenFielTag" id="HiddenFielTag" value="">
                    <!-- titulo -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="title">Titulo</label> 
                            <input maxlength="100" type="text" id="title" name="title" class="form-control">
                        </div>
                    </div>

                    <!-- summary -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="summary">Descripción</label> 
                            <textarea maxlength="200" id="summary" name="summary" rows="2" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- Boton para agregar imagenes link -->
                    <div class="row form-group mt-3 mb-3">
                        <div class="col-md-12">
                            <input type="button" class="btn btn-primary" value="Ver imagenes" data-toggle="modal" data-target="#imagesModal">
                        </div>
                    </div>

                    <!-- contenido -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="content">Contenido</label> 
                            <textarea id="content-wysiwyg" name="content-wysiwyg" rows="7" style="height:300px; width: 100%;" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- categoria / tags -->
                    <div class="row form-group" >
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="category">Categoria</label>
                            <div class="input-group" >
                                <select class="custom-select" id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button style="height: 38px" id="btnAddCategory" data-toggle="modal" data-target="#categoryModal" title="Agregar nueva cartegoria" class="btn btn-primary" type="button"><span class="icon-add"></span></button>
                                </div>
                            </div>
                            <small id="addMessage" name="addMessage" class="form-text text-muted"></small>
                        </div>

                        <div class="col-md-6">
                            <label class="text-black" for="tags">Tags</label>
                            <div class="input-group" >
                                <input type="text" id="tags" name="tags" class="form-control basicAutoComplete" autocomplete="off" data-url="{{ route('search_tags') }}" data-noresults-text="No se encontró el Tag">
                                <div class="input-group-append">
                                    <button style="height: 38px" id="btnAddTag" data-toggle="modal" data-target="#tagModal" title="Agregar nuevo Tag" class="btn btn-primary" type="button"><span class="icon-add"></span></button>
                                </div>
                            </div>
                            <small id="addMessage2" name="addMessage2" class="form-text text-muted"></small>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="col-12" id="content-div-tags" name="content-div-tags">
                            </div>
                        </div>


                    </div>

                    <!-- Image -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="name_img">Imagen</label>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="name_img" name="name_img" placeholder="Imagen" value="{{ old('name_img') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>

                    <a href="{{ route('newsletter.index') }}" class="btn btn-primary">Cancelar</a>
                    
                </form>
            </div>

        </div>
    </div>
</section>

<!-- modal para agregar nueva categoria -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" id="routeCurrent" value="{{ route('category.storeajax') }}">

        <div class="form-group">
            <label for="txtCategoryName">Nueva categoria</label>
                <input type="text" class="form-control" id="txtCategoryName">
            </div>
            
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Utils.onclick_addCategory()">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- modal para agregar nuevo Tag -->
<div class="modal fade" id="tagModal" name="tagModal" tabindex="-1" aria-labelledby="tagModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" id="routeCurrent2" value="{{ route('tag.storeajax') }}">

        <div class="form-group">
            <label for="txtTagName">Nuevo Tag</label>
                <input type="text" class="form-control" id="txtTagName">
            </div>
            
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Utils.onclick_addTag()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- modal para imagenes-link -->
<div class="modal fade" id="imagesModal" aria-labelledby="imagesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imagesModalLabel">Imagenes link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="contendorImages" id="divContendorImages">
            @foreach($files as $file)
                <img src="{{ asset('images') }}/{{ $file }}" onclick="onclick_image(this)" title="Haga click para copiar url">
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <form id="form_updloadimage" action="{{ route('newsletter.uploadimage') }}" method="post" enctype="multipart/form-data">

                    <div id="divMessageUploadImg">
                    
                    </div>
                    <!-- Image -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="image_link">Cargar imagen</label>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="image_link" name="image_link" placeholder="Imagen" >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary" id="btnUploadImage">
                                Subir imagen
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
// $('#form_send_newsletter').submit(function() {debugger
    
    // var r = confirm("Seguro que desea enviar la informacion!");
    // if (r == true) {
    //     return true;
    // } else {
    //     return false;
    // }
// });

    var textarea = document.getElementById('content-wysiwyg');
    sceditor.create(textarea, {
        format: 'xhtml',
        icons: 'material',
        style: '{{ asset("js/sceditor/minified/themes/content/square.min.css") }}'
    });

</script>
@endsection

@section('script')
    
<script src="{{ asset('js/utils.js') }}"></script>

<!-- script para el autocompletar de tag -->
<!-- <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script> -->

<script src="{{ asset('js/bootstrap-autocomplete2-3-7.min.js') }}"></script>

<script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION') }}"></script>

<script>

    var GLOBAL_URL = '{{ asset("images/newsletters/images_links/") }}';

    $(function(){


        $('.basicAutoComplete').autoComplete({
            resolverSettings: {
                url: '{{ route('search_tags') }}'
            },
            bootstrapVersion: "4",
            autoSelect: true,
            preventEnter: true,
            events: {
                searchPost: function (resultFromServer) {
                    console.log(resultFromServer)
                    // var _arr = new Array();
                    // _arr.push(resultFromServer[0]);
                    return resultFromServer;
                }
            }
        });

        $('.basicAutoComplete').on("autocomplete.select", function(evt, item){
            if(item != undefined){
                var _html = Utils.getHtmlTag(item);

                //validar que ya no exista el tag
                if(!Utils.isAdded(item.value)){
                    Utils.addTag(_html);
    
                    Utils.pushTagId(item.value);

                }else{
                    $("#addMessage2").html("El tag ya ha sido agregado previamente");
                }
    
                setTimeout(() => {
                    window.document.getElementById("tags").focus();
                    $("#addMessage2").html("");
                }, 7000);
            }
            
            // console.log("selected", item);
        });

        $("#tagModal").on('show.bs.modal', function (event) {
            // limpia informacion previamente cargada
            $('#txtTagName').val("");
    
            var _tagName = $("#tags").val();
            $('#txtTagName').val(_tagName);
            
        });

    });

    // var removeDiv = function(id){
    //     $("#" + id).remove();
    //     Utils.removeTagId(id);
    // }

    var onclick_image = function(obj){

        var $temp = $("<input>");
        $("body").append($temp);
        var contenido = obj.src;
        $temp.val(contenido).select();
        var res = document.execCommand('copy');
        $temp.remove();
        if(res){
            showAlert("URL de la imagen <strong>copiada!</strong>");

        }

    }

    $("#form_updloadimage").on("submit", function(ev){
        ev.preventDefault();

        $("#image_link").removeClass("is-invalid");
        if($("#image_link").val() == ""){
            $("#image_link").addClass("is-invalid");
            return false
        }

        $("#btnUploadImage").prop("disabled", true);
        $("#btnUploadImage").html("Cargando");
        var formData = new FormData(document.getElementById("form_updloadimage"));
        var _route = $(this).attr('action');
        var _token = $("#token").val();
        $.ajax({
            url: _route,
            dataType: "html",
            contentType: false,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: formData,
            processData: false
        })
        .done(function(result){
            $("#btnUploadImage").prop("disabled", false);
            $("#btnUploadImage").html("Subir imagen");
            data = JSON.parse(result);

            if(data.result){
                var _html = '<img src="' + GLOBAL_URL + '/' + data.file_name + '" onclick="onclick_image(this)" title="Haga click para copiar url">';
                $("#divContendorImages").append(_html);
                $("#image_link").val("");
                showAlert(data.message);
            }else{
                showAlert(data.message);
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown ){  
            $("#btnUploadImage").prop("disabled", false);
            $("#btnUploadImage").html("Subir imagen");
            console.log(jqXHR.responseJSON.errors);
        })

    });

    var showAlert = function(message){

        _html = '<div class="alert alert-info alert-dismissible fade show" role="alert">' +
                 message +
                 '   <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                 '       <span aria-hidden="true">&times;</span>' +
                 '   </button>' +
                 '   </div>';
        $("#divMessageUploadImg").html(_html);

    }

</script>


@endsection

