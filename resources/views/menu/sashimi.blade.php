<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Minion Sushi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
    @vite(['resources/css/products.css', 'resources/js/products.js'])
    @extends('layouts.app')
    @section('title', ucfirst($page))
    @section('content')
<body>
    
    <div class="app-container">

        <main class="main-content">
            <div class="content-header">
                <h1 class="page-title">Sashimi</h1>
                <p class="page-subtitle">Discover our delicious sashimi!</p>
            </div>


            <div id="menu-container">
                <section class="menu-subsection">
                    <div class="subsection-header">
                    @foreach($products as $product)
                    <div class="item-grid">
                        <div class="menu-item solid-shadow" data-id="1" data-name="Sashimi" data-price="12.00">
                            <div class="item-img-cont">
                                <img src="{{ asset(str_replace(['public\\','\\'],['','/'], $product->image )) }}" alt="{{$product -> name}}">
                            </div>
                            <div class="item-details">
                                <div class="item-header">
                                    <h3 class="item-name">{{$product -> name}}</h3><br>
                                    <p class="item-desc">RM{{ $product -> price }}</p>
                                    <p class="item-desc">{{ $product -> description }}</p>
                                    
                                </div>
                            </div>
                         <div class="cart-controls" style="margin-top: 1rem;">
                                    
                                    {{-- Minus / Qty / Plus --}}
                                    <div style="display: flex; justify-content: space-between; align-items: center; border: 2px solid #1a1a1a; border-radius: 8px; margin-bottom: 0.5rem; overflow: hidden; background: white;">
                                        
                                        <button type="button" onclick="updateQty({{ $product->id }}, -1)" style="background: #f0f0f0; border: none; border-right: 2px solid #1a1a1a; padding: 0.5rem 1rem; font-weight: bold; font-size: 1.2rem; cursor: pointer; transition: background 0.2s;">
                                            -
                                        </button>
                                        
                                        <input type="number" id="qty-{{ $product->id }}" value="0" min="0" readonly style="width: 100%; border: none; text-align: center; font-weight: bold; font-size: 1.1rem; pointer-events: none;">
                                        
                                        <button type="button" onclick="updateQty({{ $product->id }}, 1)" style="background: #f0f0f0; border: none; border-left: 2px solid #1a1a1a; padding: 0.5rem 1rem; font-weight: bold; font-size: 1.2rem; cursor: pointer; transition: background 0.2s;">
                                            +
                                        </button>
                                        
                                    </div>
                                    
                                    {{-- Add to Cart Button --}}
                                    <button onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})" style="width: 100%; background: #4ade80; color: #1a1a1a; border: 2px solid #1a1a1a; border-radius: 8px; padding: 0.6rem; font-weight: bold; font-size: 1rem; cursor: pointer; box-shadow: 2px 2px 0px #1a1a1a; transition: transform 0.1s;">
                                        Add to Cart
                                    </button>
                                    
                                </div>


                        </div>

                       
                    @endforeach
                    
                    
                </section>
            </div>
        </main>
    </div>

</body>
    @endsection

    <script>
        function addToCart(id, name, price){
            let qtyInput = document.getElementById('qty-'+ id);
            let qty = parseInt(qtyInput.value);

            if (qty === 0){
                alert("Add at least 1 item")
                return;
            }
            let ToCartbtn = event.target;
            let originalText = ToCartbtn.innerHTML;
            ToCartbtn.innerHTML = '⏳ Adding...';
            ToCartbtn.disabled = true;

            fetch('{{ route("cart.add")}}',{
                method:'POST',
                headers:{
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body:JSON.stringify({id:id, qty:qty})
            })
            .then(response => response.json())
            .then(data=>{
                ToCartbtn.innerHTML = originalText;
                ToCartbtn.disabled = false;

                if (data.status === 'ok'){
                    alert(`Added ${name} to cart Successfully!`);
                    qtyInput.value = 0;

                }else{
                    alert(`Oops something went wrong, plase try again! data.status`);
                }
            })
            .catch(error=>{
                ToCartbtn.innerHTML = originalText;
                ToCartbtn.disable = false;
                console.error('Error', error);
                alert(`Oops something went wrong, plase try again! console`);
            })
        }
        function updateQty(id,change){
            let input = document.getElementById('qty-'+id);
            let currentValue = parseInt(input.value);

            let newVal = currentValue+change;

            if(newVal >= 0){
                input.value = newVal;
            }

        }
    </script>
</html>