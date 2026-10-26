<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\MacroNamespace;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* home/index.html.twig */
class __TwigTemplate_2b34809d79726693eb9ecc1b4174c2c6 extends Template
{
    private Source $source;
    /**
     * @var array<string, MacroNamespace>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Home | Cookie Time Cookie</title>
  <link rel=\"stylesheet\" href=\"css/styles.css\">
  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link href=\"https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">

  
  <style>
  .hero-banner {
  width: 100%;
  max-height: 400px;
  overflow: hidden;
}

.hero-banner img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

    
    .card-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }

    .image-counter-card {
      position: relative;      /*positioning reference for the overlay*/
      display: inline-block;
      width: 300px;
    }

    .image-counter-card img {
      display: block;
      width: 300px;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }

    .counter-overlay {
      position: absolute;      /*sits on top of the image*/
      top: 10px;
      right: 10px;
      background: rgba(0, 0, 0, 0.65);
      color: #fff;
      padding: 6px 10px;
      border-radius: 12px;
      font-family: \x27Inter\x27, sans-serif;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .counter-overlay button {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      cursor: pointer;
      line-height: 1;
      font-size: 14px;
    }

    .counter-overlay button:hover {
      background: rgba(255, 255, 255, 0.4);
    }

    .add-to-cart button {
      display: block;
      width: 100%;
      margin-top: 8px;
      padding: 10px;
      border: none;
      border-radius:8px;
      background: #c8763a;
      color: #fff;
      font-family: \x27Inter\x27, sans-serif;
      font-weight: 600;
      cursor: pointer;
    }

    .add-to-cart:hover {
      background: a85f2b;
    }

    .container {
      position: relative;
      text-align: center;
      color: rgb(255, 0, 0);
    }

    .bottom-left {
      position: absolute;
      bottom: 8px;
      left: 16px;
      color: rgb(255, 255, 255)
    }

    .bottom-right {
      position: absolute;
      bottom: 8px;
      right: 16px;
    }

    .hero-banner {
      position: relative;
      width: 100%;
      max-height: 400px;
      overflow: hidden;
}

.hero-banner img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.hero-banner .banner-logo {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);  /* centers it on the banner */
  width: 200px;                      /* adjust to taste */
  height: auto;
}
  </style>
</head>
<body>
  <header class=\"site-header\">
    <div class=\"nav-inner\">
      <nav class=\"main-nav\">
        <a href=\"index.html\" class=\"active\" aria-current=\"page\">Home</a>
        <a href=\"inventory.html\">Inventory</a>
        <a href=\"cart.html\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
        <a href=\"login.html\">Login</a>
        <a href=\"create.html\">Create Your Own</a>
        <a href=\"about-us.html\">About Us!</a>
      </nav>
    </div>

 </header>
<div class=\"hero-banner\">
  <img src=\"images-for-website/cookieforbackgroundmeow.avif\" alt=\"mister white yo\" />
  <img src=\"images-for-website/cookie-time-cookie-logo.png\" alt=\"IM DA DWIFTA\" class=\"banner-logo\" />
</div>
  <div id=\"modeToggle\">
    <button id=\"themeToggle\">Dark Mode</button>
  </div>

  <main>
    

    <section class=\"announcements\">
    </section>

<audio id=\"bg\" src=\"audio/bakery.mp3\" loop preload=\"auto\"></audio>
<button id=\"mute-btn\" type=\"button\" aria-label=\"Mute music\">🔊</button>

<script>
  const bg = document.getElementById(\x27bg\x27);
  bg.volume = 0.4; // optional: background music shouldn\x27t be loud

  const events = [\x27pointerdown\x27, \x27click\x27, \x27keydown\x27, \x27touchend\x27];

  function start() {
    bg.play()
      .then(() => {
        // Only stop listening once playback actually started
        events.forEach(e => document.removeEventListener(e, start));
      })
      .catch(err => {
        // Blocked or failed: keep the listeners so the next tap/click retries
        console.warn(\x27Audio could not start yet:\x27, err);
      });
  }
  const muteBtn = document.getElementById(\x27mute-btn\x27);

