<?php
/**
 * Template Name: Theopack Home
 * Template Post Type: page
 *
 * Página principal da Theopack
 * Upload para: wp-content/themes/[SEU-TEMA]/page-theopack-home.php
 */
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>THEOPACK — Filme Stretch Industrial</title>
<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:ital,wght@0,400;0,600;0,700;0,900;1,400&family=Barlow:wght@300;400;500&display=swap" rel="stylesheet">
<style>
/* ── RESET & VARS ─────────────────────────────────────────── */
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
:root{
  --red:#CC1520;
  --red-dark:#880010;
  --red-light:#E82030;
  --blue:#0A2E7A;
  --blue-mid:#1560C8;
  --blue-light:#4A90E0;
  --dark:#0B0F14;
  --dark2:#111820;
  --dark3:#182030;
  --steel:#1E2C3A;
  --mid:#2A3A4A;
  --line:#FFFFFF0F;
  --text:#E8ECF0;
  --muted:#7A8E9E;
  --white:#FFFFFF;
}
html{scroll-behavior:smooth}
body{
  background:var(--dark);
  color:var(--text);
  font-family:'Barlow',sans-serif;
  font-weight:300;
  overflow-x:hidden;
}
a{text-decoration:none;color:inherit}
img{display:block;max-width:100%}

/* ── SCROLLBAR ─────────────────────────────────────────────── */
::-webkit-scrollbar{width:4px}
::-webkit-scrollbar-track{background:var(--dark2)}
::-webkit-scrollbar-thumb{background:var(--red)}

/* ── NOISE TEXTURE ─────────────────────────────────────────── */
body::after{
  content:'';
  position:fixed;inset:0;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size:200px 200px;
  pointer-events:none;
  z-index:9999;
  opacity:.4;
}

/* ── TYPOGRAPHY ─────────────────────────────────────────────── */
.f-display{font-family:'Bebas Neue',sans-serif;letter-spacing:1px}
.f-cond{font-family:'Barlow Condensed',sans-serif}

/* ── NAV ─────────────────────────────────────────────────────── */
nav{
  position:fixed;top:0;left:0;right:0;z-index:100;
  display:flex;align-items:center;justify-content:space-between;
  padding:0 56px;
  height:68px;
  background:linear-gradient(to bottom,rgba(11,15,20,.98),rgba(11,15,20,.0));
  backdrop-filter:blur(0px);
  transition:background .3s,backdrop-filter .3s;
}
nav.scrolled{
  background:rgba(11,15,20,.97);
  backdrop-filter:blur(12px);
  border-bottom:1px solid var(--line);
}
.nav-logo svg{height:32px;width:auto}
.nav-links{display:flex;gap:40px;align-items:center}
.nav-links a{
  font-family:'Barlow Condensed',sans-serif;
  font-size:13px;font-weight:600;
  letter-spacing:2.5px;text-transform:uppercase;
  color:var(--muted);
  transition:color .2s;
}
.nav-links a:hover{color:var(--white)}
.nav-cta{
  font-family:'Barlow Condensed',sans-serif;
  font-size:12px;font-weight:700;
  letter-spacing:2px;text-transform:uppercase;
  padding:10px 24px;
  background:var(--red);
  color:#fff;
  border:none;cursor:pointer;
  transition:background .2s,transform .15s;
}
.nav-cta:hover{background:var(--red-light);transform:translateY(-1px)}

/* ── HERO ─────────────────────────────────────────────────────── */
#hero{
  position:relative;
  min-height:100vh;
  display:flex;align-items:center;
  overflow:hidden;
  padding:0 56px;
}
.hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 60% at 70% 50%, rgba(21,96,200,.12) 0%, transparent 70%),
    radial-gradient(ellipse 50% 80% at 20% 80%, rgba(204,21,32,.08) 0%, transparent 60%),
    var(--dark);
}
/* Grid lines in background */
.hero-grid{
  position:absolute;inset:0;
  background-image:
    linear-gradient(var(--line) 1px,transparent 1px),
    linear-gradient(90deg,var(--line) 1px,transparent 1px);
  background-size:64px 64px;
  mask-image:radial-gradient(ellipse 90% 90% at 50% 50%,black 30%,transparent 100%);
}

.hero-content{
  position:relative;z-index:2;
  max-width:700px;
}
.hero-eyebrow{
  display:inline-flex;align-items:center;gap:12px;
  font-family:'Barlow Condensed',sans-serif;
  font-size:11px;font-weight:700;
  letter-spacing:4px;text-transform:uppercase;
  color:var(--red);
  margin-bottom:28px;
}
.hero-eyebrow::before{
  content:'';display:block;
  width:32px;height:2px;
  background:var(--red);
}
.hero-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(64px,7vw,100px);
  line-height:.95;
  color:var(--white);
  margin-bottom:28px;
}
.hero-title span{color:var(--blue-mid)}
.hero-sub{
  font-size:17px;font-weight:300;
  color:var(--muted);
  line-height:1.65;
  max-width:480px;
  margin-bottom:48px;
}
.hero-actions{display:flex;gap:16px;flex-wrap:wrap}
.btn-primary{
  font-family:'Barlow Condensed',sans-serif;
  font-size:13px;font-weight:700;
  letter-spacing:2.5px;text-transform:uppercase;
  padding:16px 36px;
  background:var(--red);
  color:#fff;cursor:pointer;
  border:none;
  transition:background .2s,transform .15s,box-shadow .2s;
  display:inline-block;
}
.btn-primary:hover{
  background:var(--red-light);
  transform:translateY(-2px);
  box-shadow:0 8px 32px rgba(204,21,32,.35);
}
.btn-outline{
  font-family:'Barlow Condensed',sans-serif;
  font-size:13px;font-weight:700;
  letter-spacing:2.5px;text-transform:uppercase;
  padding:16px 36px;
  background:transparent;
  color:var(--text);
  border:1px solid rgba(255,255,255,.2);
  cursor:pointer;
  transition:border-color .2s,color .2s,transform .15s;
  display:inline-block;
}
.btn-outline:hover{
  border-color:rgba(255,255,255,.5);
  color:#fff;
  transform:translateY(-2px);
}

