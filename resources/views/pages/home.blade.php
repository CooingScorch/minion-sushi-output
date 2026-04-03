@extends('layouts.app')
@section('title', 'Home')

@section('extra-styles')
/* hero styles are in layouts/app.blade.php */
.sec-lbl {
    font-family:'Fredoka One',cursive;
    font-size:0.82rem;
    letter-spacing:2.5px;
    text-transform:uppercase;
    color:var(--bd);
    opacity:0.75;
    margin-bottom:0.6rem;
}
.g2 {
    display:grid;
    grid-template-columns:5fr 6fr;
    gap:1.2rem;
    align-items:stretch;
}
.g2s {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:1rem;
}
.g-main {
    display:grid;
    grid-template-columns:1fr 340px;
    gap:1.2rem;
}
.card {
    background:#fff;
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    overflow:hidden;
    box-sizing:border-box;
}
.card-hd {
    padding:0.9rem 1.3rem;
    border-bottom:2.5px solid var(--blk);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:0.5rem;
    flex-wrap:nowrap;
}
.card-title {
    font-family:'Fredoka One',cursive;
    font-size:1.1rem;
    color:var(--bd);
    white-space:nowrap;
}
.card-sub {
    font-size:0.82rem;
    font-weight:700;
    color:#666;
    white-space:nowrap;
    text-align:right;
    flex-shrink:0;
}
.card-body {
    padding:1.25rem;
    min-height:130px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.pts-card {
    background:#FFF8C0;
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    padding:1.75rem;
    position:relative;
    overflow:hidden;
    box-sizing:border-box;
}
.pts-card::after {
    content:'⭐';
    position:absolute;
    right:-12px;
    bottom:-12px;
    font-size:7.5rem;
    opacity:0.1;
    pointer-events:none;
}
.pts-lbl {
    font-size:0.72rem;
    font-weight:900;
    text-transform:uppercase;
    letter-spacing:2px;
    opacity:0.5;
    margin-bottom:0.35rem;
}
.pts-row {
    display:flex;
    align-items:flex-end;
    gap:0.7rem;
    margin-bottom:0.4rem;
}
.pts-val {
    font-family:'Boogaloo',cursive;
    font-size:4rem;
    line-height:1;
    color:var(--bd);
}
.pts-ico {
    font-size:2.4rem;
    margin-bottom:6px;
}
.pts-sub {
    font-size:0.88rem;
    font-weight:700;
    opacity:0.58;
    margin-bottom:0.9rem;
}
.pts-track {
    background:rgba(0,0,0,0.12);
    border-radius:50px;
    height:10px;
    border:1.5px solid rgba(0,0,0,0.09);
}
.pts-fill {
    background:var(--bd);
    height:100%;
    border-radius:50px;
    width:56%;
}
.pts-range {
    display:flex;
    justify-content:space-between;
    font-size:0.72rem;
    font-weight:700;
    margin-top:6px;
    opacity:0.48;
}
.sess-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:0.75rem;
}
.sess-tile {
    background:var(--bg);
    border:1.5px solid rgba(0,0,0,0.09);
    border-radius:12px;
    padding:0.75rem 0.85rem;
    display:flex;
    align-items:center;
    gap:0.55rem;
}
.sess-tile-click {
    cursor:pointer;
    transition:all 0.12s;
}
.sess-tile-click:hover {
    border-color:var(--bd);
    background:#e8e6dc;
    transform:translate(-1px,-1px);
    box-shadow:2px 2px 0 rgba(0,0,0,0.12);
}
.sess-edit-hint {
    font-size:0.75rem;
    margin-left:auto;
    opacity:0.4;
}
.sess-ic {
    font-size:1.4rem;
}
.sess-v {
    font-family:'Boogaloo',cursive;
    font-size:1.55rem;
    color:var(--bd);
    line-height:1;
}
.sess-k {
    font-size:0.7rem;
    font-weight:900;
    text-transform:uppercase;
    letter-spacing:1px;
    color:#555;
}
.sess-status {
    display:flex;
    align-items:center;
    gap:0.38rem;
    margin-top:0.8rem;
    padding-top:0.8rem;
    border-top:1.5px dashed rgba(0,0,0,0.1);
}
.sess-st {
    font-size:0.85rem;
    font-weight:700;
    color:var(--grn);
}
.qa {
    background:#fff;
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    padding:1.4rem 1.25rem;
    display:flex;
    flex-direction:column;
    gap:0.45rem;
    cursor:pointer;
    position:relative;
    overflow:hidden;
    transition:transform 0.12s,box-shadow 0.12s;
    text-decoration:none;
}
.qa:hover {
    transform:translate(-2px,-2px);
    box-shadow:var(--shl);
}
.qa.b {
    background:var(--b);
}
.qa.o {
    background:var(--o);
}
.qa-ic {
    font-size:2.4rem;
    line-height:1;
}
.qa-t {
    font-family:'Fredoka One',cursive;
    font-size:1.25rem;
    line-height:1.1;
}
.qa.b .qa-t,.qa.o .qa-t {
    color:#fff;
}
.qa-d {
    font-size:0.8rem;
    font-weight:700;
    opacity:0.5;
    line-height:1.3;
}
.qa.b .qa-d,.qa.o .qa-d {
    color:rgba(255,255,255,0.6);
    opacity:1;
}
.qa-badge {
    position:absolute;
    top:0.65rem;
    right:0.65rem;
    background:var(--r);
    color:#fff;
    font-family:'Fredoka One',cursive;
    font-size:0.82rem;
    padding:0.15rem 0.55rem;
    border-radius:50px;
    border:2px solid var(--blk);
    box-shadow:2px 2px 0 var(--blk);
}
.op-row {
    display:flex;
    align-items:center;
    gap:0.9rem;
    padding:0.9rem 1.3rem;
    border-bottom:1.5px dashed rgba(0,0,0,0.07);
}
.op-em {
    font-size:1.7rem;
    flex-shrink:0;
}
.op-info {
    flex:1;
}
.op-n {
    font-weight:900;
    font-size:1rem;
}
.op-m {
    font-size:0.78rem;
    color:#aaa;
}
.op-q {
    background:var(--yl);
    border:2px solid var(--blk);
    border-radius:7px;
    font-family:'Fredoka One',cursive;
    font-size:0.9rem;
    padding:0.2rem 0.55rem;
    flex-shrink:0;
}
.op-p {
    font-family:'Fredoka One',cursive;
    font-size:1.05rem;
    color:var(--bd);
    min-width:65px;
    text-align:right;
    flex-shrink:0;
}
.op-foot {
    background:var(--yl);
    padding:0.9rem 1.3rem;
    border-top:2.5px solid var(--blk);
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.op-tl {
    font-weight:900;
    font-size:0.92rem;
}
.op-tv {
    font-family:'Boogaloo',cursive;
    font-size:1.7rem;
    color:var(--bd);
}
.rev-card {
    background:var(--bd);
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    padding:1.3rem;
}
.rev-hd {
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    margin-bottom:1rem;
}
.rev-hd-t {
    font-family:'Fredoka One',cursive;
    font-size:1.1rem;
    color:var(--y);
}
.rev-hd-s {
    font-size:0.7rem;
    color:rgba(255,255,255,0.28);
    font-weight:700;
    margin-top:2px;
}
.rev-bubble {
    background:rgba(255,255,255,0.07);
    border:1.5px solid rgba(255,255,255,0.1);
    border-radius:13px;
    padding:1rem 1.1rem;
    opacity:0;
    transform:translateY(14px) scale(0.96);
    transition:opacity .45s ease,transform .45s ease;
}
.rev-bubble.visible {
    opacity:1;
    transform:translateY(0) scale(1);
}
.rev-bubble.exit {
    opacity:0;
    transform:translateY(-14px) scale(0.96);
}
.rev-stars {
    font-size:1rem;
    margin-bottom:0.4rem;
}
.rev-text {
    font-size:0.95rem;
    font-weight:700;
    color:#fff;
    line-height:1.55;
    margin-bottom:0.65rem;
}
.rev-meta {
    display:flex;
    align-items:center;
    gap:0.5rem;
}
.rev-av {
    width:30px;
    height:30px;
    border-radius:50%;
    background:var(--y);
    border:2px solid rgba(255,255,255,0.25);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1rem;
    flex-shrink:0;
}
.rev-name {
    font-family:'Fredoka One',cursive;
    font-size:0.88rem;
    color:rgba(255,255,255,0.62);
}
.rev-date {
    font-size:0.7rem;
    color:rgba(255,255,255,0.26);
    font-weight:700;
    margin-left:auto;
}
.rev-dots {
    display:flex;
    justify-content:center;
    gap:0.4rem;
    margin-top:0.9rem;
}
.rev-dot {
    width:6px;
    height:6px;
    border-radius:50%;
    background:rgba(255,255,255,0.2);
    transition:all 0.3s;
}
.rev-dot.active {
    background:var(--y);
    transform:scale(1.4);
}
.rev-nav {
    display:flex;
    align-items:center;
    justify-content:center;
    gap:0.75rem;
    margin-top:0.9rem;
}
.rev-arr {
    background:rgba(255,255,255,0.15);
    border:2.5px solid rgba(255,255,255,0.4);
    color:#fff;
    font-size:1.8rem;
    line-height:1;
    width:42px;
    height:42px;
    border-radius:50%;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:all 0.15s;
}
.rev-arr:hover {
    background:var(--y);
    color:var(--blk);
    border-color:var(--blk);
    box-shadow:3px 3px 0 var(--blk);
}
/* ── RESPONSIVE ─────────────────────────────────────────── */

/* Tablet landscape — sidebar still visible */
@media(max-width:1150px){
  .g-main { grid-template-columns:1fr; }
}

/* Tablet portrait — start collapsing */
@media(max-width:900px){
  .g2 { grid-template-columns:1fr; }
  .pts-card { min-height:unset; }
}

/* Mobile — 700px and below (matches app.blade sidebar breakpoint) */
@media(max-width:700px){

  /* ── Header welcome strip ── */
  .home-header {
    padding:1rem 1.1rem;
    gap:0.6rem;
  }
  .home-header .nav-title,
  [style*="font-size:2.4rem"] {
    font-size:1.75rem !important;
  }

  /* ── Grid layouts ── */
  .g2  { grid-template-columns:1fr; gap:0.85rem; }
  .g2s { grid-template-columns:1fr 1fr; gap:0.65rem; }
  .g-main { grid-template-columns:1fr; }
  .sess-grid { grid-template-columns:1fr; gap:0.55rem; }

  /* ── Points card ── */
  .pts-card { padding:1.1rem 1.1rem; }
  .pts-val  { font-size:2.6rem; }

  /* ── Session card ── */
  .card-body { padding:1rem; }
  .card-hd   { padding:0.75rem 1rem; }
  .card-title{ font-size:0.95rem; }
  .card-sub  { font-size:0.72rem; }
  .sess-tile { padding:0.65rem 0.7rem; min-height:unset; }
  .sess-v    { font-size:1.4rem; }

  /* ── Dine-in banner ── */
  .dine-in-banner {
    padding:1rem 1rem;
    gap:0.65rem;
    min-height:100px !important;
  }
  .dine-in-ic    { font-size:2.2rem; }
  .dine-in-t     { font-size:1.3rem !important; }
  .dine-in-s     { font-size:0.92rem !important; }

  /* ── Table legend — wrap into 2 rows ── */
  .tbl-legend {
    flex-wrap:wrap;
    gap:0.5rem 0.85rem;
    padding:0.5rem 0.75rem;
  }
  .tbl-leg-item { font-size:0.75rem; }

  /* ── Quick action cards ── */
  .qa { padding:1rem 0.9rem; min-height:unset; }
  .qa-ic { font-size:1.5rem; }
  .qa-t  { font-size:0.95rem; }
  .qa-d  { font-size:0.72rem; }

  /* ── Order rows ── */
  .op-row { padding:0.7rem 1rem; gap:0.6rem; }
  .op-em  { font-size:1.3rem; }
  .op-n   { font-size:0.9rem; }
  .op-m   { font-size:0.72rem; }
  .op-p   { font-size:0.95rem; min-width:unset; }

  /* ── Reviews ── */
  .rev-card { padding:1.1rem; }
  .rev-text { font-size:0.88rem; }

  /* ── Table modal — true fullscreen on mobile ── */
  /* Make the overlay itself fixed+full, then modal fills it */
  #tableOverlay {
    position:fixed !important;
    inset:0 !important;
    width:100vw !important;
    height:100dvh !important;
    align-items:stretch !important;
    justify-content:stretch !important;
    padding:0 !important;
    z-index:650 !important;
  }
  .tbl-modal {
    position:static !important;
    inset:auto !important;
    width:100% !important;
    max-width:100% !important;
    height:100% !important;
    max-height:100% !important;
    border-radius:0 !important;
    border:none !important;
    padding:0.75rem 0.6rem !important;
    overflow-y:auto !important;
    flex:1 !important;
  }
  .tbl-header { margin-bottom:0.5rem !important; }
  .tbl-header-t { font-size:1.6rem !important; }
  .tbl-header-ic { font-size:2rem !important; }
  .tbl-header-s { font-size:0.88rem !important; }
  .tbl-legend { gap:0.4rem 0.7rem !important; padding:0.4rem 0.6rem !important; margin-bottom:0.6rem !important; }
  .tbl-leg-item { font-size:0.82rem !important; }
  .tbl-leg-dot { width:11px !important; height:11px !important; }
  .tbl-floor { margin-bottom:0.4rem !important; }
  .tbl-swipe-overlay {
    display:flex !important;
    position:fixed;
    inset:0;
    z-index:700;
    background:rgba(0,0,0,0.60);
    align-items:center;
    justify-content:center;
    cursor:pointer;
    touch-action:none;
  }
  .tbl-swipe-inner {
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:0.5rem;
  }
  .tbl-swipe-arrows {
    font-size:2.8rem;
    color:#fff;
    letter-spacing:0.3rem;
    animation: swipeBounce 1s ease-in-out infinite alternate;
  }
  .tbl-swipe-msg {
    font-family:'Fredoka One',cursive;
    font-size:1.4rem;
    color:#fff;
    letter-spacing:0.05rem;
  }
  @keyframes swipeBounce {
    from { transform:translateX(-8px); }
    to   { transform:translateX(8px); }
  }

  .tbl-floorplan { width:100% !important; border-width:2px !important; }
  .tbl-floorplan {
    overflow-x:auto !important;
    overflow-y:hidden !important;
    -webkit-overflow-scrolling:touch !important;
  }
  #restaurantSVG {
    width:560px !important;
    min-width:560px !important;
    height:auto !important;
    display:block !important;
  }

  /* ── Pax modal ── */
  .pax-modal { padding:1.5rem 1.25rem; }
  .pax-grid  { grid-template-columns:repeat(4,1fr); gap:0.5rem; }
  .pax-btn   { font-size:1.4rem; padding:0.6rem 0.4rem; }

  /* ── Sec labels ── */
  .sec-lbl { font-size:0.62rem; }
}

