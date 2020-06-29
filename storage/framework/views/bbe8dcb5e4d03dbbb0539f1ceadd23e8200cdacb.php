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
                    <h1 class="text-shadow">¡Fabricamos tus sueños!</h1>
                    <p class="mb-5 text-shadow">Nos adaptamos a cualquier diseño de interior a madera que tengas en mente... Muebles ideales para hoteles, cocinas, oficina, dormitorios, baños y más.</p>
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
                <form action="<?php echo e(route('newsletter.store')); ?>" method="post" class="p-5 bg-white" id="form_send_newsletter_create" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <!-- titulo -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="title">Titulo</label> 
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                    </div>

                    <!-- contenido -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="content">Contenido</label> 
                            <textarea id="content" name="content" rows="7" style="height:300px; width: 100%;" class="form-control"></textarea>
                        </div>
                    </div>

                    <!-- categoria / tags -->
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="category">Categoria</label>

                            <select class="custom-select" id="category" name="category">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>

                        <div class="col-md-6">
                            <label class="text-black" for="tags">Tags</label>
                            <input type="text" id="tags" name="tags" class="form-control">
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="name_img">Imagen</label>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="name_img" name="name_img" placeholder="Imagen" value="<?php echo e(old('name_img')); ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

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

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/newsletter/create.blade.php ENDPATH**/ ?>