/* Hero roll illustration */
.hero-visual{
  position:absolute;
  right:-40px;top:50%;
  transform:translateY(-50%);
  width:min(560px,50vw);
  opacity:.22;
  pointer-events:none;
}

/* Stats strip */
.hero-stats{
  position:absolute;bottom:0;left:0;right:0;
  display:flex;
  border-top:1px solid var(--line);
  background:rgba(11,15,20,.6);
  backdrop-filter:blur(8px);
}
.stat-item{
  flex:1;
  padding:24px 40px;
  border-right:1px solid var(--line);
  display:flex;align-items:center;gap:16px;
}
.stat-item:last-child{border-right:none}
.stat-num{
  font-family:'Bebas Neue',sans-serif;
  font-size:36px;color:var(--white);line-height:1;
}
.stat-num span{color:var(--red);font-size:28px}
.stat-label{
  font-family:'Barlow Condensed',sans-serif;
  font-size:11px;font-weight:600;
  letter-spacing:2px;text-transform:uppercase;
  color:var(--muted);
  line-height:1.4;
}

/* ── SECTION BASE ──────────────────────────────────────────── */
section{padding:100px 56px}
.section-tag{
  display:inline-flex;align-items:center;gap:10px;
  font-family:'Barlow Condensed',sans-serif;
  font-size:10px;font-weight:700;
  letter-spacing:4px;text-transform:uppercase;
  color:var(--red);
  margin-bottom:16px;
}
.section-tag::before{
  content:'';display:block;
  width:24px;height:2px;background:var(--red);
}
.section-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(40px,4vw,58px);
  color:var(--white);
  line-height:1;
  margin-bottom:16px;
}
.section-sub{
  font-size:16px;color:var(--muted);
  max-width:520px;line-height:1.7;
}
.section-header{margin-bottom:64px}

/* ── DIFERENCIAIS ──────────────────────────────────────────── */
#diferenciais{
  background:var(--dark2);
  border-top:1px solid var(--line);
  border-bottom:1px solid var(--line);
}
.dif-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:1px;
  background:var(--line);
  border:1px solid var(--line);
}
.dif-card{
  background:var(--dark2);
  padding:44px 36px;
  transition:background .25s;
  position:relative;overflow:hidden;
}
.dif-card::before{
  content:'';
  position:absolute;top:0;left:0;right:0;
  height:3px;
  background:linear-gradient(90deg,var(--red),var(--blue-mid));
  transform:scaleX(0);transform-origin:left;
  transition:transform .3s;
}
.dif-card:hover{background:var(--dark3)}
.dif-card:hover::before{transform:scaleX(1)}
.dif-icon{
  width:44px;height:44px;
  margin-bottom:24px;
  color:var(--blue-mid);
}
.dif-title{
  font-family:'Barlow Condensed',sans-serif;
  font-size:18px;font-weight:700;
  letter-spacing:.5px;
  color:var(--white);
  margin-bottom:10px;
}
.dif-text{font-size:14px;color:var(--muted);line-height:1.65}

/* ── PRODUTOS ──────────────────────────────────────────────── */
#produtos{background:var(--dark)}
.produtos-grid{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:24px;
}
.produtos-grid .produto-card[style*="span 2"]{
  grid-column: span 2;
}
.produto-card{
  background:var(--dark2);
  border:1px solid var(--line);
  overflow:hidden;
  transition:border-color .25s,transform .25s;
  cursor:pointer;
}
.produto-card:hover{
  border-color:rgba(204,21,32,.4);
  transform:translateY(-4px);
}
.produto-img{
  aspect-ratio:4/3;
  background:var(--steel);
  display:flex;align-items:center;justify-content:center;
  overflow:hidden;position:relative;
}
.produto-img svg{width:60%;height:60%;opacity:.5}
.produto-badge{
  position:absolute;top:16px;left:16px;
  font-family:'Barlow Condensed',sans-serif;
  font-size:10px;font-weight:700;
  letter-spacing:2px;text-transform:uppercase;
  padding:4px 10px;
  background:var(--red);
  color:#fff;
}
.produto-body{padding:28px}
.produto-name{
  font-family:'Barlow Condensed',sans-serif;
  font-size:18px;font-weight:700;
  color:var(--white);
  margin-bottom:8px;line-height:1.3;
}
.produto-specs{
  display:flex;flex-wrap:wrap;gap:8px;
  margin-bottom:20px;
}
.spec-tag{
  font-family:'Barlow Condensed',sans-serif;
  font-size:11px;font-weight:600;
  letter-spacing:1.5px;text-transform:uppercase;
  padding:4px 10px;
  background:var(--steel);
  color:var(--muted);
  border:1px solid var(--line);
}
.produto-cta{
  font-family:'Barlow Condensed',sans-serif;
  font-size:12px;font-weight:700;
  letter-spacing:2px;text-transform:uppercase;
  color:var(--red);
  display:flex;align-items:center;gap:8px;
  transition:gap .2s;
}
.produto-card:hover .produto-cta{gap:14px}

/* ── SOBRE ─────────────────────────────────────────────────── */
#sobre{
  background:var(--dark2);
  border-top:1px solid var(--line);
}
.sobre-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:80px;
  align-items:start;
}
.mvv-grid{
  display:grid;gap:16px;
  margin-top:40px;
}
.mvv-card{
  padding:24px;
  border-left:2px solid var(--red);
  background:var(--dark3);
}
.mvv-label{
  font-family:'Barlow Condensed',sans-serif;
  font-size:10px;font-weight:700;
  letter-spacing:3px;text-transform:uppercase;
  color:var(--red);margin-bottom:8px;
}
.mvv-text{font-size:14px;color:var(--muted);line-height:1.65}

