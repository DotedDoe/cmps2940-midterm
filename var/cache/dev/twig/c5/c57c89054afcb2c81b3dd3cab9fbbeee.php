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

/* about_us/index.html.twig */
class __TwigTemplate_49610d3372739faec90551007cc77f93 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "about_us/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "about_us/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>About Us! — Cookie Time Cookie</title>
  <link rel=\"stylesheet\" href=\"css/styles.css\">
  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link href=\"https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600&family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">
</head>
<body>
  <header class=\"site-header\">
  <div class=\"nav-inner\">

    <nav class=\"main-nav\">
      <a href=\"";
        // line 16
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        yield "\">Home</a>
      <a href=\"";
        // line 17
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("inventory");
        yield "\">Inventory</a>
      <a href=\"";
        // line 18
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("create");
        yield "\">Create Your Own</a>
      <a href=\"";
        // line 19
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("about_us");
        yield "\" class=\"active\" aria-current=\"page\">About Us!</a>
    </nav>

    <div class=\"nav-icons\">
      <a href=\"";
        // line 23
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
        // line 31
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
  </div>
    <div id=\"modeToggle\">
      <button id=\"themeToggle\">Dark Mode</button>
  </div>
      <section class=\"hero\">
      <h1>About Us!</h1>
      <p>We are an independent bakery that sells cookies in a homemade fashion. Baked fresh to order and not stored all day like other stores!</p>
      
    </section>

     <section class=\"contact-form\">
      <h2>Contact Us</h2>
      <form id=\"contact-form\" novalidate>
        <label for=\"name\">Name</label>
        <input type=\"text\" id=\"name\" name=\"name\" required>

        <label for=\"message\">Message</label>
        <textarea id=\"message\" name=\"message\" required></textarea>

        <button type=\"submit\">Send</button>
      </form>
    </section>










  <script src=\"/js/app.js\"></script>
  <script src=\"/js/cart.js\"></script>
  </body>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "about_us/index.html.twig";
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
        return array (  97 => 31,  86 => 23,  79 => 19,  75 => 18,  71 => 17,  67 => 16,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>About Us! — Cookie Time Cookie</title>
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
      <a href=\"{{ path(\x27create\x27) }}\">Create Your Own</a>
      <a href=\"{{ path(\x27about_us\x27) }}\" class=\"active\" aria-current=\"page\">About Us!</a>
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
  </div>
    <div id=\"modeToggle\">
      <button id=\"themeToggle\">Dark Mode</button>
  </div>
      <section class=\"hero\">
      <h1>About Us!</h1>
      <p>We are an independent bakery that sells cookies in a homemade fashion. Baked fresh to order and not stored all day like other stores!</p>
      
    </section>

     <section class=\"contact-form\">
      <h2>Contact Us</h2>
      <form id=\"contact-form\" novalidate>
        <label for=\"name\">Name</label>
        <input type=\"text\" id=\"name\" name=\"name\" required>

        <label for=\"message\">Message</label>
        <textarea id=\"message\" name=\"message\" required></textarea>

        <button type=\"submit\">Send</button>
      </form>
    </section>










  <script src=\"/js/app.js\"></script>
  <script src=\"/js/cart.js\"></script>
  </body>", "about_us/index.html.twig", "/home/isme/Projects/cmps2940-midterm/templates/about_us/index.html.twig");
    }
}
