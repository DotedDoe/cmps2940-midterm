// create.js — Product carousel + topping-based customization for create.html
//
// Depends on app.js (for getCatalogItems() / formatPrice()) and cart.js
// (for addToCart()) being loaded first. Does NOT depend on catalog.js.

document.addEventListener('DOMContentLoaded', () => {
  const carouselTrack = document.getElementById('product-carousel-track');
  const panel = document.getElementById('customizer-panel');

  if (!carouselTrack || !panel) return;

  const products = getCatalogItems().filter(p => p.customizable);

  if (products.length === 0) {
    panel.innerHTML = '<p>No customizable products are available right now.</p>';
    return;
  }

  let activeIndex = 0;
  let selectedToppingIds = [];
  let quantity = 1;

  init();

  function init() {
    const requestedId = new URLSearchParams(window.location.search).get('product');
    const requestedIndex = products.findIndex(p => p.id === requestedId);
    activeIndex = requestedIndex !== -1 ? requestedIndex : 0;

    buildCarousel();
    selectProduct(activeIndex);

    document.getElementById('product-carousel-prev')?.addEventListener('click', () => {
      selectProduct((activeIndex - 1 + products.length) % products.length);
    });
    document.getElementById('product-carousel-next')?.addEventListener('click', () => {
      selectProduct((activeIndex + 1) % products.length);
    });
  }

  // ---------- Top carousel: browse all customizable products ----------

  function buildCarousel() {
    carouselTrack.innerHTML = products.map((product, index) => `
      <button type="button" class="product-carousel-item" data-index="${index}" aria-label="Customize ${product.name}">
        <img src="${product.image}" alt="${product.name}" onerror="this.classList.add('img-fallback')">
        <span class="product-carousel-name">${product.name}</span>
        <span class="product-carousel-price">${formatPrice(product.price)}</span>
      </button>
    `).join('');

    carouselTrack.querySelectorAll('.product-carousel-item').forEach(btn => {
      btn.addEventListener('click', () => selectProduct(parseInt(btn.dataset.index, 10)));
    });
  }

  function selectProduct(index) {
    activeIndex = index;
    const product = products[activeIndex];

    carouselTrack.querySelectorAll('.product-carousel-item').forEach((btn, i) => {
      btn.classList.toggle('active', i === activeIndex);
    });
    carouselTrack.querySelector('.product-carousel-item.active')
      ?.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });

    const url = new URL(window.location);
    url.searchParams.set('product', product.id);
    window.history.replaceState({}, '', url);

    selectedToppingIds = [];
    quantity = 1;
    renderCustomizer(product);
  }

  // ---------- Customizer panel ----------

  function renderCustomizer(product) {
    const options = product.customizable.options || [];

    const overlaysHtml = options.map(opt => `
      <img id="layer-${opt.id}" class="customizer-overlay" alt=""
           style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);
                  display:none; width:${opt.overlayScale || 100}%; height:${opt.overlayScale || 100}%;
                  object-fit:contain; pointer-events:none;">
    `).join('');

    const toppingsHtml = options.length > 0 ? `
      <fieldset class="topping-list">
        <legend>${product.customizable.label || 'Add-ons'}</legend>
        ${options.map(opt => `
          <label class="topping-option">
            <input type="checkbox" value="${opt.id}" data-price="${opt.priceAdd}" data-overlay="${opt.overlayImage || ''}">
            <span>${opt.name}</span>
            <span class="topping-price">+${formatPrice(opt.priceAdd)}</span>
          </label>
        `).join('')}
      </fieldset>
    ` : '';

    panel.innerHTML = `
      <div class="customizer-card">
        <div class="image-container" style="position: relative;">
          <img class="customizer-image" src="${product.image}" alt="${product.name}" onerror="this.classList.add('img-fallback')">
          ${overlaysHtml}
        </div>

        <div class="customizer-details">
          <h2>${product.name}</h2>
          <p class="base-price">Base price: ${formatPrice(product.price)}</p>

          ${toppingsHtml}

          <div class="quantity-row">
            <label for="quantity-input">Quantity</label>
            <input type="number" id="quantity-input" min="1" max="20" value="1">
          </div>

          <p class="price-display">Total: <span id="price-total">${formatPrice(product.price)}</span></p>
          <button type="button" id="add-to-cart-btn" class="card-action add-btn">Add to Cart</button>
        </div>
      </div>
    `;

    wireControls(product);
  }

  function wireControls(product) {
    panel.querySelectorAll('.topping-option input[type="checkbox"]').forEach(box => {
      box.addEventListener('change', (e) => {
        const checkbox = e.target;
        const layerImg = document.getElementById(`layer-${checkbox.value}`);
        const overlaySrc = checkbox.dataset.overlay;

        if (layerImg && overlaySrc) {
          if (checkbox.checked) {
            layerImg.src = overlaySrc;
            layerImg.style.display = 'block';
          } else {
            layerImg.removeAttribute('src');
            layerImg.style.display = 'none';
          }
        }

        selectedToppingIds = Array.from(
          panel.querySelectorAll('.topping-option input:checked')
        ).map(el => el.value);
        updatePrice(product);
      });
    });

    document.getElementById('quantity-input')?.addEventListener('input', (e) => {
      quantity = Math.min(20, Math.max(1, parseInt(e.target.value, 10) || 1));
      updatePrice(product);
    });

    document.getElementById('add-to-cart-btn')?.addEventListener('click', () => {
      addCustomItemToCart(product);
    });
  }

  function calcUnitPrice(product) {
    const options = product.customizable.options || [];
    const toppingTotal = selectedToppingIds.reduce((sum, id) => {
      const opt = options.find(o => o.id === id);
      return sum + (opt ? opt.priceAdd : 0);
    }, 0);
    return product.price + toppingTotal;
  }

  function updatePrice(product) {
    const priceEl = document.getElementById('price-total');
    if (priceEl) priceEl.textContent = formatPrice(calcUnitPrice(product) * quantity);
  }

  // ---------- Cart integration ----------

  function addCustomItemToCart(product) {
    const options = product.customizable.options || [];
    const toppingNames = selectedToppingIds
      .map(id => options.find(o => o.id === id)?.name)
      .filter(Boolean);

    const unitPrice = calcUnitPrice(product);
    const displayName = toppingNames.length > 0
      ? `${product.name} (${toppingNames.join(', ')})`
      : product.name;

    const cartItem = {
      id: `${product.id}-${Date.now()}`,
      name: displayName,
      // Unit price: the cart should multiply by qty. If your cart.js expects a
      // line total instead, change this back to unitPrice * quantity.
      price: parseFloat(unitPrice.toFixed(2)),
      qty: quantity,
      productId: product.id,
      toppings: toppingNames
    };

    addToCart(cartItem);

    const btn = document.getElementById('add-to-cart-btn');
    if (btn) {
      const original = btn.textContent;
      btn.textContent = 'Added!';
      btn.disabled = true;
      setTimeout(() => { btn.textContent = original; btn.disabled = false; }, 1200);
    }
  }
});
