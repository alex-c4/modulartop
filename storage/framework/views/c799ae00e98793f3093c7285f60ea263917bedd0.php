<?php $__env->startSection('content'); ?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('images/banner/contacto_fabricacion.jpg')); ?>);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 mx-auto mt-lg-8 text-center">
            <h1>¡MUCHAS GRACIAS POR HACERNOS PARTE DE TU PROYECTO!</h1>
            <!-- <h1><?php echo e($result["title"]); ?></h1> -->
            
          </div>
        </div>
      </div>

      <a href="#modular-top" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div> 

<section class="site-section" id="modular-top">
    <div class="container">
        <div class="row large-gutters">
            <div class="col-lg-12 mb-5">
            <!-- <p align="center"><?php echo e($result["title"]); ?></p> -->
            <p align="center"><?php echo e($result["subtitle"]); ?></p>
            <?php $__currentLoopData = $result["content_arr"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $parr; ?>

                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <?php $__currentLoopData = $newsletter_top3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsletter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo e(url('images/newsletters')); ?>/<?php echo e($newsletter->name_img); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($newsletter->title); ?></h5>
                        <div class="blog-widget">
                            <div class="blog-info">
                                <img src="<?php echo e(url('images/clock.png')); ?>" alt="">
                                <span><?php echo e(explode(' ', $newsletter->created_at)[0]); ?></span><span class="mx-2">&bullet;
                                <!-- </span><i class="lnr lnr-user"></i> Author Name -->
                            </div>
                        </div>
                        
                        <p class="card-text"><?php echo e($newsletter->summary); ?></p>
                        <a href="<?php echo e(route('show', [$newsletter->id, $newsletter->url])); ?>" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(function() { 
        setTimeout(function(){
            $('html, body').animate({scrollTop:450}, 'slow')
        }, 300);
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/fabricacion/messageFabrication.blade.php ENDPATH**/ ?>