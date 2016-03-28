<?php

/* backend/entity/actions/user/list.html.twig */
class __TwigTemplate_e78f8b2f5e0217578d203baf9c9dd2152b5667215c1b10fbbba5e3c83293533f extends Twig_Template
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
        $__internal_0e6331e25fcb3d432ba8cdff0bc42a6d26f9db054c85d1e39fc6eb7af4f9dd92 = $this->env->getExtension("native_profiler");
        $__internal_0e6331e25fcb3d432ba8cdff0bc42a6d26f9db054c85d1e39fc6eb7af4f9dd92->enter($__internal_0e6331e25fcb3d432ba8cdff0bc42a6d26f9db054c85d1e39fc6eb7af4f9dd92_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/entity/actions/user/list.html.twig"));

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
        
        $__internal_0e6331e25fcb3d432ba8cdff0bc42a6d26f9db054c85d1e39fc6eb7af4f9dd92->leave($__internal_0e6331e25fcb3d432ba8cdff0bc42a6d26f9db054c85d1e39fc6eb7af4f9dd92_prof);

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
