<?php $__env->startSection("content"); ?>
<?php echo $__env->make("layouts.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card p-5">
            <?php echo $__env->make("layouts.report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2 class="pt-4 text-info text-center">Login</h2>
                <form action="<?php echo e(URL_ROOT); ?>user/login" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(URL_ROOT); ?>user/register">
                            Not a user yet, register
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/user/login.blade.php ENDPATH**/ ?>