<?php $__env->startSection('meta_title', $page->meta_title ?? 'Contact Accrosian – Get a Quote'); ?>
<?php $__env->startSection('meta_description', $page->meta_description ?? 'Get in touch with Accrosian for software development projects, consultations, and quotes.'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <?php if($page && $page->banner_image): ?>
        <img src="<?php echo e(asset('storage/'.$page->banner_image)); ?>" alt="Contact" class="page-hero-image" />
    <?php else: ?>
        <img src="<?php echo e(asset('assets/images/hero-bg-img-2.png')); ?>" alt="Contact" class="page-hero-image" />
    <?php endif; ?>
    <div class="hero-bg-effects">
        <div class="hero-orb hero-orb-1" style="opacity:0.08"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="container page-hero-inner">
        <h1 class="page-hero-title">Let's <span class="text-gradient">Talk</span></h1>
        <p class="page-hero-sub">Ready to start your project? Get a free consultation and detailed proposal within 48 hours.</p>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-grid">

            
            <div class="contact-info">
                <div class="reveal">
                    <span class="section-tag">Reach Us</span>
                    <h2 class="section-title" style="font-size:2rem">Get In <span class="text-gradient">Touch</span></h2>
                    <p style="color:var(--text-light);line-height:1.8;margin-bottom:36px">
                        We love hearing from businesses and startups with big ideas. Drop us a message and our team will respond within a few hours during business days.
                    </p>
                </div>

                <?php if(isset($setting) && $setting->address): ?>
                <div class="contact-info-card reveal reveal-delay-1">
                    <div class="contact-info-icon">📍</div>
                    <div>
                        <div class="contact-info-label">Office Address</div>
                        <div class="contact-info-value"><?php echo e($setting->address); ?></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(isset($setting) && $setting->contact_phone): ?>
                <div class="contact-info-card reveal reveal-delay-2">
                    <div class="contact-info-icon">📞</div>
                    <div>
                        <div class="contact-info-label">Phone Number</div>
                        <div class="contact-info-value"><a href="tel:<?php echo e($setting->contact_phone); ?>"><?php echo e($setting->contact_phone); ?></a></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(isset($setting) && $setting->contact_email): ?>
                <div class="contact-info-card reveal reveal-delay-3">
                    <div class="contact-info-icon">✉️</div>
                    <div>
                        <div class="contact-info-label">Email Address</div>
                        <div class="contact-info-value"><a href="mailto:<?php echo e($setting->contact_email); ?>"><?php echo e($setting->contact_email); ?></a></div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="contact-info-card reveal reveal-delay-4">
                    <div class="contact-info-icon">🕐</div>
                    <div>
                        <div class="contact-info-label">Business Hours</div>
                        <div class="contact-info-value">Monday – Friday: 9:00 AM – 6:00 PM IST</div>
                    </div>
                </div>

                <?php if(isset($setting) && ($setting->linkedin || $setting->twitter || $setting->instagram || $setting->facebook)): ?>
                <div class="reveal" style="margin-top:12px">
                    <h4 style="font-family:var(--font-display);font-weight:700;margin-bottom:16px">Follow Us</h4>
                    <div class="social-links">
                        <?php if($setting->linkedin): ?><a href="<?php echo e($setting->linkedin); ?>" class="social-link" title="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
                        <?php if($setting->twitter): ?><a href="<?php echo e($setting->twitter); ?>" class="social-link" title="Twitter" target="_blank"><i class="fab fa-x-twitter"></i></a><?php endif; ?>
                        <?php if($setting->instagram): ?><a href="<?php echo e($setting->instagram); ?>" class="social-link" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
                        <?php if($setting->facebook): ?><a href="<?php echo e($setting->facebook); ?>" class="social-link" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            
            <div class="contact-form-wrap reveal reveal-delay-2">
                <h3 class="form-title">Send Us a Message</h3>
                <p class="form-subtitle">Tell us about your project and we'll get back to you with a detailed proposal.</p>

                <?php if($errors->any()): ?>
                <div style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:16px;margin-bottom:20px">
                    <ul style="list-style:none;margin:0;padding:0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li style="color:#ef4444;font-size:0.9rem;margin-bottom:4px">• <?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form action="<?php echo e(route('contact.store')); ?>" method="POST" id="contact-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" placeholder="John Doe" value="<?php echo e(old('name')); ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" placeholder="john@company.com" value="<?php echo e(old('email')); ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="+91 98XXXXXXXX" value="<?php echo e(old('phone')); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" name="subject">
                                <option value="">Choose a Service</option>
                                <?php $__currentLoopData = ['Web Development','Mobile App Development','Cloud Solutions','UI/UX Design','AI & Machine Learning','Software Consulting','Multiple Services','General Enquiry']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($opt); ?>" <?php echo e(old('subject') === $opt ? 'selected' : ''); ?>><?php echo e($opt); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group full">
                            <label for="message">Project Details *</label>
                            <textarea id="message" name="message" placeholder="Describe your project, goals, timeline, and any specific requirements..." required><?php echo e(old('message')); ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:16px">
                        Send Message →
                    </button>
                    <p style="color:var(--text-muted);font-size:0.82rem;text-align:center;margin-top:16px">🔒 Your information is 100% confidential and secure.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\accroNew\resources\views/frontend/contact.blade.php ENDPATH**/ ?>