.valores-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:12px;
}
.valor-item{
  display:flex;align-items:flex-start;gap:12px;
  padding:20px;
  background:var(--dark3);
  border:1px solid var(--line);
  transition:border-color .2s;
}
.valor-item:hover{border-color:rgba(21,96,200,.3)}
.valor-dot{
  width:8px;height:8px;
  background:var(--red);
  border-radius:50%;
  flex-shrink:0;margin-top:4px;
}
.valor-name{
  font-family:'Barlow Condensed',sans-serif;
  font-size:15px;font-weight:700;
  color:var(--white);margin-bottom:4px;
}
.valor-desc{font-size:12px;color:var(--muted);line-height:1.5}

/* ── CONTATO ──────────────────────────────────────────────── */
#contato{
  background:var(--dark);
  border-top:1px solid var(--line);
}
.contato-wrap{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:80px;
  align-items:start;
}
.contato-info{display:flex;flex-direction:column;gap:32px;margin-top:40px}
.info-row{
  display:flex;align-items:flex-start;gap:20px;
  padding-bottom:32px;
  border-bottom:1px solid var(--line);
}
.info-row:last-child{border-bottom:none}
.info-icon{
  width:40px;height:40px;
  background:var(--dark3);
  border:1px solid var(--line);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
  color:var(--blue-mid);
}
.info-label{
  font-family:'Barlow Condensed',sans-serif;
  font-size:10px;font-weight:700;
  letter-spacing:3px;text-transform:uppercase;
  color:var(--red);margin-bottom:4px;
}
.info-val{font-size:15px;color:var(--text);line-height:1.5}

/* FORM */
.contato-form{
  background:var(--dark2);
  border:1px solid var(--line);
  padding:40px;
}
.form-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:28px;color:var(--white);
  margin-bottom:8px;
}
.form-sub{font-size:13px;color:var(--muted);margin-bottom:32px;line-height:1.5}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
.form-group{display:flex;flex-direction:column;gap:6px;margin-bottom:16px}
.form-group label{
  font-family:'Barlow Condensed',sans-serif;
  font-size:11px;font-weight:700;
  letter-spacing:2px;text-transform:uppercase;
  color:var(--muted);
}
.form-group input,
.form-group select,
.form-group textarea{
  background:var(--dark3);
  border:1px solid var(--line);
  color:var(--text);
  padding:12px 16px;
  font-family:'Barlow',sans-serif;
  font-size:14px;
  outline:none;
  transition:border-color .2s;
  width:100%;
}
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus{
  border-color:rgba(21,96,200,.5);
}
.form-group textarea{resize:vertical;min-height:100px}
.form-group select option{background:var(--dark3);color:var(--text)}
.form-submit{
  width:100%;
  font-family:'Barlow Condensed',sans-serif;
  font-size:14px;font-weight:700;
  letter-spacing:2.5px;text-transform:uppercase;
  padding:16px;
  background:var(--red);
  color:#fff;
  border:none;cursor:pointer;
  transition:background .2s,transform .15s,box-shadow .2s;
}
.form-submit:hover{
  background:var(--red-light);
  transform:translateY(-2px);
  box-shadow:0 8px 24px rgba(204,21,32,.3);
}

/* ── FOOTER ─────────────────────────────────────────────────── */
footer{
  background:var(--dark2);
  border-top:1px solid var(--line);
  padding:60px 56px 32px;
}
.footer-grid{
  display:grid;
  grid-template-columns:2fr 1fr 1fr;
  gap:60px;
  margin-bottom:48px;
}
.footer-brand p{
  font-size:14px;color:var(--muted);
  line-height:1.7;max-width:300px;
  margin-top:20px;
}
.footer-col h4{
  font-family:'Barlow Condensed',sans-serif;
  font-size:11px;font-weight:700;
  letter-spacing:3px;text-transform:uppercase;
  color:var(--muted);
  margin-bottom:20px;
}
.footer-col ul{list-style:none;display:flex;flex-direction:column;gap:10px}
.footer-col ul li a{
  font-size:14px;color:rgba(255,255,255,.5);
  transition:color .2s;
}
.footer-col ul li a:hover{color:var(--white)}
.footer-bottom{
  display:flex;justify-content:space-between;align-items:center;
  padding-top:24px;
  border-top:1px solid var(--line);
}
.footer-bottom p{font-size:12px;color:var(--muted)}
.sustentabilidade{
  display:inline-flex;align-items:center;gap:8px;
  font-family:'Barlow Condensed',sans-serif;
  font-size:11px;font-weight:600;
  letter-spacing:1.5px;text-transform:uppercase;
  color:#4CAF50;
  padding:6px 14px;
  border:1px solid rgba(76,175,80,.2);
  background:rgba(76,175,80,.05);
}

/* ── ANIMATIONS ─────────────────────────────────────────────── */
@keyframes fadeUp{
  from{opacity:0;transform:translateY(30px)}
  to{opacity:1;transform:translateY(0)}
}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
@keyframes roll{
  from{transform:rotate(0deg)}
  to{transform:rotate(360deg)}
}

.animate{opacity:0}
.animate.visible{animation:fadeUp .7s ease forwards}
.animate-delay-1{animation-delay:.1s}
.animate-delay-2{animation-delay:.2s}
.animate-delay-3{animation-delay:.3s}
.animate-delay-4{animation-delay:.4s}

/* Hero entry */
.hero-content > *{
  opacity:0;animation:fadeUp .8s ease forwards;
}
.hero-eyebrow{animation-delay:.1s}
.hero-title{animation-delay:.25s}
.hero-sub{animation-delay:.4s}
.hero-actions{animation-delay:.55s}
.hero-stats .stat-item:nth-child(1){animation:fadeUp .6s .8s ease forwards;opacity:0}
.hero-stats .stat-item:nth-child(2){animation:fadeUp .6s .9s ease forwards;opacity:0}
.hero-stats .stat-item:nth-child(3){animation:fadeUp .6s 1s ease forwards;opacity:0}
.hero-stats .stat-item:nth-child(4){animation:fadeUp .6s 1.1s ease forwards;opacity:0}

/* ── LOGO SVG inline ─────────────────────────────────────────── */
</style>
</head>
<body>

