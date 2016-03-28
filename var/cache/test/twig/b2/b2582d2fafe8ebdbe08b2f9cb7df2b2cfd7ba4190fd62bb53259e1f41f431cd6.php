<?php

/* backend/entity/actions/default/list.html.twig */
class __TwigTemplate_9fba3c45be958701b59305c72aecbfe1da5f7538d62de7a997cc7d03257db3eb extends Twig_Template
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
        $__internal_61abe63211d9cca121616e315bb2251f8d9e3b17b0aa4974c54b249164cc0ca2 = $this->env->getExtension("native_profiler");
        $__internal_61abe63211d9cca121616e315bb2251f8d9e3b17b0aa4974c54b249164cc0ca2->enter($__internal_61abe63211d9cca121616e315bb2251f8d9e3b17b0aa4974c54b249164cc0ca2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/entity/actions/default/list.html.twig"));

        // line 1
        echo "<div class=\"row\">
    <div class=\"col-lg-12\">            
        <div id=\"entities-actions\" style=\"z-index: 10; margin-top: 20px;\">                
            <ul>
                <li>
                    <a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_content_entry_new", array("entityCode" => (isset($context["entityCode"]) ? $context["entityCode"] : $this->getContext($context, "entityCode")))), "html", null, true);
        echo "\" class=\"btn btn-success\"><i class=\"fa fa-plus\"></i> добавить</a>
                </li>
            </ul>                
        </div>                    
    </div>
</div>";
        
        $__internal_61abe63211d9cca121616e315bb2251f8d9e3b17b0aa4974c54b249164cc0ca2->leave($__internal_61abe63211d9cca121616e315bb2251f8d9e3b17b0aa4974c54b249164cc0ca2_prof);

    }

    public function getTemplateName()
    {
        return "backend/entity/actions/default/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 6,  22 => 1,);
    }
}
/* <div class="row">*/
/*     <div class="col-lg-12">            */
/*         <div id="entities-actions" style="z-index: 10; margin-top: 20px;">                */
/*             <ul>*/
/*                 <li>*/
/*                     <a href="{{ path('backend_content_entry_new', {'entityCode': entityCode }) }}" class="btn btn-success"><i class="fa fa-plus"></i> добавить</a>*/
/*                 </li>*/
/*             </ul>                */
/*         </div>                    */
/*     </div>*/
/* </div>*/
