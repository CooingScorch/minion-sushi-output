
<?php $__env->startSection('title', 'Menu List'); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:1.5rem;">
  <h2 style="font-family:'Fredoka One',cursive;font-size:1.8rem;margin-bottom:1rem;">🍣 Menu Add List</h2>
  

<a href="<?php echo e(route('AdminDashboard')); ?>" style="display:inline-block;margin-bottom:1rem;background:#1a3a5c;color:white;padding:0.5rem 1.2rem;border-radius:8px;text-decoration:none;font-weight:600;">← Back to Dashboard</a>

<a href="<?php echo e(route('admin.menuItem.create')); ?>" style="background:#29C434;color:#1a1a1a;padding:0.3rem 0.8rem;border-radius:8px;border:2px solid #1a1a1a;text-decoration:none;font-size:0.85rem;display:inline-block;">Add</a>

<div style="overflow-x:auto;display:block;">
    <table style="width:100%;border-collapse:collapse;min-width:600px;">
        <thead>
            <tr style="background:#1a3a5c;color:white;">
                <th style="padding:0.8rem;text-align:left;">ID</th>
                <th style="padding:0.8rem;text-align:left;">Image</th>
                <th style="padding:0.8rem;text-align:left;">Name</th>
                <th style="padding:0.8rem;text-align:left;">Available</th>
                <th style="padding:0.8rem;text-align:left;">Price (RM)</th>
                <th style="padding:0.8rem;text-align:left;">Type</th>
                <th style="padding:0.8rem;text-align:left;">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:0.8rem 1rem;"><?php echo e($product->id); ?></td>

                <td style="padding:0.8rem 1rem;">
                <img src="<?php echo e(asset(str_replace(['public\\','\\'],['','/'], $product->image ))); ?>"
                 style="width:70px; height:70px; object-fit:cover; border:2px solid #1a1a1a; border-radius:8px">
                </td>
                <td style="padding:0.8rem 1rem;"><?php echo e($product->name); ?></td>
                <?php if( $product->available  == 1): ?>
                <td style="padding:0.8rem 1rem;">yes</td>
                <?php else: ?>
                <td style="padding:0.8rem 1rem;">no</td>
                <?php endif; ?>
                <td style="padding:0.8rem 1rem;"><?php echo e($product-> price); ?></td>
                <td style="padding:0.8rem 1rem;"><?php echo e($product-> type); ?></td>
                <td style="padding:0.8rem 1rem;"><?php echo e($product-> description); ?></td>
                <td style="padding:0.8rem;text-align:center;white-space:nowrap;">
                    <a href="<?php echo e(route('admin.menuItem.edit', $product->id)); ?>"
                        style="background:#FFD700;color:#1a1a1a;padding:0.3rem 0.8rem;border-radius:8px;border:2px solid #1a1a1a;text-decoration:none;font-size:0.85rem;display:inline-block;">Edit</a>
                    <form action="<?php echo e(route('admin.menuItem.delete', $product->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" onclick="return confirm('Are you sure?')" style="background:#ff4444;color:#fff;padding:0.3rem 0.8rem;border-radius:8px;border:2px solid #1a1a1a;font-size:0.85rem;cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/admin/add-drop.blade.php ENDPATH**/ ?>