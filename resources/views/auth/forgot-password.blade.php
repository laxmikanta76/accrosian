@extends('layouts.app')
@section('meta_title', 'Forgot Password – Accrosian')

@section('content')

<section style="min-height:85vh;display:flex;align-items:center;justify-content:center;padding:80px 20px;
background:linear-gradient(135deg,#0b1026,#1a237e);">

    <div style="width:100%;max-width:440px;
background:linear-gradient(145deg,#0b1026,#121a40);
border-radius:20px;
box-shadow:0 25px 80px rgba(0,0,0,0.6), 0 0 40px rgba(232,117,10,0.2);
border:1px solid rgba(255,255,255,0.05);
padding:10px;">

        ```
        <!-- HEADER -->
        <div style="text-align:center;margin-bottom:30px;padding-top:20px">
            <a href="{{ route('home') }}" style="display:inline-block;margin-bottom:18px">
                <img src="{{ asset('assets/images/logo2.png') }}" alt="Accrosian"
                    style="height:48px;border-radius:10px;opacity:0.9" />
            </a>

            <h1 style="font-family:var(--font-display);
    font-size:1.9rem;
    font-weight:800;
    color:white;">
                Reset Password
            </h1>

            <p style="color:var(--text-light);margin-top:6px;font-size:0.9rem">
                Enter your email and we'll send you a reset link
            </p>
        </div>

        <!-- FORM CARD -->
        <div style="
background:rgba(10,15,40,0.9);
border:1px solid rgba(255,255,255,0.08);
border-radius:16px;
padding:36px;
backdrop-filter: blur(10px);
box-shadow: inset 0 0 20px rgba(255,255,255,0.02);">

            @if(session('status'))
            <div style="background:rgba(16,185,129,0.1);
    border:1px solid rgba(16,185,129,0.3);
    border-radius:8px;
    padding:14px;
    margin-bottom:20px;
    color:#10b981;
    font-size:0.9rem">
                {{ session('status') }}
            </div>
            @endif

            @if($errors->any())
            <div style="background:rgba(239,68,68,0.1);
    border:1px solid rgba(239,68,68,0.3);
    border-radius:8px;
    padding:14px;
    margin-bottom:20px;
    color:#ef4444;
    font-size:0.9rem">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div style="margin-bottom:24px">
                    <label style="display:block;font-size:0.9rem;font-weight:600;color:var(--text);margin-bottom:8px">
                        Email Address
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required
                        style="width:100%;
            background:rgba(255,255,255,0.03);
            border:1px solid rgba(255,255,255,0.08);
            border-radius:10px;
            padding:13px 16px;
            color:white;
            font-size:0.95rem;
            outline:none;
            transition:all 0.3s ease;"
                        onfocus="this.style.borderColor='#e8750a';this.style.boxShadow='0 0 10px rgba(232,117,10,0.4)'"
                        onblur="this.style.borderColor='rgba(255,255,255,0.08)';this.style.boxShadow='none'">
                </div>

                <!-- BUTTON -->
                <button type="submit" style="
        width:100%;
        padding:14px;
        font-size:1rem;
        border:none;
        border-radius:50px;
        background:linear-gradient(135deg,#ff8c1a,#e8750a);
        color:white;
        font-weight:600;
        cursor:pointer;
        box-shadow:0 10px 30px rgba(232,117,10,0.4);
        transition:all 0.3s ease;"
                    onmouseover="this.style.transform='translateY(-3px) scale(1.02)';this.style.boxShadow='0 20px 50px rgba(232,117,10,0.6)'"
                    onmouseout="this.style.transform='none';this.style.boxShadow='0 10px 30px rgba(232,117,10,0.4)'">

                    Send Reset Link
                </button>

            </form>
        </div>

        <!-- FOOTER -->
        <p style="text-align:center;margin-top:22px;color:var(--text-light);font-size:0.9rem">
            Remember your password?
            <a href="{{ route('login') }}" style="color:#ff8c1a;font-weight:600;text-decoration:none">
                Sign in
            </a>
        </p>
        ```

    </div>
</section>
@endsection