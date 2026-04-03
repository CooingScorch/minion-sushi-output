<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrderLog;
use App\Models\OrderItem;

class CartController extends Controller
{

    // GET /menu
    public function index()
    {
        $items = collect(self::menuItems())->groupBy('cat');
        $cart  = session('cart', []);
        $cartCount = array_sum(array_column($cart, 'qty'));
        return view('pages.menu', compact('items', 'cart', 'cartCount'));
    }

    // POST /api/cart/add
    public function add(Request $request)
    {
        $id   = (int) $request->input('id');
        $qtyToAdd = (int) $request->input('qty', 1);

        $item = \Illuminate\Support\Facades\DB::table('menu-lists')->where('id',$id)->first();

        if (!$item) return response()->json(['error' => 'Item not found']);

        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty']+= $qtyToAdd;
        } else {
            $cart[$id] = [
                'id'=>$id, 
                'name'=>$item->name, 
                'price'=>$item->price, 
                'qty'=>$qtyToAdd];
        }
        session(['cart' => $cart]);

        $cartCount = array_sum(array_column($cart, 'qty'));
        $subtotal = array_sum(array_map(fn($i)=> $i['price']*$i['qty'],$cart));
        $tax = $subtotal * 0.08;
        $total = $subtotal + $tax;
        return response()->json([
            'status'=>'ok', 
            'cart_count'=>$cartCount, 
            'qty'=>$cart[$id]['qty'] ,
            'subtotal'=>$subtotal,
            'tax'=> $tax,
            'total'=>$total]);
    }

    // POST /api/cart/remove
    public function remove(Request $request)
    {
        $id   = (int) $request->input('id');
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty']--;
            if ($cart[$id]['qty'] <= 0) unset($cart[$id]);
        }
        session(['cart' => $cart]);

        $cartCount = array_sum(array_column($cart, 'qty'));
        $cartCount = array_sum(array_column($cart, 'qty'));
        $subtotal = array_sum(array_map(fn($i)=> $i['price']*$i['qty'],$cart));
        $tax = $subtotal * 0.08;
        $total = $subtotal + $tax;
        return response()->json(['status'=>'ok', 'cart_count'=>$cartCount, 'qty'=>$cart[$id]['qty'] ?? 0, 'subtotal'=>$subtotal,'tax'=> $tax,'total'=>$total]);
    }

    // POST /api/cart/clear
    public function clear()
    {
        session(['cart' => []]);
        return response()->json(['status'=>'ok']);
    }

    // GET /cart
    public function cartPage()
    {
        $cart  = session('cart', []);
        $total = array_sum(array_map(fn($i) => $i['price'] * $i['qty'], $cart));
        return view('pages.cart', compact('cart', 'total'));
    }

    public function placeOrder(Request $request){
        $cart = session('cart', []);

        if(empty($cart)){
            return response()->json(['error'=>'Your cart is empty!']);
        }
        $subtotal = array_sum(array_map(fn($i)=> $i['price']*$i['qty'],$cart));
        $tax = $subtotal * 0.08;
        $total = $subtotal + $tax;
        
        $Orderid = DB::table('order_log')->insertGetId([
            'user_id'      => auth()->id(), 
            'table_number' => session('table'), 
            'bill_amount'  => $total, 
            'created_at'   => now(),
        ]);

        foreach($cart as $item){
            DB::table('order_items')->insert([
                'order_log_id' => $Orderid,  
                'item_name'    => $item['name'],
                'price'        => $item['price'],
                'qty'          => $item['qty'],
            ]);
        }
        session()->forget('cart');
        session()->save();
        return response()->json([
            'status'=>'ok', 
            'subtotal'=>$subtotal, 
            'tax'=> $tax,
            'total'=>$total]);
    }
}