muteBtn.addEventListener(\x27click\x27, (e) => {
  e.stopPropagation(); // don\x27t let this click also trigger start()
  bg.muted = !bg.muted;
  muteBtn.textContent = bg.muted ? \x27🔇\x27 : \x27🔊\x27;
  muteBtn.setAttribute(\x27aria-label\x27, bg.muted ? \x27Unmute music\x27 : \x27Mute music\x27);
});

  events.forEach(e => document.addEventListener(e, start));
</script>
    <section class=\"highlights\">
      <h2>Featured Items</h2>

      <div class=\"card-grid\">

        <div class=\"image-counter-card\" data-id=\"choco-mountain\" data-name=\"Choco Mountain\" data-price=\"3.50\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbakewithshivesh.com%2Fwp-content%2Fuploads%2F2020%2F05%2F151F814A-2749-4978-BA53-3AD2A962C933-scaled.jpg&f=1&nofb=1&ipt=fd4bddd16a29d46bfd11e9d93fb13b002a94f1f3ac3905ec48e6e902d98a0e93\" alt=\"WE NEED TO COOK!\">
          <div class=\"bottom-left\">Choco Mountain</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count1\x27)\">−</button>
            <span id=\"count1\">0</span>
            <button onclick=\"inc(\x27count1\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count1\x27)\">Add to Cart</button>
        </div>

        <div class=\"image-counter-card\" data-id=\"sweet-sweet-canyon\" data-name=\"Sweet Sweet Canyon\" data-price=\"2.50\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbellyfull.net%2Fwp-content%2Fuploads%2F2025%2F02%2FSugar-Cookies-hero-1.jpg&f=1&nofb=1&ipt=d2836a14c2e40496aa96858c00c7fbcf72ac28a968b205a3f971c42e61227203\" alt=\"R.I.P Dolly Parton\">
          <div class=\"bottom-left\">Sweet Sweet Canyon</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count2\x27)\">−</button>
            <span id=\"count2\">0</span>
            <button onclick=\"inc(\x27count2\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count2\x27)\">Add to Cart</button>
        </div>

         <div class=\"image-counter-card\" data-id=\"pumpkin-pinball\" data-name=\"Pumpkin Pinball\" data-price=\"3.00\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwearerecipes.com%2Fwp-content%2Fuploads%2F2025%2F09%2Fpumpkin-cookies-1.webp&f=1&nofb=1&ipt=070717642ada13dddce7c3ff9a2d9923171204860fa6c36f31017b31d5135ce7&ipo=images\" alt=\"MR WHITE! IM TIRED YO!\">
          <div class=\"bottom-left\">Pumpkin Pinball</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count3\x27)\">−</button>
            <span id=\"count3\">0</span>
            <button onclick=\"inc(\x27count3\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count3\x27)\">Add to Cart</button>
        </div>

        <div class=\"image-counter-card\" data-id=\"rainbow-road\" data-name=\"Rainbow Road\" data-price=\"4.00\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbeyondfrosting.com%2Fwp-content%2Fuploads%2F2022%2F04%2FRainbow-Sugar-Cookies-2161-2.jpg&f=1&nofb=1&ipt=28845a5526de4068839f43a929cc79b67406a5a163af564b334df754d46a5c59&ipo=images\" alt=\"Mrrr Chrima\">
          <div class=\"bottom-left\">Rainbow Road</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count4\x27)\">−</button>
            <span id=\"count4\">0</span>
            <button onclick=\"inc(\x27count4\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count4\x27)\">Add to Cart</button>
        </div>

        <div class=\"image-counter-card\" data-id=\"macaroon-beach\" data-name=\"Macaroon Beach\" data-price=\"3.75\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.jordanwinery.com%2Fwp-content%2Fuploads%2F2020%2F04%2FFrench-Macaron-Cookie-Recipe-WebHero-6435.jpg&f=1&nofb=1&ipt=b63971ffca0730e5af8b8000919f0029a95e78b5e184ca28e1ac2f65ea1b9198&ipo=images\" alt=\"Yur mum\">
          <div class=\"bottom-left\">Macaroon Beach</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count5\x27)\">−</button>
            <span id=\"count5\">0</span>
            <button onclick=\"inc(\x27count5\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count5\x27)\">Add to Cart</button>
        </div>

      </div>
    </section>
  </main>

  <footer class=\"site-footer\">
    <p>&copy; 2026 Cookie Time Cookie</p>
  </footer>

  <script src=\"js/app.js\"></script>
  <script src=\"js/cart.js\"></script>
  <script>
    const counts = {};

    function inc(id) {
      counts[id] = (counts[id] || 0) + 1;
      document.getElementById(id).textContent = counts[id];
    }

    function dec(id) {
      counts[id] = Math.max((counts[id] || 0) - 1, 0);
      document.getElementById(id).textContent = counts[id];
    }

    // Adds a featured item to the same cart the cart and checkout pages use
    // (getCartItems / saveCartItems / updateCartCountBadge come from cart.js and app.js)
    function addFeaturedToCart(btn, countId) {
      const qty = counts[countId] || 0;
      if (qty === 0) return; // nothing selected

      const card = btn.closest(\x27.image-counter-card\x27);
      const { id, name, price } = card.dataset;
      const unitPrice = parseFloat(price);

      const items = getCartItems();
      const existing = items.find(item => item.cartLineId === id);

      if (existing) {
        existing.qty += qty;
      } else {
        items.push({
          cartLineId: id,
          productId: id,
          name,
          basePrice: unitPrice,
          selectedOptions: [],
          unitPrice,
          qty,
          image: card.querySelector(\x27img\x27).src
        });
      }

      saveCartItems(items);
      updateCartCountBadge();

      // reset the counter
      counts[countId] = 0;
      document.getElementById(countId).textContent = 0;
    }
  </script>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDefaultEscapeStrategy(): string|false
    {
        return "html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Home | Cookie Time Cookie</title>
  <link rel=\"stylesheet\" href=\"css/styles.css\">
  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link href=\"https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">

  
  <style>
  .hero-banner {
  width: 100%;
  max-height: 400px;
  overflow: hidden;
}

.hero-banner img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

    
    .card-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }

    .image-counter-card {
      position: relative;      /*positioning reference for the overlay*/
      display: inline-block;
      width: 300px;
    }

    .image-counter-card img {
      display: block;
      width: 300px;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }

    .counter-overlay {
      position: absolute;      /*sits on top of the image*/
      top: 10px;
      right: 10px;
      background: rgba(0, 0, 0, 0.65);
      color: #fff;
      padding: 6px 10px;
      border-radius: 12px;
      font-family: \x27Inter\x27, sans-serif;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .counter-overlay button {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      cursor: pointer;
      line-height: 1;
      font-size: 14px;
    }

    .counter-overlay button:hover {
      background: rgba(255, 255, 255, 0.4);
    }

    .add-to-cart button {
      display: block;
      width: 100%;
      margin-top: 8px;
      padding: 10px;
      border: none;
      border-radius:8px;
      background: #c8763a;
      color: #fff;
      font-family: \x27Inter\x27, sans-serif;
      font-weight: 600;
      cursor: pointer;
    }

    .add-to-cart:hover {
      background: a85f2b;
    }

    .container {
      position: relative;
      text-align: center;
      color: rgb(255, 0, 0);
    }

    .bottom-left {
      position: absolute;
      bottom: 8px;
      left: 16px;
      color: rgb(255, 255, 255)
    }

    .bottom-right {
      position: absolute;
      bottom: 8px;
      right: 16px;
    }

    .hero-banner {
      position: relative;
      width: 100%;
      max-height: 400px;
      overflow: hidden;
}

.hero-banner img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.hero-banner .banner-logo {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);  /* centers it on the banner */
  width: 200px;                      /* adjust to taste */
  height: auto;
}
  </style>
