
<?php $__env->startSection('title', 'Menu List'); ?>
<?php $__env->startSection('content'); ?>
<div style="padding:1.5rem;">
  <h2 style="font-family:'Fredoka One',cursive;font-size:1.8rem;margin-bottom:1rem;">📋 Order Log</h2>
  

<a href="<?php echo e(route('AdminDashboard')); ?>" style="display:inline-block;margin-bottom:1rem;background:#1a3a5c;color:white;padding:0.5rem 1.2rem;border-radius:8px;text-decoration:none;font-weight:600;">← Back to Dashboard</a>



<div style="overflow-x:auto;display:block;">
    <table style="width:100%;border-collapse:collapse;min-width:600px;">
        <thead>
            <tr style="background:#1a3a5c;color:white;">
                <th style="padding:0.8rem;text-align:left;">ID</th>
                <th style="padding:0.8rem;text-align:left;">Table Number</th>
                <th style="padding:0.8rem;text-align:left;">Ordered Items</th>
                <th style="padding:0.8rem;text-align:left;">Qty</th>
                <th style="padding:0.8rem;text-align:left;">Price (RM)</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:0.8rem 1rem;"><?php echo e($orderItems->id); ?></td>
                <td style="padding:0.8rem 1rem;"><?php echo e($orderItems-> table_number); ?></td>
                <td style="padding:0.8rem 1rem;"><?php echo e($orderItems-> item_name); ?></td>
                <td style="padding:0.8rem 1rem;"><?php echo e($orderItems -> qty); ?></td>
                <td style="padding:0.8rem 1rem;"><?php echo e($orderItems-> price); ?></td>
                <td style="padding:0.8rem;text-align:center;white-space:nowrap;">
                    
                    
                        
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/admin/orderItems.blade.php ENDPATH**/ ?>