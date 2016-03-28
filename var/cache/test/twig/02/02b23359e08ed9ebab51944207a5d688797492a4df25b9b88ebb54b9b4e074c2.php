<?php

/* backend/index.html.twig */
class __TwigTemplate_e4a25d38f5fd3acbcde8268453eac2a467337fc14c2650164f3ed1b133518bc2 extends Twig_Template
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
        $__internal_d469a004488dc7ecfe8a5a24cf947a4f142588002e3c5af78712104f8b8769d3 = $this->env->getExtension("native_profiler");
        $__internal_d469a004488dc7ecfe8a5a24cf947a4f142588002e3c5af78712104f8b8769d3->enter($__internal_d469a004488dc7ecfe8a5a24cf947a4f142588002e3c5af78712104f8b8769d3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d469a004488dc7ecfe8a5a24cf947a4f142588002e3c5af78712104f8b8769d3->leave($__internal_d469a004488dc7ecfe8a5a24cf947a4f142588002e3c5af78712104f8b8769d3_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_b347443d84907d048094e3f0f24ddc52b6f0e8fd13909585537e2e6f774ae1e6 = $this->env->getExtension("native_profiler");
        $__internal_b347443d84907d048094e3f0f24ddc52b6f0e8fd13909585537e2e6f774ae1e6->enter($__internal_b347443d84907d048094e3f0f24ddc52b6f0e8fd13909585537e2e6f774ae1e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

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
        
        $__internal_b347443d84907d048094e3f0f24ddc52b6f0e8fd13909585537e2e6f774ae1e6->leave($__internal_b347443d84907d048094e3f0f24ddc52b6f0e8fd13909585537e2e6f774ae1e6_prof);

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
