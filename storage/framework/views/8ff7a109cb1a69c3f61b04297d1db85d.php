<?php $__env->startSection('content'); ?>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/user/VendorAllOrders.jsx'); ?>
    <div id="vendor-all-orders" class="px-6"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github\Link-MarketPlace\resources\views/user/vendor-all-orders.blade.php ENDPATH**/ ?>