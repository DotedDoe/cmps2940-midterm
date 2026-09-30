// catalog.js — Product grid, search and category filters for the catalog page.
//
// Depends on app.js (getCatalogItems / formatPrice) and cart.js (addToCart)
// being loaded first.

const grid = document.getElementById('product-grid');
const searchInput = document.getElementById('search-input');
const filterChips = document.querySelectorAll('.filter-chip');
const noResultsMsg = document.getElementById('no-results');

let activeCategory = 'all';
let activeSearch = '';

function renderProductCard(product) {
  const badge = product.customizable
    ? `<span class="badge">Customizable</span>`
    : '';

  const actionButton = product.customizable
    ? `<a class="card-action customize-btn" href="create.html?product=${encodeURIComponent(product.id)}">Customize</a>`
    : `<button type="button" class="card-action add-btn" data-product-id="${product.id}">Add to Cart</button>`;

  // Wrapped the HTML block in backticks
  return `
    <article class="product-card">
      <img src="${product.image}" alt="${product.name}" onerror="this.classList.add('img-fallback')">
      <div class="card-body">
        ${badge}
        <h3>${product.name}</h3>
        <p class="price">${formatPrice(product.price)}</p>
        ${actionButton}
      </div>
    </article>
  `;
}

function renderGrid() {
  const query = activeSearch.trim().toLowerCase();

  const items = getCatalogItems().filter(product => {
    const matchesCategory = activeCategory === 'all' || product.category === activeCategory;
    const matchesSearch = product.name.toLowerCase().includes(query);
    return matchesCategory && matchesSearch;
  });

  grid.innerHTML = items.map(renderProductCard).join('');
  noResultsMsg.hidden = items.length > 0;
}

searchInput?.addEventListener('input', (e) => {
  activeSearch = e.target.value;
  renderGrid();
});

filterChips.forEach(chip => {
  chip.addEventListener('click', () => {
    filterChips.forEach(c => c.classList.remove('active'));
    chip.classList.add('active');
    activeCategory = chip.dataset.category;
    renderGrid();
  });
});

grid.addEventListener('click', (e) => {
  const btn = e.target.closest('.add-btn');
  if (!btn) return;

  const product = getCatalogItems().find(p => p.id === btn.dataset.productId);
  if (!product) return;

  // Same item shape create.js sends, so the cart only has to understand one format.
  const cartItem = {
    id: product.id,
    name: product.name,
    price: product.price,   // unit price; qty is separate
    qty: 1,
    productId: product.id,
    toppings: []
  };

  if (typeof addToCart === 'function') {
    addToCart(cartItem);

    const original = btn.textContent;
    btn.textContent = 'Added!';
    btn.disabled = true;
    setTimeout(() => { btn.textContent = original; btn.disabled = false; }, 1200);
  } else {
    console.log(`Would add "${product.id}" to cart — cart.js not loaded yet.`);
  }
}); // Added missing closing parenthesis

renderGrid();
