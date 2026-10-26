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
class __TwigTemplate_6726e396cd26047ce1025a53381394f3 extends Template
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
        yield "\">Inventory</a>
        <a href=\"cart.html\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
        <a href=\"login.html\">Login</a>
        <a href=\"create.html\">Create Your Own</a>
        <a href=\"about-us.html\">About Us!</a>
      </nav>
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
        return array (  75 => 21,  71 => 20,  50 => 1,);
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
        <a href=\"{{ path(\x27inventory\x27) }}\">Inventory</a>
        <a href=\"cart.html\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
        <a href=\"login.html\">Login</a>
        <a href=\"create.html\">Create Your Own</a>
        <a href=\"about-us.html\">About Us!</a>
      </nav>
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
</html>", "inventory/index.html.twig", "C:\\Users\\madee\\cmps2940-midterm-1\\templates\\inventory\\index.html.twig");
    }
}
