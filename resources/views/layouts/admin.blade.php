<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Minion Sushi · @yield('title', 'Home')</title>
<link href="https://fonts.googleapis.com/css2?family=Boogaloo&family=Fredoka+One&family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
<style>
:root {
  --y:#FFD700;--yl:#FFF8C0;--b:#1B6CA8;--bd:#0D3D6B;
  --o:#FF6B2B;--r:#E8352B;--cr:#FFFDF0;--blk:#1A1A1A;
  --bg:#ECEAE0;--grn:#2ECC71;--pur:#7C3AED;
  --sh:4px 4px 0 var(--blk);--shl:6px 6px 0 var(--blk);
  --radius:18px;--nav-h:90px;--sb-w:240px;--mob-nav:60px;
  --ease:.28s cubic-bezier(.4,0,.2,1);
}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;-webkit-tap-highlight-color:transparent;}
html,body{height:100%;font-family:'Nunito',sans-serif;color:var(--blk);}
body{background:var(--bg);display:flex;flex-direction:column;min-height:100vh;overflow-x:hidden;}

/* ── NAVBAR ── */
.navbar{height:var(--nav-h);background:var(--bd);border-bottom:3.5px solid var(--blk);
  display:flex;align-items:center;padding:0 1.25rem;gap:0.75rem;
  position:sticky;top:0;z-index:400;flex-shrink:0;}
.hamburger{width:36px;height:36px;background:rgba(255,255,255,0.07);
  border:2px solid rgba(255,255,255,0.13);border-radius:10px;
  display:flex;flex-direction:column;align-items:center;justify-content:center;gap:4.5px;
  cursor:pointer;flex-shrink:0;}
.hamburger span{display:block;width:16px;height:2px;background:rgba(255,255,255,0.75);border-radius:2px;}
.nav-logo{width:70px;height:70px;border-radius:50%;border:3px solid var(--blk);background:#fff;
  box-shadow:3px 3px 0 rgba(0,0,0,0.4);background:var(--y);overflow:hidden;
  display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;
  cursor:pointer;text-decoration:none;}
