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

/* create/index.html.twig */
class __TwigTemplate_4d35a54e4051cfeb82af95e36f18773f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "create/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "create/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Customize Your Order | Cookie Time Cookie</title>
  <link rel=\"stylesheet\" href=\"css/styles.css\">
  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link href=\"https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">
</head>
<body>

  <header class=\"site-header\">
    <div class=\"nav-inner\">
   
     
<nav class=\"main-nav\">
    <a href=\"";
        // line 18
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Home</a>
    <a href=\"";
        // line 19
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("inventory");
        yield "\">Inventory</a>
    <a href=\"";
        // line 20
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart");
        yield "\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
    <a href=\"";
        // line 21
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        yield "\">Login</a>
    <a href=\"";
        // line 22
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("create");
        yield "\">Create Your Own</a>
    <a href=\"";
        // line 23
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("about_us");
        yield "\" class=\"active\" aria-current=\"page\">About Us!</a>
</nav>

    </div>
  </header>

  <div id=\"modeToggle\">
    <button id=\"themeToggle\">Dark Mode</button>
  </div>
  
  <main class=\"create-page\">
    <section class=\"page-intro\">
      <h1>Build Your Order</h1>
      <p>Pick an item below, choose your toppings, and add it to your cart.</p>
    </section>

   
        <section class=\"product-carousel-wrapper\" aria-label=\"Choose an item to customize\">
      <button type=\"button\" class=\"carousel-btn prev-btn\" id=\"product-carousel-prev\" aria-label=\"Previous item\">&#10094;</button>
      <div class=\"product-carousel-track\" id=\"product-carousel-track\"></div>
      <button type=\"button\" class=\"carousel-btn next-btn\" id=\"product-carousel-next\" aria-label=\"Next item\">&#10095;</button>
    </section>

    <section id=\"customizer-panel\" class=\"customizer-panel\" aria-live=\"polite\">
      <!-- Populated by js/create.js based on the selected product -->
    </section>
  </main>

  <footer class=\"site-footer\">
    <p>&copy; 2026 Cookie Time Cookie</p>
  </footer>

  <!-- catalog.js is deliberately NOT loaded here — it assumes #product-grid
       exists and has no null-guard, so it would throw on this page. -->
  <script src=\"js/app.js\"></script>
  <script src=\"js/cart.js\"></script>
  <script src=\"js/create.js\"></script>
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
        return "create/index.html.twig";
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
        return array (  89 => 23,  85 => 22,  81 => 21,  77 => 20,  73 => 19,  69 => 18,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Customize Your Order | Cookie Time Cookie</title>
  <link rel=\"stylesheet\" href=\"css/styles.css\">
  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link href=\"https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">
</head>
<body>

  <header class=\"site-header\">
    <div class=\"nav-inner\">
   
     
<nav class=\"main-nav\">
    <a href=\"{{ path(\x27home\x27) }}\">Home</a>
    <a href=\"{{ path(\x27inventory\x27) }}\">Inventory</a>
    <a href=\"{{ path(\x27cart\x27) }}\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
    <a href=\"{{ path(\x27login\x27) }}\">Login</a>
    <a href=\"{{ path(\x27create\x27) }}\">Create Your Own</a>
    <a href=\"{{ path(\x27about_us\x27) }}\" class=\"active\" aria-current=\"page\">About Us!</a>
</nav>

    </div>
  </header>

  <div id=\"modeToggle\">
    <button id=\"themeToggle\">Dark Mode</button>
  </div>
  
  <main class=\"create-page\">
    <section class=\"page-intro\">
      <h1>Build Your Order</h1>
      <p>Pick an item below, choose your toppings, and add it to your cart.</p>
    </section>

   
        <section class=\"product-carousel-wrapper\" aria-label=\"Choose an item to customize\">
      <button type=\"button\" class=\"carousel-btn prev-btn\" id=\"product-carousel-prev\" aria-label=\"Previous item\">&#10094;</button>
      <div class=\"product-carousel-track\" id=\"product-carousel-track\"></div>
      <button type=\"button\" class=\"carousel-btn next-btn\" id=\"product-carousel-next\" aria-label=\"Next item\">&#10095;</button>
    </section>

    <section id=\"customizer-panel\" class=\"customizer-panel\" aria-live=\"polite\">
      <!-- Populated by js/create.js based on the selected product -->
    </section>
  </main>

  <footer class=\"site-footer\">
    <p>&copy; 2026 Cookie Time Cookie</p>
  </footer>

  <!-- catalog.js is deliberately NOT loaded here — it assumes #product-grid
       exists and has no null-guard, so it would throw on this page. -->
  <script src=\"js/app.js\"></script>
  <script src=\"js/cart.js\"></script>
  <script src=\"js/create.js\"></script>
</body>
</html>", "create/index.html.twig", "C:\\Users\\madee\\cmps2940-midterm-1\\templates\\create\\index.html.twig");
    }
}
