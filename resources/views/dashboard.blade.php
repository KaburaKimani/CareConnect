<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Dashboard — CareConnect Kenya</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --forest:#1B4332;--forest-mid:#2D6A4F;--forest-light:#52B788;--mint:#95D5B2;
  --cream:#FEFAE0;--mist:#F0F4F0;--gold:#D4A017;--charcoal:#1C1C1E;
  --text-dark:#1C1C1E;--text-mid:#4A5568;--text-light:#718096;
  --error:#E53E3E;--success:#22c55e;--warn:#f59e0b;
  --r:16px;--r-sm:10px;
  --shadow:0 4px 24px rgba(27,67,50,0.08);--shadow-lg:0 12px 48px rgba(27,67,50,0.14);
  --sidebar-w:260px;
}
html{font-size:17px}
body{font-family:'Outfit',sans-serif;background:var(--mist);color:var(--text-dark);display:grid;grid-template-columns:var(--sidebar-w) 1fr;min-height:100vh}
h1,h2,h3,h4{font-family:'Cormorant Garamond',serif}

.sidebar{background:var(--forest);height:100vh;position:sticky;top:0;display:flex;flex-direction:column;overflow-y:auto;}
.sidebar::-webkit-scrollbar{width:0}
.sb-logo{display:flex;align-items:center;gap:0.6rem;padding:1.75rem 1.5rem;font-family:'Cormorant Garamond',serif;font-size:1.35rem;font-weight:700;color:#fff;border-bottom:1px solid rgba(255,255,255,0.08);text-decoration:none;}
.logo-mark{width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,0.18);display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0}
.sb-user{padding:1.5rem;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:0.85rem;}
.sb-avatar{width:44px;height:44px;border-radius:50%;background:var(--mint);display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0}
.sb-user-name{font-size:0.88rem;font-weight:600;color:#fff;line-height:1.3}
.sb-user-role{font-size:0.7rem;color:rgba(255,255,255,0.55)}
.sb-user-loc{font-size:0.68rem;color:var(--mint);display:flex;align-items:center;gap:0.2rem;margin-top:0.2rem}

.sb-nav{flex:1;padding:1.25rem 0}
.sb-section-label{padding:0.4rem 1.5rem;font-size:0.65rem;text-transform:uppercase;letter-spacing:0.1em;color:rgba(255,255,255,0.35);font-weight:600}
.sb-link{display:flex;align-items:center;gap:0.85rem;padding:0.8rem 1.5rem;font-size:0.86rem;color:rgba(255,255,255,0.65);text-decoration:none;cursor:pointer;transition:all 0.15s;border-left:3px solid transparent;}
.sb-link:hover{background:rgba(255,255,255,0.07);color:#fff}
.sb-link.active{background:rgba(255,255,255,0.12);color:#fff;border-left-color:var(--mint);font-weight:600}
.sb-link .sb-icon{width:20px;text-align:center;font-size:1rem}
.sb-link .badge-num{margin-left:auto;background:var(--gold);color:#fff;font-size:0.62rem;font-weight:700;padding:1px 7px;border-radius:50px}

.sb-bottom{padding:1.5rem;border-top:1px solid rgba(255,255,255,0.08)}
.sb-mpesa{background:rgba(255,255,255,0.08);border-radius:var(--r-sm);padding:1rem;margin-bottom:1rem;}
.sb-mpesa p{font-size:0.72rem;color:rgba(255,255,255,0.55);margin-bottom:0.3rem}
.sb-mpesa .mpesa-bal{font-size:1rem;font-weight:700;color:#fff}
.sb-mpesa .mpesa-num{font-size:0.68rem;color:var(--mint)}
.sb-logout{display:flex;align-items:center;gap:0.6rem;font-size:0.82rem;color:rgba(255,255,255,0.5);cursor:pointer;transition:color 0.15s;text-decoration:none;}
.sb-logout:hover{color:#fff}

.main{min-height:100vh;display:flex;flex-direction:column}
.topbar{background:#fff;padding:1rem 2.5rem;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid rgba(27,67,50,0.06);position:sticky;top:0;z-index:40;}
.page-title-bar h2{font-size:1.5rem;color:var(--forest);line-height:1}
.page-title-bar p{font-size:0.78rem;color:var(--text-light);margin-top:0.1rem}
.topbar-right{display:flex;align-items:center;gap:1rem}
.notif-btn{position:relative;width:40px;height:40px;border-radius:50%;background:var(--mist);border:none;cursor:pointer;font-size:1rem;display:flex;align-items:center;justify-content:center;transition:background 0.15s;}
.notif-btn:hover{background:var(--mint)}
.notif-dot{position:absolute;top:8px;right:8px;width:8px;height:8px;border-radius:50%;background:var(--error);border:1.5px solid #fff}
.ai-quick{display:flex;align-items:center;gap:0.5rem;padding:0.55rem 1.1rem;border-radius:50px;background:var(--forest);color:#fff;border:none;cursor:pointer;font-family:'Outfit',sans-serif;font-size:0.78rem;font-weight:500;transition:background 0.15s;}
.ai-quick:hover{background:var(--forest-mid)}

.content{padding:2.5rem;flex:1;max-width:1200px;width:100%}

.greeting-banner{background:linear-gradient(135deg,var(--forest) 0%,var(--forest-mid) 100%);border-radius:var(--r);padding:2rem 2.5rem;display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;position:relative;overflow:hidden;}
.greeting-banner::before{content:'';position:absolute;right:-50px;top:-50px;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,0.04)}
.greeting-text h1{font-size:1.9rem;color:#fff;margin-bottom:0.4rem}
.greeting-text p{font-size:0.85rem;color:rgba(255,255,255,0.7);line-height:1.6}
.greeting-text .loc-tag{display:inline-flex;align-items:center;gap:0.3rem;background:rgba(255,255,255,0.12);padding:0.3rem 0.75rem;border-radius:50px;font-size:0.72rem;color:rgba(255,255,255,0.8);margin-top:0.75rem}
.greeting-actions{display:flex;gap:0.75rem;position:relative;z-index:1}
.btn-banner{padding:0.7rem 1.4rem;border-radius:50px;font-family:'Outfit',sans-serif;font-size:0.85rem;font-weight:600;cursor:pointer;transition:all 0.2s;border:none;}
.btn-banner-primary{background:#fff;color:var(--forest)}
.btn-banner-primary:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(0,0,0,0.15)}
.btn-banner-ghost{background:rgba(255,255,255,0.12);color:#fff}
.btn-banner-ghost:hover{background:rgba(255,255,255,0.2)}

.stats-row{display:grid;grid-template-columns:repeat(4,1fr);gap:1.25rem;margin-bottom:2.5rem}
.stat-card{background:#fff;border-radius:var(--r);padding:1.6rem;box-shadow:var(--shadow);display:flex;align-items:flex-start;gap:1rem;}
.stat-icon{width:48px;height:48px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
.si-green{background:rgba(82,183,136,0.15)}.si-gold{background:rgba(212,160,23,0.15)}.si-blue{background:rgba(99,179,237,0.15)}.si-pink{background:rgba(245,101,101,0.15)}
.stat-info .num{font-size:1.6rem;font-weight:700;color:var(--charcoal);line-height:1.1;font-family:'Cormorant Garamond',serif}
.stat-info .lbl{font-size:0.75rem;color:var(--text-light);margin-top:0.25rem}
.stat-info .chg{font-size:0.68rem;color:var(--success);margin-top:0.2rem}

.content-grid{display:grid;grid-template-columns:1fr 340px;gap:2rem}
.panel{background:#fff;border-radius:var(--r);box-shadow:var(--shadow)}
.panel-head{padding:1.5rem 1.75rem;border-bottom:1px solid var(--mist);display:flex;align-items:center;justify-content:space-between}
.panel-head h3{font-size:1.1rem;color:var(--forest)}
.panel-head a{font-size:0.75rem;color:var(--forest-light);text-decoration:none;font-weight:500}
.panel-body{padding:1.5rem 1.75rem}

.appt-list{display:flex;flex-direction:column;gap:0}
.appt-item{display:flex;align-items:center;gap:1.25rem;padding:1.25rem 0;border-bottom:1px solid var(--mist)}
.appt-item:last-child{border-bottom:none;padding-bottom:0}
.appt-avatar{width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,var(--mint),var(--forest-light));display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0}
.appt-info{flex:1}
.appt-name{font-weight:600;font-size:0.9rem;margin-bottom:0.15rem}
.appt-detail{font-size:0.75rem;color:var(--text-light)}
.appt-amount{font-size:0.85rem;font-weight:700;color:var(--forest);margin-right:0.75rem}
.status-pill{padding:0.25rem 0.75rem;border-radius:50px;font-size:0.68rem;font-weight:600;white-space:nowrap}
.sp-confirmed{background:rgba(34,197,94,0.12);color:#15803d}
.sp-pending{background:rgba(245,158,11,0.12);color:#b45309}
.sp-completed{background:var(--mist);color:var(--text-light)}

.nearby-list{display:flex;flex-direction:column;gap:0}
.nearby-item{display:flex;align-items:center;gap:0.85rem;padding:1rem 0;border-bottom:1px solid var(--mist);cursor:pointer;transition:opacity 0.1s}
.nearby-item:last-child{border-bottom:none;padding-bottom:0}
.nearby-item:hover{opacity:0.85}
.nearby-avatar{width:42px;height:42px;border-radius:50%;background:var(--mint);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0}
.nearby-info{flex:1}
.nearby-name{font-weight:600;font-size:0.85rem;margin-bottom:0.1rem}
.nearby-spec{font-size:0.72rem;color:var(--text-light)}
.nearby-dist{font-size:0.68rem;color:var(--forest-mid);margin-top:0.1rem;display:flex;align-items:center;gap:0.2rem}
.nearby-right{text-align:right;flex-shrink:0}
.nearby-rate{font-weight:700;font-size:0.88rem;color:var(--forest)}
.nearby-avail{font-size:0.65rem;margin-top:0.2rem}
.avail-green{color:var(--success)}.avail-amber{color:var(--warn)}
.stars{color:#f59e0b;font-size:0.7rem}

.qa-grid{display:grid;grid-template-columns:1fr 1fr;gap:0.75rem}
.qa-btn{padding:1.1rem 1rem;border-radius:var(--r-sm);border:1.5px solid var(--mist);background:#fff;text-align:center;cursor:pointer;transition:all 0.2s;font-family:'Outfit',sans-serif;}
.qa-btn:hover{border-color:var(--forest-light);background:rgba(82,183,136,0.06);transform:translateY(-2px)}
.qa-btn .qa-icon{font-size:1.4rem;display:block;margin-bottom:0.5rem}
.qa-btn .qa-label{font-size:0.78rem;font-weight:600;color:var(--text-dark);display:block}
.qa-btn .qa-sub{font-size:0.65rem;color:var(--text-light);display:block;margin-top:0.15rem}

.ai-panel{background:linear-gradient(135deg,var(--forest),var(--forest-mid));border-radius:var(--r);padding:1.5rem;position:relative;overflow:hidden}
.ai-panel::before{content:'';position:absolute;right:-30px;top:-30px;width:120px;height:120px;border-radius:50%;background:rgba(255,255,255,0.05)}
.ai-panel h3{font-size:1rem;color:#fff;margin-bottom:0.4rem;position:relative;z-index:1}
.ai-panel p{font-size:0.75rem;color:rgba(255,255,255,0.68);margin-bottom:1.25rem;position:relative;z-index:1;line-height:1.6}
.ai-prompts{display:flex;flex-direction:column;gap:0.5rem;position:relative;z-index:1}
.ai-prompt-btn{padding:0.6rem 1rem;border-radius:var(--r-sm);background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.18);color:#fff;font-family:'Outfit',sans-serif;font-size:0.75rem;text-align:left;cursor:pointer;transition:background 0.15s;}
.ai-prompt-btn:hover{background:rgba(255,255,255,0.18)}

.spend-bar{margin-top:1rem}
.spend-row{display:flex;justify-content:space-between;font-size:0.78rem;margin-bottom:0.4rem}
.spend-row .lbl{color:var(--text-mid)}
.spend-row .val{font-weight:600;color:var(--charcoal)}
.spend-track{height:6px;background:var(--mist);border-radius:3px;overflow:hidden;margin-bottom:1rem}
.spend-fill{height:100%;border-radius:3px;background:linear-gradient(90deg,var(--forest-light),var(--forest))}
.spend-total{display:flex;justify-content:space-between;padding-top:1rem;border-top:1px solid var(--mist);font-size:0.85rem}
.spend-total .lbl{color:var(--text-mid)}
.spend-total .val{font-weight:700;color:var(--forest);font-size:1rem;font-family:'Cormorant Garamond',serif}

.float-chat{position:fixed;bottom:2rem;right:2rem;z-index:200;width:56px;height:56px;border-radius:50%;background:var(--forest);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;box-shadow:0 8px 28px rgba(27,67,50,0.4);transition:all 0.2s;}
.float-chat:hover{background:var(--forest-mid);transform:scale(1.08)}

.chat-drawer{position:fixed;bottom:5.5rem;right:2rem;z-index:200;width:340px;background:#fff;border-radius:var(--r);box-shadow:var(--shadow-lg);overflow:hidden;display:none;transform:scale(0.9);opacity:0;transform-origin:bottom right;transition:all 0.25s ease;}
.chat-drawer.open{display:flex;flex-direction:column;transform:scale(1);opacity:1}
.cd-header{background:var(--forest);padding:1.1rem 1.25rem;display:flex;align-items:center;justify-content:space-between}
.cd-header h4{color:#fff;font-size:0.92rem;font-family:'Outfit',sans-serif;font-weight:600}
.cd-header p{color:rgba(255,255,255,0.65);font-size:0.68rem}
.cd-close{background:none;border:none;color:rgba(255,255,255,0.6);cursor:pointer;font-size:1.1rem}
.cd-messages{flex:1;height:220px;overflow-y:auto;padding:1rem;display:flex;flex-direction:column;gap:0.75rem}
.cd-messages::-webkit-scrollbar{width:3px}
.cd-messages::-webkit-scrollbar-thumb{background:var(--mist);border-radius:2px}
.cd-msg{max-width:80%;font-size:0.78rem;line-height:1.55}
.cd-msg.ai{background:var(--mist);border-radius:12px 12px 12px 2px;padding:0.6rem 0.85rem;color:var(--text-dark)}
.cd-msg.user{background:var(--forest);color:#fff;border-radius:12px 12px 2px 12px;padding:0.6rem 0.85rem;margin-left:auto}
.cd-input-row{display:flex;gap:0.5rem;padding:0.75rem 1rem;border-top:1px solid var(--mist)}
.cd-input{flex:1;border:1.5px solid var(--mist);border-radius:50px;padding:0.55rem 0.9rem;font-size:0.78rem;font-family:'Outfit',sans-serif;outline:none}
.cd-input:focus{border-color:var(--forest-light)}
.cd-send{width:36px;height:36px;border-radius:50%;background:var(--forest);border:none;cursor:pointer;color:#fff;font-size:0.85rem}

@media(max-width:1100px){
  .stats-row{grid-template-columns:repeat(2,1fr)}
  .content-grid{grid-template-columns:1fr}
}
@media(max-width:768px){
  body{grid-template-columns:1fr}
  .sidebar{display:none}
  .content{padding:1.5rem}
  .greeting-actions{flex-direction:column}
}
</style>
</head>
<body>

<aside class="sidebar">
  <a href="/" class="sb-logo"><div class="logo-mark">🤝</div>CareConnect</a>

  <div class="sb-user">
    <div class="sb-avatar">👵</div>
    <div>
      <div class="sb-user-name">Margaret Kamau</div>
      <div class="sb-user-role">Client Account</div>
      <div class="sb-user-loc">📍 Westlands, Nairobi</div>
    </div>
  </div>

  <nav class="sb-nav">
    <div class="sb-section-label">Main</div>
    <a href="/dashboard" class="sb-link active"><span class="sb-icon">🏠</span>Dashboard</a>
    <a href="/caregivers" class="sb-link"><span class="sb-icon">🔍</span>Find Caregivers</a>
    <a href="/appointments" class="sb-link"><span class="sb-icon">📅</span>My Appointments <span class="badge-num">3</span></a>
    <a href="/ai-assistant" class="sb-link"><span class="sb-icon">🤖</span>AI Assistant</a>
    <div class="sb-section-label" style="margin-top:1rem">Account</div>
    <a href="/payments" class="sb-link"><span class="sb-icon">💳</span>Payments & Billing</a>
    <a href="/reviews" class="sb-link"><span class="sb-icon">⭐</span>My Reviews</a>
    <a href="/settings" class="sb-link"><span class="sb-icon">⚙️</span>Settings</a>
    <a href="/help" class="sb-link"><span class="sb-icon">❓</span>Help & Support</a>
  </nav>

  <div class="sb-bottom">
    <div class="sb-mpesa">
      <p>M-Pesa Wallet</p>
      <div class="mpesa-bal">KES 4,500</div>
      <div class="mpesa-num">0712 *** 678 · Active</div>
    </div>
    <a href="/logout" class="sb-logout">🚪 Sign Out</a>
  </div>
</aside>

<main class="main">
  <div class="topbar">
    <div class="page-title-bar">
      <h2>My Dashboard</h2>
      <p>Friday, 20 Feb 2026 · Westlands, Nairobi</p>
    </div>
    <div class="topbar-right">
      <button class="notif-btn">🔔<div class="notif-dot"></div></button>
      <button class="ai-quick" onclick="toggleChat()">🤖 Ask Care AI</button>
    </div>
  </div>

  <div class="content">

    <div class="greeting-banner">
      <div class="greeting-text">
        <h1>Good Morning, Margaret 👋</h1>
        <p>You have <strong style="color:var(--mint)">3 upcoming appointments</strong> this week.<br>Grace Wanjiku arrives tomorrow at 9:00 AM.</p>
        <div class="loc-tag">📍 Showing caregivers near Westlands, Nairobi</div>
      </div>
      <div class="greeting-actions">
        <button class="btn-banner btn-banner-primary" onclick="window.location.href='/caregivers'">📅 Book a Session</button>
        <button class="btn-banner btn-banner-ghost" onclick="toggleChat()">🤖 Ask AI</button>
      </div>
    </div>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon si-green">📅</div>
        <div class="stat-info">
          <div class="num">3</div>
          <div class="lbl">Upcoming Appointments</div>
          <div class="chg">↑ 1 new this week</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-gold">⭐</div>
        <div class="stat-info">
          <div class="num">12</div>
          <div class="lbl">Sessions Completed</div>
          <div class="chg">Since Jan 2025</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-blue">👩‍⚕️</div>
        <div class="stat-info">
          <div class="num">2</div>
          <div class="lbl">Trusted Caregivers</div>
          <div class="chg">In your area</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon si-pink">💳</div>
        <div class="stat-info">
          <div class="num">KES 7,800</div>
          <div class="lbl">Total Spent This Month</div>
          <div class="chg" style="color:var(--warn)">↑ KES 1,200 vs last month</div>
        </div>
      </div>
    </div>

    <div class="content-grid">
      <div style="display:flex;flex-direction:column;gap:2rem">

        <div class="panel">
          <div class="panel-head">
            <h3>Upcoming Appointments</h3>
            <a href="/appointments">View All →</a>
          </div>
          <div class="panel-body">
            <div class="appt-list">
              <div class="appt-item">
                <div class="appt-avatar">👩‍⚕️</div>
                <div class="appt-info">
                  <div class="appt-name">Grace Wanjiku</div>
                  <div class="appt-detail">📅 Tomorrow · 9:00 AM · 2 hrs · Dementia Care · 📍 Westlands</div>
                </div>
                <div class="appt-amount">KES 900</div>
                <span class="status-pill sp-confirmed">Confirmed</span>
              </div>
              <div class="appt-item">
                <div class="appt-avatar">👨‍⚕️</div>
                <div class="appt-info">
                  <div class="appt-name">James Otieno</div>
                  <div class="appt-detail">📅 Fri, 22 Feb · 11:00 AM · 1 hr · Physical Therapy · 📍 Kilimani</div>
                </div>
                <div class="appt-amount">KES 550</div>
                <span class="status-pill sp-pending">Pending</span>
              </div>
              <div class="appt-item">
                <div class="appt-avatar">👩‍⚕️</div>
                <div class="appt-info">
                  <div class="appt-name">Grace Wanjiku</div>
                  <div class="appt-detail">📅 Sat, 23 Feb · 10:00 AM · 4 hrs · Companion Care · 📍 Westlands</div>
                </div>
                <div class="appt-amount">KES 1,800</div>
                <span class="status-pill sp-confirmed">Confirmed</span>
              </div>
            </div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-head">
            <h3>Caregivers Near You <span style="font-size:0.75rem;color:var(--text-light);font-family:'Outfit',sans-serif;font-weight:400">📍 Westlands area</span></h3>
            <a href="/caregivers">Browse All →</a>
          </div>
          <div class="panel-body">
            <div class="nearby-list">
              <div class="nearby-item">
                <div class="nearby-avatar">👩‍⚕️</div>
                <div class="nearby-info">
                  <div class="nearby-name">Grace Wanjiku</div>
                  <div class="nearby-spec">Dementia & Memory Care</div>
                  <div class="nearby-dist">📍 2.4 km · Westlands <span class="stars">★★★★★</span> 4.9</div>
                </div>
                <div class="nearby-right">
                  <div class="nearby-rate">KES 450/hr</div>
                  <div class="nearby-avail avail-green">● Available Now</div>
                </div>
              </div>
              <div class="nearby-item">
                <div class="nearby-avatar">👨‍⚕️</div>
                <div class="nearby-info">
                  <div class="nearby-name">James Otieno</div>
                  <div class="nearby-spec">Physical Therapy Aide</div>
                  <div class="nearby-dist">📍 3.1 km · Kilimani <span class="stars">★★★★★</span> 4.8</div>
                </div>
                <div class="nearby-right">
                  <div class="nearby-rate">KES 550/hr</div>
                  <div class="nearby-avail avail-green">● Available Now</div>
                </div>
              </div>
              <div class="nearby-item">
                <div class="nearby-avatar">👩‍🦱</div>
                <div class="nearby-info">
                  <div class="nearby-name">Amina Hassan</div>
                  <div class="nearby-spec">Companion & Respite Care</div>
                  <div class="nearby-dist">📍 4.8 km · South C <span class="stars">★★★★☆</span> 4.7</div>
                </div>
                <div class="nearby-right">
                  <div class="nearby-rate">KES 320/hr</div>
                  <div class="nearby-avail avail-amber">● From Tomorrow</div>
                </div>
              </div>
              <div class="nearby-item">
                <div class="nearby-avatar">👩‍🔬</div>
                <div class="nearby-info">
                  <div class="nearby-name">Angela Mwangi</div>
                  <div class="nearby-spec">Memory Care Specialist</div>
                  <div class="nearby-dist">📍 5.2 km · Karen <span class="stars">★★★★★</span> 4.8</div>
                </div>
                <div class="nearby-right">
                  <div class="nearby-rate">KES 500/hr</div>
                  <div class="nearby-avail avail-green">● Available Now</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div style="display:flex;flex-direction:column;gap:1.5rem">

        <div class="panel">
          <div class="panel-head"><h3>Quick Actions</h3></div>
          <div class="panel-body">
            <div class="qa-grid">
              <div class="qa-btn" onclick="window.location.href='/caregivers'">
                <span class="qa-icon">📅</span>
                <span class="qa-label">Book Session</span>
                <span class="qa-sub">Find & book now</span>
              </div>
              <div class="qa-btn" onclick="window.location.href='/caregivers/grace-wanjiku/rebook'">
                <span class="qa-icon">↩️</span>
                <span class="qa-label">Rebook Grace</span>
                <span class="qa-sub">1-tap rebooking</span>
              </div>
              <div class="qa-btn" onclick="toggleChat()">
                <span class="qa-icon">🤖</span>
                <span class="qa-label">Ask AI</span>
                <span class="qa-sub">Get care advice</span>
              </div>
              <div class="qa-btn" onclick="window.location.href='/payments/topup'">
                <span class="qa-icon">💳</span>
                <span class="qa-label">Top Up</span>
                <span class="qa-sub">M-Pesa wallet</span>
              </div>
            </div>
          </div>
        </div>

        <div class="ai-panel">
          <h3>🤖 Care AI Assistant</h3>
          <p>Get instant answers about care options, health guidance, and platform help — in English or Swahili.</p>
          <div class="ai-prompts">
            <button class="ai-prompt-btn" onclick="openChatWithPrompt(this.textContent)">Find me a caregiver nearby →</button>
            <button class="ai-prompt-btn" onclick="openChatWithPrompt(this.textContent)">Tips for dementia care →</button>
            <button class="ai-prompt-btn" onclick="openChatWithPrompt(this.textContent)">How do I pay via M-Pesa? →</button>
          </div>
        </div>

        <div class="panel">
          <div class="panel-head"><h3>Spending This Month</h3></div>
          <div class="panel-body">
            <div class="spend-bar">
              <div class="spend-row"><span class="lbl">Grace Wanjiku</span><span class="val">KES 5,400</span></div>
              <div class="spend-track"><div class="spend-fill" style="width:69%"></div></div>
              <div class="spend-row"><span class="lbl">James Otieno</span><span class="val">KES 2,400</span></div>
              <div class="spend-track"><div class="spend-fill" style="width:31%;background:linear-gradient(90deg,var(--gold),var(--forest-light))"></div></div>
            </div>
            <div class="spend-total">
              <span class="lbl">February Total</span>
              <span class="val">KES 7,800</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<button class="float-chat" onclick="toggleChat()">🤖</button>

<div class="chat-drawer" id="chat-drawer">
  <div class="cd-header">
    <div>
      <h4>🤖 Care AI Assistant</h4>
      <p>Available 24/7 · English & Swahili</p>
    </div>
    <button class="cd-close" onclick="toggleChat()">✕</button>
  </div>
  <div class="cd-messages" id="cd-messages">
    <div class="cd-msg ai">Habari! I'm your CareConnect assistant. I can help you find caregivers near Westlands, answer questions about care, or guide you through booking. How can I help? 😊</div>
  </div>
  <div class="cd-input-row">
    <input class="cd-input" id="cd-input" placeholder="Type a message…" onkeydown="if(event.key==='Enter')sendCD()"/>
    <button class="cd-send" onclick="sendCD()">➤</button>
  </div>
</div>

<script>
let chatOpen = false;
function toggleChat(){
  chatOpen = !chatOpen;
  const drawer = document.getElementById('chat-drawer');
  drawer.classList.toggle('open', chatOpen);
  if(chatOpen) document.getElementById('cd-input').focus();
}

function openChatWithPrompt(text){
  chatOpen = true;
  document.getElementById('chat-drawer').classList.add('open');
  addCDMsg(text.replace(' →',''), 'user');
  showCDTyping();
  setTimeout(()=>{ removeCDTyping(); addCDMsg(getCDResp(text), 'ai'); }, 1100);
}

const cdResponses = {
  'nearby':'I can see you\'re in Westlands, Nairobi. Here are caregivers within 5 km:\n\n👩‍⚕️ Grace Wanjiku — KES 450/hr · 2.4 km · ★4.9 · Available now\n👨‍⚕️ James Otieno — KES 550/hr · 3.1 km · ★4.8 · Available now\n\nShall I help you book one?',
  'dementia':'Dementia care tips for home settings:\n\n• Stick to consistent daily routines\n• Use simple, calm language\n• Label common items around the home\n• Ensure good lighting to reduce confusion\n• Engage with music from their era\n\nOur specialist Grace Wanjiku (Westlands) has 8 years in memory care. Would you like to book her?',
  'mpesa':'Paying via M-Pesa on CareConnect is simple:\n\n1. Select your caregiver and book a session\n2. At checkout, choose "M-Pesa"\n3. Enter your Safaricom number\n4. You\'ll receive an STK push — enter your PIN\n5. Confirmation arrives by SMS and email instantly\n\nAll payments are secure and receipts are saved in your account.',
  'default':'I\'m here to help! You can ask me about:\n• Finding caregivers near you\n• Pricing and payment via M-Pesa\n• Care tips for specific conditions\n• Booking and managing appointments\n\nWhat would you like to know?'
};

function getCDResp(msg){
  const m = msg.toLowerCase();
  if(m.includes('near')||m.includes('caregiver')) return cdResponses.nearby;
  if(m.includes('dementia')||m.includes('memory')) return cdResponses.dementia;
  if(m.includes('mpesa')||m.includes('pay')) return cdResponses.mpesa;
  return cdResponses.default;
}

function sendCD(){
  const input = document.getElementById('cd-input');
  const text = input.value.trim();
  if(!text) return;
  addCDMsg(text, 'user');
  input.value = '';
  showCDTyping();
  setTimeout(()=>{ removeCDTyping(); addCDMsg(getCDResp(text), 'ai'); }, 1000 + Math.random()*600);
}

function addCDMsg(text, role){
  const msgs = document.getElementById('cd-messages');
  const div = document.createElement('div');
  div.className = 'cd-msg ' + role;
  div.textContent = text;
  msgs.appendChild(div);
  msgs.scrollTop = msgs.scrollHeight;
}

function showCDTyping(){
  const msgs = document.getElementById('cd-messages');
  const div = document.createElement('div');
  div.className = 'cd-msg ai'; div.id = 'cd-typing';
  div.innerHTML = '<span style="letter-spacing:0.2em;color:var(--text-light)">• • •</span>';
  msgs.appendChild(div);
  msgs.scrollTop = msgs.scrollHeight;
}
function removeCDTyping(){ document.getElementById('cd-typing')?.remove(); }
</script>
</body>
</html>