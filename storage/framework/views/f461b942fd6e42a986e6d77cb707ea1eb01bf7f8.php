<?php $__env->startSection('meta'); ?>
<!-- META DATA DE REDES SOCIALES -->
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo e($newsletter->title); ?>" />
<meta property="og:description" content="<?php echo e($newsletter->summary); ?>" />
<meta property="og:image" content="<?php echo e(asset('images/newsletters/'.$newsletter->name_img)); ?>" />
<!-- <meta property="og:url" content="ENLACE PERMANENTE" /> -->
<meta property="og:site_name" content="MODULAR TOP" />

<title>Novedades - Modular Top</title> 
<meta name="description" 
content="Noticias y contenido de valor con todo lo relacionado a diseño de interiores, tipos de 
muebles, historia, servicios de madera y fabricación de mueblería." />

<!-- 
<title><?php echo e($newsletter->title); ?></title> 
<meta name="description" 
content="<?php echo e($newsletter->summary); ?>" />
 -->

 

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5efa285e4b89f600120fcd12&product=inline-share-buttons&cms=website' 
async='async'></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('images/novedades/newsletter-novedades.jpg')); ?>);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Novedades</h1>
            <p class="mb-5"><strong class="text-white">de la Industra Mobiliaria.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


 <!-- Blog particular -->
 <section class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-8 blog-content">
          <div class="vcard bio">
                    <img src="<?php echo e(asset('images/newsletters/'.$newsletter->name_img)); ?>" alt="Image placeholder">
                  </div>
            <p class="lead">
              <br>
              <!-- Botonera compartir redes sociales -->
              <div class="sharethis-inline-share-buttons"></div>
              
              <?php echo e($newsletter->title); ?>

            </p>
            
              
                <blockquote>
                  <p>
                    <?php echo $newsletter->content; ?>

                  </p>
                </blockquote>

            <div class="pt-5">
              <p>Categorias:  <a href="<?php echo e(route('novedades', $newsletter->category_id)); ?>"><?php echo e($newsletter->category); ?></a> <!-- Tags: <?php $__currentLoopData = $tags_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <a href="#"><?php echo e($tag); ?></a><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p> -->
            </div>
    
                         

          </div>
          <div class="col-md-4 sidebar">
           
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categorias</h3>
                <?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('novedades', $cat->id)); ?>"><?php echo e($cat->name); ?> <span>(<?php echo e($cat->cant); ?>)</span></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
            <div class="sidebar-box">
              <!--
              <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              <h3>Bryan Becerra</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              -->
              <div class="recent-post" id="post1">
                        <h3 class="text-black">POST RECIENTES</h3>
                        <?php $__currentLoopData = $newsletter_top3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-recent-post">
                                <div class="recent-pic">
                                    <img src="<?php echo e(asset('images/newsletters/'.$news->name_img)); ?>" alt="">
                                </div>
                                <div class="recent-text">

                                  <h5 class="font-size-regular"><a href="<?php echo e(route('show', $news->id)); ?>"><br><?php echo e($news->title); ?></a></h5>
                                  <div class="meta mb-4"><!-- <?php echo e($news->author); ?>  -->
                                    <span class="mx-2">&bullet;</span> <?php echo e(explode(' ', $news->created_at)[0]); ?>

                                    <span class="mx-2">&bullet;</span> 
                                    <a href="<?php echo e(route('show', $news->id)); ?>">Leer</a>
                                  </div>
                                                                 
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                        </div>
            </div>

            
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Section End -->
 

    
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/post.blade.php ENDPATH**/ ?>