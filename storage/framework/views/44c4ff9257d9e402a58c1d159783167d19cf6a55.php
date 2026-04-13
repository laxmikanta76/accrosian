

<?php $__env->startSection('meta_title', 'AIRS – India\'s First Structured Bridge Between Campus and Corporate'); ?>
<?php $__env->startSection('meta_description', 'AIRS by Accrosian transforms students into industry-ready problem solvers.'); ?>

<?php $__env->startSection('content'); ?>


<section class="hero-section">
    <div class="container">
        <div data-aos="fade-up">
            <h1>
                India's First Structured Bridge Between
                <span>Campus and Corporate</span>
            </h1>

            <p>
                AIRS is an initiative by Accrosian designed to transform students into industry-ready
                problem solvers through structured preparation, real-world understanding,
                and effective use of AI.
            </p>

            <div class="hero-btns">
                <a href="<?php echo e(route('student.register')); ?>" class="btn btn-primary">🚀 Join AIRS</a>
                <a href="#fellowship" class="btn btn-outline">🎯 Apply for Fellowship</a>
            </div>
        </div>
    </div>
</section>



<section class="section-dark">
    <div class="container">
        <h2 data-aos="fade-up">What is AIRS?</h2>

        <div class="content-box" data-aos="fade-up" data-aos-delay="100">

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



<section class="section-black">
    <div class="container text-center">

        <h2 data-aos="fade-up">The Gap is Real</h2>

        <div class="row mt-5">

            <div class="col-md-3 card-box" data-aos="zoom-in" data-aos-delay="100">
                <h4>🧭 No Direction</h4>
                <p>Students jump between courses without roadmap.</p>
            </div>

            <div class="col-md-3 card-box" data-aos="zoom-in" data-aos-delay="200">
                <h4>📋 Weak Projects</h4>
                <p>Projects lack depth and real-world context.</p>
            </div>

            <div class="col-md-3 card-box" data-aos="zoom-in" data-aos-delay="300">
                <h4>🤖 Poor AI Use</h4>
                <p>Dependency without understanding.</p>
            </div>

            <div class="col-md-3 card-box" data-aos="zoom-in" data-aos-delay="400">
                <h4>🏭 No Exposure</h4>
                <p>No real industry workflow experience.</p>
            </div>

        </div>
    </div>
</section>



<section class="section-dark">
    <div class="container text-center">

        <h2 data-aos="fade-up">Why AIRS?</h2>

        <div class="row mt-5">

            <div class="col-md-3 card-box" data-aos="fade-up" data-aos-delay="100">
                <h4>🏭 Industry Exposure</h4>
            </div>

            <div class="col-md-3 card-box" data-aos="fade-up" data-aos-delay="200">
                <h4>📐 Structured Learning</h4>
            </div>

            <div class="col-md-3 card-box" data-aos="fade-up" data-aos-delay="300">
                <h4>🤖 Smart AI Use</h4>
            </div>

            <div class="col-md-3 card-box" data-aos="fade-up" data-aos-delay="400">
                <h4>💡 Project Ownership</h4>
            </div>

        </div>
    </div>
</section>



<section class="section-black">
    <div class="container">

        <h2 class="text-center" data-aos="fade-up">Before vs After AIRS</h2>

        <div class="row mt-5">

            <div class="col-md-6 card-box" data-aos="fade-right">
                <h4 class="text-danger">Before</h4>
                <ul>
                    <li>Projects without understanding</li>
                    <li>Random learning</li>
                    <li>No confidence</li>
                </ul>
            </div>

            <div class="col-md-6 card-box" data-aos="fade-left">
                <h4 class="text-success">After</h4>
                <ul>
                    <li>Explain projects clearly</li>
                    <li>Structured roadmap</li>
                    <li>Industry-ready mindset</li>
                </ul>
            </div>

        </div>
    </div>
</section>



<section class="cta">
    <h2 data-aos="zoom-in">Build Your Future with AIRS</h2>
    <a href="<?php echo e(route('student.register')); ?>" class="btn btn-primary mt-3">🚀 Join Now</a>
</section>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('styles'); ?>
<style>
/* GLOBAL */
body {
    background: #020617;
    color: #fff;
    font-family: 'Segoe UI', sans-serif;
}

section {
    padding: 80px 0;
}

/* HERO */
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #020617, #0f172a);
}

.hero-section h1 {
    font-size: 3rem;
    font-weight: 900;
}

.hero-section span {
    color: #ff6b35;
}

/* BUTTON */
.btn {
    padding: 12px 25px;
    border-radius: 8px;
    text-decoration: none;
}

.btn-primary {
    background: #ff6b35;
    color: #fff;
}

.btn-outline {
    border: 1px solid #fff;
    color: #fff;
}

/* CARDS */
.card-box {
    background: rgba(255, 255, 255, 0.03);
    padding: 20px;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.card-box:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
}

/* LIST HOVER */
ul li:hover {
    transform: translateX(6px);
    color: #ff6b35;
}

/* CTA */
.cta {
    text-align: center;
}

/* DARK BG */
.section-dark {
    background: #0f172a;
}

.section-black {
    background: #020617;
}
</style>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('scripts'); ?>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 1000,
    once: true,
    offset: 80,
});
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/frontend/airs.blade.php ENDPATH**/ ?>