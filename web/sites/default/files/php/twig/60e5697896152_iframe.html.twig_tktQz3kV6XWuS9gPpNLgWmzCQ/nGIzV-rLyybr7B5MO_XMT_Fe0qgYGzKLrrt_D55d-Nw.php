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

/* modules/contrib/iframe/templates/iframe.html.twig */
class __TwigTemplate_2e1374524b3b785890b68d2494b0395cf84f9ee6745b7d57bc12c08e83e988a9 extends \Twig\Template
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
        // line 13
        echo "<div";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "class", [], "any", false, false, true, 13))) {
            echo " class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "class", [], "any", false, false, true, 13), 13, $this->source), "html", null, true));
            echo "\"";
        }
        echo ">
  ";
        // line 14
        if ( !twig_test_empty(($context["text"] ?? null))) {
            // line 15
            echo "    <h3 class=\"iframe_title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 15, $this->source), "html", null, true));
            echo "</h3>
  ";
        }
        // line 17
        echo "  <style type=\"text/css\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["style"] ?? null), 17, $this->source)));
        echo "</style>
  <iframe ";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 18, $this->source), "html", null, true));
        echo ">
    ";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Your browser does not support iframes, but you can visit <a href=\":url\">@text</a>", [":url" => ($context["src"] ?? null), "@text" => ($context["text"] ?? null)])));
        echo "
  </iframe>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/iframe/templates/iframe.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 19,  61 => 18,  56 => 17,  50 => 15,  48 => 14,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
* @file
* Default theme implementation to display an iframe field.
*
* Available variables:
* - src: Url being loaded into the iframe.
* - attributes: An array of HTML attributes, intended to be added to the iframe tag.
* - text: Title text.
* - style: style Block
*/
#}
<div{% if attributes.class is not empty %} class=\"{{ attributes.class }}\"{% endif %}>
  {% if text is not empty %}
    <h3 class=\"iframe_title\">{{ text }}</h3>
  {% endif %}
  <style type=\"text/css\">{{ style|raw }}</style>
  <iframe {{ attributes }}>
    {{ 'Your browser does not support iframes, but you can visit <a href=\":url\">@text</a>'|t({ ':url': src, '@text': text }) }}
  </iframe>
</div>
", "modules/contrib/iframe/templates/iframe.html.twig", "/var/www/web/modules/contrib/iframe/templates/iframe.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 13);
        static $filters = array("escape" => 13, "raw" => 17, "t" => 19);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'raw', 't'],
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
