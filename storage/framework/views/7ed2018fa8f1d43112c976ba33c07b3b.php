 
<?php $__env->startSection('title', 'Dashboard'); ?> 

<?php $__env->startSection('content'); ?>

    
  <div style="display:flex;justify-content:center;align-items:center;min-height:60vh;">
  <div style="background:#fff;border-radius:16px;border:2.5px solid #1a1a1a;box-shadow:4px 4px 0 #1a1a1a;padding:2.5rem 3rem;text-align:center;">
    <div style="font-family:'Fredoka One',cursive;font-size:1.1rem;color:#1a1a1a;">Welcome to</div>
    <div style="font-family:'Boogaloo',cursive;font-size:2.4rem;color:#1a1a1a;line-height:1.05;">Minion Sushi Admin Dashboard</div><br><br><br></br>

  <a href="<?php echo e(route('admin.change-password')); ?>" style="background:#FFD700;color:#1a1a1a;padding:0.6rem 1.5rem;border-radius:8px;border:2px solid #1a1a1a;font-size:1rem;font-weight:600;text-decoration:none;">
    🔒 Change Password
  </a>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php if(session('success')): ?>
<div id="toast" style="position:fixed;bottom:30px;left:50%;transform:translateX(-50%);
     background:#1B6CA8;color:#fff;padding:12px 24px;border-radius:12px;
     font-family:'Fredoka One',cursive;font-size:1rem;z-index:999;
     box-shadow:4px 4px 0 #1A1A1A;max-width:80%;text-align:center;
     white-space:normal;word-break:break-word;">
  ✅ <?php echo e(session('success')); ?>

</div>
<script>
  setTimeout(() => {
    document.getElementById('toast').style.display = 'none';
  }, 8000);
</script>
<?php endif; ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>