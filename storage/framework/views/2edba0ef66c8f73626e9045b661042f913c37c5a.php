

<?php $__env->startSection('space=work'); ?>

<h1>Login</h1>

<?php if($errors->any()): ?>
 
   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <p style="color:red;"><?php echo e($error); ?></p>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<?php if(Session::has('error')): ?>
   <p style="color:red;"><?php echo e(Session::get('error')); ?></p>
<?php endif; ?>


<form action="<?php echo e(route('userLogin')); ?>" method='POST'>
<?php echo csrf_field(); ?>

<input type="email" name="email" placeholder="Enter Email">
<br><br>
<input type="password" name="password" placeholder="Enter Password">
<br><br>
<input type="submit" value="Login">
</form>

<a href="/forget-password">Forget Password?</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/layout-common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OAMS\resources\views/login.blade.php ENDPATH**/ ?>