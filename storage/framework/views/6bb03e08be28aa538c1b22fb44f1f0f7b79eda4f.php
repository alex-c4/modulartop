<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/css/user-register.css')); ?>?v=<?php echo e(env('APP_VERSION', '1')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('imgBanner'); ?>
<?php echo e(Utils::getBanner(auth()->user()->roll_id)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
Usuario
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subtitle'); ?>
Edición de información
<?php $__env->stopSection(); ?>


<section class="blog-section spad" id="blog">
        <?php if(isset($msg) != null): ?>
            <div class="container">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong><?php echo e($msg); ?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
        <br>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" id="formEditUser" action="<?php echo e(route('user.update', $user->id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <!-- Nombre -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" maxlength="20" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($user->name); ?>" required autofocus>

                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label text-md-right">Apellido<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="lastName" name="lastName" type="text" maxlength="20" class="form-control <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($user->lastName); ?>" required>

                                        <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="email" disabled type="email" maxlength="60" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($user->email); ?>" required autocomplete="off">

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="form-group row" style="display: flex; justify-content: center;">
                                    <div class="text-center">
                                        <img src="<?php echo e(asset('images/customers_logos/avatars')); ?>/<?php if($user->avatar == ''): ?>no_image.png <?php else: ?><?php echo e($user->avatar); ?><?php endif; ?>" width="100px" class="rounded" alt="...">
                                    </div>
                                </div>

                                <!-- Imagen del cliente -->
                                <div class="form-group row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">Imagen</label>

                                    <div class="col-md-6">
                                        <input id="avatar" type="file" maxlength="60" class="form-control" name="avatar" accept="image/png,image/jpeg,image/jpg">
                                        <small id="emailHelp" class="form-text text-muted small-register-user" >Se recomienda imagen de tamaño (200 x 200 pixeles)</small>
                                    </div>
                                </div>

                                <!-- Telefono del cliente -->
                                <div class="form-group row">
                                    <label for="clientPhone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                    <div class="col-md-6">
                                        <input id="clientPhone" type="number" maxlength="15" class="form-control" name="clientPhone" value="<?php echo e($user->phone); ?>">
                                    </div>
                                </div>

                                <?php if(auth()->user()->roll_id == 1 || auth()->user()->roll_id == 5): ?>
                                <!-- Rol en el sistema  -->
                                <div class="form-group row">
                                    <label for="rolId" class="col-md-4 col-form-label text-md-right">Rol<span>*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="rolId" name="rolId">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($user->roll_id == $rol->id): ?>
                                                <option selected value="<?php echo e($rol->id); ?>"><?php echo e($rol->nombre); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($rol->id); ?>"><?php echo e($rol->nombre); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Direccion del cilente -->
                                <div class="form-group row">
                                    <label for="clientAddress" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="clientAddress" name="clientAddress" rows="3"><?php echo e($user->address); ?></textarea>
                                    </div>
                                </div>

                                <!-- Es cliente -->
                                <div class="form-group row">
                                    <div class="col-md-4 text-md-right">
                                        <label class="form-check-label" for="chkClient"><strong>Soy o quiero ser cliente</strong> </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" <?php if($isCompanyClient == true): ?> checked <?php endif; ?> class="form-check-input" id="chkClient" name="chkClient">
                                        </div>
                                    </div>
                                </div>

                                <!-- contenedor cliente -->
                                <div class="container-hidden" id="divContainer">

                                    <!-- RIF -->
                                    <div class="form-group row">

                                        <label for="rif" class="col-md-4 col-form-label text-md-right">Rif<span>*</span></label>

                                        <div class="col-md-6">
                                            <input maxlength="20" id="rif" type="text" class="form-control <?php $__errorArgs = ['rif'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> uppercase-field" name="rif" value="<?php echo e($user->rif); ?>" >

                                            <?php $__errorArgs = ['rif'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <!-- Razon social -->
                                    <div class="form-group row">

                                        <label for="rsocial" class="col-md-4 col-form-label text-md-right">Razón social<span>*</span></label>

                                        <div class="col-md-6">
                                            <input maxlength="50" id="rsocial" name="rsocial" type="text" class="form-control <?php $__errorArgs = ['rsocial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($user->razonSocial); ?>">

                                            <?php $__errorArgs = ['rsocial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <!-- Direccion del cliente -->
                                    <div class="form-group row">
                                        <label for="companyAddress" class="col-md-4 col-form-label text-md-right">Dirección fiscal<span>*</span></label>

                                        <div class="col-md-6">
                                            <textarea class="form-control" id="companyAddress" name="companyAddress" rows="3"><?php echo e($user->companyAddress); ?></textarea>
                                        </div>
                                        <?php $__errorArgs = ['companyAddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Telefono -->
                                    <div class="form-group row">
                                        <label for="companyPhone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                        <div class="col-md-6">
                                            <input id="companyPhone" type="number" class="form-control" name="companyPhone" value="<?php echo e($user->companyPhone); ?>">
                                        </div>
                                        <?php $__errorArgs = ['companyPhone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Tipo de empresa  -->
                                    <div class="form-group row">
                                        <label for="company_type" class="col-md-4 col-form-label text-md-right">Tipo de empresa<span>*</span></label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="company_type" name="company_type">
                                            <?php $__currentLoopData = $company_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($user->company_type_id == $type->id): ?>
                                                    <option selected value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row" style="display: flex; justify-content: center;">
                                        <div class="text-center">
                                            <img src="<?php echo e(asset('images/customers_logos/companyLogo')); ?>/<?php if($user->companyLogo == ''): ?>no_image.png <?php else: ?><?php echo e($user->companyLogo); ?><?php endif; ?>" width="100px" class="rounded" alt="...">
                                        </div>
                                    </div> -->
                                
                                    <!-- Imagen de la compañia -->
                                    <!-- <div class="form-group row">
                                        <label for="companyLogo" class="col-md-4 col-form-label text-md-right">Logo</label>

                                        <div class="col-md-6">
                                            <input id="companyLogo" type="file" class="form-control" name="companyLogo" accept="image/png,image/jpeg,image/jpg">
                                        </div>
                                    </div> -->

                                </div><!-- fin contenedor cliente -->

                                <div class="form-group row">
                                    <div class="col-md-3 text-md-right">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <small id="emailHelp" class="form-text text-muted"><span>*</span> Campos obligatorios</small>
                                    </div>
                                </div>
    
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <br>

                </div>
            </div>
        </div>
    </section>

<!-- </div> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/user-register.js')); ?>?v=<?php echo e(env('APP_VERSION', '1')); ?>"></script>

    <script>
        $(function() {
            <?php if($isCompanyClient == true): ?>
                $("#chkClient").trigger("change")
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layoutSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/user/edit.blade.php ENDPATH**/ ?>