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

return `
    <article class="product-card" data-product-id="${product.id}">
      <img src="${product.image}" alt="${product.name}">
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
    console.log(`Would add "${btn.dataset.productId}" to cart — cart.js not loaded yet.`);
}
});

renderGrid();



grid.addEventListener('click', (e) => {
  if (e.target.closest('.add-btn')) return;   
  if (e.target.closest('.customize-btn')) return; 

  const card = e.target.closest('.product-card');
  if (card) openProductModal(card.dataset.productId);
});

const productModal = document.getElementById('product-modal');


function openProductModal(productId) {
  const product = getCatalogItems().find(p => p.id === productId);
  if (!product) return;

  document.getElementById('modal-image').src = product.image;
  document.getElementById('modal-image').alt = product.name;
  document.getElementById('modal-name').textContent = product.name;
  document.getElementById('modal-price').textContent = formatPrice(product.price);
  document.getElementById('modal-description').textContent = product.description || '';

  renderNutritionTable(product.nutrition);

  const allergensEl = document.getElementById('modal-allergens');
  allergensEl.textContent = product.nutrition && product.nutrition.allergens && product.nutrition.allergens.length
    ? `Contains: ${product.nutrition.allergens.join(', ')}`
    : '';

  renderModalAction(product);

  productModal.showModal();
}


function renderNutritionTable(nutrition) {
  const table = document.getElementById('modal-nutrition');
  if (!nutrition) {
    table.innerHTML = '<tr><td>Nutrition info not available</td></tr>';
    return;
  }

  const rows = [
    ['Serving Size', nutrition.servingSize],
    ['Calories', nutrition.calories],
    ['Total Fat', nutrition.fat],
    ['Total Carbs', nutrition.carbs],
    ['Sugars', nutrition.sugar],
    ['Protein', nutrition.protein]
  ];

  table.innerHTML = rows
    .filter(([, value]) => value !== undefined)
    .map(([label, value]) => `<tr><th>${label}</th><td>${value}</td></tr>`)
    .join('');
}


function renderModalAction(product) {
  const actionContainer = document.getElementById('modal-action');

  if (product.customizable) {
    actionContainer.innerHTML =
      `<a class="card-action customize-btn" href="create.html?product=${product.id}">Customize</a>`;
    return;
  }

  actionContainer.innerHTML =
    `<button class="card-action add-btn" data-product-id="${product.id}">Add to Cart</button>`;

  actionContainer.querySelector('.add-btn').addEventListener('click', () => {
    if (typeof addToCart === 'function') addToCart(product.id, []);
    productModal.close();
  });
}

const modalCloseBtn = document.getElementById('modal-close');
if (modalCloseBtn) {
  modalCloseBtn.addEventListener('click', () => productModal.close());
}


productModal.addEventListener('click', (e) => {
  if (e.target === productModal) {
    productModal.close();
  }
});