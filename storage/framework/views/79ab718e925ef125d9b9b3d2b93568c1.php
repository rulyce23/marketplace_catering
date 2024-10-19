

<?php $__env->startSection('content'); ?>
<h1 style="color:white"><center>Customer Orders</center></h1>

<div class="card">
    <div class="card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <h2 class="mt-4">Existing Orders</h2>
        <?php if(empty($orders)): ?>
            <p>No orders found.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Merchant ID</th>
                        <th>Customer ID</th>
                        <th>Menu ID</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Delivery Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order['id']); ?></td>
                            <td><?php echo e($order['merchant_id']); ?></td>
                            <td><?php echo e($order['customer_id']); ?></td>
                            <td><?php echo e($order['menu_id']); ?></td>
                            <td><?php echo e($order['quantity']); ?></td>
                            <td><?php echo e(ucfirst($order['status'])); ?></td>
                            <td><?php echo e($order['delivery_date']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marketplace-katering\resources\views/merchant/orders.blade.php ENDPATH**/ ?>