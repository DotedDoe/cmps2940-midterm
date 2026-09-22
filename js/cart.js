/* ==================================================================
   cart.js — everything that reads/writes the cart in localStorage.
   catalog.js (and later create.js) call addToCart(); cart.html will
   call getCartItems() to render the cart page itself.
   ================================================================== */

const CART_STORAGE_KEY = 'sweetCrumbCart';

/**
 * Reads the cart from localStorage. Wrapped in its own function (rather
 * than calling localStorage.getItem directly wherever it's needed) so
 * this becomes the ONE place that changes when the final project swaps
 * localStorage for a real fetch() to a Symfony cart endpoint.
 */
function getCartItems() {
  const raw = localStorage.getItem(CART_STORAGE_KEY);
  return raw ? JSON.parse(raw) : [];
}

/** Writes the full cart array back to localStorage. */
function saveCartItems(items) {
  localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(items));
}

/**
 * Adds a product to the cart. selectedOptions is an array of
 * { id, name, priceAdd } — empty for plain, non-customizable items.
 *
 * Two customized versions of the same base product (e.g. a cookie with
 * sprinkles vs. a cookie with M&Ms) need to stay as separate cart lines,
 * so cartLineId folds the product id + sorted option ids together into
 * one identity. Plain items just use the product id as-is.
 */
function addToCart(productId, selectedOptions = []) {
  const items = getCartItems();

  const cartLineId = selectedOptions.length
    ? `${productId}-${selectedOptions.map(o => o.id).sort().join('-')}`
    : productId;

  const existingLine = items.find(item => item.cartLineId === cartLineId);
  if (existingLine) {
    existingLine.qty += 1;
    saveCartItems(items);
    updateCartCountBadge();
    return;
  }

  const product = getCatalogItems().find(p => p.id === productId);
  if (!product) return; // defensive: bad id somehow got passed in

  const addOnTotal = selectedOptions.reduce((sum, o) => sum + o.priceAdd, 0);

  items.push({
    cartLineId,
    productId,
    name: product.name,
    basePrice: product.price,
    selectedOptions,
    unitPrice: product.price + addOnTotal,
    qty: 1
  });

  saveCartItems(items);
  updateCartCountBadge();
}

/**
 * Changes a cart line's quantity by delta (+1 or -1 from the buttons
 * in cart.html). If qty drops to 0 or below, the line is removed
 * entirely rather than left sitting at 0.
 */
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

/** Removes a cart line entirely, regardless of its quantity. */
function removeCartItem(cartLineId) {
  const items = getCartItems().filter(item => item.cartLineId !== cartLineId);
  saveCartItems(items);
  renderCart();
  updateCartCountBadge();
}

/** Sums unitPrice * qty across every line — the order total. */
function calculateCartTotal(items) {
  return items.reduce((sum, item) => sum + item.unitPrice * item.qty, 0);
}

/**
 * Builds the HTML for one cart line. Looks up the product's image via
 * getCatalogItems() (app.js) since the cart entry itself only stores
 * what's needed for pricing/identity — not the whole product record.
 * This keeps localStorage lean and means product info (like images)
 * always reflects the current catalog, not a stale copy from whenever
 * the item was added.
 */
function renderCartLine(item) {
  const product = getCatalogItems().find(p => p.id === item.productId);
  const image = product ? product.image : '';

  // Selected toppings, if any, shown as a small comma-separated line
  // under the product name — empty string (nothing rendered) for
  // plain items with no customization.
  const optionsText = item.selectedOptions.length
    ? `<p class="line-options">${item.selectedOptions.map(o => o.name).join(', ')}</p>`
    : '';

  const lineTotal = item.unitPrice * item.qty;

  return `
    <article class="cart-line" data-cart-line-id="${item.cartLineId}">
      <img src="${image}" alt="${item.name}">
      <div class="line-details">
        <h3>${item.name}</h3>
        ${optionsText}
        <p class="line-unit-price">${formatPrice(item.unitPrice)} each</p>
      </div>
      <div class="line-qty">
        <button class="qty-btn" data-action="decrease" aria-label="Decrease quantity">&minus;</button>
        <span class="qty-value">${item.qty}</span>
        <button class="qty-btn" data-action="increase" aria-label="Increase quantity">+</button>
      </div>
      <p class="line-total">${formatPrice(lineTotal)}</p>
      <button class="remove-btn" aria-label="Remove ${item.name} from cart">Remove</button>
    </article>
  `;
}

/**
 * Renders the whole cart page: the list of lines, the empty state,
 * and the running total. Guarded at the bottom of this file so it
 * only runs (and only attaches its click listener) on cart.html —
 * cart.js is also loaded on inventory.html for addToCart(), and
 * #cart-items won't exist there.
 */
function renderCart() {
  const container = document.getElementById('cart-items');
  const emptyMsg = document.getElementById('empty-cart-message');
  const totalEl = document.getElementById('cart-total');
  if (!container) return; // not on cart.html, nothing to do

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

// ---- Cart-page-only setup: only wire this up and run it if the
// page actually has a #cart-items container (i.e. we're on cart.html).
const cartItemsContainer = document.getElementById('cart-items');
if (cartItemsContainer) {
  // Event delegation on the container: +/- and Remove buttons are
  // destroyed and recreated on every renderCart() call, so the
  // listener has to live on the stable parent, same reasoning as
  // catalog.js's grid click handling.
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
