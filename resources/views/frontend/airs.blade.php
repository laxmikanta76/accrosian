@extends('layouts.app')

@section('meta_title', 'AIRS – India\'s First Structured Bridge Between Campus and Corporate')
@section('meta_description', 'AIRS by Accrosian transforms students into industry-ready problem solvers.')

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="wrapper" data-aos="fade-up">
        <h1>
            India's First Structured Bridge Between <br>
            <span>Campus and Corporate</span>
        </h1>

        <p>
            AIRS is an initiative by Accrosian designed to transform students into industry-ready
            problem solvers through structured preparation, real-world understanding,
            and effective use of AI.
        </p>

        <div class="btn-group">
            <a href="{{ route('student.register') }}" class="btn primary">🚀 Join AIRS</a>
            <a href="#fellowship" class="btn outline">🎯 Apply for Fellowship</a>
        </div>
    </div>
</section>


{{-- WHAT --}}
<section class="section dark">
    <div class="wrapper">
        <h2 data-aos="fade-up">What is AIRS?</h2>

        <div class="content" data-aos="fade-up" data-aos-delay="100">

            <h4>1. Job Market Reality</h4>
            <ul>
                <li>Skills beat degrees → Projects matter more than marks</li>
                <li>High competition → Global competition</li>
                <li>Hybrid roles → Tech + business skills</li>
            </ul>

            <h4>2. Skills That Matter</h4>
            <ul>
                <li>Problem-solving → Apply knowledge</li>
                <li>Communication → Explain clearly</li>
                <li>Adaptability → Learn tools</li>
            </ul>

            <h4>3. Structured Preparation</h4>
            <ul>
                <li>Learn → Build → Show</li>
                <li>Follow roadmap</li>
                <li>Consistency wins</li>
            </ul>

            <h4>4. Using AI Smartly</h4>
            <ul>
                <li>Assistant, not shortcut</li>
                <li>Always verify</li>
                <li>Use for speed, not dependency</li>
            </ul>

        </div>
    </div>
</section>


{{-- GAP --}}
<section class="section black">
    <div class="wrapper center">
        <h2 data-aos="fade-up">The Gap is Real</h2>

        <div class="grid">
            <div class="card" data-aos="zoom-in">🧭 No Direction</div>
            <div class="card" data-aos="zoom-in" data-aos-delay="100">📋 Weak Projects</div>
            <div class="card" data-aos="zoom-in" data-aos-delay="200">🤖 Poor AI Use</div>
            <div class="card" data-aos="zoom-in" data-aos-delay="300">🏭 No Exposure</div>
        </div>
    </div>
</section>


{{-- WHY --}}
<section class="section dark">
    <div class="wrapper center">
        <h2 data-aos="fade-up">Why AIRS?</h2>

        <div class="grid">
            <div class="card">🏭 Industry Exposure</div>
            <div class="card">📐 Structured Learning</div>
            <div class="card">🤖 Smart AI Use</div>
            <div class="card">💡 Project Ownership</div>
        </div>
    </div>
</section>


{{-- CTA --}}
<section class="cta">
    <h2 data-aos="zoom-in">Build Your Future with AIRS</h2>
    <a href="{{ route('student.register') }}" class="btn primary">🚀 Join Now</a>
</section>

@endsection


{{-- CSS --}}
@push('styles')
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* BODY */
body {
    background: #020617;
    color: #fff;
    font-family: 'Segoe UI', sans-serif;
}

/* WRAPPER */
.wrapper {
    max-width: 1100px;
    margin: auto;
    padding: 0 20px;
}

/* HERO */
.hero {
    padding-top: 140px;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.hero h1 {
    font-size: 3rem;
    font-weight: 900;
}

.hero span {
    color: #ff6b35;
}

.hero p {
    margin: 20px 0;
    color: #cbd5e1;
    max-width: 500px;
}

/* BUTTON */
.btn {
    padding: 12px 25px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
}

.primary {
    background: #ff6b35;
    color: #fff;
}

.outline {
    border: 1px solid #fff;
    color: #fff;
}

.btn:hover {
    transform: translateY(-3px);
}

/* BTN GROUP */
.btn-group {
    display: flex;
    gap: 15px;
}

/* SECTION */
.section {
    padding: 80px 0;
}

.dark {
    background: #0f172a;
}

.black {
    background: #020617;
}

/* CONTENT */
.content {
    margin-top: 30px;
}

/* GRID */
.grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 40px;
}

/* CARD */
.card {
    background: rgba(255, 255, 255, 0.05);
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-10px);
}

/* CENTER */
.center {
    text-align: center;
}

/* CTA */
.cta {
    text-align: center;
    padding: 80px 0;
}

/* RESPONSIVE */
@media(max-width:768px) {
    .grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media(max-width:480px) {
    .grid {
        grid-template-columns: 1fr;
    }

    .btn-group {
        flex-direction: column;
    }
}
</style>
@endpush


{{-- JS --}}
@push('scripts')
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 1000,
    once: true
});
</script>
@endpush