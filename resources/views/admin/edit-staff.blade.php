@extends('layouts.admin')

@section('content')
<div style="max-width:600px;margin:2rem auto;background:white;padding:2rem;border-radius:12px;border:2px solid #1a1a1a;box-shadow:4px 4px 0 #1a1a1a;">

    <h2 style="font-family:'Boogaloo',cursive;font-size:2rem;margin-bottom:1.5rem;">✏️ Edit Staff Info</h2>

    <form action="{{ route('admin.staff.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Name</label>
            <input type="text" name="name" value="{{ old('name', $member->name) }}" required
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid {{ $errors->has('name') ? 'red' : '#1a1a1a' }};font-size:1rem;box-sizing:border-box;">
            @error('name')
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gender --}}
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Gender</label>
            <select name="gender" style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid {{ $errors->has('gender') ? 'red' : '#1a1a1a' }};font-size:1rem;box-sizing:border-box;">
                <option value="male" {{ old('gender', $member->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $member->gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Phone --}}
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $member->phone) }}"
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid {{ $errors->has('phone') ? 'red' : '#1a1a1a' }};font-size:1rem;box-sizing:border-box;">
            @error('phone')
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Birthday --}}
        <div style="margin-bottom:1rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Birthday</label>
            <input type="date" name="birthday" value="{{ old('birthday', $member->birthday) }}"
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid {{ $errors->has('birthday') ? 'red' : '#1a1a1a' }};font-size:1rem;box-sizing:border-box;">
            @error('birthday')
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div style="margin-bottom:1.5rem;">
            <label style="display:block;font-weight:600;margin-bottom:0.3rem;">Email</label>
            <input type="email" name="email" value="{{ old('email', $member->email) }}" required
                style="width:100%;padding:0.6rem 1rem;border-radius:8px;border:2px solid {{ $errors->has('email') ? 'red' : '#1a1a1a' }};font-size:1rem;box-sizing:border-box;">
            @error('email')
                <p style="color:red;font-size:0.85rem;margin-top:0.3rem;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div style="display:flex;gap:1rem;">
            <button type="submit" style="background:#FFD700;color:#1a1a1a;padding:0.6rem 1.5rem;border-radius:8px;border:2px solid #1a1a1a;font-size:1rem;font-weight:600;cursor:pointer;">
                💾 Save Changes
            </button>
            <a href="{{ route('admin.staff-list') }}" style="background:#eee;color:#1a1a1a;padding:0.6rem 1.5rem;border-radius:8px;border:2px solid #1a1a1a;font-size:1rem;font-weight:600;text-decoration:none;">
                ← Cancel
            </a>
        </div>

    </form>
</div>
@endsection