<!-- ═══════════════════════ NAV ══════════════════════════════ -->
<nav id="navbar">
  <a href="#hero" class="nav-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/theopack.jpeg" alt="Theopack" style="height:44px;width:auto;filter:brightness(0) invert(1);">
  </a>
  <div class="nav-links">
    <a href="#diferenciais">Empresa</a>
    <a href="#produtos">Produtos</a>
    <a href="#sobre">Sobre</a>
    <a href="#contato">Contato</a>
  </div>
  <a href="#contato" class="nav-cta">Solicitar Orçamento</a>
</nav>

<!-- ═══════════════════════ HERO ══════════════════════════════ -->
<section id="hero">
  <div class="hero-bg"></div>
  <div class="hero-grid"></div>

  <!-- Giant roll illustration -->
  <div class="hero-visual">
    <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="hr" x1="0" y1="0" x2="1" y2="1">
          <stop offset="0%" stop-color="#CC1520"/>
          <stop offset="100%" stop-color="#880010"/>
        </linearGradient>
        <linearGradient id="hb" x1="0" y1="0" x2="1" y2="1">
          <stop offset="0%" stop-color="#1560C8"/>
          <stop offset="100%" stop-color="#091E60"/>
        </linearGradient>
      </defs>
      <circle cx="250" cy="250" r="220" fill="none" stroke="url(#hr)" stroke-width="48" stroke-dasharray="1040 340" stroke-linecap="butt" transform="rotate(92,250,250)"/>
      <circle cx="250" cy="250" r="140" fill="none" stroke="url(#hb)" stroke-width="36" stroke-dasharray="636 243" stroke-linecap="butt" transform="rotate(92,250,250)"/>
      <circle cx="250" cy="250" r="68" fill="none" stroke="url(#hr)" stroke-width="24" stroke-dasharray="280 147" stroke-linecap="butt" stroke-opacity=".4" transform="rotate(92,250,250)"/>
      <circle cx="250" cy="250" r="28" fill="#600008"/>
      <circle cx="250" cy="250" r="12" fill="#0B0F14"/>
    </svg>
  </div>

  <div class="hero-content">
    <div class="hero-eyebrow">Filme Stretch Industrial</div>
    <h1 class="hero-title f-display">
      Proteção<br>
      <span>Que Chega</span><br>
      Até Você
    </h1>
    <p class="hero-sub">
      Rolos de filme stretch de alta performance para unitização, proteção e logística industrial. Fabricação própria, estoque disponível, entrega para todo o Brasil.
    </p>
    <div class="hero-actions">
      <a href="#contato" class="btn-primary">Solicitar Orçamento</a>
      <a href="#produtos" class="btn-outline">Ver Produtos</a>
    </div>
  </div>

  <div class="hero-stats">
    <div class="stat-item">
      <div>
        <div class="stat-num">63<span>mm</span></div>
        <div class="stat-label">Largura<br>Mínima</div>
      </div>
    </div>
    <div class="stat-item">
      <div>
        <div class="stat-num">500<span>mm</span></div>
        <div class="stat-label">Largura<br>Máxima</div>
      </div>
    </div>
    <div class="stat-item">
      <div>
        <div class="stat-num">BR</div>
        <div class="stat-label">Entrega<br>Nacional</div>
      </div>
    </div>
    <div class="stat-item">
      <div>
        <div class="stat-num">B2B</div>
        <div class="stat-label">Atendimento<br>Industrial</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ DIFERENCIAIS ═══════════════════════════ -->
<section id="diferenciais">
  <div class="section-header animate">
    <div class="section-tag">Por que a Theopack</div>
    <h2 class="section-title f-display">Diferenciais</h2>
  </div>
  <div class="dif-grid">
    <div class="dif-card animate animate-delay-1">
      <svg class="dif-icon" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="1" y="1" width="42" height="42" stroke="currentColor" stroke-width="1.5" opacity=".3"/>
        <path d="M14 22L19 27L30 16" stroke="currentColor" stroke-width="2" stroke-linecap="square"/>
        <circle cx="22" cy="22" r="12" stroke="currentColor" stroke-width="1.5"/>
      </svg>
      <div class="dif-title">Alta Performance</div>
      <div class="dif-text">Filme stretch com máxima resistência à tração e elasticidade. Protege paletes e cargas em toda a cadeia logística, do armazém ao destino final.</div>
    </div>
    <div class="dif-card animate animate-delay-2">
      <svg class="dif-icon" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="1" y="1" width="42" height="42" stroke="currentColor" stroke-width="1.5" opacity=".3"/>
        <path d="M22 8v28M8 22h28" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/>
        <circle cx="22" cy="22" r="8" stroke="currentColor" stroke-width="1.5"/>
      </svg>
      <div class="dif-title">Diversas Medidas</div>
      <div class="dif-text">Linha completa de 63mm a 500mm. Aplicação manual, com bastão ou paletizadora automática. Solução para cada necessidade operacional.</div>
    </div>
    <div class="dif-card animate animate-delay-3">
      <svg class="dif-icon" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="1" y="1" width="42" height="42" stroke="currentColor" stroke-width="1.5" opacity=".3"/>
        <path d="M10 30L18 16l7 10 5-7 4 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter"/>
      </svg>
      <div class="dif-title">Entrega Ágil</div>
      <div class="dif-text">Estoque disponível para pronta entrega. Logística para todo o Brasil com parceiros confiáveis. Agilidade que a sua operação exige.</div>
    </div>
    <div class="dif-card animate animate-delay-4">
      <svg class="dif-icon" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="1" y="1" width="42" height="42" stroke="currentColor" stroke-width="1.5" opacity=".3"/>
        <path d="M22 12C16.477 12 12 16.477 12 22s4.477 10 10 10 10-4.477 10-10" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/>
        <path d="M28 8l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter"/>
      </svg>
      <div class="dif-title">Compromisso Sustentável</div>
      <div class="dif-text">Embalagens desenvolvidas com foco na redução do impacto ambiental. Compromisso com práticas responsáveis em toda a cadeia produtiva.</div>
    </div>
  </div>
</section>

