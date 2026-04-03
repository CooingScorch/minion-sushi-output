@extends('layouts.app')
@section('title', 'Settings')

@section('extra-styles')

.settings-section{margin-bottom:0.5rem;}
.settings-group{background:#fff;border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);overflow:hidden;margin-bottom:1.5rem;}
.settings-group-title{font-family:'Fredoka One',cursive;font-size:0.75rem;letter-spacing:2.5px;
  text-transform:uppercase;color:var(--bd);opacity:0.65;padding:0.9rem 1.3rem 0.4rem;
  border-bottom:1.5px solid rgba(0,0,0,0.05);}
.settings-row{display:flex;align-items:center;gap:1rem;padding:0.95rem 1.3rem;
  border-bottom:1.5px solid rgba(0,0,0,0.05);cursor:pointer;transition:background 0.12s;text-decoration:none;}
.settings-row:last-child{border-bottom:none;}
.settings-row:hover{background:var(--bg);}
.settings-row.danger:hover{background:rgba(232,53,43,0.05);}
.s-ic{font-size:1.4rem;flex-shrink:0;width:34px;text-align:center;}
.s-body{flex:1;}
.s-label{font-family:'Fredoka One',cursive;font-size:1rem;color:var(--blk);}
.s-label.danger{color:var(--r);}
.s-desc{font-size:0.78rem;color:#aaa;font-weight:700;margin-top:1px;}
.s-arrow{color:#ccc;font-size:1.2rem;flex-shrink:0;}
.s-value{font-size:0.85rem;font-weight:700;color:#888;flex-shrink:0;margin-right:0.4rem;}
.s-toggle{width:46px;height:26px;background:#ddd;border-radius:50px;position:relative;cursor:pointer;
  border:2px solid var(--blk);transition:background 0.2s;flex-shrink:0;}
.s-toggle.on{background:var(--grn);}
.s-toggle::after{content:'';position:absolute;width:18px;height:18px;background:#fff;
  border-radius:50%;top:2px;left:2px;transition:transform 0.2s;border:1.5px solid rgba(0,0,0,0.1);}
.s-toggle.on::after{transform:translateX(20px);}

.account-avatar{display:flex;align-items:center;gap:1rem;padding:1.25rem 1.3rem;
  border-bottom:1.5px solid rgba(0,0,0,0.05);}
.acc-av{width:60px;height:60px;border-radius:50%;background:var(--y);border:3px solid var(--blk);
  box-shadow:var(--sh);display:flex;align-items:center;justify-content:center;font-size:2rem;}
.acc-name{font-family:'Boogaloo',cursive;font-size:1.5rem;color:var(--bd);}
.acc-email{font-size:0.82rem;color:#aaa;font-weight:700;}
.acc-tier{display:inline-flex;align-items:center;gap:0.3rem;background:var(--y);
  color:var(--bd);font-family:'Fredoka One',cursive;font-size:0.72rem;
  padding:0.15rem 0.65rem;border-radius:50px;border:1.5px solid var(--blk);margin-top:3px;}

.logout-card{background:var(--r);border:3px solid var(--blk);border-radius:var(--radius);
  box-shadow:var(--sh);padding:1.25rem 1.5rem;display:flex;align-items:center;gap:1rem;
  cursor:pointer;transition:all 0.12s;text-decoration:none;}
.logout-card:hover{transform:translate(-2px,-2px);box-shadow:var(--shl);}
.logout-card-ic{font-size:1.8rem;}
.logout-card-t{font-family:'Fredoka One',cursive;font-size:1.15rem;color:#fff;}
.logout-card-s{font-size:0.8rem;color:rgba(255,255,255,0.7);font-weight:700;}

/* Logout confirm modal */
.overlay{position:fixed;inset:0;background:rgba(0,0,0,0.48);z-index:500;display:none;align-items:center;justify-content:center;}
.overlay.open{display:flex;}
.modal{background:var(--cr);border:4px solid var(--blk);border-radius:22px;box-shadow:var(--shl);padding:2.25rem;max-width:400px;width:90%;text-align:center;}
.modal-ic{font-size:3.5rem;margin-bottom:0.5rem;}
.modal-t{font-family:'Boogaloo',cursive;font-size:1.9rem;color:var(--bd);margin-bottom:0.42rem;}
.modal-s{font-size:0.95rem;color:#999;font-weight:700;margin-bottom:1.5rem;line-height:1.6;}
.modal-btns{display:flex;gap:0.8rem;justify-content:center;}
.mbtn{font-family:'Fredoka One',cursive;font-size:1rem;padding:0.65rem 1.6rem;
  border-radius:13px;border:2.5px solid var(--blk);box-shadow:var(--sh);cursor:pointer;transition:transform 0.1s;}
.mbtn:active{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--blk);}
.mbtn-no{background:var(--bg);color:var(--blk);}
.mbtn-yes{background:var(--r);color:#fff;}

@media(max-width:640px){.s-desc{display:none;}}

@endsection

@section('modals')
@endsection

@section('content')

{{-- ── ACCOUNT INFO ── --}}
<div class="settings-section">
  <div style="font-family:'Fredoka One',cursive;font-size:0.82rem;letter-spacing:2.5px;text-transform:uppercase;color:var(--bd);opacity:0.75;margin-bottom:0.7rem;">
    Account Info
  </div>
  <div class="settings-group">
    <div class="account-avatar">
      <div class="acc-av">😄</div>
      <div>
        <div class="acc-name">Kevin Tan</div>
        <div class="acc-email">kevintan@email.com</div>
        <div class="acc-tier">⭐ Gold Member</div>
      </div>
    </div>
    <a href="{{ route('profile') }}" class="settings-row">
      <div class="s-ic">👤</div>
      <div class="s-body"><div class="s-label">View Full Profile</div><div class="s-desc">Edit photo, name, email and more</div></div>
      <div class="s-arrow">›</div>
    </a>
    <a href="#" class="settings-row" onclick="showEditName()">
      <div class="s-ic">✏️</div>
      <div class="s-body"><div class="s-label">Display Name</div><div class="s-desc">Kevin Tan</div></div>
      <div class="s-arrow">›</div>
    </a>
    <a href="#" class="settings-row" onclick="showEditEmail()">
      <div class="s-ic">📧</div>
      <div class="s-body"><div class="s-label">Email Address</div><div class="s-desc">kevintan@email.com</div></div>
      <div class="s-arrow">›</div>
    </a>
    <a href="#" class="settings-row" onclick="showEditPhone()">
      <div class="s-ic">📱</div>
      <div class="s-body"><div class="s-label">Phone Number</div><div class="s-desc">+60 12-345 6789</div></div>
      <div class="s-arrow">›</div>
    </a>
    <a href="#" class="settings-row">
      <div class="s-ic">🔒</div>
      <div class="s-body"><div class="s-label">Change Password</div><div class="s-desc">Last changed 30 days ago</div></div>
      <div class="s-arrow">›</div>
    </a>
  </div>
</div>

{{-- ── SETTINGS ── --}}
<div class="settings-section">
  <div style="font-family:'Fredoka One',cursive;font-size:0.82rem;letter-spacing:2.5px;text-transform:uppercase;color:var(--bd);opacity:0.75;margin-bottom:0.7rem;">
    Settings
  </div>
  <div class="settings-group">
    <a href="#" class="settings-row">
      <div class="s-ic">ℹ️</div>
      <div class="s-body"><div class="s-label">About Minion Sushi</div><div class="s-desc">Minion Sushi v2.0</div></div>
      <div class="s-arrow">›</div>
    </a>
  </div>
</div>

{{-- ── LOGOUT ── --}}
<a href="{{ route('logout') }}" class="logout-card" style="text-decoration:none;">
  <div class="logout-card-ic">↩</div>
  <div>
    <div class="logout-card-t">Log Out</div>
    <div class="logout-card-s">End your current dining session</div>
  </div>
  <div style="margin-left:auto;font-size:1.5rem;color:rgba(255,255,255,0.5);">›</div>
</a>

@endsection

@section('scripts')

function showEditName(){ alert('Display Name — Coming soon'); }
function showEditEmail(){ alert('Email Address — Coming soon'); }
function showEditPhone(){ alert('Phone Number — Coming soon'); }
@endsection