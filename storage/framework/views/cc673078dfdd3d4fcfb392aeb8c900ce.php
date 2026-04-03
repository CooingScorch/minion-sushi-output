<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/css/login.css', 'resources/css/update-password.css', 'resources/js/app.js']); ?>
</head>
<body>

<div class="login-bg" id="loginBg"></div>

<div class="login-box">
  <div class="login-title"><strong>🔒 Change Password</strong><br><br></br></div>

  <?php if(session('pw_error')): ?>
    <div class="login-err" style="display:block;">❌ <?php echo e(session('pw_error')); ?></div>
  <?php endif; ?>
  <?php if($errors->any()): ?>
    <div class="login-err" style="display:block;">❌ <?php echo e($errors->first()); ?></div>
  <?php endif; ?>

  <form method="POST" action="/profile/password">
    <?php echo csrf_field(); ?>
    <input type="password" name="current_password" class="login-field"
           placeholder="🔒 Current Password" required>

    <small style="color:#888; font-size:11px; display:block; margin:-8px 0 10px 4px;">
      Min 8 chars · Uppercase · Lowercase · Number · Symbol (@$!%*#?&)
    </small>

    <input type="password" name="password" class="login-field"
           placeholder="🔒 New Password" required>
    <input type="password" name="password_confirmation" class="login-field"
           placeholder="🔒 Confirm New Password" required>

    <button type="submit" class="login-btn">✅ Update Password</button>
  </form>

  <a href="/profile">
    <button class="login-guest">← Back to Profile</button>
  </a>
</div>

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
</html><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/pages/update-password.blade.php ENDPATH**/ ?>