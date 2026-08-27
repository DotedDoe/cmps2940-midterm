// catalog.js — Live search & filtering for inventory.html

// Replace this with real product data (or fetch from a JSON file)
const PRODUCTS = [
  // { id: 1, name: 'Example Item', price: 4.99, description: '...' },
];

document.addEventListener('DOMContentLoaded', () => {
  renderCatalog(getCatalogItems());

  const searchInput = document.getElementById('search-input');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const query = e.target.value.toLowerCase();
      const filtered = getCatalogItems().filter(item =>
        item.name.toLowerCase().includes(query)
      );
      renderCatalog(filtered);
    });
  }
});

// Wrapped so this can later be swapped for a fetch() call to a Symfony API
function getCatalogItems() {
  return PRODUCTS;
}

function renderCatalog(items) {
  const grid = document.getElementById('catalog-grid');
  if (!grid) return;

  grid.innerHTML = items.map(item => `
    <article class="card">
      <h3>${item.name}</h3>
      <p>${item.description ?? ''}</p>
      <p>$${item.price.toFixed(2)}</p>
      <button data-id="${item.id}" class="add-to-cart-btn">Add to Cart</button>
    </article>
  `).join('');
}
