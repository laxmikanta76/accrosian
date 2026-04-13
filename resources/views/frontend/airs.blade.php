@extends('layouts.app')

@section('meta_title', 'AIRS – India\'s First Structured Bridge Between Campus and Corporate')
@section('meta_description', 'AIRS by Accrosian transforms students into industry-ready problem solvers through
structured preparation, real-world understanding, and effective use of AI.')

@section('content')

{{-- ═══════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════ --}}
<section class="airs-hero">
    <div class="airs-hero-bg">
        <div class="airs-orb airs-orb-1"></div>
        <div class="airs-orb airs-orb-2"></div>
        <div class="airs-grid"></div>
    </div>

    <div class="container airs-hero-inner">
        <div class="airs-hero-content">
            <div class="airs-badge">
                <span class="airs-badge-dot"></span>
                An Initiative by Accrosian
            </div>

            <h1 class="airs-hero-title">
                India's First Structured Bridge Between
                <span class="text-gradient">Campus and Corporate</span>
            </h1>

            <p class="airs-hero-sub">
                AIRS is an initiative by Accrosian designed to transform students into
                industry-ready problem solvers through structured preparation, real-world
                understanding, and effective use of AI.
            </p>

            <div class="airs-hero-actions">
                <a href="{{ route('student.register') }}" class="btn btn-primary airs-btn-primary">
                    <span>🚀</span> Join AIRS
                </a>
                <a href="#fellowship" class="btn airs-btn-outline">
                    <span>🎯</span> Apply for Fellowship
                </a>
            </div>

            <div class="airs-hero-stats">
                @foreach([
                ['500+', 'Students Enrolled'],
                ['50+', 'Colleges Reached'],
                ['92%', 'Placement Rate'],
                ['100%', 'Industry Aligned'],
                ] as [$num, $label])
                <div class="airs-stat">
                    <div class="airs-stat-num">{{ $num }}</div>
                    <div class="airs-stat-label">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="airs-hero-visual">
            <div class="airs-bridge-card">
                <div class="airs-bridge-visual">
                    <div class="airs-building airs-building-left">
                        <div class="airs-building-icon">🎓</div>
                        <div class="airs-building-label">College</div>
                    </div>
                    <div class="airs-bridge-middle">
                        <div class="airs-bridge-line"></div>
                        <div class="airs-bridge-logo">AIRS</div>
                        <div class="airs-bridge-line"></div>
                    </div>
                    <div class="airs-building airs-building-right">
                        <div class="airs-building-icon">🏢</div>
                        <div class="airs-building-label">Corporate</div>
                    </div>
                </div>
                <div class="airs-bridge-tag">Bridging the Gap Since 2024</div>
            </div>

            <div class="airs-floating-cards">
                <div class="airs-float-card airs-float-1">
                    <span>⚡</span>
                    <div>
                        <div class="airs-float-val">Industry Ready</div>
                        <div class="airs-float-sub">In 90 Days</div>
                    </div>
                </div>
                <div class="airs-float-card airs-float-2">
                    <span>🤖</span>
                    <div>
                        <div class="airs-float-val">AI Powered</div>
                        <div class="airs-float-sub">Learning Path</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     WHAT IS AIRS
═══════════════════════════════════════ --}}
<section class="airs-section" style="background:var(--navy-mid)">
    <div class="container">
        <div class="airs-what-grid">
            <div class="reveal">
                <span class="section-tag">About AIRS</span>
                <h2 class="airs-section-title">What is <span class="text-gradient">AIRS?</span></h2>
                <p class="airs-section-sub" style="font-weight:700;margin-bottom:24px">
                    Bridging the gap between learning and industry.
                </p>
                <div class="airs-checklist">
                    @foreach([
                    'What the current job market looks like',
                    'What skills actually matter',
                    'How to prepare in a structured way',
                    'How to use AI effectively',
                    ] as $item)
                    <div class="airs-check-item">
                        <div class="airs-check-icon">✓</div>
                        <span>{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
                <div style="margin-top:36px">
                    <a href="{{ route('student.register') }}" class="btn btn-primary">
                        Join AIRS Now →
                    </a>
                </div>
            </div>

            <div class="airs-what-visual reveal reveal-delay-2">
                <div class="airs-campus-corporate">
                    <div class="airs-cc-side">
                        <div class="airs-cc-icon">🎓</div>
                        <div class="airs-cc-title">Campus</div>
                        <ul class="airs-cc-list">
                            <li>Theoretical Knowledge</li>
                            <li>Academic Projects</li>
                            <li>Classroom Learning</li>
                        </ul>
                    </div>
                    <div class="airs-cc-bridge">
                        <div class="airs-cc-bridge-icon">🌉</div>
                        <div class="airs-cc-bridge-text">AIRS</div>
                    </div>
                    <div class="airs-cc-side">
                        <div class="airs-cc-icon">🏢</div>
                        <div class="airs-cc-title">Corporate</div>
                        <ul class="airs-cc-list">
                            <li>Real Projects</li>
                            <li>Industry Skills</li>
                            <li>Professional Growth</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     THE GAP IS REAL
═══════════════════════════════════════ --}}
<section class="airs-section">
    <div class="container">
        <div style="text-align:center;margin-bottom:56px" class="reveal">
            <span class="section-tag">The Problem</span>
            <h2 class="airs-section-title">The Gap is <span class="text-gradient">Real</span></h2>
            <p class="airs-section-sub">
                Talent exists. Opportunity exists.
                <em style="color:var(--orange)">But the connection is missing.</em>
            </p>
        </div>

        <div class="airs-gap-grid">
            @foreach([
            ['🧭', 'No Clear Direction', 'Students don\'t know where to focus their energy and skills.'],
            ['📋', 'Surface-Level Projects', 'College projects lack real-world depth and industry relevance.'],
            ['🤖', 'Unstructured AI Use', 'AI tools are used without strategy, leading to poor outcomes.'],
            ['🏭', 'No Industry Exposure', 'Zero connection to how real companies think and operate.'],
            ] as [$icon, $title, $desc])
            <div class="airs-gap-card reveal">
                <div class="airs-gap-icon">{{ $icon }}</div>
                <h4 class="airs-gap-title">{{ $title }}</h4>
                <p class="airs-gap-desc">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     WHY AIRS
