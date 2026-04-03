@extends('layouts.admin')
@section('title', 'Menu List')
@section('content')
<div style="padding:1.5rem;">
  <h2 style="font-family:'Fredoka One',cursive;font-size:1.8rem;margin-bottom:1rem;">🍣 Menu Add List</h2>
  
{{-- Back to Dashboard --}}
<a href="{{ route('AdminDashboard') }}" style="display:inline-block;margin-bottom:1rem;background:#1a3a5c;color:white;padding:0.5rem 1.2rem;border-radius:8px;text-decoration:none;font-weight:600;">← Back to Dashboard</a>

<a href="{{ route('admin.menuItem.create') }}" style="background:#29C434;color:#1a1a1a;padding:0.3rem 0.8rem;border-radius:8px;border:2px solid #1a1a1a;text-decoration:none;font-size:0.85rem;display:inline-block;">Add</a>
{{-- Desktop Table --}}
<div style="overflow-x:auto;display:block;">
    <table style="width:100%;border-collapse:collapse;min-width:600px;">
        <thead>
            <tr style="background:#1a3a5c;color:white;">
                <th style="padding:0.8rem;text-align:left;">ID</th>
                <th style="padding:0.8rem;text-align:left;">Image</th>
                <th style="padding:0.8rem;text-align:left;">Name</th>
                <th style="padding:0.8rem;text-align:left;">Available</th>
                <th style="padding:0.8rem;text-align:left;">Price (RM)</th>
                <th style="padding:0.8rem;text-align:left;">Type</th>
                <th style="padding:0.8rem;text-align:left;">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:0.8rem 1rem;">{{ $product->id }}</td>

                <td style="padding:0.8rem 1rem;">
                <img src="{{ asset(str_replace(['public\\','\\'],['','/'], $product->image )) }}"
                 style="width:70px; height:70px; object-fit:cover; border:2px solid #1a1a1a; border-radius:8px">
                </td>
                <td style="padding:0.8rem 1rem;">{{ $product->name }}</td>
                @if ( $product->available  == 1)
                <td style="padding:0.8rem 1rem;">yes</td>
                @else
                <td style="padding:0.8rem 1rem;">no</td>
                @endif
                <td style="padding:0.8rem 1rem;">{{ $product-> price }}</td>
                <td style="padding:0.8rem 1rem;">{{ $product-> type }}</td>
                <td style="padding:0.8rem 1rem;">{{ $product-> description }}</td>
                <td style="padding:0.8rem;text-align:center;white-space:nowrap;">
                    <a href="{{ route('admin.menuItem.edit', $product->id) }}"
                        style="background:#FFD700;color:#1a1a1a;padding:0.3rem 0.8rem;border-radius:8px;border:2px solid #1a1a1a;text-decoration:none;font-size:0.85rem;display:inline-block;">Edit</a>
                    <form action="{{ route('admin.menuItem.delete', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" style="background:#ff4444;color:#fff;padding:0.3rem 0.8rem;border-radius:8px;border:2px solid #1a1a1a;font-size:0.85rem;cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection