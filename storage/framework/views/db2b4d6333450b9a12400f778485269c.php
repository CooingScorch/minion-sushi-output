
<?php $__env->startSection('title', 'Feedback Management'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding:1.5rem;display:flex;flex-direction:column;gap:1rem;">

    <div style="
        background:var(--cr);
        border:3px solid var(--blk);
        border-radius:18px;
        box-shadow:var(--sh);
        padding:1.2rem 1.2rem;
    ">
        <div style="font-family:'Boogaloo',cursive;font-size:2rem;color:var(--bd);line-height:1;">
            💬 Customer Feedback
        </div>
        <div style="font-weight:800;color:#666;margin-top:0.35rem;">
            View customer ratings, comments, and manage feedback records here.
        </div>
    </div>

    <?php if(session('success')): ?>
        <div style="
            background:#dff7df;
            border:3px solid var(--blk);
            border-radius:16px;
            box-shadow:var(--sh);
            padding:0.95rem 1rem;
            font-weight:900;
            color:#1d5c2f;
        ">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($feedbacks->count()): ?>
        <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="
                background:#fff;
                border:3px solid var(--blk);
                border-radius:18px;
                box-shadow:var(--sh);
                padding:1rem;
                display:flex;
                flex-direction:column;
                gap:1rem;
                transition:all .14s;
            " onmouseover="this.style.transform='translate(-2px,-2px)';this.style.boxShadow='6px 6px 0 var(--blk)'"
               onmouseout="this.style.transform='translate(0,0)';this.style.boxShadow='4px 4px 0 var(--blk)'">

                <div style="display:flex;justify-content:space-between;gap:1rem;flex-wrap:wrap;align-items:flex-start;">
                    <div>
                        <div style="font-family:'Fredoka One',cursive;font-size:1.1rem;color:var(--bd);">
                            <?php echo e($fb->user->name ?? 'Unknown User'); ?>

                        </div>
                        <div style="font-size:0.9rem;font-weight:800;color:#666;">
                            <?php echo e($fb->user->email ?? 'No email'); ?>

                        </div>
                    </div>

                    <form action="<?php echo e(route('admin.feedback.destroy', $fb->id)); ?>" method="POST" onsubmit="return confirm('Delete this feedback?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" style="
                            background:#ffe0e0;
                            color:#8b1e1e;
                            border:2.5px solid var(--blk);
                            border-radius:12px;
                            padding:0.6rem 1rem;
                            font-family:'Fredoka One',cursive;
                            font-size:0.95rem;
                            cursor:pointer;
                            box-shadow:var(--sh);
                            transition:all .14s;
                        " onmouseover="this.style.transform='translate(-2px,-2px)';this.style.boxShadow='6px 6px 0 var(--blk)'"
                           onmouseout="this.style.transform='translate(0,0)';this.style.boxShadow='4px 4px 0 var(--blk)'">
                            🗑 Delete
                        </button>
                    </form>
                </div>

                <div style="
                    display:grid;
                    grid-template-columns:repeat(auto-fit, minmax(140px, 1fr));
                    gap:0.8rem;
                ">
                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Overall</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;"><?php echo e($fb->overall_rating); ?>/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Food Taste</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;"><?php echo e($fb->food_taste); ?>/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Freshness</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;"><?php echo e($fb->food_freshness); ?>/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Accuracy</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;"><?php echo e($fb->order_accuracy); ?>/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Service Speed</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;"><?php echo e($fb->service_speed); ?>/5 ⭐</div>
                    </div>
                </div>

                <div style="
                    background:#fffdf5;
                    border:2px solid rgba(0,0,0,0.12);
                    border-radius:14px;
                    padding:1rem;
                ">
                    <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.95rem;margin-bottom:0.4rem;">
                        Customer Comment
                    </div>
                    <div style="font-weight:800;color:#444;line-height:1.55;">
                        <?php echo e($fb->comment ?: 'No comment provided.'); ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div style="
            background:#fff;
            border:3px solid var(--blk);
            border-radius:18px;
            box-shadow:var(--sh);
            padding:1.2rem;
            font-weight:900;
            color:#666;
        ">
            No feedback found yet.
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/admin/feedback/index.blade.php ENDPATH**/ ?>