═══════════════════════════════════════ --}}
<section class="airs-section" style="background:var(--navy-mid)">
    <div class="container">
        <div style="text-align:center;margin-bottom:56px" class="reveal">
            <span class="section-tag">Our Solution</span>
            <h2 class="airs-section-title">Why <span class="text-gradient">AIRS?</span></h2>
        </div>

        <div class="airs-why-grid">
            @foreach([
            ['🏭', 'Industry Reality Exposure', 'var(--orange)', 'Understand what each role demands — not just job
            descriptions, but the reality of the work.', ['Learn industry expectations', 'Understand hiring criteria']],
            ['📐', 'Structured Preparation', '#6c63ff', 'A clear, structured path with no confusion — knowing exactly
            what to study and when.', ['Step-by-step learning path', 'Before interviews & beyond']],
            ['🤖', 'Effective Use of AI', '#eb5757', 'Learn to use AI so that it enhances your abilities including
            before industry-level projects.', ['AI as a skill multiplier', 'Before replacing technologies']],
            ['💡', 'Real Project Understanding', '#56ccf2', 'Not just building — but explaining, presenting, and owning
            your work like a professional.', ['Own your projects fully', 'Explain with confidence']],
            ] as [$icon, $title, $color, $desc, $points])
            <div class="airs-why-card reveal" style="--card-accent:{{ $color }}">
                <div class="airs-why-header" style="background:{{ $color }}">
                    <span style="font-size:1.3rem">{{ $icon }}</span>
                    <h4 class="airs-why-title">{{ $title }}</h4>
                </div>
                <div class="airs-why-body">
                    <p>{{ $desc }}</p>
                    <ul class="airs-why-list">
                        @foreach($points as $point)
                        <li><span style="color:{{ $color }}">✓</span> {{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     BEFORE VS AFTER
═══════════════════════════════════════ --}}
<section class="airs-section">
    <div class="container" style="max-width:860px">
        <div style="text-align:center;margin-bottom:56px" class="reveal">
            <span class="section-tag">Transformation</span>
            <h2 class="airs-section-title">What Changes <span class="text-gradient">After AIRS</span></h2>
        </div>

        <div class="airs-ba-grid reveal">
            {{-- BEFORE --}}
            <div class="airs-ba-card airs-ba-before">
                <div class="airs-ba-header" style="background:#1e3a8a">
                    <span>😓</span> Before AIRS
                </div>
                <ul class="airs-ba-list">
                    @foreach([
                    'Struggle to Explain Projects',
                    'AI Without Structure',
                    'Scattered Preparation',
                    'Lack Confidence in Interviews',
                    'No Industry Connections',
                    'Unclear Career Path',
                    ] as $item)
                    <li>
                        <span class="airs-ba-check airs-ba-check-before">✗</span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- DIVIDER --}}
            <div class="airs-ba-divider">
                <div class="airs-ba-arrow">→</div>
                <div class="airs-ba-label">AIRS</div>
            </div>

            {{-- AFTER --}}
            <div class="airs-ba-card airs-ba-after">
                <div class="airs-ba-header" style="background:var(--orange)">
                    <span>🚀</span> After AIRS
                </div>
                <ul class="airs-ba-list">
                    @foreach([
                    'Explain Projects End-to-End',
                    'AI, Structured & Effective',
                    'Clear Preparation Strategy',
                    'Industry-Ready Mindset',
                    'Real Industry Network',
                    'Defined Career Roadmap',
                    ] as $item)
                    <li>
                        <span class="airs-ba-check airs-ba-check-after">✓</span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     HOW AIRS OPERATES
═══════════════════════════════════════ --}}
<section class="airs-section" style="background:var(--navy-mid)">
    <div class="container">
        <div style="text-align:center;margin-bottom:56px" class="reveal">
            <span class="section-tag">How It Works</span>
            <h2 class="airs-section-title">How AIRS <span class="text-gradient">Operates</span></h2>
            <p class="airs-section-sub">Engaging students directly through:</p>
        </div>

        <div class="airs-how-grid">
            @foreach([
            ['🎓', 'College Sessions', 'Direct on-campus sessions bringing industry insight to your classroom.'],
            ['🛠', 'Workshops', 'Hands-on skill workshops designed around real industry requirements.'],
            ['🎤', 'Interactive Events', 'Panel discussions, hackathons, and networking events with professionals.'],
            ['💻', 'Online Platform', 'Coming soon — a dedicated platform for structured learning and mentorship.'],
            ['🤝', 'Mentorship Program', 'One-on-one mentorship from working professionals across top companies.'],
            ['📜', 'Certification', 'Industry-recognized certificates to validate your skills and learning.'],
            ] as $i => [$icon, $title, $desc])
            <div class="airs-how-card reveal reveal-delay-{{ ($i % 3) + 1 }}">
                <div class="airs-how-icon">{{ $icon }}</div>
                <h4 class="airs-how-title">{{ $title }}</h4>
                <p class="airs-how-desc">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     FELLOWSHIP SECTION
