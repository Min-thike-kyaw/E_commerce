<?php if(isset($errors)): ?>
    <ul style="list-style-type : none;">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>   
    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <ul>
        <li><strong><?php echo e($err); ?></strong></li>
    </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </ul>
<?php endif; ?>


<?php if(isset($_SESSION['success'])): ?>

<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?php echo e(\App\Classes\Session::flash('success')); ?></strong>
    </div>
</ul>
<?php endif; ?>
<?php if(isset($_SESSION['fail'])): ?>

<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?php echo e(\App\Classes\Session::flash('success')); ?></strong>
    </div>
</ul>
<?php endif; ?>

<?php if(isset($_SESSION['delete_success'])): ?>
<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?php echo e(\App\Classes\Session::flash('delete_success')); ?></strong>
    </div>
</ul>
<?php endif; ?>

<?php if(isset($_SESSION['delete_fail'])): ?>
<ul style="list-style-type : none;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?php echo e(\App\Classes\Session::flash('delete_fail')); ?></strong>
    </div>
</ul>

<?php endif; ?><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/layouts/report_message.blade.php ENDPATH**/ ?>