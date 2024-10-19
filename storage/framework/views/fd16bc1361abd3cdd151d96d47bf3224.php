<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Catering</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Marketplace E-Catering</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role === 'merchant'): ?>
                        <!-- Menu untuk Merchant -->
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('merchant.profile')); ?>">Profile Merchant</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('merchant.menu')); ?>">Manage Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('merchant.orders')); ?>">Orders</a></li>
                    <?php elseif(Auth::user()->role === 'customer'): ?>
                        <!-- Menu untuk Customer -->
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('customer.orders')); ?>">Orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('customer.search')); ?>">Search Catering</a></li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            <?php if(session('success')): ?>
                toastr.success("<?php echo e(session('success')); ?>");
            <?php endif; ?>

            <?php if(session('error')): ?>
                toastr.error("<?php echo e(session('error')); ?>");
            <?php endif; ?>
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\marketplace-katering\resources\views/layouts/app.blade.php ENDPATH**/ ?>