<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* front/headers/header.html.twig */
class __TwigTemplate_4714053891f4a19b9f7d37452205dae66501471c749d657b9662162194b50f67 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/headers/header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/headers/header.html.twig"));

        // line 1
        echo "<header class=\"header-wrapper header-dark\">
    <div class=\"main-header\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-12 col-md-2\">
                    <a href=\"";
        // line 6
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("index");
        echo "\" class=\"logo\"></a>
                </div>
                <div class=\"col-sm-12 col-md-10\">
                    <nav class=\"navbar-right\">
                        <ul class=\"menu\">

                            <li class=\"toggle-menu\"> <i class=\"fa icon_menu\"></i></li>

                            <li class=\"first\">
                                <a href=\"";
        // line 15
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("index");
        echo "\">Home</a>

                            </li>
                            <li>
                                <a href=\"#\">Shop</a>
                                <ul class=\"submenu\">

                                    <li><a href=\"";
        // line 22
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("shop_product");
        echo "\">Product </a></li>
                                    <li><a href=\"";
        // line 23
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("shop_account");
        echo "\">Account</a></li>
                                    <li><a href=\"";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("shop_cart");
        echo "\">Cart</a></li>
                                    <li><a href=\"";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("pricing");
        echo "\">Pricing</a></li>

                                    <li><a href=\"shop_checkout.html\">Checkout</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "front/headers/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  73 => 24,  69 => 23,  65 => 22,  55 => 15,  43 => 6,  36 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<header class=\"header-wrapper header-dark\">
    <div class=\"main-header\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-12 col-md-2\">
                    <a href=\"{{ path('index') }}\" class=\"logo\"></a>
                </div>
                <div class=\"col-sm-12 col-md-10\">
                    <nav class=\"navbar-right\">
                        <ul class=\"menu\">

                            <li class=\"toggle-menu\"> <i class=\"fa icon_menu\"></i></li>

                            <li class=\"first\">
                                <a href=\"{{ path('index') }}\">Home</a>

                            </li>
                            <li>
                                <a href=\"#\">Shop</a>
                                <ul class=\"submenu\">

                                    <li><a href=\"{{ path('shop_product') }}\">Product </a></li>
                                    <li><a href=\"{{ path('shop_account') }}\">Account</a></li>
                                    <li><a href=\"{{ path('shop_cart') }}\">Cart</a></li>
                                    <li><a href=\"{{ path('pricing') }}\">Pricing</a></li>

                                    <li><a href=\"shop_checkout.html\">Checkout</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>", "front/headers/header.html.twig", "C:\\wamp64\\www\\redpoint\\app\\Resources\\views\\front\\headers\\header.html.twig");
    }
}
