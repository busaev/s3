<?php

/* backend/base.html.twig */
class __TwigTemplate_e5e75f5e50b7ff9b3b6b4bb622d3652dd1651830ed929a88e9f29a2cd4e657fc extends Twig_Template
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
        $__internal_f347ea5aea04fb2f25a14a06337338a77789eb25cb111890269c7e70297d0295 = $this->env->getExtension("native_profiler");
        $__internal_f347ea5aea04fb2f25a14a06337338a77789eb25cb111890269c7e70297d0295->enter($__internal_f347ea5aea04fb2f25a14a06337338a77789eb25cb111890269c7e70297d0295_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/base.html.twig"));

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
    
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

    <!-- Bootstrap Core CSS -->
    <link href=\"/assets/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- MetisMenu CSS -->
    <link href=\"/assets/metisMenu/dist/metisMenu.min.css\" rel=\"stylesheet\">
    
    <!-- DataTables CSS -->
    <link href=\"/assets/DataTables/datatables.min.css\" rel=\"stylesheet\">

    <!-- SB-Admin-2 -->
    <link href=\"/assets/sb-admin-2.1/dist/css/timeline.css\" rel=\"stylesheet\">
    <link href=\"/assets/sb-admin-2.1/dist/css/sb-admin-2.css\" rel=\"stylesheet\">
    <link href=\"/assets/morrisjs/morris.css\" rel=\"stylesheet\">

    <!-- Custom Fonts -->
    <link href=\"/assets/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    
    <!-- wysiwyg -->
    <link href=\"/assets/wysiwyg/summernote.css\" rel=\"stylesheet\" type=\"text/css\">
    
    ";
        // line 36
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "12c24b4_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12c24b4_0") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend_common_1.css");
            // line 40
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
            // asset "12c24b4_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12c24b4_1") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend_entities_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
            // asset "12c24b4_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12c24b4_2") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend_spaces_3.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        } else {
            // asset "12c24b4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12c24b4") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        }
        unset($context["asset_url"]);
        // line 42
        echo "
    ";
        // line 43
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 44
        echo "    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>
    <body>
        <div id=\"wrapper\">

            ";
        // line 56
        $this->loadTemplate("backend/navigation.html.twig", "backend/base.html.twig", 56)->display($context);
        // line 57
        echo "
            <div id=\"page-wrapper\">
                ";
        // line 59
        $this->displayBlock('body', $context, $blocks);
        echo "     
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        
        
        <!-- jQuery -->
        <script src=\"/assets/jquery/jquery-2.1.4.min.js\"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=\"/assets/bootstrap/js/bootstrap.min.js\"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src=\"/assets/metisMenu/dist/metisMenu.min.js\"></script>

        <!-- SB-Admin-2 JavaScript -->
        <script src=\"/assets/sb-admin-2.1/dist/js/sb-admin-2.js\"></script>
        
        <!-- Morris Charts JavaScript -->
        ";
        // line 83
        echo "        
        <!-- DataTables JavaScript -->
        <script src=\"/assets/DataTables/datatables.min.js\"></script>
        
        <!-- wysiwyg -->
        <script src=\"/assets/wysiwyg/summernote.min.js\"></script>
        
        <!-- translit -->
        <script src=\"/assets/translit/translit.js\"></script>
        
        <!-- fos js routing -->
        <script src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>

        <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
        <script>
        // tooltip demo
        \$('.tooltip-demo').tooltip({
            selector: \"[data-toggle=tooltip]\",
            container: \"body\"
        })

        // popover demo
        \$(\"[data-toggle=popover]\")
            .popover()
        </script>

        ";
        // line 110
        $this->displayBlock('javascripts', $context, $blocks);
        // line 111
        echo "    </body>
</html>
";
        
        $__internal_f347ea5aea04fb2f25a14a06337338a77789eb25cb111890269c7e70297d0295->leave($__internal_f347ea5aea04fb2f25a14a06337338a77789eb25cb111890269c7e70297d0295_prof);

    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        $__internal_2854fad1b0772a0a227dc0c829a790934f84b0e365adfef288ef5e0106c6ecaf = $this->env->getExtension("native_profiler");
        $__internal_2854fad1b0772a0a227dc0c829a790934f84b0e365adfef288ef5e0106c6ecaf->enter($__internal_2854fad1b0772a0a227dc0c829a790934f84b0e365adfef288ef5e0106c6ecaf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_2854fad1b0772a0a227dc0c829a790934f84b0e365adfef288ef5e0106c6ecaf->leave($__internal_2854fad1b0772a0a227dc0c829a790934f84b0e365adfef288ef5e0106c6ecaf_prof);

    }

    // line 43
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_bfe96e3f0f9173270f0b63ff5f5b2c60c1806afa234c1e8e4558bd12b929cd22 = $this->env->getExtension("native_profiler");
        $__internal_bfe96e3f0f9173270f0b63ff5f5b2c60c1806afa234c1e8e4558bd12b929cd22->enter($__internal_bfe96e3f0f9173270f0b63ff5f5b2c60c1806afa234c1e8e4558bd12b929cd22_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_bfe96e3f0f9173270f0b63ff5f5b2c60c1806afa234c1e8e4558bd12b929cd22->leave($__internal_bfe96e3f0f9173270f0b63ff5f5b2c60c1806afa234c1e8e4558bd12b929cd22_prof);

    }

    // line 59
    public function block_body($context, array $blocks = array())
    {
        $__internal_1ee8d75d3a641a9f47fc8fa0e594f868b716f38d7427c082c5e7030c8cc6198a = $this->env->getExtension("native_profiler");
        $__internal_1ee8d75d3a641a9f47fc8fa0e594f868b716f38d7427c082c5e7030c8cc6198a->enter($__internal_1ee8d75d3a641a9f47fc8fa0e594f868b716f38d7427c082c5e7030c8cc6198a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_1ee8d75d3a641a9f47fc8fa0e594f868b716f38d7427c082c5e7030c8cc6198a->leave($__internal_1ee8d75d3a641a9f47fc8fa0e594f868b716f38d7427c082c5e7030c8cc6198a_prof);

    }

    // line 110
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_fe4611260a9020b464af4fbb2c6ce16136b4e72f0c72d8f78bdcdff5a8463896 = $this->env->getExtension("native_profiler");
        $__internal_fe4611260a9020b464af4fbb2c6ce16136b4e72f0c72d8f78bdcdff5a8463896->enter($__internal_fe4611260a9020b464af4fbb2c6ce16136b4e72f0c72d8f78bdcdff5a8463896_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_fe4611260a9020b464af4fbb2c6ce16136b4e72f0c72d8f78bdcdff5a8463896->leave($__internal_fe4611260a9020b464af4fbb2c6ce16136b4e72f0c72d8f78bdcdff5a8463896_prof);

    }

    public function getTemplateName()
    {
        return "backend/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 110,  217 => 59,  206 => 43,  194 => 12,  185 => 111,  183 => 110,  165 => 95,  161 => 94,  148 => 83,  124 => 59,  120 => 57,  118 => 56,  104 => 44,  102 => 43,  99 => 42,  73 => 40,  69 => 36,  44 => 14,  39 => 12,  26 => 1,);
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
/*     */
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/* */
/*     <!-- Bootstrap Core CSS -->*/
/*     <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/*     <!-- MetisMenu CSS -->*/
/*     <link href="/assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">*/
/*     */
/*     <!-- DataTables CSS -->*/
/*     <link href="/assets/DataTables/datatables.min.css" rel="stylesheet">*/
/* */
/*     <!-- SB-Admin-2 -->*/
/*     <link href="/assets/sb-admin-2.1/dist/css/timeline.css" rel="stylesheet">*/
/*     <link href="/assets/sb-admin-2.1/dist/css/sb-admin-2.css" rel="stylesheet">*/
/*     <link href="/assets/morrisjs/morris.css" rel="stylesheet">*/
/* */
/*     <!-- Custom Fonts -->*/
/*     <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">*/
/*     */
/*     <!-- wysiwyg -->*/
/*     <link href="/assets/wysiwyg/summernote.css" rel="stylesheet" type="text/css">*/
/*     */
/*     {% stylesheets '../app/Resources/public/backend/css/common.css' */
/*                    '../app/Resources/public/backend/css/entities.css' */
/*                    '../app/Resources/public/backend/css/spaces.css' */
/*       filter='cssrewrite' output="css/compiled/backend.css" %}*/
/*         <link href="{{ asset_url }}" rel="stylesheet" />*/
/*     {% endstylesheets %}*/
/* */
/*     {% block stylesheets %}{% endblock %}*/
/*     */
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/* </head>*/
/*     <body>*/
/*         <div id="wrapper">*/
/* */
/*             {% include 'backend/navigation.html.twig' %}*/
/* */
/*             <div id="page-wrapper">*/
/*                 {% block body %}{% endblock %}     */
/*             </div>*/
/*             <!-- /#page-wrapper -->*/
/* */
/*         </div>*/
/*         <!-- /#wrapper -->*/
/*         */
/*         */
/*         <!-- jQuery -->*/
/*         <script src="/assets/jquery/jquery-2.1.4.min.js"></script>*/
/* */
/*         <!-- Bootstrap Core JavaScript -->*/
/*         <script src="/assets/bootstrap/js/bootstrap.min.js"></script>*/
/* */
/*         <!-- Metis Menu Plugin JavaScript -->*/
/*         <script src="/assets/metisMenu/dist/metisMenu.min.js"></script>*/
/* */
/*         <!-- SB-Admin-2 JavaScript -->*/
/*         <script src="/assets/sb-admin-2.1/dist/js/sb-admin-2.js"></script>*/
/*         */
/*         <!-- Morris Charts JavaScript -->*/
/*         {#script src="/assets/raphael/raphael-min.js"></script>*/
/*         <script src="/assets/morrisjs/morris.min.js"></script>*/
/*         <script src="/assets/morrisjs/morris-data.js"></script>#}*/
/*         */
/*         <!-- DataTables JavaScript -->*/
/*         <script src="/assets/DataTables/datatables.min.js"></script>*/
/*         */
/*         <!-- wysiwyg -->*/
/*         <script src="/assets/wysiwyg/summernote.min.js"></script>*/
/*         */
/*         <!-- translit -->*/
/*         <script src="/assets/translit/translit.js"></script>*/
/*         */
/*         <!-- fos js routing -->*/
/*         <script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>*/
/*         <script src="{{ path('fos_js_routing_js', {'callback': 'fos.Router.setData'}) }}"></script>*/
/* */
/*         <!-- Page-Level Demo Scripts - Notifications - Use for reference -->*/
/*         <script>*/
/*         // tooltip demo*/
/*         $('.tooltip-demo').tooltip({*/
/*             selector: "[data-toggle=tooltip]",*/
/*             container: "body"*/
/*         })*/
/* */
/*         // popover demo*/
/*         $("[data-toggle=popover]")*/
/*             .popover()*/
/*         </script>*/
/* */
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