<!-- ═══════════════════ PRODUTOS ════════════════════════════════ -->
<section id="produtos">
  <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:64px">
    <div class="animate">
      <div class="section-tag">Catálogo</div>
      <h2 class="section-title f-display">Nossos Produtos</h2>
      <p class="section-sub">Linha completa de filmes stretch para todas as necessidades da sua operação logística e industrial.</p>
    </div>
    <a href="#contato" class="btn-outline animate" style="white-space:nowrap;margin-bottom:4px">Ver Catálogo Completo →</a>
  </div>

  <!-- ── CATEGORIA: LINHA MANUAL ── -->
  <div style="grid-column:1/-1;margin-bottom:8px;margin-top:8px">
    <div style="display:flex;align-items:center;gap:16px">
      <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:var(--red)">Linha Manual</div>
      <div style="flex:1;height:1px;background:var(--line)"></div>
    </div>
  </div>
  <div class="produtos-grid">

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/50MM.jpg" alt="Filme Stretch 50mm 150M" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Transparente</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch<br>50mm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">50mm</span><span class="spec-tag">Manual</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-2">
      <div class="produto-img" style="padding:0;background:#1A1A1A">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/50MM_-_FILME_PRETO.jpg" alt="Filme Stretch Preto 50mm" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge">Preto</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch Preto<br>50mm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">50mm</span><span class="spec-tag">Manual</span><span class="spec-tag">Preto</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-3">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/50MM_COM_TUBETE_3_POLEGADAS.jpg" alt="Filme Stretch 50mm Tubete 3" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Tubete 3"</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch<br>50mm × 360g — Tubete 3"</div>
        <div class="produto-specs"><span class="spec-tag">50mm</span><span class="spec-tag">360g</span><span class="spec-tag">Tubete 3"</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/63MM.jpg" alt="Filme Stretch 63mm" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Transparente</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch<br>63mm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">63mm</span><span class="spec-tag">Manual</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-2">
      <div class="produto-img" style="padding:0;background:#1A1A1A">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/63MM_-_FILME_PRETO.jpg" alt="Filme Stretch Preto 63mm" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge">Preto</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch Preto<br>63mm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">63mm</span><span class="spec-tag">Manual</span><span class="spec-tag">Preto</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-3">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/100MM.jpg" alt="Filme Stretch 100mm" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Transparente</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch<br>100mm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">100mm</span><span class="spec-tag">Manual</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#E8EEF4">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/100MM_-_FILME_BRANCO.jpg" alt="Filme Stretch Branco 100mm" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#555">Branco</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch Branco<br>100mm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">100mm</span><span class="spec-tag">Manual</span><span class="spec-tag">Branco</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-2">
      <div class="produto-img" style="padding:0;background:#1A1A1A">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/100MM_-_FILME_PRETO.jpg" alt="Filme Stretch Preto 100mm" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge">Preto</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch Preto<br>100mm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">100mm</span><span class="spec-tag">Manual</span><span class="spec-tag">Preto</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-3">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/100MM_CORELESS.jpg" alt="Filme Stretch Coreless 100mm" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#0A5C2A">Coreless</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch Coreless<br>100mm × 600g</div>
        <div class="produto-specs"><span class="spec-tag">100mm</span><span class="spec-tag">600g</span><span class="spec-tag">Sem Tubete</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/166MM_COM_TUBETE_3_POLEGADAS.jpg" alt="Filme Stretch 166mm Tubete 3" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Tubete 3"</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Filme Stretch<br>166mm × 1,8kg — Tubete 3"</div>
        <div class="produto-specs"><span class="spec-tag">166mm</span><span class="spec-tag">1,8kg</span><span class="spec-tag">Tubete 3"</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

  </div><!-- /Linha Manual -->

  <!-- ── CATEGORIA: EMBALATUDO (com cabo) ── -->
  <div style="grid-column:1/-1;margin-top:56px;margin-bottom:8px">
    <div style="display:flex;align-items:center;gap:16px">
      <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:var(--red)">Embalatudo — Com Cabo Aplicador</div>
      <div style="flex:1;height:1px;background:var(--line)"></div>
    </div>
  </div>
  <div class="produtos-grid">

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/EMBALATUDO_10CM.jpg" alt="Embalatudo 10cm Transparente" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Transparente</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Embalatudo<br>10cm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">100mm</span><span class="spec-tag">Com Cabo</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-2">
      <div class="produto-img" style="padding:0;background:#E8EEF4">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/EMBALATUDO_10CM_-_FILME_BRANCO.jpg" alt="Embalatudo 10cm Branco" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#555">Branco</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Embalatudo Branco<br>10cm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">100mm</span><span class="spec-tag">Com Cabo</span><span class="spec-tag">Branco</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-3">
      <div class="produto-img" style="padding:0;background:#1A1A1A">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/EMBALATUDO_10CM_-_FILME_PRETO.jpg" alt="Embalatudo 10cm Preto" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge">Preto</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Embalatudo Preto<br>10cm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">100mm</span><span class="spec-tag">Com Cabo</span><span class="spec-tag">Preto</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/EMBALATUDO_15CM.jpg" alt="Embalatudo 15cm Transparente" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Transparente</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Embalatudo<br>15cm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">150mm</span><span class="spec-tag">Com Cabo</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-2">
      <div class="produto-img" style="padding:0;background:#1A1A1A">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/EMBALATUDO_15CM_-_FILME_PRETO.jpg" alt="Embalatudo 15cm Preto" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge">Preto</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Embalatudo Preto<br>15cm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">150mm</span><span class="spec-tag">Com Cabo</span><span class="spec-tag">Preto</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-3">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/EMBALATUDO_20CM.jpg" alt="Embalatudo 20cm Transparente" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Transparente</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Embalatudo<br>20cm × 150m</div>
        <div class="produto-specs"><span class="spec-tag">200mm</span><span class="spec-tag">Com Cabo</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

  </div><!-- /Embalatudo -->

  <!-- ── CATEGORIA: PALETIZAÇÃO 500mm ── -->
  <div style="grid-column:1/-1;margin-top:56px;margin-bottom:8px">
    <div style="display:flex;align-items:center;gap:16px">
      <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:var(--red)">Paletização — 500mm</div>
      <div style="flex:1;height:1px;background:var(--line)"></div>
    </div>
  </div>
  <div class="produtos-grid">

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/STRETCH_500_MANUAL.jpg" alt="Stretch 500mm Transparente" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Transparente</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Stretch Paletização<br>500mm × 400m</div>
        <div class="produto-specs"><span class="spec-tag">500mm</span><span class="spec-tag">Paletização</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-2">
      <div class="produto-img" style="padding:0;background:#1A1A1A">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/STRETCH_500_MANUAL_-_FILME_PRETO.jpg" alt="Stretch 500mm Preto" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge">Preto</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Stretch Paletização Preto<br>500mm × 400m</div>
        <div class="produto-specs"><span class="spec-tag">500mm</span><span class="spec-tag">Paletização</span><span class="spec-tag">Preto</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-3">
      <div class="produto-img" style="padding:0;background:#C8D8E8">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/MANOPLA.jpg" alt="Manopla 500mm Transparente" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge" style="background:#1560C8">Com Manopla</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Stretch + Manopla<br>500mm × 400m</div>
        <div class="produto-specs"><span class="spec-tag">500mm</span><span class="spec-tag">Manopla</span><span class="spec-tag">Transparente</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <div class="produto-card animate animate-delay-1">
      <div class="produto-img" style="padding:0;background:#1A1A1A">
        <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/MANOPLA_-_FILME_PRETO.jpg" alt="Manopla 500mm Preto" style="width:100%;height:100%;object-fit:cover">
        <div class="produto-badge">Preto + Manopla</div>
      </div>
      <div class="produto-body">
        <div class="produto-name">Stretch Preto + Manopla<br>500mm × 400m</div>
        <div class="produto-specs"><span class="spec-tag">500mm</span><span class="spec-tag">Manopla</span><span class="spec-tag">Preto</span></div>
        <a href="#contato" class="produto-cta">Solicitar Orçamento <span>→</span></a>
      </div>
    </div>

    <!-- CTA sob demanda -->
    <div class="produto-card animate animate-delay-2" style="grid-column:span 2;display:flex;flex-direction:row;justify-content:space-between;align-items:center;padding:44px;background:var(--dark3);border:1px solid rgba(204,21,32,.2)">
      <div>
        <div style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:var(--red);margin-bottom:12px">Atendimento B2B</div>
        <div style="font-family:'Bebas Neue',sans-serif;font-size:36px;color:var(--white);line-height:1.1;margin-bottom:12px">Precisa de outra medida<br>ou volume especial?</div>
        <div style="font-size:14px;color:var(--muted);line-height:1.6;max-width:480px">Fabricamos sob demanda. Fale com nossa equipe comercial e receba uma proposta personalizada.</div>
      </div>
      <a href="#contato" class="btn-primary" style="white-space:nowrap;flex-shrink:0;margin-left:40px">Falar com Comercial</a>
    </div>

  </div><!-- /Paletização -->

  <!-- ── CATEGORIA: LINHA AUTOMOTIVA ── -->
  <div style="grid-column:1/-1;margin-top:56px;margin-bottom:8px">
    <div style="display:flex;align-items:center;gap:16px">
      <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:var(--red)">Linha Automotiva</div>
      <div style="flex:1;height:1px;background:var(--line)"></div>
    </div>
  </div>
  <div class="produtos-grid">

    <div class="produto-card animate animate-delay-1" style="grid-column:span 2">
      <div style="display:grid;grid-template-columns:1fr 1fr;min-height:280px">
        <div style="overflow:hidden">
          <img src="linha_automotiva.jpg" alt="Linha Automotiva Theopack" style="width:100%;height:100%;object-fit:cover">
        </div>
        <div class="produto-body" style="padding:36px;display:flex;flex-direction:column;justify-content:center">
          <div class="produto-badge" style="background:#1560C8;position:static;margin-bottom:16px;display:inline-block;width:fit-content">Linha Especial</div>
          <div class="produto-name" style="font-size:22px;margin-bottom:12px">Linha Automotiva<br>Proteção para Veículos</div>
          <div style="font-size:13px;color:var(--muted);line-height:1.65;margin-bottom:20px">Proteção de volante, câmbio, freio de mão e bancos contra graxas, óleos e poeiras durante manutenção. Inclui capas de banco e protetor de tapete em plástico.</div>
          <div class="produto-specs">
            <span class="spec-tag">Capa de Banco</span>
            <span class="spec-tag">Protetor Volante</span>
            <span class="spec-tag">Protetor Tapete</span>
          </div>
          <a href="#contato" class="produto-cta" style="margin-top:20px">Solicitar Orçamento <span>→</span></a>
        </div>
      </div>
    </div>

  </div><!-- /Linha Automotiva -->

