<?php

/* main.tmpl */
class __TwigTemplate_8ae9b2a2dd639251b803851059658629 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<article>
 <h1>";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["h1"]) ? $context["h1"] : null), "html", null, true);
        echo "</h1>

 <div>
";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["photos"]) ? $context["photos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
            // line 6
            echo "  <a href=\"./?p=photo&i=";
            echo twig_escape_filter($this->env, (isset($context["photo"]) ? $context["photo"] : null), "html", null, true);
            echo "\">
   <img src=\"";
            // line 7
            echo twig_escape_filter($this->env, (isset($context["photosDir"]) ? $context["photosDir"] : null), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["photo"]) ? $context["photo"] : null), "html", null, true);
            echo "\">
  </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 10
        echo " </div>
</article>
";
    }

    public function getTemplateName()
    {
        return "main.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 10,  35 => 7,  30 => 6,  26 => 5,  20 => 2,  17 => 1,);
    }
}
