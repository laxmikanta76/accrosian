@extends('layouts.app')

@section('meta_title', 'Student Registration – Accrosian')
@section('meta_description', 'Register as a student at Accrosian. Join our internship and training programs.')

@section('content')


<section class="page-hero" style="position:relative;overflow:hidden;min-height:320px;display:flex;align-items:center">

    {{-- Background image --}}
    <div style="position:absolute;inset:0;z-index:0">
        <img src="{{ asset('assets/images/student-reg-img.png') }}" alt="Student Registration"
            style="width:100%;height:100%;object-fit:cover;opacity:0.15;display:block">
        <div style="position:absolute;inset:0;background:linear-gradient(135deg,var(--navy) 30%,rgba(10,15,30,0.85))">
        </div>
    </div>

    <div class="hero-bg-effects" style="position:relative;z-index:1">
        <div class="hero-orb hero-orb-1" style="opacity:0.08"></div>
        <div class="hero-grid"></div>
    </div>

    <div class="container page-hero-inner" style="position:relative;z-index:2">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="breadcrumb-sep">/</span>
            <span>Student Registration</span>
        </div>
        <div style="font-size:3rem;margin-bottom:12px">🎓</div>
        <h1 class="page-hero-title">
            Student <span class="text-gradient">Registration</span>
        </h1>
        <p class="page-hero-sub">
            Join Accrosian's internship and training programs. Kickstart your tech career with us.
        </p>
        <div style="display:flex;gap:12px;margin-top:20px;flex-wrap:wrap">
            @foreach(['Real Projects','Expert Mentors','Certificate','Job Opportunities'] as $tag)
            <span style="background:rgba(255,107,53,0.15);border:1px solid rgba(255,107,53,0.3);
                         color:var(--orange);padding:5px 14px;border-radius:20px;
                         font-size:0.82rem;font-weight:600">✓ {{ $tag }}</span>
            @endforeach
        </div>
    </div>
</section>

