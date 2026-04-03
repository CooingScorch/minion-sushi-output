<?php $__env->startSection('title', ucfirst($page)); ?>
<?php $__env->startSection('content'); ?>
<div style="display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:55vh;text-align:center;gap:1.2rem;">
  <div style="font-size:5rem;"><?php echo e($icon); ?></div>
  <div style="font-family:'Boogaloo',cursive;font-size:2.5rem;color:var(--bd);"><?php echo e(ucfirst($page)); ?></div>
  <div style="font-family:'Fredoka One',cursive;font-size:1rem;color:#aaa;">Coming soon 🚧</div>
  <a href="<?php echo e(route('home')); ?>" style="font-family:'Fredoka One',cursive;font-size:1rem;padding:0.7rem 1.8rem;border-radius:13px;border:2.5px solid var(--blk);box-shadow:4px 4px 0 var(--blk);background:var(--bd);color:#fff;text-decoration:none;">← Back to Home</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/pages/placeholder.blade.php ENDPATH**/ ?>