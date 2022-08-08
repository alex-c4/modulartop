<?php $__env->startSection('meta'); ?> 
<title>Tableros Melamínicos - Acabado Tradicional - Modular Top</title> 
<meta name="description" 
content="Tablero melaminico hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('images/tableros')); ?>/<?php echo e($imgToBanner); ?>);" data-aos="fade">
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
            <h2 class="section-title mb-3"><?php echo e($title); ?></h2>
            <p class="lead"><?php echo e($sub_title); ?></p>
          </div>
        </div>

        <?php $__currentLoopData = $IDsToGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            <div class="row mb-5">
                <div class="col-md-12 text-left">
                    <h3 class="section-title mb-3"><?php echo e($item["name"]); ?></h3>
                    <!-- <p class="lead">Tableros melamínicos hidrófugos y natural MDP importados y nacionales.</p> -->
                </div>
            </div>

            <div class="row large-gutters">

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product->id_subcategory_color == $item["id"]): ?>
                        <div class="col-md-6 col-lg-3 mb-5 mb-lg-5 ">
                            <div class="ftco-media-1">
                                <div class="ftco-media-1-inner">
                                    <img src="<?php echo e(asset('images/image_products')); ?>/<?php echo e($product->img_product); ?>" alt="<?php echo e($product->description_product); ?>" class="img-fluid">
                                    <div class="ftco-media-details">
                                        <h3><BR><?php echo e($product->name_product); ?></h3>
                                        <p><a href="<?php echo e(route('tablero.description', $product->id_product)); ?>">Ver más</a></p>

                                        <!-- <strong>BLANCO 100</strong>-->
                                    </div>
                                </div> 
                            </div>
                        </div>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </div>
    </div>
    <!-- Fin Seccion Materia Prima-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/tableros/byVisualEfect.blade.php ENDPATH**/ ?>