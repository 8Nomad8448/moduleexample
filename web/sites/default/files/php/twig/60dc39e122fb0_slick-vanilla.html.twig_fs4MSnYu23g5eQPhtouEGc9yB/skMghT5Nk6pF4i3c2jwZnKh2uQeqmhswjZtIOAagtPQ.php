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

/* modules/contrib/slick/templates/slick-vanilla.html.twig */
class __TwigTemplate_e613c8a5b8d6c16c26e92e5ab805aeee3d782667a6e345ce3b95cd53caf5d589 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slick_vanilla' => [$this, 'block_slick_vanilla'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 19
        $context["classes"] = [0 => "slick__slide", 1 => "slide", 2 => ("slide--" . $this->sandbox->ensureToStringAllowed(        // line 22
($context["delta"] ?? null), 22, $this->source))];
        // line 25
        $this->displayBlock('slick_vanilla', $context, $blocks);
    }

    public function block_slick_vanilla($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "  <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 26), 26, $this->source), "html", null, true));
        echo ">
    ";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["item"] ?? null), 27, $this->source), "html", null, true));
        echo "
  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick-vanilla.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 27,  50 => 26,  43 => 25,  41 => 22,  40 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for the slick-vanilla item template.
 *
 * This is a vanilla alternative for slick-slide.html.twig where everything is
 * dumped as is into 'item'. Think of it as a raw individual item output.
 * Choosing vanilla means you are on your own, and want a more controlled item.
 *
 * Available variables:
 * - attributes: An array of attributes to apply to the element.
 * - item: A renderable array of the slide content.
 * - settings: An array containing the given settings.
 *
 * @see template_preprocess_slick_vanilla()
 */
#}
{%
  set classes = [
    'slick__slide',
    'slide',
    'slide--' ~ delta
  ]
%}
{% block slick_vanilla %}
  <div{{ attributes.addClass(classes) }}>
    {{ item }}
  </div>
{% endblock %}
", "modules/contrib/slick/templates/slick-vanilla.html.twig", "/var/www/web/modules/contrib/slick/templates/slick-vanilla.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 19, "block" => 25);
        static $filters = array("escape" => 26);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block'],
                ['escape'],
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
