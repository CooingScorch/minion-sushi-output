@extends('layouts.app')
@section('title', 'Call Waiter')

@section('extra-styles')

.waiter-page{display:flex;flex-direction:column;gap:1.5rem;}
.waiter-title{font-family:'Boogaloo',cursive;font-size:2.5rem;color:var(--bd);margin:0;}
.waiter-sub{font-size:1rem;color:#888;font-weight:700;line-height:1.6;margin:0;}
.waiter-call-btn{background:var(--bd);color:var(--y);font-family:'Fredoka One',cursive;font-size:1.3rem;
  padding:1rem 2.5rem;border-radius:16px;border:3px solid var(--blk);box-shadow:var(--shl);
  cursor:pointer;transition:all 0.15s;display:inline-flex;align-items:center;gap:0.7rem;align-self:flex-start;}
.waiter-call-btn:hover{transform:translate(-3px,-3px);box-shadow:8px 8px 0 var(--blk);}
.waiter-call-btn:active{transform:translate(3px,3px);box-shadow:1px 1px 0 var(--blk);}
.waiter-call-btn.called{background:var(--grn);color:#fff;border-color:var(--blk);}
.waiter-call-btn.disabled{background:#ccc;color:#888;border-color:#bbb;box-shadow:3px 3px 0 #bbb;cursor:not-allowed;}
.waiter-call-btn.disabled:hover{transform:none;box-shadow:3px 3px 0 #bbb;}
.waiter-status-card{background:#fff;border:3px solid var(--blk);border-radius:var(--radius);
  box-shadow:var(--sh);padding:1.5rem 2rem;}
.waiter-status-row{display:flex;align-items:center;gap:1rem;padding:0.7rem 0;border-bottom:1.5px dashed rgba(0,0,0,0.07);}
.waiter-status-row:last-child{border-bottom:none;}
.ws-ic{font-size:1.4rem;}
.ws-label{font-size:0.75rem;font-weight:900;text-transform:uppercase;letter-spacing:1px;color:#aaa;}
.ws-val{font-family:'Fredoka One',cursive;font-size:1rem;color:var(--blk);}
.no-table-banner{display:flex;align-items:center;gap:0.75rem;padding:0.9rem 1.2rem;
  border-radius:14px;border:2.5px solid var(--blk);font-family:'Fredoka One',cursive;font-size:0.95rem;
  background:#fde8e8;color:#8b1a1a;}

@endsection

@section('content')
<div class="waiter-page">

  <div style="display:flex;flex-direction:column;gap:1rem;">
    <div class="waiter-title">Call Waiter</div>
    <div class="waiter-sub">Press the button and a staff member will come to your table shortly.</div>

    @if(!session('table'))
    <div class="no-table-banner">
      <span>🪑</span><span>Please set your table number on the Home page before calling a waiter.</span>
    </div>
    @endif

    <button class="waiter-call-btn {{ session('table') ? '' : 'disabled' }}" id="callBtn" onclick="doCallWaiter()">
      🙋 <span id="callBtnText">Call Now</span>
    </button>

    <div class="waiter-status-card">
      <div class="waiter-status-row">
        <div class="ws-ic">🪑</div>
        <div><div class="ws-label">Table</div><div class="ws-val">{{ session('table') ? 'Table ' . session('table') : '—' }}</div></div>
      </div>
      <div class="waiter-status-row">
        <div class="ws-ic">👥</div>
        <div><div class="ws-label">Guests</div><div class="ws-val">{{ session('pax') ? session('pax') . ' Guests' : '—' }}</div></div>
      </div>
      <div class="waiter-status-row">
        <div class="ws-ic">🕐</div>
        <div><div class="ws-label">Last Called</div><div class="ws-val" id="lastCalledTime">—</div></div>
      </div>
      <div class="waiter-status-row">
        <div class="ws-ic" id="statusIcon">⚪</div>
        <div><div class="ws-label">Status</div><div class="ws-val" id="callStatus">Not yet called</div></div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
let wCool = false;
const hasTable = {{ session('table') ? 'true' : 'false' }};

function doCallWaiter(){
  if(wCool || !hasTable) return;
  wCool = true;
  const btn = document.getElementById('callBtn');
  const txt = document.getElementById('callBtnText');
  const status = document.getElementById('callStatus');
  const icon = document.getElementById('statusIcon');
  btn.classList.add('called');
  txt.textContent = 'Waiter is on the way! ✓';
  status.textContent = 'Waiter on the way...';
  icon.textContent = '🟢';
  const now = new Date();
  document.getElementById('lastCalledTime').textContent = now.toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'});
  document.getElementById('toast').classList.add('show');
  setTimeout(()=>document.getElementById('toast').classList.remove('show'), 3500);
  setTimeout(()=>{
    btn.classList.remove('called');
    txt.textContent = 'Call Again';
    status.textContent = 'Waiter has arrived ✅';
    icon.textContent = '✅';
    wCool = false;
  }, 10000);

  fetch('{{ route("waiter.call") }}', {
    method: 'POST',
    headers: {'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
    body: JSON.stringify({table: {{ session('table') ?? 'null' }}})
  });
}
@endsection