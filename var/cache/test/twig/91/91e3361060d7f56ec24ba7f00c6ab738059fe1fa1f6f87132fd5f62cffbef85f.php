<?php

/* frontend/base.html.twig */
class __TwigTemplate_e9b374fd1a5e33d7e6c038febca721f6cd946f27c1cabaa233672591961c8949 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_00231121e7f54775a580e0a504e4632c4b97442c7e3a8207f12058a70b6a8cdb = $this->env->getExtension("native_profiler");
        $__internal_00231121e7f54775a580e0a504e4632c4b97442c7e3a8207f12058a70b6a8cdb->enter($__internal_00231121e7f54775a580e0a504e4632c4b97442c7e3a8207f12058a70b6a8cdb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontend/base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

    <!-- Bootstrap Core CSS -->
    <link href=\"/assets/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- Custom Fonts -->
    <link href=\"/assets/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    
    <!-- Font Roboto -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    
    ";
        // line 25
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "05aa736_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_05aa736_0") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/frontend_fonts_1.css");
            // line 28
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
            // asset "05aa736_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_05aa736_1") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/frontend_demo_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        } else {
            // asset "05aa736"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_05aa736") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/frontend.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        }
        unset($context["asset_url"]);
        // line 30
        echo "
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>
    <body>
        ";
        // line 40
        $this->displayBlock('body', $context, $blocks);
        // line 41
        echo "        
        <!-- jQuery -->
        <script src=\"/assets/jquery/jquery-2.1.4.min.js\"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=\"/assets/bootstrap/js/bootstrap.min.js\"></script>

        ";
        // line 48
        $this->displayBlock('javascripts', $context, $blocks);
        // line 49
        echo "    </body>
</html>
";
        
        $__internal_00231121e7f54775a580e0a504e4632c4b97442c7e3a8207f12058a70b6a8cdb->leave($__internal_00231121e7f54775a580e0a504e4632c4b97442c7e3a8207f12058a70b6a8cdb_prof);

    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        $__internal_ca776ca76f7fec587573858e8a14e9d044139d22c269709c57ac336e917ebbb1 = $this->env->getExtension("native_profiler");
        $__internal_ca776ca76f7fec587573858e8a14e9d044139d22c269709c57ac336e917ebbb1->enter($__internal_ca776ca76f7fec587573858e8a14e9d044139d22c269709c57ac336e917ebbb1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_ca776ca76f7fec587573858e8a14e9d044139d22c269709c57ac336e917ebbb1->leave($__internal_ca776ca76f7fec587573858e8a14e9d044139d22c269709c57ac336e917ebbb1_prof);

    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_89c34990bdd2d5a74c947c502b595dca7ee87a8bd7098654e6802af39d14cc75 = $this->env->getExtension("native_profiler");
        $__internal_89c34990bdd2d5a74c947c502b595dca7ee87a8bd7098654e6802af39d14cc75->enter($__internal_89c34990bdd2d5a74c947c502b595dca7ee87a8bd7098654e6802af39d14cc75_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_89c34990bdd2d5a74c947c502b595dca7ee87a8bd7098654e6802af39d14cc75->leave($__internal_89c34990bdd2d5a74c947c502b595dca7ee87a8bd7098654e6802af39d14cc75_prof);

    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
        $__internal_0820ef96f44b903b675c8d1ef3aecfbd0a2a0c46ff7188624c8a3085ec3534b8 = $this->env->getExtension("native_profiler");
        $__internal_0820ef96f44b903b675c8d1ef3aecfbd0a2a0c46ff7188624c8a3085ec3534b8->enter($__internal_0820ef96f44b903b675c8d1ef3aecfbd0a2a0c46ff7188624c8a3085ec3534b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_0820ef96f44b903b675c8d1ef3aecfbd0a2a0c46ff7188624c8a3085ec3534b8->leave($__internal_0820ef96f44b903b675c8d1ef3aecfbd0a2a0c46ff7188624c8a3085ec3534b8_prof);

    }

    // line 48
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_1e4236b1e22e5615f66e0f7b4caa16853e12eda253c57c2ee3230ae1c2548c22 = $this->env->getExtension("native_profiler");
        $__internal_1e4236b1e22e5615f66e0f7b4caa16853e12eda253c57c2ee3230ae1c2548c22->enter($__internal_1e4236b1e22e5615f66e0f7b4caa16853e12eda253c57c2ee3230ae1c2548c22_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_1e4236b1e22e5615f66e0f7b4caa16853e12eda253c57c2ee3230ae1c2548c22->leave($__internal_1e4236b1e22e5615f66e0f7b4caa16853e12eda253c57c2ee3230ae1c2548c22_prof);

    }

    public function getTemplateName()
    {
        return "frontend/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 48,  141 => 40,  130 => 13,  118 => 12,  109 => 49,  107 => 48,  98 => 41,  96 => 40,  84 => 30,  64 => 28,  60 => 25,  45 => 14,  43 => 13,  39 => 12,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* */
/* <head>*/
/* */
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <meta name="description" content="">*/
/*     <meta name="author" content="">*/
/* */
/*     <title>{% block title %}Welcome!{% endblock %}</title>*/
/*     {% block stylesheets %}{% endblock %}*/
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/* */
/*     <!-- Bootstrap Core CSS -->*/
/*     <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/*     <!-- Custom Fonts -->*/
/*     <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">*/
/*     */
/*     <!-- Font Roboto -->*/
/*     <link href='https://fonts.googleapis.com/css?family=Roboto:400,100&subset=latin,cyrillic' rel='stylesheet' type='text/css'>*/
/*     */
/*     {% stylesheets '../app/Resources/public/frontend/css/fonts.css' */
/*                    '../app/Resources/public/frontend/css/demo.css' */
/*       filter='cssrewrite' output="css/compiled/frontend.css" %}*/
/*         <link href="{{ asset_url }}" rel="stylesheet" />*/
/*     {% endstylesheets %}*/
/* */
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/* </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         */
/*         <!-- jQuery -->*/
/*         <script src="/assets/jquery/jquery-2.1.4.min.js"></script>*/
/* */
/*         <!-- Bootstrap Core JavaScript -->*/
/*         <script src="/assets/bootstrap/js/bootstrap.min.js"></script>*/
/* */
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
