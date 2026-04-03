
<?php $__env->startSection('title', 'My Cart'); ?>

<?php $__env->startSection('extra-styles'); ?>
.cart-hero{background:linear-gradient(135deg,#FF6B2B,#e8352b);border:3px solid var(--blk);
  border-radius:var(--radius);box-shadow:var(--shl);padding:1.4rem 1.75rem;
  display:flex;align-items:center;gap:1rem;}
.cart-hero-title{font-family:'Boogaloo',cursive;font-size:2.4rem;color:#fff;line-height:1;}
.cart-hero-sub{font-size:0.82rem;color:rgba(255,255,255,0.6);font-weight:700;margin-top:2px;}

.cart-item{display:flex;align-items:center;gap:0.85rem;padding:0.9rem 1.1rem;
  border-bottom:1.5px dashed rgba(0,0,0,0.08);}
.cart-item:last-child{border-bottom:none;}
.cart-item-emoji{font-size:1.8rem;flex-shrink:0;width:42px;text-align:center;}
.cart-item-name{flex:1;font-family:'Fredoka One',cursive;font-size:0.95rem;}
.cart-item-price{font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.95rem;white-space:nowrap;}
.cart-item-qty{display:flex;align-items:center;gap:0.35rem;}
.cqty-btn{width:26px;height:26px;border-radius:50%;border:2px solid var(--blk);
  background:var(--bg);font-size:0.9rem;font-weight:900;cursor:pointer;
  display:flex;align-items:center;justify-content:center;font-family:'Fredoka One',cursive;}
.cqty-btn:hover{background:var(--bd);color:#FFD700;}
.cqty-num{font-family:'Fredoka One',cursive;font-size:0.95rem;min-width:20px;text-align:center;}

.summary-card{background:#fff;border:3px solid var(--blk);border-radius:var(--radius);
  box-shadow:var(--sh);overflow:hidden;}
.summary-row{display:flex;justify-content:space-between;align-items:center;
  padding:0.7rem 1.2rem;border-bottom:1.5px solid #f0f0f0;font-size:0.92rem;font-weight:700;}
.summary-row:last-child{border-bottom:none;}
.summary-total{font-family:'Boogaloo',cursive;font-size:1.4rem;color:var(--bd);}

.redeem-card{background:linear-gradient(135deg,#f5f3ff,#ede9fe);border:3px solid #7c3aed;
  border-radius:var(--radius);box-shadow:4px 4px 0 #5b21b6;padding:1.2rem 1.4rem;}
.redeem-title{font-family:'Fredoka One',cursive;font-size:1rem;color:#5b21b6;margin-bottom:0.5rem;}
.redeem-sub{font-size:0.78rem;color:#7c3aed;margin-bottom:0.8rem;font-weight:700;}
.redeem-slider{width:100%;accent-color:#7c3aed;margin:0.4rem 0;}
.redeem-row{display:flex;justify-content:space-between;align-items:center;
  font-size:0.8rem;font-weight:700;color:#6d28d9;margin-top:0.3rem;}

.place-btn{width:100%;padding:1.1rem;background:var(--bd);color:#FFD700;
  border:3px solid var(--blk);border-radius:var(--radius);box-shadow:var(--sh);
  font-family:'Fredoka One',cursive;font-size:1.2rem;cursor:pointer;
  transition:all 0.15s;}
.place-btn:hover{transform:translate(-2px,-2px);box-shadow:var(--shl);}
.place-btn:disabled{opacity:0.4;cursor:not-allowed;transform:none;box-shadow:var(--sh);}

/* Receipt overlay */
.receipt-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.6);z-index:700;
  display:flex;align-items:center;justify-content:center;padding:1rem;}
.receipt-card{background:#fff;border:3px solid var(--blk);border-radius:24px;
  box-shadow:8px 8px 0 var(--blk);max-width:420px;width:100%;padding:2rem 1.75rem;
  text-align:center;animation:popIn 0.3s cubic-bezier(0.34,1.56,0.64,1);}
@keyframes popIn{from{transform:scale(0.7);opacity:0;}to{transform:scale(1);opacity:1;}}
.receipt-ic{font-size:4rem;margin-bottom:0.5rem;}
.receipt-title{font-family:'Boogaloo',cursive;font-size:2.2rem;color:var(--bd);margin-bottom:0.3rem;}
.receipt-sub{font-size:0.88rem;color:#888;font-weight:700;margin-bottom:1.2rem;}
.receipt-row{display:flex;justify-content:space-between;padding:0.5rem 0;
  border-bottom:1px dashed #eee;font-size:0.92rem;font-weight:700;}
.receipt-row:last-of-type{border-bottom:none;}
.receipt-pts{background:linear-gradient(135deg,#f5f3ff,#ede9fe);border:2px solid #7c3aed;
  border-radius:12px;padding:0.8rem 1rem;margin:1rem 0;
  font-family:'Fredoka One',cursive;font-size:1rem;color:#5b21b6;}
.receipt-done-btn{width:100%;padding:0.9rem;background:var(--bd);color:#FFD700;
  border:2.5px solid var(--blk);border-radius:14px;font-family:'Fredoka One',cursive;
  font-size:1.1rem;cursor:pointer;margin-top:1rem;}
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(empty($cart)): ?>

<div style="text-align:center;padding:4rem 1rem;">
  <div style="font-size:5rem;margin-bottom:1rem;">🛒</div>
  <div style="font-family:'Boogaloo',cursive;font-size:2rem;color:var(--bd);margin-bottom:0.5rem;">Your cart is empty</div>
  <div style="color:#888;font-weight:700;margin-bottom:1.5rem;">Add some delicious items from the menu!</div>
  <a href="<?php echo e(route('menu')); ?>" style="display:inline-block;background:var(--bd);color:#FFD700;font-family:'Fredoka One',cursive;font-size:1rem;padding:0.8rem 2rem;border-radius:14px;border:2.5px solid var(--blk);box-shadow:var(--sh);text-decoration:none;">🍣 Browse Menu</a>
</div>

<?php else: ?>


<div class="cart-hero">
  <div style="font-size:3rem;">🛒</div>
  <div>
    <div class="cart-hero-title">My Cart</div>
    <div class="cart-hero-sub">Table <?php echo e(session('table','—')); ?> · <?php echo e(count($cart)); ?> item<?php echo e(count($cart)>1?'s':''); ?></div>
  </div>
</div>


<div>
  <div style="font-family:'Fredoka One',cursive;font-size:0.8rem;letter-spacing:2px;text-transform:uppercase;color:var(--bd);opacity:0.6;margin-bottom:0.7rem;">Your Order</div>
  <div class="summary-card" id="cartItemsList">
    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="cart-item" id="citem-<?php echo e($item['id']); ?>">
      <div class="cart-item-name"><?php echo e($item['name']); ?></div>
      <div class="cart-item-qty">
        <button class="cqty-btn" onclick="cChangeQty(<?php echo e($item['id']); ?>,-1)">−</button>
        <span class="cqty-num" id="cqty-<?php echo e($item['id']); ?>"><?php echo e($item['qty']); ?></span>
        <button class="cqty-btn" onclick="cChangeQty(<?php echo e($item['id']); ?>,1)">+</button>
      </div>
      <div class="cart-item-price" id="cprice-<?php echo e($item['id']); ?>">RM <?php echo e(number_format($item['price'] * $item['qty'], 2)); ?></div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>



<div>
  <div style="font-family:'Fredoka One',cursive;font-size:0.8rem;letter-spacing:2px;text-transform:uppercase;color:var(--bd);opacity:0.6;margin-bottom:0.7rem;">Summary</div>
  <div class="summary-card">
    <div class="summary-row"><span>Subtotal</span><span id="summarySubtotal">RM <?php echo e(number_format($total,2)); ?></span></div>
    <div class="summary-row" style="color:#888;font-size:0.85rem;"><span>Service Tax (8%)</span><span id="summaryTax">RM <?php echo e(number_format($total*0.08,2)); ?></span></div>
    <div class="summary-row"><span style="font-size:1rem;">Total</span><span class="summary-total" id="summaryTotal">RM <?php echo e(number_format($total*1.08,2)); ?></span></div>
  </div>
</div>


<button class="place-btn" id="placeOrderBtn" onclick="placeOrder()">
  ✅ Confirm Order · RM <span id="btnTotal"><?php echo e(number_format($total*1.08,2)); ?></span>
</button>

<?php endif; ?>


<div class="receipt-overlay" id="receiptOverlay" style="display:none;">
  <div class="receipt-card">
    <div class="receipt-ic">🎉</div>
    <div class="receipt-title">Order Placed!</div>
    <div class="receipt-sub">Your food is being prepared. Enjoy! 🍣</div>
    <div id="receiptRows"></div>
    <div class="receipt-pts" id="receiptPts"></div>
    <div style="font-size:0.78rem;color:#888;font-weight:700;margin-top:0.5rem;">Please pay at the counter or to your waiter</div>
    <button class="receipt-done-btn" onclick="receiptDone()">🏠 Back to Home</button>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->startSection('scripts'); ?>
let _subtotal = <?php echo e($total ?? 0); ?>;
let _redeemPts = 0;
let _redeemRM = 0;
let _itemPrices = {
  <?php $__currentLoopData = $cart ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php echo e($item['id']); ?>: <?php echo e($item['price']); ?>,
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
};

function updateRedeem(){
  const tax = parseFloat((_subtotal * 0.08).toFixed(2));
  const total = _subtotal + tax;

  document.getElementById('summarySubtotal').textContent = 'RM ' + _subtotal.toFixed(2);
  document.getElementById('summaryTax').textContent = 'RM ' + tax.toFixed(2);
  document.getElementById('summaryTotal').textContent = 'RM ' + total.toFixed(2);
  document.getElementById('btnTotal').textContent = total.toFixed(2);
}

function cChangeQty(id, delta){
  const route = delta > 0 ? '<?php echo e(route("cart.add")); ?>' : '<?php echo e(route("cart.remove")); ?>';
  
  fetch(route,{
    method:'POST',
    headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
    body: JSON.stringify({id})
  }).then(r=>r.json()).then(data=>{
    if(data.status==='ok'){
        
      if(data.qty === 0){
        window.location.reload();
      } else {
        const qtyEl = document.getElementById('cqty-'+id);
        const priceEl = document.getElementById('cprice-'+id);
        if(qtyEl) qtyEl.textContent = data.qty;
        if(priceEl) priceEl.textContent = 'RM ' + (_itemPrices[id] * data.qty).toFixed(2);
        
        _subtotal = data.subtotal;
        
        updateRedeem();
      }
    }
  });
}

function placeOrder(){
  const btn = document.getElementById('placeOrderBtn');
  btn.disabled = true;
  btn.textContent = '⏳ Placing order...';

  fetch('<?php echo e(route("order.place")); ?>',{
    method:'POST',
    headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'},
    body: JSON.stringify({ redeem_points: _redeemPts })
  }).then(r=>r.json()).then(data=>{
    if(data.status === 'ok'){
      showReceipt(data);
    } else {
      btn.disabled = false;
      btn.textContent = '✅ Confirm Order';
      alert(data.error || 'Something went wrong');
    }
  }).catch(()=>{
    btn.disabled = false;
    btn.textContent = '✅ Confirm Order';
  });
}

function showReceipt(data){
  const rows = document.getElementById('receiptRows');
  rows.innerHTML = `
    <div class="receipt-row"><span>Subtotal</span><span>RM ${data.subtotal.toFixed(2)}</span></div>
    <div class="receipt-row" style="color:#888;font-size:0.85rem"><span>Service Tax (8%)</span><span>RM ${data.tax.toFixed(2)}</span></div>
    <div class="receipt-row" style="font-size:1.05rem"><span><strong>Total Paid</strong></span><span><strong>RM ${data.total.toFixed(2)}</strong></span></div>
  `;

  document.getElementById('receiptOverlay').style.display = 'flex';
}

function receiptDone(){
  window.location.href = '<?php echo e(route("home")); ?>';
}
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\minion-sushi-output\resources\views/pages/cart.blade.php ENDPATH**/ ?>