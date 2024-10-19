<!-- resources/views/customer/order.blade.php -->


<?php $__env->startSection('content'); ?>
<h1 Style="color:white"><center>Your Orders History</center></h1>
<div class="card">
    <div class="card-body">
        <ul class="list-group">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    Menu: <?php echo e($order->menu->name); ?> | Quantity: <?php echo e($order->quantity); ?> | Total: <?php echo e($order->total_price); ?> | Delivery Date: <?php echo e($order->delivery_date); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marketplace-katering\resources\views/customer/order.blade.php ENDPATH**/ ?>