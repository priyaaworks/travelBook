

<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="<?php echo e(url('/')); ?>">Travel Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(url('/')); ?>">Available Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/home')); ?>">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <h1 class="text-center mb-4">Available Packages</h1>

    <div class="row">
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <?php if($package->image): ?>
                <img src="<?php echo e(asset('images/' . $package->image)); ?>" class="card-img-top" alt="<?php echo e($package->title); ?>">
                <?php else: ?>
                <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top" alt="No Image">
                <?php endif; ?>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo e($package->title); ?></h5>
                    <p class="card-text">Destination: <?php echo e($package->destination); ?></p>
                    <p class="card-text">Price: ₹<?php echo e(number_format($package->price)); ?></p>
                    <a href="/package/<?php echo e($package->id); ?>" class="btn btn-primary mt-auto">View Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\travel_booking\resources\views/packages/index.blade.php ENDPATH**/ ?>