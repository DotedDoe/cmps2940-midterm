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
    ? `<a class="card-action customize-btn" href="create.html?product=${product.id}">Customize</a>`
    : `<button class="card-action add-btn" data-product-id="${product.id}">Add to Cart</button>`;

  // Wrapped the HTML block in backticks
  return `
    <article class="product-card">
      <img src="${product.image}" alt="${product.name}">
      <div class="card-body">
        ${badge}
        <h3>${product.name}</h3>
        <p class="price">${formatPrice(product.price)}</p>
        ${actionButton}
      </div>
    </article>
  `;
} // Added missing closing brace

function renderGrid() {
  const items = getCatalogItems().filter(product => {
    const matchesCategory = activeCategory === 'all' || product.category === activeCategory;
    const matchesSearch = product.name.toLowerCase().includes(activeSearch.toLowerCase());
    return matchesCategory && matchesSearch;
  });

  grid.innerHTML = items.map(renderProductCard).join('');
  noResultsMsg.hidden = items.length > 0;
}

searchInput.addEventListener('input', (e) => {
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

  if (typeof addToCart === 'function') {
    addToCart(btn.dataset.productId, []);
  } else {
    // Fixed string interpolation backticks here
    console.log(`Would add "${btn.dataset.productId}" to cart — cart.js not loaded yet.`);
  }
}); // Added missing closing parenthesis

renderGrid();
