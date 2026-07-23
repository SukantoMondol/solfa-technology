// Solfa Technologies - site scripts

document.addEventListener('DOMContentLoaded', function () {
  // Mobile navigation toggle
  var toggle = document.getElementById('navToggle');
  var nav = document.getElementById('mainNav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  // Mobile services dropdown accordion toggle
  var dropdownTrigger = document.getElementById('servicesDropdownTrigger');
  if (dropdownTrigger) {
    dropdownTrigger.addEventListener('click', function (e) {
      if (window.innerWidth <= 860) {
        e.preventDefault();
        var wrapper = dropdownTrigger.closest('.nav-dropdown-wrapper');
        if (wrapper) {
          var isOpen = wrapper.classList.toggle('open');
          dropdownTrigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }
      }
    });
  }

  // Animated stat counters
  var counters = document.querySelectorAll('[data-count]');

  if (counters.length && 'IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el = entry.target;
        var target = parseInt(el.getAttribute('data-count'), 10) || 0;
        var duration = 1400;
        var start = null;

        function tick(ts) {
          if (!start) start = ts;
          var progress = Math.min((ts - start) / duration, 1);
          el.textContent = Math.floor(progress * target).toString();
          if (progress < 1) requestAnimationFrame(tick);
        }

        requestAnimationFrame(tick);
        observer.unobserve(el);
      });
    }, { threshold: 0.4 });

    counters.forEach(function (el) { observer.observe(el); });
  }

  // Project category filter tabs
  var tabs = document.querySelectorAll('.filter-tabs button');
  var cards = document.querySelectorAll('.projects-grid .project-card');

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      tabs.forEach(function (t) { t.classList.remove('active'); });
      tab.classList.add('active');

      var filter = tab.getAttribute('data-filter');

      cards.forEach(function (card) {
        var category = card.getAttribute('data-category');
        card.style.display = (filter === 'all' || category === filter) ? '' : 'none';
      });
    });
  });
});