/* Small phones — 400px and below */
@media(max-width:400px){
  .g2s { grid-template-columns:1fr 1fr; }
  .qa-d { display:none; }
  .pax-grid { grid-template-columns:repeat(4,1fr); gap:0.4rem; }
  .pax-btn  { font-size:1.2rem; padding:0.5rem 0.3rem; }
}
.dine-in-banner {
    display:flex;
    align-items:center;
    gap:1.1rem;
    background:var(--y);
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    padding:1.4rem 1.4rem;
    cursor:pointer;
    transition:all 0.15s;
    position:relative;
    overflow:visible;
    min-height:90px;
}
.dine-in-banner::after {
    content:'🍣';
    position:absolute;
    right:4px;
    bottom:4px;
    font-size:4rem;
    opacity:0.12;
    pointer-events:none;
}
.dine-in-banner:hover {
    transform:translate(-2px,-2px);
    box-shadow:var(--shl);
}
.dine-in-banner.dine-in-active {
    background:#e8f8ef;
    cursor:pointer;
    min-height:120px;
}
.dine-in-banner.dine-in-active:hover {
    transform:translate(-2px,-2px);
    box-shadow:var(--shl);
}
/* Shared text styles — same font for both bars */
.dine-in-ic {
    font-size:3.5rem;
    line-height:1;
    flex-shrink:0;
    animation: wobble 1.6s ease-in-out infinite;
    transform-origin: bottom center;
}
.dine-in-banner.dine-in-active .dine-in-ic {
    animation: none;
}
.dine-in-text {
    flex:1;
    min-width:0;
    overflow:hidden;
}
.dine-in-t {
    font-family:'Nunito',sans-serif;
    font-weight:900;
    font-size:1.9rem;
    color:var(--bd);
    line-height:1.2;
}
.dine-in-s {
    font-family:'Nunito',sans-serif;
    font-weight:800;
    font-size:1.15rem;
    color:rgba(13,61,107,0.75);
    margin-top:8px;
}
.dine-in-arrow { display:none; }
.dine-in-banner:not(.dine-in-active) { min-height:120px; }
.wave-emoji {
    display:inline-block;
    animation: wave 1.8s ease-in-out infinite;
    transform-origin: 70% 80%;
}
@keyframes wave {
    0%,100% { transform: rotate(0deg); }
    15%     { transform: rotate(20deg); }
    30%     { transform: rotate(-10deg); }
    45%     { transform: rotate(18deg); }
    60%     { transform: rotate(-8deg); }
    75%     { transform: rotate(12deg); }
    90%     { transform: rotate(0deg); }
}
@keyframes wobble {
    0%,100% { transform: rotate(0deg); }
    20%     { transform: rotate(-18deg); }
    40%     { transform: rotate(14deg); }
    60%     { transform: rotate(-10deg); }
    80%     { transform: rotate(6deg); }
}
.drool-emoji {
    display:inline-block;
    animation: drool 2s ease-in-out infinite;
}
@keyframes drool {
    0%,100% { transform: rotate(0deg) scale(1); }
    25%     { transform: rotate(-15deg) scale(1.2); }
    50%     { transform: rotate(10deg) scale(1.15); }
    75%     { transform: rotate(-8deg) scale(1.1); }
}
.pax-cancel {
    width:100%;
    margin-top:0.5rem;
    background:transparent;
    color:#aaa;
    font-family:'Fredoka One',cursive;
    font-size:0.95rem;
    border:none;
    cursor:pointer;
    padding:0.5rem;
    transition:color 0.15s;
}
.pax-cancel:hover {
    color:var(--r);
}
@endsection

@section('modals')
{{-- LANGUAGE SELECTION MODAL --}}

{{-- PAX MODAL --}}
<div class="overlay" id="paxOverlay" style="z-index:600;pointer-events:none;">
  <div class="pax-modal">
    <div class="pax-modal-ic">👥</div>
    <div class="pax-modal-t">How many guests?</div>
    <div class="pax-modal-s">Select the number of people dining today</div>
    <div class="pax-grid">
      @foreach([1,2,3,4,5,6,7,8] as $n)
      <button class="pax-btn {{ session('pax', 2) == $n ? 'selected' : '' }}"
              onclick="selectPax({{ $n }})">{{ $n }}</button>
      @endforeach
    </div>
    <input type="number" class="pax-custom" id="paxCustom" min="1" max="50"
           placeholder="Or enter custom number..."
           oninput="onCustomPax(this.value)">
    <button class="pax-confirm" onclick="confirmPax()">Confirm 🍣</button>
    <button class="pax-cancel" onclick="cancelDineIn()">Cancel</button>
  </div>
</div>

{{-- TABLE SELECTION MODAL --}}
{{-- 放在 home.blade.php 的 @section('modals') 里，替换原来的 tableOverlay --}}

