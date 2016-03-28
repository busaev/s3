<?php

/* backend/entity/actions/default/new.html.twig */
class __TwigTemplate_9edf4b60a4645d17997dd5831dd4100a727954c0ac01c414e25d8ec59fa6f124 extends Twig_Template
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
        $__internal_78abc31316518ba27fa3419bc37a02e948537de5bc96412d9171e712a11bebf3 = $this->env->getExtension("native_profiler");
        $__internal_78abc31316518ba27fa3419bc37a02e948537de5bc96412d9171e712a11bebf3->enter($__internal_78abc31316518ba27fa3419bc37a02e948537de5bc96412d9171e712a11bebf3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/entity/actions/default/new.html.twig"));

        // line 1
        echo "<div class=\"row\">
    <div class=\"col-lg-12\">            
        <div id=\"entities-actions\" style=\"z-index: 10; margin-top: 20px;\">                
            <ul>
                <li>
                    <a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => (isset($context["entityCode"]) ? $context["entityCode"] : $this->getContext($context, "entityCode")))), "html", null, true);
        echo "\" class=\"btn btn-default\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Back to the list", array(), "backend"), "html", null, true);
        echo "</a>
                </li>
                <li>
                    <a href=\"#\"  class=\"btn btn-success save-form\">";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Save", array(), "backend"), "html", null, true);
        echo "</a>
                </li>
            </ul>
        </div>                    
    </div>
</div>";
        
        $__internal_78abc31316518ba27fa3419bc37a02e948537de5bc96412d9171e712a11bebf3->leave($__internal_78abc31316518ba27fa3419bc37a02e948537de5bc96412d9171e712a11bebf3_prof);

    }

    public function getTemplateName()
    {
        return "backend/entity/actions/default/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 9,  29 => 6,  22 => 1,);
    }
}
/* <div class="row">*/
/*     <div class="col-lg-12">            */
/*         <div id="entities-actions" style="z-index: 10; margin-top: 20px;">                */
/*             <ul>*/
/*                 <li>*/
/*                     <a href="{{ path('backend_content_entry', {'entityCode': entityCode}) }}" class="btn btn-default">{{ 'Back to the list'|trans({}, "backend") }}</a>*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="#"  class="btn btn-success save-form">{{ 'Save'|trans({}, "backend") }}</a>*/
/*                 </li>*/
/*             </ul>*/
/*         </div>                    */
/*     </div>*/
/* </div>*/
