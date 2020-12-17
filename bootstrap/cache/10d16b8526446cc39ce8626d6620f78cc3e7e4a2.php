<?php $__env->startSection("content"); ?>
<?php echo $__env->make("layouts.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo e(\App\Classes\Session::flash('success')); ?>

<?php echo $__env->make("layouts.report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">All Products</a></li>
                <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Category Create</a></li>
                <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Products Create</a></li> 
            </ul>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Image</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->name); ?></td>
                        <td><img src="<?php echo e($product->image); ?>" alt="" class="img-fluid" width="200"></td>
                        <td>$<?php echo e($product->price); ?></td>
                        <td>
                        <a href="<?php echo e(URL_ROOT); ?>admin/product/<?php echo e($product->id); ?>/delete"><i class="fa fa-trash text-danger pr-2"></i></a>
                        <a href="<?php echo URL_ROOT . "admin/product/$product->id/edit"?>"><i class="fa fa-edit text-warning"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/admin/product/index.blade.php ENDPATH**/ ?>