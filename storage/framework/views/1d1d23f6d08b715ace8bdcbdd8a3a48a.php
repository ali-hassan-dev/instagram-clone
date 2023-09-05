<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['post','data']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['post','data']); ?>
<?php foreach (array_filter((['post','data']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <a href="/profile/<?php echo e($post->user->id); ?>" class="btn btn-primary mb-2"><?php echo e($data ?? ''); ?></a>
</div><?php /**PATH C:\xampp\htdocs\instagram-clone\resources\views/components/user-link.blade.php ENDPATH**/ ?>