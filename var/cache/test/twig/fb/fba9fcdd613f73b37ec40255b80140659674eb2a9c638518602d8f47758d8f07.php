<?php

/* backend/entity/actions/default/list.html.twig */
class __TwigTemplate_68c21d63feca1941473275e2c21a5ce480c74d1b787e031da75b26ff5999a4bf extends Twig_Template
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
        $__internal_69eeff40aa2dc49f2d31a3ac2ad2019ff5b95bd9b914ac25f60a413adda1ff24 = $this->env->getExtension("native_profiler");
        $__internal_69eeff40aa2dc49f2d31a3ac2ad2019ff5b95bd9b914ac25f60a413adda1ff24->enter($__internal_69eeff40aa2dc49f2d31a3ac2ad2019ff5b95bd9b914ac25f60a413adda1ff24_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/entity/actions/default/list.html.twig"));

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
        
        $__internal_69eeff40aa2dc49f2d31a3ac2ad2019ff5b95bd9b914ac25f60a413adda1ff24->leave($__internal_69eeff40aa2dc49f2d31a3ac2ad2019ff5b95bd9b914ac25f60a413adda1ff24_prof);

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