═══════════════════════════════════════ --}}
<section class="airs-section" id="fellowship">
    <div class="container" style="max-width:800px;text-align:center">
        <div class="reveal">
            <span class="section-tag">Fellowship Program</span>
            <h2 class="airs-section-title">Apply for the <span class="text-gradient">AIRS Fellowship</span></h2>
            <p class="airs-section-sub" style="margin-bottom:40px">
                The AIRS Fellowship is a selective program for high-potential students who want
                to go deeper — with dedicated mentorship, real project assignments, and a direct
                pathway to Accrosian internships and job opportunities.
            </p>

            <div class="airs-fellowship-perks">
                @foreach([
                ['🎯', 'Dedicated Mentor', '1:1 mentorship with a senior professional'],
                ['💼', 'Real Projects', 'Work on actual client projects'],
                ['📜', 'Certificate', 'AIRS Fellowship certificate'],
                ['🚀', 'Fast-Track Internship', 'Priority internship at Accrosian'],
                ] as [$icon, $title, $desc])
                <div class="airs-perk-card">
                    <div class="airs-perk-icon">{{ $icon }}</div>
                    <div class="airs-perk-title">{{ $title }}</div>
                    <div class="airs-perk-desc">{{ $desc }}</div>
                </div>
                @endforeach
            </div>

            <a href="{{ route('student.register') }}" class="btn btn-primary"
                style="padding:16px 48px;font-size:1.05rem;margin-top:16px">
                🎯 Apply for Fellowship →
            </a>
            <p style="color:var(--text-muted);font-size:0.82rem;margin-top:14px">
                Limited seats available — Applications reviewed on rolling basis
            </p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     FINAL CTA