<div class="overlay" id="tableOverlay" style="z-index:610;pointer-events:none;">
  <div class="tbl-modal">

    <button onclick="goBackToPax()" class="tbl-back-btn" style="display:none;">← Back</button>

    <div class="tbl-header">
      <div class="tbl-header-ic">🪑</div>
      <div style="flex:1;">
        <div class="tbl-header-t">Choose Your Table</div>
        <div class="tbl-header-s">
          You have <strong id="tblPaxCount" style="color:#0D3D6B;">2</strong> guests — pick any available table
        </div>
      </div>
    </div>

    <div class="tbl-legend">
      <div class="tbl-leg-item"><span class="tbl-leg-dot" style="background:var(--grn);"></span> Available</div>
      <div class="tbl-leg-item"><span class="tbl-leg-dot" style="background:#e8352b;"></span> Occupied</div>
      <div class="tbl-leg-item"><span class="tbl-leg-dot" style="background:var(--y);"></span> Selected</div>
      <div class="tbl-leg-item"><span class="tbl-leg-dot" style="background:#f3f0ff;border:2px dashed #7c3aed;animation:recommendPulse 1s ease-in-out infinite alternate;"></span> Recommended</div>
      <div class="tbl-leg-item"><span class="tbl-leg-dot" style="background:#ccc;"></span> Not suitable</div>
    </div>

    <div id="recommendBanner" style="display:none;">
      <div class="rec-popup">
        <div class="rec-popup-emoji">⭐</div>
        <div class="rec-popup-body">
          <div class="rec-popup-label" id="recBannerLabel">We recommend</div>
          <div class="rec-popup-table" id="recBannerTable"></div>
          <div class="rec-popup-hint" id="recBannerHint">Tap the highlighted table to select</div>
        </div>
        <button class="rec-popup-close" onclick="hideRecommendBanner()">✕</button>
      </div>
    </div>

    <div id="tblSwipeHint" class="tbl-swipe-overlay">
      <div class="tbl-swipe-inner">
        <div class="tbl-swipe-arrows">←  →</div>
        <div class="tbl-swipe-msg">Tap anywhere to start</div>
      </div>
    </div>

    <div class="tbl-floor" id="tblFloorDiv">
      <div class="tbl-floorplan">
        <svg id="restaurantSVG" viewBox="0 0 560 574" xmlns="http://www.w3.org/2000/svg"
             style="width:100%;height:auto;display:block;">

          <rect width="560" height="574" fill="#f4efe6" rx="12"/>

          <!-- Kitchen -->
          <rect x="208" y="0" width="144" height="34" rx="5" fill="#e0d9cc" stroke="#aaa" stroke-width="2"/>
          <text x="280" y="23" text-anchor="middle" font-family="Fredoka One,cursive" font-size="17" fill="#666">&#127859; Kitchen</text>

          <!-- Left wall bench -->
          <rect x="4" y="38" width="12" height="524" rx="4" fill="#a0722a" stroke="#7a5a1a" stroke-width="2"/>
          <!-- Right wall bench -->
          <rect x="544" y="38" width="12" height="524" rx="4" fill="#a0722a" stroke="#7a5a1a" stroke-width="2"/>

          <!-- U-Belt outer -->
          <path d="M214,34 L214,426 Q214,466 252,466 L308,466 Q346,466 346,426 L346,34"
                fill="none" stroke="#999" stroke-width="14" stroke-linecap="round"/>
          <!-- U-Belt inner -->
          <path d="M230,34 L230,424 Q230,450 252,450 L308,450 Q330,450 330,424 L330,34"
                fill="none" stroke="#999" stroke-width="14" stroke-linecap="round"/>
          <!-- Belt fill -->
          <path d="M214,34 L214,426 Q214,466 252,466 L308,466 Q346,466 346,426 L346,34
                   L330,34 L330,424 Q330,450 308,450 L252,450 Q230,450 230,424 L230,34 Z"
                fill="#cdc7ba"/>
          <!-- Belt dashes -->
          <line x1="222" y1="34" x2="222" y2="426" stroke="#b8b2a6" stroke-width="1.5" stroke-dasharray="7,7"/>
          <line x1="338" y1="34" x2="338" y2="426" stroke="#b8b2a6" stroke-width="1.5" stroke-dasharray="7,7"/>
          <!-- Belt text -->
          <text x="280" y="98" text-anchor="middle" font-size="16" fill="#b8b2a6">&#8595;</text>
          <text x="280" y="223" text-anchor="middle" font-family="Fredoka One,cursive" font-size="12" fill="#c2bcb0" letter-spacing="2">BELT</text>
          <text x="280" y="358" text-anchor="middle" font-size="16" fill="#b8b2a6">&#8595;</text>
          <text x="280" y="448" text-anchor="middle" font-size="18" fill="#b8b2a6">&#8634;</text>

          <!-- LEFT BENCH T1-T4 -->
                    <g id="tspot-1" class="tbl-svg-node" onclick="selectTable(1)"
             data-cap="2" data-min="1" data-max="2" data-status="{{ in_array(1, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="20" y="70" width="62" height="46" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="84" y="86" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="51" y="88" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T1</text>
            <text x="51" y="104" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">2 pax</text>
          </g>
                    <g id="tspot-2" class="tbl-svg-node" onclick="selectTable(2)"
             data-cap="2" data-min="1" data-max="2" data-status="{{ in_array(2, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="20" y="200" width="62" height="46" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="84" y="216" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="51" y="218" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T2</text>
            <text x="51" y="234" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">2 pax</text>
          </g>
                    <g id="tspot-3" class="tbl-svg-node" onclick="selectTable(3)"
             data-cap="4" data-min="1" data-max="4" data-status="{{ in_array(3, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="20" y="320" width="62" height="66" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="84" y="331" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/><rect x="84" y="354" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="51" y="348" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T3</text>
            <text x="51" y="364" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">4 pax</text>
          </g>
                    <g id="tspot-4" class="tbl-svg-node" onclick="selectTable(4)"
             data-cap="6" data-min="1" data-max="6" data-status="{{ in_array(4, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="20" y="438" width="62" height="86" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="84" y="447" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/><rect x="84" y="470" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/><rect x="84" y="493" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="51" y="476" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T4</text>
            <text x="51" y="492" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">6 pax</text>
          </g>

          <!-- BOOTHS LEFT T5-T7 -->
                    <g id="tspot-5" class="tbl-svg-node" onclick="selectTable(5)"
             data-cap="6" data-min="2" data-max="6" data-status="{{ in_array(5, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="150" y="48" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="154" y="51" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <rect x="153" y="71" width="58" height="44" rx="4" class="tbl-table-rect" fill="#e8d5a3" stroke="#a0845c" stroke-width="2.5"/>
            <rect x="150" y="120" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="154" y="123" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <text x="182" y="88" text-anchor="middle" font-family="Fredoka One,cursive" font-size="15" fill="#0D3D6B">T5</text>
            <text x="182" y="103" text-anchor="middle" font-family="Nunito,sans-serif" font-size="10" font-weight="800" fill="#7a6040">6 pax</text>
          </g>
                    <g id="tspot-6" class="tbl-svg-node" onclick="selectTable(6)"
             data-cap="6" data-min="2" data-max="6" data-status="{{ in_array(6, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="150" y="178" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="154" y="181" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <rect x="153" y="201" width="58" height="44" rx="4" class="tbl-table-rect" fill="#e8d5a3" stroke="#a0845c" stroke-width="2.5"/>
            <rect x="150" y="250" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="154" y="253" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <text x="182" y="218" text-anchor="middle" font-family="Fredoka One,cursive" font-size="15" fill="#0D3D6B">T6</text>
            <text x="182" y="233" text-anchor="middle" font-family="Nunito,sans-serif" font-size="10" font-weight="800" fill="#7a6040">6 pax</text>
          </g>
                    <g id="tspot-7" class="tbl-svg-node" onclick="selectTable(7)"
             data-cap="6" data-min="2" data-max="6" data-status="{{ in_array(7, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="150" y="308" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="154" y="311" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <rect x="153" y="331" width="58" height="44" rx="4" class="tbl-table-rect" fill="#e8d5a3" stroke="#a0845c" stroke-width="2.5"/>
            <rect x="150" y="380" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="154" y="383" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <text x="182" y="348" text-anchor="middle" font-family="Fredoka One,cursive" font-size="15" fill="#0D3D6B">T7</text>
            <text x="182" y="363" text-anchor="middle" font-family="Nunito,sans-serif" font-size="10" font-weight="800" fill="#7a6040">6 pax</text>
          </g>

          <!-- BOOTHS RIGHT T8-T10 -->
                    <g id="tspot-8" class="tbl-svg-node" onclick="selectTable(8)"
             data-cap="6" data-min="2" data-max="6" data-status="{{ in_array(8, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="346" y="48" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="350" y="51" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <rect x="349" y="71" width="58" height="44" rx="4" class="tbl-table-rect" fill="#e8d5a3" stroke="#a0845c" stroke-width="2.5"/>
            <rect x="346" y="120" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="350" y="123" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <text x="378" y="88" text-anchor="middle" font-family="Fredoka One,cursive" font-size="15" fill="#0D3D6B">T8</text>
            <text x="378" y="103" text-anchor="middle" font-family="Nunito,sans-serif" font-size="10" font-weight="800" fill="#7a6040">6 pax</text>
          </g>
                    <g id="tspot-9" class="tbl-svg-node" onclick="selectTable(9)"
             data-cap="6" data-min="2" data-max="6" data-status="{{ in_array(9, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="346" y="178" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="350" y="181" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <rect x="349" y="201" width="58" height="44" rx="4" class="tbl-table-rect" fill="#e8d5a3" stroke="#a0845c" stroke-width="2.5"/>
            <rect x="346" y="250" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="350" y="253" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <text x="378" y="218" text-anchor="middle" font-family="Fredoka One,cursive" font-size="15" fill="#0D3D6B">T9</text>
            <text x="378" y="233" text-anchor="middle" font-family="Nunito,sans-serif" font-size="10" font-weight="800" fill="#7a6040">6 pax</text>
          </g>
                    <g id="tspot-10" class="tbl-svg-node" onclick="selectTable(10)"
             data-cap="6" data-min="2" data-max="6" data-status="{{ in_array(10, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="346" y="308" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="350" y="311" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <rect x="349" y="331" width="58" height="44" rx="4" class="tbl-table-rect" fill="#e8d5a3" stroke="#a0845c" stroke-width="2.5"/>
            <rect x="346" y="380" width="64" height="18" rx="5" class="sofa-rect" fill="#b87333" stroke="#8b5a2b" stroke-width="2"/>
            <rect x="350" y="383" width="56" height="13" rx="3" fill="#d4905a" stroke="none" opacity="0.5"/>
            <text x="378" y="348" text-anchor="middle" font-family="Fredoka One,cursive" font-size="15" fill="#0D3D6B">T10</text>
            <text x="378" y="363" text-anchor="middle" font-family="Nunito,sans-serif" font-size="10" font-weight="800" fill="#7a6040">6 pax</text>
          </g>

          <!-- RIGHT BENCH T11-T14 -->
                    <g id="tspot-11" class="tbl-svg-node" onclick="selectTable(11)"
             data-cap="2" data-min="1" data-max="2" data-status="{{ in_array(11, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="474" y="70" width="62" height="46" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="458" y="86" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="505" y="88" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T11</text>
            <text x="505" y="104" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">2 pax</text>
          </g>
                    <g id="tspot-12" class="tbl-svg-node" onclick="selectTable(12)"
             data-cap="2" data-min="1" data-max="2" data-status="{{ in_array(12, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="474" y="200" width="62" height="46" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="458" y="216" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="505" y="218" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T12</text>
            <text x="505" y="234" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">2 pax</text>
          </g>
                    <g id="tspot-13" class="tbl-svg-node" onclick="selectTable(13)"
             data-cap="4" data-min="1" data-max="4" data-status="{{ in_array(13, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="474" y="320" width="62" height="66" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="458" y="331" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/><rect x="458" y="354" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="505" y="348" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T13</text>
            <text x="505" y="364" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">4 pax</text>
          </g>
                    <g id="tspot-14" class="tbl-svg-node" onclick="selectTable(14)"
             data-cap="6" data-min="1" data-max="6" data-status="{{ in_array(14, $occupiedTables ?? []) ? 'occupied' : 'available' }}">
            <rect x="474" y="438" width="62" height="86" rx="4" class="tbl-table-rect" fill="#fff" stroke="#ccc" stroke-width="2.5"/>
            <rect x="458" y="447" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/><rect x="458" y="470" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/><rect x="458" y="493" width="15" height="14" rx="3" class="chair-rect" fill="#b0c4de" stroke="#8a9bb0" stroke-width="1.2"/>
            <text x="505" y="476" text-anchor="middle" font-family="Fredoka One,cursive" font-size="16" fill="#0D3D6B">T14</text>
            <text x="505" y="492" text-anchor="middle" font-family="Nunito,sans-serif" font-size="11" font-weight="800" fill="#999">6 pax</text>
          </g>

          <!-- Entrance -->
          <text x="280" y="566" text-anchor="middle" font-family="Fredoka One,cursive" font-size="13" fill="#c4beb2">&#8212; entrance &#8212;</text>

        </svg>
      </div>
    </div>{{-- end tbl-floor --}}













    <div id="mergeBanner" style="display:none;background:#f3f0ff;border:1.5px solid var(--pur);border-radius:10px;padding:0.6rem 0.9rem;font-size:0.85rem;color:#5b21b6;margin-bottom:0.5rem;font-family:'Fredoka One',cursive;text-align:center;"></div>
    <div id="waiterNeededBanner" style="display:none;background:#fef9ec;border:1.5px solid #f59e0b;border-radius:10px;padding:0.7rem 0.9rem;font-size:0.88rem;color:#92400e;margin-bottom:0.5rem;font-family:'Fredoka One',cursive;text-align:center;">
      🙋 Your group is too large for available tables — please ask our staff to assist you!
    </div>
    <div id="tblWarningBanner" style="display:none;" class="tbl-warn-banner">
      ⚠️ <span id="tblWarningMsg"></span>
    </div>

    <button class="pax-confirm" id="tblConfirmBtn" onclick="confirmTableSelection()" disabled
      style="opacity:0.4;cursor:not-allowed;">
      Confirm Table 🪑
    </button>
    <button class="pax-cancel" onclick="cancelDineIn()">Cancel</button>

  </div>
