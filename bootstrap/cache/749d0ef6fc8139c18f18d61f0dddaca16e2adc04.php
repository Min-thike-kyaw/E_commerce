<?php $__env->startSection("content"); ?>
<?php echo $__env->make("layouts.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="mt-5 pt-4"></div>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo e($product->image); ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-9">
                <h2 class="text-info"><?php echo e($product->name); ?></h2>
                <p><?php echo e($product->description); ?></p>
                <button class="btn btn-warning text-white rounded-0">$<?php echo e($product->price); ?></button>
                <button class="btn btn-success rounded-0" onClick="addToCart(<?php echo e($product->id); ?>)">Add to Cart</button>
                <div class=mt-2>
                Rate: 
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star-half text-warning "></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/detail.blade.php ENDPATH**/ ?>