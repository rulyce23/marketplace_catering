<!-- resources/views/customer/search.blade.php -->


<?php $__env->startSection('content'); ?>
<h1>Search Katering</h1>
<form action="<?php echo e(route('customer.search')); ?>" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search" required>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

<h2>Available Menus</h2>
<ul class="list-group">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo e($menu->name); ?> - <?php echo e($menu->price); ?>

            <form action="<?php echo e(route('customer.placeOrder')); ?>" method="POST" class="form-inline">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="menu_id" value="<?php echo e($menu->id); ?>">
                <input type="number" name="quantity" min="1" class="form-control mx-2" required placeholder="Qty">
                <input type="date" name="delivery_date" class="form-control mx-2" required>
                <button type="submit" class="btn btn-success btn-sm">Order</button>
            </form>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marketplace-katering\resources\views/customer/search.blade.php ENDPATH**/ ?>