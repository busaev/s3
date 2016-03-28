<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_32cc3d73f3c64264b1c39793ec3e95ac4a4014d029f0e3792c9794e236d99e2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b4525391d590a7dc2340584279766fc1c198d237dac928879f30f98df3fb0c52 = $this->env->getExtension("native_profiler");
        $__internal_b4525391d590a7dc2340584279766fc1c198d237dac928879f30f98df3fb0c52->enter($__internal_b4525391d590a7dc2340584279766fc1c198d237dac928879f30f98df3fb0c52_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b4525391d590a7dc2340584279766fc1c198d237dac928879f30f98df3fb0c52->leave($__internal_b4525391d590a7dc2340584279766fc1c198d237dac928879f30f98df3fb0c52_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_d13718c6bcc996221d49b8fa162321404551b92e6b3516c14540f3cda3fa49d0 = $this->env->getExtension("native_profiler");
        $__internal_d13718c6bcc996221d49b8fa162321404551b92e6b3516c14540f3cda3fa49d0->enter($__internal_d13718c6bcc996221d49b8fa162321404551b92e6b3516c14540f3cda3fa49d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_d13718c6bcc996221d49b8fa162321404551b92e6b3516c14540f3cda3fa49d0->leave($__internal_d13718c6bcc996221d49b8fa162321404551b92e6b3516c14540f3cda3fa49d0_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_9149f4fcb9c3d2bd6a8620680daa2268d2fd29eec8dc30d3d3dd9733beb0dad4 = $this->env->getExtension("native_profiler");
        $__internal_9149f4fcb9c3d2bd6a8620680daa2268d2fd29eec8dc30d3d3dd9733beb0dad4->enter($__internal_9149f4fcb9c3d2bd6a8620680daa2268d2fd29eec8dc30d3d3dd9733beb0dad4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_9149f4fcb9c3d2bd6a8620680daa2268d2fd29eec8dc30d3d3dd9733beb0dad4->leave($__internal_9149f4fcb9c3d2bd6a8620680daa2268d2fd29eec8dc30d3d3dd9733beb0dad4_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_224606949adcb3491600133e621d179c04421228fda9b4eab5e553af0a460a91 = $this->env->getExtension("native_profiler");
        $__internal_224606949adcb3491600133e621d179c04421228fda9b4eab5e553af0a460a91->enter($__internal_224606949adcb3491600133e621d179c04421228fda9b4eab5e553af0a460a91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_224606949adcb3491600133e621d179c04421228fda9b4eab5e553af0a460a91->leave($__internal_224606949adcb3491600133e621d179c04421228fda9b4eab5e553af0a460a91_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
