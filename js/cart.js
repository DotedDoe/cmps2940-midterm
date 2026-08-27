// cart.js — localStorage-backed cart management for cart.html

const CART_KEY = 'cart_items';

document.addEventListener('DOMContentLoaded', () => {
  renderCart(getCartItems());
});

// Wrapped so this can later be swapped for a real backend call to Symfony
function getCartItems() {
  const raw = localStorage.getItem(CART_KEY);
  return raw ? JSON.parse(raw) : [];
}

function saveCartItems(items) {
  localStorage.setItem(CART_KEY, JSON.stringify(items));
}

function addToCart(item) {
  const items = getCartItems();
  items.push(item);
  saveCartItems(items);
  renderCart(items);
}

function removeFromCart(itemId) {
  const items = getCartItems().filter(i => i.id !== itemId);
  saveCartItems(items);
  renderCart(items);
}

function renderCart(items) {
  const container = document.getElementById('cart-items');
  const totalEl = document.getElementById('cart-total');
  if (!container || !totalEl) return;

  container.innerHTML = items.map(item => `
    <div class="cart-line" data-id="${item.id}">
      <span>${item.name}</span>
      <span>$${item.price.toFixed(2)}</span>
      <button class="remove-btn" data-id="${item.id}">Remove</button>
    </div>
  `).join('');

  const total = items.reduce((sum, i) => sum + i.price, 0);
  totalEl.textContent = `$${total.toFixed(2)}`;
}
