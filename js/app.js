// app.js — Global UI logic shared across all pages

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
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

//logic for dark mode theme toggle
function initTheme() {
    const themeToggle = document.getElementById('themeToggle');

    if (!themeToggle) return;

    const savedTheme = localStorage.getItem('theme');

    if (savedTheme) {
        document.documentElement.dataset.theme = savedTheme;
    }

    updateThemeButton();

    themeToggle.addEventListener('click', () => {

        const currentTheme = document.documentElement.dataset.theme;

        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        document.documentElement.dataset.theme = newTheme;

        localStorage.setItem('theme', newTheme);

        updateThemeButton();
    });
}


function updateThemeButton() {
    const themeToggle = document.getElementById('themeToggle');

    if (!themeToggle) return;

    const currentTheme = document.documentElement.dataset.theme;

    if (currentTheme === 'dark') {
        themeToggle.textContent = 'Light Mode';
    } else {
        themeToggle.textContent = 'Dark Mode';
    }
}
