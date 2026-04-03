@extends('layouts.app')
@section('title', 'Feedback')

@section('extra-styles')
.feedback-wrap{
    display:flex;
    flex-direction:column;
    gap:1.2rem;
}

.page-kicker{
    font-family:'Fredoka One',cursive;
    font-size:0.82rem;
    letter-spacing:2.5px;
    text-transform:uppercase;
    color:var(--bd);
    opacity:0.78;
    margin-bottom:0.4rem;
}

.feedback-hero{
    background:linear-gradient(135deg, var(--y) 0%, #ffe566 100%);
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    padding:1.5rem 1.4rem;
    position:relative;
    overflow:hidden;
}

.feedback-hero::before{
    content:'🍣';
    position:absolute;
    right:18px;
    top:10px;
    font-size:4.6rem;
    opacity:0.12;
    pointer-events:none;
}

.feedback-hero::after{
    content:'⭐';
    position:absolute;
    right:72px;
    bottom:-10px;
    font-size:5.2rem;
    opacity:0.10;
    pointer-events:none;
}

.feedback-hero-top{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:1rem;
    flex-wrap:wrap;
}

.feedback-hero-title{
    font-family:'Boogaloo',cursive;
    font-size:2.2rem;
    line-height:1;
    color:var(--bd);
    margin-bottom:0.35rem;
}

.feedback-hero-sub{
    font-size:1rem;
    font-weight:800;
    color:#433;
    max-width:700px;
}

.voucher-pill{
    background:#fff;
    border:2.5px solid var(--blk);
    border-radius:999px;
    box-shadow:var(--sh);
    padding:0.65rem 1rem;
    display:inline-flex;
    align-items:center;
    gap:0.55rem;
    font-family:'Fredoka One',cursive;
    font-size:0.95rem;
    line-height:1.25;
    color:var(--blk);
    transition:all 0.14s;
}

.voucher-pill:hover{
    transform:translate(-2px,-2px);
    box-shadow:var(--shl);
}

.feedback-grid{
    display:grid;
    grid-template-columns:repeat(2, minmax(0, 1fr));
    gap:1rem;
}

.fb-card{
    background:#fff;
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    padding:1.2rem 1.15rem;
    display:flex;
    flex-direction:column;
    gap:0.85rem;
    transition:transform 0.14s, box-shadow 0.14s, background 0.14s;
    min-height:210px;
}

.fb-card:hover{
    transform:translate(-2px,-2px);
    box-shadow:var(--shl);
    background:#fffef8;
}

.fb-card.large{
    grid-column:1 / -1;
    min-height:auto;
}

.fb-head{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:0.8rem;
}

.fb-title-wrap{
    display:flex;
    flex-direction:column;
    gap:0.3rem;
}

.fb-title{
    font-family:'Fredoka One',cursive;
    font-size:1.15rem;
    color:var(--bd);
    line-height:1.1;
}

.fb-sub{
    font-size:0.84rem;
    font-weight:800;
    color:#666;
    line-height:1.35;
}

.fb-icon{
    font-size:2rem;
    line-height:1;
    flex-shrink:0;
}

.star-group{
    display:flex;
    flex-direction:row-reverse;
    justify-content:flex-end;
    gap:0.2rem;
    flex-wrap:wrap;
}

.star-group input{
    display:none;
}

.star-group label{
    font-size:2.2rem;
    line-height:1;
    cursor:pointer;
    filter:drop-shadow(1px 1px 0 var(--blk));
    transition:transform 0.12s, opacity 0.12s;
    opacity:0.38;
    user-select:none;
}

.star-group label:hover{
    transform:translateY(-2px) scale(1.05);
}

.star-group label:hover,
.star-group label:hover ~ label,
.star-group input:checked ~ label{
    opacity:1;
}

.star-note{
    font-size:0.84rem;
    font-weight:800;
    color:#666;
    margin-top:-0.05rem;
}

.overall-box{
    background:var(--yl);
    border:2px dashed rgba(0,0,0,0.18);
    border-radius:16px;
    padding:1rem;
}

.overall-box .star-group label{
    font-size:3rem;
}

.overall-score-text{
    font-size:0.9rem;
    font-weight:900;
    color:var(--bd);
    margin-top:0.55rem;
    min-height:1.2rem;
}

.comment-area{
    width:100%;
    min-height:160px;
    resize:vertical;
    border:2.5px solid var(--blk);
    border-radius:16px;
    padding:1rem 1rem;
    font-family:'Nunito',sans-serif;
    font-size:1rem;
    font-weight:700;
    color:var(--blk);
    background:#fffdfa;
    outline:none;
    transition:box-shadow 0.14s, transform 0.14s, background 0.14s;
    box-shadow:3px 3px 0 rgba(26,26,26,0.12);
}

.comment-area:focus{
    background:#fff;
    transform:translate(-1px,-1px);
    box-shadow:5px 5px 0 rgba(26,26,26,0.16);
}

.comment-area::placeholder{
    color:#999;
    font-weight:700;
}

.submit-wrap{
    display:flex;
    justify-content:flex-end;
}

.submit-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:0.55rem;
    background:var(--bd);
    color:var(--y);
    border:3px solid var(--blk);
    border-radius:16px;
    box-shadow:var(--sh);
    padding:0.95rem 1.4rem;
    font-family:'Fredoka One',cursive;
    font-size:1.08rem;
    text-decoration:none;
    cursor:pointer;
    transition:transform 0.14s, box-shadow 0.14s, filter 0.14s;
    min-width:240px;
}

