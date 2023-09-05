<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="/post" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row pb-4 text-center">
                <h1>Create Post</h1>
            </div>
            <div class="row">
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Post Caption')); ?></label>
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="userId" value="<?php echo e($userId); ?>">
                        <input id="caption" type="text" class="form-control <?php $__errorArgs = ['caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="caption" value="<?php echo e(old('caption')); ?>" autocomplete="caption" autofocus>
    
                        <?php $__errorArgs = ['caption'];
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

                <div class="row mb-3">
                    <label for="post_image" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Post Image')); ?></label>
                    <div class="col-md-6">
                        <input id="post_image" type="file" class="form-control <?php $__errorArgs = ['post_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="post_image" value="<?php echo e(old('post_image')); ?>" autocomplete="post_image" autofocus>
    
                        <?php $__errorArgs = ['post_image'];
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
    
                <div class="row pt-4 d-flex align-items-center justify-content-center">
                    <button class="btn btn-primary center w-25">Add Post</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram-clone\resources\views/posts/create.blade.php ENDPATH**/ ?>