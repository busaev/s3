<?php

/* frontend/navigation/top_menu.html.twig */
class __TwigTemplate_640179aaa7706675eabdc728dc876c11017bb22abb2f72ec1e1474f84df6b204 extends Twig_Template
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
        $__internal_a1d22c90897da41abfb64f012b9c97f2c0c7789026e480f2c0965ad846690722 = $this->env->getExtension("native_profiler");
        $__internal_a1d22c90897da41abfb64f012b9c97f2c0c7789026e480f2c0965ad846690722->enter($__internal_a1d22c90897da41abfb64f012b9c97f2c0c7789026e480f2c0965ad846690722_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontend/navigation/top_menu.html.twig"));

        // line 1
        echo "<div class=\"masthead\">
        <h3 class=\"text-muted\">Project name</h3>
        <nav>
    <ul class=\"nav nav-justified\">
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["entity"], "navigationItems", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 6
            echo "            <li><a href=\"";
            if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "dev")) {
                echo "/app_dev.php";
            }
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "route", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "title", array()), "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "    </ul>
</nav>
</div>";
        
        $__internal_a1d22c90897da41abfb64f012b9c97f2c0c7789026e480f2c0965ad846690722->leave($__internal_a1d22c90897da41abfb64f012b9c97f2c0c7789026e480f2c0965ad846690722_prof);

    }

    public function getTemplateName()
    {
        return "frontend/navigation/top_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 8,  32 => 6,  28 => 5,  22 => 1,);
    }
}
/* <div class="masthead">*/
/*         <h3 class="text-muted">Project name</h3>*/
/*         <nav>*/
/*     <ul class="nav nav-justified">*/
/*         {% for entity in entity.navigationItems %}*/
/*             <li><a href="{% if app.environment == 'dev' %}/app_dev.php{% endif %}{{entity.route}}">{{entity.title}}</a></li>*/
/*         {% endfor %}*/
/*     </ul>*/
/* </nav>*/
/* </div>*/
