<!-- resources/views/merchant/profile.blade.php -->


<?php $__env->startSection('content'); ?>
<h1 style="color:white"><center>Merchant Profile</center></h1>

    <?php if(isset($merchant)): ?>
        <form action="<?php echo e(route('merchant.updateProfile')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" class="form-control" value="<?php echo e(old('company_name', $merchant->company_name)); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required><?php echo e(old('description', $merchant->description)); ?></textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo e(old('address', $merchant->address)); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $merchant->phone)); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    <?php else: ?>
        <p>Merchant profile not found.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marketplace-katering\resources\views/merchant/profile.blade.php ENDPATH**/ ?>