</head>
<body>
  <header class=\"site-header\">
    <div class=\"nav-inner\">
      <nav class=\"main-nav\">
        <a href=\"index.html\" class=\"active\" aria-current=\"page\">Home</a>
        <a href=\"inventory.html\">Inventory</a>
        <a href=\"cart.html\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
        <a href=\"login.html\">Login</a>
        <a href=\"create.html\">Create Your Own</a>
        <a href=\"about-us.html\">About Us!</a>
      </nav>
    </div>

 </header>
<div class=\"hero-banner\">
  <img src=\"images-for-website/cookieforbackgroundmeow.avif\" alt=\"mister white yo\" />
  <img src=\"images-for-website/cookie-time-cookie-logo.png\" alt=\"IM DA DWIFTA\" class=\"banner-logo\" />
</div>
  <div id=\"modeToggle\">
    <button id=\"themeToggle\">Dark Mode</button>
  </div>

  <main>
    

    <section class=\"announcements\">
    </section>

<audio id=\"bg\" src=\"audio/bakery.mp3\" loop preload=\"auto\"></audio>
<button id=\"mute-btn\" type=\"button\" aria-label=\"Mute music\">🔊</button>

<script>
  const bg = document.getElementById(\x27bg\x27);
  bg.volume = 0.4; // optional: background music shouldn\x27t be loud

  const events = [\x27pointerdown\x27, \x27click\x27, \x27keydown\x27, \x27touchend\x27];

  function start() {
    bg.play()
      .then(() => {
        // Only stop listening once playback actually started
        events.forEach(e => document.removeEventListener(e, start));
      })
      .catch(err => {
        // Blocked or failed: keep the listeners so the next tap/click retries
        console.warn(\x27Audio could not start yet:\x27, err);
      });
  }
  const muteBtn = document.getElementById(\x27mute-btn\x27);

