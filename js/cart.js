

const CART_STORAGE_KEY = 'sweetCrumbCart';

function getCartItems() {
  const raw = localStorage.getItem(CART_STORAGE_KEY);
  return raw ? JSON.parse(raw) : [];
}

function saveCartItems(items) {
  localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(items));
}


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
