<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Log In — CareConnect Kenya</title>
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
html{font-size:18px}
body{font-family:'Outfit',sans-serif;background:var(--cream);color:var(--text-dark);min-height:100vh;display:grid;grid-template-columns:1fr 1fr}
h1,h2,h3{font-family:'Cormorant Garamond',serif}

.left-panel{
  background:linear-gradient(160deg,var(--forest) 0%,var(--forest-mid) 60%,var(--forest-light) 100%);
  padding:3rem;display:flex;flex-direction:column;justify-content:space-between;
  position:relative;overflow:hidden;min-height:100vh;
}
.left-panel::before{content:'';position:absolute;top:-100px;right:-100px;width:400px;height:400px;border-radius:50%;background:rgba(255,255,255,0.04);}
.left-panel::after{content:'';position:absolute;bottom:-80px;left:-60px;width:280px;height:280px;border-radius:50%;background:rgba(255,255,255,0.03);}
.panel-logo{display:flex;align-items:center;gap:0.6rem;font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:700;color:#fff;text-decoration:none;position:relative;z-index:1}
.logo-mark{width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,0.18);display:flex;align-items:center;justify-content:center;font-size:1.1rem}
.panel-content{position:relative;z-index:1}
.panel-content h2{font-size:2.4rem;color:#fff;line-height:1.25;margin-bottom:1.25rem}
.panel-content h2 em{font-style:italic;color:var(--mint)}
.panel-content p{font-size:0.88rem;color:rgba(255,255,255,0.72);line-height:1.8;margin-bottom:2.5rem}
.panel-features{display:flex;flex-direction:column;gap:1rem}
.pf-item{display:flex;align-items:center;gap:1rem;background:rgba(255,255,255,0.08);border-radius:var(--r-sm);padding:1rem 1.25rem}
.pf-icon{width:40px;height:40px;border-radius:10px;background:rgba(255,255,255,0.14);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0}
.pf-text strong{display:block;font-size:0.85rem;color:#fff;font-weight:600}
.pf-text span{font-size:0.75rem;color:rgba(255,255,255,0.65)}
.panel-footer{position:relative;z-index:1;font-size:0.75rem;color:rgba(255,255,255,0.4)}

.right-panel{display:flex;align-items:center;justify-content:center;padding:3rem 2.5rem;background:var(--cream);overflow-y:auto;}
.login-box{width:100%;max-width:460px}
.login-box-header{margin-bottom:2.5rem}
.login-box-header h1{font-size:2.2rem;color:var(--forest);margin-bottom:0.4rem}
.login-box-header p{font-size:0.85rem;color:var(--text-mid)}

.role-toggle{display:grid;grid-template-columns:1fr 1fr;background:var(--mist);border-radius:50px;padding:5px;margin-bottom:2rem;}
.role-btn{padding:0.65rem 1rem;border-radius:50px;border:none;font-family:'Outfit',sans-serif;font-size:0.88rem;font-weight:500;cursor:pointer;transition:all 0.25s;background:transparent;color:var(--text-mid);display:flex;align-items:center;justify-content:center;gap:0.4rem;}
.role-btn.active{background:#fff;color:var(--forest);box-shadow:0 2px 12px rgba(0,0,0,0.1);font-weight:600}

.form-group{margin-bottom:1.4rem}
.form-label{display:block;font-size:0.82rem;font-weight:600;color:var(--text-dark);margin-bottom:0.5rem}
.form-label span{color:var(--error)}
.form-control{width:100%;padding:0.82rem 1rem;border:1.5px solid #e2e8f0;border-radius:var(--r-sm);font-size:0.92rem;font-family:'Outfit',sans-serif;color:var(--text-dark);background:#fff;transition:border-color 0.2s,box-shadow 0.2s;outline:none;}
.form-control:focus{border-color:var(--forest-light);box-shadow:0 0 0 3px rgba(82,183,136,0.15)}
.form-control::placeholder{color:#a0aec0}
select.form-control{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23718096' d='M6 8L1 3h10z'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 1rem center;padding-right:2.5rem}

.location-block{background:#fff;border:1.5px solid #e2e8f0;border-radius:var(--r-sm);padding:1.25rem;margin-bottom:1.4rem;}
.location-block-header{display:flex;align-items:center;gap:0.6rem;margin-bottom:1rem}
.location-block-header .loc-icon{width:36px;height:36px;border-radius:10px;background:var(--mint);display:flex;align-items:center;justify-content:center;font-size:1rem}
.location-block-header h4{font-size:0.9rem;font-weight:600;font-family:'Outfit',sans-serif;color:var(--text-dark)}
.location-block-header p{font-size:0.72rem;color:var(--text-light)}
.loc-row{display:grid;grid-template-columns:1fr 1fr;gap:0.75rem}
.loc-row-single{margin-top:0.75rem}
.detect-btn{width:100%;padding:0.65rem 1rem;border:1.5px dashed var(--forest-light);border-radius:var(--r-sm);background:rgba(82,183,136,0.06);color:var(--forest-mid);font-family:'Outfit',sans-serif;font-size:0.82rem;font-weight:500;cursor:pointer;transition:all 0.2s;display:flex;align-items:center;justify-content:center;gap:0.5rem;margin-top:0.75rem;}
.detect-btn:hover{background:rgba(82,183,136,0.14);border-style:solid}
.detect-status{font-size:0.72rem;color:var(--success);display:none;align-items:center;gap:0.35rem;margin-top:0.4rem;padding:0.4rem 0.6rem;background:rgba(34,197,94,0.08);border-radius:6px}
.detect-status.show{display:flex}

.btn-submit{width:100%;padding:0.95rem;border-radius:50px;background:var(--forest);color:#fff;border:none;font-family:'Outfit',sans-serif;font-size:1rem;font-weight:600;cursor:pointer;transition:all 0.2s;margin-top:0.5rem;display:flex;align-items:center;justify-content:center;gap:0.5rem;}
.btn-submit:hover{background:var(--forest-mid);transform:translateY(-2px);box-shadow:0 8px 24px rgba(27,67,50,0.28)}

.forgot{text-align:right;margin-top:-0.8rem;margin-bottom:1.4rem}
.forgot a{font-size:0.78rem;color:var(--forest-mid);text-decoration:none}
.forgot a:hover{text-decoration:underline}
.divider{display:flex;align-items:center;gap:1rem;margin:1.5rem 0;color:#a0aec0;font-size:0.78rem}
.divider::before,.divider::after{content:'';flex:1;height:1px;background:#e2e8f0}
.social-row{display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;margin-bottom:1.5rem}
.social-btn{padding:0.72rem 1rem;border:1.5px solid #e2e8f0;border-radius:var(--r-sm);background:#fff;font-family:'Outfit',sans-serif;font-size:0.82rem;font-weight:500;cursor:pointer;transition:border-color 0.2s;display:flex;align-items:center;justify-content:center;gap:0.5rem;color:var(--text-dark);}
.social-btn:hover{border-color:#a0aec0}
.switch-link{text-align:center;font-size:0.82rem;color:var(--text-mid);margin-top:1.5rem}
.switch-link a{color:var(--forest);font-weight:600;text-decoration:none}

@media(max-width:768px){
  body{grid-template-columns:1fr}
  .left-panel{display:none}
  .right-panel{padding:2rem 1.25rem}
}
</style>
</head>
<body>

<div class="left-panel">
  <a href="/" class="panel-logo">
    <div class="logo-mark">🤝</div>
    CareConnect
  </a>
  <div class="panel-content">
    <h2>Welcome Back<br>to <em>Kenya's Care</em><br>Platform</h2>
    <p>Sign in to access verified caregivers, manage bookings, and get AI-powered care guidance for your loved ones.</p>
    <div class="panel-features">
      <div class="pf-item">
        <div class="pf-icon">📍</div>
        <div class="pf-text">
          <strong>Location-Smart Matching</strong>
          <span>We find caregivers closest to you across all 47 counties</span>
        </div>
      </div>
      <div class="pf-item">
        <div class="pf-icon">💳</div>
        <div class="pf-text">
          <strong>M-Pesa & Card Payments</strong>
          <span>Pay securely in KES — no hidden fees</span>
        </div>
      </div>
      <div class="pf-item">
        <div class="pf-icon">🤖</div>
        <div class="pf-text">
          <strong>AI Care Assistant</strong>
          <span>24/7 guidance in English and Swahili</span>
        </div>
      </div>
    </div>
  </div>
  <div class="panel-footer">© 2026 CareConnect Kenya Ltd.</div>
</div>

<div class="right-panel">
  <div class="login-box">
    <div class="login-box-header">
      <h1>Sign In</h1>
      <p>Welcome back! Please enter your details below.</p>
    </div>

    <div class="role-toggle">
      <button class="role-btn active" id="btn-client" onclick="setRole('client')">👴 Client / Family</button>
      <button class="role-btn" id="btn-caregiver" onclick="setRole('caregiver')">👩‍⚕️ Caregiver</button>
    </div>

    <div class="social-row">
      <button class="social-btn">🔵 Google</button>
      <button class="social-btn">📱 M-Pesa Auth</button>
    </div>
    <div class="divider">or continue with email</div>

    <div class="form-group">
      <label class="form-label">Email Address <span>*</span></label>
      <input type="email" class="form-control" placeholder="yourname@example.com"/>
    </div>

    <div class="form-group">
      <label class="form-label">Password <span>*</span></label>
      <input type="password" class="form-control" placeholder="Enter your password"/>
    </div>

    <div class="forgot"><a href="/forgot-password">Forgot password?</a></div>

    <div class="location-block" id="location-block">
      <div class="location-block-header">
        <div class="loc-icon">📍</div>
        <div>
          <h4 id="loc-block-title">Your Location</h4>
          <p id="loc-block-sub">Help us show caregivers closest to you</p>
        </div>
      </div>
      <div class="loc-row">
        <div>
          <label class="form-label" style="font-size:0.75rem">County <span>*</span></label>
          <select class="form-control" id="county-select">
            <option value="">Select county</option>
            <option>Nairobi</option><option>Mombasa</option><option>Kisumu</option>
            <option>Nakuru</option><option>Eldoret / Uasin Gishu</option><option>Nyeri</option>
            <option>Meru</option><option>Machakos</option><option>Kilifi</option>
            <option>Kakamega</option><option>Kisii</option><option>Garissa</option>
            <option>Embu</option><option>Kericho</option><option>Kirinyaga</option>
            <option>Laikipia</option><option>Lamu</option><option>Nandi</option>
            <option>Narok</option><option>Trans Nzoia</option><option>Other</option>
          </select>
        </div>
        <div>
          <label class="form-label" style="font-size:0.75rem">Town / Estate <span>*</span></label>
          <input type="text" class="form-control" id="town-input" placeholder="e.g. Westlands"/>
        </div>
      </div>
      <div class="loc-row-single" id="caregiver-radius" style="display:none">
        <label class="form-label" style="font-size:0.75rem">Your service radius</label>
        <select class="form-control" id="radius-select">
          <option>Within 5 km</option>
          <option>Within 10 km</option>
          <option>Within 20 km</option>
          <option>Entire county</option>
          <option>Nationwide</option>
        </select>
      </div>
      <button class="detect-btn" onclick="detectLocation()">📡 Auto-detect my location</button>
      <div class="detect-status" id="detect-status">✅ Location detected: <span id="detect-text"></span></div>
    </div>

    <button class="btn-submit" onclick="handleLogin()">
      <span id="btn-text">Sign In →</span>
    </button>

    <div class="switch-link">
      Don't have an account? <a href="/register">Sign up free</a>
    </div>
    <div class="switch-link" style="margin-top:0.6rem">
      <a href="/" style="color:var(--text-light)">← Back to homepage</a>
    </div>
  </div>
</div>

<script>
let currentRole = 'client';

function setRole(role) {
  currentRole = role;
  document.getElementById('btn-client').classList.toggle('active', role === 'client');
  document.getElementById('btn-caregiver').classList.toggle('active', role === 'caregiver');
  const caregiverRadius = document.getElementById('caregiver-radius');
  const locTitle = document.getElementById('loc-block-title');
  const locSub = document.getElementById('loc-block-sub');
  if (role === 'caregiver') {
    caregiverRadius.style.display = 'block';
    locTitle.textContent = 'Your Service Location';
    locSub.textContent = 'Clients will find you based on your location and service radius';
  } else {
    caregiverRadius.style.display = 'none';
    locTitle.textContent = 'Your Location';
    locSub.textContent = 'Help us show caregivers closest to you';
  }
}

function detectLocation() {
  const btn = document.querySelector('.detect-btn');
  btn.textContent = '⏳ Detecting...';
  const done = () => {
    btn.textContent = '📡 Auto-detect my location';
    document.getElementById('county-select').value = 'Nairobi';
    document.getElementById('town-input').value = 'Westlands';
    document.getElementById('detect-text').textContent = 'Nairobi, Westlands';
    document.getElementById('detect-status').classList.add('show');
  };
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(() => done(), () => done());
  } else { done(); }
}

function handleLogin() {
  const btn = document.getElementById('btn-text');
  btn.textContent = '⏳ Signing in...';
  setTimeout(() => { window.location.href = '/dashboard'; }, 1200);
}
</script>
</body>
</html>