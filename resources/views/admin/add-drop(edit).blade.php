@extends('layouts.admin')
@section('title', 'Add New Menu Item')
@section('content')
@vite(['resources/js/products.js'])
<div style="padding:1.5rem; max-width: 800px; margin: 0 auto;">
    <h2 style="font-family:'Fredoka One',cursive; font-size:1.8rem; margin-bottom:1rem; color:#1a1a1a;">🍱 Edit New Sushi</h2>
    
    {{-- Back to Dashboard/List --}}
    <a href="{{ route('admin.add-drop-menu') }}" style="display:inline-block; margin-bottom:1.5rem; background:#1a3a5c; color:white; padding:0.5rem 1.2rem; border-radius:8px; border:2px solid #1a1a1a; text-decoration:none; font-weight:bold; box-shadow: 4px 4px 0px #1a1a1a;">
        ← Back to Menu List
    </a>

    {{-- The Form Container --}}
    <div style="background:white; padding:2rem; border:3px solid #1a1a1a; border-radius:12px; box-shadow: 8px 8px 0px #1a1a1a;">
        @if ($errors->any())
    <div style="background:#ff4444; color:white; padding:1rem; border-radius:8px; margin-bottom:1.5rem; border:3px solid #1a1a1a; box-shadow: 4px 4px 0px #1a1a1a;">
        <strong style="font-size:1.1rem;">⚠️ Oops! Please fix these errors:</strong>
        <ul style="margin-top:0.5rem; margin-bottom:0; font-weight:bold;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        {{-- IMPORTANT: enctype is required for image uploads! --}}
        <form action="{{ route('admin.menuItem.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Grid Layout for Inputs --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                
                {{-- Name --}}
                <div style="grid-column: span 2;">
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Item Name</label>
                    <input type="text" name="name" placeholder="e.g., Salmon Nigiri" value="{{$product->name}}" required
                           style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box;">
                </div>

                {{-- Type Dropdown --}}
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Category Type</label>
                    <select name="type" required style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box; background:white;">
                        <option value="sushi" {{ $product->type == 'sushi'? 'selected':''}}>Sushi</option>
                        <option value="sashimi"{{ $product->type == 'sashimi'? 'selected':''}}>Sashimi</option>
                        <option value="donburi" {{ $product->type == 'donburi'? 'selected':''}}>Donburi</option>
                        <option value="noodles" {{ $product->type == 'noodles'? 'selected':''}}>Noodles</option>
                        <option value="drink"{{ $product->type == 'drink'? 'selected':''}}>Drink</option>
                        
                    </select>
                </div>

                {{-- Price --}}
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Price (RM)</label>
                    <input type="number" step="0.01" name="price" value="{{ $product->price }}" placeholder="0.00" required
                           style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box;">
                </div>

                {{-- Stock/Available --}}
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Stock Available</label>
                    <label for="avilable">Available</label>
                    <select name="available" id="available">
                        <option value="1"{{ $product->available == 1? 'selected':''}}>yes</option>
                        <option value="0"{{ $product->available == 0? 'selected':''}}>no</option>
                    </select>
                </div>

                {{-- Image Upload --}}
                <div>
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Product Image</label>
                    <img id="imagePreview"src="{{ asset(str_replace(['public\\','\\'],['','/'], $product->image )) }}"style="width:70px; height:70px; object-fit:cover; border:2px solid #1a1a1a; border-radius:8px">
                    <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                           style="width:100%; padding:0.6rem; border:2px solid #1a1a1a; border-radius:8px; font-size:0.9rem; background:#f0f0f0; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box;">
                </div>

                {{-- Description --}}
                <div style="grid-column: span 2;">
                    <label style="font-weight:bold; display:block; margin-bottom:0.5rem;">Description</label>
                    <textarea name="description" rows="4" placeholder="Describe the ingredients..."
                              style="width:100%; padding:0.8rem; border:2px solid #1a1a1a; border-radius:8px; font-size:1rem; box-shadow: 4px 4px 0px #1a1a1a; box-sizing:border-box; resize:vertical;">{{ $product->description }}</textarea>
                </div>
            </div>

            {{-- Submit Button --}}
            <button type="submit" 
                    style="background:#4ade80; color:#1a1a1a; padding:1rem 2rem; border:3px solid #1a1a1a; border-radius:8px; font-size:1.2rem; font-weight:bold; cursor:pointer; width:100%; box-shadow: 6px 6px 0px #1a1a1a; transition: transform 0.1s;">
                + Update Item to Menu
            </button>
        </form>
    </div>
</div>

@endsection

<script>

    function previewImage(event){
    const newImage = event.target;
    const previewImg = document.getElementById('imagePreview');

    if(newImage.files && newImage.files[0]){
        const reader =  new FileReader();
        reader.onload = function(e){
            previewImg.src = e.target.result;
        }
        reader.readAsDataURL(newImage.files[0]);
    }
}
</script>