// create.js — Product carousel + item customization for create.html
//
// Depends on catalog.js being loaded first (uses getCatalogItems() /
// getProductBySlug()). Depends on cart.js for persistence where possible —
// see addCustomItemToCart() at the bottom for the integration point.

document.addEventListener('DOMContentLoaded', () => {
  const carouselTrack = document.getElementById('product-carousel-track');
  const panel = document.getElementById('customizer-panel');

  // If we aren't on create.html, exit cleanly (mirrors the guard pattern
  // already used in initCookieBuilder() in app.js).
  if (!carouselTrack || !panel) return;

  const products = getCatalogItems().filter(item => item.customizable);

  if (products.length === 0) {
    panel.innerHTML = '<p>No customizable products are available right now.</p>';
    return;
  }

  // Current selections for whichever product is active, keyed by group id.
  let activeIndex = 0;
  let selections = {};
  let quantity = 1;

  init();

  function init() {
    const requestedSlug = new URLSearchParams(window.location.search).get('product');
    const requestedIndex = products.findIndex(p => p.slug === requestedSlug);
    activeIndex = requestedIndex !== -1 ? requestedIndex : 0;

    buildProductCarousel();
    selectProduct(activeIndex);

    document.getElementById('product-carousel-prev')?.addEventListener('click', () => {
      selectProduct((activeIndex - 1 + products.length) % products.length);
    });
    document.getElementById('product-carousel-next')?.addEventListener('click', () => {
      selectProduct((activeIndex + 1) % products.length);
    });
  }

  // ---------- Top carousel: browse all customizable products ----------

  function buildProductCarousel() {
    carouselTrack.innerHTML = products.map((product, index) => `
      <button type="button" class="product-carousel-item" data-index="${index}" aria-label="Customize ${product.name}">
        <img src="${product.image}" alt="${product.name}" onerror="this.classList.add('img-fallback')">
        <span class="product-carousel-name">${product.name}</span>
        <span class="product-carousel-price">$${product.price.toFixed(2)}</span>
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

    // Reflect the choice in the URL without reloading, so the link stays
    // shareable / bookmarkable the same way it arrived from inventory.html.
    const url = new URL(window.location);
    url.searchParams.set('product', product.slug);
    window.history.replaceState({}, '', url);

    quantity = 1;
    selections = defaultSelections(product);
    renderCustomizer(product);
  }

  function defaultSelections(product) {
    const defaults = {};
    if (product.customization.preview === 'layered') {
      product.customization.layerGroups.forEach(group => {
        defaults[group.id] = group.choices[0].id;
      });
    } else {
      product.customization.options.forEach(option => {
        defaults[option.id] = option.type === 'text' ? '' : option.choices[0].id;
      });
    }
    return defaults;
  }

  // ---------- Customization panel: layered preview or simple preview ----------

  function renderCustomizer(product) {
    panel.innerHTML = product.customization.preview === 'layered'
      ? layeredMarkup(product)
      : simpleMarkup(product);

    wireControls(product);
    updatePreview(product);
    updatePrice(product);
  }

  function layeredMarkup(product) {
    const groups = product.customization.layerGroups;
    const baseGroup = groups.find(g => g.id === 'base');
    const otherGroups = groups.filter(g => g.id !== 'base');

    const baseLayers = baseGroup.choices.map((choice, i) => `
      <img src="${choice.image}" alt="${choice.label}"
           class="layer base-layer${i === 0 ? ' active' : ''}"
           data-choice="${choice.id}"
           onerror="this.classList.add('img-fallback')">
    `).join('');

    const otherLayers = otherGroups.map(group => `
      <img src="" alt="${group.label}" id="layer-${group.id}" class="layer"
           onerror="this.classList.add('img-fallback')">
    `).join('');

    const baseArrows = baseGroup.choices.length > 1 ? `
      <button type="button" class="carousel-btn prev-btn" id="prevBase" aria-label="Previous ${baseGroup.label}">&#10094;</button>
      <button type="button" class="carousel-btn next-btn" id="nextBase" aria-label="Next ${baseGroup.label}">&#10095;</button>
    ` : '';

    const controls = groups.map(group => `
      <div class="control-group">
        <label for="select-${group.id}">${group.label}</label>
        <select id="select-${group.id}" data-group="${group.id}">
          ${group.choices.map(choice => `
            <option value="${choice.id}">${choice.label}${choice.priceMod ? ` (+$${choice.priceMod.toFixed(2)})` : ''}</option>
          `).join('')}
        </select>
      </div>
    `).join('');

    return `
      <div class="cookie-builder">
        <div class="cookie-window">
          <div class="cookie-carousel">
            ${baseLayers}
            ${otherLayers}
          </div>
          ${baseArrows}
        </div>
        <div class="cookie-controls">
          <h2>${product.name}</h2>
          ${controls}
          ${quantityControl()}
          ${priceAndCartMarkup()}
        </div>
      </div>
    `;
  }

  function simpleMarkup(product) {
    const controls = product.customization.options.map(option => {
      if (option.type === 'text') {
        return `
          <div class="control-group">
            <label for="opt-${option.id}">${option.label}</label>
            <input type="text" id="opt-${option.id}" data-option="${option.id}"
                   maxlength="${option.maxLength ?? 40}" placeholder="Type here&hellip;">
          </div>
        `;
      }
      if (option.type === 'swatch') {
        return `
          <div class="control-group">
            <label>${option.label}</label>
            <div class="swatch-group" data-option="${option.id}">
              ${option.choices.map((choice, i) => `
                <button type="button" class="swatch${i === 0 ? ' active' : ''}"
                        data-choice="${choice.id}"
                        style="background:${choice.swatch}"
                        title="${choice.label}${choice.priceMod ? ` (+$${choice.priceMod.toFixed(2)})` : ''}"
                        aria-label="${choice.label}"></button>
              `).join('')}
            </div>
          </div>
        `;
      }
      // default: 'select'
      return `
        <div class="control-group">
          <label for="opt-${option.id}">${option.label}</label>
          <select id="opt-${option.id}" data-option="${option.id}">
            ${option.choices.map(choice => `
              <option value="${choice.id}">${choice.label}${choice.priceMod ? ` (+$${choice.priceMod.toFixed(2)})` : ''}</option>
            `).join('')}
          </select>
        </div>
      `;
    }).join('');

    return `
      <div class="cookie-builder">
        <div class="cookie-window simple-preview">
          <img src="${product.image}" alt="${product.name}" onerror="this.classList.add('img-fallback')">
        </div>
        <div class="cookie-controls">
          <h2>${product.name}</h2>
          <p>${product.description ?? ''}</p>
          ${controls}
          ${quantityControl()}
          ${priceAndCartMarkup()}
        </div>
      </div>
    `;
  }

  function quantityControl() {
    return `
      <div class="control-group">
        <label for="quantity-input">Quantity</label>
        <input type="number" id="quantity-input" min="1" max="20" value="${quantity}">
      </div>
    `;
  }

  function priceAndCartMarkup() {
    return `
      <p class="price-display">Total: <span id="price-total">$0.00</span></p>
      <button type="button" id="add-to-cart-btn">Add to Cart</button>
    `;
  }

  // ---------- Wiring: keep preview + price in sync with controls ----------

  function wireControls(product) {
    if (product.customization.preview === 'layered') {
      product.customization.layerGroups.forEach(group => {
        const select = document.getElementById(`select-${group.id}`);
        select?.addEventListener('change', (e) => {
          selections[group.id] = e.target.value;
          if (group.id === 'base') syncBaseCarousel(product);
          updatePreview(product);
          updatePrice(product);
        });
      });

      document.getElementById('prevBase')?.addEventListener('click', () => stepBase(product, -1));
      document.getElementById('nextBase')?.addEventListener('click', () => stepBase(product, 1));
    } else {
      product.customization.options.forEach(option => {
        if (option.type === 'text') {
          document.getElementById(`opt-${option.id}`)?.addEventListener('input', (e) => {
            selections[option.id] = e.target.value;
            updatePrice(product);
          });
        } else if (option.type === 'swatch') {
          document.querySelectorAll(`.swatch-group[data-option="${option.id}"] .swatch`).forEach(btn => {
            btn.addEventListener('click', () => {
              selections[option.id] = btn.dataset.choice;
              document.querySelectorAll(`.swatch-group[data-option="${option.id}"] .swatch`)
                .forEach(b => b.classList.toggle('active', b === btn));
              updatePrice(product);
            });
          });
        } else {
          document.getElementById(`opt-${option.id}`)?.addEventListener('change', (e) => {
            selections[option.id] = e.target.value;
            updatePrice(product);
          });
        }
      });
    }

    document.getElementById('quantity-input')?.addEventListener('input', (e) => {
      quantity = Math.max(1, parseInt(e.target.value, 10) || 1);
      updatePrice(product);
    });

    document.getElementById('add-to-cart-btn')?.addEventListener('click', () => {
      addCustomItemToCart(product, selections, quantity, calcPrice(product));
    });
  }

  function stepBase(product, direction) {
    const baseGroup = product.customization.layerGroups.find(g => g.id === 'base');
    const currentId = selections.base;
    const currentIndex = baseGroup.choices.findIndex(c => c.id === currentId);
    const nextIndex = (currentIndex + direction + baseGroup.choices.length) % baseGroup.choices.length;
    selections.base = baseGroup.choices[nextIndex].id;

    const select = document.getElementById('select-base');
    if (select) select.value = selections.base;

    syncBaseCarousel(product);
    updatePreview(product);
    updatePrice(product);
  }

  function syncBaseCarousel(product) {
    document.querySelectorAll('.base-layer').forEach(img => {
      img.classList.toggle('active', img.dataset.choice === selections.base);
    });
  }

  function updatePreview(product) {
    if (product.customization.preview !== 'layered') return;

    product.customization.layerGroups
      .filter(group => group.id !== 'base')
      .forEach(group => {
        const layerImg = document.getElementById(`layer-${group.id}`);
        if (!layerImg) return;

        const choice = group.choices.find(c => c.id === selections[group.id]);
        if (choice && choice.image) {
          layerImg.src = choice.image;
          layerImg.classList.add('active');
        } else {
          layerImg.classList.remove('active');
        }
      });
  }

  function calcPrice(product) {
    let unit = product.price;

    if (product.customization.preview === 'layered') {
      product.customization.layerGroups.forEach(group => {
        const choice = group.choices.find(c => c.id === selections[group.id]);
        if (choice) unit += choice.priceMod;
      });
    } else {
      product.customization.options.forEach(option => {
        if (option.type === 'text') {
          if (selections[option.id]) unit += option.priceMod ?? 0;
        } else {
          const choice = option.choices.find(c => c.id === selections[option.id]);
          if (choice) unit += choice.priceMod;
        }
      });
    }

    return unit * quantity;
  }

  function updatePrice(product) {
    const priceEl = document.getElementById('price-total');
    if (priceEl) priceEl.textContent = `$${calcPrice(product).toFixed(2)}`;
  }

  // ---------- Cart integration ----------
  //
  // Matches the shape cart.js's renderCart() actually reads: a top-level
  // .id, .name, and a single .price number (the line total for this
  // quantity — cart.js doesn't currently track quantity separately).
  // The extra fields (quantity, unitPrice, customization, image, slug)
  // are harmless — renderCart() ignores fields it doesn't use — but are
  // there so cart.html can show more detail later without another rewrite.
  function addCustomItemToCart(product, selections, quantity, unitTotal) {
    const cartItem = {
      id: `${product.slug}-${Date.now()}`,
      name: product.name,
      price: parseFloat(unitTotal.toFixed(2)),
      productId: product.id,
      slug: product.slug,
      image: product.image,
      quantity,
      unitPrice: parseFloat((unitTotal / quantity).toFixed(2)),
      customization: describeSelections(product, selections)
    };

    // addToCart() in cart.js already does get -> push -> save -> re-render
    // in one step, so use it directly now that cart.js is loaded here too.
    if (typeof addToCart === 'function') {
      addToCart(cartItem);
    } else {
      // Fallback in case cart.js isn't loaded on this page for some reason.
      const items = JSON.parse(localStorage.getItem('cart_items') || '[]');
      items.push(cartItem);
      localStorage.setItem('cart_items', JSON.stringify(items));
    }

    const btn = document.getElementById('add-to-cart-btn');
    if (btn) {
      const original = btn.textContent;
      btn.textContent = 'Added!';
      btn.disabled = true;
      setTimeout(() => { btn.textContent = original; btn.disabled = false; }, 1200);
    }
  }

  // Turns the raw selections object into a readable summary for the cart
  // page / order review, e.g. "Base: Double Chocolate, Frosting: Vanilla".
  function describeSelections(product, selections) {
    if (product.customization.preview === 'layered') {
      return product.customization.layerGroups.map(group => {
        const choice = group.choices.find(c => c.id === selections[group.id]);
        return `${group.label}: ${choice ? choice.label : '—'}`;
      });
    }
    return product.customization.options.map(option => {
      if (option.type === 'text') {
        return selections[option.id] ? `${option.label}: ${selections[option.id]}` : null;
      }
      const choice = option.choices.find(c => c.id === selections[option.id]);
      return `${option.label}: ${choice ? choice.label : '—'}`;
    }).filter(Boolean);
  }
});