</section>


<!-- ═══════════════════ SOBRE ════════════════════════════════════ -->
<section id="sobre">
  <div class="sobre-grid">
    <div>
      <div class="animate">
        <div class="section-tag">A Empresa</div>
        <h2 class="section-title f-display">Quem Somos</h2>
        <p class="section-sub">A Theopack é uma indústria brasileira especializada em embalagens de polietileno para o mercado industrial e logístico, com sede em Navegantes/SC.</p>
      </div>
      <div class="mvv-grid">
        <div class="mvv-card animate animate-delay-1">
          <div class="mvv-label">Missão</div>
          <div class="mvv-text">Fornecer soluções em embalagens de polietileno com excelência, inovação e responsabilidade ambiental, contribuindo para a eficiência logística e a proteção de produtos em toda a cadeia produtiva.</div>
        </div>
        <div class="mvv-card animate animate-delay-2">
          <div class="mvv-label">Visão</div>
          <div class="mvv-text">Ser referência nacional em embalagens sustentáveis, reconhecida pela qualidade, inovação e compromisso com o meio ambiente.</div>
        </div>
      </div>
    </div>
    <div>
      <div class="animate" style="margin-bottom:32px">
        <div class="section-tag" style="margin-top:0">Valores</div>
        <h3 class="f-display" style="font-size:28px;color:var(--white)">Nossos Pilares</h3>
      </div>
      <div class="valores-grid">
        <div class="valor-item animate animate-delay-1">
          <div class="valor-dot"></div>
          <div>
            <div class="valor-name">Qualidade</div>
            <div class="valor-desc">Excelência em cada metro produzido</div>
          </div>
        </div>
        <div class="valor-item animate animate-delay-2">
          <div class="valor-dot" style="background:var(--blue-mid)"></div>
          <div>
            <div class="valor-name">Sustentabilidade</div>
            <div class="valor-desc">Compromisso ambiental real</div>
          </div>
        </div>
        <div class="valor-item animate animate-delay-3">
          <div class="valor-dot"></div>
          <div>
            <div class="valor-name">Inovação</div>
            <div class="valor-desc">Tecnologia e eficiência aplicadas</div>
          </div>
        </div>
        <div class="valor-item animate animate-delay-4">
          <div class="valor-dot" style="background:var(--blue-mid)"></div>
          <div>
            <div class="valor-name">Confiança</div>
            <div class="valor-desc">Relações transparentes e duradouras</div>
          </div>
        </div>
        <div class="valor-item animate animate-delay-1" style="grid-column:1/-1">
          <div class="valor-dot"></div>
          <div>
            <div class="valor-name">Agilidade</div>
            <div class="valor-desc">Entregas rápidas para todo o Brasil — estoque pronto para atender a sua demanda</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ CONTATO ══════════════════════════════════ -->
