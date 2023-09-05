<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['post']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['post']); ?>
<?php foreach (array_filter((['post']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <div class="d-flex align-items-center">
        <div style="padding-right: 5px;">
            <img src="<?php echo e($post->user->profile->profileImage()); ?>" class="rounded-circle w-100" style="max-width: 50px;">
        </div>
        <div>
            <a href="/profile/<?php echo e($post->user->id); ?>" style="text-decoration: none; margin-right: 10px; ">
                <span><?php echo e($post->user->username); ?></span>
            </a>
            <?php echo e($slot); ?>

        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\instagram-clone\resources\views/components/profile-info.blade.php ENDPATH**/ ?>