<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/css/login.css', 'resources/css/update-password.css', 'resources/js/app.js']); ?>
</head>
<body>

<div class="login-bg" id="loginBg"></div>

<div class="login-box">

  
  <?php if($field == 'name'): ?>
    <div class="login-title"><strong>👤 Edit Your Name</strong><br><br></br></div>
  <?php elseif($field == 'email'): ?>
    <div class="login-title"><strong>📧 Edit Your Email</strong><br><br></br></div>
  <?php elseif($field == 'phone'): ?>
    <div class="login-title"><strong>📱 Edit Your Phone Number</strong><br><br></br></div>
  <?php endif; ?>

  
<?php if(session('error')): ?>
<div id="error-msg" class="login-err" style="display:block;background:#f8d7da;color:#721c24;padding:0.8rem 1rem;border-radius:8px;border:1.5px solid #f5c6cb;margin-bottom:1rem;word-break:break-word;white-space:normal;">❌ <?php echo e(session('error')); ?></div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div id="errors-msg" class="login-err" style="display:block;background:#f8d7da;color:#721c24;padding:0.8rem 1rem;border-radius:8px;border:1.5px solid #f5c6cb;margin-bottom:1rem;word-break:break-word;white-space:normal;">❌ <?php echo e($errors->first()); ?></div>
<?php endif; ?>

<script>
    setTimeout(() => {
        ['error-msg', 'errors-msg'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.style.display = 'none';
        });
    }, 8000);
</script>

  <form method="POST" action="/profile/edit">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="field" value="<?php echo e($field); ?>">

    <?php if($field == 'name'): ?>
      <input type="text" name="value" class="login-field"
             placeholder="👤 Full Name"
             value="<?php echo e(old('value', $user->name)); ?>" required>

    <?php elseif($field == 'email'): ?>
      <input type="email" name="value" class="login-field"
             placeholder="📧 Email"
             value="<?php echo e(old('value', $user->email)); ?>" required>

    <?php elseif($field == 'phone'): ?>
      <input type="text" name="value" class="login-field"
             placeholder="📱 Phone Number (e.g. 0123456789)"
             pattern="[0-9]{10,11}"
             title="10 or 11 digits only, no dashes"
             value="<?php echo e(old('value', $user->phone)); ?>" required>

    <?php else: ?>
      <p style="color:red;">Invalid field.</p>
    <?php endif; ?>

    <button type="submit" class="login-btn">✅ Save Changes</button>
  </form>

  <a href="/profile">
    <button class="login-guest">← Back to Profile</button>
  </a>

</div>

<script>
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
    d.style.animationDelay   = Math.random() * 6 + "s";
    bg.appendChild(d);
  }
}
initLoginBg();
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/pages/edit-profile.blade.php ENDPATH**/ ?>