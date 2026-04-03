
<?php $__env->startSection('title', 'Add New Menu Item'); ?>
<?php $__env->startSection('content'); ?>
<?php echo app('Illuminate\Foundation\Vite')(['resources/js/products.js']); ?>
<div style="padding:1.5rem; max-width: 800px; margin: 0 auto;">
    <h2 style="font-family:'Fredoka One',cursive; font-size:1.8rem; margin-bottom:1rem; color:#1a1a1a;">🍱 Edit New Sushi</h2>
    
    
    <a href="<?php echo e(route('admin.add-drop-menu')); ?>" style="display:inline-block; margin-bottom:1.5rem; background:#1a3a5c; color:white; padding:0.5rem 1.2rem; border-radius:8px; border:2px solid #1a1a1a; text-decoration:none; font-weight:bold; box-shadow: 4px 4px 0px #1a1a1a;">
        ← Back to Menu List
    </a>

    
    <div style="background:white; padding:2rem; border:3px solid #1a1a1a; border-radius:12px; box-shadow: 8px 8px 0px #1a1a1a;">
        <?php if($errors->any()): ?>
    <div style="background:#ff4444; color:white; padding:1rem; border-radius:8px; margin-bottom:1.5rem; border:3px solid #1a1a1a; box-shadow: 4px 4px 0px #1a1a1a;">
        <strong style="font-size:1.1rem;">⚠️ Oops! Please fix these errors:</strong>
        <ul style="margin-top:0.5rem; margin-bottom:0; font-weight:bold;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
        
        <form action="<?php echo e(route('admin.menuItem.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                
                
                <div style="grid-column: span 2;">
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Item Name</label>
                    <input type="text" name="name" placeholder="e.g., Salmon Nigiri" value="<?php echo e($product->name); ?>" required
                           style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box;">
                </div>

                
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Category Type</label>
                    <select name="type" required style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box; background:white;">
                        <option value="sushi" <?php echo e($product->type == 'sushi'? 'selected':''); ?>>Sushi</option>
                        <option value="sashimi"<?php echo e($product->type == 'sashimi'? 'selected':''); ?>>Sashimi</option>
                        <option value="donburi" <?php echo e($product->type == 'donburi'? 'selected':''); ?>>Donburi</option>
                        <option value="noodles" <?php echo e($product->type == 'noodles'? 'selected':''); ?>>Noodles</option>
                        <option value="drink"<?php echo e($product->type == 'drink'? 'selected':''); ?>>Drink</option>
                        
                    </select>
                </div>

                
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Price (RM)</label>
                    <input type="number" step="0.01" name="price" value="<?php echo e($product->price); ?>" placeholder="0.00" required
                           style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box;">
                </div>

                
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Stock Available</label>
                    <label for="avilable">Available</label>
                    <select name="available" id="available">
                        <option value="1"<?php echo e($product->available == 1? 'selected':''); ?>>yes</option>
                        <option value="0"<?php echo e($product->available == 0? 'selected':''); ?>>no</option>
                    </select>
                </div>

                
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Product Image</label>
                    <img id="imagePreview"src="<?php echo e(asset(str_replace(['public\\','\\'],['','/'], $product->image ))); ?>"style="width:70px; height:70px; object-fit:cover; border:2px solid #1a1a1a; border-radius:8px">
                    <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                           style="width:100%; padding:0.6rem; border:2px solid #1a1a1a; border-radius:8px; font-size:0.9rem; background:#f0f0f0; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box;">
                </div>

                
                <div style="grid-column: span 2;">
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Description</label>
                    <textarea name="description" rows="4" placeholder="Describe the ingredients..."
                              style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box; resize:vertical;"><?php echo e($product->description); ?></textarea>
                </div>
            </div>

            
            <button type="submit" 
                    style="background:#4ade80; color:#1a1a1a; padding:1rem 2rem; border:3px solid #1a1a1a; border-radius:8px; font-size:1.2rem; font-weight:bold; cursor:pointer; width:100%; box-shadow: 6px 6px 0px #1a1a1a; transition: transform 0.1s;">
                + Update Item to Menu
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<script>

    function previewImage(event){
    const newImage = event.target;
    const previewImg = document.getElementById('imagePreview');

    if(newImage.files && newImage.files[0]){
        const reader =  new FileReader();
        reader.onload = function(e){
            previewImg.src = e.target.result;
        }
        reader.readAsDataURL(newImage.files[0]);
    }
}
</script>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/admin/add-drop(edit).blade.php ENDPATH**/ ?>