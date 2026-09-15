
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
const CATALOG_DATA = [
  {
    id: "choc-chip-cookie",
    name: "Chocolate Chip Cookie",
    price: 2.50,
    category: "cookies",
    image: "images-for-website/base.jpg",
    customizable: {
      label: "Choose toppings",
      options: [
        { id: "sprinkles", name: "Sprinkles", priceAdd: 0.25 },
        { id: "mm", name: "M&Ms", priceAdd: 0.50 },
        { id: "icing", name: "Icing Drizzle", priceAdd: 0.50 }
      ]
    }
  },
  {
    id: "fudge-brownie",
    name: "Fudge Brownie",
    price: 3.00,
    category: "brownies",
    image: "images/brownie.jpg",
    customizable: {
      label: "Choose toppings",
      options: [
        { id: "walnuts", name: "Walnuts", priceAdd: 0.50 },
        { id: "caramel", name: "Caramel Drizzle", priceAdd: 0.50 },
        { id: "sea-salt", name: "Sea Salt", priceAdd: 0.25 }
      ]
    }
  },
  {
    id: "sourdough-loaf",
    name: "Sourdough Loaf",
    price: 6.50,
    category: "breads",
    image: "images/sourdough.jpg"
  },
  {
    id: "carrot-cake-slice",
    name: "Carrot Cake Slice",
    price: 4.25,
    category: "cakes",
    image: "images-for-website/ai-gen-slop.jpg"
  }
];


function getCatalogItems() {
  return CATALOG_DATA;
}


function formatPrice(amount) {
  return `$${amount.toFixed(2)}`;
}


function updateCartCountBadge() {
  const badge = document.getElementById('cart-count');
  if (!badge) return; 

  const items = typeof getCartItems === 'function' ? getCartItems() : [];
  const totalQty = items.reduce((sum, item) => sum + item.qty, 0);
  badge.textContent = totalQty;
}

document.addEventListener('DOMContentLoaded', () => {
  updateCartCountBadge();
  initTheme();
});

function initTheme() {
  const themeToggle = document.getElementById('themeToggle');

  const savedTheme = localStorage.getItem('theme');

  if (savedTheme) {
    document.documentElement.dataset.theme = savedTheme;
  }

  updateThemeButton(themeToggle);

  if (!themeToggle) return;

  themeToggle.addEventListener('click', () => {
    const currentTheme = document.documentElement.dataset.theme;

    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    document.documentElement.dataset.theme = newTheme;

    
    localStorage.setItem('theme', newTheme);

    updateThemeButton(themeToggle);
  });
}

function updateThemeButton(themeToggle) {
  if (!themeToggle) return;

  if (document.documentElement.dataset.theme === 'dark') {
    themeToggle.textContent = 'Light Mode';
  } else {
    themeToggle.textContent = 'Dark Mode';
  }
}
