<?php

/* backend/index.html.twig */
class __TwigTemplate_d4aef064e73fc484629211de6bf0628a609fe7095c7255fd9e80b24fc75ae2a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("backend/base.html.twig", "backend/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "backend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cbf7571d493e5ee617e1d91a8c1417c1b72c416c660bece09c2ce3911ae9c007 = $this->env->getExtension("native_profiler");
        $__internal_cbf7571d493e5ee617e1d91a8c1417c1b72c416c660bece09c2ce3911ae9c007->enter($__internal_cbf7571d493e5ee617e1d91a8c1417c1b72c416c660bece09c2ce3911ae9c007_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cbf7571d493e5ee617e1d91a8c1417c1b72c416c660bece09c2ce3911ae9c007->leave($__internal_cbf7571d493e5ee617e1d91a8c1417c1b72c416c660bece09c2ce3911ae9c007_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_4ec3ab58560e1bf417bbed86cef92fe8b119b4dca6e41a6c3538acd2b3e3a728 = $this->env->getExtension("native_profiler");
        $__internal_4ec3ab58560e1bf417bbed86cef92fe8b119b4dca6e41a6c3538acd2b3e3a728->enter($__internal_4ec3ab58560e1bf417bbed86cef92fe8b119b4dca6e41a6c3538acd2b3e3a728_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <h1 class=\"page-header\">";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dashboard", array(), "backend"), "html", null, true);
        echo "</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->      

 

";
        
        $__internal_4ec3ab58560e1bf417bbed86cef92fe8b119b4dca6e41a6c3538acd2b3e3a728->leave($__internal_4ec3ab58560e1bf417bbed86cef92fe8b119b4dca6e41a6c3538acd2b3e3a728_prof);

    }

    public function getTemplateName()
    {
        return "backend/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 8,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'backend/base.html.twig' %}*/
/* */
/* {% block body %}*/
/* */
/* */
/*     <div class="row">*/
/*         <div class="col-lg-12">*/
/*             <h1 class="page-header">{{ 'Dashboard'|trans({}, "backend") }}</h1>*/
/*         </div>*/
/*         <!-- /.col-lg-12 -->*/
/*     </div>*/
/*     <!-- /.row -->      */
/* */
/*  */
/* */
/* {% endblock %}*/