═══════════════════════════════════════ --}}
<section class="cta-section">
    <div class="container cta-inner">
        <span class="section-tag" style="margin-bottom:20px">Ready to Transform?</span>
        <h2 class="cta-title">
            Don't Wait for Opportunity —
            <span class="text-gradient">Build Your Bridge</span>
        </h2>
        <p class="cta-subtitle">
            Join thousands of students already preparing the right way with AIRS.
        </p>
        <div class="cta-actions">
            <a href="{{ route('student.register') }}" class="btn btn-primary btn-arrow">
                🚀 Join AIRS Now
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ═══════════ HERO ═══════════ */
.airs-hero {
    position: relative;
    overflow: hidden;
    padding: 100px 0 80px;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.airs-hero-bg {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.airs-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.15;
}

.airs-orb-1 {
    width: 600px;
    height: 600px;
    background: var(--orange);
    top: -200px;
    left: -200px;
}

.airs-orb-2 {
    width: 500px;
    height: 500px;
    background: #6c63ff;
    bottom: -150px;
    right: -150px;
}

.airs-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
    background-size: 50px 50px;
}

.airs-hero-inner {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.airs-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 107, 53, 0.1);
    border: 1px solid rgba(255, 107, 53, 0.3);
    color: var(--orange);
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 0.82rem;
    font-weight: 600;
    margin-bottom: 24px;
}

.airs-badge-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--orange);
    animation: pulse 2s infinite;
}

@keyframes pulse {

    0%,
    100% {
        opacity: 1;
        transform: scale(1);
    }

    50% {
        opacity: 0.5;
        transform: scale(1.3);
    }
}

.airs-hero-title {
    font-family: var(--font-display, 'Sora', sans-serif);
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 900;
    line-height: 1.15;
    color: var(--white);
    margin-bottom: 20px;
}

.airs-hero-sub {
    color: var(--text-light);
    font-size: 1.05rem;
    line-height: 1.8;
    margin-bottom: 36px;
}

.airs-hero-actions {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 48px;
}

.airs-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 32px;
    font-size: 1rem;
    font-weight: 700;
}

.airs-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 28px;
    border-radius: 12px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    color: var(--white);
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s;
    background: rgba(255, 255, 255, 0.04);
}

.airs-btn-outline:hover {
    border-color: var(--orange);
    color: var(--orange);
    background: rgba(255, 107, 53, 0.08);
}

.airs-hero-stats {
    display: flex;
    gap: 32px;
    flex-wrap: wrap;
}

.airs-stat-num {
    font-family: var(--font-display, sans-serif);
    font-size: 1.8rem;
    font-weight: 900;
    color: var(--orange);
}

.airs-stat-label {
    color: var(--text-muted);
    font-size: 0.82rem;
    margin-top: 2px;
}

/* Hero Visual */
.airs-hero-visual {
    position: relative;
}

.airs-bridge-card {
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 32px;
    text-align: center;
    backdrop-filter: blur(10px);
}

.airs-bridge-visual {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0;
    margin-bottom: 20px;
}

.airs-building {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.airs-building-icon {
    font-size: 2.5rem;
    background: rgba(255, 255, 255, 0.06);
    width: 70px;
    height: 70px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.airs-building-label {
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--text-muted);
}

.airs-bridge-middle {
    display: flex;
    align-items: center;
    gap: 0;
    flex: 1;
    padding: 0 8px;
}

.airs-bridge-line {
    flex: 1;
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--orange), transparent);
    border-radius: 2px;
}

.airs-bridge-logo {
    background: var(--orange);
    color: #fff;
    font-weight: 900;
    font-size: 0.9rem;
    padding: 6px 14px;
    border-radius: 8px;
    letter-spacing: 2px;
    white-space: nowrap;
}

.airs-bridge-tag {
    color: var(--text-muted);
    font-size: 0.82rem;
}