</div>

{{-- ── TABLE MODAL STYLES ── --}}
<style>
.tbl-modal{
  background:linear-gradient(135deg, #fff9c4 0%, #ffd6e7 33%, #c9e8ff 66%, #e8d5ff 100%);
  background-size:300% 300%;
  animation:gradientShift 8s ease infinite;
  border:4px solid var(--blk);border-radius:24px;
  box-shadow:var(--shl);padding:2rem 1.75rem;
  max-width:820px;width:98%;max-height:93vh;overflow-y:auto;
}
@keyframes gradientShift {
  0%   { background-position: 0% 50%; }
  50%  { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
.tbl-header{display:flex;align-items:center;gap:1rem;margin-bottom:1.1rem;}
.tbl-header-ic{font-size:3.2rem;line-height:1;}
.tbl-header-t{font-family:'Boogaloo',cursive;font-size:2.6rem;color:var(--bd);line-height:1;}
.tbl-header-s{font-size:1.05rem;font-weight:700;color:#666;margin-top:4px;}
.tbl-back-btn{
  display:inline-flex;align-items:center;gap:0.3rem;
  margin-bottom:0.75rem;
  background:#fff;border:2px solid var(--blk);border-radius:8px;
  font-family:'Fredoka One',cursive;font-size:0.95rem;color:var(--bd);
  padding:0.35rem 0.85rem;cursor:pointer;
  box-shadow:2px 2px 0 var(--blk);transition:all 0.12s;
}
.tbl-back-btn:hover{transform:translate(-1px,-1px);box-shadow:3px 3px 0 var(--blk);background:var(--yl);}
.tbl-legend{display:flex;flex-wrap:wrap;gap:1rem 1.5rem;margin-bottom:1.2rem;padding:0.75rem 1.1rem;
  background:rgba(0,0,0,0.04);border-radius:12px;border:1.5px solid rgba(0,0,0,0.07);}
.tbl-leg-item{display:flex;align-items:center;gap:0.5rem;font-family:'Fredoka One',cursive;font-size:1.05rem;color:#444;}
.tbl-leg-dot{width:15px;height:15px;border-radius:50%;border:2px solid rgba(0,0,0,0.2);flex-shrink:0;}
.tbl-floor{margin-bottom:1rem;}
.tbl-swipe-overlay{display:none;}

.tbl-floorplan{ border-radius:14px; overflow:hidden; border:3px solid var(--blk); box-shadow:5px 5px 0 var(--blk); }

/* SVG table node states — target inner table rect */
.tbl-svg-node { cursor:pointer; transition:opacity 0.15s; }
.tbl-svg-node:hover rect.tbl-table-rect { stroke-width:3; }
.tbl-svg-node[data-status="available"] rect.tbl-table-rect { stroke:#22c55e; }
.tbl-svg-node[data-status="available"] text { fill-opacity:1; }
.tbl-svg-node[data-status="occupied"] { opacity:0.45; cursor:not-allowed; pointer-events:none; }
.tbl-svg-node[data-status="occupied"] rect.tbl-table-rect { stroke:#e8352b; fill:#fff5f5; }
.tbl-svg-node[data-status="toosmall"] { opacity:0.25; cursor:not-allowed; pointer-events:none; }
.tbl-svg-node[data-status="selected"] rect.tbl-table-rect { stroke:#f59e0b; stroke-width:3; fill:#fef3c7; }
.tbl-svg-node[data-status="recommended"] rect.tbl-table-rect { stroke:#7c3aed; stroke-width:3.5; stroke-dasharray:5,3; fill:#f3f0ff; animation:recommendPulse 1s ease-in-out infinite alternate; }
.tbl-svg-node[data-status="available"] .chair-rect { fill:#b0c4de; }
.tbl-svg-node[data-status="selected"] .chair-rect { fill:#fcd34d; }
.tbl-svg-node[data-status="recommended"] .chair-rect { fill:#c4b5fd; animation:recommendPulse 1s ease-in-out infinite alternate; }
.tbl-svg-node[data-status="occupied"] .chair-rect { fill:#fca5a5; }
.tbl-svg-node[data-status="recommended"] { filter:drop-shadow(0 0 6px rgba(124,58,237,0.6)); animation:recommendScale 1s ease-in-out infinite alternate; }
@keyframes recommendPulse {
  from { opacity:0.65; }
  to   { opacity:1; }
}
@keyframes recommendScale {
  from { transform:scale(1);    filter:drop-shadow(0 0 4px rgba(124,58,237,0.4)); }
  to   { transform:scale(1.04); filter:drop-shadow(0 0 10px rgba(124,58,237,0.75)); }
}

/* Table spot card — legacy, replaced by tbl-node */



/* tbl-cap-badge legacy — replaced by tbl-node-cap */

/* Warning banner */
.tbl-warn-banner{
  background:#fff3cd;border:2px solid #f0ad4e;border-radius:12px;
  padding:0.65rem 1rem;margin-bottom:0.85rem;
  font-family:'Fredoka One',cursive;font-size:0.9rem;color:#856404;
}
#recommendBanner{
  margin-bottom:0.6rem;
}
.rec-popup{
  display:flex;align-items:center;gap:0.75rem;
  background:linear-gradient(135deg,#fffbeb,#fef3c7);
  border:3px solid #f59e0b;border-radius:20px;
  padding:0.9rem 1.1rem;
  box-shadow:0 6px 24px rgba(245,158,11,0.3), 0 2px 8px rgba(0,0,0,0.08);
  animation: recFloat 2s ease-in-out infinite;
  position:relative;
  transition: background 0.3s, border-color 0.3s, box-shadow 0.3s;
}
.rec-popup.rec-state-recommend{
  background:linear-gradient(135deg,#f5f3ff,#ede9fe);
  border-color:#7c3aed;
  box-shadow:0 6px 24px rgba(124,58,237,0.25), 0 2px 8px rgba(0,0,0,0.08);
  animation: recFloatPurple 2s ease-in-out infinite;
}
.rec-popup.rec-state-recommend .rec-popup-label{ color:#5b21b6; }
.rec-popup.rec-state-recommend .rec-popup-table{ color:#6d28d9; }
.rec-popup.rec-state-recommend .rec-popup-hint{ color:#7c3aed; }
.rec-popup.rec-state-recommend .rec-popup-close{ color:#7c3aed; }
@keyframes recFloatPurple{
  0%,100%{ transform:translateY(0);    box-shadow:0 6px 24px rgba(124,58,237,0.25); }
  50%    { transform:translateY(-6px); box-shadow:0 12px 30px rgba(124,58,237,0.35); }
}
.rec-popup-emoji{
  font-size:2rem;flex-shrink:0;
  animation: recSpin 4s ease-in-out infinite;
}
.rec-popup-body{
  flex:1;
}
.rec-popup-label{
  font-family:'Fredoka One',cursive;
  font-size:0.8rem;color:#92400e;letter-spacing:0.05rem;text-transform:uppercase;
  margin-bottom:0.1rem;
}
.rec-popup-table{
  font-family:'Fredoka One',cursive;
  font-size:1.6rem;color:#b45309;line-height:1;
  letter-spacing:0.03rem;
}
.rec-popup-hint{
  font-family:'Nunito',sans-serif;
  font-size:0.72rem;color:#a16207;margin-top:0.2rem;
}
.rec-popup-close{
  position:absolute;top:0.4rem;right:0.5rem;
  background:none;border:none;font-size:0.85rem;
  color:#a16207;cursor:pointer;padding:0.1rem 0.3rem;opacity:0.6;
}
.rec-popup-close:hover{opacity:1;}
@keyframes recFloat{
  0%,100%{ transform:translateY(0);    box-shadow:0 6px 24px rgba(245,158,11,0.3); }
  50%    { transform:translateY(-6px); box-shadow:0 12px 30px rgba(245,158,11,0.4); }
}
@keyframes recSpin{
  0%,100%{ transform:rotate(0deg) scale(1); }
  25%    { transform:rotate(-15deg) scale(1.1); }
  75%    { transform:rotate(15deg) scale(1.1); }
}
</style>

{{-- ── TABLE MODAL SCRIPT ── --}}
<script>
// Overlay helpers — hidden overlays must NOT intercept clicks
function dismissSwipeHint(){
  const h=document.getElementById('tblSwipeHint');
  if(!h) return;
  h.style.display='none';
  h.style.pointerEvents='none';
  h.style.zIndex='-1';
}
document.addEventListener('DOMContentLoaded',()=>{
  const h=document.getElementById('tblSwipeHint');
  if(h){
    h.addEventListener('click', dismissSwipeHint);
    h.addEventListener('touchend', function(e){ e.preventDefault(); dismissSwipeHint(); }, {passive:false});
  }
});
function showOverlay(id){
  const el=document.getElementById(id);
  if(!el) return;
  el.style.display='flex';
  el.style.pointerEvents='auto';
  if(id==='tableOverlay'){
    requestAnimationFrame(()=>{
      const svg=document.getElementById('restaurantSVG');
      if(!svg) return;
      svg.setAttribute('viewBox','0 0 560 574');
      // Show swipe hint on mobile, reset each time modal opens
      if(window.innerWidth<=700){
        const h=document.getElementById('tblSwipeHint');
        if(h){ h.style.display='flex'; h.style.pointerEvents='auto'; }
      }
    });
  }
}
function hideOverlay(id){
  const el=document.getElementById(id);
  if(!el) return;
  el.style.display='none';
  el.style.pointerEvents='none';
}

// [min, max] pax per table
const TABLE_RANGE = {
  1:[1,2],  2:[1,2],  3:[3,4],  4:[4,6],   // left bench (combinable)
  5:[2,6],  6:[2,6],  7:[2,6],              // sofa left of belt
  8:[2,6],  9:[2,6],  10:[2,6],             // sofa right of belt
  11:[1,2], 12:[1,2], 13:[3,4], 14:[4,6],  // right bench (combinable)
};
// Adjacent tables that can be merged
const NEIGHBORS = {
  1:[2], 2:[1,3], 3:[2,4], 4:[3],
  5:[6], 6:[5,7], 7:[6],
  8:[9], 9:[8,10], 10:[9],
  11:[12], 12:[11,13], 13:[12,14], 14:[13],
};

// Occupied tables from server (PHP-populated, excludes own tables)
const OCCUPIED_TABLES = new Set({{ json_encode($occupiedTables ?? []) }});

// My own tables from server (for pre-selecting on page load)
const MY_TABLES = {{ json_encode($mySession ? $mySession->all_tables : []) }};
const MY_PRIMARY = {{ $mySession ? $mySession->primary_table : 'null' }};

document.addEventListener('DOMContentLoaded', ()=>{
  // Lock tiles only when table is fully confirmed (not just pax)
  if({{ session('table_set') ? 'true' : 'false' }}) lockTiles();
});

let selectedTableNum = MY_PRIMARY;
let selectedTables   = MY_TABLES.length ? MY_TABLES : [];
let mergeMode        = false;

function openTableModal(){
  if(!selectedPax||selectedPax<1){ alert('Please select number of guests first!'); return; }
  const pc = document.getElementById('tblPaxCount');
  if(pc) pc.textContent = selectedPax;
  mergeMode=false; selectedTables=[];
  hideWaiterNeeded();
  hideRecommendBanner();

  // Fetch latest occupied tables from server before showing modal
  fetch('/api/occupied-tables')
    .then(r=>r.json())
    .then(data=>{
      OCCUPIED_TABLES.clear();
      (data.occupied||[]).forEach(n=>OCCUPIED_TABLES.add(n));
      // Refresh each spot's status
      document.querySelectorAll('.tbl-svg-node').forEach(s=>{
        const n=parseInt(s.id.replace('tspot-',''));
        // MY_TABLES only applies if we still have an active session
        const isMyTable = selectedTableNum && MY_TABLES.includes(n);
        if(!isMyTable){
          s.dataset.status = OCCUPIED_TABLES.has(n) ? 'occupied' : 'available';
        }
      });
      applySpotStates(); updateTblConfirmBtn(); updateMergeBanner();
      showOverlay('tableOverlay');
    })
    .catch(()=>{
      applySpotStates(); updateTblConfirmBtn(); updateMergeBanner();
      showOverlay('tableOverlay');
    });
}

function applySVGState(el, status){
  const tableRect = el.querySelector('rect.tbl-table-rect') || el.querySelectorAll('rect')[2];
  const chairRects = el.querySelectorAll('rect.chair-rect');
  const sofaRects = el.querySelectorAll('rect.sofa-rect');
  const texts = el.querySelectorAll('text');

  const states = {
    available:   { stroke:'#22c55e', fill:'#ffffff', chair:'#b0c4de', textFill:'#0D3D6B', opacity:'1' },
    occupied:    { stroke:'#e8352b', fill:'#fff5f5', chair:'#fca5a5', textFill:'#e8352b', opacity:'0.45' },
    toosmall:    { stroke:'#ccc',    fill:'#f5f5f5', chair:'#ddd',    textFill:'#aaa',    opacity:'0.25' },
    selected:    { stroke:'#f59e0b', fill:'#fef3c7', chair:'#fcd34d', textFill:'#0D3D6B', opacity:'1' },
    recommended: { stroke:'#7c3aed', fill:'#f3f0ff', chair:'#c4b5fd', textFill:'#5b21b6', opacity:'1' },
  };
  const s = states[status] || states.available;
  el.style.opacity = s.opacity;
  el.style.pointerEvents = (status==='occupied'||status==='toosmall') ? 'none' : 'auto';
  el.style.cursor = (status==='occupied'||status==='toosmall') ? 'not-allowed' : 'pointer';
  if(tableRect){ tableRect.setAttribute('stroke', s.stroke); tableRect.setAttribute('fill', s.fill); tableRect.setAttribute('stroke-width', (status==='selected'||status==='recommended') ? '3' : '2'); }
  chairRects.forEach(r=>r.setAttribute('fill', s.chair));
  texts.forEach(t=>{ if(t.getAttribute('font-size')==='11'||t.getAttribute('font-size')==='10') t.setAttribute('fill', s.textFill); });
}

function applySpotStates(){
  const pax = selectedPax;
  const usedMax = selectedTables.reduce((s,t)=>s+(TABLE_RANGE[t]||[0,0])[1],0);
  const neighborSet = new Set();
  selectedTables.forEach(t=>(NEIGHBORS[t]||[]).forEach(n=>neighborSet.add(n)));

  document.querySelectorAll('.tbl-svg-node,.tbl-node').forEach(s=>{
    const n = parseInt(s.id.replace('tspot-',''));
    let status;
    if(OCCUPIED_TABLES.has(n))          status = 'occupied';
    else if(selectedTables.includes(n)) status = 'selected';
    else {
      if(mergeMode){
        const usedMax = selectedTables.reduce((s,t)=>s+(TABLE_RANGE[t]||[0,0])[1],0);
        // Already enough seats — lock everything else out
        if(usedMax >= selectedPax){ status = 'toosmall'; }
        else {
          const candidate = [...selectedTables, n];
          const isAdjacent = selectedTables.some(t=>(NEIGHBORS[t]||[]).includes(n));
          if(!isAdjacent || !isMergeAllowed(candidate)){ status = 'toosmall'; }
          else {
            // Only light up this table if adding it doesn't overshoot MORE than
            // any other adjacent option (prefer least-waste neighbour)
            const adjAvailable = Object.keys(TABLE_RANGE).map(Number).filter(nb=>{
              if(selectedTables.includes(nb) || OCCUPIED_TABLES.has(nb)) return false;
              const adjEl=document.getElementById('tspot-'+nb);
              if(!adjEl) return false;
              const isAdj2=selectedTables.some(t=>(NEIGHBORS[t]||[]).includes(nb));
              return isAdj2 && isMergeAllowed([...selectedTables,nb]);
            });
            const minWaste = Math.min(...adjAvailable.map(nb=>(TABLE_RANGE[nb]||[0,0])[1]));
            const nMax = (TABLE_RANGE[n]||[0,0])[1];
            // Show table if it ties for least waste
            status = nMax <= minWaste ? 'available' : 'toosmall';
          }
        }
      } else {
        status = 'available';
      }
    }
    s.dataset.status = status;
    if(s.classList.contains('tbl-svg-node')) applySVGState(s, status);
  });

  // Recommendation logic (only before any selection)
  if(!mergeMode && !selectedTables.length){
    // Find ALL single tables that fit pax exactly (same min cap tier)
    const allFit = Object.entries(TABLE_RANGE)
      .filter(([n,[mn,mx]])=>{
        const s = document.getElementById('tspot-'+n);
        return s && s.dataset.status==='available' && pax>=mn && pax<=mx;
      })
      .sort(([,[,a]],[,[,b]])=>a-b); // ascending max cap

    if(allFit.length){
      // Recommend ALL tables with the same (smallest fitting) max cap
      const bestMax = parseInt(allFit[0][1][1]);
      const bestGroup = allFit.filter(([,[,mx]])=>mx===bestMax).map(([n])=>parseInt(n));
      bestGroup.forEach(n=>{
        const s = document.getElementById('tspot-'+n);
        if(s){ s.dataset.status='recommended'; if(s.classList.contains('tbl-svg-node')) applySVGState(s,'recommended'); }
      });
      showRecommendBanner(bestGroup);
    } else if(pax > 18){
      showWaiterNeeded();
    } else {
      // No single table — find best merge combos
      const allMerges = findAllBestMerges(pax);
      if(allMerges.length){
        const flatTables = [...new Set(allMerges.flat())];
        flatTables.forEach(n=>{
          const s = document.getElementById('tspot-'+n);
          if(s){ s.dataset.status='recommended'; if(s.classList.contains('tbl-svg-node')) applySVGState(s,'recommended'); }
        });
        showRecommendBanner(allMerges[0]); // show one combo in banner
      } else {
        showWaiterNeeded();
      }
    }
  }

  // Neighbor connection lines
  document.querySelectorAll('.nb-line').forEach(l=>l.classList.remove('nb-active'));
  if(selectedTables.length===1){
    const t = selectedTables[0];
    (NEIGHBORS[t]||[]).forEach(nb=>{
      const key = [Math.min(t,nb),Math.max(t,nb)].join('-');
      const line = document.getElementById('nb-'+key);
      if(line) line.classList.add('nb-active');
    });
  }
}

// ── MERGE RULES ──────────────────────────────────────────────────────────
// Pure sofa left  (T5-T7):  max 18 pax (3 booths)
// Pure sofa right (T8-T10): max 18 pax (3 booths)
// Pure bench left  (T1-T4):  max 14 pax (chairs movable)
// Pure bench right (T11-T14): max 14 pax
// Sofa + bench:  only T1/T2/T11/T12 (2pax) or T3/T13 (4pax) — NOT T4/T14 (6pax, blocks aisle)
// Cross-belt (left sofa + right sofa): NOT allowed
// ─────────────────────────────────────────────────────────────────────────
const SOFA_LEFT   = [5,6,7];
const SOFA_RIGHT  = [8,9,10];
const BENCH_LEFT  = [1,2,3,4];
const BENCH_RIGHT = [11,12,13,14];
const BENCH_SOFA_ALLOWED = [1,2,3,11,12,13]; // max 4pax bench tables only

function getZone(n){
  if(SOFA_LEFT.includes(n))   return 'sofa_left';
  if(SOFA_RIGHT.includes(n))  return 'sofa_right';
  if(BENCH_LEFT.includes(n))  return 'bench_left';
  if(BENCH_RIGHT.includes(n)) return 'bench_right';
  return 'unknown';
}

function isMergeAllowed(tables){
  const zones = [...new Set(tables.map(getZone))];
  if(zones.length === 1) return true; // pure same zone always ok

  // Mixed zone: sofa + bench allowed only for small bench tables
  const hasSofa  = zones.some(z=>z==='sofa_left'||z==='sofa_right');
  const hasBench = zones.some(z=>z==='bench_left'||z==='bench_right');
  if(hasSofa && hasBench){
    // All bench tables in combo must be ≤4pax
    const benchTables = tables.filter(n=>BENCH_LEFT.includes(n)||BENCH_RIGHT.includes(n));
    if(!benchTables.every(n=>BENCH_SOFA_ALLOWED.includes(n))) return false;
    // Sofa and bench must be on same side (left or right)
    const sofaZones  = tables.filter(n=>SOFA_LEFT.includes(n)||SOFA_RIGHT.includes(n)).map(getZone);
    const benchZones = tables.filter(n=>BENCH_LEFT.includes(n)||BENCH_RIGHT.includes(n)).map(getZone);
    const sofaSide  = sofaZones[0]==='sofa_left'  ? 'left' : 'right';
    const benchSide = benchZones[0]==='bench_left' ? 'left' : 'right';
    return sofaSide === benchSide;
  }
  return false; // cross-belt or other combos not allowed
}

function mergeCapForZone(zone){
  if(zone==='sofa_left'||zone==='sofa_right') return 18;
  return 14; // bench zones
}

function findBestMerge(pax){
  const available = n => !OCCUPIED_TABLES.has(n) &&
    (()=>{ const s=document.getElementById('tspot-'+n); return s&&s.dataset.status!=='occupied'; })();

  const allTables = [1,2,3,4,5,6,7,8,9,10,11,12,13,14].filter(available);
  const candidates = [];

  // Generate all contiguous chains via BFS from each starting table
  function getCombos(start, maxLen){
    const results = [];
    const queue = [[start]];
    while(queue.length){
      const chain = queue.shift();
      if(chain.length > 1) results.push(chain);
      if(chain.length >= maxLen) continue;
      const last = chain[chain.length-1];
      for(const nb of (NEIGHBORS[last]||[])){
        if(!chain.includes(nb) && allTables.includes(nb)){
          const next = [...chain, nb];
          if(isMergeAllowed(next)) queue.push(next);
        }
      }
    }
    return results;
  }

  for(const t of allTables){
    for(const combo of getCombos(t, 4)){
      const total = combo.reduce((s,n)=>(TABLE_RANGE[n]||[0,0])[1]+s, 0);
      if(total >= pax && isMergeAllowed(combo)){
        candidates.push({ tables: combo, total });
      }
    }
  }

  if(!candidates.length) return null;
  // Remove duplicates (same set of tables)
  const seen = new Set();
  const unique = candidates.filter(c=>{
    const key = [...c.tables].sort().join(',');
    if(seen.has(key)) return false;
    seen.add(key); return true;
  });
  unique.sort((a,b)=>a.total-b.total); // least waste
  return unique[0].tables;
}

// Return ALL merge combos with the least-waste total (so we can highlight all)
function findAllBestMerges(pax){
  if(pax > 18) return [];
  const available = n => !OCCUPIED_TABLES.has(n);
  const allTables = [1,2,3,4,5,6,7,8,9,10,11,12,13,14].filter(available);
  const candidates = [];

  function getCombos(start, maxLen){
    const results = [];
    const queue = [[start]];
    while(queue.length){
      const chain = queue.shift();
      if(chain.length > 1) results.push(chain);
      if(chain.length >= maxLen) continue;
      const last = chain[chain.length-1];
      for(const nb of (NEIGHBORS[last]||[])){
        if(!chain.includes(nb) && allTables.includes(nb)){
          const next = [...chain, nb];
          if(isMergeAllowed(next)) queue.push(next);
        }
      }
    }
    return results;
  }

  for(const t of allTables){
    for(const combo of getCombos(t, 4)){
      const total = combo.reduce((s,n)=>(TABLE_RANGE[n]||[0,0])[1]+s, 0);
      if(total >= pax && isMergeAllowed(combo)) candidates.push({ tables:combo, total });
    }
  }

  const seen = new Set();
  const unique = candidates.filter(c=>{
    const key = [...c.tables].sort().join(',');
    if(seen.has(key)) return false;
    seen.add(key); return true;
  });
  unique.sort((a,b)=>a.total-b.total);
  if(!unique.length) return [];
  const bestTotal = unique[0].total;
  return unique.filter(c=>c.total===bestTotal).map(c=>c.tables);
}


function selectTable(n){
  const spot=document.getElementById('tspot-'+n);
  if(!spot) return;
  const st=spot.dataset.status;
  if(st==='occupied'||st==='toosmall') return;
  hideWaiterNeeded();

  if(mergeMode){
    if(selectedTables.includes(n)){
      // Deselect this table
      selectedTables.splice(selectedTables.indexOf(n),1);
      // If all deselected, exit merge mode
      if(!selectedTables.length){ mergeMode=false; }
    } else {
      selectedTables.push(n);
    }
    applySpotStates(); updateTblConfirmBtn(); updateMergeBanner();
    if(selectedTables.length) showSelectedBanner(selectedTables);
    else hideRecommendBanner();
    return;
  }

  // Normal mode: toggle selection
  if(selectedTables.length===1 && selectedTables[0]===n){
    // Tap same table again = deselect
    selectedTables=[];
    hideRecommendBanner();
    applySpotStates(); updateTblConfirmBtn();
    return;
  }

  selectedTables=[n]; 
  const [mn,mx]=TABLE_RANGE[n]||[1,6];
  if(selectedPax>mx){
    // Auto-enter merge mode — no need for an extra "join tables?" popup
    mergeMode=true;
    applySpotStates(); updateTblConfirmBtn(); updateMergeBanner();
    showSelectedBanner([n]);
  } else {
    applySpotStates();
    showSelectedBanner([n]);
    updateTblConfirmBtn();
  }
}

function startMergeMode(){
  mergeMode=true; applySpotStates(); updateTblConfirmBtn(); updateMergeBanner();
  hideOverlay('mergeAskOverlay'); showOverlay('tableOverlay');
}
function cancelMergeAsk(){
  selectedTables=[]; mergeMode=false; applySpotStates(); updateTblConfirmBtn();
  hideOverlay('mergeAskOverlay'); showOverlay('tableOverlay');
}

function showRecommendBanner(tables){
  const b = document.getElementById('recommendBanner');
  const popup = b ? b.querySelector('.rec-popup') : null;
  const lbl = document.getElementById('recBannerLabel');
  const t = document.getElementById('recBannerTable');
  const h = document.getElementById('recBannerHint');
  if(!b||!t) return;
  if(popup){ popup.classList.add('rec-state-recommend'); }
  if(lbl) lbl.textContent = 'We recommend';
  const sorted = [...tables].sort((a,b)=>a-b);
  if(sorted.length === 1){
    t.textContent = 'T' + sorted[0];
    if(h) h.textContent = 'Tap the highlighted table to select';
  } else if(sorted.every((n,i)=>i===0||n===sorted[i-1]+1) && sorted.length > 1){
    t.textContent = sorted.map(n=>'T'+n).join(' + ');
    if(h) h.textContent = 'Tap highlighted tables to merge seats';
  } else {
    t.textContent = sorted.map(n=>'T'+n).join('  ·  ');
    if(h) h.textContent = 'Any of these tables fit your group — pick your favourite!';
  }
  b.style.display = 'block';
}
function hideRecommendBanner(){
  const b = document.getElementById('recommendBanner');
  if(b) b.style.display = 'none';
}

function showSelectedBanner(tables){
  const b = document.getElementById('recommendBanner');
  const popup = b ? b.querySelector('.rec-popup') : null;
  const label = document.getElementById('recBannerLabel');
  const t = document.getElementById('recBannerTable');
  const h = document.getElementById('recBannerHint');
  if(!b||!t) return;
  if(popup){ popup.classList.remove('rec-state-recommend'); }
  if(label) label.textContent = 'You selected';
  const sorted = [...tables].sort((a,c)=>a-c);
  t.textContent = sorted.map(n=>'T'+n).join(' + ');
  if(h) h.textContent = sorted.length > 1 ? 'Tables merged — tap Confirm to proceed' : 'Tap Confirm Table to proceed';
  b.style.display = 'block';
}

function showWaiterNeeded(){
  const b = document.getElementById('waiterNeededBanner');
  if(b) b.style.display='block';
}
function hideWaiterNeeded(){
  const b = document.getElementById('waiterNeededBanner');
  if(b) b.style.display='none';
}

function updateMergeBanner(){
  const b=document.getElementById('mergeBanner'); if(!b) return;
  if(mergeMode){
    const used=selectedTables.reduce((s,t)=>s+(TABLE_RANGE[t]||[0,0])[1],0), rem=selectedPax-used;
    b.style.display='block';
    if(rem>0){
      b.textContent=`🪑 ${used}/${selectedPax} pax — tap a nearby table to add ${rem} more seat${rem>1?'s':''}`;
    } else {
      b.textContent=`✅ ${used} seats for ${selectedPax} guests — ready to confirm!`;
    }
  } else { b.style.display='none'; }
}

function updateTblConfirmBtn(){
  const btn=document.getElementById('tblConfirmBtn'), warn=document.getElementById('tblWarningBanner');
  warn.style.display='none';
  if(!selectedTables.length){btn.disabled=true;btn.style.opacity='0.4';btn.style.cursor='not-allowed';btn.textContent='Confirm Table 🪑';return;}
  const total=selectedTables.reduce((s,t)=>s+(TABLE_RANGE[t]||[0,0])[1],0);
  if(total<selectedPax){btn.disabled=true;btn.style.opacity='0.4';btn.style.cursor='not-allowed';btn.textContent='Add more tables to fit your party';return;}
  btn.disabled=false;btn.style.opacity='1';btn.style.cursor='pointer';
  const sorted=[...selectedTables].sort((a,b)=>a-b);
  btn.textContent=sorted.length>1?'Confirm Tables '+sorted.map(n=>'T'+n).join('+')+' 🪑':'Confirm Table T'+sorted[0]+' 🪑';
}

function confirmTableSelection(){
  if(!selectedTables.length) return;
  const sorted=[...selectedTables].sort((a,b)=>a-b);
  if(sorted.length>1){
    document.getElementById('mergeMsg').textContent='You selected '+sorted.map(n=>'Table '+n).join(' + ')+'. Which table is your order number?';
    const btns=document.getElementById('mergePrimaryBtns'); btns.innerHTML='';
    sorted.forEach(n=>{const b=document.createElement('button');b.textContent='Table '+n;
      b.style.cssText="flex:1;padding:0.75rem 1rem;background:#0D3D6B;color:#FFD700;font-family:'Fredoka One',cursive;font-size:1rem;border:2.5px solid #1A1A1A;border-radius:14px;cursor:pointer;";
      b.onclick=()=>saveTables(sorted,n);btns.appendChild(b);});
    hideOverlay('tableOverlay'); showOverlay('mergeConfirmOverlay');
  } else { saveTables(sorted,sorted[0]); }
}

function saveTables(allTables,primary){
  selectedTableNum=primary;
  fetch('/api/table',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
    body:JSON.stringify({table:primary,all_tables:allTables})
  }).then(()=>{ hideOverlay('tableOverlay'); hideOverlay('mergeConfirmOverlay');
    document.getElementById('cancelSessionBtn').style.visibility='visible';
    lockTiles(); syncDisplay(); });
}

function lockTiles(){
  ['guestTile','tableTile'].forEach(id=>{
    const el=document.getElementById(id); if(!el) return;
    el.classList.remove('sess-tile-click'); el.onclick=null; el.style.cursor='default';
    const h=el.querySelector('.sess-edit-hint'); if(h) h.style.display='none';
  });
}
function unlockTiles(){
  const map={guestTile:onGuestTileClick,tableTile:onTableTileClick};
  Object.entries(map).forEach(([id,fn])=>{ const el=document.getElementById(id); if(!el) return;
    el.classList.add('sess-tile-click'); el.onclick=fn; el.style.cursor='pointer';
    const h=el.querySelector('.sess-edit-hint'); if(h) h.style.display=''; });
}

function promptCancelSession(){ showOverlay('cancelConfirmOverlay'); }
function cancelSessionNo(){ hideOverlay('cancelConfirmOverlay'); }
function cancelSessionYes(){
  Promise.all([
    fetch('{{ route("pax.clear") }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},body:JSON.stringify({})}),
    fetch('{{ route("table.clear") }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},body:JSON.stringify({})})
  ]).then(()=>{
    selectedPax=0; selectedTableNum=null; selectedTables=[]; mergeMode=false;
    hideOverlay('cancelConfirmOverlay');
    document.getElementById('cancelSessionBtn').style.visibility='hidden';
    unlockTiles(); syncDisplay();
  });
}
function clearGuests(){
  fetch('{{ route("pax.clear") }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},body:JSON.stringify({})})
  .then(()=>{ selectedPax=0; syncDisplay(); });
}
function clearTable(){
  fetch('{{ route("table.clear") }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},body:JSON.stringify({})})
  .then(()=>{
    selectedTableNum=null;
    selectedTables=[];
    mergeMode=false;
    unlockTiles();
    syncDisplay();
  });
}
</script>

{{-- TABLE CAPACITY WARNING MODAL --}}
{{-- MERGE ASK MODAL --}}
<div class="overlay" id="mergeAskOverlay" style="z-index:625;pointer-events:none;">
  <div class="pax-modal" style="max-width:400px;text-align:center;">
    <div class="pax-modal-ic">🪑</div>
    <div class="pax-modal-t">Table Too Small</div>
    <div class="pax-modal-s" id="mergeAskMsg"></div>
    <div style="display:flex;gap:0.75rem;margin-top:1.25rem;">
      <button onclick="cancelMergeAsk()"
        style="flex:1;padding:0.85rem;background:#fff;color:#0D3D6B;font-family:'Fredoka One',cursive;
               font-size:1rem;border:2.5px solid #1A1A1A;border-radius:14px;cursor:pointer;box-shadow:3px 3px 0 #1A1A1A;">
        ← Pick another table
      </button>
      <button onclick="startMergeMode()"
        style="flex:1;padding:0.85rem;background:#0D3D6B;color:#FFD700;font-family:'Fredoka One',cursive;
               font-size:1rem;border:2.5px solid #1A1A1A;border-radius:14px;cursor:pointer;box-shadow:3px 3px 0 #1A1A1A;">
        Yes, join tables →
      </button>
    </div>
  </div>
</div>

{{-- MERGE CONFIRM MODAL --}}
<div class="overlay" id="mergeConfirmOverlay" style="z-index:620;pointer-events:none;">
  <div class="pax-modal" style="max-width:400px;text-align:center;">
    <div class="pax-modal-ic">🪑🪑</div>
    <div class="pax-modal-t">Joining Tables</div>
    <div class="pax-modal-s" id="mergeMsg"></div>
    <div id="mergePrimaryBtns" style="display:flex;gap:0.65rem;justify-content:center;margin:1rem 0;flex-wrap:wrap;"></div>
    <button onclick="hideOverlay('mergeConfirmOverlay');showOverlay('tableOverlay');"
      style="width:100%;padding:0.75rem;background:transparent;color:#aaa;font-family:'Fredoka One',cursive;font-size:0.95rem;border:none;cursor:pointer;">
      ← Back to table selection
    </button>
  </div>
</div>

{{-- CANCEL SESSION MODAL --}}
<div class="overlay" id="cancelConfirmOverlay" style="z-index:630;pointer-events:none;">
  <div class="pax-modal" style="max-width:380px;text-align:center;">
    <div class="pax-modal-ic">❓</div>
    <div class="pax-modal-t">Cancel Session?</div>
    <div class="pax-modal-s">This will clear your guests and table. Are you sure?</div>
    <div style="display:flex;gap:0.75rem;margin-top:1.25rem;">
      <button onclick="cancelSessionNo()"
        style="flex:1;padding:0.85rem;background:#fff;color:#0D3D6B;font-family:'Fredoka One',cursive;
               font-size:1rem;border:2.5px solid #1A1A1A;border-radius:14px;cursor:pointer;box-shadow:3px 3px 0 #1A1A1A;">
        No, keep it
      </button>
      <button onclick="cancelSessionYes()"
        style="flex:1;padding:0.85rem;background:#E8352B;color:#fff;font-family:'Fredoka One',cursive;
               font-size:1rem;border:2.5px solid #1A1A1A;border-radius:14px;cursor:pointer;box-shadow:3px 3px 0 #1A1A1A;">
        Yes, cancel
      </button>
    </div>
  </div>
</div>
@endsection

@section('content')

{{-- Hero --}}
<div style="padding:1.4rem 1.75rem; display:flex; align-items:center; gap:1.25rem; width:100%; box-sizing:border-box;">
  <div class="hero-av" style="width:76px;height:76px;border-radius:50%;border:3.5px solid #1A1A1A;background:#FFD700;display:flex;align-items:center;justify-content:center;font-size:2.5rem;flex-shrink:0;">😄</div>
  {{-- Welcome back (hidden)
  <div style="flex:1;min-width:0;">
    <div style="font-family:'Fredoka One',cursive;font-size:1.1rem;color:rgba(255,255,255,0.6);">Welcome back,</div>
    <div style="font-family:'Boogaloo',cursive;font-size:2.4rem;color:#FFD700;line-height:1.05;">Kevin Tan <span class="wave-emoji">👋</span></div>
    <div style="font-size:0.78rem;color:rgba(255,255,255,0.35);letter-spacing:1px;text-transform:uppercase;margin-top:3px;">Member since Jan 2024 · Gold Tier 🥇</div>
  </div>
  --}}
  <div class="card" style="flex:1;">
    <div class="card-hd">
      <div class="card-title">🪑 Your Session</div>
    </div>
    <div class="card-body">
      <div class="sess-grid">
        <div class="sess-tile sess-tile-click" id="guestTile" onclick="onGuestTileClick()" title="Change guests">
          <span class="sess-ic">👥</span>
          <div>
            <div class="sess-v" id="guestCount">{{ session('pax', '—') }}</div>
            <div class="sess-k">Guests</div>
          </div>
          <span class="sess-edit-hint">✏️</span>
        </div>
        <div class="sess-tile sess-tile-click" id="tableTile" onclick="onTableTileClick()" title="Change table">
          <span class="sess-ic">🪑</span>
          <div>
            <div class="sess-v" id="tableDisplay">{{ session('table', '—') }}</div>
            <div class="sess-k">Table</div>
          </div>
          <span class="sess-edit-hint">✏️</span>
        </div>
      </div>
      <div style="margin-top:0.65rem;">
        <button onclick="promptCancelSession()" id="cancelSessionBtn" style="{{ (session('pax_set') || session('table_set')) ? '' : 'visibility:hidden;' }};width:100%;background:transparent;border:1.5px solid rgba(0,0,0,0.12);border-radius:8px;font-family:'Fredoka One',cursive;font-size:0.78rem;color:#aaa;padding:0.35rem 0.5rem;cursor:pointer;transition:all 0.12s;" onmouseover="this.style.background='#fde8e8';this.style.color='#e8352b';this.style.borderColor='#e8352b'" onmouseout="this.style.background='transparent';this.style.color='#aaa';this.style.borderColor='rgba(0,0,0,0.12)'">✕ Cancel Session</button>
      </div>
    </div>
  </div>
</div>

{{-- Points (hidden)
<div class="pts-card">
  <div class="pts-lbl">Your Points Balance</div>
  <div class="pts-row"><div class="pts-ico">⭐</div><div class="pts-val">1,280</div></div>
  <div class="pts-sub">720 more points to reach Platinum 💎</div>
  <div class="pts-track"><div class="pts-fill"></div></div>
  <div class="pts-range"><span>Gold · 1,000</span><span>Platinum · 2,000</span></div>
</div>
--}}

{{-- Dine In CTA --}}
@if(!session('pax_set'))
<div onclick="startDineIn()" class="dine-in-banner" id="dineInBar">
  <div class="dine-in-ic">🍽️</div>
  <div class="dine-in-text">
    <div class="dine-in-t">Ready to Eat? <span class="drool-emoji">🤤</span></div>
    <div class="dine-in-s">👥 Guests &nbsp;·&nbsp; 🪑 Table</div>
  </div>
</div>
@else
<div onclick="promptCancelSession()" class="dine-in-banner dine-in-active" id="dineInBar" style="cursor:pointer;">
  <div class="dine-in-ic">✅</div>
  <div class="dine-in-text">
    <div class="dine-in-t" style="color:#166534;">Dining In</div>
    <div class="dine-in-s" style="color:#166534;opacity:0.8;">👥 {{ session('pax', '—') }} Guests &nbsp;·&nbsp; 🪑 Table {{ session('table', '—') }}</div>
    <div class="dine-in-s" style="color:#166534;opacity:0.5;margin-top:2px;">Tap to cancel session</div>
  </div>
</div>
@endif

{{-- Quick Actions --}}
<div>
  <div class="sec-lbl">Quick Actions</div>
  <div class="g2s">
    <a href="{{ route('menu') }}" class="qa b"><div class="qa-ic">🍱</div><div class="qa-t">View Menu</div><div class="qa-d">Browse & add to order</div></a>
    <a href="{{ route('cart') }}" class="qa o"><div class="qa-ic">🛒</div><div class="qa-t">My Cart</div><div class="qa-d">Add Items To Your Cart Now!</div></a>
  </div>
</div>

{{-- Order + Reviews --}}
<div class="g-main">
  
  <div>
    <div class="sec-lbl">Customer Reviews</div>
    <div class="rev-card">
      <div class="rev-hd"><div><div class="rev-hd-t">💬 Customer Reviews</div><div class="rev-hd-s">Real reviews · live feed</div></div></div>
      <div class="rev-bubble" id="revBubble">
        <div class="rev-stars" id="revStars"></div>
        <div class="rev-text" id="revText">Loading…</div>
        <div class="rev-meta">
          <div class="rev-av" id="revEmoji"></div>
          <div class="rev-name" id="revName"></div>
          <div class="rev-date" id="revDate"></div>
        </div>
      </div>
      <div class="rev-nav">
        <button class="rev-arr" onclick="revPrev()">&#8249;</button>
        <div class="rev-dots" id="revDots"></div>
        <button class="rev-arr" onclick="revNext()">&#8250;</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
// ── PAX ──
let selectedPax = {{ session('pax', 0) }};

// Call syncDisplay on load so bar always matches session state
document.addEventListener('DOMContentLoaded', syncDisplay);

// Real-time polling: refresh occupied tables every 5s when modal is open
let _pollTimer = null;
function startPolling(){
  if(_pollTimer) return;
  _pollTimer = setInterval(()=>{
    const overlay = document.getElementById('tableOverlay');
    if(!overlay || overlay.style.display==='none') return;
    fetch('/api/occupied-tables')
      .then(r=>r.json())
      .then(data=>{
        const newOccupied = new Set(data.occupied||[]);
        // Check if anything changed
        const changed = [...newOccupied].some(n=>!OCCUPIED_TABLES.has(n)) ||
                        [...OCCUPIED_TABLES].some(n=>!newOccupied.has(n));
        if(changed){
          OCCUPIED_TABLES.clear();
          newOccupied.forEach(n=>OCCUPIED_TABLES.add(n));

          // If any of our currently selected tables got stolen, remove them
          const stolen = selectedTables.filter(n=>OCCUPIED_TABLES.has(n));
          if(stolen.length){
            selectedTables = selectedTables.filter(n=>!OCCUPIED_TABLES.has(n));
            if(!selectedTables.length){ mergeMode=false; }
            // Show a brief warning
            const mb = document.getElementById('mergeBanner');
            if(mb){
              mb.style.display='block';
              mb.style.background='#fee2e2';
              mb.style.color='#b91c1c';
              mb.textContent=`⚠️ T${stolen.join(', T')} just got taken — please select another table`;
              setTimeout(()=>{
                mb.style.background='';
                mb.style.color='';
                updateMergeBanner();
              }, 3000);
            }
          }

          document.querySelectorAll('.tbl-svg-node').forEach(s=>{
            const n = parseInt(s.id.replace('tspot-',''));
            if(!isNaN(n) && !MY_TABLES.includes(n)){
              s.dataset.status = OCCUPIED_TABLES.has(n) ? 'occupied' : 'available';
            }
          });
          applySpotStates();
          // Re-sync confirm button in case selected tables changed
          if(mergeMode) updateTblConfirmBtn();
        }
      }).catch(()=>{});
  }, 2000);
}
startPolling();
// Force reload if browser serves cached page (e.g. after logout + back button)
window.addEventListener('pageshow', function(e){
  if(e.persisted) window.location.reload();
});

// ── Single source of truth: sync all 3 displays from selectedPax / selectedTableNum ──
function syncDisplay(){
  // 1. Your Session tiles
  const gEl = document.getElementById('guestCount');
  const tEl = document.getElementById('tableDisplay');
  if(gEl) gEl.textContent = selectedPax || '—';
  if(tEl) tEl.textContent = selectedTableNum || '—';

  // 2. Header nav table number
  const navT = document.querySelector('.nav-tnum');
  if(navT) navT.textContent = selectedTableNum || '—';

  // 3. Dine-in bar
  const bar = document.getElementById('dineInBar');
  if(!bar) return;
  const hasPax   = selectedPax && selectedPax > 0;
  const hasTable = selectedTableNum && selectedTableNum > 0;
  if(hasPax || hasTable){
    bar.className = 'dine-in-banner dine-in-active';
    bar.onclick = promptCancelSession;
    bar.style.cursor='pointer';
    bar.innerHTML = `
      <div class="dine-in-ic">✅</div>
      <div class="dine-in-text">
        <div class="dine-in-t" style="color:#166534;">Dining In</div>
        <div class="dine-in-s" style="color:#166534;opacity:0.8;">👥 ${hasPax ? selectedPax : '—'} ${T.guests} &nbsp;·&nbsp; 🪑 ${T.table} ${hasTable ? selectedTableNum : '—'}</div>
        <div class="dine-in-s" style="color:#166534;opacity:0.5;margin-top:2px;">Tap to cancel session</div>
      </div>`;
  } else {
    bar.className = 'dine-in-banner';
    bar.onclick = startDineIn;
    bar.style.cursor='pointer';
    bar.innerHTML = `
      <div class="dine-in-ic">🍽️</div>
      <div class="dine-in-text">
        <div class="dine-in-t">Ready to Eat? <span class="drool-emoji">🤤</span></div>
        <div class="dine-in-s">👥 Guests &nbsp;·&nbsp; 🪑 Table</div>
      </div>`;
  }
}

let paxFromDineIn = false;

function checkLocationThen(callback){
  if(MS_DEMO || window.locationAllowed === true){ callback(); return; }
  if(window.locationAllowed === false){ showNotAtRestaurant(); return; }
  // GPS still pending — allow through, GPS resolves in background
  callback();
}

function onGuestTileClick(){
  checkLocationThen(()=>{
    paxFromDineIn = false;
    document.querySelectorAll('.pax-btn').forEach((b,i)=>b.classList.toggle('selected',i===selectedPax-1));
    showOverlay('paxOverlay');
  });
}

function onTableTileClick(){ checkLocationThen(()=>{ openTableModal(); }); }

// ── LOCATION — checked once on page load, result cached in localStorage ──
// Location result comes from app.blade.php global check.
// GPS always fires AFTER @yield('scripts'), so this callback is always registered in time.
window.onLocationReady = function(allowed){
  window.locationAllowed = allowed;
};

// Translated strings for JS use
const T = {
  diningIn:      "Dining In",
  guests:        "Guests",
  table:         "Table",
  tapToChange:   "Tap to change ✏️",
  notAtRest:     "🚫 You need to be at the restaurant to use this feature.\n\nPlease visit us in person to select your table and guests.",
};

function showNotAtRestaurant(){
  alert(T.notAtRest);
}

function cancelDineIn(){
  hideOverlay('paxOverlay');
  hideOverlay('tableOverlay');
  paxFromDineIn = false;
  unlockTiles();
  syncDisplay();
}

function startDineIn(){
  checkLocationThen(()=>{
    paxFromDineIn = true;
    document.querySelectorAll('.pax-btn').forEach((b,i)=>b.classList.toggle('selected',i===selectedPax-1));
    showOverlay('paxOverlay');
  });
}

function selectPax(n){
  selectedPax = n;
  document.querySelectorAll('.pax-btn').forEach((b,i)=>b.classList.toggle('selected',i===n-1));
  document.getElementById('paxCustom').value='';
}
function onCustomPax(v){
  if(v){selectedPax=parseInt(v)||1;document.querySelectorAll('.pax-btn').forEach(b=>b.classList.remove('selected'));}
}
function confirmPax(){
  if(!selectedPax||selectedPax<1) return;
  fetch('{{ route("pax.save") }}',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},body:JSON.stringify({pax:selectedPax})})
  .then(()=>{
    hideOverlay('paxOverlay');
    document.getElementById('cancelSessionBtn').style.visibility='visible';
    paxFromDineIn=false;
    syncDisplay();
    // Always open table modal after confirming pax
    setTimeout(()=>{ openTableModal(); },300);
  });
}
@if(!session('pax_set'))
// No auto-popup — user initiates via Dine In button
@endif
document.getElementById('paxOverlay').addEventListener('click',function(e){if(e.target===this)confirmPax();});

// ── TABLE CAPACITY MAP ──
// 🪑 Edit this to match your actual restaurant layout
const TABLE_CAPACITY = {
  1:2, 2:2,           // small tables — 2 pax
  3:4, 4:4, 5:4,      // medium tables — 4 pax
  6:6, 7:6,           // large tables — 6 pax
  8:8,                // big table — 8 pax
  9:4, 10:4,          // extra tables — 4 pax
};

let pendingTable = null;

function clearTableWarning(){
  document.getElementById('tableWarning').style.display='none';
  const input = document.getElementById('tableInput');
  const t = parseInt(input.value);
  const cap = TABLE_CAPACITY[t];
  const info = document.getElementById('tableCapacityInfo');
  if(cap){
    info.textContent = '🪑 ' + T.table + ' ' + t + ' — seats up to ' + cap + ' ' + T.guests;
    info.style.display='block';
  } else if(t >= 1 && t <= 20) {
    info.textContent = '🪑 ' + T.table + ' ' + t + ' — available';
    info.style.display='block';
  } else {
    info.style.display='none';
  }
}

function confirmTable(){
  const input = document.getElementById('tableInput');
  const t = parseInt(input.value);
  if(!t || t < 1 || t > 20){
    const w = document.getElementById('tableWarning');
    w.textContent = '⚠️ Please enter a valid table number (1–20).';
    w.style.display='block';
    return;
  }
  const cap = TABLE_CAPACITY[t];
  // If table has a known capacity and pax exceeds it, show warning
  if(cap && selectedPax > cap){
    pendingTable = t;
    document.getElementById('warnTitle').textContent = 'Table ' + t + ' is too small!';
    document.getElementById('warnMsg').textContent =
      'Table ' + t + ' only fits ' + cap + ' guest' + (cap>1?'s':'') +
      ', but you have ' + selectedPax + ' guests. Are you sure?';
    document.getElementById('tableWarnOverlay').style.display='flex';
    return;
  }
  saveTable(t);
}

function cancelTableWarn(){
  hideOverlay('tableWarnOverlay');
  pendingTable = null;
}

function forceConfirmTable(){
  hideOverlay('tableWarnOverlay');
  saveTable(pendingTable);
}

function saveTable(t){
  selectedTableNum = t;
  fetch('/api/table', {
    method:'POST',
    headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
    body:JSON.stringify({table:t})
  }).then(()=>{
    hideOverlay('tableOverlay');
    document.getElementById('clearTableBtn').style.visibility = 'visible';
    syncDisplay();
  });
}

// Reviews
const REVIEWS=[
  {stars:5,text:'"The Banana-Maki Roll is INSANE 🤯"',name:'Sarah L.',emoji:'😍',date:'2 hrs ago'},
  {stars:5,text:'"Best sushi in Malacca hands down!"',name:'Ahmad R.',emoji:'👨',date:'Yesterday'},
  {stars:4,text:'"Omakase platter was fresh and beautiful 👍"',name:'Wei Ming',emoji:'😊',date:'2 days ago'},
  {stars:5,text:'"Came for lunch, stayed for 3 hours 😂"',name:'Priya K.',emoji:'🥰',date:'3 days ago'},
];
let ri=0;
const bubble=document.getElementById('revBubble');
const dotsEl=document.getElementById('revDots');
REVIEWS.forEach((_,i)=>{const d=document.createElement('div');d.className='rev-dot'+(i===0?' active':'');dotsEl.appendChild(d);});
function showRev(idx){
  bubble.classList.remove('visible');bubble.classList.add('exit');
  setTimeout(()=>{const r=REVIEWS[idx];
    document.getElementById('revStars').textContent='⭐'.repeat(r.stars);
    document.getElementById('revText').textContent=r.text;
    document.getElementById('revEmoji').textContent=r.emoji;
    document.getElementById('revName').textContent=r.name;
    document.getElementById('revDate').textContent=r.date;
    document.querySelectorAll('.rev-dot').forEach((d,i)=>d.classList.toggle('active',i===idx));
    bubble.classList.remove('exit');void bubble.offsetWidth;bubble.classList.add('visible');
  },400);
}
showRev(0);
let autoRev=setInterval(()=>{ri=(ri+1)%REVIEWS.length;showRev(ri);},4500);
function revNext(){clearInterval(autoRev);ri=(ri+1)%REVIEWS.length;showRev(ri);autoRev=setInterval(()=>{ri=(ri+1)%REVIEWS.length;showRev(ri);},4500);}
function revPrev(){clearInterval(autoRev);ri=(ri-1+REVIEWS.length)%REVIEWS.length;showRev(ri);autoRev=setInterval(()=>{ri=(ri+1)%REVIEWS.length;showRev(ri);},4500);}
@endsection