<section style="padding:80px 0">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 420px;gap:40px;align-items:start">

            {{-- ═══ LEFT: REGISTRATION FORM ═══ --}}
            <div>
                <div class="service-card" style="padding:40px">
                    <h3 style="font-family:var(--font-display);font-size:1.5rem;font-weight:800;margin-bottom:8px">
                        Apply Now
                    </h3>
                    <p style="color:var(--text-muted);margin-bottom:32px;font-size:0.95rem">
                        Fill in your details below and upload your resume to apply for our programs.
                    </p>

                    @if($errors->any())
                    <div style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);
                                border-radius:8px;padding:16px;margin-bottom:24px">
                        <ul style="list-style:none;margin:0;padding:0">
                            @foreach($errors->all() as $error)
                            <li style="color:#ef4444;font-size:0.9rem;margin-bottom:4px">• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('student.register.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">

                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    Full Name *
                                </label>
                                <input type="text" id="name" name="name" placeholder="Your full name"
                                    value="{{ old('name') }}" required style="width:100%;box-sizing:border-box" />
                            </div>

                            {{-- Mobile --}}
                            <div class="form-group">
                                <label for="mobile"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    Mobile Number *
                                </label>
                                <input type="tel" id="mobile" name="mobile" placeholder="+91 98XXXXXXXX"
                                    value="{{ old('mobile') }}" required style="width:100%;box-sizing:border-box" />
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <label for="email"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    Email Address *
                                </label>
                                <input type="email" id="email" name="email" placeholder="you@email.com"
                                    value="{{ old('email') }}" required style="width:100%;box-sizing:border-box" />
                            </div>

                            {{-- College --}}
                            <div class="form-group">
                                <label for="college_name"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    College Name *
                                </label>
                                <input type="text" id="college_name" name="college_name"
                                    placeholder="Your college/university" value="{{ old('college_name') }}" required
                                    style="width:100%;box-sizing:border-box" />
                            </div>

                            {{-- Course --}}
                            <div class="form-group">
                                <label for="course"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    Course *
                                </label>
                                <select id="course" name="course" required style="width:100%;box-sizing:border-box">
                                    <option value="">Select Course</option>
                                    @foreach(['B.Tech / B.E.','M.Tech / M.E.','BCA','MCA','B.Sc (CS/IT)','M.Sc
                                    (CS/IT)','MBA (IT)','Diploma','Other'] as $c)
                                    <option value="{{ $c }}" {{ old('course') === $c ? 'selected' : '' }}>
                                        {{ $c }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Year --}}
                            <div class="form-group">
                                <label for="year"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    Current Year *
                                </label>
                                <select id="year" name="year" required style="width:100%;box-sizing:border-box">
                                    <option value="">Select Year</option>
                                    @foreach(['1st Year','2nd Year','3rd Year','4th Year','Final Year','Passed Out /
                                    Graduate'] as $y)
                                    <option value="{{ $y }}" {{ old('year') === $y ? 'selected' : '' }}>
                                        {{ $y }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Specialization --}}
                            <div class="form-group" style="grid-column:span 2">
                                <label for="specialization"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    Specialization <span
                                        style="color:var(--text-muted);font-weight:400">(optional)</span>
                                </label>
                                <input type="text" id="specialization" name="specialization"
                                    placeholder="e.g. Web Development, AI/ML, Mobile Apps, Cloud..."
                                    value="{{ old('specialization') }}" style="width:100%;box-sizing:border-box" />
                            </div>

                            {{-- Resume Upload --}}
                            <div class="form-group" style="grid-column:span 2">
                                <label for="resume"
                                    style="display:block;margin-bottom:8px;font-weight:600;font-size:0.9rem;color:var(--text-light)">
                                    Upload Resume <span style="color:var(--text-muted);font-weight:400">(PDF only, max
                                        2MB)</span>
                                </label>
                                <div style="border:2px dashed var(--border);border-radius:12px;padding:24px;
                                            text-align:center;cursor:pointer;transition:border-color 0.2s;
                                            background:var(--navy-light)" id="dropZone"
                                    onclick="document.getElementById('resume').click()"
                                    ondragover="event.preventDefault();this.style.borderColor='var(--orange)'"
                                    ondragleave="this.style.borderColor='var(--border)'" ondrop="handleDrop(event)">
                                    <div style="font-size:2rem;margin-bottom:8px">📄</div>
                                    <p style="color:var(--text-light);font-size:0.9rem;margin-bottom:4px">
                                        <strong style="color:var(--orange)">Click to upload</strong> or drag & drop
                                    </p>
                                    <p style="color:var(--text-muted);font-size:0.8rem">PDF files only — max 2MB</p>
                                    <div id="fileName" style="display:none;margin-top:10px;color:var(--orange);
                                                font-size:0.88rem;font-weight:600"></div>
                                </div>
                                <input type="file" id="resume" name="resume" accept=".pdf" style="display:none"
                                    onchange="showFileName(this)" />
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary"
                            style="width:100%;justify-content:center;padding:16px;margin-top:8px;font-size:1rem">
                            Submit Registration →
                        </button>

                        <p style="color:var(--text-muted);font-size:0.82rem;text-align:center;margin-top:16px">
                            🔒 Your information is 100% safe and confidential.
                        </p>
                    </form>
                </div>
            </div>

            {{-- ═══ RIGHT: COMPANY BROCHURE PREVIEW ═══ --}}
            <div style="position:sticky;top:100px">

                {{-- Preview Button --}}
                <a href="#pdfPreview" onclick="document.getElementById('pdfPreview').scrollIntoView({behavior:'smooth'});
                            document.getElementById('pdfFrame').src='{{ asset($brochurePdf) }}';
                            document.getElementById('pdfPreview').style.display='block';
                            return false;" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px;margin-bottom:20px;
                          display:flex;align-items:center;gap:10px;text-decoration:none">
                    <span style="font-size:1.2rem">📋</span>
                    Preview Company Brochure
                </a>

                {{-- Info Card --}}
                <div class="service-card" style="padding:28px;margin-bottom:20px">
                    <h4 style="font-family:var(--font-display);font-weight:800;font-size:1.1rem;margin-bottom:16px">
                        Why Join Accrosian?
                    </h4>
                    @foreach([
                    ['🚀', 'Real Project Experience', 'Work on live client projects from day one.'],
                    ['👨‍💻', 'Expert Mentorship', 'Learn from senior developers and architects.'],
                    ['📜', 'Internship Certificate', 'Get an industry-recognized certificate.'],
                    ['💼', 'Job Opportunities', 'Top performers get full-time job offers.'],
                    ['🕐', 'Flexible Duration', '1 to 6 month programs available.'],
                    ] as [$icon, $title, $desc])
                    <div style="display:flex;gap:14px;margin-bottom:18px;align-items:flex-start">
                        <div style="font-size:1.4rem;margin-top:2px">{{ $icon }}</div>
                        <div>
                            <div style="font-weight:700;color:var(--white);font-size:0.92rem;margin-bottom:3px">
                                {{ $title }}</div>
                            <div style="color:var(--text-muted);font-size:0.82rem">{{ $desc }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Contact quick info --}}
                <div class="service-card" style="padding:20px;text-align:center">
                    <p style="color:var(--text-muted);font-size:0.85rem;margin-bottom:12px">
                        Questions? Reach us at
                    </p>
                    <a href="mailto:info@accrosian.com"
                        style="color:var(--orange);font-weight:700;text-decoration:none">
                        info@accrosian.com
                    </a>
                </div>
            </div>
        </div>

        {{-- PDF PREVIEW MODAL SECTION --}}
        <div id="pdfPreview" style="display:none;margin-top:48px">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
                <h3 style="font-family:var(--font-display);font-weight:700;font-size:1.2rem">
                    📋 Company Brochure
                </h3>
                <button onclick="document.getElementById('pdfPreview').style.display='none';
                                 document.getElementById('pdfFrame').src='';" style="background:rgba(255,255,255,0.08);border:1px solid var(--border);
                               color:var(--text-light);padding:8px 16px;border-radius:8px;
                               cursor:pointer;font-size:0.88rem">
                    ✕ Close Preview
                </button>
            </div>
            <div style="border:1px solid var(--border);border-radius:16px;overflow:hidden;
                        background:var(--navy-light)">
                <iframe id="pdfFrame" src="" style="width:100%;height:700px;border:none;display:block"
                    title="Company Brochure">
                </iframe>
            </div>
            <div style="text-align:center;margin-top:16px">
                <a href="{{ asset($brochurePdf) }}" download class="btn btn-outline"
                    style="display:inline-flex;align-items:center;gap:8px">
                    ⬇ Download Brochure
                </a>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
function showFileName(input) {
    const fileNameDiv = document.getElementById('fileName');
    if (input.files && input.files[0]) {
        fileNameDiv.style.display = 'block';
        fileNameDiv.textContent = '✓ ' + input.files[0].name;
        document.getElementById('dropZone').style.borderColor = 'var(--orange)';
    }
}

function handleDrop(event) {
    event.preventDefault();
    const file = event.dataTransfer.files[0];
    if (file && file.type === 'application/pdf') {
        const input = document.getElementById('resume');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        input.files = dataTransfer.files;
        showFileName(input);
    }
    document.getElementById('dropZone').style.borderColor = 'var(--border)';
}
</script>
@endpush