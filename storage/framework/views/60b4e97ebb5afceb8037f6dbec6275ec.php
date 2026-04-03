<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Minion Sushi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/products.css', 'resources/js/products.js']); ?>
    
    <?php $__env->startSection('title', ucfirst($page)); ?>
    <?php $__env->startSection('content'); ?>
<body>
    
    <div class="app-container">

        <main class="main-content">
            <div class="content-header">
                <h1 class="page-title">Our Menu</h1>
                <p class="page-subtitle">Discover our delicious sushi, donburi, and more!</p>
            </div>

            <div id="menu-container">
                <section class="menu-subsection">
                    <div class="subsection-header">

                    
                    <div class="item-grid">
                        <div class="menu-item solid-shadow" data-id="1" data-name="Sashimi" data-price="12.00">
                            <div class="item-img-cont">
                                <img src="<?php echo e(asset('img/sashimi.webp')); ?>">
                            </div>
                            <div class="item-details">
                                <div class="item-header">
                                    <h3 class="item-name">Sashimi</h3><br>
                                    <p class="item-desc">Japanese delicacy consisting of fresh raw fish or meat sliced into thin pieces and often eaten with soy sauce.</p>
                                </div>
                                <a href="<?php echo e(url('menu/sashimi')); ?>"><button class="btn btn-primary view-more-btn"><i class="fas fa-plus"></i>View More</button></a>
                            </div>
                        </div>

                        <div class="menu-item solid-shadow" data-id="2" data-name="Donburi" data-price="14.50">
                            <div class="item-img-cont">
                                <img src="<?php echo e(asset('img/donburi.jpg')); ?>">
                            </div>
                            <div class="item-details">
                                <div class="item-header">
                                    <h3 class="item-name">Donburi</h3><br>
                                    <p class="item-desc">A classic Japanese rice-bowl dish featuring steamed rice with meat and vegeatbles</p>
                                </div>
                                <a href="<?php echo e(url('menu/donburi')); ?>"><button class="btn btn-primary view-more-btn"><i class="fas fa-plus"></i> View More</button></a>
                            </div>
                        </div>

                        <div class="menu-item solid-shadow" data-id="3" data-name="Sushi" data-price="16.00">
                            <div class="item-img-cont">
                                <img src="<?php echo e(asset('img/sushi.avif')); ?>">
                            </div>
                            <div class="item-details">
                                <div class="item-header">
                                    <h3 class="item-name">Sushi</h3><br>
                                    <p class="item-desc">Japanese dish made with vinegared rice and combined with a variety of ingredients</p>
                                </div>
                                <a href="<?php echo e(url('menu/sushi')); ?>"><button class="btn btn-primary view-more-btn"><i class="fas fa-plus"></i> View More</button></a>
                            </div>
                        </div>

                        <div class="menu-item solid-shadow" data-id="2" data-name="Noodless" data-price="14.50">
                            <div class="item-img-cont">
                                <img src="<?php echo e(asset('img/noodles.webp')); ?>">
                            </div>
                            <div class="item-details">
                                <div class="item-header">
                                    <h3 class="item-name">Noodles</h3><br>
                                    <p class="item-desc">Japanese noodles, inlcuding ramen, soba and udon.</p>
                                </div>
                                <a href="<?php echo e(url('menu/noodles')); ?>"><button class="btn btn-primary view-more-btn"><i class="fas fa-plus"></i> View More</button></a>
                            </div>
                        </div>

                        <div class="menu-item solid-shadow" data-id="3" data-name="Drinks" data-price="16.00">
                            <div class="item-img-cont">
                                <img src="<?php echo e(asset('img/drinks.webp')); ?>">
                            </div>
                            <div class="item-details">
                                <div class="item-header">
                                    <h3 class="item-name">Drinks</h3><br>
                                    <p class="item-desc">Bevrages refreshing pairs nicley with meals</p>
                                </div>
                                <a href="<?php echo e(url('menu/drinks')); ?>"><button class="btn btn-primary view-more-btn"><i class="fas fa-plus"></i> View More</button></a>
                            </div>
                        </div>
                    
                </section>

            </div>
        </main>
    </div>

</body>
    <?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/pages/products.blade.php ENDPATH**/ ?>