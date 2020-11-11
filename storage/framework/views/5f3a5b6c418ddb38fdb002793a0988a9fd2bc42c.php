<?php $__env->startSection('meta'); ?> 
<title>Novedades - Modular Top</title> 
<meta name="description" 
content="Noticias y contenido de valor con todo lo relacionado a diseño de interiores, tipos de 
muebles, historia, servicios de madera y fabricación de mueblería." />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('images/novedades/newsletter-novedades.jpg')); ?>);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Novedades</h1>
            <p class="mb-5"><strong class="text-white">de la Industria Mobiliaria.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


 <!-- Blog Section Begin -->
 <section class="blog-section spad" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 order-2 order-lg-1">
                    <div class="side-bar">
                        <div class="sidebar-box">
                            <div class="categories">
                                <h3><br>Categorias</h3>
                                <?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('novedades', $cat->id)); ?>"><?php echo e($cat->name); ?> <span>(<?php echo e($cat->cant); ?>)</span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        
                        <!-- <div class="tags-item">
                            <h4>Tags</h4>
                            <div class="tag-links">
                                <a href="#">Tableros</a>
                                <a href="#">Fabricacion</a>
                                <a href="#">Maquilado</a>
                                <a href="#">Corte</a>
                                <a href="#">Routeado</a>
                                <a href="#">Pantografiado</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2">
                    <div class="blog-post">

                    <?php $__currentLoopData = $newsletters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsletter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="single-blog-post">
                            <div class="blog-pic">
                                <img src="<?php echo e(asset('images/newsletters/'.$newsletter->name_img)); ?>" alt="">
                            </div>
                            <div class="blog-text">
                                <h4><?php echo e($newsletter->title); ?></h4>
                                <div class="blog-widget">
                                    <div class="blog-info">
                                    <img src="images/clock.png" alt="">
                                        <span><?php echo e(explode(' ', $newsletter->created_at)[0]); ?></span><span class="mx-2">&bullet;
                                        <!-- </span><i class="lnr lnr-user"></i> Author Name -->
                                    </div>
                                   
                                </div>
                                
                                <p>
                                    <?php echo e($newsletter->summary); ?>...
                                </p>
                                <a href="<?php echo e(route('show', $newsletter->id)); ?>" class="btn btn-primary btn-sm">Leer más</a>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <!--
                        <div class="blog-pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
 

    
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/novedades.blade.php ENDPATH**/ ?>