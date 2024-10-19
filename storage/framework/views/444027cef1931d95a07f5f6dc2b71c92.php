<!-- resources/views/merchant/menu.blade.php -->


<?php $__env->startSection('content'); ?>
<h1>Manage Menu</h1>
<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('merchant.createMenu')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Menu Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Add Menu</button>
        </form>
    </div>
</div>

<h2 class="mt-4">Existing Menus</h2>
<ul class="list-group">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo e($menu->name); ?> - <?php echo e($menu->price); ?>

            <form action="<?php echo e(route('merchant.deleteMenu', $menu->id)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marketplace-katering\resources\views/merchant/menu.blade.php ENDPATH**/ ?>