<?php

/* backend/flash_messages.html.twig */
class __TwigTemplate_0a8f8ed75d71fb987d2f7671fea616c44dbae43a18fa9d06f70635bfd59d28e1 extends Twig_Template
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
        $__internal_45fc072e5c3af231c1dc60af50f83729e351d68f8ac3eeea846b144bc4ac3115 = $this->env->getExtension("native_profiler");
        $__internal_45fc072e5c3af231c1dc60af50f83729e351d68f8ac3eeea846b144bc4ac3115->enter($__internal_45fc072e5c3af231c1dc60af50f83729e351d68f8ac3eeea846b144bc4ac3115_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/flash_messages.html.twig"));

        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "alert-success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 3
            echo "    <div class=\"row margin-top-20\">
        <div class=\"col-lg-12\">
            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                ";
            // line 7
            echo twig_escape_filter($this->env, $context["flash_message"], "html", null, true);
            echo "
            </div>

        </div>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_45fc072e5c3af231c1dc60af50f83729e351d68f8ac3eeea846b144bc4ac3115->leave($__internal_45fc072e5c3af231c1dc60af50f83729e351d68f8ac3eeea846b144bc4ac3115_prof);

    }

    public function getTemplateName()
    {
        return "backend/flash_messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 7,  26 => 3,  22 => 2,);
    }
}
/* {# empty Twig template #}*/
/* {% for flash_message in app.session.flashbag.get('alert-success') %}*/
/*     <div class="row margin-top-20">*/
/*         <div class="col-lg-12">*/
/*             <div class="alert alert-success alert-dismissable">*/
/*                 <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>*/
/*                 {{ flash_message }}*/
/*             </div>*/
/* */
/*         </div>*/
/*     </div>*/
/* {% endfor %}*/
