@extends('layouts.admin')
@section('title', 'Menu List')
@section('content')
<div style="padding:1.5rem;">
  <h2 style="font-family:'Fredoka One',cursive;font-size:1.8rem;margin-bottom:1rem;">📋 Order Log</h2>
  
{{-- Back to Dashboard --}}
<a href="{{ route('AdminDashboard') }}" style="display:inline-block;margin-bottom:1rem;background:#1a3a5c;color:white;padding:0.5rem 1.2rem;border-radius:8px;text-decoration:none;font-weight:600;">← Back to Dashboard</a>


{{-- Desktop Table --}}
<div style="overflow-x:auto;display:block;">
    <table style="width:100%;border-collapse:collapse;min-width:600px;">
        <thead>
            <tr style="background:#1a3a5c;color:white;">
                <th style="padding:0.8rem;text-align:left;">ID</th>
                <th style="padding:0.8rem;text-align:left;">Table Number</th>
                <th style="padding:0.8rem;text-align:left;">Ordered Items</th>
                <th style="padding:0.8rem;text-align:left;">Qty</th>
                <th style="padding:0.8rem;text-align:left;">Price (RM)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $orderItems)
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:0.8rem 1rem;">{{ $orderItems->id}}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderItems-> table_number }}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderItems-> item_name }}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderItems -> qty }}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderItems-> price }}</td>
                <td style="padding:0.8rem;text-align:center;white-space:nowrap;">
                    
                    
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection