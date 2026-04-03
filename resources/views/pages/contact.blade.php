@extends('layouts.app')
@section('title', 'Contact Us')

@section('extra-styles')
.contact-wrap{
    display:flex;
    flex-direction:column;
    gap:1.2rem;
}

.page-hero{
    background:linear-gradient(135deg, var(--y) 0%, #ffe88a 100%);
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    padding:1.35rem 1.5rem;
    position:relative;
    overflow:hidden;
}

.page-hero::after{
    content:'📞';
    position:absolute;
    right:14px;
    bottom:-6px;
    font-size:4.8rem;
    opacity:0.12;
    pointer-events:none;
}

.page-hero-title{
    font-family:'Boogaloo',cursive;
    font-size:2.3rem;
    color:var(--bd);
    line-height:1;
    margin-bottom:0.35rem;
}

.page-hero-sub{
    font-size:0.95rem;
    font-weight:800;
    color:rgba(13,61,107,0.78);
}

.contact-grid{
    display:grid;
    grid-template-columns:1.1fr 0.9fr;
    gap:1.2rem;
}

.card{
    background:#fff;
    border:3px solid var(--blk);
    border-radius:var(--radius);
    box-shadow:var(--sh);
    overflow:hidden;
}

.card-hd{
    padding:0.95rem 1.2rem;
    border-bottom:2.5px solid var(--blk);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:0.5rem;
    background:var(--cr);
}

.card-title{
    font-family:'Fredoka One',cursive;
    font-size:1.05rem;
    color:var(--bd);
}

.card-body{
    padding:1.2rem;
}

.store-badge{
    display:inline-flex;
    align-items:center;
    gap:0.5rem;
    background:var(--yl);
    border:2.5px solid var(--blk);
    border-radius:999px;
    padding:0.55rem 1rem;
    font-family:'Fredoka One',cursive;
    font-size:1rem;
    margin-bottom:1rem;
    box-shadow:3px 3px 0 rgba(0,0,0,0.12);
}

.info-list{
    display:grid;
    gap:0.85rem;
}

.info-item{
    background:var(--bg);
    border:2px solid rgba(0,0,0,0.08);
    border-radius:14px;
    padding:0.9rem 1rem;
    display:flex;
    align-items:flex-start;
    gap:0.8rem;
    cursor:pointer;
    transition:transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease, background 0.15s ease;
}

.info-item:hover{
    transform:translate(-3px,-3px);
    box-shadow:4px 4px 0 var(--blk);
    border-color:var(--blk);
    background:#fffdf4;
}

.info-icon{
    width:42px;
    height:42px;
    border-radius:12px;
    background:#fff;
    border:2px solid var(--blk);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.2rem;
    flex-shrink:0;
}

.info-label{
    font-size:0.72rem;
    font-weight:900;
    text-transform:uppercase;
    letter-spacing:1.5px;
    color:#777;
    margin-bottom:0.18rem;
}

.info-value{
    font-size:0.98rem;
    font-weight:800;
    color:var(--blk);
    line-height:1.45;
}

.hours-box{
    margin-top:1rem;
    background:#fff8dc;
    border:2px dashed var(--blk);
    border-radius:14px;
    padding:0.9rem 1rem;
}

.hours-title{
    font-family:'Fredoka One',cursive;
    font-size:0.95rem;
    color:var(--bd);
    margin-bottom:0.5rem;
}

.hours-list{
    list-style:none;
    padding:0;
    margin:0;
    display:grid;
    gap:0.45rem;
}

.hours-list li{
    display:flex;
    justify-content:space-between;
    gap:1rem;
    font-weight:800;
    font-size:0.92rem;
}

.map-frame{
    width:100%;
    height:260px;
    border:3px solid var(--blk);
    border-radius:14px;
    overflow:hidden;
    box-shadow:var(--sh);
    background:#fff;
}

.form-grid{
    display:grid;
    gap:0.95rem;
}

.form-label{
    display:block;
    font-family:'Fredoka One',cursive;
    font-size:0.88rem;
    color:var(--bd);
    margin-bottom:0.45rem;
}

.form-control{
    width:100%;
    border:2.5px solid var(--blk);
    border-radius:14px;
    padding:0.85rem 1rem;
    font-family:'Nunito',sans-serif;
    font-size:0.96rem;
    font-weight:700;
    background:#fff;
    outline:none;
    transition:all 0.15s;
    box-shadow:2px 2px 0 rgba(0,0,0,0.08);
}

.form-control:focus{
    border-color:var(--bd);
    box-shadow:4px 4px 0 rgba(0,0,0,0.12);
    transform:translate(-1px,-1px);
}

textarea.form-control{
    min-height:140px;
    resize:vertical;
}

.contact-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:0.5rem;
    background:var(--bd);
    color:var(--y);
    border:2.5px solid var(--blk);
    border-radius:14px;
    padding:0.85rem 1.2rem;
    font-family:'Fredoka One',cursive;
    font-size:1rem;
    cursor:pointer;
    box-shadow:var(--sh);
    transition:all 0.15s;
}

