<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(assets('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(assets('css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(assets('css/font-awesome-4.7.0/css/font-awesome.css')); ?>">
</head>
<body>
<?php echo $__env->yieldContent("content"); ?>


<script src="<?php echo e(assets('js/query.js')); ?>"></script>
<script src="<?php echo e(assets('js/popper.js')); ?>"></script>
<script src="<?php echo e(assets('js/ajax.js')); ?>"></script>
<script src="<?php echo e(assets('js/bootstrap.js')); ?>"></script>   
<script src="<?php echo e(assets('js/custom.js')); ?>"></script> 


<?php echo $__env->yieldContent("script"); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\E_commerce\resources\views/layouts/master.blade.php ENDPATH**/ ?>