<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('js/sceditor/minified/themes/square.min.css')); ?>" id="theme-style" />
<script src="<?php echo e(asset('js/sceditor/minified/sceditor.min.js?v=4')); ?> "></script>
<script src="<?php echo e(asset('js/sceditor/minified/icons/monocons.js')); ?> "></script>
<script src="<?php echo e(asset('js/sceditor/minified/formats/xhtml.js')); ?> "></script>

<div class="site-block-wrap">
    <div class="owl-carousel with-dots">
    <div class="site-blocks-cover overlay overlay-2" style="background-image: url(<?php echo e(asset('images/banner/fabricacion.jpg')); ?>);" data-aos="fade" id="home-section">  
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mt-lg-5 text-center">
                    <h1 class="text-shadow">¡Editar!</h1>
                    <p class="mb-5 text-shadow">Edición de novedades.</p>
                </div>
            </div>
        </div>        
    </div> 
    </div>    
</div>

<section class="site-section bg-light bg-image" id="contact-section">
    <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Novedades</h2>
          </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <form action="<?php echo e(route('newsletter.update', $newsletter->id)); ?>" method="post" class="p-5 bg-white" id="form_send_newsletter_edit" enctype="multipart/form-data">
                    <?php echo e(method_field('PUT')); ?>

                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="hname_img" value="<?php echo e($newsletter->name_img); ?>">

                    <!-- titulo -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="title">Titulo</label> 
                            <input maxlength="100" type="text" id="title" name="title" class="form-control" value="<?php echo e($newsletter->title); ?>">
                        </div>
                    </div>

                    <!-- summary -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="summary">Descripción</label> 
                            <textarea maxlength="200" id="summary" name="summary" rows="2" class="form-control"><?php echo e($newsletter->summary); ?></textarea>
                        </div>
                    </div>

                    <!-- contenido -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="content">Contenido</label> 
                            <textarea id="content" name="content" rows="7" style="height:300px;" class="form-control"><?php echo e($newsletter->content); ?></textarea>
                        </div>
                    </div>

                    <!-- categoria / tags -->
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="category">Categoria</label>

                            <div class="input-group" >
                                <select class="custom-select" id="category" name="category">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($category->id == $newsletter->category_id): ?>
                                            <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="input-group-append">
                                    <button style="height: 38px" id="btnAddCategory" data-toggle="modal" data-target="#categoryModal" title="Agregar nueva cartegoria" class="btn btn-primary" type="button"><span class="icon-add"></span></button>
                                </div>
                            </div>
                            <small id="addMessage" name="addMessage" class="form-text text-muted"></small>
                        </div>

                        <div class="col-md-6">
                            <label class="text-black" for="tags">Tags</label>
                            <input value="<?php echo e($newsletter->tags); ?>" type="text" id="tags" name="tags" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <img src="<?php echo e(asset('images/newsletters/'.$newsletter->name_img)); ?>" class="img-thumbnail" alt="" srcset="">
                        </div>
                    </div>  

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="name_img">Imagen</label>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="name_img" name="name_img" placeholder="Imagen" value="<?php echo e(old('name_img')); ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>

                    <a href="<?php echo e(route('newsletter.index')); ?>" class="btn btn-primary">Cancelar</a>
                    
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
        
        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" id="routeCurrent" value="<?php echo e(route('category.storeajax')); ?>">

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

<script>
// $('#form_send_newsletter').submit(function() {debugger
    
    // var r = confirm("Seguro que desea enviar la informacion!");
    // if (r == true) {
    //     return true;
    // } else {
    //     return false;
    // }
// });
    
var textarea = document.getElementById('content');
    sceditor.create(textarea, {
        format: 'xhtml',
        icons: 'material',
        style: '<?php echo e(asset("js/sceditor/minified/themes/content/square.min.css")); ?>'
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<script src="<?php echo e(asset('js/utils.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/newsletter/edit.blade.php ENDPATH**/ ?>