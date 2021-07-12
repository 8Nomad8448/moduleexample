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
";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/drupal.dialog.ajax"), "html", null, true));
        echo "

<div class=\"row\">
  <h5>";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["markup"] ?? null), 5, $this->source), "html", null, true));
        echo "</h5>
  <div class=\"col-12\">
    ";
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 7, $this->source), "html", null, true));
        echo "
  </div>
</div>
  ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 11
            echo "  <div class=\"dboutput_wrapper row\">
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats_image\">
      <a href=\"";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 13), 13, $this->source), "html", null, true));
            echo "\" target=\"_blank\">
        <img src='";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 14), 14, $this->source), "html", null, true));
            echo "' alt=\"Photo of a cat, that takes a part in pets competition event\">
      </a>
    </div>
    <div class=\"col-lg-6 col-md-12 col-sm-12 col-xs-12 cats\">
      <div>
        <p>";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pet name:")));
            echo "</p>
        <p class=\"cats_name\"> ";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, true, 20), 20, $this->source), "html", null, true));
            echo "</p>
        <br>
        <p>";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("User email:")));
            echo "</p>
        <p class=\"cats_email\"> ";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 23), 23, $this->source), "html", null, true));
            echo "</p>
        <br>
        <p>";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Created:")));
            echo "</p>
        <p class=\"cats_created\"> ";
            // line 26
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "created", [], "any", false, false, true, 26), 26, $this->source), "html", null, true));
            echo "</p>
        ";
            // line 27
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nodes"], "method", false, false, true, 27)) {
                // line 28
                echo "          <br>
          <span class=\"rm_btn\">
            <a href=\"/admin/nomadmodule/delete/";
                // line 30
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 30), 30, $this->source), "html", null, true));
                echo "?destination=";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["root"] ?? null), 30, $this->source), "html", null, true));
                echo "\" class=\"rm_button use-ajax\" data-dialog-type=\"modal\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("remove")));
                echo "</a>
            <a href=\"/admin/nomadmodule/update/";
                // line 31
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 31), 31, $this->source), "html", null, true));
                echo "?destination=";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["root"] ?? null), 31, $this->source), "html", null, true));
                echo "\" class=\"edit_button\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("edit")));
                echo "</a>
          </span>
        ";
            }
            // line 34
            echo "      </div>
    </div>
  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
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
        return array (  139 => 38,  130 => 34,  120 => 31,  112 => 30,  108 => 28,  106 => 27,  102 => 26,  98 => 25,  93 => 23,  89 => 22,  84 => 20,  80 => 19,  72 => 14,  68 => 13,  64 => 11,  60 => 10,  54 => 7,  49 => 5,  43 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ attach_library('nomadmodule/cats-style') }}
{{ attach_library('core/drupal.dialog.ajax') }}

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
        {% if user.hasPermission('administer nodes') %}
          <br>
          <span class=\"rm_btn\">
            <a href=\"/admin/nomadmodule/delete/{{ item.id }}?destination={{ root }}\" class=\"rm_button use-ajax\" data-dialog-type=\"modal\">{{ \"remove\"|trans }}</a>
            <a href=\"/admin/nomadmodule/update/{{ item.id }}?destination={{ root }}\" class=\"edit_button\">{{ \"edit\"|trans }}</a>
          </span>
        {% endif %}
      </div>
    </div>
  </div>
  {% endfor %}


", "modules/custom/nomadmodule/templates/nomadmodule-twig.html.twig", "/var/www/web/modules/custom/nomadmodule/templates/nomadmodule-twig.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 10, "if" => 27);
        static $filters = array("escape" => 1, "trans" => 19);
        static $functions = array("attach_library" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
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
