<?php

/* frontend/navigation/top_menu.html.twig */
class __TwigTemplate_19174ec44fffa348dfe94635717bfb57a3867ae1ab22cd7842053e6aaea0a826 extends Twig_Template
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
        $__internal_b56a3f315e3282fb79a4149dd2e41b00e9516ea13f1f78014d1c55bedb5b1dcd = $this->env->getExtension("native_profiler");
        $__internal_b56a3f315e3282fb79a4149dd2e41b00e9516ea13f1f78014d1c55bedb5b1dcd->enter($__internal_b56a3f315e3282fb79a4149dd2e41b00e9516ea13f1f78014d1c55bedb5b1dcd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontend/navigation/top_menu.html.twig"));

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
        
        $__internal_b56a3f315e3282fb79a4149dd2e41b00e9516ea13f1f78014d1c55bedb5b1dcd->leave($__internal_b56a3f315e3282fb79a4149dd2e41b00e9516ea13f1f78014d1c55bedb5b1dcd_prof);

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
