<?php

/* backend/entity/actions/user/list.html.twig */
class __TwigTemplate_0dde9d194735b6db492496d0439f3581cc8e9b580e4b086ac122a2b556f63ca8 extends Twig_Template
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
        $__internal_aa163c523c7937c112243935020da3d78e65035a731dc2d0b71e1027ce72fa1b = $this->env->getExtension("native_profiler");
        $__internal_aa163c523c7937c112243935020da3d78e65035a731dc2d0b71e1027ce72fa1b->enter($__internal_aa163c523c7937c112243935020da3d78e65035a731dc2d0b71e1027ce72fa1b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/entity/actions/user/list.html.twig"));

        // line 1
        echo "<div class=\"row\">
    <div class=\"col-lg-12\">            
        <div id=\"entities-actions\" style=\"z-index: 10; margin-top: 20px;\">                
            <ul>
                <li>
                    <a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("backend_user_new");
        echo "\" class=\"btn btn-success\"><i class=\"fa fa-plus\"></i> добавить</a>
                </li>
            </ul>                
        </div>                    
    </div>
</div>";
        
        $__internal_aa163c523c7937c112243935020da3d78e65035a731dc2d0b71e1027ce72fa1b->leave($__internal_aa163c523c7937c112243935020da3d78e65035a731dc2d0b71e1027ce72fa1b_prof);

    }

    public function getTemplateName()
    {
        return "backend/entity/actions/user/list.html.twig";
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
/*                     <a href="{{ path('backend_user_new') }}" class="btn btn-success"><i class="fa fa-plus"></i> добавить</a>*/
/*                 </li>*/
/*             </ul>                */
/*         </div>                    */
/*     </div>*/
/* </div>*/
