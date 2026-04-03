<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('extra-styles'); ?>

.profile-hero{background:linear-gradient(135deg,#0d2b5e 0%,#163a7a 100%);
  border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--shl);
  padding:2rem 2rem;text-align:left;position:relative;overflow:hidden;
  display:flex;align-items:center;gap:1.4rem;}
.profile-hero::before{content:'🍣🍱🥢🍣🍱🥢';position:absolute;bottom:-8px;right:-10px;
  font-size:2rem;opacity:0.06;white-space:nowrap;pointer-events:none;}

.section-title{font-family:'Fredoka One',cursive;font-size:0.82rem;letter-spacing:2.5px;
  text-transform:uppercase;color:var(--bd);opacity:0.75;margin-bottom:0.7rem;}

.info-card{background:#fff;border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);overflow:hidden;}
.info-row{display:flex;align-items:center;gap:1rem;padding:0.95rem 1.3rem;border-bottom:1.5px solid rgba(0,0,0,0.06);}
.info-row:last-child{border-bottom:none;}
.info-ic{font-size:1.3rem;flex-shrink:0;width:32px;text-align:center;}
.info-label{font-size:0.75rem;font-weight:900;text-transform:uppercase;letter-spacing:1px;color:#aaa;margin-bottom:1px;}
.info-value{font-family:'Fredoka One',cursive;font-size:1rem;color:var(--blk);}
.info-edit{margin-left:auto;background:var(--bg);border:1.5px solid var(--blk);border-radius:8px;
  font-family:'Fredoka One',cursive;font-size:0.78rem;padding:0.2rem 0.6rem;cursor:pointer;
  color:var(--bd);text-decoration:none;}
.info-edit:hover{background:var(--yl);}

.order-hist-row{display:flex;align-items:center;gap:1rem;padding:0.9rem 1.3rem;border-bottom:1.5px dashed rgba(0,0,0,0.07);}
.order-hist-row:last-child{border-bottom:none;}
.order-hist-date{font-size:0.75rem;color:#aaa;font-weight:700;min-width:80px;}
.order-hist-name{flex:1;font-weight:800;font-size:0.95rem;}
.order-hist-price{font-family:'Fredoka One',cursive;color:var(--bd);}
.order-hist-badge{font-size:0.7rem;padding:0.15rem 0.55rem;border-radius:50px;border:1.5px solid var(--blk);font-family:'Fredoka One',cursive;}
.badge-done{background:var(--grn);color:#fff;}

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div style="background:linear-gradient(135deg,#0d2b5e 0%,#163a7a 100%);border:3px solid #1A1A1A;border-radius:18px;box-shadow:6px 6px 0 #1A1A1A;padding:3rem 2rem 3rem;position:relative;display:flex;flex-direction:column;align-items:center;gap:0.9rem;text-align:center;">
  <div style="width:130px;height:130px;border-radius:50%;border:5px solid #1A1A1A;box-shadow:4px 4px 0 rgba(0,0,0,0.35);background:#FFD700;display:flex;align-items:center;justify-content:center;font-size:4.5rem;">😄</div>
  <div style="font-family:'Boogaloo',cursive;font-size:4.5rem;color:#ffffff;font-weight:bold;line-height:1.1;"><?php echo e($user->name); ?></div>
  <div style="font-size:1rem;color:rgba(255,255,255,0.55);font-weight:600;margin-top:-0.3rem;"><?php echo e($user->email); ?></div>
</div>


  <div>
    <div class="section-title"><?php echo e(__('messages.personal_info')); ?></div>
    <div class="info-card">
      <div class="info-row">
        <div class="info-ic">👤</div>
        <div><div class="info-label"><?php echo e(__('messages.full_name')); ?></div><div class="info-value"><?php echo e($user->name); ?></div></div>
        <a href="/profile/edit?field=name"  class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">📧</div>
        <div><div class="info-label"><?php echo e(__('messages.email')); ?></div><div class="info-value"><?php echo e($user->email); ?></div></div>
        <a href="/profile/edit?field=email"  class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">🎂</div>
        <div><div class="info-label">Password</div><div class="info-value">••••••••</div></div>
        <a href="/profile/password" class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">📱</div>
        <div><div class="info-label"><?php echo e(__('messages.phone')); ?></div><div class="info-value">
        <?php echo e(substr($user->phone, 0, 3) . '-' . substr($user->phone, 3)); ?></div></div> 
        <a href="/profile/edit?field=phone"  class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">🎂</div>
        <div><div class="info-label"><?php echo e(__('messages.birthday')); ?></div><div class="info-value"><?php echo e($user->birthday); ?></div></div>
      </div>
      <div class="info-row">
        <div class="info-ic">📅</div>
        <div><div class="info-label"><?php echo e(__('messages.member_since')); ?></div><div class="info-value"><?php echo e(\Carbon\Carbon::parse($user->created_at)->format('F Y')); ?></div></div>
      </div>
    </div>
  </div>


<div>
  <div class="section-title">About</div>
  <div class="info-card">
    <div class="info-row">
      <div class="info-ic">ℹ️</div>
      <div><div class="info-label">About Minion Sushi</div><div class="info-value">Minion Sushi v2.0</div></div>
      <div style="margin-left:auto;color:#ccc;font-size:1.2rem;">›</div>
    </div>
  </div>
</div>


<a href="<?php echo e(route('logout')); ?>" style="background:var(--r);border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);padding:1.25rem 1.5rem;display:flex;align-items:center;gap:1rem;cursor:pointer;transition:all 0.12s;text-decoration:none;">
  <div style="font-size:1.8rem;">↩</div>
  <div>
    <div style="font-family:'Fredoka One',cursive;font-size:1.15rem;color:#fff;">Log Out</div>
    <div style="font-size:0.8rem;color:rgba(255,255,255,0.7);font-weight:700;">End your current dining session</div>
  </div>
  <div style="margin-left:auto;font-size:1.5rem;color:rgba(255,255,255,0.5);">›</div>
</a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-styles'); ?>

.profile-hero{background:linear-gradient(135deg,#0d2b5e 0%,#163a7a 100%);
  border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--shl);
  padding:2rem 2rem;text-align:left;position:relative;overflow:hidden;
  display:flex;align-items:center;gap:1.4rem;}
.profile-hero::before{content:'🍣🍱🥢🍣🍱🥢';position:absolute;bottom:-8px;right:-10px;
  font-size:2rem;opacity:0.06;white-space:nowrap;pointer-events:none;}
.profile-av-wrap{position:relative;display:inline-block;flex-shrink:0;}
.profile-av{width:100px;height:100px;border-radius:50%;border:4px solid var(--y);
  box-shadow:var(--shl);background:var(--y);display:flex;align-items:center;
  justify-content:center;font-size:3.2rem;margin:0;}
.profile-badge{position:absolute;bottom:2px;right:2px;background:var(--y);border:2.5px solid var(--blk);
  border-radius:50%;width:30px;height:30px;display:flex;align-items:center;justify-content:center;font-size:0.95rem;}
.profile-info{display:flex;flex-direction:column;gap:0.3rem;}
.profile-name{font-family:'Boogaloo',cursive;font-size:2.2rem;color:#fff;margin-bottom:0;}
.profile-email{font-size:0.85rem;color:rgba(255,255,255,0.5);margin-bottom:0.2rem;}
.profile-tier{display:inline-flex;align-items:center;gap:0.4rem;background:var(--y);
  color:var(--bd);font-family:'Fredoka One',cursive;font-size:0.9rem;
  padding:0.35rem 1rem;border-radius:50px;border:2px solid var(--blk);align-self:flex-start;
  white-space:nowrap;}

.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;}
.stat-card{background:#fff;border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);
  padding:1.25rem;text-align:center;}
.stat-val{font-family:'Boogaloo',cursive;font-size:2.2rem;color:var(--bd);}
.stat-key{font-size:0.72rem;font-weight:900;text-transform:uppercase;letter-spacing:1.5px;color:#888;margin-top:2px;}
.stat-ic{font-size:1.5rem;margin-bottom:0.3rem;}

.section-title{font-family:'Fredoka One',cursive;font-size:0.82rem;letter-spacing:2.5px;
  text-transform:uppercase;color:var(--bd);opacity:0.75;margin-bottom:0.7rem;}

.info-card{background:#fff;border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);overflow:hidden;}
.info-row{display:flex;align-items:center;gap:1rem;padding:0.95rem 1.3rem;border-bottom:1.5px solid rgba(0,0,0,0.06);}
.info-row:last-child{border-bottom:none;}
.info-ic{font-size:1.3rem;flex-shrink:0;width:32px;text-align:center;}
.info-label{font-size:0.75rem;font-weight:900;text-transform:uppercase;letter-spacing:1px;color:#aaa;margin-bottom:1px;}
.info-value{font-family:'Fredoka One',cursive;font-size:1rem;color:var(--blk);}
.info-edit{margin-left:auto;background:var(--bg);border:1.5px solid var(--blk);border-radius:8px;
  font-family:'Fredoka One',cursive;font-size:0.78rem;padding:0.2rem 0.6rem;cursor:pointer;
  color:var(--bd);text-decoration:none;}
.info-edit:hover{background:var(--yl);}

.pts-progress-card{background:linear-gradient(135deg,var(--y) 0%,#ffec6e 100%);
  border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);padding:1.5rem;}
.pts-big{font-family:'Boogaloo',cursive;font-size:3.5rem;color:var(--bd);line-height:1;}
.pts-progress-bar{background:rgba(0,0,0,0.15);border-radius:50px;height:12px;margin:0.75rem 0 0.4rem;border:1.5px solid rgba(0,0,0,0.1);}
.pts-progress-fill{background:var(--bd);height:100%;border-radius:50px;width:64%;}

.order-hist-row{display:flex;align-items:center;gap:1rem;padding:0.9rem 1.3rem;border-bottom:1.5px dashed rgba(0,0,0,0.07);}
.order-hist-row:last-child{border-bottom:none;}
.order-hist-date{font-size:0.75rem;color:#aaa;font-weight:700;min-width:80px;}
.order-hist-name{flex:1;font-weight:800;font-size:0.95rem;}
.order-hist-price{font-family:'Fredoka One',cursive;color:var(--bd);}
.order-hist-badge{font-size:0.7rem;padding:0.15rem 0.55rem;border-radius:50px;border:1.5px solid var(--blk);font-family:'Fredoka One',cursive;}
.badge-done{background:var(--grn);color:#fff;}
.badge-pending{background:var(--y);color:var(--blk);}

.edit-btn{background:var(--b);color:#fff;font-family:'Fredoka One',cursive;font-size:1rem;
  padding:0.7rem 1.8rem;border-radius:13px;border:2.5px solid var(--blk);box-shadow:var(--sh);
  cursor:pointer;transition:all 0.12s;text-decoration:none;display:inline-block;}
.edit-btn:hover{transform:translate(-2px,-2px);box-shadow:var(--shl);}

@media(max-width:768px){
  .stats-row{grid-template-columns:1fr 1fr;}
  .stats-row .stat-card:last-child{grid-column:span 2;}
}
@media(max-width:700px){
  .stats-row{grid-template-columns:1fr 1fr;}
  .profile-grid-2{grid-template-columns:1fr !important;}
}

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div style="background:linear-gradient(135deg,#0d2b5e 0%,#163a7a 100%);border:3px solid #1A1A1A;border-radius:18px;box-shadow:6px 6px 0 #1A1A1A;padding:3rem 2rem 3rem;position:relative;display:flex;flex-direction:column;align-items:center;gap:0.9rem;text-align:center;">
  <div style="width:130px;height:130px;border-radius:50%;border:5px solid #1A1A1A;box-shadow:4px 4px 0 rgba(0,0,0,0.35);background:#FFD700;display:flex;align-items:center;justify-content:center;font-size:4.5rem;">😄</div>
  <div style="font-family:'Boogaloo',cursive;font-size:3rem;color:#FFD700;line-height:1.1;">Kevin Tan</div>
  <div style="font-size:1rem;color:rgba(255,255,255,0.55);font-weight:600;margin-top:-0.3rem;">kevintan@email.com</div>
  <div style="display:inline-flex;align-items:center;gap:0.6rem;background:#FFD700;color:#0D3D6B;font-family:'Fredoka One',cursive;font-size:1.05rem;padding:0.55rem 1.5rem;border-radius:50px;border:2.5px solid #1A1A1A;font-weight:700;white-space:nowrap;">⭐ Gold Member &nbsp;|&nbsp; 1,280 pts</div>
</div>


<div class="stats-row">
  <div class="stat-card">
    <div class="stat-ic">🍣</div>
    <div class="stat-val">47</div>
    <div class="stat-key"><?php echo e(__('messages.total_visits')); ?></div>
  </div>

<div class="profile-grid-2" style="display:grid;grid-template-columns:1fr 1fr;gap:1.2rem;">

  
  <div>
    <div class="section-title"><?php echo e(__('messages.personal_info')); ?></div>
    <div class="info-card">
      <div class="info-row">
        <div class="info-ic">👤</div>
        <div><div class="info-label"><?php echo e(__('messages.full_name')); ?></div><div class="info-value"><?php echo e($user->name); ?></div></div>
        <a href="/profile/edit?field=name"  class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">📧</div>
        <div><div class="info-label"><?php echo e(__('messages.email')); ?></div><div class="info-value"><?php echo e($user->email); ?></div></div>
        <a href="/profile/edit?field=email"  class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">🎂</div>
        <div><div class="info-label">Password</div><div class="info-value">••••••••</div></div>
        <a href="/profile/password" class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">📱</div>
        <div><div class="info-label"><?php echo e(__('messages.phone')); ?></div><div class="info-value">
        <?php echo e(substr($user->phone, 0, 3) . '-' . substr($user->phone, 3)); ?></div></div> 
        <a href="/profile/edit?field=phone"  class="info-edit"><?php echo e(__('messages.edit')); ?></a>
      </div>
      <div class="info-row">
        <div class="info-ic">🎂</div>
        <div><div class="info-label"><?php echo e(__('messages.birthday')); ?></div><div class="info-value"><?php echo e($user->birthday); ?></div></div>
      </div>
      <div class="info-row">
        <div class="info-ic">📅</div>
        <div><div class="info-label"><?php echo e(__('messages.member_since')); ?></div><div class="info-value"><?php echo e(\Carbon\Carbon::parse($user->created_at)->format('F Y')); ?></div></div>
      </div>
    </div>
  </div>

</div>


<div>
  <div class="section-title">About</div>
  <div class="info-card">
    <div class="info-row">
      <div class="info-ic">ℹ️</div>
      <div><div class="info-label">About Minion Sushi</div><div class="info-value">Minion Sushi v2.0</div></div>
      <div style="margin-left:auto;color:#ccc;font-size:1.2rem;">›</div>
    </div>
  </div>
</div>


<a href="<?php echo e(route('logout')); ?>" style="background:var(--r);border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);padding:1.25rem 1.5rem;display:flex;align-items:center;gap:1rem;cursor:pointer;transition:all 0.12s;text-decoration:none;">
  <div style="font-size:1.8rem;">↩</div>
  <div>
    <div style="font-family:'Fredoka One',cursive;font-size:1.15rem;color:#fff;">Log Out</div>
    <div style="font-size:0.8rem;color:rgba(255,255,255,0.7);font-weight:700;">End your current dining session</div>
  </div>
  <div style="margin-left:auto;font-size:1.5rem;color:rgba(255,255,255,0.5);">›</div>
</a>

<?php $__env->stopSection(); ?>

<?php if(session('success')): ?>
<div id="toast" style="position:fixed; bottom:30px; left:50%; transform:translateX(-50%);
     background:#1B6CA8; color:#fff; padding:12px 24px; border-radius:12px;
     font-family:'Fredoka One',cursive; font-size:1rem; z-index:999; box-shadow: 4px 4px 0 #1A1A1A;">
  ✅ <?php echo e(session('success')); ?>

</div>
<script>
  setTimeout(() => {
    document.getElementById('toast').style.display = 'none';
  }, 3000);
</script>
<?php endif; ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/pages/profile.blade.php ENDPATH**/ ?>