.submit-btn:hover{
    transform:translate(-2px,-2px);
    box-shadow:var(--shl);
    filter:brightness(1.03);
}

.submit-btn:active{
    transform:translate(1px,1px);
    box-shadow:2px 2px 0 var(--blk);
}

.submit-hint{
    font-size:0.82rem;
    font-weight:800;
    color:#666;
    margin-top:0.25rem;
    text-align:right;
}

.helper-chip-row{
    display:flex;
    flex-wrap:wrap;
    gap:0.5rem;
}

.helper-chip{
    background:var(--bg);
    border:2px solid rgba(0,0,0,0.12);
    border-radius:999px;
    padding:0.38rem 0.72rem;
    font-size:0.8rem;
    font-weight:900;
    color:#555;
}

@media (max-width:900px){
    .feedback-grid{
        grid-template-columns:1fr;
    }

    .fb-card.large{
        grid-column:auto;
    }

    .feedback-hero-title{
        font-size:1.85rem;
    }
}

@media (max-width:700px){
    .feedback-hero{
        padding:1.15rem 1rem;
    }

    .feedback-hero-title{
        font-size:1.65rem;
    }

    .feedback-hero-sub{
        font-size:0.95rem;
    }

    .voucher-pill{
        width:100%;
        border-radius:18px;
        justify-content:center;
        text-align:center;
    }

    .fb-card{
        min-height:auto;
    }

    .overall-box .star-group label{
        font-size:2.45rem;
    }

    .star-group label{
        font-size:2rem;
    }

    .submit-wrap{
        justify-content:stretch;
    }

    .submit-btn{
        width:100%;
        min-width:0;
    }

    .submit-hint{
        text-align:center;
    }
}
@endsection

