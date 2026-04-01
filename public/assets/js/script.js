/* =============================================
   ACCROSIAN - Main JavaScript
   ============================================= */

// ============ LOADER ============
window.addEventListener("load", () => {
  const loader = document.querySelector(".loader");

  if (!loader) return;

  if (!sessionStorage.getItem("loaderShown")) {
    sessionStorage.setItem("loaderShown", "true");

    setTimeout(() => {
      loader.classList.add("hidden");
    }, 2000);
  }
});

// ============ NAVBAR SCROLL ============
const navbar = document.querySelector(".navbar");
window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    navbar?.classList.add("scrolled");
  } else {
    navbar?.classList.remove("scrolled");
  }
  // Back to top
  const btn = document.querySelector(".back-to-top");
  if (btn) {
    if (window.scrollY > 400) btn.classList.add("visible");
    else btn.classList.remove("visible");
  }
});

// ============ MOBILE NAV ============
const hamburger = document.querySelector(".hamburger");
const mobileNav = document.querySelector(".mobile-nav");
const mobileClose = document.querySelector(".mobile-close");

hamburger?.addEventListener("click", () => {
  mobileNav?.classList.add("open");
  document.body.style.overflow = "hidden";
});
mobileClose?.addEventListener("click", closeMobileNav);
mobileNav
  ?.querySelectorAll("a")
  .forEach((a) => a.addEventListener("click", closeMobileNav));

function closeMobileNav() {
  mobileNav?.classList.remove("open");
  document.body.style.overflow = "";
}

// ============ BACK TO TOP ============
document.querySelector(".back-to-top")?.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

// ============ SCROLL REVEAL ============
const reveals = document.querySelectorAll(".reveal");
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        e.target.classList.add("visible");
      }
    });
  },
  { threshold: 0.1, rootMargin: "0px 0px -50px 0px" },
);

reveals.forEach((el) => revealObserver.observe(el));

// ============ COUNTER ANIMATION ============
function animateCounter(el) {
  const target = parseFloat(el.dataset.target);
  const isDecimal = el.dataset.decimal === "true";
  const suffix = el.dataset.suffix || "";
  const duration = 2000;
  const start = performance.now();

  function update(now) {
    const elapsed = now - start;
    const progress = Math.min(elapsed / duration, 1);
    const eased = 1 - Math.pow(1 - progress, 3);
    const current = target * eased;
    el.textContent = isDecimal
      ? current.toFixed(1) + suffix
      : Math.floor(current) + suffix;
    if (progress < 1) requestAnimationFrame(update);
  }
  requestAnimationFrame(update);
}

const counterObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting && !e.target.dataset.animated) {
        e.target.dataset.animated = "true";
        animateCounter(e.target);
      }
    });
  },
  { threshold: 0.5 },
);

document
  .querySelectorAll("[data-target]")
  .forEach((el) => counterObserver.observe(el));

// ============ TESTIMONIALS SLIDER ============
const track = document.querySelector(".testimonials-track");
const dots = document.querySelectorAll(".slider-dot");
let currentSlide = 0;

function getVisibleCount() {
  return window.innerWidth < 768 ? 1 : 2;
}

function getTotalSlides() {
  const cards = document.querySelectorAll(".testimonial-card");
  return Math.ceil(cards.length / getVisibleCount());
}

function goToSlide(index) {
  if (!track) return;

  const cards = document.querySelectorAll(".testimonial-card");
  const visible = getVisibleCount();
  const total = Math.ceil(cards.length / visible);

  currentSlide = ((index % total) + total) % total;

  // ✅ MOVE BY PERCENT INSTEAD OF PX (BEST PRACTICE)
  const movePercent = 100 / visible;

  track.style.transform = `translateX(-${currentSlide * 100}%)`;

  dots.forEach((d, i) => d.classList.toggle("active", i === currentSlide));
}

document
  .querySelector(".slider-prev")
  ?.addEventListener("click", () => goToSlide(currentSlide - 1));
document
  .querySelector(".slider-next")
  ?.addEventListener("click", () => goToSlide(currentSlide + 1));
dots.forEach((dot, i) => dot.addEventListener("click", () => goToSlide(i)));

// Auto-slide
let autoSlide = setInterval(() => goToSlide(currentSlide + 1), 5000);
track?.addEventListener("mouseenter", () => clearInterval(autoSlide));
track?.addEventListener("mouseleave", () => {
  autoSlide = setInterval(() => goToSlide(currentSlide + 1), 5000);
});

// ============ PORTFOLIO FILTER ============
const filterBtns = document.querySelectorAll(".filter-btn");
const portfolioItems = document.querySelectorAll(".portfolio-card");

filterBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    filterBtns.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");
    const filter = btn.dataset.filter;

    portfolioItems.forEach((item) => {
      if (filter === "all" || item.dataset.category === filter) {
        item.style.opacity = "1";
        item.style.transform = "scale(1)";
        item.style.display = "block";
      } else {
        item.style.opacity = "0";
        item.style.transform = "scale(0.9)";
        setTimeout(() => {
          if (item.style.opacity === "0") item.style.display = "none";
        }, 300);
      }
    });
  });
});

// ============ CONTACT FORM ============
const contactForm = document.querySelector("#contact-form");
contactForm?.addEventListener("submit", (e) => {
  e.preventDefault();
  const btn = contactForm.querySelector('[type="submit"]');
  const original = btn.innerHTML;
  btn.innerHTML = "✓ Message Sent!";
  btn.style.background = "linear-gradient(135deg, #22c55e, #16a34a)";
  btn.disabled = true;
  setTimeout(() => {
    btn.innerHTML = original;
    btn.style.background = "";
    btn.disabled = false;
    contactForm.reset();
  }, 3000);
});

// ============ SMOOTH SCROLL FOR ANCHOR LINKS ============
document.querySelectorAll('a[href^="#"]').forEach((a) => {
  a.addEventListener("click", (e) => {
    const target = document.querySelector(a.getAttribute("href"));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: "smooth", block: "start" });
    }
  });
});

// ============ ACTIVE NAV LINK ============
const currentPage = window.location.pathname.split("/").pop() || "index.html";
document.querySelectorAll(".nav-menu a").forEach((a) => {
  const href = a.getAttribute("href");
  if (href === currentPage || (currentPage === "" && href === "index.html")) {
    a.classList.add("active");
  }
});

// ============ RIPPLE EFFECT ON BUTTONS ============
document.querySelectorAll(".btn").forEach((btn) => {
  btn.addEventListener("click", function (e) {
    const rect = this.getBoundingClientRect();
    const ripple = document.createElement("span");
    ripple.style.cssText = `
      position:absolute; border-radius:50%; background:rgba(255,255,255,0.3);
      width:100px; height:100px;
      left:${e.clientX - rect.left - 50}px;
      top:${e.clientY - rect.top - 50}px;
      animation:rippleAnim 0.6s ease-out forwards;
      pointer-events:none;
    `;
    const style = document.createElement("style");
    style.textContent =
      "@keyframes rippleAnim{from{transform:scale(0);opacity:1}to{transform:scale(4);opacity:0}}";
    document.head.appendChild(style);
    this.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
  });
});

console.log(
  "%c✨ Accrosian - Turning Ideas Into Reality",
  "color:#E8750A;font-size:16px;font-weight:bold;",
);
