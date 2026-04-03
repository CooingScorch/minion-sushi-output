<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minion Sushi - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&family=Fredoka+One&family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/login.css', 'resources/css/register.css', 'resources/js/app.js'])
</head>
<body>

<div class="login-bg" id="loginBg"></div>

<div class="login-box">
    <div class="login-title">Reset Password</div>
    <div class="login-sub">Enter your email to get a temporary password</div>

    @if(session('error'))
        <div class="login-err" style="display:block;">❌ {{ session('error') }}</div>
    @endif


    <form method="POST" action="/forgot-password">
        @csrf
        <input type="email" name="email" class="login-field" placeholder="📧 Registered Email" required>
        <button type="submit" class="login-btn">🚀 Send Temporary Password</button>
    </form>
    
    <p class="switch-text"><a href="/">Back to Login</a></p>
</div>

<script>
    // login background
    function initLoginBg(){
        const bg = document.getElementById("loginBg");
        const emojis = ["🍣","🍌","🥢","🍱","🐟","🌊","🍙","🍜","🥟"];
        for(let i = 0; i < 18; i++){
            const d = document.createElement("div");
            d.className = "emoji";
            d.textContent = emojis[i % emojis.length];
            d.style.left = Math.random() * 100 + "%";
            d.style.top  = Math.random() * 100 + "%";
            d.style.animationDuration = (5 + Math.random() * 8) + "s";
            d.style.animationDelay    = Math.random() * 6 + "s";
            bg.appendChild(d);
        }
    }
    initLoginBg();
</script>

</body>
</html>