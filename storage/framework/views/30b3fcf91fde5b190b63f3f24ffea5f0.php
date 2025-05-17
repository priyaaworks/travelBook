


<?php $__env->startSection('content'); ?>
<h1>Book: <?php echo e($package->title); ?></h1>
<form method="POST" action="/book">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>">
    
    <label>Booking Date</label>
    <input type="date" name="booking_date" required>

    <label>No of People</label>
    <input type="number" name="no_of_people" required>

    <button type="submit">Book Now</button>
</form>
<br>

<!-- Payment Link -->
<a href="https://rzp.io/l/demo" target="_blank">
    <button>Proceed to Payment</button>
</a>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xamppp\htdocs\travel_booking\resources\views/bookings/create.blade.php ENDPATH**/ ?>