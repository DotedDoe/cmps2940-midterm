
const CATALOG_DATA = [
  {
    id: "choc-chip-cookie",
    name: "Chocolate Chip Cookie",
    price: 2.50,
    category: "cookies",
    image: "images/cookie.jpg",
    customizable: {
      label: "Choose toppings",
      options: [
        { id: "sprinkles", name: "Sprinkles", priceAdd: 0.25 },
        { id: "mnms", name: "M&Ms", priceAdd: 0.50 },
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
    image: "images/carrot-cake.jpg"
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

document.addEventListener('DOMContentLoaded', updateCartCountBadge);