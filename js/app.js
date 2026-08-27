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
}
