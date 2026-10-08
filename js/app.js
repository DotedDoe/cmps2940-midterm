document.addEventListener('DOMContentLoaded', () => {
  initContactForm();
  initCookieBuilder();
});

function initContactForm() {
  const contactForm = document.getElementById('contact-form');
  if (!contactForm) return;

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log('Contact form submitted (stub)');
  });
}

function initCookieBuilder() {
  const baseImages = Array.from(document.querySelectorAll('.base-layer'));
  const baseSelect = document.getElementById('baseSelect');
  const frostingSelect = document.getElementById('frostingSelect');
  const toppingSelect = document.getElementById('toppingSelect');
  const prevBtn = document.getElementById('prevCookie');
  const nextBtn = document.getElementById('nextCookie');

  if (!baseSelect || baseImages.length === 0) return;

  let currentBaseIndex = 0;

  function updateBase(index) {
    baseImages.forEach((img, i) => {
      img.classList.toggle('active', i === index);
    });
    baseSelect.value = index;
    currentBaseIndex = index;
  }

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

  baseSelect.addEventListener('change', (e) => {
    updateBase(parseInt(e.target.value, 10));
  });

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
    name: "Sugar Cookie",
    price: 2.50,
    category: "cookies",
    image: "images-for-website/base.png",
    description: "A classic bakery cookie loaded with semi-sweet chocolate chips, crisp on the edges and soft in the middle.",
    nutrition: {
      servingSize: "1 cookie (60g)",
      calories: 280,
      fat: "14g",
      carbs: "36g",
      sugar: "20g",
      protein: "3g",
      allergens: ["Wheat", "Egg", "Dairy", "May contain traces of nuts"]
    },
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
    image: "images-for-website/slop.png",
    description: "Dense, fudgy, and rich with cocoa — baked in small batches so the center stays gooey.",
    nutrition: {
      servingSize: "1 brownie (70g)",
      calories: 340,
      fat: "18g",
      carbs: "42g",
      sugar: "28g",
      protein: "4g",
      allergens: ["Wheat", "Egg", "Dairy", "Soy"]
    },
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
    image: "images-for-website/sourdough.png",
    description: "Naturally leavened with our house starter, fermented for 24 hours for a tangy flavor and chewy crumb.",
    nutrition: {
      servingSize: "1 slice (50g)",
      calories: 130,
      fat: "0.5g",
      carbs: "26g",
      sugar: "1g",
      protein: "5g",
      allergens: ["Wheat"]
    }
  },
  {
    id: "carrot-cake-slice",
    name: "Carrot Cake Slice",
    price: 4.25,
    category: "cakes",
    image: "images-for-website/ai-gen-slop.png",
    description: "Moist spiced cake packed with shredded carrots and walnuts, topped with cream cheese frosting.",
    nutrition: {
      servingSize: "1 slice (120g)",
      calories: 410,
      fat: "22g",
      carbs: "48g",
      sugar: "34g",
      protein: "5g",
      allergens: ["Wheat", "Egg", "Dairy", "Tree Nuts"]
    }
  },
  {
    id: "blueberry-muffin",
    name: "Blueberry Muffin",
    price: 3.25,
    category: "breads",
    image: "images-for-website/blueberry-muffin.png",
    description: "A tender, bakery-style muffin studded with fresh blueberries and finished with a crunchy sugar top.",
    nutrition: {
      servingSize: "1 muffin (95g)",
      calories: 320,
      fat: "12g",
      carbs: "48g",
      sugar: "26g",
      protein: "4g",
      allergens: ["Wheat", "Egg", "Dairy"]
    }
  },
  {
    id: "cinnamon-roll",
    name: "Cinnamon Roll",
    price: 4.00,
    category: "breads",
    image: "images-for-website/cinnamon-roll.png",
    description: "Soft, pull-apart layers swirled with brown sugar and cinnamon, finished with a warm vanilla glaze.",
    nutrition: {
      servingSize: "1 roll (110g)",
      calories: 430,
      fat: "17g",
      carbs: "62g",
      sugar: "31g",
      protein: "6g",
      allergens: ["Wheat", "Egg", "Dairy"]
    },
    customizable: {
      label: "Choose add-ons",
      options: [
        { id: "extra-glaze", name: "Extra Glaze", priceAdd: 0.50 },
        { id: "pecans", name: "Chopped Pecans", priceAdd: 0.75 }
      ]
    }
  },
  {
    id: "red-velvet-cupcake",
    name: "Red Velvet Cupcake",
    price: 3.50,
    category: "cakes",
    image: "images-for-website/red-velvet-cupcake.png",
    description: "A cocoa-kissed cupcake with a hint of tang, topped with a swirl of cream cheese frosting.",
    nutrition: {
      servingSize: "1 cupcake (85g)",
      calories: 350,
      fat: "16g",
      carbs: "46g",
      sugar: "32g",
      protein: "3g",
      allergens: ["Wheat", "Egg", "Dairy"]
    }
  },
  {
    id: "chocolate-muffin",
    name: "Chocolate Muffin",
    price: 4.00,
    category: "breads",
    image: "images-for-website/choco-muffin.png",
    description: "A bakery style muffin with cocoa and chocolate chips both inside and outside.",
    nutrition: {
      servingSize: "1 muffin(95g)",
      calories: 320,
      fat: "12g",
      carbs: "48g",
      sugar: "26g",
      protein: "4g",
      allergens: ["Wheat", "Egg", "Dairy"]
    }
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

// ---- Unfinished "bundle upsell" feature below (not wired to any real
// button — no element in inventory.html has class "add-to-cart-btn",
// so addToCartBtn was null and calling .addEventListener on it crashed
// the page). Guarded with a null check so it no longer breaks the rest
// of the site; left in place rather than deleted since it looks like
// someone's in-progress work. Worth a team conversation before relying
// on it further — addToCart(pendingItem) here passes a {name, price}
// object, which doesn't match cart.js's actual addToCart(productId,
// selectedOptions) signature, so this wouldn't function correctly even
// once wired to a real button.
const addToCartBtn = document.querySelector('.add-to-cart-btn');
const bundleModal = document.getElementById('bundleModal');
const addBundleBtn = document.getElementById('addBundleBtn');
const skipBundleBtn = document.getElementById('skipBundleBtn');

let pendingItem = null;

if (addToCartBtn) {
  addToCartBtn.addEventListener('click', (e) => {
    e.preventDefault();

    pendingItem = {
      name: addToCartBtn.dataset.name,
      price: parseFloat(addToCartBtn.dataset.price)
    };

    bundleModal.classList.add('active');
  });
}

if (addBundleBtn) {
  addBundleBtn.addEventListener('click', () => {
    const bundleItem = { name: "Accessory Bundle", price: 15.00 };

    addToCart(pendingItem);
    addToCart(bundleItem);

    closeModal();
  });
}

if (skipBundleBtn) {
  skipBundleBtn.addEventListener('click', () => {
    addToCart(pendingItem);
    closeModal();
  });
}

function closeModal() {
  if (bundleModal) bundleModal.classList.remove('active');
  pendingItem = null;
}

// Basic placeholder for your existing cart function
// NOTE: cart.js also defines addToCart(productId, selectedOptions), and it
// loads after app.js, so cart.js's version is the one that actually runs on
// pages that include it. This placeholder only matters if cart.js is missing.
function addToCart(item) {
  console.log("Added to cart:", item);
}