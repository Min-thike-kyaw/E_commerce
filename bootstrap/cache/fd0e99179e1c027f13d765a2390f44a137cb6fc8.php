<?php $__env->startSection("content"); ?>
<?php echo $__env->make("layouts.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="mt-5 pt-4"></div>

<div class="container pt-5 mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
<?php echo $__env->make("layouts.report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card p-5">
                <h2 class="pt-4 text-info text-center">Register</h2>
                <form action="<?php echo e(URL_ROOT); ?>user/register" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(URL_ROOT); ?>user/login">
                            Already a member, login
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            <button class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/user/register.blade.php ENDPATH**/ ?>