.airs-floating-cards {
    position: absolute;
    width: 100%;
}

.airs-float-card {
    position: absolute;
    background: var(--navy-mid, #0d1526);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1.5rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    animation: floatUD 4s ease-in-out infinite;
}

.airs-float-1 {
    top: -20px;
    right: -20px;
    animation-delay: 0s;
}

.airs-float-2 {
    bottom: -20px;
    left: -20px;
    animation-delay: 2s;
}

.airs-float-val {
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--white);
}

.airs-float-sub {
    font-size: 0.75rem;
    color: var(--text-muted);
}

@keyframes floatUD {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }
}

/* ═══════════ COMMON SECTION ═══════════ */
.airs-section {
    padding: 80px 0;
}

.airs-section-title {
    font-family: var(--font-display, sans-serif);
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    font-weight: 900;
    color: var(--white);
    margin-bottom: 16px;
    line-height: 1.2;
}

.airs-section-sub {
    color: var(--text-light);
    font-size: 1rem;
    line-height: 1.7;
    max-width: 600px;
    margin: 0 auto;
}

/* ═══════════ WHAT IS AIRS ═══════════ */
.airs-what-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.airs-checklist {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-top: 8px;
}

.airs-check-item {
    display: flex;
    align-items: center;
    gap: 14px;
    color: var(--text-light);
    font-size: 0.95rem;
}

.airs-check-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: rgba(34, 197, 94, 0.15);
    border: 1px solid rgba(34, 197, 94, 0.4);
    color: #22c55e;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
    flex-shrink: 0;
}

.airs-campus-corporate {
    display: flex;
    align-items: stretch;
    gap: 0;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.08);
}

.airs-cc-side {
    flex: 1;
    padding: 28px 20px;
    background: rgba(255, 255, 255, 0.03);
    text-align: center;
}

.airs-cc-icon {
    font-size: 2rem;
    margin-bottom: 10px;
}

.airs-cc-title {
    font-family: var(--font-display, sans-serif);
    font-weight: 800;
    color: var(--white);
    margin-bottom: 14px;
    font-size: 1rem;
}

.airs-cc-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.airs-cc-list li {
    font-size: 0.82rem;
    color: var(--text-muted);
    padding: 6px 10px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 6px;
}

.airs-cc-bridge {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px 12px;
    background: linear-gradient(180deg, rgba(255, 107, 53, 0.1), rgba(255, 107, 53, 0.05));
    border-left: 1px solid rgba(255, 107, 53, 0.2);
    border-right: 1px solid rgba(255, 107, 53, 0.2);
    gap: 10px;
}

.airs-cc-bridge-icon {
    font-size: 1.8rem;
}

.airs-cc-bridge-text {
    font-size: 0.7rem;
    font-weight: 900;
    color: var(--orange);
    letter-spacing: 2px;
}

/* ═══════════ GAP SECTION ═══════════ */
.airs-gap-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.airs-gap-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.07);
    border-radius: 16px;
    padding: 28px 20px;
    text-align: center;
    transition: all 0.3s;
}

.airs-gap-card:hover {
    border-color: rgba(255, 107, 53, 0.3);
    transform: translateY(-4px);
}

.airs-gap-icon {
    font-size: 2.5rem;
    margin-bottom: 16px;
}

.airs-gap-title {
    font-family: var(--font-display, sans-serif);
    font-weight: 700;
    color: var(--white);
    font-size: 0.95rem;
    margin-bottom: 10px;
}

.airs-gap-desc {
    color: var(--text-muted);
    font-size: 0.82rem;
    line-height: 1.6;
}

/* ═══════════ WHY AIRS ═══════════ */
.airs-why-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.airs-why-card {
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.07);
    background: rgba(255, 255, 255, 0.02);
    transition: transform 0.3s;
}

.airs-why-card:hover {
    transform: translateY(-6px);
}

.airs-why-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 16px 18px;
    color: #fff;
}

.airs-why-title {
    font-family: var(--font-display, sans-serif);
    font-weight: 800;
    font-size: 0.9rem;
    color: #fff;
    margin: 0;
}

.airs-why-body {
    padding: 20px 18px;
}

