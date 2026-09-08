// catalog.js — Live search & filtering for inventory.html
// Also the single source of truth for product data, shared with create.html
// (create.html includes this file too, so it can look products up by slug).

// Replace this with real product data (or fetch from a JSON file / later a
// Symfony API endpoint — that's why every read goes through the wrapper
// functions below instead of touching PRODUCTS directly).
const PRODUCTS = [
  {
    id: 1,
    slug: 'choc-chip-cookie',
    name: 'Chocolate Chip Cookie',
    price: 3.50,
    description: 'A warm classic — crisp edges, gooey center.',
    image: 'images/products/choc-chip-cookie.png',
    customizable: true,
    customization: {
      preview: 'layered',
      layerGroups: [
        {
          id: 'base',
          label: 'Cookie Base',
          layerId: 'layer-base',
          required: true,
          choices: [
            { id: 'classic', label: 'Sugar', image: 'images-for-website/base.png', priceMod: 0 },
            { id: 'double-choc', label: 'Double Chocolate', image: 'images-for-website/chocolate.png', priceMod: 0.75 },
            { id: 'oatmeal', label: 'Oatmeal Raisin', image: 'images/layers/base-oatmeal.png', priceMod: 0.25 }
          ]
        },
        {
          id: 'frosting',
          label: 'Frosting',
          layerId: 'layer-frosting',
          required: false,
          choices: [
            { id: 'none', label: 'No Frosting', image: null, priceMod: 0 },
            { id: 'vanilla', label: 'Vanilla Drizzle', image: 'images-for-website/frosting.png', priceMod: 0.50 },
            { id: 'chocolate', label: 'Chocolate Drizzle', image: 'images/layers/frosting-chocolate.png', priceMod: 0.50 }
          ]
        },
        {
          id: 'topping',
          label: 'Topping',
          layerId: 'layer-topping',
          required: false,
          choices: [
            { id: 'none', label: 'No Topping', image: null, priceMod: 0 },
            { id: 'sprinkles', label: 'Sprinkles', image: 'images-for-website/sprinkles.jpg', priceMod: 0.30 },
            { id: 'mms', label: 'M&Ms', image: 'images-for-website/mms.png', priceMod: 0.40 },
            { id: 'sea-salt', label: 'Sea Salt', image: 'images/layers/topping-sea-salt.png', priceMod: 0.25 }
          ]
        }
      ]
    }
  },
  {
    id: 2,
    slug: 'birthday-cupcake',
    name: 'Birthday Cupcake',
    price: 4.00,
    description: 'A soft vanilla cupcake, ready for a party.',
    image: 'images/products/birthday-cupcake.png',
    customizable: true,
    customization: {
      preview: 'layered',
      layerGroups: [
        {
          id: 'base',
          label: 'Cake Flavor',
          layerId: 'layer-base',
          required: true,
          choices: [
            { id: 'vanilla', label: 'Vanilla', image: 'images/layers/cupcake-vanilla.png', priceMod: 0 },
            { id: 'red-velvet', label: 'Red Velvet', image: 'images/layers/cupcake-red-velvet.png', priceMod: 0.50 },
            { id: 'lemon', label: 'Lemon', image: 'images/layers/cupcake-lemon.png', priceMod: 0.25 }
          ]
        },
        {
          id: 'frosting',
          label: 'Frosting',
          layerId: 'layer-frosting',
          required: true,
          choices: [
            { id: 'buttercream', label: 'Buttercream', image: 'images-for-website/layers/frosting.png', priceMod: 0 },
            { id: 'cream-cheese', label: 'Cream Cheese', image: 'images/layers/frosting-cream-cheese.png', priceMod: 0.40 }
          ]
        },
        {
          id: 'topping',
          label: 'Topper',
          layerId: 'layer-topping',
          required: false,
          choices: [
            { id: 'none', label: 'No Topper', image: null, priceMod: 0 },
            { id: 'sprinkles', label: 'Sprinkles', image: 'images-for-website/sprinkles.jpg', priceMod: 0.30 },
            { id: 'candle', label: 'Candle', image: 'images/layers/topping-candle.png', priceMod: 0.20 }
          ]
        }
      ]
    }
  },
]

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

// Wrapped the same way — becomes fetch(`/api/products/${slug}`) later
function getProductBySlug(slug) {
  return PRODUCTS.find(item => item.slug === slug) || null;
}

function renderCatalog(items) {
  const grid = document.getElementById('catalog-grid');
  if (!grid) return;

  grid.innerHTML = items.map(item => `
    <article class="card">
      <h3>${item.name}</h3>
      <p>${item.description ?? ''}</p>
      <p>$${item.price.toFixed(2)}</p>
      <div class="card-actions">
        <button data-id="${item.id}" class="add-to-cart-btn">Add to Cart</button>
        ${item.customizable
          ? `<a class="customize-link" href="create.html?product=${item.slug}">Customize</a>`
          : ''}
      </div>
    </article>
  `).join('');
}