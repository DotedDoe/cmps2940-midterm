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

/* inventory/index.html.twig */
class __TwigTemplate_56a4ec4b518b14c8d13240f874a07477 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "inventory/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "inventory/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
<meta charset=\"UTF-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
<title>Inventory — Cookie Time Cookie</title>

<link rel=\"stylesheet\" href=\"/css/styles.css\">

<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link href=\"https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">
</head>
<body>

  
  <header class=\"site-header\">
  <div class=\"nav-inner\">

    <nav class=\"main-nav\">
      <a href=\"";
        // line 20
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Home</a>
      <a href=\"";
        // line 21
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("inventory");
        yield "\" class=\"active\" aria-current=\"page\">Inventory</a>
      <a href=\"";
        // line 22
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("create");
        yield "\">Create Your Own</a>
      <a href=\"";
        // line 23
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("about_us");
        yield "\">About Us!</a>
    </nav>

    <div class=\"nav-icons\">
      <a href=\"";
        // line 27
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart");
        yield "\" class=\"nav-icon\" aria-label=\"Cart\" title=\"Cart\">
        <svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\"
             stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" aria-hidden=\"true\">
          <circle cx=\"9\" cy=\"21\" r=\"1\"/><circle cx=\"20\" cy=\"21\" r=\"1\"/>
          <path d=\"M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.95-1.56L23 6H6\"/>
        </svg>
        <span id=\"cart-count\" class=\"cart-count\">0</span>
      </a>
      <a href=\"";
        // line 35
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        yield "\" class=\"nav-icon\" aria-label=\"Login\" title=\"Login\">
        <svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\"
             stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" aria-hidden=\"true\">
          <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/><circle cx=\"12\" cy=\"7\" r=\"4\"/>
        </svg>
      </a>
    </div>

  </div>
</header>

<div id=\"modeToggle\">
<button id=\"themeToggle\">Dark Mode</button>
</div>

<main class=\"inventory-page\">

<section class=\"page-intro\">
<h1>Our Bakery Case</h1>
<p>Everything we bake today, fresh from the oven. Items marked
<strong>Customizable</strong> can be built your way.</p>
</section>

<section class=\"catalog-controls\">
<input
type=\"search\"
id=\"search-input\"
placeholder=\"Search the case… (e.g. brownie, sourdough)\"
aria-label=\"Search inventory\">

<div class=\"filter-chips\" role=\"group\" aria-label=\"Filter by category\">
<button class=\"filter-chip active\" data-category=\"all\">All</button>
<button class=\"filter-chip\" data-category=\"cookies\">Cookies</button>
<button class=\"filter-chip\" data-category=\"brownies\">Brownies</button>
<button class=\"filter-chip\" data-category=\"cakes\">Cakes</button>
<button class=\"filter-chip\" data-category=\"breads\">Breads</button>
</div>
</section>

<section id=\"product-grid\" class=\"product-grid\" aria-live=\"polite\">
</section>

<p id=\"no-results\" class=\"no-results\" hidden>
      Nothing in the case matches that search. Try a different term or
      clear the filter.
</p>



    <!-- The Bundle Modal (Hidden by default) -->
<div id=\"bundleModal\" class=\"modal-overlay\">
  <div class=\"modal-content\">
    <h3>Complete Your Bundle!</h3>
    <p>Do you want to add the matching accessory bundle at a special discount?</p>
    
    <div class=\"bundle-actions\">
      <button id=\"addBundleBtn\" class=\"btn btn-primary\">Yes, Add Bundle</button>
      <button id=\"skipBundleBtn\" class=\"btn btn-secondary\">No Thanks</button>
    </div>
  </div>
</div>

  </main>


<dialog id=\"product-modal\" class=\"product-modal\">
<button id=\"modal-close\" class=\"modal-close\" aria-label=\"Close\">&times;</button>
<img id=\"modal-image\" src=\"\" alt=\"\">
<div class=\"modal-body\">
<h2 id=\"modal-name\"></h2>
<p id=\"modal-price\" class=\"modal-price\"></p>
<p id=\"modal-description\"></p>

<h3>Nutrition Facts</h3>
<table id=\"modal-nutrition\" class=\"nutrition-table\">
</table>
<p id=\"modal-allergens\" class=\"modal-allergens\"></p>

<div id=\"modal-action\"></div>
</div>
</dialog>

<footer class=\"site-footer\">
<p>&copy; 2026 Cookie Time Cookie</p>
</footer>

