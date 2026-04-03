@extends('layouts.app')
@section('title', ucfirst($page))
@section('content')
<div style="display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:55vh;text-align:center;gap:1.2rem;">
  <div style="font-size:5rem;">{{ $icon }}</div>
  <div style="font-family:'Boogaloo',cursive;font-size:2.5rem;color:var(--bd);">{{ ucfirst($page) }}</div>
  <div style="font-family:'Fredoka One',cursive;font-size:1rem;color:#aaa;">Coming soon 🚧</div>
  <a href="{{ route('home') }}" style="font-family:'Fredoka One',cursive;font-size:1rem;padding:0.7rem 1.8rem;border-radius:13px;border:2.5px solid var(--blk);box-shadow:4px 4px 0 var(--blk);background:var(--bd);color:#fff;text-decoration:none;">← Back to Home</a>
</div>
@endsection