@section('content')
@if(session('success'))
    <div style="
        background:#dff7df;
        border:3px solid var(--blk);
        border-radius:var(--radius);
        box-shadow:var(--sh);
        padding:1rem 1.2rem;
        font-weight:900;
        color:#1d5c2f;
    ">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="
        background:#ffe4e4;
        border:3px solid var(--blk);
        border-radius:var(--radius);
        box-shadow:var(--sh);
        padding:1rem 1.2rem;
        font-weight:800;
        color:#8b1e1e;
    ">
        <ul style="margin:0; padding-left:1.2rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="feedback-wrap">
    <div>
        <div class="page-kicker">💬 Customer Reviews</div>
        <div class="feedback-hero">
            <div class="feedback-hero-top">
                <div>
                    <div class="feedback-hero-title">Thank You for Dining with Minion Sushi!</div>
                    <div class="feedback-hero-sub">
                        We’d love to hear about your order experience. Your feedback helps us serve better sushi, faster service, and a smoother ordering journey.
                    </div>
                </div>

                <div class="voucher-pill">
                    <span>🎁</span>
                    <span>Complete your feedback to enjoy your 5% voucher on your next order above RM60.</span>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('feedback.store') }}" method="POST" class="feedback-form">
        @csrf

        <div class="feedback-grid">
            <div class="fb-card large">
                <div class="fb-head">
                    <div class="fb-title-wrap">
                        <div class="fb-title">Overall Rating</div>
                        <div class="fb-sub">How was your overall experience with Minion Sushi today?</div>
                    </div>
                    <div class="fb-icon">🌟</div>
                </div>

                <div class="overall-box">
                    <div class="star-group overall-stars">
                        <input type="radio" id="overall-5" name="overall_rating" value="5">
                        <label for="overall-5">⭐</label>

                        <input type="radio" id="overall-4" name="overall_rating" value="4">
                        <label for="overall-4">⭐</label>

                        <input type="radio" id="overall-3" name="overall_rating" value="3">
                        <label for="overall-3">⭐</label>

                        <input type="radio" id="overall-2" name="overall_rating" value="2">
                        <label for="overall-2">⭐</label>

                        <input type="radio" id="overall-1" name="overall_rating" value="1">
                        <label for="overall-1">⭐</label>
                    </div>

                    <div class="overall-score-text" id="overallScoreText">Tap the stars to rate your experience</div>
                </div>
            </div>

            <div class="fb-card">
                <div class="fb-head">
                    <div class="fb-title-wrap">
                        <div class="fb-title">Food Taste</div>
                        <div class="fb-sub">Was your sushi delicious and satisfying?</div>
                    </div>
                    <div class="fb-icon">🍣</div>
                </div>

                <div class="star-group">
                    <input type="radio" id="taste-5" name="food_taste" value="5">
                    <label for="taste-5">⭐</label>

                    <input type="radio" id="taste-4" name="food_taste" value="4">
                    <label for="taste-4">⭐</label>

                    <input type="radio" id="taste-3" name="food_taste" value="3">
                    <label for="taste-3">⭐</label>

                    <input type="radio" id="taste-2" name="food_taste" value="2">
                    <label for="taste-2">⭐</label>

                    <input type="radio" id="taste-1" name="food_taste" value="1">
                    <label for="taste-1">⭐</label>
                </div>

                <div class="star-note">Rate the flavor and overall enjoyment.</div>
            </div>

            <div class="fb-card">
                <div class="fb-head">
                    <div class="fb-title-wrap">
                        <div class="fb-title">Food Freshness</div>
                        <div class="fb-sub">Did the food feel fresh and well-prepared?</div>
                    </div>
                    <div class="fb-icon">🧊</div>
                </div>

                <div class="star-group">
                    <input type="radio" id="fresh-5" name="food_freshness" value="5">
                    <label for="fresh-5">⭐</label>

                    <input type="radio" id="fresh-4" name="food_freshness" value="4">
                    <label for="fresh-4">⭐</label>

                    <input type="radio" id="fresh-3" name="food_freshness" value="3">
                    <label for="fresh-3">⭐</label>

                    <input type="radio" id="fresh-2" name="food_freshness" value="2">
                    <label for="fresh-2">⭐</label>

                    <input type="radio" id="fresh-1" name="food_freshness" value="1">
                    <label for="fresh-1">⭐</label>
                </div>

                <div class="star-note">Rate the freshness and food condition.</div>
            </div>

            <div class="fb-card">
                <div class="fb-head">
                    <div class="fb-title-wrap">
                        <div class="fb-title">Order Accuracy</div>
                        <div class="fb-sub">Did you receive the correct items in your order?</div>
                    </div>
                    <div class="fb-icon">✅</div>
                </div>

                <div class="star-group">
                    <input type="radio" id="accuracy-5" name="order_accuracy" value="5">
                    <label for="accuracy-5">⭐</label>

                    <input type="radio" id="accuracy-4" name="order_accuracy" value="4">
                    <label for="accuracy-4">⭐</label>

                    <input type="radio" id="accuracy-3" name="order_accuracy" value="3">
                    <label for="accuracy-3">⭐</label>

                    <input type="radio" id="accuracy-2" name="order_accuracy" value="2">
                    <label for="accuracy-2">⭐</label>

                    <input type="radio" id="accuracy-1" name="order_accuracy" value="1">
                    <label for="accuracy-1">⭐</label>
                </div>

                <div class="star-note">Rate whether everything arrived correctly.</div>
            </div>

            <div class="fb-card">
                <div class="fb-head">
                    <div class="fb-title-wrap">
                        <div class="fb-title">Service Speed</div>
                        <div class="fb-sub">How would you rate the speed of service?</div>
                    </div>
                    <div class="fb-icon">⚡</div>
                </div>

                <div class="star-group">
                    <input type="radio" id="speed-5" name="service_speed" value="5">
                    <label for="speed-5">⭐</label>

                    <input type="radio" id="speed-4" name="service_speed" value="4">
                    <label for="speed-4">⭐</label>

                    <input type="radio" id="speed-3" name="service_speed" value="3">
                    <label for="speed-3">⭐</label>

                    <input type="radio" id="speed-2" name="service_speed" value="2">
                    <label for="speed-2">⭐</label>

                    <input type="radio" id="speed-1" name="service_speed" value="1">
                    <label for="speed-1">⭐</label>
                </div>

                <div class="star-note">Rate preparation time and overall speed.</div>
            </div>

            <div class="fb-card large">
                <div class="fb-head">
                    <div class="fb-title-wrap">
                        <div class="fb-title">Additional Comments</div>
                        <div class="fb-sub">Tell us what you loved, or what we can improve next time.</div>
                    </div>
                    <div class="fb-icon">💬</div>
                </div>

                <div class="helper-chip-row">
                    <span class="helper-chip">Fresh sushi</span>
                    <span class="helper-chip">Fast service</span>
                    <span class="helper-chip">Packaging</span>
                    <span class="helper-chip">Wrong item</span>
                    <span class="helper-chip">Overall experience</span>
                </div>

                <textarea
                    class="comment-area"
                    name="comment"
                    placeholder="Example: The sushi was fresh and delicious, but I hope the order can arrive a little faster next time."
                ></textarea>

                <div class="submit-wrap">
                    <button type="submit" class="submit-btn">
                        <span>🚀</span>
                        <span>Submit Feedback</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
document.addEventListener('DOMContentLoaded', function () {
    const overallInputs = document.querySelectorAll('input[name="overall_rating"]');
    const overallText = document.getElementById('overallScoreText');

    const scoreMap = {
        '1': '😟 1/5 — We’re sorry. We’ll do better.',
        '2': '🙂 2/5 — Thanks for telling us how it went.',
        '3': '😊 3/5 — Not bad, but we can improve.',
        '4': '😄 4/5 — Great! We’re glad you enjoyed it.',
        '5': '🤩 5/5 — Awesome! Thank you for loving Minion Sushi.'
    };

    overallInputs.forEach(function (input) {
        input.addEventListener('change', function () {
            overallText.textContent = scoreMap[this.value] || 'Tap the stars to rate your experience';
        });
    });
});
@endsection