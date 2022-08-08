<?php $__env->startSection('imgBanner'); ?>
<?php echo e(Utils::getBanner(auth()->user()->roll_id)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Proyectos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subtitle'); ?>
Lista de proyectos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Proyectista</th>
                <th scope="col">Descripción</th>
                <th scope="col"></th>
            </tr>
        </thead>
        
        <tbody>
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($key += 1); ?></th>
                <td><?php echo e($project->name); ?></td>
                <td><?php echo e($project->proyectista); ?></td>
                <td><?php echo e($project->description); ?></td>
                <td>
                    <a href="<?php echo e(route('project.edit', $project->id)); ?>" title="Editar" ><span class="icon-pencil p-1"></span></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


</div>

</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layoutSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/project/index.blade.php ENDPATH**/ ?>