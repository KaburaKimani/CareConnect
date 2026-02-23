<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Sign Up — CareConnect Kenya</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --forest:#1B4332;--forest-mid:#2D6A4F;--forest-light:#52B788;--mint:#95D5B2;
  --cream:#FEFAE0;--mist:#F0F4F0;--gold:#D4A017;--charcoal:#1C1C1E;
  --text-dark:#1C1C1E;--text-mid:#4A5568;--text-light:#718096;
  --error:#E53E3E;--success:#22c55e;
  --r:16px;--r-sm:10px;
  --shadow:0 4px 32px rgba(27,67,50,0.10);--shadow-lg:0 16px 64px rgba(27,67,50,0.16);
}
html{font-size:18px;scroll-behavior:smooth}
body{font-family:'Outfit',sans-serif;background:var(--cream);color:var(--text-dark);min-height:100vh}
h1,h2,h3{font-family:'Cormorant Garamond',serif}

.top-nav{display:flex;align-items:center;justify-content:space-between;padding:1.25rem 5vw;border-bottom:1px solid rgba(27,67,50,0.08);background:var(--cream);position:sticky;top:0;z-index:50;}
.nav-logo{display:flex;align-items:center;gap:0.6rem;font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:700;color:var(--forest);text-decoration:none}
.logo-mark{width:34px;height:34px;border-radius:50%;background:var(--forest);display:flex;align-items:center;justify-content:center;font-size:1rem}
.nav-login{font-size:0.82rem;color:var(--text-mid)}
.nav-login a{color:var(--forest);font-weight:600;text-decoration:none}

main{display:grid;grid-template-columns:380px 1fr;min-height:calc(100vh - 65px)}

