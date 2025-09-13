/* =====================================================================
   scripts.js — Interações globais MídiaScreen (Pro v2)
   ===================================================================== */
(function(){
  // Page fade-in
  document.body.classList.add('ms-fade-in');

  // Header shadow on scroll
  function onScrollHeader(){
    var h = document.querySelector('.site-header');
    if(!h) return;
    if (window.scrollY > 8) h.classList.add('is-scrolled');
    else h.classList.remove('is-scrolled');
  }
  window.addEventListener('scroll', onScrollHeader, {passive:true});
  onScrollHeader();

  // Mobile menu toggle (if present)
  (function(){
    var btn = document.getElementById('menuBtn');
    var nav = document.getElementById('mobile-nav');
    if(!btn || !nav) return;
    btn.addEventListener('click', function(){
      var open = nav.classList.toggle('open');
      btn.setAttribute('aria-expanded', String(open));
    });
  })();

  // Highlight active nav link
  (function () {
    var here = location.pathname.replace(/\/+$/, '');
    document.querySelectorAll('header nav a').forEach(function(a){
      var path = new URL(a.href, location.origin).pathname.replace(/\/+$/, '');
      if (path && path === here) { a.classList.add('active'); a.setAttribute('aria-current','page'); }
    });
  })();

  // Reveal on scroll
  (function(){
    var els = [].slice.call(document.querySelectorAll('.reveal'));
    if(!els.length) return;
    if(!('IntersectionObserver' in window)){
      els.forEach(function(e){ e.classList.add('in'); });
      return;
    }
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        if(entry.isIntersecting){ entry.target.classList.add('in'); io.unobserve(entry.target); }
      });
    },{threshold:.12});
    els.forEach(function(e){ io.observe(e); });
  })();

  // Ripple effect on .btn and .fx-ripple
  (function(){
    function addRipple(e){
      var t = e.currentTarget;
      var r = t.getBoundingClientRect();
      var x = e.clientX - r.left, y = e.clientY - r.top;
      t.style.setProperty('--rx', x+'px');
      t.style.setProperty('--ry', y+'px');
      t.classList.add('is-rippling');
      setTimeout(function(){ t.classList.remove('is-rippling'); }, 280);
    }
    var nodes = document.querySelectorAll('.btn, .fx-ripple');
    nodes.forEach(function(n){
      n.classList.add('fx-ripple');
      n.addEventListener('click', addRipple, {passive:true});
    });
  })();

  // Smooth scroll for in-page anchors
  (function(){
    var links = document.querySelectorAll('a[href^="#"]:not([href="#"])');
    function go(e){
      var id = this.getAttribute('href').slice(1);
      var target = document.getElementById(id);
      if(!target) return;
      e.preventDefault();
      var y = target.getBoundingClientRect().top + window.pageYOffset - 80;
      window.scrollTo({ top:y, behavior:'smooth' });
    }
    links.forEach(function(a){ a.addEventListener('click', go); });
  })();

  // FormSubmit feedback (if elements exist on contato.html)
  (function(){
    var q = new URLSearchParams(location.search);
    function show(id, type, msg){
      var el = document.getElementById(id);
      if(!el) return;
      el.className = 'status ' + type;
      el.textContent = msg;
    }
    if(q.get('ok')==='orc') show('orcStatus','ok','Orçamento enviado com sucesso!');
    if(q.get('ok')==='sup') show('supStatus','ok','Chamado enviado com sucesso!');
    if(q.get('erro')==='orc') show('orcStatus','err','Não foi possível enviar agora. Tente novamente ou use o WhatsApp.');
    if(q.get('erro')==='sup') show('supStatus','err','Não foi possível enviar agora. Tente novamente ou use o WhatsApp.');
  })();

  // Respect reduced motion
  if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    document.documentElement.style.setProperty('scroll-behavior','auto');
  }
})();
/* build: no-theme */
