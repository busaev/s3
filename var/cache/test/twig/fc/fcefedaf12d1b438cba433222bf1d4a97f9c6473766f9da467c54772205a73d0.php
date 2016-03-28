<?php

/* backend/entity/index.html.twig */
class __TwigTemplate_ec83456a54eda8be3e8d65804eaf7e0842933ea7ecb4f16ba4519ed129f74ffd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("backend/base.html.twig", "backend/entity/index.html.twig", 1);
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
        $__internal_15e6d7e21de561dc2a86e0664fb4258e42bcd9ecc76b337f467fb5670bc8986f = $this->env->getExtension("native_profiler");
        $__internal_15e6d7e21de561dc2a86e0664fb4258e42bcd9ecc76b337f467fb5670bc8986f->enter($__internal_15e6d7e21de561dc2a86e0664fb4258e42bcd9ecc76b337f467fb5670bc8986f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/entity/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_15e6d7e21de561dc2a86e0664fb4258e42bcd9ecc76b337f467fb5670bc8986f->leave($__internal_15e6d7e21de561dc2a86e0664fb4258e42bcd9ecc76b337f467fb5670bc8986f_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_0c1e189a653c24c2607a70d5f9d3a1cf76a430d4a6da29c3bc7e53ca125c0fee = $this->env->getExtension("native_profiler");
        $__internal_0c1e189a653c24c2607a70d5f9d3a1cf76a430d4a6da29c3bc7e53ca125c0fee->enter($__internal_0c1e189a653c24c2607a70d5f9d3a1cf76a430d4a6da29c3bc7e53ca125c0fee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    
    ";
        // line 5
        echo $this->env->getExtension('app_extension')->actions($this->env, (isset($context["entityCode"]) ? $context["entityCode"] : $this->getContext($context, "entityCode")), "list");
        echo "
                    
    ";
        // line 7
        $this->loadTemplate("backend/flash_messages.html.twig", "backend/entity/index.html.twig", 7)->display($context);
        // line 8
        echo "
    <div class=\"row\">
        <div class=\"col-lg-12\">
        
            ";
        // line 12
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : null), "object", array(), "any", false, true), "data", array(), "any", false, true), "title", array(), "any", true, true)) {
            // line 13
            echo "                <h1>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(twig_capitalize_string_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "object", array()), "data", array()), "title", array()))), array(), "global"), "html", null, true);
            echo "</h1>
            ";
        } else {
            // line 15
            echo "                <h1></h1>
            ";
        }
        // line 17
        echo "            <table class=\"table table-hover table-striped\" id=\"entities-list\">
                <thead>
                    <tr>
                        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "fields", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 21
            echo "                            <th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "titles", array()), $context["field"], array(), "array"), array(), "backend"), "html", null, true);
            echo "</th>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "                        <th>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Actions", array(), "backend"), "html", null, true);
        echo "</th>
                    </tr>
                </thead>
                <tbody>
                ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "entities", array()));
        foreach ($context['_seq'] as $context["idx"] => $context["entity"]) {
            // line 28
            echo "                    <tr>
                        ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "fields", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 30
                echo "                            ";
                if (($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "dataTypes", array()), $context["field"], array(), "array") == "string")) {
                    // line 31
                    echo "                                <td>";
                    echo $this->getAttribute($context["entity"], $context["field"], array(), "array");
                    echo "</td>
                            ";
                } elseif (($this->getAttribute($this->getAttribute(                // line 32
(isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "dataTypes", array()), $context["field"], array(), "array") == "array")) {
                    // line 33
                    echo "                                <td>
                                    ";
                    // line 34
                    if (twig_test_iterable($this->getAttribute($context["entity"], $context["field"]))) {
                        // line 35
                        echo "                                        ";
                        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["entity"], $context["field"], array(), "array"), ", "), "html", null, true);
                        echo "
                                    ";
                    }
                    // line 36
                    echo "    
                                </td>
                            ";
                } elseif (($this->getAttribute($this->getAttribute(                // line 38
(isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "dataTypes", array()), $context["field"], array(), "array") == "boolean")) {
                    // line 39
                    echo "                                <td class=\"text-center\">
                                    ";
                    // line 40
                    if (($this->getAttribute($context["entity"], $context["field"], array(), "array") == 1)) {
                        // line 41
                        echo "                                        <i class=\"fa fa-check-square-o\"></i>
                                    ";
                    } else {
                        // line 43
                        echo "                                        <i class=\"fa fa-square-o\"></i>
                                    ";
                    }
                    // line 45
                    echo "                                </td>
                            ";
                } else {
                    // line 47
                    echo "                                <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], $context["field"], array(), "array"), "html", null, true);
                    echo "</td>
                            ";
                }
                // line 49
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "                        <td>
                            <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
                                ";
            // line 53
            echo "                                ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : null), "object", array(), "any", false, true), "data", array(), "any", false, true), "actions", array(), "any", false, true), "backend", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "object", array()), "data", array()), "actions", array()), "backend", array())) > 0))) {
                // line 54
                echo "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")), "object", array()), "data", array()), "actions", array()), "backend", array()));
                foreach ($context['_seq'] as $context["actionCode"] => $context["action"]) {
                    // line 55
                    echo "                                        ";
                    $context["params"] = array();
                    // line 56
                    echo "                                        ";
                    if (($this->getAttribute($context["action"], "params", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute($context["action"], "params", array())) > 0))) {
                        // line 57
                        echo "                                            ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["action"], "params", array()));
                        foreach ($context['_seq'] as $context["key"] => $context["param"]) {
                            // line 58
                            echo "                                                ";
                            // line 59
                            echo "                                                ";
                            if ($this->getAttribute($context["entity"], $context["param"], array(), "array", true, true)) {
                                // line 60
                                echo "                                                    ";
                                $context["params"] = twig_array_merge((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), array($context["key"] => $this->getAttribute($context["entity"], $context["param"])));
                                // line 61
                                echo "                                                ";
                                // line 62
                                echo "                                                ";
                            } else {
                                // line 63
                                echo "                                                    ";
                                $context["params"] = twig_array_merge((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), array($context["key"] => $context["param"]));
                                // line 64
                                echo "                                                ";
                            }
                            // line 65
                            echo "                                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['param'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 66
                        echo "                                        ";
                    }
                    // line 67
                    echo "                                        <a class=\"btn btn-default btn-sm\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($context["action"], "route_name", array()), (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))), "html", null, true);
                    echo "\"  title=\"\" data-placement=\"bottom\" data-toggle=\"tooltip\" type=\"button\" ";
                    if ($this->getAttribute($context["action"], "title", array(), "any", true, true)) {
                        echo "data-original-title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["action"], "title", array()), array(), "backend"), "html", null, true);
                        echo "\"";
                    }
                    echo ">
                                            ";
                    // line 68
                    if ($this->getAttribute($context["action"], "icon", array(), "any", true, true)) {
                        echo "<i class=\"fa ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                        echo "\"></i>";
                    }
                    // line 69
                    echo "                                        </a>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['actionCode'], $context['action'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 71
                echo "                                ";
                // line 72
                echo "                                ";
            } else {
                // line 73
                echo "                                    <a class=\"btn btn-default btn-sm\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_content_entry_show", array("entityCode" => (isset($context["entityCode"]) ? $context["entityCode"] : $this->getContext($context, "entityCode")), "id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\"  title=\"\" data-placement=\"bottom\" data-toggle=\"tooltip\" type=\"button\" data-original-title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Show", array(), "backend"), "html", null, true);
                echo "\">
                                        <i class=\"fa fa-search\"></i>
                                    </a>
                                    <a class=\"btn btn-default btn-sm\" href=\"";
                // line 76
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_content_entry_edit", array("entityCode" => (isset($context["entityCode"]) ? $context["entityCode"] : $this->getContext($context, "entityCode")), "id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\"  title=\"\" data-placement=\"bottom\" data-toggle=\"tooltip\" type=\"button\" data-original-title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edit", array(), "backend"), "html", null, true);
                echo "\">
                                        <i class=\"fa fa-pencil\"></i>
                                    </a>
                                    <a class=\"btn btn-default btn-sm\" href=\"";
                // line 79
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_content_entry_history", array("entityCode" => (isset($context["entityCode"]) ? $context["entityCode"] : $this->getContext($context, "entityCode")), "id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\"  title=\"\" data-placement=\"bottom\" data-toggle=\"tooltip\" type=\"button\" data-original-title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("History", array(), "backend"), "html", null, true);
                echo "\">
                                        <i class=\"fa fa-history\"></i>
                                    </a>
                                ";
            }
            // line 82
            echo "    
                            </div>                        
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['idx'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "                </tbody>
            </table>
                
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->       
 
";
        
        $__internal_0c1e189a653c24c2607a70d5f9d3a1cf76a430d4a6da29c3bc7e53ca125c0fee->leave($__internal_0c1e189a653c24c2607a70d5f9d3a1cf76a430d4a6da29c3bc7e53ca125c0fee_prof);

    }

    // line 97
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_63c5c1a24e8f97c5dff71f7e903e46bb8139d04db6f5d004b26e6b086a54096e = $this->env->getExtension("native_profiler");
        $__internal_63c5c1a24e8f97c5dff71f7e903e46bb8139d04db6f5d004b26e6b086a54096e->enter($__internal_63c5c1a24e8f97c5dff71f7e903e46bb8139d04db6f5d004b26e6b086a54096e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 98
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "7531452_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7531452_0") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/login_login_1.css");
            // line 102
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
            // asset "7531452_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7531452_1") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/login_common_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
            // asset "7531452_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7531452_2") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/login_entities_3.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        } else {
            // asset "7531452"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7531452") : $this->env->getExtension('asset')->getAssetUrl("css/compiled/login.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" />
    ";
        }
        unset($context["asset_url"]);
        
        $__internal_63c5c1a24e8f97c5dff71f7e903e46bb8139d04db6f5d004b26e6b086a54096e->leave($__internal_63c5c1a24e8f97c5dff71f7e903e46bb8139d04db6f5d004b26e6b086a54096e_prof);

    }

    // line 106
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_daf79a1dc3e8ab639d14d794c458282f987cbba3917aa5c2bac39343d3286ab6 = $this->env->getExtension("native_profiler");
        $__internal_daf79a1dc3e8ab639d14d794c458282f987cbba3917aa5c2bac39343d3286ab6->enter($__internal_daf79a1dc3e8ab639d14d794c458282f987cbba3917aa5c2bac39343d3286ab6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 107
        echo "    <script>
        \$(document).ready(function() {
            \$('#entities-list').DataTable({
                responsive: true,
                \"language\": {
                    \"url\": \"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json\"
                }
            });
            \$('.btn-group').tooltip({
                selector: \"[data-toggle=tooltip]\",
                container: \"body\"
            })
            ";
        // line 124
        echo "        } );
    </script>
";
        
        $__internal_daf79a1dc3e8ab639d14d794c458282f987cbba3917aa5c2bac39343d3286ab6->leave($__internal_daf79a1dc3e8ab639d14d794c458282f987cbba3917aa5c2bac39343d3286ab6_prof);

    }

    public function getTemplateName()
    {
        return "backend/entity/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  356 => 124,  342 => 107,  336 => 106,  305 => 102,  300 => 98,  294 => 97,  279 => 87,  269 => 82,  260 => 79,  252 => 76,  243 => 73,  240 => 72,  238 => 71,  231 => 69,  225 => 68,  214 => 67,  211 => 66,  205 => 65,  202 => 64,  199 => 63,  196 => 62,  194 => 61,  191 => 60,  188 => 59,  186 => 58,  181 => 57,  178 => 56,  175 => 55,  170 => 54,  167 => 53,  163 => 50,  157 => 49,  151 => 47,  147 => 45,  143 => 43,  139 => 41,  137 => 40,  134 => 39,  132 => 38,  128 => 36,  122 => 35,  120 => 34,  117 => 33,  115 => 32,  110 => 31,  107 => 30,  103 => 29,  100 => 28,  96 => 27,  88 => 23,  79 => 21,  75 => 20,  70 => 17,  66 => 15,  60 => 13,  58 => 12,  52 => 8,  50 => 7,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'backend/base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     */
/*     {{ actions(entityCode, 'list') }}*/
/*                     */
/*     {% include 'backend/flash_messages.html.twig' %}*/
/* */
/*     <div class="row">*/
/*         <div class="col-lg-12">*/
/*         */
/*             {% if entities.object.data.title is defined %}*/
/*                 <h1>{{ entities.object.data.title|lower|capitalize|trans({}, "global") }}</h1>*/
/*             {% else %}*/
/*                 <h1></h1>*/
/*             {% endif %}*/
/*             <table class="table table-hover table-striped" id="entities-list">*/
/*                 <thead>*/
/*                     <tr>*/
/*                         {% for field in entities.fields %}*/
/*                             <th>{{ entities.titles[field]|trans({}, "backend") }}</th>*/
/*                         {% endfor %}*/
/*                         <th>{{ 'Actions'|trans({}, "backend") }}</th>*/
/*                     </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 {% for idx, entity in entities.entities %}*/
/*                     <tr>*/
/*                         {% for field in entities.fields %}*/
/*                             {% if entities.dataTypes[field] == 'string' %}*/
/*                                 <td>{{ entity[field]|raw }}</td>*/
/*                             {% elseif entities.dataTypes[field] == 'array' %}*/
/*                                 <td>*/
/*                                     {% if attribute(entity, field) is iterable %}*/
/*                                         {{ entity[field]|join(', ') }}*/
/*                                     {% endif %}    */
/*                                 </td>*/
/*                             {% elseif entities.dataTypes[field] == 'boolean' %}*/
/*                                 <td class="text-center">*/
/*                                     {% if entity[field] == 1 %}*/
/*                                         <i class="fa fa-check-square-o"></i>*/
/*                                     {% else %}*/
/*                                         <i class="fa fa-square-o"></i>*/
/*                                     {% endif %}*/
/*                                 </td>*/
/*                             {% else %}*/
/*                                 <td>{{ entity[field] }}</td>*/
/*                             {% endif %}*/
/*                         {% endfor %}*/
/*                         <td>*/
/*                             <div class="btn-group" role="group" aria-label="...">*/
/*                                 {# Кнопки пришедшие из аннотаций #}*/
/*                                 {% if  entities.object.data.actions.backend is defined and entities.object.data.actions.backend|length > 0%}*/
/*                                     {% for actionCode, action in entities.object.data.actions.backend %}*/
/*                                         {% set params = [] %}*/
/*                                         {% if action.params is defined and action.params|length > 0 %}*/
/*                                             {% for key, param in action.params %}*/
/*                                                 {# если свойство param у сущности есть - получаем его #}*/
/*                                                 {% if entity[param] is defined %}*/
/*                                                     {% set params = params|merge({(key): attribute(entity, param)}) %}*/
/*                                                 {# если нет - подстовляем его значение как есть #}*/
/*                                                 {% else %}*/
/*                                                     {% set params = params|merge({(key): (param)}) %}*/
/*                                                 {% endif %}*/
/*                                             {% endfor %}*/
/*                                         {% endif %}*/
/*                                         <a class="btn btn-default btn-sm" href="{{ path(action.route_name, params) }}"  title="" data-placement="bottom" data-toggle="tooltip" type="button" {% if action.title is defined %}data-original-title="{{ action.title|trans({}, "backend") }}"{% endif %}>*/
/*                                             {% if action.icon is defined %}<i class="fa {{action.icon}}"></i>{% endif %}*/
/*                                         </a>*/
/*                                     {% endfor %}*/
/*                                 {# Кнопки стандартные #}*/
/*                                 {% else %}*/
/*                                     <a class="btn btn-default btn-sm" href="{{ path('backend_content_entry_show', { 'entityCode': entityCode, 'id': entity.id }) }}"  title="" data-placement="bottom" data-toggle="tooltip" type="button" data-original-title="{{ 'Show'|trans({}, "backend") }}">*/
/*                                         <i class="fa fa-search"></i>*/
/*                                     </a>*/
/*                                     <a class="btn btn-default btn-sm" href="{{ path('backend_content_entry_edit', { 'entityCode': entityCode, 'id': entity.id }) }}"  title="" data-placement="bottom" data-toggle="tooltip" type="button" data-original-title="{{ 'Edit'|trans({}, "backend") }}">*/
/*                                         <i class="fa fa-pencil"></i>*/
/*                                     </a>*/
/*                                     <a class="btn btn-default btn-sm" href="{{ path('backend_content_entry_history', { 'entityCode': entityCode, 'id': entity.id }) }}"  title="" data-placement="bottom" data-toggle="tooltip" type="button" data-original-title="{{ 'History'|trans({}, "backend") }}">*/
/*                                         <i class="fa fa-history"></i>*/
/*                                     </a>*/
/*                                 {% endif %}    */
/*                             </div>                        */
/*                         </td>*/
/*                     </tr>*/
/*                 {% endfor %}*/
/*                 </tbody>*/
/*             </table>*/
/*                 */
/*         </div>*/
/*         <!-- /.col-lg-12 -->*/
/*     </div>*/
/*     <!-- /.row -->       */
/*  */
/* {% endblock %}*/
/* */
/* {% block stylesheets %}*/
/*     {% stylesheets '../app/Resources/public/backend/css/login.css'*/
/*                    '../app/Resources/public/backend/css/common.css' */
/*                    '../app/Resources/public/backend/css/entities.css' */
/*       filter='cssrewrite' output="css/compiled/login.css" %}*/
/*         <link href="{{ asset_url }}" rel="stylesheet" />*/
/*     {% endstylesheets %}*/
/* {% endblock stylesheets %}*/
/* */
/* {% block javascripts %}*/
/*     <script>*/
/*         $(document).ready(function() {*/
/*             $('#entities-list').DataTable({*/
/*                 responsive: true,*/
/*                 "language": {*/
/*                     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"*/
/*                 }*/
/*             });*/
/*             $('.btn-group').tooltip({*/
/*                 selector: "[data-toggle=tooltip]",*/
/*                 container: "body"*/
/*             })*/
/*             {#$('#entities-actions').affix({*/
/*                 offset: {*/
/*                   top: 0*/
/*                 }*/
/*             })#}*/
/*         } );*/
/*     </script>*/
/* {% endblock javascripts %}*/
