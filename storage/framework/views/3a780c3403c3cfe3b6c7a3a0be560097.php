<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="<?php echo e($user->profile->profileImage()); ?>" class="rounded-circle w-100" alt="">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-2">
                        <div class="h4"><?php echo e($user->username); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if (! ( auth()->id() == $user->id )): ?>
                                <follow-button user_id="<?php echo e($user->id); ?>" follow_status="<?php echo e($followStatus); ?>" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php if(auth()->id() == $user->id): ?>
                        <form method="POST" action="<?php echo e(route('posts.create')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" name="userId" value="<?php echo e($user->id); ?>">
                            <button type="submit" class="btn btn-primary btn-sm">Add New Post</button>
                        </form>
                    <?php endif; ?>
                    
                </div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?>
                        <a href="/profile/<?php echo e($user->id); ?>/edit" class="btn btn-primary btn-sm">Edit Profile</a>
                <?php endif; ?>
                <div class="d-flex pt-2">
                    <div class="pr-5" style="padding-right: 30px;"><strong><?php echo e($postsCount); ?></strong> Posts</div>
                    <div class="pr-5" style="padding-right: 30px;"><strong><?php echo e($followers); ?></strong> Followers</div>
                    <div class="pr-5" style="padding-right: 30px;"><strong><?php echo e($following); ?></strong> Following</div>
                </div>
                <div class="pt-2"><?php echo e($user->profile->title); ?></div>
                <div><?php echo e($user->profile->description); ?></div>
                <div><a href="<?php echo e($user->profile->url); ?>" class=""><?php echo e($user->profile->url); ?></a></div>
            </div>
        </div>
        <div class="row pt-5">
            <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4 pb-4">
                    <a href="/post/<?php echo e($post->id); ?>" class="">
                        <img src="<?php echo e(asset('/storage/'. $post->post_image)); ?>" alt="" class="w-100 p-4">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram-clone\resources\views/profiles/index.blade.php ENDPATH**/ ?>