<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/user/PublisherAllOrders.jsx'); ?>
    <div id="publisher-all-orders" class="px-6"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\React JS\linkbuildingmarketplace\resources\views\user\publisher-all-orders.blade.php ENDPATH**/ ?>