<section id="contato">
  <div class="contato-wrap">
    <div>
      <div class="animate">
        <div class="section-tag">Fale Conosco</div>
        <h2 class="section-title f-display">Solicite Seu<br>Orçamento</h2>
        <p class="section-sub">Atendemos indústrias, distribuidores e revendas em todo o Brasil. Nossa equipe comercial responde em até 24 horas.</p>
      </div>
      <div class="contato-info">
        <div class="info-row animate animate-delay-1">
          <div class="info-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <path d="M3 3h12v12H3z" stroke="currentColor" stroke-width="1.2"/>
              <path d="M3 6l6 4 6-4" stroke="currentColor" stroke-width="1.2"/>
            </svg>
          </div>
          <div>
            <div class="info-label">E-mail Comercial</div>
            <div class="info-val">betinho@theopack.com.br</div>
          </div>
        </div>
        <div class="info-row animate animate-delay-2">
          <div class="info-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <path d="M3 3l3 4-2 3s2 5 7 7l3-2 4 3-2 2S3 22 1 5l2-2z" stroke="currentColor" stroke-width="1.2" stroke-linejoin="miter"/>
            </svg>
          </div>
          <div>
            <div class="info-label">WhatsApp / Telefone</div>
            <div class="info-val">(47) 99618-1452</div>
          </div>
        </div>
        <div class="info-row animate animate-delay-3">
          <div class="info-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <path d="M9 2a5 5 0 100 10A5 5 0 009 2z" stroke="currentColor" stroke-width="1.2"/>
              <path d="M9 12v4M6 16h6" stroke="currentColor" stroke-width="1.2" stroke-linecap="square"/>
            </svg>
          </div>
          <div>
            <div class="info-label">Instagram</div>
            <div class="info-val">@theopack_</div>
          </div>
        </div>
        <div class="info-row animate animate-delay-4">
          <div class="info-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
              <path d="M9 2C6.24 2 4 4.24 4 7c0 4.25 5 9 5 9s5-4.75 5-9c0-2.76-2.24-5-5-5z" stroke="currentColor" stroke-width="1.2"/>
              <circle cx="9" cy="7" r="1.5" stroke="currentColor" stroke-width="1.2"/>
            </svg>
          </div>
          <div>
            <div class="info-label">Endereço</div>
            <div class="info-val">Rua Adelina Leal Narciso, 58 – Sala 1<br>Meia Praia – Navegantes / SC · CEP 88372-022</div>
          </div>
        </div>
      </div>
    </div>

    <div class="contato-form animate animate-delay-2">
      <div class="form-title f-display">Peça Seu Orçamento</div>
      <div class="form-sub">Preencha os dados abaixo e retornamos em até 24 horas úteis com as melhores condições para a sua empresa.</div>

      <!-- Estado de sucesso -->
      <div id="form-success" style="display:none;padding:32px;background:rgba(76,175,80,.08);border:1px solid rgba(76,175,80,.25);text-align:center">
        <div style="font-size:32px;margin-bottom:12px">✅</div>
        <div style="font-family:'Bebas Neue',sans-serif;font-size:24px;color:#4CAF50;margin-bottom:8px">Solicitação Enviada!</div>
        <div style="font-size:14px;color:var(--muted);line-height:1.6">Seu orçamento foi registrado no nosso sistema.<br>Retornaremos em até 24 horas úteis.</div>
      </div>

      <!-- Estado de erro -->
      <div id="form-error" style="display:none;padding:16px;background:rgba(204,21,32,.08);border:1px solid rgba(204,21,32,.25);margin-bottom:16px">
        <div style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;color:var(--red);letter-spacing:1px" id="form-error-msg">Erro ao enviar. Tente novamente ou entre em contato pelo WhatsApp.</div>
      </div>

      <div id="form-fields">
        <div class="form-row">
          <div class="form-group">
            <label for="f-nome">Nome</label>
            <input id="f-nome" type="text" placeholder="Seu nome">
          </div>
          <div class="form-group">
            <label for="f-empresa">Empresa</label>
            <input id="f-empresa" type="text" placeholder="Razão social">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="f-tel">Telefone / WhatsApp</label>
            <input id="f-tel" type="tel" placeholder="(XX) XXXXX-XXXX">
          </div>
          <div class="form-group">
            <label for="f-email">E-mail</label>
            <input id="f-email" type="email" placeholder="email@empresa.com.br">
          </div>
        </div>
        <div class="form-group">
          <label for="f-produto">Produto de Interesse</label>
          <select id="f-produto">
            <option value="">Selecione o produto</option>
            <optgroup label="── Linha Manual">
              <option>Filme Stretch 50mm × 150m — Transparente</option>
              <option>Filme Stretch 50mm × 150m — Preto</option>
              <option>Filme Stretch 50mm × 360g — Tubete 3"</option>
              <option>Filme Stretch 63mm × 150m — Transparente</option>
              <option>Filme Stretch 63mm × 150m — Preto</option>
              <option>Filme Stretch 100mm × 150m — Transparente</option>
              <option>Filme Stretch 100mm × 150m — Branco</option>
              <option>Filme Stretch 100mm × 150m — Preto</option>
              <option>Filme Stretch 100mm × 600g — Coreless</option>
              <option>Filme Stretch 166mm × 1,8kg — Tubete 3"</option>
            </optgroup>
            <optgroup label="── Embalatudo (com cabo)">
              <option>Embalatudo 10cm × 150m — Transparente</option>
              <option>Embalatudo 10cm × 150m — Branco</option>
              <option>Embalatudo 10cm × 150m — Preto</option>
              <option>Embalatudo 15cm × 150m — Transparente</option>
              <option>Embalatudo 15cm × 150m — Preto</option>
              <option>Embalatudo 20cm × 150m — Transparente</option>
            </optgroup>
            <optgroup label="── Paletização 500mm">
              <option>Stretch Paletização 500mm × 400m — Transparente</option>
              <option>Stretch Paletização 500mm × 400m — Preto</option>
              <option>Stretch + Manopla 500mm × 400m — Transparente</option>
              <option>Stretch + Manopla 500mm × 400m — Preto</option>
            </optgroup>
            <optgroup label="── Linha Automotiva">
              <option>Linha Automotiva — Capa de Banco / Protetor Volante / Tapete</option>
            </optgroup>
            <option value="outros">Outras medidas / Sob demanda</option>
          </select>
        </div>
        <div class="form-group">
          <label for="f-msg">Mensagem / Especificações</label>
          <textarea id="f-msg" placeholder="Descreva sua necessidade: quantidade, frequência de compra, prazo de entrega..."></textarea>
        </div>
        <button class="form-submit" id="form-btn" onclick="enviarOrcamento()">Enviar Solicitação de Orçamento</button>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════ FOOTER ══════════════════════════════════ -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <img src="<?php echo get_template_directory_uri(); ?>/theopack-assets/theopack.jpeg" alt="Theopack" style="height:52px;width:auto;filter:brightness(0) invert(1);">
      <p>Indústria, Comércio, Importação e Exportação de Embalagens.<br>CNPJ: 39.680.498/0001-16</p>
    </div>
    <div class="footer-col">
      <h4>Navegação</h4>
      <ul>
        <li><a href="#diferenciais">Empresa</a></li>
        <li><a href="#produtos">Produtos</a></li>
        <li><a href="#sobre">Sobre</a></li>
        <li><a href="#contato">Contato</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Contato</h4>
      <ul>
        <li><a href="tel:47996181452">(47) 99618-1452</a></li>
        <li><a href="mailto:betinho@theopack.com.br">betinho@theopack.com.br</a></li>
        <li><a href="https://instagram.com/theopack_" target="_blank">@theopack_</a></li>
        <li><a href="#">Política de Devolução</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2026 THEOPACK — Todos os direitos reservados. Navegantes/SC, Brasil.</p>
    <div class="sustentabilidade">🌱 Compromisso com a Sustentabilidade</div>
  </div>
