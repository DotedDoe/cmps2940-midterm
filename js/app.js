// app.js — Global UI logic shared across all pages

document.addEventListener('DOMContentLoaded', () => {
  initContactForm();
});

// Basic client-side validation for the login/contact forms on login.html
function initContactForm() {
  const contactForm = document.getElementById('contact-form');
  if (!contactForm) return;

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    // TODO: add real validation rules
    console.log('Contact form submitted (stub)');
  });
  const img = document.getElementById('customImage');
const brightness = document.getElementById('brightness');
const blur = document.getElementById('blur');
const rotation = document.getElementById('rotation');
const size = document.getElementById('size');

function updateImage() {
    img.style.filter = `brightness(${brightness.value}%) blur(${blur.value}px)`;
    img.style.transform = `rotate(${rotation.value}deg)`;
    img.style.width = `${size.value}px`;
}

brightness.addEventListener('input', updateImage);
blur.addEventListener('input', updateImage);
rotation.addEventListener('input', updateImage);
size.addEventListener('input', updateImage);
  const btn = document.getElementById('toggle-btn');
  const overlay = document.getElementById('overlay-layer');

  // Listen for the click event
  btn.addEventListener('click', () => {
    // .toggle() automatically removes the class if it's there, or adds it if it's missing
    overlay.classList.toggle('hidden');
    
    // Optional: Change the button text depending on the state
    if (overlay.classList.contains('hidden')) {
      btn.textContent = 'Show Overlay';
    } else {
      btn.textContent = 'Hide Overlay';
    }
  });

}
