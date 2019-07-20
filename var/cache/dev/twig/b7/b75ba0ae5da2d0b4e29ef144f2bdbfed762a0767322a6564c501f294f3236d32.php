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

/* front/footers/footer.html.twig */
class __TwigTemplate_42b9a829488949e1820e20826dd148b595ab49404eac0ad54936c3f8aee806ad extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/footers/footer.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/footers/footer.html.twig"));

        // line 1
        echo "<footer class=\"footer-wrapper footer-bg\">
    <div class=\"container\">
        <div class=\"row col-p30\">
            <div class=\"col-sm-12 col-md-4\">
                <div class=\"footer-widget\">
                    <h3 class=\"footer-title\">Palas</h3>
                    <ul class=\"footer-links clearfix\">
                        <li><a href=\"#\">Home</a></li>
                        <li><a href=\"#\">Contact</a></li>
                        <li><a href=\"#\">Privacy Policy</a></li>
                        <li><a href=\"#\">Services</a></li>
                        <li><a href=\"#\">Terms</a></li>
                        <li><a href=\"#\">Security</a></li>
                        <li><a href=\"#\">Pricing</a></li>
                        <li><a href=\"#\">Features</a></li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-12 col-md-4\">
                <div class=\"footer-widget\">
                    <h3 class=\"footer-title\">Get social</h3>
                    <ul class=\"footer-social clearfix\">
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Twitter\"><i class=\"fa fa-twitter\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Facebook\"><i class=\"fa fa-facebook\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Google Plus\"><i class=\"fa fa-google-plus\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Pinterest\"><i class=\"fa fa-pinterest\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Instagram\"><i class=\"fa fa-instagram\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Dribbble\"><i class=\"fa fa-dribbble\"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-12 col-md-4\">
                <div class=\"footer-widget\">
                    <h3 class=\"footer-title\">Tweets</h3>

                    <div class=\"sidebar-tweet clearfix\">
                        <i class=\"fa fa-twitter\"></i>
                        <p class=\"tweet-content\">
                            <a href=\"#\" class=\"tweet-user\">@abusinesstheme</a>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                            <small>22 hours ago</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-6 col-md-4 col-sm-push-6 col-md-push-4 xs-box\">

                <div id=\"mc_embed_signup\">

                    <form action=\"http://abusinesstheme.us10.list-manage.com/subscribe/post?u=dd23cb20d9d4dde851546bd9a&amp;id=8d7dbd85d4\" method=\"post\" id=\"mc-embedded-subscribe-form\" name=\"mc-embedded-subscribe-form\" target=\"_blank\" novalidate class=\"footer-subscribe\">
                        <div id=\"mc_embed_signup_scroll\">
                            <input type=\"email\" value=\"\" name=\"EMAIL\" id=\"mce-EMAIL\" required placeholder=\" Type email and hit enter\">

                            <div style=\"position: absolute; left: -5000px;\">
                                <input type=\"text\" name=\"b_111fbc1ae1a748cfb4ef9ac27_ac969aca2f\" tabindex=\"-1\" value=\"\">
                            </div>
                            <button type=\"submit\" name=\"subscribe\" id=\"mc-embedded-subscribe\" class=\"hidden\"></button>
                        </div>
                    </form>
                </div>

            </div>
           ";
        // line 68
        echo "        </div>
    </div>
</footer>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "front/footers/footer.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  102 => 68,  36 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<footer class=\"footer-wrapper footer-bg\">
    <div class=\"container\">
        <div class=\"row col-p30\">
            <div class=\"col-sm-12 col-md-4\">
                <div class=\"footer-widget\">
                    <h3 class=\"footer-title\">Palas</h3>
                    <ul class=\"footer-links clearfix\">
                        <li><a href=\"#\">Home</a></li>
                        <li><a href=\"#\">Contact</a></li>
                        <li><a href=\"#\">Privacy Policy</a></li>
                        <li><a href=\"#\">Services</a></li>
                        <li><a href=\"#\">Terms</a></li>
                        <li><a href=\"#\">Security</a></li>
                        <li><a href=\"#\">Pricing</a></li>
                        <li><a href=\"#\">Features</a></li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-12 col-md-4\">
                <div class=\"footer-widget\">
                    <h3 class=\"footer-title\">Get social</h3>
                    <ul class=\"footer-social clearfix\">
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Twitter\"><i class=\"fa fa-twitter\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Facebook\"><i class=\"fa fa-facebook\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Google Plus\"><i class=\"fa fa-google-plus\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Pinterest\"><i class=\"fa fa-pinterest\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Instagram\"><i class=\"fa fa-instagram\"></i></a></li>
                        <li><a href=\"#\" data-toggle=\"tooltip\" title=\"Dribbble\"><i class=\"fa fa-dribbble\"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class=\"col-sm-12 col-md-4\">
                <div class=\"footer-widget\">
                    <h3 class=\"footer-title\">Tweets</h3>

                    <div class=\"sidebar-tweet clearfix\">
                        <i class=\"fa fa-twitter\"></i>
                        <p class=\"tweet-content\">
                            <a href=\"#\" class=\"tweet-user\">@abusinesstheme</a>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                            <small>22 hours ago</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-6 col-md-4 col-sm-push-6 col-md-push-4 xs-box\">

                <div id=\"mc_embed_signup\">

                    <form action=\"http://abusinesstheme.us10.list-manage.com/subscribe/post?u=dd23cb20d9d4dde851546bd9a&amp;id=8d7dbd85d4\" method=\"post\" id=\"mc-embedded-subscribe-form\" name=\"mc-embedded-subscribe-form\" target=\"_blank\" novalidate class=\"footer-subscribe\">
                        <div id=\"mc_embed_signup_scroll\">
                            <input type=\"email\" value=\"\" name=\"EMAIL\" id=\"mce-EMAIL\" required placeholder=\" Type email and hit enter\">

                            <div style=\"position: absolute; left: -5000px;\">
                                <input type=\"text\" name=\"b_111fbc1ae1a748cfb4ef9ac27_ac969aca2f\" tabindex=\"-1\" value=\"\">
                            </div>
                            <button type=\"submit\" name=\"subscribe\" id=\"mc-embedded-subscribe\" class=\"hidden\"></button>
                        </div>
                    </form>
                </div>

            </div>
           {# <div class=\"col-sm-6 col-md-4 col-sm-pull-6 col-md-pull-4\">
                <p class=\"copyright\">&copy; Copyright 2010 - 2015 abusinesstheme</p>
            </div>#}
        </div>
    </div>
</footer>", "front/footers/footer.html.twig", "C:\\wamp64\\www\\redpoint\\app\\Resources\\views\\front\\footers\\footer.html.twig");
    }
}