muteBtn.addEventListener(\x27click\x27, (e) => {
  e.stopPropagation(); // don\x27t let this click also trigger start()
  bg.muted = !bg.muted;
  muteBtn.textContent = bg.muted ? \x27🔇\x27 : \x27🔊\x27;
  muteBtn.setAttribute(\x27aria-label\x27, bg.muted ? \x27Unmute music\x27 : \x27Mute music\x27);
});

  events.forEach(e => document.addEventListener(e, start));
</script>
    <section class=\"highlights\">
      <h2>Featured Items</h2>

      <div class=\"card-grid\">

        <div class=\"image-counter-card\" data-id=\"choco-mountain\" data-name=\"Choco Mountain\" data-price=\"3.50\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbakewithshivesh.com%2Fwp-content%2Fuploads%2F2020%2F05%2F151F814A-2749-4978-BA53-3AD2A962C933-scaled.jpg&f=1&nofb=1&ipt=fd4bddd16a29d46bfd11e9d93fb13b002a94f1f3ac3905ec48e6e902d98a0e93\" alt=\"WE NEED TO COOK!\">
          <div class=\"bottom-left\">Choco Mountain</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count1\x27)\">−</button>
            <span id=\"count1\">0</span>
            <button onclick=\"inc(\x27count1\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count1\x27)\">Add to Cart</button>
        </div>

        <div class=\"image-counter-card\" data-id=\"sweet-sweet-canyon\" data-name=\"Sweet Sweet Canyon\" data-price=\"2.50\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbellyfull.net%2Fwp-content%2Fuploads%2F2025%2F02%2FSugar-Cookies-hero-1.jpg&f=1&nofb=1&ipt=d2836a14c2e40496aa96858c00c7fbcf72ac28a968b205a3f971c42e61227203\" alt=\"R.I.P Dolly Parton\">
          <div class=\"bottom-left\">Sweet Sweet Canyon</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count2\x27)\">−</button>
            <span id=\"count2\">0</span>
            <button onclick=\"inc(\x27count2\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count2\x27)\">Add to Cart</button>
        </div>

         <div class=\"image-counter-card\" data-id=\"pumpkin-pinball\" data-name=\"Pumpkin Pinball\" data-price=\"3.00\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwearerecipes.com%2Fwp-content%2Fuploads%2F2025%2F09%2Fpumpkin-cookies-1.webp&f=1&nofb=1&ipt=070717642ada13dddce7c3ff9a2d9923171204860fa6c36f31017b31d5135ce7&ipo=images\" alt=\"MR WHITE! IM TIRED YO!\">
          <div class=\"bottom-left\">Pumpkin Pinball</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count3\x27)\">−</button>
            <span id=\"count3\">0</span>
            <button onclick=\"inc(\x27count3\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count3\x27)\">Add to Cart</button>
        </div>

        <div class=\"image-counter-card\" data-id=\"rainbow-road\" data-name=\"Rainbow Road\" data-price=\"4.00\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbeyondfrosting.com%2Fwp-content%2Fuploads%2F2022%2F04%2FRainbow-Sugar-Cookies-2161-2.jpg&f=1&nofb=1&ipt=28845a5526de4068839f43a929cc79b67406a5a163af564b334df754d46a5c59&ipo=images\" alt=\"Mrrr Chrima\">
          <div class=\"bottom-left\">Rainbow Road</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count4\x27)\">−</button>
            <span id=\"count4\">0</span>
            <button onclick=\"inc(\x27count4\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count4\x27)\">Add to Cart</button>
        </div>

        <div class=\"image-counter-card\" data-id=\"macaroon-beach\" data-name=\"Macaroon Beach\" data-price=\"3.75\">
          <img src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.jordanwinery.com%2Fwp-content%2Fuploads%2F2020%2F04%2FFrench-Macaron-Cookie-Recipe-WebHero-6435.jpg&f=1&nofb=1&ipt=b63971ffca0730e5af8b8000919f0029a95e78b5e184ca28e1ac2f65ea1b9198&ipo=images\" alt=\"Yur mum\">
          <div class=\"bottom-left\">Macaroon Beach</div>
          <div class=\"counter-overlay\">
            <button onclick=\"dec(\x27count5\x27)\">−</button>
            <span id=\"count5\">0</span>
            <button onclick=\"inc(\x27count5\x27)\">+</button>
          </div>
          <button class=\"bottom-right\" class=\"add-to-cart\" onclick=\"addFeaturedToCart(this, \x27count5\x27)\">Add to Cart</button>
        </div>

      </div>
    </section>
  </main>

  <footer class=\"site-footer\">
    <p>&copy; 2026 Cookie Time Cookie</p>
  </footer>

  <script src=\"js/app.js\"></script>
  <script src=\"js/cart.js\"></script>
  <script>
    const counts = {};

    function inc(id) {
      counts[id] = (counts[id] || 0) + 1;
      document.getElementById(id).textContent = counts[id];
    }

    function dec(id) {
      counts[id] = Math.max((counts[id] || 0) - 1, 0);
      document.getElementById(id).textContent = counts[id];
    }

    // Adds a featured item to the same cart the cart and checkout pages use
    // (getCartItems / saveCartItems / updateCartCountBadge come from cart.js and app.js)
    function addFeaturedToCart(btn, countId) {
      const qty = counts[countId] || 0;
      if (qty === 0) return; // nothing selected

      const card = btn.closest(\x27.image-counter-card\x27);
      const { id, name, price } = card.dataset;
      const unitPrice = parseFloat(price);

      const items = getCartItems();
      const existing = items.find(item => item.cartLineId === id);

      if (existing) {
        existing.qty += qty;
      } else {
        items.push({
          cartLineId: id,
          productId: id,
          name,
          basePrice: unitPrice,
          selectedOptions: [],
          unitPrice,
          qty,
          image: card.querySelector(\x27img\x27).src
        });
      }

      saveCartItems(items);
      updateCartCountBadge();

      // reset the counter
      counts[countId] = 0;
      document.getElementById(countId).textContent = 0;
    }
  </script>
</body>
</html>", "home/index.html.twig", "C:\\Users\\madee\\cmps2940-midterm-1\\templates\\home\\index.html.twig");
    }
}
