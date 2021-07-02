<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/nomadmodule/templates/nomadmodule-twig.html.twig */
class __TwigTemplate_d334e385f0032bc54c56fd94c3be662cfcbc73435b97de922e1b5d0e862d41df extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"row\">
  <h5>";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["markup"] ?? null), 2, $this->source), "html", null, true));
        echo "</h5>
  <div class=\"col-12\">
    ";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 4, $this->source), "html", null, true));
        echo "
  </div>
</div>
  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 8
            echo "  <div class=\"dboutput_wrapper row\">
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats_image\">
      <a href=\"";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 10), 10, $this->source), "html", null, true));
            echo "\" target=\"_blank\">
        <img src='";
            // line 11
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 11), 11, $this->source), "html", null, true));
            echo "' alt=\"Photo of a cat, that takes a part in pets competition event\">
      </a>
    </div>
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats\">
      <div>
        <p>";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pet name:")));
            echo "</p>
        <p class=\"cats_name\"> ";
            // line 17
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, true, 17), 17, $this->source), "html", null, true));
            echo "</p>
        <br>
        <p>";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("User email:")));
            echo "</p>
        <p class=\"cats_email\"> ";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 20), 20, $this->source), "html", null, true));
            echo "</p>
        <br>
        <p>";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Created:")));
            echo "</p>
        <p class=\"cats_created\"> ";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "created", [], "any", false, false, true, 23), 23, $this->source), "html", null, true));
            echo "</p>
      </div>
    </div>
  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "

";
    }

    public function getTemplateName()
    {
        return "modules/custom/nomadmodule/templates/nomadmodule-twig.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 28,  95 => 23,  91 => 22,  86 => 20,  82 => 19,  77 => 17,  73 => 16,  65 => 11,  61 => 10,  57 => 8,  53 => 7,  47 => 4,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"row\">
  <h5>{{ markup }}</h5>
  <div class=\"col-12\">
    {{ form }}
  </div>
</div>
  {% for item in items %}
  <div class=\"dboutput_wrapper row\">
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats_image\">
      <a href=\"{{ item.image }}\" target=\"_blank\">
        <img src='{{ item.image }}' alt=\"Photo of a cat, that takes a part in pets competition event\">
      </a>
    </div>
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats\">
      <div>
        <p>{{ \"Pet name:\"|trans }}</p>
        <p class=\"cats_name\"> {{ item.name }}</p>
        <br>
        <p>{{ \"User email:\"|trans }}</p>
        <p class=\"cats_email\"> {{ item.email }}</p>
        <br>
        <p>{{ \"Created:\"|trans }}</p>
        <p class=\"cats_created\"> {{ item.created }}</p>
      </div>
    </div>
  </div>
  {% endfor %}


", "modules/custom/nomadmodule/templates/nomadmodule-twig.html.twig", "/var/www/web/modules/custom/nomadmodule/templates/nomadmodule-twig.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 7);
        static $filters = array("escape" => 2, "trans" => 16);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'trans'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
