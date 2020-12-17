<?php $__env->startSection("content"); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-5">
    <div class="col-md-4">
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Create Category</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/create' ?>">Create Product</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/home' ?>">All Products</a></li>
        </ul>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/admin/index.blade.php ENDPATH**/ ?>