<?php

/* frontend/default/index.html.twig */
class __TwigTemplate_c2c4d79a95767a5c464dd9f4f7c71f8aec4c7ed2c0fbb153ea617341c94fed38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("frontend/base.html.twig", "frontend/default/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "frontend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b3b7e72720ffe73a3b4bcfe3628963aea2f7cc3c64551d4b8c3595a03217d16a = $this->env->getExtension("native_profiler");
        $__internal_b3b7e72720ffe73a3b4bcfe3628963aea2f7cc3c64551d4b8c3595a03217d16a->enter($__internal_b3b7e72720ffe73a3b4bcfe3628963aea2f7cc3c64551d4b8c3595a03217d16a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontend/default/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b3b7e72720ffe73a3b4bcfe3628963aea2f7cc3c64551d4b8c3595a03217d16a->leave($__internal_b3b7e72720ffe73a3b4bcfe3628963aea2f7cc3c64551d4b8c3595a03217d16a_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_b194fd410dfbaad4873868456e69ae626e2ab2875a8cf31fa45c8d0e65b8b771 = $this->env->getExtension("native_profiler");
        $__internal_b194fd410dfbaad4873868456e69ae626e2ab2875a8cf31fa45c8d0e65b8b771->enter($__internal_b194fd410dfbaad4873868456e69ae626e2ab2875a8cf31fa45c8d0e65b8b771_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
    <div class=\"container\">
     
     ";
        // line 7
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AppBundle:Frontend/Navigation:show", array("params" => array("code" => "top_menu"))));
        echo "

      <!-- Jumbotron -->
      <div class=\"jumbotron\">
        <h1>Marketing stuff!</h1>
        <p class=\"lead\">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
        <p><a class=\"btn btn-lg btn-success\" href=\"#\" role=\"button\">Get started today</a></p>
      </div>
      
      
      ";
        // line 17
        if (array_key_exists("entity", $context)) {
            // line 18
            echo "      <div class=\"row\">
        <div class=\"col-lg-12\">
          <h2>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "title", array()), "html", null, true);
            echo "</h2>
          ";
            // line 21
            echo $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "content", array());
            echo "
        </div>
      </div>
      ";
        }
        // line 25
        echo "      

      <!-- Example row of columns -->
      <div class=\"row\">
        <div class=\"col-lg-4\">
          <h2>Safari bug warning!</h2>
          <p class=\"text-danger\">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class=\"btn btn-primary\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div>
        <div class=\"col-lg-4\">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class=\"btn btn-primary\" href=\"#\" role=\"button\">View details &raquo;</a></p>
       </div>
        <div class=\"col-lg-4\">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class=\"btn btn-primary\" href=\"#\" role=\"button\">View details &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      <footer class=\"footer\">
        <p>&copy; 2015 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->
    
    
";
        
        $__internal_b194fd410dfbaad4873868456e69ae626e2ab2875a8cf31fa45c8d0e65b8b771->leave($__internal_b194fd410dfbaad4873868456e69ae626e2ab2875a8cf31fa45c8d0e65b8b771_prof);

    }

    // line 57
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_28a8da114c960b17bd23e84138e56564897edf6a96325957eee66d4cc739d0e9 = $this->env->getExtension("native_profiler");
        $__internal_28a8da114c960b17bd23e84138e56564897edf6a96325957eee66d4cc739d0e9->enter($__internal_28a8da114c960b17bd23e84138e56564897edf6a96325957eee66d4cc739d0e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 58
        echo "
";
        
        $__internal_28a8da114c960b17bd23e84138e56564897edf6a96325957eee66d4cc739d0e9->leave($__internal_28a8da114c960b17bd23e84138e56564897edf6a96325957eee66d4cc739d0e9_prof);

    }

    public function getTemplateName()
    {
        return "frontend/default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 58,  113 => 57,  76 => 25,  69 => 21,  65 => 20,  61 => 18,  59 => 17,  46 => 7,  41 => 4,  35 => 3,  11 => 1,);
    }
}
/* {% extends 'frontend/base.html.twig' %}*/
/* */
/* {% block body %}*/
/* */
/*     <div class="container">*/
/*      */
/*      {{ render_esi(controller('AppBundle:Frontend/Navigation:show', { 'params': {'code': 'top_menu'} })) }}*/
/* */
/*       <!-- Jumbotron -->*/
/*       <div class="jumbotron">*/
/*         <h1>Marketing stuff!</h1>*/
/*         <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>*/
/*         <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>*/
/*       </div>*/
/*       */
/*       */
/*       {% if entity is defined %}*/
/*       <div class="row">*/
/*         <div class="col-lg-12">*/
/*           <h2>{{entity.title}}</h2>*/
/*           {{entity.content|raw}}*/
/*         </div>*/
/*       </div>*/
/*       {% endif %}*/
/*       */
/* */
/*       <!-- Example row of columns -->*/
/*       <div class="row">*/
/*         <div class="col-lg-4">*/
/*           <h2>Safari bug warning!</h2>*/
/*           <p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>*/
/*           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>*/
/*           <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>*/
/*         </div>*/
/*         <div class="col-lg-4">*/
/*           <h2>Heading</h2>*/
/*           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>*/
/*           <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>*/
/*        </div>*/
/*         <div class="col-lg-4">*/
/*           <h2>Heading</h2>*/
/*           <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>*/
/*           <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>*/
/*         </div>*/
/*       </div>*/
/* */
/*       <!-- Site footer -->*/
/*       <footer class="footer">*/
/*         <p>&copy; 2015 Company, Inc.</p>*/
/*       </footer>*/
/* */
/*     </div> <!-- /container -->*/
/*     */
/*     */
/* {% endblock %}*/
/* */
/* {% block stylesheets %}*/
/* */
/* {% endblock %}*/
/* */