<?php

/* backend/entity/new.html.twig */
class __TwigTemplate_f6b39be9402f17a40bedb8c72ed3b125f9e64497c565e10379f3f18cca729cca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("backend/base.html.twig", "backend/entity/new.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "backend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5fe94f775c0718273c339e44e5ff44bb47ab58ab082169c64bb8ceb00ac27892 = $this->env->getExtension("native_profiler");
        $__internal_5fe94f775c0718273c339e44e5ff44bb47ab58ab082169c64bb8ceb00ac27892->enter($__internal_5fe94f775c0718273c339e44e5ff44bb47ab58ab082169c64bb8ceb00ac27892_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/entity/new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5fe94f775c0718273c339e44e5ff44bb47ab58ab082169c64bb8ceb00ac27892->leave($__internal_5fe94f775c0718273c339e44e5ff44bb47ab58ab082169c64bb8ceb00ac27892_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_474467462650a5fa9361548be4534c903a617be8c22ac7d161386eacfff88961 = $this->env->getExtension("native_profiler");
        $__internal_474467462650a5fa9361548be4534c903a617be8c22ac7d161386eacfff88961->enter($__internal_474467462650a5fa9361548be4534c903a617be8c22ac7d161386eacfff88961_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            ";
        // line 7
        echo $this->env->getExtension('breadcrumbs')->renderBreadcrumbs(array("separator" => "", "listClass" => "breadcrumb margin-top-20"));
        echo "                  
        </div>
    </div>
        
    ";
        // line 11
        echo $this->env->getExtension('app_extension')->actions($this->env, (isset($context["entityCode"]) ? $context["entityCode"] : $this->getContext($context, "entityCode")), "new");
        echo "
                    
    <div class=\"row\">
        <div class=\"col-lg-12\">
            
            <h1>";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Creating", array(), "backend"), "html", null, true);
        echo "</h1>

            ";
        // line 18
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("novalidate" => "novalidate", "class" => "entity-form new-form")));
        echo "
            ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            ";
        // line 20
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

        </div>
    </div>
";
        
        $__internal_474467462650a5fa9361548be4534c903a617be8c22ac7d161386eacfff88961->leave($__internal_474467462650a5fa9361548be4534c903a617be8c22ac7d161386eacfff88961_prof);

    }

    // line 26
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_e9f238dc57a939cab1e5e62c8fbc0036763393781b92b46473785b6eb3b6642c = $this->env->getExtension("native_profiler");
        $__internal_e9f238dc57a939cab1e5e62c8fbc0036763393781b92b46473785b6eb3b6642c->enter($__internal_e9f238dc57a939cab1e5e62c8fbc0036763393781b92b46473785b6eb3b6642c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 27
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "79e382d_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79e382d_0") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend_common_1.css");
            // line 30
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
            // asset "79e382d_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79e382d_1") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend_entities_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        } else {
            // asset "79e382d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_79e382d") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        }
        unset($context["asset_url"]);
        
        $__internal_e9f238dc57a939cab1e5e62c8fbc0036763393781b92b46473785b6eb3b6642c->leave($__internal_e9f238dc57a939cab1e5e62c8fbc0036763393781b92b46473785b6eb3b6642c_prof);

    }

    // line 35
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_6dfd848dd6d7e48e55dc6935526372b114d4a2abbe98d769d9de2125ae3a25e8 = $this->env->getExtension("native_profiler");
        $__internal_6dfd848dd6d7e48e55dc6935526372b114d4a2abbe98d769d9de2125ae3a25e8->enter($__internal_6dfd848dd6d7e48e55dc6935526372b114d4a2abbe98d769d9de2125ae3a25e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 36
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "1b51954_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1b51954_0") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend_entities_1.js");
            // line 38
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "1b51954"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1b51954") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/backend.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 40
        echo "    <script>
        \$(document).ready(function() {
            \$(\".wysiwyg\").summernote();
        });
        \$(\".save-form\").click(function() {
            \$('.entity-form').submit();
        });
    </script>
";
        
        $__internal_6dfd848dd6d7e48e55dc6935526372b114d4a2abbe98d769d9de2125ae3a25e8->leave($__internal_6dfd848dd6d7e48e55dc6935526372b114d4a2abbe98d769d9de2125ae3a25e8_prof);

    }

    public function getTemplateName()
    {
        return "backend/entity/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 40,  134 => 38,  129 => 36,  123 => 35,  98 => 30,  93 => 27,  87 => 26,  75 => 20,  71 => 19,  67 => 18,  62 => 16,  54 => 11,  47 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'backend/base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     */
/*     <div class="row">*/
/*         <div class="col-lg-12">*/
/*             {{ wo_render_breadcrumbs({separator: '', listClass: "breadcrumb margin-top-20"}) }}                  */
/*         </div>*/
/*     </div>*/
/*         */
/*     {{ actions(entityCode, 'new') }}*/
/*                     */
/*     <div class="row">*/
/*         <div class="col-lg-12">*/
/*             */
/*             <h1>{{ 'Creating'|trans({}, "backend") }}</h1>*/
/* */
/*             {{ form_start(form, {'attr': {'novalidate': 'novalidate', 'class': 'entity-form new-form'}}) }}*/
/*             {{ form_widget(form) }}*/
/*             {{ form_end(form) }}*/
/* */
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block stylesheets %}*/
/*     {% stylesheets '../app/Resources/public/backend/css/common.css' */
/*                    '../app/Resources/public/backend/css/entities.css' */
/*       filter='cssrewrite' output="css/compiled/backend.css" %}*/
/*         <link href="{{ asset_url }}" rel="stylesheet" />*/
/*     {% endstylesheets %}*/
/* {% endblock stylesheets %}*/
/* */
/* */
/* {% block javascripts %}*/
/*     {% javascripts '../app/Resources/public/backend/js/entities.js' */
/*       filter='cssrewrite' output="css/compiled/backend.js" %}*/
/*         <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/*     <script>*/
/*         $(document).ready(function() {*/
/*             $(".wysiwyg").summernote();*/
/*         });*/
/*         $(".save-form").click(function() {*/
/*             $('.entity-form').submit();*/
/*         });*/
/*     </script>*/
/* {% endblock javascripts %}*/