.sidebar{background:linear-gradient(180deg,var(--forest) 0%,var(--forest-mid) 100%);padding:3rem 2.5rem;display:flex;flex-direction:column;gap:2.5rem;position:sticky;top:65px;height:calc(100vh - 65px);overflow-y:auto;}
.sidebar h2{font-size:1.8rem;color:#fff;line-height:1.3}
.sidebar h2 em{font-style:italic;color:var(--mint)}
.sidebar-steps{display:flex;flex-direction:column;gap:1rem;margin-top:0.5rem}
.step-indicator{display:flex;align-items:center;gap:1rem;padding:1rem;border-radius:var(--r-sm);transition:background 0.2s}
.step-indicator.active{background:rgba(255,255,255,0.12)}
.step-indicator.done{opacity:0.6}
.step-num{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.82rem;font-weight:600;border:2px solid rgba(255,255,255,0.3);color:rgba(255,255,255,0.5);flex-shrink:0;}
.step-indicator.active .step-num{background:var(--mint);color:var(--forest);border-color:var(--mint);font-weight:700}
.step-indicator.done .step-num{background:rgba(255,255,255,0.15);color:#fff;border-color:rgba(255,255,255,0.3)}
.step-text strong{display:block;font-size:0.85rem;color:rgba(255,255,255,0.5);font-weight:500}
.step-indicator.active .step-text strong{color:#fff}
.step-indicator.done .step-text strong{color:rgba(255,255,255,0.65)}
.step-text span{font-size:0.72rem;color:rgba(255,255,255,0.4)}
.sidebar-testimonial{background:rgba(255,255,255,0.08);border-radius:var(--r);padding:1.5rem;margin-top:auto;}
.test-text{font-size:0.82rem;color:rgba(255,255,255,0.78);line-height:1.7;font-style:italic;margin-bottom:1rem}
.test-author{display:flex;align-items:center;gap:0.75rem}
.test-avatar{width:36px;height:36px;border-radius:50%;background:var(--mint);display:flex;align-items:center;justify-content:center;font-size:1rem}
.test-name{font-size:0.78rem;color:#fff;font-weight:600}
.test-loc{font-size:0.68rem;color:rgba(255,255,255,0.5)}

.form-area{padding:3rem 4vw;max-width:680px}
.form-step{display:none}
.form-step.active{display:block;animation:fadeUp 0.4s ease}
@keyframes fadeUp{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}

.step-header{margin-bottom:2.5rem}
.step-header .step-tag{font-size:0.72rem;text-transform:uppercase;letter-spacing:0.08em;color:var(--forest-light);font-weight:600;margin-bottom:0.6rem}
.step-header h1{font-size:2rem;color:var(--forest);margin-bottom:0.4rem}
.step-header p{font-size:0.85rem;color:var(--text-mid);line-height:1.7}

.role-cards{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-bottom:2.5rem}
.role-card{border:2px solid #e2e8f0;border-radius:var(--r);padding:1.75rem 1.25rem;text-align:center;cursor:pointer;transition:all 0.2s;background:#fff;position:relative;}
.role-card:hover{border-color:var(--forest-light);transform:translateY(-2px)}
.role-card.selected{border-color:var(--forest);background:rgba(27,67,50,0.04)}
.role-card .selected-check{position:absolute;top:12px;right:12px;width:22px;height:22px;border-radius:50%;background:var(--forest);color:#fff;font-size:0.65rem;display:none;align-items:center;justify-content:center;}
.role-card.selected .selected-check{display:flex}
.role-card .role-emoji{font-size:2.2rem;display:block;margin-bottom:0.75rem}
.role-card h3{font-size:0.92rem;font-family:'Outfit',sans-serif;font-weight:600;color:var(--text-dark);margin-bottom:0.3rem}
.role-card p{font-size:0.72rem;color:var(--text-light);line-height:1.5}

.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
.form-group{margin-bottom:1.4rem}
.form-label{display:block;font-size:0.82rem;font-weight:600;color:var(--text-dark);margin-bottom:0.5rem}
.form-label span{color:var(--error)}
.form-label .hint{font-weight:400;color:var(--text-light);margin-left:0.4rem;font-size:0.75rem}
.form-control{width:100%;padding:0.82rem 1rem;border:1.5px solid #e2e8f0;border-radius:var(--r-sm);font-size:0.9rem;font-family:'Outfit',sans-serif;color:var(--text-dark);background:#fff;transition:border-color 0.2s,box-shadow 0.2s;outline:none;}
.form-control:focus{border-color:var(--forest-light);box-shadow:0 0 0 3px rgba(82,183,136,0.15)}
.form-control::placeholder{color:#a0aec0}
select.form-control{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23718096' d='M6 8L1 3h10z'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 1rem center;padding-right:2.5rem}

.location-block{background:#fff;border:1.5px solid #e2e8f0;border-radius:var(--r);padding:1.5rem;margin-bottom:1.4rem;}
.location-block-header{display:flex;align-items:flex-start;gap:0.75rem;margin-bottom:1.25rem}
.loc-icon-box{width:44px;height:44px;border-radius:12px;background:var(--mint);display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
.loc-header-text h4{font-size:0.92rem;font-weight:600;font-family:'Outfit',sans-serif;color:var(--text-dark);margin-bottom:0.2rem}
.loc-header-text p{font-size:0.75rem;color:var(--text-light);line-height:1.5}
.loc-grid{display:grid;grid-template-columns:1fr 1fr;gap:0.75rem}
.loc-grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:0.75rem}
.detect-btn{width:100%;padding:0.65rem;border:1.5px dashed var(--forest-light);border-radius:var(--r-sm);background:rgba(82,183,136,0.06);color:var(--forest-mid);font-family:'Outfit',sans-serif;font-size:0.82rem;font-weight:500;cursor:pointer;transition:all 0.2s;display:flex;align-items:center;justify-content:center;gap:0.5rem;margin-top:0.75rem;}
.detect-btn:hover{background:rgba(82,183,136,0.14);border-style:solid}
.detect-success{display:none;align-items:center;gap:0.4rem;margin-top:0.5rem;padding:0.5rem 0.75rem;background:rgba(34,197,94,0.08);border-radius:8px;font-size:0.72rem;color:var(--success);}
.detect-success.show{display:flex}

.spec-tags{display:flex;flex-wrap:wrap;gap:0.5rem;margin-top:0.5rem}
.spec-tag{padding:0.45rem 1rem;border-radius:50px;border:1.5px solid #e2e8f0;background:#fff;font-size:0.78rem;font-family:'Outfit',sans-serif;cursor:pointer;transition:all 0.15s;color:var(--text-mid);}
.spec-tag:hover{border-color:var(--forest-light)}
.spec-tag.selected{background:var(--forest);color:#fff;border-color:var(--forest)}

.caregiver-fields{display:none}
.caregiver-fields.show{display:block}

.pw-strength{margin-top:0.4rem}
.pw-bar{height:4px;border-radius:2px;background:#e2e8f0;margin-bottom:0.3rem;overflow:hidden}
.pw-fill{height:100%;width:0%;border-radius:2px;transition:width 0.3s,background 0.3s}
.pw-label{font-size:0.68rem;color:var(--text-light)}

.step-nav{display:flex;gap:1rem;margin-top:2rem;align-items:center}
.btn{display:inline-flex;align-items:center;gap:0.4rem;padding:0.8rem 1.8rem;border-radius:50px;font-size:0.9rem;font-weight:600;font-family:'Outfit',sans-serif;cursor:pointer;transition:all 0.2s;border:none}
.btn-next{background:var(--forest);color:#fff}
.btn-next:hover{background:var(--forest-mid);transform:translateY(-2px);box-shadow:0 8px 24px rgba(27,67,50,0.28)}
.btn-back{background:transparent;color:var(--text-mid);border:1.5px solid #e2e8f0}
.btn-back:hover{border-color:var(--text-mid)}
.btn-submit-final{background:var(--gold);color:#fff;padding:0.9rem 2.5rem}
.btn-submit-final:hover{background:#b8870f;transform:translateY(-2px);box-shadow:0 8px 24px rgba(212,160,23,0.3)}

.progress-bar-wrap{background:#e2e8f0;height:4px;border-radius:2px;margin-bottom:3rem;overflow:hidden}
.progress-fill{height:100%;background:linear-gradient(90deg,var(--forest-light),var(--forest));border-radius:2px;transition:width 0.4s ease}

.success-screen{display:none;text-align:center;padding:5rem 2rem;animation:fadeUp 0.5s ease;}
.success-screen.show{display:block}
.success-circle{width:96px;height:96px;border-radius:50%;background:linear-gradient(135deg,var(--mint),var(--forest-light));display:flex;align-items:center;justify-content:center;font-size:2.5rem;margin:0 auto 2rem;animation:popIn 0.4s 0.2s ease both;}
@keyframes popIn{from{transform:scale(0)}to{transform:scale(1)}}
.success-screen h2{font-size:2.2rem;color:var(--forest);margin-bottom:0.75rem}
.success-screen p{color:var(--text-mid);font-size:0.92rem;line-height:1.8;max-width:420px;margin:0 auto 2rem}

@media(max-width:1024px){
  main{grid-template-columns:1fr}
  .sidebar{display:none}
  .form-area{max-width:100%;padding:2rem 5vw}
}
@media(max-width:640px){
  html{font-size:16px}
  .role-cards{grid-template-columns:1fr}
  .form-row,.loc-grid,.loc-grid-3{grid-template-columns:1fr}
}
</style>
</head>
<body>

<nav class="top-nav">
  <a href="/" class="nav-logo">
    <div class="logo-mark">🤝</div>
    CareConnect
  </a>
  <div class="nav-login">Already have an account? <a href="/login">Sign in</a></div>
</nav>

<main>
  <div class="sidebar">
    <div><h2>Join Kenya's #1 <em>Care</em> Platform</h2></div>
    <div class="sidebar-steps">
      <div class="step-indicator active" id="si-1">
        <div class="step-num">1</div>
        <div class="step-text"><strong>Choose Your Role</strong><span>Client, caregiver, or admin</span></div>
      </div>
      <div class="step-indicator" id="si-2">
        <div class="step-num">2</div>
        <div class="step-text"><strong>Personal Details</strong><span>Your name and contact</span></div>
      </div>
      <div class="step-indicator" id="si-3">
        <div class="step-num">3</div>
        <div class="step-text"><strong>Your Location</strong><span>County, town, and area</span></div>
      </div>
      <div class="step-indicator" id="si-4">
        <div class="step-num">4</div>
        <div class="step-text"><strong>Security</strong><span>Create your password</span></div>
      </div>
    </div>
    <div class="sidebar-testimonial">
      <p class="test-text">"CareConnect connected me with Grace in Westlands within minutes. Her care for my mother has been exceptional."</p>
      <div class="test-author">
        <div class="test-avatar">👩</div>
        <div>
          <div class="test-name">Margaret Kamau</div>
          <div class="test-loc">📍 Nairobi · Client since 2024</div>
        </div>
      </div>
    </div>
  </div>

  <div class="form-area">
    <div class="progress-bar-wrap"><div class="progress-fill" id="progress" style="width:25%"></div></div>

    <!-- STEP 1 -->
    <div class="form-step active" id="step-1">
      <div class="step-header">
        <div class="step-tag">Step 1 of 4</div>
        <h1>I'm joining as a…</h1>
        <p>Choose your role to personalise your experience on CareConnect Kenya.</p>
      </div>
      <div class="role-cards">
        <div class="role-card selected" onclick="selectRole(this,'client')">
          <div class="selected-check">✓</div>
          <span class="role-emoji">👴</span>
          <h3>Client / Family</h3>
          <p>I'm looking for care for myself or a loved one</p>
        </div>
        <div class="role-card" onclick="selectRole(this,'caregiver')">
          <div class="selected-check">✓</div>
          <span class="role-emoji">👩‍⚕️</span>
          <h3>Caregiver</h3>
          <p>I'm a professional offering care services</p>
        </div>
        <div class="role-card" onclick="selectRole(this,'admin')">
          <div class="selected-check">✓</div>
          <span class="role-emoji">🔐</span>
          <h3>Administrator</h3>
          <p>I manage a care facility or platform</p>
        </div>
      </div>
      <div class="step-nav">
        <button class="btn btn-next" onclick="goStep(2)">Continue →</button>
      </div>
    </div>

    <!-- STEP 2 -->
    <div class="form-step" id="step-2">
      <div class="step-header">
        <div class="step-tag">Step 2 of 4</div>
        <h1>Personal Details</h1>
        <p>Tell us a bit about yourself so we can create your profile.</p>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">First Name <span>*</span></label>
          <input type="text" class="form-control" placeholder="Grace"/>
        </div>
        <div class="form-group">
          <label class="form-label">Last Name <span>*</span></label>
          <input type="text" class="form-control" placeholder="Wanjiku"/>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Email Address <span>*</span></label>
        <input type="email" class="form-control" placeholder="grace@example.com"/>
      </div>
      <div class="form-group">
        <label class="form-label">Phone Number <span>*</span> <span class="hint">(M-Pesa number preferred)</span></label>
        <input type="tel" class="form-control" placeholder="0712 345 678"/>
      </div>
      <div class="caregiver-fields" id="caregiver-fields">
        <div class="form-group">
          <label class="form-label">Years of Experience <span>*</span></label>
          <select class="form-control">
            <option value="">Select experience level</option>
            <option>Less than 1 year</option><option>1–2 years</option><option>3–5 years</option>
            <option>6–10 years</option><option>10+ years</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Specializations <span>*</span> <span class="hint">Select all that apply</span></label>
          <div class="spec-tags">
            <span class="spec-tag" onclick="toggleSpec(this)">Dementia Care</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Alzheimer's</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Post-Surgery Recovery</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Physical Therapy</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Companion Care</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Medication Management</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Palliative Care</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Meal Preparation</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Mobility Assistance</span>
            <span class="spec-tag" onclick="toggleSpec(this)">Hospice Care</span>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Hourly Rate (KES) <span>*</span></label>
          <input type="number" class="form-control" placeholder="e.g. 450" min="200" step="50"/>
          <p style="font-size:0.72rem;color:var(--text-light);margin-top:0.3rem">Average rates in Kenya: KES 250–800/hr depending on specialization</p>
        </div>
        <div class="form-group">
          <label class="form-label">Short Bio <span>*</span></label>
          <textarea class="form-control" rows="3" placeholder="Tell clients about your experience, approach, and what makes you a great caregiver..."></textarea>
        </div>
      </div>
      <div class="step-nav">
        <button class="btn btn-back" onclick="goStep(1)">← Back</button>
        <button class="btn btn-next" onclick="goStep(3)">Continue →</button>
      </div>
    </div>

    <!-- STEP 3 -->
    <div class="form-step" id="step-3">
      <div class="step-header">
        <div class="step-tag">Step 3 of 4</div>
        <h1 id="loc-step-title">Your Location</h1>
        <p id="loc-step-sub">We use your location to connect you with caregivers in your area.</p>
      </div>
      <div class="location-block">
        <div class="location-block-header">
          <div class="loc-icon-box">📍</div>
          <div class="loc-header-text">
            <h4>Primary Location</h4>
            <p id="loc-hint-text">This helps us show you the nearest available caregivers sorted by distance.</p>
          </div>
        </div>
        <div class="loc-grid">
          <div class="form-group" style="margin:0">
            <label class="form-label" style="font-size:0.75rem">County <span>*</span></label>
            <select class="form-control" id="reg-county">
              <option value="">Select your county</option>
              <option>Nairobi</option><option>Mombasa</option><option>Kisumu</option>
              <option>Nakuru</option><option>Eldoret / Uasin Gishu</option><option>Nyeri</option>
              <option>Meru</option><option>Machakos</option><option>Kilifi</option>
              <option>Kakamega</option><option>Kisii</option><option>Garissa</option>
              <option>Embu</option><option>Kericho</option><option>Kirinyaga</option>
              <option>Laikipia</option><option>Lamu</option><option>Nandi</option>
              <option>Narok</option><option>Trans Nzoia</option><option>Bungoma</option>
              <option>Homa Bay</option><option>Isiolo</option><option>Kajiado</option>
              <option>Kwale</option><option>Migori</option><option>Murang'a</option>
              <option>Samburu</option><option>Siaya</option><option>Taita Taveta</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group" style="margin:0">
            <label class="form-label" style="font-size:0.75rem">Town / Estate <span>*</span></label>
            <input type="text" class="form-control" id="reg-town" placeholder="e.g. Westlands, Nyali"/>
          </div>
        </div>
        <div class="form-group" style="margin-top:0.75rem;margin-bottom:0">
          <label class="form-label" style="font-size:0.75rem">Specific Area / Landmark <span class="hint">(optional but helpful)</span></label>
          <input type="text" class="form-control" placeholder="e.g. near Sarit Centre, off Ngong Road"/>
        </div>
        <button class="detect-btn" onclick="autoDetect()">📡 Auto-detect my location (GPS)</button>
        <div class="detect-success" id="reg-detect-success">✅ Location detected! County and town filled automatically.</div>
      </div>
      <div class="caregiver-fields" id="caregiver-loc-fields">
        <div class="location-block">
          <div class="location-block-header">
            <div class="loc-icon-box">🗺️</div>
            <div class="loc-header-text">
              <h4>Service Coverage</h4>
              <p>Clients will find you based on this radius from your location.</p>
            </div>
          </div>
          <div class="loc-grid-3">
            <div class="form-group" style="margin:0">
              <label class="form-label" style="font-size:0.75rem">Service Radius</label>
              <select class="form-control">
                <option>Within 5 km</option><option>Within 10 km</option>
                <option>Within 20 km</option><option>Entire county</option><option>Nationwide</option>
              </select>
            </div>
            <div class="form-group" style="margin:0">
              <label class="form-label" style="font-size:0.75rem">Mode of Travel</label>
              <select class="form-control">
                <option>Matatu / Public</option><option>Personal Car</option>
                <option>Motorbike</option><option>On foot</option>
              </select>
            </div>
            <div class="form-group" style="margin:0">
              <label class="form-label" style="font-size:0.75rem">Live-in Available?</label>
              <select class="form-control">
                <option>No</option><option>Yes — extra charge</option><option>Negotiable</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="step-nav">
        <button class="btn btn-back" onclick="goStep(2)">← Back</button>
        <button class="btn btn-next" onclick="goStep(4)">Continue →</button>
      </div>
    </div>

    <!-- STEP 4 -->
    <div class="form-step" id="step-4">
      <div class="step-header">
        <div class="step-tag">Step 4 of 4</div>
        <h1>Secure Your Account</h1>
        <p>Create a strong password. You'll use this to access CareConnect.</p>
      </div>
      <div class="form-group">
        <label class="form-label">Create Password <span>*</span></label>
        <input type="password" class="form-control" id="pw-input" oninput="checkPw(this)" placeholder="Minimum 8 characters"/>
        <div class="pw-strength">
          <div class="pw-bar"><div class="pw-fill" id="pw-fill"></div></div>
          <div class="pw-label" id="pw-label">Enter a password</div>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Confirm Password <span>*</span></label>
        <input type="password" class="form-control" placeholder="Repeat your password"/>
      </div>
      <div class="form-group" style="display:flex;align-items:flex-start;gap:0.75rem;background:#fff;padding:1.25rem;border-radius:var(--r-sm);border:1.5px solid #e2e8f0">
        <input type="checkbox" id="terms" style="width:18px;height:18px;margin-top:2px;accent-color:var(--forest)"/>
        <label for="terms" style="font-size:0.82rem;color:var(--text-mid);line-height:1.6;cursor:pointer">
          I agree to CareConnect's <a href="/terms" style="color:var(--forest);font-weight:600">Terms of Service</a> and <a href="/privacy" style="color:var(--forest);font-weight:600">Privacy Policy</a>. I understand my location data will be used to match me with nearby caregivers.
        </label>
      </div>
      <div class="form-group" style="display:flex;align-items:flex-start;gap:0.75rem;background:#fff;padding:1.25rem;border-radius:var(--r-sm);border:1.5px solid #e2e8f0">
        <input type="checkbox" id="sms" checked style="width:18px;height:18px;margin-top:2px;accent-color:var(--forest)"/>
        <label for="sms" style="font-size:0.82rem;color:var(--text-mid);line-height:1.6;cursor:pointer">
          Send me booking confirmations and reminders via SMS to my Kenyan number.
        </label>
      </div>
      <div class="step-nav">
        <button class="btn btn-back" onclick="goStep(3)">← Back</button>
        <button class="btn btn-submit-final btn-next" onclick="submitForm()">🎉 Create My Account</button>
      </div>
    </div>

    <!-- SUCCESS -->
    <div class="success-screen" id="success-screen">
      <div class="success-circle">🎉</div>
      <h2>Welcome to CareConnect!</h2>
      <p>Your account has been created successfully. We've found <strong>24</strong> caregivers near your location. Let's find the perfect care for your loved one.</p>
      <a href="/dashboard" class="btn btn-next btn-submit-final" style="display:inline-flex;text-decoration:none">Go to My Dashboard →</a>
    </div>
  </div>
</main>

<script>
let currentRole = 'client';
let currentStep = 1;
const totalSteps = 4;

function selectRole(el, role) {
  currentRole = role;
  document.querySelectorAll('.role-card').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected');
  const cgFields = document.querySelectorAll('.caregiver-fields');
  cgFields.forEach(f => f.classList.toggle('show', role === 'caregiver'));
  if (role === 'caregiver') {
    document.getElementById('loc-step-title').textContent = 'Your Service Location';
    document.getElementById('loc-step-sub').textContent = "We'll show your profile to clients in your area based on your location and service radius.";
    document.getElementById('loc-hint-text').textContent = 'Clients nearby will discover your profile. Your exact address is never shared publicly.';
  } else {
    document.getElementById('loc-step-title').textContent = 'Your Location';
    document.getElementById('loc-step-sub').textContent = 'We use your location to show you caregivers closest to you first.';
    document.getElementById('loc-hint-text').textContent = 'This helps us show you the nearest available caregivers sorted by distance.';
  }
}

function toggleSpec(el) { el.classList.toggle('selected'); }

function goStep(n) {
  document.getElementById('step-' + currentStep)?.classList.remove('active');
  document.querySelectorAll('.step-indicator').forEach((si, i) => {
    si.classList.remove('active');
    if (i + 1 < n) si.classList.add('done');
    else si.classList.remove('done');
  });
  currentStep = n;
  document.getElementById('step-' + n)?.classList.add('active');
  document.getElementById('si-' + n)?.classList.add('active');
  document.getElementById('progress').style.width = (n / totalSteps * 100) + '%';
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function autoDetect() {
  const btn = document.querySelector('.detect-btn');
  btn.textContent = '⏳ Detecting location...';
  const success = () => {
    btn.textContent = '📡 Auto-detect my location (GPS)';
    document.getElementById('reg-county').value = 'Nairobi';
    document.getElementById('reg-town').value = 'Westlands';
    document.getElementById('reg-detect-success').classList.add('show');
  };
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(() => success(), () => success());
  } else { setTimeout(success, 1000); }
}

function checkPw(input) {
  const val = input.value;
  const fill = document.getElementById('pw-fill');
  const label = document.getElementById('pw-label');
  let strength = 0;
  if (val.length >= 8) strength++;
  if (/[A-Z]/.test(val)) strength++;
  if (/[0-9]/.test(val)) strength++;
  if (/[^A-Za-z0-9]/.test(val)) strength++;
  const pcts = ['0%','30%','55%','80%','100%'];
  const colors = ['','#ef4444','#f59e0b','#84cc16','#22c55e'];
  const labels = ['Enter a password','Too short','Weak — add uppercase or numbers','Good','Strong ✓'];
  fill.style.width = pcts[strength];
  fill.style.background = colors[strength];
  label.textContent = labels[strength];
  label.style.color = colors[strength] || 'var(--text-light)';
}

function submitForm() {
  document.getElementById('step-4').classList.remove('active');
  document.getElementById('success-screen').classList.add('show');
  document.getElementById('progress').style.width = '100%';
  window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
</body>
</html>