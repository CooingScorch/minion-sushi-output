@extends('layouts.admin')
@section('title', 'Customer List')
@section('content')

<div style="padding:1.5rem;">
  <h2 style="font-family:'Fredoka One',cursive;font-size:1.8rem;margin-bottom:1rem;">👥 Customer List</h2>
  
  {{-- Back to Dashboard --}}
<a href="{{ route('AdminDashboard') }}" style="display:inline-block;margin-bottom:1rem;background:#1a3a5c;color:white;padding:0.5rem 1.2rem;border-radius:8px;text-decoration:none;font-weight:600;">← Back to Dashboard</a>

{{-- Desktop Table --}}
<div style="overflow-x:auto;display:block;">
    <table style="width:100%;border-collapse:collapse;min-width:600px;">
        <thead>
            <tr style="background:#1a3a5c;color:white;">
                <th style="padding:0.8rem;text-align:left;">ID</th>
                <th style="padding:0.8rem;text-align:left;">Name</th>
                <th style="padding:0.8rem;text-align:left;">Gender</th>
                <th style="padding:0.8rem;text-align:left;">Phone</th>
                <th style="padding:0.8rem;text-align:left;">Birthday</th>
                <th style="padding:0.8rem;text-align:left;">Email</th>
                <th style="padding:0.8rem;text-align:center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:0.8rem 1rem;">{{ $customer->id }}</td>
                <td style="padding:0.8rem 1rem;">{{ $customer->name }}</td>
                <td style="padding:0.8rem 1rem;">{{ $customer->gender }}</td>
                <td style="padding:0.8rem 1rem;">{{ $customer->phone }}</td>
                <td style="padding:0.8rem 1rem;">{{ $customer->birthday }}</td>
                <td style="padding:0.8rem 1rem;">{{ $customer->email }}</td>
                <td style="padding:0.8rem;text-align:center;white-space:nowrap;">
                    <a href="{{ route('admin.customer.edit', $customer->id) }}" 
                        style="background:#FFD700;color:#1a1a1a;padding:0.3rem 0.8rem;border-radius:8px;border:2px solid #1a1a1a;text-decoration:none;font-size:0.85rem;display:inline-block;">Edit</a>
                    <form action="{{ route('admin.customer.delete', $customer->id) }}" method="POST" style="display:inline;">
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