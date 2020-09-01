<?php $__env->startSection('content'); ?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('images/novedades/newsletter-novedades.jpg')); ?>);" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Novedades</h1>
                <p class="mb-5"><strong class="text-white">Lista de novedades</strong></p>
        
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 


<section class="site-section bg-light bg-image" id="contact-section">
    <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Novedades</h2>
          </div>
        </div>
    </div>    

</section>


<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col" colspan="4">Fecha de publicación</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $newsletters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr <?php if($news->isDeleted == 1): ?> class="bg-warning" <?php endif; ?>>
                <th scope="row"><?php echo e($news->id); ?></th>
                <td><?php echo e($news->title); ?></td>
                <td><?php echo e($news->name); ?></td>
                <td><?php echo e($news->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('newsletter.edit', $news->id)); ?>"><span class="icon-pencil-square-o"></span></a>
                    &nbsp;
                </td>
                <td>
                    <?php if($news->isDeleted == 0): ?>
                        <form id="formDestroy_<?php echo e($news->id); ?>" action="<?php echo e(route('newsletter.delete', $news->id)); ?>" method="post">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" title="Ocultar novedad" onclick="document.getElementById('formDestroy_<?php echo e($news->id); ?>').submit()"><span class="icon-trash-o"></span></a>
                        </form>
                    <?php else: ?>
                        <form id="formRestore_<?php echo e($news->id); ?>" action="<?php echo e(route('newsletter.restore', $news->id)); ?>" method="post">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" title="Activar novedad" onclick="document.getElementById('formRestore_<?php echo e($news->id); ?>').submit()"><span class="icon-undo"></span></a>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/newsletter/index.blade.php ENDPATH**/ ?>