<?php

/* backend/flash_messages.html.twig */
class __TwigTemplate_478fc7f1595fb618c881092c780767fb8518a6d3c4952b173888664eb9c796a2 extends Twig_Template
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
        $__internal_45d07cfa9595094a5534d8b6d7f12a710102b956881be6b5eca3e6d8a0f5c3dd = $this->env->getExtension("native_profiler");
        $__internal_45d07cfa9595094a5534d8b6d7f12a710102b956881be6b5eca3e6d8a0f5c3dd->enter($__internal_45d07cfa9595094a5534d8b6d7f12a710102b956881be6b5eca3e6d8a0f5c3dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/flash_messages.html.twig"));

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
        
        $__internal_45d07cfa9595094a5534d8b6d7f12a710102b956881be6b5eca3e6d8a0f5c3dd->leave($__internal_45d07cfa9595094a5534d8b6d7f12a710102b956881be6b5eca3e6d8a0f5c3dd_prof);

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