</footer>

<script>
// ── NAV SCROLL ────────────────────────────────────────────
const nav = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  nav.classList.toggle('scrolled', window.scrollY > 40);
});

// ── SCROLL ANIMATIONS ─────────────────────────────────────
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); }
  });
}, { threshold: 0.12 });
document.querySelectorAll('.animate').forEach(el => observer.observe(el));

// ── SMOOTH SCROLL ─────────────────────────────────────────
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    e.preventDefault();
    const t = document.querySelector(a.getAttribute('href'));
    if (t) t.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
});

// ── ENVIO DO ORÇAMENTO → chama enviar-orcamento.php ───────
async function enviarOrcamento() {
  const campos = {
    nome:     document.getElementById('f-nome').value.trim(),
    empresa:  document.getElementById('f-empresa').value.trim(),
    tel:      document.getElementById('f-tel').value.trim(),
    email:    document.getElementById('f-email').value.trim(),
    produto:  document.getElementById('f-produto').value.trim(),
    mensagem: document.getElementById('f-msg').value.trim(),
  };

  if (!campos.nome || !campos.email) {
    mostrarErro('Por favor, preencha pelo menos o Nome e E-mail.');
    return;
  }

  const btn = document.getElementById('form-btn');
  btn.disabled = true;
  btn.textContent = '⏳ Enviando...';
  btn.style.opacity = '0.7';
  document.getElementById('form-error').style.display = 'none';

  try {
    const res = await fetch('<?php echo home_url(); ?>/enviar-orcamento.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(campos)
    });
    const data = await res.json();

    if (data.ok) {
      document.getElementById('form-fields').style.display = 'none';
      document.getElementById('form-success').style.display = 'block';
      document.getElementById('form-success').scrollIntoView({ behavior: 'smooth', block: 'center' });
      if (data.wa_link) setTimeout(() => window.open(data.wa_link, '_blank'), 800);
    } else {
      const msg = data.erros?.length ? data.erros.join(' | ') : 'Erro ao processar. Ligue: (47) 99618-1452.';
      mostrarErro(msg);
      btn.disabled = false;
      btn.textContent = 'Enviar Solicitação de Orçamento';
      btn.style.opacity = '1';
    }
  } catch (err) {
    mostrarErro('Envio indisponível. Entre em contato pelo WhatsApp: (47) 99618-1452.');
    btn.disabled = false;
    btn.textContent = 'Enviar Solicitação de Orçamento';
    btn.style.opacity = '1';
  }
}

function mostrarErro(msg) {
  const el = document.getElementById('form-error');
  document.getElementById('form-error-msg').textContent = msg;
  el.style.display = 'block';
  el.scrollIntoView({ behavior: 'smooth', block: 'center' });
}
</script>
<?php wp_footer(); ?>
</body>
</html>
