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
                <th style="padding:0.8rem;text-align:left;">User's ID</th>
                <th style="padding:0.8rem;text-align:left;">Total Bill (RM)</th>
                <th style="padding:0.8rem;text-align:left;">Table No.</th>
                <th style="padding:0.8rem;text-align:left;">Orderd at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderLog as $orderLog)
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:0.8rem 1rem;">{{ $orderLog->id }}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderLog-> user_id }}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderLog-> bill_amount }}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderLog-> table_number }}</td>
                <td style="padding:0.8rem 1rem;">{{ $orderLog-> created_at }}</td>
                <td style="padding:0.8rem;text-align:center;white-space:nowrap;">
                    
                    
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection