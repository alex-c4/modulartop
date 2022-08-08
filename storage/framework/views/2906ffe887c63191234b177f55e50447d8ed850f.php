<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/project.css')); ?>?v=<?php echo e(env('APP_VERSION')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('imgBanner'); ?>
<?php echo e(Utils::getBanner(auth()->user()->roll_id)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
¡Editar!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subtitle'); ?>
Edición proyecto
<?php $__env->stopSection(); ?>


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
    <?php if(isset($msgPost) != null): ?>
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo e($msgPost); ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="form_project" method="POST" action="<?php echo e(route('project.update', $project->id)); ?>" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="hrouteDeleteImage" id="hrouteDeleteImage" value="<?php echo e(route('project.deleteimg')); ?>">
                        <input type="hidden" name="hrouteUploadImage" id="hrouteUploadImage" value="<?php echo e(route('project.uploadimg')); ?>">
                        <input type="hidden" name="hSearchAltTextRoute" id="hSearchAltTextRoute" value="<?php echo e(route('project.searchalttext')); ?>">
                        <input type="hidden" id="hUpdateAltTextRoute" name="hUpdateAltTextRoute" value="<?php echo e(route('project.updatetext')); ?>">


                        <!-- Proyectistas -->
                        <div class="row form-group" >
                            <label class="col-lg-4 col-form-label text-md-right" for="proyectista">Proyectista<span>*</span></label>
                            <div class="col-md-6">
                                <select class="custom-select <?php $__errorArgs = ['proyectista'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="proyectista" name="proyectista">
                                    <option value>Seleccione...</option>
                                    <?php $__currentLoopData = $proyectistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyectista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($proyectista->id == $project->proyectista_id): ?>
                                            <option selected value="<?php echo e($proyectista->id); ?>"><?php echo e($proyectista->name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($proyectista->id); ?>"><?php echo e($proyectista->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['proyectista'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field text-center" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Partner company -->
                        <div class="form-group row" style="display: none" id="div_partner_company">
                            <label for="partner_company" class="col-md-4 col-form-label text-md-right">Empresa aliada<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="partner_company" name="partner_company" type="text" class="form-control <?php $__errorArgs = ['partner_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($project->partner_company); ?>" >
                                <?php $__errorArgs = ['partner_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Proveedores -->
                        <div class="row form-group" style="display: none" id="div_provider">
                            <label class="col-lg-4 col-form-label text-md-right" for="provider">Proveedor<span>*</span></label>
                            <div class="col-md-6">
                                <select class="custom-select" id="provider" name="provider">
                                    <option value="0">Seleccione...</option>
                                    <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($provider->id == $project->provider_id): ?>
                                            <option selected value="<?php echo e($provider->id); ?>"><?php echo e($provider->name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($provider->id); ?>"><?php echo e($provider->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['provider'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Nombre del proyecto<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="120" id="name" name="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($project->name); ?>" autofocus>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Cover photo -->
                        <div class="row form-group">
                            <label for="cover_photo" class="col-md-4 col-form-label text-md-right">Foto portada<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="cover_photo" name="cover_photo" accept="image/png, image/jpeg, image/jpg" class="form-control <?php $__errorArgs = ['cover_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Imagen"> 
                                <small id="sizeImage" class="form-text text-muted sizeImage">Tamaño de la imagen (700 x 500 pixeles)</small>
                            </div>
                            
                            <?php $__errorArgs = ['cover_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-field text-center" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div style="display: flex; justify-content: center; margin: 5px">
                            <img height="100px" src="<?php echo e(asset('images/proyectos')); ?>/<?php echo e($project->cover_photo); ?>" alt="" srcset="">
                        </div>

                        <!-- cover photo alt_text -->
                        <div class="row form-group">
                            <label for="cover_photo_alt_text" class="col-md-4 col-form-label text-md-right">Texto alternativo<span>*</span></label>
                            <div class="col-md-6">
                                <textarea id="cover_photo_alt_text" name="cover_photo_alt_text" rows="2" class="form-control <?php $__errorArgs = ['cover_photo_alt_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" ><?php echo e($project->cover_photo_alt_text); ?></textarea>
                                <?php $__errorArgs = ['cover_photo_alt_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>    
                            </div>
                        </div>

                        <!-- Descripcion -->
                        <div class="row form-group">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción<span id="span_description"></span></label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" rows="4" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" ><?php echo e($project->description); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>    
                            </div>
                        </div>

                        <!-- Plane photo -->
                        <div class="row form-group">
                            <label for="plane_photo" class="col-md-4 col-form-label text-md-right">Foto del plano</label>
                            <div class="col-md-6">
                                <input type="file" id="plane_photo" name="plane_photo" accept="image/png, image/jpeg, image/jpg" class="form-control <?php $__errorArgs = ['plane_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Imagen"> 
                            </div>
                        </div>

                        <div style="display: flex; justify-content: center; margin: 5px">
                            <img height="100px" src="<?php echo e(asset('images/proyectos')); ?>/<?php echo e($project->plane_photo); ?>" alt="" srcset="">
                        </div>

                        <!-- Ubication -->
                        <div class="row form-group">
                            <label for="ubication" class="col-md-4 col-form-label text-md-right">Ubicación</label>
                            <div class="col-md-6">
                                <textarea id="ubication" name="ubication" rows="4" class="form-control" ><?php echo e($project->ubication); ?></textarea>
                            </div>
                        </div>

                        <!-- Client name -->
                        <div class="form-group row" style="display: none" id="div_client_name">
                            <label for="client_name" class="col-md-4 col-form-label text-md-right">Nombre del cliente<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="client_name" name="client_name" type="text" class="form-control <?php $__errorArgs = ['client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($project->client_name); ?>" >
                                <?php $__errorArgs = ['client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Fecha -->
                        <div class="form-group row" style="display: none" id="div_project_date">
                            <label for="project_date" class="col-lg-4 col-form-label text-lg-right">Fecha<span>*</span></label>
                            <div class="col-lg-6">
                                <input id="project_date" name="project_date" autocomplete="off" type="text" class="form-control <?php $__errorArgs = ['project_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($project->project_date); ?>" >

                                <?php $__errorArgs = ['project_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-field" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave" name="btnSave">
                                    Guardar
                                </button>
                            </div>
                        </div>

                        </form>

                        <hr>

                        <h5 class="card-title mt-2 mb-4">
                            Galería de imágenes del Proyecto
                        </h5>

                        <!-- <div class="row mb-5">
                            <div class="col-12 text-center">
                                <h2 class="section-title mb-3 text-black">Galeria de fotos</h2>
                            </div>
                        </div> -->

                        <form id="form_upload_image" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="hProjectId" name="hProjectId" value="<?php echo e($project->id); ?>">

                        <div class="col-12 text-center m-3 img_container">
                            <?php $__currentLoopData = $project_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="img_div" id="img_div_<?php echo e($photo->id); ?>">
                                    <img src="<?php echo e(asset('images/proyectos')); ?>/<?php echo e($photo->name); ?>" alt="<?php echo e($photo->alt_text); ?>">
                                    <span title="eliminar" onclick="delete_image('img_div_<?php echo e($photo->id); ?>', <?php echo e($photo->id); ?>, true)" class="icon-delete"></span>
                                    <span title="editar" class="icon-pencil" data-toggle="modal" data-target="#exampleModal" data-photoid="<?php echo e($photo->id); ?>"></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div id="div-message" class="mt-3"></div>

                        <!-- Fotos -->
                        <div class="row form-group">
                            <label for="project_photo" class="col-md-4 col-form-label text-md-right">Foto del proyecto<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="project_photo" name="project_photo" accept="image/png, image/jpeg, image/jpg" class="form-control" placeholder="Imagen"> 
                                <small id="emailHelp" class="form-text text-muted">Se permitira subir un total de seis (6) imágenes</small>
                            </div>
                        </div>

                        <!-- Texto alterno -->
                        <div class="form-group row">
                            <label for="alt_text" class="col-md-4 col-form-label text-md-right">Texto alterno<span>*</span></label>
                            <div class="col-md-6">
                                <textarea name="alt_text" id="alt_text"rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="btnUpload" name="btnUpload">
                                    Agregar
                                </button>
                            </div>
                        </div>

                        
                        </form>


                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Texto alternativo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

            <div class="modal-body">

                <!-- Nombre -->
                <div class="row form-group" >
                    <label for="cover_photo_alt_text_modal" class="col-lg-5 col-form-label text-md-right">Texto alternativo<span>*</span></label>
                    <div class="col-md-7">
                        <input id="cover_photo_alt_text_modal" name="cover_photo_alt_text_modal" type="text" class="form-control" value="" autofocus>
                    </div>
                </div>

                <div id="div-message-modal">
                    
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnSaveAltText" name="btnSaveAltText">Guardar</button>
            </div>
        </div>
    </div>
</div> <!-- End modal -->


</div>

</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script src="<?php echo e(asset('js/utils.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>
    <script src="<?php echo e(asset('js/project.js')); ?>?v=<?php echo e(env('APP_VERSION')); ?>"></script>

    <script>
        var validator;
        var GLOBAL_URL = "<?php echo e(asset('images/proyectos/')); ?>";
        var GLOBAL_ID_ALT_TEXT = 0;
        var GLOBAL_IS_UPDATING = true;

        $(function(){
            validator = $("#form_upload_image").validate({
                rules: {
                    project_photo: {
                        required: true
                    },
                    alt_text: {
                        required: true
                    },
                },
                messages: {
                    project_photo: {
                        required: "Por favor seleccione una foto"
                    },
                    alt_text: {
                        required: "Pro favor ingrese un texto alterno para la imagen"
                    }
                }
            });

            // setTimeout(() => {
            // }, 500);
                GLOBAL_IS_UPDATING = true;
                $("#proyectista").trigger("change");

            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var photoid = button.data('photoid');
                GLOBAL_ID_ALT_TEXT = photoid;
                debugger
                var _url = $("#hSearchAltTextRoute").val();
                var _token = $("#token").val();
                var _type = "POST";
                var _data = {
                    id: GLOBAL_ID_ALT_TEXT,
                };

                Utils.getData(_url, _token, _type, _data)
                .then(function(result){
                    if(result.result == true){
                        $("#cover_photo_alt_text_modal").val(result.alt_text);
                    }else{
                        showAlertModal(result.message, "alert-warning");
                    }
                })
                .fail(function(qXHR, textStatus, errorThrown){
                    debugger
                    console.log(qXHR);
                })
            });

            $('#exampleModal').on('hidden.bs.modal', function (event) {
                $("#div-message-modal").html("");
                $("#cover_photo_alt_text_modal").val("");
            });

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layoutSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/project/edit.blade.php ENDPATH**/ ?>