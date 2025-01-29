<?php $__env->startSection('content'); ?>
    <h2>Welcome to the Admin Dashboard!</h2>
    <p>Manage your platform here.</p>
    <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="text-red-500">Logout</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\linkbuildingmarketplace-project\github\Link-MarketPlace\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>