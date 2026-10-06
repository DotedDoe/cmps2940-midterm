

// cart.js — localStorage cart: add, render, change quantity, remove, total.
//
// Depends on app.js (getCatalogItems / formatPrice / updateCartCountBadge).
// addToCart() receives ONE item object — the same shape catalog.js and
// create.js both send:
//   { productId, name, price (unit price), qty, toppings: [topping names] }

const CART_STORAGE_KEY = 'sweetCrumbCart';

function getCartItems() {
  try {
    const parsed = JSON.parse(localStorage.getItem(CART_STORAGE_KEY));
    // Ignore anything that isn't a valid line (e.g. data saved in an older format)
    return Array.isArray(parsed)
      ? parsed.filter(item => item && typeof item.unitPrice === 'number' && item.qty > 0)
      : [];
  } catch {
    return [];
  }
}

function saveCartItems(items) {
  localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(items));
}

function addToCart(newItem) {
  if (!newItem || !newItem.productId) return;

  const toppings = Array.isArray(newItem.toppings) ? newItem.toppings : [];
  const qty = Math.max(1, parseInt(newItem.qty, 10) || 1);

  // Same product + same toppings = same cart line, so quantities combine.
  const cartLineId = [newItem.productId, ...[...toppings].sort()].join('|');

  const items = getCartItems();
  const existingLine = items.find(item => item.cartLineId === cartLineId);

  if (existingLine) {
    existingLine.qty += qty;
  } else {
    const product = getCatalogItems().find(p => p.id === newItem.productId);
    items.push({
      cartLineId,
      productId: newItem.productId,
      // Use the plain catalog name; toppings are shown on their own line in the cart.
      name: product ? product.name : newItem.name,
      unitPrice: Math.round(Number(newItem.price) * 100) / 100,
      toppings,
      qty
    });
  }

  saveCartItems(items);
  updateCartCountBadge();
}

function updateCartItemQty(cartLineId, delta) {
  const items = getCartItems();
  const line = items.find(item => item.cartLineId === cartLineId);
  if (!line) return;

  line.qty += delta;

  const updatedItems = line.qty <= 0
    ? items.filter(item => item.cartLineId !== cartLineId)
    : items;

  saveCartItems(updatedItems);
  renderCart();
  updateCartCountBadge();
}

function removeCartItem(cartLineId) {
  const items = getCartItems().filter(item => item.cartLineId !== cartLineId);
  saveCartItems(items);
  renderCart();
  updateCartCountBadge();
}

function calculateCartTotal(items) {
  return items.reduce((sum, item) => sum + item.unitPrice * item.qty, 0);
}

function renderCartLine(item) {
  const product = getCatalogItems().find(p => p.id === item.productId);
  const image = product ? product.image : '';

  const toppingsText = item.toppings && item.toppings.length
    ? `<p class="line-options">${item.toppings.join(', ')}</p>`
    : '';

  const lineTotal = item.unitPrice * item.qty;

  return `
    <article class="cart-line" data-cart-line-id="${item.cartLineId}">
      <img src="${image}" alt="${item.name}" onerror="this.classList.add('img-fallback')">
      <div class="line-details">
        <h3>${item.name}</h3>
        ${toppingsText}
        <p class="line-unit-price">${formatPrice(item.unitPrice)} each</p>
      </div>
      <div class="line-qty">
        <button type="button" class="qty-btn" data-action="decrease" aria-label="Decrease quantity">&minus;</button>
        <span class="qty-value">${item.qty}</span>
        <button type="button" class="qty-btn" data-action="increase" aria-label="Increase quantity">+</button>
      </div>
      <p class="line-total">${formatPrice(lineTotal)}</p>
      <button type="button" class="remove-btn" aria-label="Remove ${item.name} from cart">Remove</button>
    </article>
  `;
}

function renderCart() {
  const container = document.getElementById('cart-items');
  const emptyMsg = document.getElementById('empty-cart-message');
  const totalEl = document.getElementById('cart-total');
  if (!container) return; // not on the cart page

  const items = getCartItems();

  if (items.length === 0) {
    container.innerHTML = '';
    emptyMsg.hidden = false;
    totalEl.textContent = formatPrice(0);
    return;
  }

  emptyMsg.hidden = true;
  container.innerHTML = items.map(renderCartLine).join('');
  totalEl.textContent = formatPrice(calculateCartTotal(items));
}

const cartItemsContainer = document.getElementById('cart-items');
if (cartItemsContainer) {
  cartItemsContainer.addEventListener('click', (e) => {
    const line = e.target.closest('.cart-line');
    if (!line) return;
    const cartLineId = line.dataset.cartLineId;

    if (e.target.matches('.qty-btn[data-action="increase"]')) {
      updateCartItemQty(cartLineId, 1);
    } else if (e.target.matches('.qty-btn[data-action="decrease"]')) {
      updateCartItemQty(cartLineId, -1);
    } else if (e.target.matches('.remove-btn')) {
      removeCartItem(cartLineId);
    }
  });

  renderCart();
}