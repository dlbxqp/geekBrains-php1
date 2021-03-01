<?php

/* photo.tmpl */
class __TwigTemplate_1eee585ccc2354daf85053c9ff6753a9 extends Twig_Template
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
        echo "<nav>
 <a href=\"./\">Вернуться на главную</a>
</nav>

<article>
 <h1>";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["h1"]) ? $context["h1"] : null), "html", null, true);
        echo "</h1>
 <img src=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["pathToPhoto"]) ? $context["pathToPhoto"] : null), "html", null, true);
        echo "?>\">
</article>
";
    }

    public function getTemplateName()
    {
        return "photo.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 7,  24 => 6,  17 => 1,);
    }
}
