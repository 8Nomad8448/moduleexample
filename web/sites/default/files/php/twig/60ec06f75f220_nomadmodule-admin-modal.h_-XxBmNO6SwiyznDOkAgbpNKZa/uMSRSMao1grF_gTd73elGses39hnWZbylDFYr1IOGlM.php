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

/* modules/custom/nomadmodule/templates/nomadmodule-admin-modal.html.twig */
class __TwigTemplate_c28a634d4ed3ee85bcd6afc63a89e5794273ff8c52a9d03a849a3ef197da866b extends \Twig\Template
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

<!-- The Modal -->
<div id=\"myModal\" class=\"modal\">
  <!-- Modal content -->
  <div class=\"modal-content\">
    <h3>You sure you want to delete this member<span class=\"close\">&times;</span></h3>
    <p>This action cannot be undone..</p>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/nomadmodule/templates/nomadmodule-admin-modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ attach_library('nomadmodule/cats-style') }}
{{ attach_library('core/drupal.dialog.ajax') }}

<!-- The Modal -->
<div id=\"myModal\" class=\"modal\">
  <!-- Modal content -->
  <div class=\"modal-content\">
    <h3>You sure you want to delete this member<span class=\"close\">&times;</span></h3>
    <p>This action cannot be undone..</p>
  </div>
</div>
", "modules/custom/nomadmodule/templates/nomadmodule-admin-modal.html.twig", "/var/www/web/modules/custom/nomadmodule/templates/nomadmodule-admin-modal.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 1);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
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
