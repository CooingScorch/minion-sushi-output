

<?php $__env->startSection('content'); ?>
<div style="max-width:600px;margin:2rem auto;background:white;padding:2rem;border-radius:12px;border:2px solid #1a1a1a;box-shadow:4px 4px 0 #1a1a1a;">

    <h2 style="font-family:'Boogaloo',cursive;font-size:2rem;margin-bottom:1.5rem;">✏️ Edit Staff Info</h2>

    <form action="<?php echo e(route('admin.staff.update', $member->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Name</label>
            <input type="text" name="name" value="<?php echo e(old('name', $member->name)); ?>" required
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid <?php echo e($errors->has('name') ? 'red' : '#1a1a1a'); ?>;font-size:1rem;box-sizing:border-box;">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Gender</label>
            <select name="gender" style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid <?php echo e($errors->has('gender') ? 'red' : '#1a1a1a'); ?>;font-size:1rem;box-sizing:border-box;">
                <option value="male" <?php echo e(old('gender', $member->gender) == 'male' ? 'selected' : ''); ?>>Male</option>
                <option value="female" <?php echo e(old('gender', $member->gender) == 'female' ? 'selected' : ''); ?>>Female</option>
            </select>
            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Phone</label>
            <input type="text" name="phone" value="<?php echo e(old('phone', $member->phone)); ?>"
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid <?php echo e($errors->has('phone') ? 'red' : '#1a1a1a'); ?>;font-size:1rem;box-sizing:border-box;">
            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Birthday</label>
            <input type="date" name="birthday" value="<?php echo e(old('birthday', $member->birthday)); ?>"
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid <?php echo e($errors->has('birthday') ? 'red' : '#1a1a1a'); ?>;font-size:1rem;box-sizing:border-box;">
            <?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div style="margin-bottom:1.5rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email', $member->email)); ?>" required
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid <?php echo e($errors->has('email') ? 'red' : '#1a1a1a'); ?>;font-size:1rem;box-sizing:border-box;">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div style="display:flex;gap:1rem;">
            <button type="submit" style="background:#FFD700;color:#1a1a1a;padding:0.6rem 1.5rem;border-radius:8px;border:2px solid #1a1a1a;font-size:1rem;font-weight:600;cursor:pointer;">
                💾 Save Changes
            </button>
            <a href="<?php echo e(route('admin.staff-list')); ?>" style="background:#eee;color:#1a1a1a;padding:0.6rem 1.5rem;border-radius:8px;border:2px solid #1a1a1a;font-size:1rem;font-weight:600;text-decoration:none;">
                ← Cancel
            </a>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/admin/edit-staff.blade.php ENDPATH**/ ?>