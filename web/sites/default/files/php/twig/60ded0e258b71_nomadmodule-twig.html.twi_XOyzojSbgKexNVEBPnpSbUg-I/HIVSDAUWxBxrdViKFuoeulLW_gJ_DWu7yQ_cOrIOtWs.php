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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("nomadmodule/cats-style"), "html", null, true));
        echo "

<div class=\"row\">
  <h5>";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["markup"] ?? null), 4, $this->source), "html", null, true));
        echo "</h5>
  <div class=\"col-12\">
    ";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 6, $this->source), "html", null, true));
        echo "
  </div>
</div>
  ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 10
            echo "  <div class=\"dboutput_wrapper row\">
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats_image\">
      <a href=\"";
            // line 12
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 12), 12, $this->source), "html", null, true));
            echo "\" target=\"_blank\">
        <img src='";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 13), 13, $this->source), "html", null, true));
            echo "' alt=\"Photo of a cat, that takes a part in pets competition event\">
      </a>
    </div>
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats\">
      <div>
        <p>";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pet name:")));
            echo "</p>
        <p class=\"cats_name\"> ";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, true, 19), 19, $this->source), "html", null, true));
            echo "</p>
        <br>
        <p>";
            // line 21
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("User email:")));
            echo "</p>
        <p class=\"cats_email\"> ";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 22), 22, $this->source), "html", null, true));
            echo "</p>
        <br>
        <p>";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Created:")));
            echo "</p>
        <p class=\"cats_created\"> ";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "created", [], "any", false, false, true, 25), 25, $this->source), "html", null, true));
            echo "</p>
      </div>
    </div>
  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
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
        return array (  109 => 30,  98 => 25,  94 => 24,  89 => 22,  85 => 21,  80 => 19,  76 => 18,  68 => 13,  64 => 12,  60 => 10,  56 => 9,  50 => 6,  45 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ attach_library('nomadmodule/cats-style') }}

<div class=\"row\">
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
        static $tags = array("for" => 9);
        static $filters = array("escape" => 1, "trans" => 18);
        static $functions = array("attach_library" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'trans'],
                ['attach_library']
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