.airs-why-body p {
    color: var(--text-light);
    font-size: 0.85rem;
    line-height: 1.7;
    margin-bottom: 14px;
}

.airs-why-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.airs-why-list li {
    font-size: 0.82rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 8px;
}

/* ═══════════ BEFORE / AFTER ═══════════ */
.airs-ba-grid {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    gap: 0;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.08);
}

.airs-ba-card {
    background: rgba(255, 255, 255, 0.02);
}

.airs-ba-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 16px 24px;
    font-weight: 800;
    font-size: 1rem;
    color: #fff;
    font-family: var(--font-display, sans-serif);
}

.airs-ba-list {
    list-style: none;
    padding: 20px 24px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.airs-ba-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.9rem;
    color: var(--text-light);
}

.airs-ba-check {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
    flex-shrink: 0;
}

.airs-ba-check-before {
    background: rgba(235, 87, 87, 0.15);
    border: 1px solid rgba(235, 87, 87, 0.4);
    color: #eb5757;
}

.airs-ba-check-after {
    background: rgba(34, 197, 94, 0.15);
    border: 1px solid rgba(34, 197, 94, 0.4);
    color: #22c55e;
}

.airs-ba-divider {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px 16px;
    background: rgba(255, 107, 53, 0.06);
    border-left: 1px solid rgba(255, 107, 53, 0.15);
    border-right: 1px solid rgba(255, 107, 53, 0.15);
    gap: 8px;
}

.airs-ba-arrow {
    font-size: 1.5rem;
    color: var(--orange);
    font-weight: 900;
}

.airs-ba-label {
    font-size: 0.65rem;
    font-weight: 900;
    color: var(--orange);
    letter-spacing: 2px;
}

/* ═══════════ HOW AIRS OPERATES ═══════════ */
.airs-how-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.airs-how-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.07);
    border-radius: 16px;
    padding: 32px 24px;
    text-align: center;
    transition: all 0.3s;
}

.airs-how-card:hover {
    border-color: rgba(255, 107, 53, 0.3);
    transform: translateY(-4px);
}

.airs-how-icon {
    font-size: 2.5rem;
    margin-bottom: 16px;
}

.airs-how-title {
    font-family: var(--font-display, sans-serif);
    font-weight: 700;
    color: var(--white);
    font-size: 1rem;
    margin-bottom: 10px;
}

.airs-how-desc {
    color: var(--text-muted);
    font-size: 0.85rem;
    line-height: 1.7;
}

/* ═══════════ FELLOWSHIP ═══════════ */
.airs-fellowship-perks {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 36px;
}

.airs-perk-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 14px;
    padding: 24px 16px;
    text-align: center;
    transition: all 0.3s;
}

.airs-perk-card:hover {
    border-color: rgba(255, 107, 53, 0.3);
    transform: translateY(-4px);
}

.airs-perk-icon {
    font-size: 2rem;
    margin-bottom: 12px;
}

.airs-perk-title {
    font-weight: 700;
    color: var(--white);
    font-size: 0.9rem;
    margin-bottom: 6px;
}

.airs-perk-desc {
    color: var(--text-muted);
    font-size: 0.78rem;
    line-height: 1.5;
}

/* ═══════════ RESPONSIVE ═══════════ */
@media (max-width: 1024px) {

    .airs-why-grid,
    .airs-gap-grid,
    .airs-fellowship-perks {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .airs-hero-inner {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .airs-hero-visual {
        display: none;
    }

    .airs-what-grid {
        grid-template-columns: 1fr;
    }

    .airs-gap-grid,
    .airs-why-grid,
    .airs-how-grid,
    .airs-fellowship-perks {
        grid-template-columns: 1fr 1fr;
    }

    .airs-ba-grid {
        grid-template-columns: 1fr;
    }

    .airs-ba-divider {
        flex-direction: row;
        padding: 12px 24px;
    }

    .airs-hero-stats {
        gap: 20px;
    }
}

@media (max-width: 480px) {

    .airs-gap-grid,
    .airs-why-grid,
    .airs-how-grid,
    .airs-fellowship-perks {
        grid-template-columns: 1fr;
    }

    .airs-hero-actions {
        flex-direction: column;
    }

    .airs-btn-primary,
    .airs-btn-outline {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endpush