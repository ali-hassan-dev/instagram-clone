<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row pt-2">
        <div class="mb-3">
            <a href="/profile/<?php echo e($post->user->id); ?>" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <img src="<?php echo e(asset('/storage/'. $post->post_image)); ?>" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <?php if (isset($component)) { $__componentOriginale901a47d9016e4effcae02b435a53aaa = $component; } ?>
<?php $component = App\View\Components\ProfileInfo::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ProfileInfo::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['post' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post)]); ?>
                        <?php if (! ( auth()->id() == $post->user->id )): ?>
                            <follow-button style="position: absolute; top: 143px; left: 720px;" user_id="<?php echo e($post->user->id); ?>" follow_status="<?php echo e($followStatus); ?>" />
                        <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale901a47d9016e4effcae02b435a53aaa)): ?>
<?php $component = $__componentOriginale901a47d9016e4effcae02b435a53aaa; ?>
<?php unset($__componentOriginale901a47d9016e4effcae02b435a53aaa); ?>
<?php endif; ?>
                <hr>
                <?php if (isset($component)) { $__componentOriginale901a47d9016e4effcae02b435a53aaa = $component; } ?>
<?php $component = App\View\Components\ProfileInfo::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ProfileInfo::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['post' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($post)]); ?>
                    <span class="font-weight-bold">
                        <?php echo e($post->caption); ?>

                    </span>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale901a47d9016e4effcae02b435a53aaa)): ?>
<?php $component = $__componentOriginale901a47d9016e4effcae02b435a53aaa; ?>
<?php unset($__componentOriginale901a47d9016e4effcae02b435a53aaa); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram-clone\resources\views/posts/show.blade.php ENDPATH**/ ?>