.contact-btn:hover{
    transform:translate(-2px,-2px);
    box-shadow:var(--shl);
}

.quick-note{
    margin-top:1rem;
    background:#eef7ff;
    border:2px dashed var(--bd);
    border-radius:14px;
    padding:0.85rem 1rem;
    font-size:0.9rem;
    font-weight:800;
    color:#345;
}

@media(max-width:900px){
    .contact-grid{
        grid-template-columns:1fr;
    }
}

@media(max-width:700px){
    .page-hero{
        padding:1.05rem 1rem;
    }

    .page-hero-title{
        font-size:1.8rem;
    }

    .card-hd,
    .card-body{
        padding:1rem;
    }

    .store-badge{
        font-size:0.92rem;
        padding:0.5rem 0.9rem;
    }

    .map-frame{
        height:220px;
    }
}
@endsection

@section('content')
<div class="contact-wrap">

    <div class="page-hero">
        <div class="page-hero-title">Contact Us</div>
        <div class="page-hero-sub">We’d love to hear from you — visit us, call us, or send us a message 🍣</div>
    </div>

    <div class="contact-grid">
        {{-- Left side: store information --}}
        <div class="card">
    <div class="card-hd">
        <div class="card-title">Store Information</div>
    </div>

    <div class="card-body">
        <div class="store-badge">🍣 Minion Sushi</div>

        <div class="info-list">
            <div class="info-item">
                <div class="info-icon">📍</div>
                <div>
                    <div class="info-label">Location</div>
                    <div class="info-value">INTI International University, Nilai</div>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📞</div>
                <div>
                    <div class="info-label">Phone</div>
                    <div class="info-value">+60 12-345 6789</div>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📧</div>
                <div>
                    <div class="info-label">Email</div>
                    <div class="info-value">support@minionsushi.com</div>
                </div>
            </div>
        </div>

        <div class="hours-box">
            <div class="hours-title">Opening Hours</div>
            <ul class="hours-list">
                <li><span>Monday – Friday</span><span>10:00 AM – 10:00 PM</span></li>
                <li><span>Saturday – Sunday</span><span>11:00 AM – 11:00 PM</span></li>
            </ul>
        </div>

        <div class="quick-note">
            ✨ Dine-in, takeaway, and friendly service available for all sushi lovers!
        </div>

        <div style="margin-top:1rem;" class="map-frame">
            <iframe
                src="https://www.google.com/maps?q=INTI+Nilai&output=embed"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>
</div>

        {{-- Right side: contact form --}}
        <div class="card">
    <div class="card-hd">
        <div class="card-title">Send Us a Message</div>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div style="
                background:#dff7df;
                border:3px solid var(--blk);
                border-radius:16px;
                box-shadow:var(--sh);
                padding:1rem 1.2rem;
                font-weight:900;
                color:#1d5c2f;
                margin-bottom:1rem;
            ">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="
                background:#ffe4e4;
                border:3px solid var(--blk);
                border-radius:16px;
                box-shadow:var(--sh);
                padding:1rem 1.2rem;
                font-weight:800;
                color:#8b1e1e;
                margin-bottom:1rem;
            ">
                <ul style="margin:0; padding-left:1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="form-grid">
            @csrf

            <div>
                <label class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label class="form-label">Your Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
            </div>

            <div>
                <label class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="contact-btn">
                ✉️ Send Message
            </button>
        </form>
    </div>
</div>
    </div>

</div>
@endsection