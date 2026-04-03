@extends('layouts.admin')
@section('title', 'Feedback Management')

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
            💬 Customer Feedback
        </div>
        <div style="font-weight:800;color:#666;margin-top:0.35rem;">
            View customer ratings, comments, and manage feedback records here.
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

    @if($feedbacks->count())
        @foreach($feedbacks as $fb)
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
                            {{ $fb->user->name ?? 'Unknown User' }}
                        </div>
                        <div style="font-size:0.9rem;font-weight:800;color:#666;">
                            {{ $fb->user->email ?? 'No email' }}
                        </div>
                        <div style="font-size:0.82rem;font-weight:800;color:#888;margin-top:0.2rem;">
                            Submitted on {{ $fb->created_at->format('d M Y, h:i A') }}
                        </div>
                    </div>

                    <form action="{{ route('admin.feedback.destroy', $fb->id) }}" method="POST" onsubmit="return confirm('Delete this feedback?')">
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
                    display:grid;
                    grid-template-columns:repeat(auto-fit, minmax(140px, 1fr));
                    gap:0.8rem;
                ">
                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Overall</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;">{{ $fb->overall_rating }}/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Food Taste</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;">{{ $fb->food_taste }}/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Freshness</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;">{{ $fb->food_freshness }}/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Accuracy</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;">{{ $fb->order_accuracy }}/5 ⭐</div>
                    </div>

                    <div style="background:var(--yl);border:2px solid var(--blk);border-radius:14px;padding:0.85rem;box-shadow:3px 3px 0 rgba(0,0,0,.14);">
                        <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.92rem;">Service Speed</div>
                        <div style="font-weight:900;font-size:1rem;margin-top:0.25rem;">{{ $fb->service_speed }}/5 ⭐</div>
                    </div>
                </div>

                <div style="
                    background:#fffdf5;
                    border:2px solid rgba(0,0,0,0.12);
                    border-radius:14px;
                    padding:1rem;
                ">
                    <div style="font-family:'Fredoka One',cursive;color:var(--bd);font-size:0.95rem;margin-bottom:0.4rem;">
                        Customer Comment
                    </div>
                    <div style="font-weight:800;color:#444;line-height:1.55;">
                        {{ $fb->comment ?: 'No comment provided.' }}
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
            No feedback found yet.
        </div>
    @endif

</div>
@endsection