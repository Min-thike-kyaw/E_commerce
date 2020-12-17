<?php $__env->startSection("content"); ?>
<?php echo $__env->make("layouts.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 py-3">
                <div class="card">
                    <div class="card-header">
                        <h6><?php echo e($product->name); ?></h6>
                    </div>
                    <div class="card-body">
                        <img src="<?php echo e($product->image); ?>" alt="" class="img-fluid" style="height: 280px; width: 160px; ">
                    </div>
                    <div class="card-footer py-0 my-0 d-flex justify-content-between">
                        <a href="<?php echo e(URL_ROOT); ?>product/<?php echo e($product->id); ?>/detail" class="btn btn-info btn-sm my-1"><i class="fa fa-eye"></i></a>
                        <span>$<?php echo e($product->price); ?></span>
                        <button class="btn btn-info btn-sm my-1" onclick="addToCart(<?php echo e($product->id); ?>)"><i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/home.blade.php ENDPATH**/ ?>