.nav-logo img{width:100%;height:100%;object-fit:cover;border-radius:50%;}
.nav-brand{flex:1;min-width:0;}
.nav-title{font-family:'Boogaloo',cursive;font-size:1.95rem;color:#fff;line-height:1;}
.nav-sub{font-size:0.62rem;color:rgba(255,215,0,0.65);letter-spacing:2px;text-transform:uppercase;font-weight:700;}
.nav-right{display:flex;align-items:center;gap:0.55rem;flex-shrink:0;}
.nav-table{background:var(--y);color:var(--blk);font-family:'Fredoka One',cursive;font-size:1rem;
  padding:0.35rem 1rem;border-radius:50px;border:2.5px solid var(--blk);box-shadow:var(--sh);
  display:flex;align-items:center;gap:0.35rem;cursor:pointer;transition:all 0.15s;}
.nav-table:hover{transform:translate(-2px,-2px);box-shadow:var(--shl);}
.nav-tnum{font-size:1.2rem;}
.nav-waiter{background:rgba(255,255,255,0.08);color:#fff;font-family:'Fredoka One',cursive;font-size:0.95rem;
  padding:0.35rem 1rem;border-radius:50px;border:2px solid rgba(255,255,255,0.16);
  cursor:pointer;transition:all 0.15s;display:flex;align-items:center;gap:0.35rem;text-decoration:none;}
.nav-waiter:hover{background:var(--y);color:var(--blk);border-color:var(--blk);box-shadow:var(--sh);}

/* ── SHELL ── */
.shell{flex:1;display:flex;position:relative;min-height:calc(100vh - var(--nav-h));}

/* ── SIDEBAR ── */
.sidebar{width:var(--sb-w);flex-shrink:0;overflow:hidden;
  background:var(--cr);border-right:3.5px solid var(--blk);
  position:sticky;top:var(--nav-h);height:calc(100vh - var(--nav-h));
  transition:width var(--ease),border-right-width var(--ease);}
.sidebar.collapsed{width:0;border-right-width:0;}
.sb-inner{width:var(--sb-w);min-width:var(--sb-w);padding:1.1rem 0.85rem 1.2rem;
  display:flex;flex-direction:column;gap:0.15rem;height:100%;overflow-y:auto;}
.sb-sec{font-family:'Fredoka One',cursive;font-size:0.7rem;letter-spacing:2px;text-transform:uppercase;
  color:var(--bd);opacity:0.35;padding:0.5rem 0.6rem 0.18rem;margin-top:0.25rem;}
.sb-item{display:flex;align-items:center;gap:0.6rem;padding:0.65rem 0.8rem;border-radius:12px;
  font-family:'Fredoka One',cursive;font-size:1rem;color:rgba(26,26,26,0.48);
  cursor:pointer;transition:all 0.15s;border:2px solid transparent;white-space:nowrap;text-decoration:none;}
.sb-item:hover{background:rgba(0,0,0,0.04);color:var(--blk);}
.sb-item.active{background:var(--bd);color:var(--y);border-color:var(--blk);box-shadow:var(--sh);}
.sb-ic{font-size:1.15rem;width:22px;text-align:center;flex-shrink:0;}
.sb-div{height:1.5px;background:rgba(0,0,0,0.07);margin:0.38rem 0.4rem;border-radius:2px;}
.sb-bottom{margin-top:auto;}
.sb-logout{display:flex;align-items:center;gap:0.6rem;padding:0.65rem 0.8rem;border-radius:12px;
  font-family:'Fredoka One',cursive;font-size:1rem;color:rgba(200,50,50,0.52);
  cursor:pointer;transition:all 0.15s;border:2px solid transparent;width:100%;background:transparent;text-decoration:none;}
.sb-logout:hover{background:rgba(232,53,43,0.07);color:var(--r);border-color:rgba(232,53,43,0.18);}
.sb-backdrop{position:fixed;inset:0;background:rgba(0,0,0,0.38);z-index:340;
  opacity:0;pointer-events:none;transition:opacity var(--ease);}
.sb-backdrop.show{opacity:1;pointer-events:all;}

/* ── MAIN ── */
.main{flex:1;padding:1.85rem 2.25rem;display:flex;flex-direction:column;gap:1.35rem;overflow-y:auto;min-width:0;}

/* ── TOAST ── */
.toast{position:fixed;top:76px;right:1.25rem;background:var(--grn);color:#fff;
  font-family:'Fredoka One',cursive;font-size:1.05rem;padding:0.75rem 1.4rem;
  border-radius:13px;border:3px solid var(--blk);box-shadow:var(--shl);
  opacity:0;transform:translateY(-8px);transition:all 0.28s;pointer-events:none;z-index:600;}
.toast.show{opacity:1;transform:translateY(0);}

/* ── MOBILE BOTTOM NAV ── */
.mob-nav{display:none;position:fixed;bottom:0;left:0;right:0;z-index:300;
  background:var(--bd);border-top:3.5px solid var(--blk);height:var(--mob-nav);}
.mob-nav-inner{display:flex;height:100%;}
.mn-item{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;
  gap:2px;cursor:pointer;border:none;background:transparent;transition:background 0.15s;
  text-decoration:none;}
.mn-item.active{background:rgba(255,255,255,0.07);}
.mn-icon{font-size:1.25rem;line-height:1;}
.mn-lbl{font-family:'Fredoka One',cursive;font-size:0.52rem;color:rgba(255,255,255,0.38);}
.mn-item.active .mn-lbl{color:var(--y);}

/* ── LANGUAGE MODAL ── */

/* ── PAX MODAL (new grid design) ── */
.overlay{position:fixed;inset:0;background:rgba(0,0,0,0.48);z-index:500;
  display:none;align-items:center;justify-content:center;}
.overlay.open{display:flex;}
.pax-modal{background:var(--cr);border:4px solid var(--blk);border-radius:24px;
  box-shadow:var(--shl);padding:2rem 1.75rem;max-width:380px;width:90%;text-align:center;}
.pax-modal-ic{font-size:3rem;margin-bottom:0.5rem;}
.pax-modal-t{font-family:'Boogaloo',cursive;font-size:1.9rem;color:var(--bd);margin-bottom:0.3rem;}
.pax-modal-s{font-size:0.9rem;color:#999;font-weight:700;margin-bottom:1.4rem;}
.pax-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:0.65rem;margin-bottom:1rem;}
.pax-btn{background:#fff;border:2.5px solid var(--blk);border-radius:14px;
  font-family:'Boogaloo',cursive;font-size:1.6rem;color:var(--bd);
  padding:0.75rem 0.5rem;cursor:pointer;transition:all 0.12s;box-shadow:3px 3px 0 var(--blk);}
.pax-btn:hover{transform:translate(-2px,-2px);box-shadow:5px 5px 0 var(--blk);background:var(--yl);}
.pax-btn:active{transform:translate(2px,2px);box-shadow:1px 1px 0 var(--blk);}
.pax-btn.selected{background:var(--b);color:#fff;border-color:var(--bd);}
.pax-custom{width:100%;padding:0.75rem 1rem;border:2px solid #ccc;border-radius:13px;
  font-family:'Nunito',sans-serif;font-size:1rem;color:var(--blk);background:#f9f9f9;
  margin-bottom:1.1rem;text-align:center;outline:none;transition:border-color 0.2s;}
.pax-custom:focus{border-color:var(--b);}
.pax-custom::placeholder{color:#aaa;}
.pax-confirm{width:100%;background:var(--bd);color:var(--y);font-family:'Fredoka One',cursive;
  font-size:1.1rem;padding:0.85rem;border-radius:14px;border:2.5px solid var(--blk);
  box-shadow:var(--sh);cursor:pointer;transition:all 0.12s;}
.pax-confirm:hover{transform:translate(-2px,-2px);box-shadow:var(--shl);}
.pax-confirm:active{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--blk);}

/* ── RESPONSIVE ── */
@media(max-width:960px){
  .nav-links{display:none;}
  .main{padding:1.4rem;}
}

/* Tablet — shrink navbar slightly */
@media(max-width:820px){
  .nav-waiter span { display:none; } /* hide "Call Waiter" text, keep emoji */
  .nav-waiter { padding:0.35rem 0.65rem; font-size:1.2rem; }
  .nav-title  { font-size:1.65rem; }
  .nav-sub    { display:none; }
}

/* Mobile — 700px and below */
@media(max-width:700px){
  /* Sidebar becomes overlay drawer */
  .sidebar{position:fixed;top:var(--nav-h);left:0;height:calc(100vh - var(--nav-h));z-index:350;
    box-shadow:4px 0 24px rgba(0,0,0,0.18);transition:transform var(--ease);
    width:var(--sb-w)!important;}
  .sidebar.collapsed{transform:translateX(calc(-1 * var(--sb-w)));width:var(--sb-w)!important;}

  /* Main content padding — leave room for bottom nav */
  .main{padding:0.9rem;padding-bottom:calc(var(--mob-nav) + 1rem);}

  /* Show bottom nav */
  .mob-nav{display:block;}

  /* Navbar compact */
  .navbar       { padding:0 0.85rem; gap:0.5rem; height:64px; }
  :root         { --nav-h:64px; }
  .nav-logo     { width:50px; height:50px; }
  .nav-title    { font-size:1.4rem; }
  .nav-sub      { display:none; }
  .nav-table    { font-size:0.82rem; padding:0.28rem 0.65rem; }
  .nav-table span:first-of-type { display:none; } /* hide "Table" text, keep number */
  .nav-waiter   { font-size:1.1rem; padding:0.28rem 0.55rem; }
  .nav-tnum     { font-size:1rem; }

}
@yield('extra-styles')
</style>
@yield('head-extra')
</head>
<body>

@yield('modals')

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
  <div class="hamburger" id="hamburger" onclick="toggleSidebar()">
    <span></span><span></span><span></span>
  </div>
  <a href="{{ route('home') }}" class="nav-logo">
    <img src="{{ asset('img/logo.png') }}" alt="Minion Sushi" onerror="this.style.display='none';this.parentNode.textContent='🍣'">
  </a>
  <div class="nav-brand">
    <div class="nav-title">Minion Sushi Admin System</div>
    <div class="nav-sub">Banana-Maki & More</div>
  </div>
</nav>
<div class="shell">

  <!-- SIDEBAR -->
<aside class="sidebar collapsed" id="sidebar" style="transition:none">
  <div class="sb-inner">
    <div class="sb-sec">Admin</div>
    <a href="{{ route('AdminDashboard') }}" class="sb-item {{ request()->routeIs('AdminDashboard') ? 'active' : '' }}">
      <span class="sb-ic">📊</span> Dashboard
    </a>
    <a href="{{ route('admin.customer-list') }}" class="sb-item">
      <span class="sb-ic">👥</span> Customer List
    </a>
    <a href="{{ route('admin.staff-list') }}" class="sb-item">
      <span class="sb-ic">👔</span> Staff List
    </a>
    <a href="{{ route('admin.add-drop-menu') }}" class="sb-item">
      <span class="sb-ic">🍱</span> Add/Drop Menu
    </a>
    <a href="{{ route('admin.order-log') }}" class="sb-item">
      <span class="sb-ic">🧾</span> Order Log
    </a>
    <a href="{{ route('admin.order.items') }}" class="sb-item">
      <span class="sb-ic">📋</span> Order Items
    </a>
    <div class="sb-bottom">
      <div class="sb-div"></div>
      <a href="{{ route('logout') }}" class="sb-logout"><span class="sb-ic">↩</span> Log Out</a>
    </div>
  </div>
</aside>

  <!-- MAIN CONTENT -->
  <main class="main">
    @yield('content')
  </main>

</div>

<!-- MOBILE BOTTOM NAV -->
<nav class="mob-nav">
  <div class="mob-nav-inner">
    <a href="{{ route('AdminDashboard') }}" class="mn-item {{ request()->routeIs('AdminDashboard') ? 'active' : '' }}">
      <span class="mn-icon">📊</span><span class="mn-lbl">Dashboard</span>
    </a>
    <a href="{{ route('admin.customer-list') }}" class="mn-item">
      <span class="mn-icon">👥</span><span class="mn-lbl">Customers</span>
    </a>
    <a href="{{ route('admin.staff-list') }}" class="mn-item">
      <span class="mn-icon">👔</span><span class="mn-lbl">Staff</span>
    </a>
    <a href="{{ route('admin.add-drop-menu') }}" class="mn-item">
      <span class="mn-icon">🍱</span><span class="mn-lbl">Menu</span>
    </a>
    <a href="{{ route('admin.order-log') }}" class="mn-item">
      <span class="mn-icon">🧾</span><span class="mn-lbl">Orders</span>
    </a>
    <a href="{{ route('admin.order.items') }}" class="mn-item">
      <span class="mn-icon">🧾</span><span class="mn-lbl">Items</span>
    </a>
  </div>
</nav>

<script>
const sidebar=document.getElementById('sidebar');
const backdrop=document.getElementById('sbBackdrop');
const navbar=document.getElementById('navbar');

function isMob(){return window.innerWidth<=700;}

function openSidebar(){
  isOpen=true;
  sidebar.classList.remove('collapsed');
  navbar.classList.add('sb-open');
  if(isMob()){backdrop.classList.add('show');document.body.style.overflow='hidden';}
  if(!isMob()) localStorage.setItem('sb','open');
}
function closeSidebar(){
  isOpen=false;
  sidebar.classList.add('collapsed');
  navbar.classList.remove('sb-open');
  backdrop.classList.remove('show');
  document.body.style.overflow='';
  if(!isMob()) localStorage.setItem('sb','closed');
}
function toggleSidebar(){isOpen?closeSidebar():openSidebar();}

// Sidebar starts as 'collapsed' in HTML (no flash).
// Now apply correct state instantly before re-enabling transition.
let isOpen = false;
if(!isMob()){
  const saved = localStorage.getItem('sb');
  if(saved !== 'closed'){
    // Open it instantly (transition still none from inline style)
    isOpen = true;
    sidebar.classList.remove('collapsed');
  }
}
// Re-enable transition after paint so all future open/close are animated
requestAnimationFrame(()=>{ sidebar.style.transition=''; });

window.addEventListener('resize',()=>{
  if(!isMob()&&!isOpen) openSidebar();
  if(isMob()&&isOpen) closeSidebar();
});

// ── GLOBAL LOCATION CHECK — runs once on every page load ──
//current location
const MS_LAT = 2.689443569422449;
const MS_LNG = 101.96176619595894;
const MS_RADIUS = 27000;

/*INTI
const MS_LAT = 2.8140132873590256;
const MS_LNG = 101.7582329105853;
const MS_RADIUS = 100;
window.locationAllowed = false;*/


// ── DEMO MODE — add ?demo=1 to any URL to bypass GPS (for presentations) ──
const MS_DEMO = new URLSearchParams(window.location.search).get('demo') === '1'
             || sessionStorage.getItem('ms_demo') === '1';
if(MS_DEMO) sessionStorage.setItem('ms_demo','1'); // persist across page navigations

function msGetDist(lat1,lng1,lat2,lng2){
  const R=6371000,dLat=(lat2-lat1)*Math.PI/180,dLng=(lng2-lng1)*Math.PI/180;
  const a=Math.sin(dLat/2)*Math.sin(dLat/2)+Math.cos(lat1*Math.PI/180)*Math.cos(lat2*Math.PI/180)*Math.sin(dLng/2)*Math.sin(dLng/2);
  return R*2*Math.atan2(Math.sqrt(a),Math.sqrt(1-a));
}

function msOnLocationResult(allowed){
  window.locationAllowed = allowed;
  localStorage.setItem('ms_location', allowed ? 'inside' : 'outside');
  if(typeof window.onLocationReady === 'function') window.onLocationReady(allowed);
}

// ── PAGE SCRIPTS FIRST — so onLocationReady is registered before GPS fires ──
@yield('scripts')

// ── GPS kicks off AFTER page scripts, so callback is always ready ──
if(MS_DEMO){
  msOnLocationResult(true);
} else if(navigator.geolocation){
  navigator.geolocation.getCurrentPosition(
    (pos)=>{
      const dist = msGetDist(pos.coords.latitude, pos.coords.longitude, MS_LAT, MS_LNG);
      msOnLocationResult(dist <= MS_RADIUS);
    },
    ()=>{
      navigator.geolocation.getCurrentPosition(
        (pos)=>{
          const dist = msGetDist(pos.coords.latitude, pos.coords.longitude, MS_LAT, MS_LNG);
          msOnLocationResult(dist <= MS_RADIUS);
        },
        ()=>{ msOnLocationResult(false); },
        {enableHighAccuracy:false, timeout:10000, maximumAge:60000}
      );
    },
    {enableHighAccuracy:true, timeout:8000, maximumAge:30000}
  );
} else {
  msOnLocationResult(false);
}
</script>
</body>
</html>