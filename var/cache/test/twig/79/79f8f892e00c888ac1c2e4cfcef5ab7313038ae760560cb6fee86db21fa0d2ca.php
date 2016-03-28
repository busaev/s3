<?php

/* backend/base.html.twig */
class __TwigTemplate_d2a2c6f0481498ed2aeb0889278fc398e10f9a9dee5998aafb861664e7268fc5 extends Twig_Template
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
        $__internal_31d7db923e67379d6b1c2b0b924ef9070145f30439b332ccbd204aa6163cedec = $this->env->getExtension("native_profiler");
        $__internal_31d7db923e67379d6b1c2b0b924ef9070145f30439b332ccbd204aa6163cedec->enter($__internal_31d7db923e67379d6b1c2b0b924ef9070145f30439b332ccbd204aa6163cedec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/base.html.twig"));

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
        
        $__internal_31d7db923e67379d6b1c2b0b924ef9070145f30439b332ccbd204aa6163cedec->leave($__internal_31d7db923e67379d6b1c2b0b924ef9070145f30439b332ccbd204aa6163cedec_prof);

    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        $__internal_8acc67428aedd5a7460760374feb152760b00925a96480ba94a2367612c19e8e = $this->env->getExtension("native_profiler");
        $__internal_8acc67428aedd5a7460760374feb152760b00925a96480ba94a2367612c19e8e->enter($__internal_8acc67428aedd5a7460760374feb152760b00925a96480ba94a2367612c19e8e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_8acc67428aedd5a7460760374feb152760b00925a96480ba94a2367612c19e8e->leave($__internal_8acc67428aedd5a7460760374feb152760b00925a96480ba94a2367612c19e8e_prof);

    }

    // line 43
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_64a5916d8dc03a7793cf033f2bca8f27699c413debd8504a9d25e15bd9b7013d = $this->env->getExtension("native_profiler");
        $__internal_64a5916d8dc03a7793cf033f2bca8f27699c413debd8504a9d25e15bd9b7013d->enter($__internal_64a5916d8dc03a7793cf033f2bca8f27699c413debd8504a9d25e15bd9b7013d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_64a5916d8dc03a7793cf033f2bca8f27699c413debd8504a9d25e15bd9b7013d->leave($__internal_64a5916d8dc03a7793cf033f2bca8f27699c413debd8504a9d25e15bd9b7013d_prof);

    }

    // line 59
    public function block_body($context, array $blocks = array())
    {
        $__internal_511b8d154d327918a276deafa408fe5bd34de8d151dc911d7b4cc22a1902bf4d = $this->env->getExtension("native_profiler");
        $__internal_511b8d154d327918a276deafa408fe5bd34de8d151dc911d7b4cc22a1902bf4d->enter($__internal_511b8d154d327918a276deafa408fe5bd34de8d151dc911d7b4cc22a1902bf4d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_511b8d154d327918a276deafa408fe5bd34de8d151dc911d7b4cc22a1902bf4d->leave($__internal_511b8d154d327918a276deafa408fe5bd34de8d151dc911d7b4cc22a1902bf4d_prof);

    }

    // line 110
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_fa7d789fb2b35ad11afe2bbcdfabc4f90b2eaea15a222602bcb98127d4339bee = $this->env->getExtension("native_profiler");
        $__internal_fa7d789fb2b35ad11afe2bbcdfabc4f90b2eaea15a222602bcb98127d4339bee->enter($__internal_fa7d789fb2b35ad11afe2bbcdfabc4f90b2eaea15a222602bcb98127d4339bee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_fa7d789fb2b35ad11afe2bbcdfabc4f90b2eaea15a222602bcb98127d4339bee->leave($__internal_fa7d789fb2b35ad11afe2bbcdfabc4f90b2eaea15a222602bcb98127d4339bee_prof);

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
