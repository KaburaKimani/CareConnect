<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>CareConnect Kenya — Compassionate Care, Connected</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --forest:#1B4332;--forest-mid:#2D6A4F;--forest-light:#52B788;--mint:#95D5B2;--cream:#FEFAE0;--warm:#F4E285;--earth:#8B5E3C;--charcoal:#1C1C1E;--mist:#F0F4F0;--gold:#D4A017;
  --text-dark:#1C1C1E;--text-mid:#4A5568;--text-light:#718096;
  --r:20px;--r-sm:10px;
  --shadow:0 4px 32px rgba(27,67,50,0.10);--shadow-lg:0 16px 64px rgba(27,67,50,0.16);
}
html{font-size:18px;scroll-behavior:smooth}
body{font-family:'Outfit',sans-serif;background:var(--cream);color:var(--text-dark);overflow-x:hidden}
h1,h2,h3,h4{font-family:'Cormorant Garamond',serif}
a{text-decoration:none;color:inherit}

/* ── NAV ── */
nav{
  position:fixed;top:0;left:0;right:0;z-index:100;
  display:flex;align-items:center;justify-content:space-between;
  padding:0 5vw;height:72px;
  background:rgba(254,250,224,0.9);backdrop-filter:blur(16px);
  border-bottom:1px solid rgba(27,67,50,0.08);
  transition:box-shadow 0.3s;
}
nav.scrolled{box-shadow:var(--shadow)}
.nav-logo{display:flex;align-items:center;gap:0.6rem;font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:700;color:var(--forest)}
.logo-mark{width:38px;height:38px;border-radius:50%;background:var(--forest);display:flex;align-items:center;justify-content:center;font-size:1.1rem}
.nav-links{display:flex;gap:2.5rem;list-style:none}
.nav-links a{font-size:0.9rem;font-weight:500;color:var(--text-mid);transition:color 0.2s}
.nav-links a:hover{color:var(--forest)}
.nav-btns{display:flex;gap:0.75rem;align-items:center}
.btn{display:inline-flex;align-items:center;gap:0.4rem;padding:0.6rem 1.5rem;border-radius:50px;font-size:0.88rem;font-weight:500;font-family:'Outfit',sans-serif;cursor:pointer;transition:all 0.2s;border:none}
.btn-ghost{background:transparent;color:var(--forest);border:2px solid var(--forest-light)}
.btn-ghost:hover{background:var(--forest);color:#fff;border-color:var(--forest)}
.btn-solid{background:var(--forest);color:#fff}
.btn-solid:hover{background:var(--forest-mid);transform:translateY(-2px);box-shadow:0 8px 24px rgba(27,67,50,0.3)}
.btn-lg{padding:0.85rem 2.2rem;font-size:1rem}
.btn-xl{padding:1.1rem 2.8rem;font-size:1.05rem}
.btn-warm{background:var(--gold);color:#fff}
.btn-warm:hover{background:#b8870f;transform:translateY(-2px);box-shadow:0 8px 24px rgba(212,160,23,0.35)}

/* ── HERO ── */
.hero{
  min-height:100vh;
  display:grid;grid-template-columns:1fr 1fr;
  align-items:center;
  padding:120px 5vw 80px;
  gap:4rem;
  position:relative;overflow:hidden;
}
.hero-bg-shape{
  position:absolute;right:-120px;top:0;bottom:0;
  width:55%;
  background:linear-gradient(160deg,var(--forest) 0%,var(--forest-mid) 60%,var(--forest-light) 100%);
  border-radius:48px 0 0 80px;
  z-index:0;
}
.hero-content{position:relative;z-index:1;animation:fadeUp 0.8s ease both}
.hero-tag{
  display:inline-flex;align-items:center;gap:0.5rem;
  background:var(--mint);color:var(--forest);
  padding:0.4rem 1.1rem;border-radius:50px;
  font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;
  margin-bottom:1.8rem;
}
.hero h1{font-size:clamp(2.8rem,4.5vw,4rem);line-height:1.15;margin-bottom:1.5rem;color:var(--forest)}
.hero h1 em{font-style:italic;color:var(--forest-mid)}
.hero-sub{font-size:1rem;color:var(--text-mid);max-width:500px;line-height:1.8;margin-bottom:2.5rem}
.hero-ctas{display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:3rem}
.hero-trust{display:flex;align-items:center;gap:1rem}
.trust-faces{display:flex}
.trust-face{width:38px;height:38px;border-radius:50%;border:3px solid var(--cream);margin-left:-10px;display:flex;align-items:center;justify-content:center;font-size:1rem;background:var(--mint)}
.trust-face:first-child{margin-left:0}
.trust-text{font-size:0.8rem;color:var(--text-mid)}
.trust-text strong{color:var(--forest);display:block;font-size:0.9rem}

/* ── HERO RIGHT — IMAGE ── */
.hero-right{
  position:relative;z-index:1;
  display:flex;align-items:center;justify-content:center;
  animation:fadeIn 1s 0.3s ease both;
}
.hero-img-wrap{
  position:relative;
  width:100%;max-width:480px;
}
.hero-img-frame{
  width:100%;
  aspect-ratio:4/5;
  border-radius:40px 40px 120px 40px;
  overflow:hidden;
  box-shadow:var(--shadow-lg);
  position:relative;
}
.hero-img-frame img{
  width:100%;height:100%;
  object-fit:cover;
  object-position:center top;
  display:block;
}
/* Overlay gradient at bottom for readability */
.hero-img-frame::after{
  content:'';
  position:absolute;inset:0;
  background:linear-gradient(to top, rgba(27,67,50,0.45) 0%, transparent 50%);
  border-radius:inherit;
}
/* Floating stat cards on image */
.img-badge{
  position:absolute;
  background:#fff;
  border-radius:var(--r-sm);
  padding:0.75rem 1rem;
  box-shadow:var(--shadow-lg);
  display:flex;align-items:center;gap:0.6rem;
  animation:slideLeft 0.8s ease both;
  z-index:2;
}
.img-badge-1{bottom:2rem;left:-2rem;animation-delay:0.5s}
.img-badge-2{top:2rem;right:-1.5rem;animation-delay:0.7s}
.img-badge .badge-icon{font-size:1.3rem}
.img-badge-txt strong{display:block;font-size:0.82rem;font-weight:700;color:var(--forest)}
.img-badge-txt span{font-size:0.68rem;color:var(--text-light)}
.img-verified{
  position:absolute;bottom:2rem;right:-1rem;
  background:var(--forest);color:#fff;
  border-radius:50px;padding:0.45rem 1rem;
  font-size:0.72rem;font-weight:600;
  box-shadow:var(--shadow);
  animation:slideLeft 0.8s 0.9s ease both;
  z-index:2;
}

/* ── STATS BAR ── */
.stats-bar{
  background:var(--forest);color:#fff;
  padding:2.5rem 5vw;
  display:grid;grid-template-columns:repeat(4,1fr);
  gap:2rem;text-align:center;
}
.stat-item .big{font-family:'Cormorant Garamond',serif;font-size:2.8rem;font-weight:700;color:var(--mint);line-height:1}
.stat-item .lbl{font-size:0.8rem;color:rgba(255,255,255,0.7);margin-top:0.4rem;text-transform:uppercase;letter-spacing:0.06em}

/* ── HOW IT WORKS ── */
.section{padding:7rem 5vw}
.section-label{font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;color:var(--forest-light);margin-bottom:1rem}
.section-title{font-size:clamp(2rem,3.5vw,3rem);color:var(--forest);margin-bottom:1rem}
.section-sub{font-size:0.95rem;color:var(--text-mid);max-width:560px;line-height:1.8}
.hiw-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;margin-top:4rem}
.hiw-step{
  background:#fff;border-radius:var(--r);padding:2.5rem 2rem;
  box-shadow:var(--shadow);border:1px solid rgba(27,67,50,0.06);
  transition:transform 0.2s,box-shadow 0.2s;
  position:relative;overflow:hidden;
}
.hiw-step::before{
  content:attr(data-num);
  position:absolute;top:-0.5rem;right:1.5rem;
  font-family:'Cormorant Garamond',serif;font-size:6rem;font-weight:700;
  color:rgba(27,67,50,0.05);line-height:1;
}
.hiw-step:hover{transform:translateY(-6px);box-shadow:var(--shadow-lg)}
.hiw-icon{width:56px;height:56px;border-radius:16px;background:var(--mint);display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin-bottom:1.5rem}
.hiw-step h3{font-size:1.25rem;margin-bottom:0.75rem;color:var(--forest)}
.hiw-step p{font-size:0.85rem;color:var(--text-mid);line-height:1.7}

/* ── CAREGIVERS SPOTLIGHT ── */
.spotlight{padding:7rem 5vw;background:var(--mist)}
.cg-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3.5rem}
.cg-card{
  background:#fff;border-radius:var(--r);overflow:hidden;
  box-shadow:var(--shadow);transition:transform 0.2s,box-shadow 0.2s;
  cursor:pointer;border:1px solid transparent;
}
.cg-card:hover{transform:translateY(-5px);box-shadow:var(--shadow-lg);border-color:var(--mint)}
.cg-photo{height:160px;background:linear-gradient(135deg,var(--mint),var(--forest-light));display:flex;align-items:center;justify-content:center;font-size:3.5rem;position:relative}
.cg-avail{position:absolute;top:12px;right:12px;padding:0.3rem 0.7rem;border-radius:50px;font-size:0.68rem;font-weight:600}
.avail-yes{background:rgba(34,197,94,0.15);color:#15803d;border:1px solid rgba(34,197,94,0.3)}
.avail-soon{background:rgba(245,158,11,0.15);color:#b45309;border:1px solid rgba(245,158,11,0.3)}
.cg-body{padding:1.5rem}
.cg-name{font-weight:600;font-size:0.98rem;margin-bottom:0.2rem}
.cg-spec{font-size:0.78rem;color:var(--text-mid);margin-bottom:0.4rem}
.cg-loc{font-size:0.73rem;color:var(--forest-mid);display:flex;align-items:center;gap:0.25rem;margin-bottom:0.75rem}
.cg-meta{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem}
.cg-rate{font-weight:700;color:var(--forest);font-size:1rem}
.cg-rate span{font-size:0.72rem;font-weight:400;color:var(--text-light)}
.tag-sm{display:inline-block;padding:0.2rem 0.6rem;border-radius:50px;font-size:0.7rem;background:var(--mist);color:var(--text-mid);margin-right:0.3rem;margin-bottom:0.3rem}
.stars{color:#f59e0b}

/* ── LOCATIONS ── */
.locations{padding:7rem 5vw}
.loc-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1rem;margin-top:3.5rem}
.loc-card{
  background:#fff;border-radius:var(--r);padding:1.75rem 1.5rem;text-align:center;
  box-shadow:var(--shadow);cursor:pointer;transition:all 0.2s;border:2px solid transparent;
}
.loc-card:hover{border-color:var(--forest-light);transform:translateY(-3px)}
.loc-card .loc-emoji{font-size:2rem;display:block;margin-bottom:0.75rem}
.loc-card .loc-name{font-weight:600;font-size:0.95rem;color:var(--forest);margin-bottom:0.25rem}
.loc-card .loc-count{font-size:0.75rem;color:var(--text-light)}

/* ── CTA BAND ── */
.cta-band{
  margin:0 5vw 7rem;
  background:linear-gradient(135deg,var(--forest) 0%,var(--forest-mid) 100%);
  border-radius:var(--r);
  padding:5rem 4rem;
  display:grid;grid-template-columns:1fr 1fr;
  align-items:center;gap:3rem;
  position:relative;overflow:hidden;
}
.cta-band::before{content:'';position:absolute;right:-80px;top:-80px;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,0.04);}
.cta-band::after{content:'';position:absolute;left:-40px;bottom:-60px;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,0.03);}
.cta-band-content{position:relative;z-index:1}
.cta-band h2{font-size:clamp(1.8rem,3vw,2.8rem);color:#fff;margin-bottom:1rem}
.cta-band p{font-size:0.9rem;color:rgba(255,255,255,0.75);line-height:1.8}
.cta-band-action{position:relative;z-index:1;display:flex;flex-direction:column;gap:1rem;align-items:flex-start}

/* ── FOOTER ── */
footer{background:var(--charcoal);color:rgba(255,255,255,0.65);padding:5rem 5vw 2.5rem}
.footer-grid{display:grid;grid-template-columns:1.6fr 1fr 1fr 1fr;gap:3rem;margin-bottom:4rem}
.footer-brand .brand-logo{display:flex;align-items:center;gap:0.6rem;font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:700;color:#fff;margin-bottom:1rem}
.footer-brand p{font-size:0.82rem;line-height:1.8;max-width:280px}
.footer-col h4{font-size:0.72rem;text-transform:uppercase;letter-spacing:0.1em;color:var(--mint);margin-bottom:1.25rem;font-family:'Outfit',sans-serif;font-weight:600}
.footer-col ul{list-style:none;display:flex;flex-direction:column;gap:0.65rem}
.footer-col ul li a{font-size:0.82rem;transition:color 0.2s;color:rgba(255,255,255,0.6)}
.footer-col ul li a:hover{color:#fff}
.footer-bottom{border-top:1px solid rgba(255,255,255,0.08);padding-top:2rem;display:flex;justify-content:space-between;font-size:0.78rem;flex-wrap:wrap;gap:1rem}

/* ── ANIMATIONS ── */
@keyframes fadeUp{from{opacity:0;transform:translateY(28px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
@keyframes slideLeft{from{opacity:0;transform:translateX(24px)}to{opacity:1;transform:translateX(0)}}

/* ── RESPONSIVE ── */
@media(max-width:1024px){
  .hero{grid-template-columns:1fr;padding:110px 5vw 60px}
  .hero-bg-shape{display:none}
  .hero-right{display:none}
  .stats-bar{grid-template-columns:repeat(2,1fr)}
  .hiw-grid{grid-template-columns:1fr 1fr}
  .cta-band{grid-template-columns:1fr}
  .footer-grid{grid-template-columns:1fr 1fr;gap:2rem}
}
@media(max-width:768px){
  html{font-size:16px}
  .nav-links{display:none}
  .hiw-grid{grid-template-columns:1fr}
  .stats-bar{grid-template-columns:repeat(2,1fr);gap:1.5rem}
  .cta-band{padding:3rem 2rem}
  .footer-grid{grid-template-columns:1fr;gap:2rem}
  .footer-bottom{flex-direction:column;text-align:center}
}
</style>
</head>
<body>

<nav id="nav">
  <div class="nav-logo">
    <div class="logo-mark">🤝</div>
    CareConnect
  </div>
  <ul class="nav-links">
    <li><a href="#how">How It Works</a></li>
    <li><a href="#caregivers">Caregivers</a></li>
    <li><a href="#locations">Locations</a></li>
    <li><a href="#">About Us</a></li>
  </ul>
  <div class="nav-btns">
    <a href="/login" class="btn btn-ghost">Log In</a>
    <a href="/register" class="btn btn-solid">Get Started</a>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg-shape"></div>

  <div class="hero-content">
    <div class="hero-tag">🇰🇪 Serving All 47 Counties</div>
    <h1>Quality Elder Care,<br><em>Right Across Kenya</em></h1>
    <p class="hero-sub">Connect your family with verified, compassionate caregivers in your county. Transparent pricing in KES, secure booking, and AI-powered guidance — all in one platform built for Kenyan families.</p>
    <div class="hero-ctas">
      <a href="/register" class="btn btn-solid btn-xl">Find a Caregiver</a>
      <a href="/register?role=caregiver" class="btn btn-ghost btn-xl">Join as Caregiver</a>
    </div>
    <div class="hero-trust">
      <div class="trust-faces">
        <div class="trust-face">👵</div>
        <div class="trust-face">👴</div>
        <div class="trust-face">👩</div>
        <div class="trust-face">🧓</div>
      </div>
      <div class="trust-text">
        <strong>2,400+ families</strong>
        trust CareConnect across Kenya
      </div>
    </div>
  </div>

  <!-- HERO IMAGE -->
  <div class="hero-right">
    <div class="hero-img-wrap">
      <!-- Floating badge top-right -->
      <div class="img-badge img-badge-2">
        <div class="badge-icon">⭐</div>
        <div class="img-badge-txt">
          <strong>4.9 / 5.0</strong>
          <span>Average caregiver rating</span>
        </div>
      </div>

      <!-- Main image frame -->
      <div class="hero-img-frame">
        <img
          src="https://images.pexels.com/photos/7551617/pexels-photo-7551617.jpeg?auto=compress&cs=tinysrgb&w=800"
          alt="Happy elderly Kenyan client with a caring professional caregiver"
          loading="eager"
          onerror="this.style.display='none';this.parentElement.style.background='linear-gradient(135deg,var(--mint),var(--forest-light))';this.parentElement.innerHTML+='<div style=\'display:flex;align-items:center;justify-content:center;height:100%;font-size:5rem;\'>👩‍⚕️</div>'"
        />
      </div>

      <!-- Floating badge bottom-left -->
      <div class="img-badge img-badge-1">
        <div class="badge-icon">📍</div>
        <div class="img-badge-txt">
          <strong>800+ Caregivers</strong>
          <span>Across all 47 counties</span>
        </div>
      </div>

      <!-- Verified pill -->
      <div class="img-verified">✓ All caregivers verified</div>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
  <div class="stat-item"><div class="big">47</div><div class="lbl">Counties Covered</div></div>
  <div class="stat-item"><div class="big">800+</div><div class="lbl">Verified Caregivers</div></div>
  <div class="stat-item"><div class="big">2,400+</div><div class="lbl">Families Served</div></div>
  <div class="stat-item"><div class="big">4.8★</div><div class="lbl">Average Rating</div></div>
</div>

<!-- HOW IT WORKS -->
<section class="section" id="how">
  <div class="section-label">Simple & Fast</div>
  <h2 class="section-title">How CareConnect Works</h2>
  <p class="section-sub">From search to booking in under 5 minutes. Care that fits your schedule and your budget.</p>
  <div class="hiw-grid">
    <div class="hiw-step" data-num="01">
      <div class="hiw-icon">📍</div>
      <h3>Share Your Location</h3>
      <p>When you sign up, tell us your town or estate. We'll show you verified caregivers in your area, sorted by distance so you can find nearby help instantly.</p>
    </div>
    <div class="hiw-step" data-num="02">
      <div class="hiw-icon">🔍</div>
      <h3>Browse & Compare</h3>
      <p>Filter caregivers by specialty, availability, and rate. Read real reviews from Kenyan families, view certifications, and shortlist your favourites.</p>
    </div>
    <div class="hiw-step" data-num="03">
      <div class="hiw-icon">📅</div>
      <h3>Book & Pay Securely</h3>
      <p>Choose a date and time, confirm your booking, and pay safely via M-Pesa or card. You'll receive SMS and email confirmations instantly.</p>
    </div>
  </div>
</section>

<!-- CAREGIVER SPOTLIGHT -->
<section class="spotlight" id="caregivers">
  <div class="section-label">Top Rated Near You</div>
  <h2 class="section-title">Meet Our Caregivers</h2>
  <p class="section-sub">Every caregiver is background-checked, trained, and passionate about elder care across Kenya.</p>
  <div class="cg-grid">
    <div class="cg-card">
      <div class="cg-photo">👩‍⚕️<div class="cg-avail avail-yes">● Available Today</div></div>
      <div class="cg-body">
        <div class="cg-name">Grace Wanjiku</div>
        <div class="cg-spec">Dementia & Memory Care</div>
        <div class="cg-loc">📍 Westlands, Nairobi</div>
        <div class="cg-meta">
          <div><span class="stars">★★★★★</span> <span style="font-size:0.75rem;color:var(--text-light)">4.9 (142)</span></div>
          <div class="cg-rate">KES 450<span>/hr</span></div>
        </div>
        <div><span class="tag-sm">Memory Care</span><span class="tag-sm">CNA Certified</span></div>
        <a href="/register" class="btn btn-solid" style="width:100%;justify-content:center;margin-top:1rem;font-size:0.85rem">Book Now</a>
      </div>
    </div>
    <div class="cg-card">
      <div class="cg-photo">👨‍⚕️<div class="cg-avail avail-yes">● Available Today</div></div>
      <div class="cg-body">
        <div class="cg-name">James Otieno</div>
        <div class="cg-spec">Physical Therapy Aide</div>
        <div class="cg-loc">📍 Kilimani, Nairobi</div>
        <div class="cg-meta">
          <div><span class="stars">★★★★★</span> <span style="font-size:0.75rem;color:var(--text-light)">4.8 (98)</span></div>
          <div class="cg-rate">KES 550<span>/hr</span></div>
        </div>
        <div><span class="tag-sm">Physiotherapy</span><span class="tag-sm">Post-Surgery</span></div>
        <a href="/register" class="btn btn-solid" style="width:100%;justify-content:center;margin-top:1rem;font-size:0.85rem">Book Now</a>
      </div>
    </div>
    <div class="cg-card">
      <div class="cg-photo">👩‍🦱<div class="cg-avail avail-soon">● Available Tomorrow</div></div>
      <div class="cg-body">
        <div class="cg-name">Amina Hassan</div>
        <div class="cg-spec">Companion & Respite Care</div>
        <div class="cg-loc">📍 South C, Nairobi</div>
        <div class="cg-meta">
          <div><span class="stars">★★★★☆</span> <span style="font-size:0.75rem;color:var(--text-light)">4.7 (73)</span></div>
          <div class="cg-rate">KES 320<span>/hr</span></div>
        </div>
        <div><span class="tag-sm">Companion</span><span class="tag-sm">Meals</span></div>
        <a href="/register" class="btn btn-solid" style="width:100%;justify-content:center;margin-top:1rem;font-size:0.85rem">Book Now</a>
      </div>
    </div>
    <div class="cg-card">
      <div class="cg-photo">🧑‍⚕️<div class="cg-avail avail-yes">● Available Today</div></div>
      <div class="cg-body">
        <div class="cg-name">David Kipchoge</div>
        <div class="cg-spec">Post-Surgery Recovery</div>
        <div class="cg-loc">📍 Kisumu City</div>
        <div class="cg-meta">
          <div><span class="stars">★★★★★</span> <span style="font-size:0.75rem;color:var(--text-light)">5.0 (201)</span></div>
          <div class="cg-rate">KES 620<span>/hr</span></div>
        </div>
        <div><span class="tag-sm">Recovery</span><span class="tag-sm">12 yrs exp</span></div>
        <a href="/register" class="btn btn-solid" style="width:100%;justify-content:center;margin-top:1rem;font-size:0.85rem">Book Now</a>
      </div>
    </div>
  </div>
</section>

<!-- LOCATIONS -->
<section class="locations" id="locations">
  <div class="section-label">Nationwide Coverage</div>
  <h2 class="section-title">Find Caregivers in Your County</h2>
  <p class="section-sub">CareConnect has verified caregivers across all 47 counties of Kenya. Start in your town today.</p>
  <div class="loc-grid">
    <div class="loc-card"><span class="loc-emoji">🏙️</span><div class="loc-name">Nairobi</div><div class="loc-count">240 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🌊</span><div class="loc-name">Mombasa</div><div class="loc-count">89 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🌅</span><div class="loc-name">Kisumu</div><div class="loc-count">74 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🏔️</span><div class="loc-name">Nakuru</div><div class="loc-count">58 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🌿</span><div class="loc-name">Eldoret</div><div class="loc-count">51 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🌄</span><div class="loc-name">Nyeri</div><div class="loc-count">43 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">☀️</span><div class="loc-name">Meru</div><div class="loc-count">38 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🦁</span><div class="loc-name">Machakos</div><div class="loc-count">35 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🌺</span><div class="loc-name">Kilifi</div><div class="loc-count">29 caregivers</div></div>
    <div class="loc-card"><span class="loc-emoji">🗺️</span><div class="loc-name">+ 38 more</div><div class="loc-count">View all counties →</div></div>
  </div>
</section>

<!-- CTA BAND -->
<div class="cta-band">
  <div class="cta-band-content">
    <h2>Your Loved One Deserves the Best Care</h2>
    <p>Join thousands of Kenyan families who've found reliable, compassionate care through CareConnect. Sign up in 2 minutes — it's free.</p>
  </div>
  <div class="cta-band-action">
    <a href="/register" class="btn btn-warm btn-xl">Get Started Free</a>
    <a href="/login" class="btn btn-ghost btn-lg" style="border-color:rgba(255,255,255,0.4);color:#fff">Already have an account?</a>
  </div>
</div>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="brand-logo"><div class="logo-mark" style="background:var(--forest-mid)">🤝</div>CareConnect</div>
      <p>Compassionate caregiving technology built for Kenyan families. Connecting elders with the care they deserve.</p>
    </div>
    <div class="footer-col">
      <h4>Platform</h4>
      <ul>
        <li><a href="/register">Find Caregivers</a></li>
        <li><a href="/register?role=caregiver">Become a Caregiver</a></li>
        <li><a href="/dashboard">AI Assistant</a></li>
        <li><a href="#">Pricing</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Company</h4>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Legal</h4>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">Cookie Policy</a></li>
        <li><a href="#">Refund Policy</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 CareConnect Kenya Ltd. All rights reserved.</span>
    <span>Made with 💚 for Kenyan families</span>
  </div>
</footer>

<script>
window.addEventListener('scroll',()=>{
  document.getElementById('nav').classList.toggle('scrolled',window.scrollY>20);
});
</script>
</body>
</html>