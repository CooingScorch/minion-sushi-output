<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minion Sushi - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&family=Fredoka+One&family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/css/login.css', 'resources/css/register.css', 'resources/js/app.js']); ?>
</head>
<body>

<div class="login-bg" id="loginBg"></div>

<div class="login-box">
    <div class="login-title">Create Account</div>
    <div class="login-sub">Join the Sushi Family!</div>

    <?php if($errors->any()): ?>
        <div class="login-err" style="display:block;">❌ <?php echo e($errors->first()); ?></div>
    <?php endif; ?>


<!-- register form -->
<form method="POST" action="/register">
    <?php echo csrf_field(); ?>
    <input type="text" name="name" class="login-field" placeholder="👤 Full Name" value="<?php echo e(old('name')); ?>" required>
    
    <select name="gender" class="login-field" required>
        <option value="" disabled <?php echo e(old('gender') ? '' : 'selected'); ?>>⚧ Gender</option>
        <option value="male"   <?php echo e(old('gender') == 'male'   ? 'selected' : ''); ?>>Male</option>
        <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>Female</option>
    </select>
    
    <input type="text" name="phone" class="login-field"
           placeholder="📱 Phone Number (e.g. 0123456789)"
           pattern="[0-9]{10,11}"
           title="10 or 11 digits only, no dashes"
           value="<?php echo e(old('phone')); ?>" required>
    
    <small style="color:#888; font-size:11px; margin: -5px 0 5px 0; display:block; text-align: left;"> 🎂 Select your birthday </small>
    <input type="date" name="birthday" class="login-field" 
            value="<?php echo e(old('birthday')); ?>" 
            max="<?php echo e(date('Y-m-d')); ?>" required>
    
    <input type="email" name="email" class="login-field" placeholder="📧 Email" value="<?php echo e(old('email')); ?>" required>
    
    <input type="password" name="password" class="login-field"
           placeholder="🔒 Password"
           title="Min 8 chars, include A-Z, a-z, 0-9 & symbol"
           required>
    <small style="color:#888; font-size:11px; margin: -8px 0 8px 4px; display:block;">
        Min 8 chars · Uppercase · Lowercase · Number · Symbol (@$!%*#?&)
    </small>
    
    <input type="password" name="password_confirmation" class="login-field" placeholder="🔒 Confirm Password" required>
    
    <button type="submit" class="login-btn">🎉 Create Account</button>
</form>

    <!-- return login page -->
    <p class="switch-text">
        Already have an account? 
        <a href="/"><br><strong>Back to Login</strong></br></a>
    </p>

<script>
    // login background
    function initLoginBg(){
        const bg = document.getElementById("loginBg");
        const emojis = ["🍣","🍌","🥢","🍱","🐟","🌊","🍙","🍜","🥟"];
        for(let i = 0; i < 18; i++){
            const d = document.createElement("div");
            d.className = "emoji";
            d.textContent = emojis[i % emojis.length];
            d.style.left = Math.random() * 100 + "%";
            d.style.top  = Math.random() * 100 + "%";
            d.style.animationDuration = (5 + Math.random() * 8) + "s";
            d.style.animationDelay    = Math.random() * 6 + "s";
            bg.appendChild(d);
        }
    }
    initLoginBg();
</script>

</body>
</html>

<?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/pages/register.blade.php ENDPATH**/ ?>