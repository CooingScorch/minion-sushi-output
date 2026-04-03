@extends('layouts.admin')
@section('title', 'Contact Messages')

@section('content')
<div style="padding:1.5rem;display:flex;flex-direction:column;gap:1rem;">

    <div style="
        background:var(--cr);
        border:3px solid var(--blk);
        border-radius:18px;
        box-shadow:var(--sh);
        padding:1.2rem 1.2rem;
    ">
        <div style="font-family:'Boogaloo',cursive;font-size:2rem;color:var(--bd);line-height:1;">
            📩 Contact Messages
        </div>
        <div style="font-weight:800;color:#666;margin-top:0.35rem;">
            View customer contact enquiries and manage message records here.
        </div>
    </div>

    @if(session('success'))
        <div style="
            background:#dff7df;
            border:3px solid var(--blk);
            border-radius:16px;
            box-shadow:var(--sh);
            padding:0.95rem 1rem;
            font-weight:900;
            color:#1d5c2f;
        ">
            {{ session('success') }}
        </div>
    @endif

    @if($messages->count())
        @foreach($messages as $msg)
            <div style="
                background:#fff;
                border:3px solid var(--blk);
                border-radius:18px;
                box-shadow:var(--sh);
                padding:1rem;
                display:flex;
                flex-direction:column;
                gap:1rem;
                transition:all .14s;
            " onmouseover="this.style.transform='translate(-2px,-2px)';this.style.boxShadow='6px 6px 0 var(--blk)'"
               onmouseout="this.style.transform='translate(0,0)';this.style.boxShadow='4px 4px 0 var(--blk)'">

                <div style="display:flex;justify-content:space-between;gap:1rem;flex-wrap:wrap;align-items:flex-start;">
                    <div>
                        <div style="font-family:'Fredoka One',cursive;font-size:1.1rem;color:var(--bd);">
                            {{ $msg->name }}
                        </div>
                        <div style="font-size:0.92rem;font-weight:800;color:#666;">
                            {{ $msg->email }}
                        </div>
                        <div style="font-size:0.9rem;font-weight:800;color:#666;margin-top:0.15rem;">
                            {{ $msg->phone }}
                        </div>
                        <div style="font-size:0.82rem;font-weight:800;color:#888;margin-top:0.2rem;">
                            Submitted on {{ $msg->created_at->format('d M Y, h:i A') }}
                        </div>
                    </div>

                    <form action="{{ route('admin.contact.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="
                            background:#ffe0e0;
                            color:#8b1e1e;
                            border:2.5px solid var(--blk);
                            border-radius:12px;
                            padding:0.6rem 1rem;
                            font-family:'Fredoka One',cursive;
                            font-size:0.95rem;
                            cursor:pointer;
                            box-shadow:var(--sh);
                            transition:all .14s;
                        " onmouseover="this.style.transform='translate(-2px,-2px)';this.style.boxShadow='6px 6px 0 var(--blk)'"
                           onmouseout="this.style.transform='translate(0,0)';this.style.boxShadow='4px 4px 0 var(--blk)'">
                            🗑 Delete
                        </button>
                    </form>
                </div>

                <div style="
                    background:#fffdf5;
                    border:2px solid rgba(0,0,0,0.12);
                    border-radius:14px;
                    padding:1rem;
                ">
                    <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.95rem;margin-bottom:0.4rem;">
                        Customer Message
                    </div>
                    <div style="font-weight:800;color:#444;line-height:1.55;">
                        {{ $msg->message }}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div style="
            background:#fff;
            border:3px solid var(--blk);
            border-radius:18px;
            box-shadow:var(--sh);
            padding:1.2rem;
            font-weight:900;
            color:#666;
        ">
            No contact messages found yet.
        </div>
    @endif

</div>
@endsection