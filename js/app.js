// app.js — Global UI logic shared across all pages

document.addEventListener('DOMContentLoaded', () => {
  initContactForm();
  initCookieBuilder();
});

// 1. Basic client-side validation for login/contact forms
function initContactForm() {
  const contactForm = document.getElementById('contact-form');
  if (!contactForm) return;

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log('Contact form submitted (stub)');
  });
}

// 2. Cookie Builder & Carousel Logic
function initCookieBuilder() {
  const baseImages = Array.from(document.querySelectorAll('.base-layer'));
  const baseSelect = document.getElementById('baseSelect');
  const frostingSelect = document.getElementById('frostingSelect');
  const toppingSelect = document.getElementById('toppingSelect');
  const prevBtn = document.getElementById('prevCookie');
  const nextBtn = document.getElementById('nextCookie');

  // If we aren't on the cookie builder page, exit cleanly
  if (!baseSelect || baseImages.length === 0) return;

  let currentBaseIndex = 0;

  // Function to set active base cookie
  function updateBase(index) {
    baseImages.forEach((img, i) => {
      img.classList.toggle('active', i === index);
    });
    baseSelect.value = index;
    currentBaseIndex = index;
  }

  // Carousel Buttons
  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      let nextIndex = (currentBaseIndex - 1 + baseImages.length) % baseImages.length;
      updateBase(nextIndex);
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      let nextIndex = (currentBaseIndex + 1) % baseImages.length;
      updateBase(nextIndex);
    });
  }

  // Base Dropdown Sync
  baseSelect.addEventListener('change', (e) => {
    updateBase(parseInt(e.target.value, 10));
  });

  // Frosting Dropdown Handler
  if (frostingSelect) {
    frostingSelect.addEventListener('change', (e) => {
      const frostingLayer = document.getElementById('layer-frosting');
      if (!frostingLayer) return;

      if (e.target.value === 'layer-frosting') {
        frostingLayer.classList.add('active');
      } else {
        frostingLayer.classList.remove('active');
      }
    });
  }

  // Toppings Dropdown Handler
  if (toppingSelect) {
    toppingSelect.addEventListener('change', (e) => {
      // Hide all toppings first
      document.querySelectorAll('.overlay-layer:not(#layer-frosting)').forEach(t => {
        t.classList.remove('active');
      });
      
      // Show selected topping
      if (e.target.value !== 'none') {
        const selectedTopping = document.getElementById(e.target.value);
        if (selectedTopping) {
          selectedTopping.classList.add('active');
        }
      }
    });
  }
}