<script src=\"/js/app.js\"></script>
<script src=\"/js/cart.js\"></script>
<script src=\"/js/catalog.js\"></script>
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
        return "inventory/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
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
        return array (  101 => 35,  90 => 27,  83 => 23,  79 => 22,  75 => 21,  71 => 20,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
<meta charset=\"UTF-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
<title>Inventory — Cookie Time Cookie</title>

<link rel=\"stylesheet\" href=\"/css/styles.css\">

<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link href=\"https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">
</head>
<body>

  
  <header class=\"site-header\">
  <div class=\"nav-inner\">

    <nav class=\"main-nav\">
      <a href=\"{{ path(\x27home\x27) }}\">Home</a>
      <a href=\"{{ path(\x27inventory\x27) }}\" class=\"active\" aria-current=\"page\">Inventory</a>
      <a href=\"{{ path(\x27create\x27) }}\">Create Your Own</a>
      <a href=\"{{ path(\x27about_us\x27) }}\">About Us!</a>
    </nav>

    <div class=\"nav-icons\">
      <a href=\"{{ path(\x27cart\x27) }}\" class=\"nav-icon\" aria-label=\"Cart\" title=\"Cart\">
        <svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\"
             stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" aria-hidden=\"true\">
          <circle cx=\"9\" cy=\"21\" r=\"1\"/><circle cx=\"20\" cy=\"21\" r=\"1\"/>
          <path d=\"M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 1.95-1.56L23 6H6\"/>
        </svg>
        <span id=\"cart-count\" class=\"cart-count\">0</span>
      </a>
      <a href=\"{{ path(\x27login\x27) }}\" class=\"nav-icon\" aria-label=\"Login\" title=\"Login\">
        <svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\"
             stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" aria-hidden=\"true\">
          <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/><circle cx=\"12\" cy=\"7\" r=\"4\"/>
        </svg>
      </a>
    </div>

  </div>
</header>

<div id=\"modeToggle\">
<button id=\"themeToggle\">Dark Mode</button>
</div>

<main class=\"inventory-page\">

<section class=\"page-intro\">
<h1>Our Bakery Case</h1>
<p>Everything we bake today, fresh from the oven. Items marked
<strong>Customizable</strong> can be built your way.</p>
</section>

<section class=\"catalog-controls\">
<input
type=\"search\"
id=\"search-input\"
placeholder=\"Search the case… (e.g. brownie, sourdough)\"
aria-label=\"Search inventory\">

<div class=\"filter-chips\" role=\"group\" aria-label=\"Filter by category\">
<button class=\"filter-chip active\" data-category=\"all\">All</button>
<button class=\"filter-chip\" data-category=\"cookies\">Cookies</button>
<button class=\"filter-chip\" data-category=\"brownies\">Brownies</button>
<button class=\"filter-chip\" data-category=\"cakes\">Cakes</button>
<button class=\"filter-chip\" data-category=\"breads\">Breads</button>
</div>
</section>

<section id=\"product-grid\" class=\"product-grid\" aria-live=\"polite\">
</section>

<p id=\"no-results\" class=\"no-results\" hidden>
      Nothing in the case matches that search. Try a different term or
      clear the filter.
</p>



    <!-- The Bundle Modal (Hidden by default) -->
<div id=\"bundleModal\" class=\"modal-overlay\">
  <div class=\"modal-content\">
    <h3>Complete Your Bundle!</h3>
    <p>Do you want to add the matching accessory bundle at a special discount?</p>
    
    <div class=\"bundle-actions\">
      <button id=\"addBundleBtn\" class=\"btn btn-primary\">Yes, Add Bundle</button>
      <button id=\"skipBundleBtn\" class=\"btn btn-secondary\">No Thanks</button>
    </div>
  </div>
</div>

  </main>


<dialog id=\"product-modal\" class=\"product-modal\">
<button id=\"modal-close\" class=\"modal-close\" aria-label=\"Close\">&times;</button>
<img id=\"modal-image\" src=\"\" alt=\"\">
<div class=\"modal-body\">
<h2 id=\"modal-name\"></h2>
<p id=\"modal-price\" class=\"modal-price\"></p>
<p id=\"modal-description\"></p>

<h3>Nutrition Facts</h3>
<table id=\"modal-nutrition\" class=\"nutrition-table\">
</table>
<p id=\"modal-allergens\" class=\"modal-allergens\"></p>

<div id=\"modal-action\"></div>
</div>
</dialog>

<footer class=\"site-footer\">
<p>&copy; 2026 Cookie Time Cookie</p>
</footer>

<script src=\"/js/app.js\"></script>
<script src=\"/js/cart.js\"></script>
<script src=\"/js/catalog.js\"></script>
</body>
</html>", "inventory/index.html.twig", "/home/isme/Projects/cmps2940-midterm/templates/inventory/index.html.twig");
    }
}
