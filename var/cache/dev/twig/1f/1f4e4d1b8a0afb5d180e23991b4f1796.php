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
class __TwigTemplate_a2f49ee7cc051c498aa1006d3e080e40 extends Template
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
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart");
        yield "\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
    <a href=\"";
        // line 19
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        yield "\">Login</a>
    <a href=\"";
        // line 20
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("create");
        yield "\">Create Your Own</a>
    <a href=\"";
        // line 21
        yield (string) $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("about_us");
        yield "\" class=\"active\" aria-current=\"page\">About Us!</a>
</nav>

      
    </div>
  </div>
  <div id=\"modeToggle\">
    <button id=\"themeToggle\">Dark Mode</button>
  </div>
  </header>
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
        return array (  87 => 21,  83 => 20,  79 => 19,  75 => 18,  71 => 17,  67 => 16,  50 => 1,);
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
    <a href=\"{{ path(\x27cart\x27) }}\">Cart <span id=\"cart-count\" class=\"cart-count\">0</span></a>
    <a href=\"{{ path(\x27login\x27) }}\">Login</a>
    <a href=\"{{ path(\x27create\x27) }}\">Create Your Own</a>
    <a href=\"{{ path(\x27about_us\x27) }}\" class=\"active\" aria-current=\"page\">About Us!</a>
</nav>

      
    </div>
  </div>
  <div id=\"modeToggle\">
    <button id=\"themeToggle\">Dark Mode</button>
  </div>
  </header>
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










    
  </body>", "about_us/index.html.twig", "C:\\Users\\madee\\cmps2940-midterm-1\\templates\\about_us\\index.html.twig");
    }
}
