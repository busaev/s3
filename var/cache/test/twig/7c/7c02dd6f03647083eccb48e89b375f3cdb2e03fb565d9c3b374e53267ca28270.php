<?php

/* backend/navigation.html.twig */
class __TwigTemplate_df0c6addba261b0cf76017bd79c9b413b5c272ca1577d72c467925f0c8df7cb3 extends Twig_Template
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
        $__internal_b78870e03842d72df2d0fc63f434b145b1976d9c13f5ed74653faf6f9ef1976c = $this->env->getExtension("native_profiler");
        $__internal_b78870e03842d72df2d0fc63f434b145b1976d9c13f5ed74653faf6f9ef1976c->enter($__internal_b78870e03842d72df2d0fc63f434b145b1976d9c13f5ed74653faf6f9ef1976c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "backend/navigation.html.twig"));

        // line 1
        echo "<!-- Navigation -->
<nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
    <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </button>
        <a class=\"navbar-brand\" href=\"index.html\">WYCMS</a>
    </div>
    <!-- /.navbar-header -->

    <ul class=\"nav navbar-top-links navbar-right\">
        <li class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                <i class=\"fa fa-plus fa-fw\"></i>  <i class=\"fa fa-caret-down\"></i>
            </a>
            <ul class=\"dropdown-menu dropdown-new-actions\">
                <li>
                    <a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("backend_content_entry_new", array("entityCode" => "news"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("News", array(), "global"), "html", null, true);
        echo "</a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("backend_content_entry_new", array("entityCode" => "page"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Page", array(), "global"), "html", null, true);
        echo "</a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("backend_content_entry_new", array("entityCode" => "vendor"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brends", array(), "global"), "html", null, true);
        echo "</a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"/app_dev.php/backend/user/new\">";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Users", array(), "global"), "html", null, true);
        echo "</a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <li class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                <i class=\"fa fa-envelope fa-fw\"></i>  <i class=\"fa fa-caret-down\"></i>
            </a>
            <ul class=\"dropdown-menu dropdown-messages\">
                <li>
                    <a href=\"#\">
                        <div>
                            <strong>John Smith</strong>
                            <span class=\"pull-right text-muted\">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <strong>John Smith</strong>
                            <span class=\"pull-right text-muted\">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <strong>John Smith</strong>
                            <span class=\"pull-right text-muted\">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a class=\"text-center\" href=\"#\">
                        <strong>Read All Messages</strong>
                        <i class=\"fa fa-angle-right\"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                <i class=\"fa fa-tasks fa-fw\"></i>  <i class=\"fa fa-caret-down\"></i>
            </a>
            <ul class=\"dropdown-menu dropdown-tasks\">
                <li>
                    <a href=\"#\">
                        <div>
                            <p>
                                <strong>Task 1</strong>
                                <span class=\"pull-right text-muted\">40% Complete</span>
                            </p>
                            <div class=\"progress progress-striped active\">
                                <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"40\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 40%\">
                                    <span class=\"sr-only\">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <p>
                                <strong>Task 2</strong>
                                <span class=\"pull-right text-muted\">20% Complete</span>
                            </p>
                            <div class=\"progress progress-striped active\">
                                <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 20%\">
                                    <span class=\"sr-only\">20% Complete</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <p>
                                <strong>Task 3</strong>
                                <span class=\"pull-right text-muted\">60% Complete</span>
                            </p>
                            <div class=\"progress progress-striped active\">
                                <div class=\"progress-bar progress-bar-warning\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 60%\">
                                    <span class=\"sr-only\">60% Complete (warning)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <p>
                                <strong>Task 4</strong>
                                <span class=\"pull-right text-muted\">80% Complete</span>
                            </p>
                            <div class=\"progress progress-striped active\">
                                <div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"80\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 80%\">
                                    <span class=\"sr-only\">80% Complete (danger)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a class=\"text-center\" href=\"#\">
                        <strong>See All Tasks</strong>
                        <i class=\"fa fa-angle-right\"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                <i class=\"fa fa-bell fa-fw\"></i>  <i class=\"fa fa-caret-down\"></i>
            </a>
            <ul class=\"dropdown-menu dropdown-alerts\">
                <li>
                    <a href=\"#\">
                        <div>
                            <i class=\"fa fa-comment fa-fw\"></i> New Comment
                            <span class=\"pull-right text-muted small\">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <i class=\"fa fa-twitter fa-fw\"></i> 3 New Followers
                            <span class=\"pull-right text-muted small\">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <i class=\"fa fa-envelope fa-fw\"></i> Message Sent
                            <span class=\"pull-right text-muted small\">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <i class=\"fa fa-tasks fa-fw\"></i> New Task
                            <span class=\"pull-right text-muted small\">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a href=\"#\">
                        <div>
                            <i class=\"fa fa-upload fa-fw\"></i> Server Rebooted
                            <span class=\"pull-right text-muted small\">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class=\"divider\"></li>
                <li>
                    <a class=\"text-center\" href=\"#\">
                        <strong>See All Alerts</strong>
                        <i class=\"fa fa-angle-right\"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class=\"dropdown\">
            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                <i class=\"fa fa-user fa-fw\"></i>  <i class=\"fa fa-caret-down\"></i>
            </a>
            <ul class=\"dropdown-menu dropdown-user\">
                <li><a href=\"#\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>
                </li>
                <li><a href=\"#\"><i class=\"fa fa-gear fa-fw\"></i> Settings</a>
                </li>
                <li class=\"divider\"></li>
                <li><a href=\"";
        // line 238
        echo $this->env->getExtension('routing')->getPath("backend_security_logout");
        echo "\"><i class=\"fa fa-sign-out fa-fw\"></i> Выход</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class=\"navbar-default sidebar\" role=\"navigation\">
        <div class=\"sidebar-nav navbar-collapse\">
            <ul class=\"nav\" id=\"side-menu\">
                <li class=\"sidebar-search\">
                    <div class=\"input-group custom-search-form\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"";
        // line 252
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Search", array(), "global"), "html", null, true);
        echo "...\">
                        <span class=\"input-group-btn\">
                        <button class=\"btn btn-default\" type=\"button\">
                            <i class=\"fa fa-search\"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href=\"";
        // line 262
        echo $this->env->getExtension('routing')->getPath("backend_index_index");
        echo "\"><i class=\"fa fa-dashboard fa-fw\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dashboard", array(), "backend"), "html", null, true);
        echo "</a>
                </li>
                <li>
                    <a href=\"#\"><i class=\"fa fa-cubes fa-fw\"></i> ";
        // line 265
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Contents", array(), "backend"), "html", null, true);
        echo "<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"";
        // line 268
        echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "news"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("News", array(), "global"), "html", null, true);
        echo "</a>
                        </li>
                        <li>
                            <a href=\"";
        // line 271
        echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "page"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Page", array(), "global"), "html", null, true);
        echo "</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href=\"#\"><i class=\"fa fa-suitcase fa-fw\"></i> ";
        // line 277
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shop", array(), "backend"), "html", null, true);
        echo "<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"";
        // line 280
        echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "attribute"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Attributes", array(), "global"), "html", null, true);
        echo "</a>
                        </li>
                        <li>
                            <a href=\"";
        // line 283
        echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "vendor"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brends", array(), "global"), "html", null, true);
        echo "</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href=\"";
        // line 289
        echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "user"));
        echo "\"><i class=\"fa fa-users fa-fw\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Users", array(), "global"), "html", null, true);
        echo "</a>
                </li>
                <li>
                    <a href=\"#\"><i class=\"fa fa-suitcase fa-fw\"></i> ";
        // line 292
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Scrolls", array(), "global"), "html", null, true);
        echo "<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"";
        // line 295
        echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "scroll"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Scrolls", array(), "global"), "html", null, true);
        echo "</a>
                        </li>
                        <li>
                            <a href=\"";
        // line 298
        echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "scroll_item"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Scroll items", array(), "global"), "html", null, true);
        echo "</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                ";
        // line 303
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 304
            echo "                <li>
                    <a href=\"#\"><i class=\"fa fa-suitcase fa-fw\"></i> ";
            // line 305
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administration", array(), "backend"), "html", null, true);
            echo "<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"";
            // line 308
            echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "content"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Contents", array(), "global"), "html", null, true);
            echo "</a>
                        </li>
                        <li>
                            <a href=\"";
            // line 311
            echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "content_page"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Content Pages", array(), "global"), "html", null, true);
            echo "</a>
                        </li>
                        <li>
                            <a href=\"";
            // line 314
            echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "navigation"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Navigation", array(), "global"), "html", null, true);
            echo "</a>
                        </li>
                        <li>
                            <a href=\"";
            // line 317
            echo $this->env->getExtension('routing')->getPath("backend_content_entry", array("entityCode" => "navigation_item"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Navigation items", array(), "global"), "html", null, true);
            echo "</a>
                        </li>
                    </ul>
                </li>
                ";
        }
        // line 322
        echo "                <li>
                    <a href=\"#\"><i class=\"fa fa-bar-chart-o fa-fw\"></i> Charts<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"flot.html\">Flot Charts</a>
                        </li>
                        <li>
                            <a href=\"morris.html\">Morris.js Charts</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href=\"tables.html\"><i class=\"fa fa-table fa-fw\"></i> Tables</a>
                </li>
                <li>
                    <a href=\"forms.html\"><i class=\"fa fa-edit fa-fw\"></i> Forms</a>
                </li>
                <li>
                    <a href=\"#\"><i class=\"fa fa-wrench fa-fw\"></i> UI Elements<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"panels-wells.html\">Panels and Wells</a>
                        </li>
                        <li>
                            <a href=\"buttons.html\">Buttons</a>
                        </li>
                        <li>
                            <a href=\"notifications.html\">Notifications</a>
                        </li>
                        <li>
                            <a href=\"typography.html\">Typography</a>
                        </li>
                        <li>
                            <a href=\"icons.html\"> Icons</a>
                        </li>
                        <li>
                            <a href=\"grid.html\">Grid</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href=\"#\"><i class=\"fa fa-sitemap fa-fw\"></i> Multi-Level Dropdown<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"#\">Second Level Item</a>
                        </li>
                        <li>
                            <a href=\"#\">Second Level Item</a>
                        </li>
                        <li>
                            <a href=\"#\">Third Level <span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-third-level\">
                                <li>
                                    <a href=\"#\">Third Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Third Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Third Level Item</a>
                                </li>
                                <li>
                                    <a href=\"#\">Third Level Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href=\"#\"><i class=\"fa fa-files-o fa-fw\"></i> Sample Pages<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"blank.html\">Blank Page</a>
                        </li>
                        <li>
                            <a href=\"login.html\">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>";
        
        $__internal_b78870e03842d72df2d0fc63f434b145b1976d9c13f5ed74653faf6f9ef1976c->leave($__internal_b78870e03842d72df2d0fc63f434b145b1976d9c13f5ed74653faf6f9ef1976c_prof);

    }

    public function getTemplateName()
    {
        return "backend/navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  444 => 322,  434 => 317,  426 => 314,  418 => 311,  410 => 308,  404 => 305,  401 => 304,  399 => 303,  389 => 298,  381 => 295,  375 => 292,  367 => 289,  356 => 283,  348 => 280,  342 => 277,  331 => 271,  323 => 268,  317 => 265,  309 => 262,  296 => 252,  279 => 238,  71 => 33,  62 => 29,  53 => 25,  44 => 21,  22 => 1,);
    }
}
/* <!-- Navigation -->*/
/* <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">*/
/*     <div class="navbar-header">*/
/*         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">*/
/*             <span class="sr-only">Toggle navigation</span>*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*         </button>*/
/*         <a class="navbar-brand" href="index.html">WYCMS</a>*/
/*     </div>*/
/*     <!-- /.navbar-header -->*/
/* */
/*     <ul class="nav navbar-top-links navbar-right">*/
/*         <li class="dropdown">*/
/*             <a class="dropdown-toggle" data-toggle="dropdown" href="#">*/
/*                 <i class="fa fa-plus fa-fw"></i>  <i class="fa fa-caret-down"></i>*/
/*             </a>*/
/*             <ul class="dropdown-menu dropdown-new-actions">*/
/*                 <li>*/
/*                     <a href="{{ path('backend_content_entry_new', {'entityCode': 'news'}) }}">{{ 'News'|trans({}, "global") }}</a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="{{ path('backend_content_entry_new', {'entityCode': 'page'}) }}">{{ 'Page'|trans({}, "global") }}</a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="{{ path('backend_content_entry_new', {'entityCode': 'vendor'}) }}">{{ 'Brends'|trans({}, "global") }}</a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="/app_dev.php/backend/user/new">{{ 'Users'|trans({}, "global") }}</a>*/
/*                 </li>*/
/*             </ul>*/
/*             <!-- /.dropdown-messages -->*/
/*         </li>*/
/*         <li class="dropdown">*/
/*             <a class="dropdown-toggle" data-toggle="dropdown" href="#">*/
/*                 <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>*/
/*             </a>*/
/*             <ul class="dropdown-menu dropdown-messages">*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <strong>John Smith</strong>*/
/*                             <span class="pull-right text-muted">*/
/*                                 <em>Yesterday</em>*/
/*                             </span>*/
/*                         </div>*/
/*                         <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <strong>John Smith</strong>*/
/*                             <span class="pull-right text-muted">*/
/*                                 <em>Yesterday</em>*/
/*                             </span>*/
/*                         </div>*/
/*                         <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <strong>John Smith</strong>*/
/*                             <span class="pull-right text-muted">*/
/*                                 <em>Yesterday</em>*/
/*                             </span>*/
/*                         </div>*/
/*                         <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a class="text-center" href="#">*/
/*                         <strong>Read All Messages</strong>*/
/*                         <i class="fa fa-angle-right"></i>*/
/*                     </a>*/
/*                 </li>*/
/*             </ul>*/
/*             <!-- /.dropdown-messages -->*/
/*         </li>*/
/*         <!-- /.dropdown -->*/
/*         <li class="dropdown">*/
/*             <a class="dropdown-toggle" data-toggle="dropdown" href="#">*/
/*                 <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>*/
/*             </a>*/
/*             <ul class="dropdown-menu dropdown-tasks">*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <p>*/
/*                                 <strong>Task 1</strong>*/
/*                                 <span class="pull-right text-muted">40% Complete</span>*/
/*                             </p>*/
/*                             <div class="progress progress-striped active">*/
/*                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">*/
/*                                     <span class="sr-only">40% Complete (success)</span>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <p>*/
/*                                 <strong>Task 2</strong>*/
/*                                 <span class="pull-right text-muted">20% Complete</span>*/
/*                             </p>*/
/*                             <div class="progress progress-striped active">*/
/*                                 <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">*/
/*                                     <span class="sr-only">20% Complete</span>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <p>*/
/*                                 <strong>Task 3</strong>*/
/*                                 <span class="pull-right text-muted">60% Complete</span>*/
/*                             </p>*/
/*                             <div class="progress progress-striped active">*/
/*                                 <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">*/
/*                                     <span class="sr-only">60% Complete (warning)</span>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <p>*/
/*                                 <strong>Task 4</strong>*/
/*                                 <span class="pull-right text-muted">80% Complete</span>*/
/*                             </p>*/
/*                             <div class="progress progress-striped active">*/
/*                                 <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">*/
/*                                     <span class="sr-only">80% Complete (danger)</span>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a class="text-center" href="#">*/
/*                         <strong>See All Tasks</strong>*/
/*                         <i class="fa fa-angle-right"></i>*/
/*                     </a>*/
/*                 </li>*/
/*             </ul>*/
/*             <!-- /.dropdown-tasks -->*/
/*         </li>*/
/*         <!-- /.dropdown -->*/
/*         <li class="dropdown">*/
/*             <a class="dropdown-toggle" data-toggle="dropdown" href="#">*/
/*                 <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>*/
/*             </a>*/
/*             <ul class="dropdown-menu dropdown-alerts">*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <i class="fa fa-comment fa-fw"></i> New Comment*/
/*                             <span class="pull-right text-muted small">4 minutes ago</span>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <i class="fa fa-twitter fa-fw"></i> 3 New Followers*/
/*                             <span class="pull-right text-muted small">12 minutes ago</span>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <i class="fa fa-envelope fa-fw"></i> Message Sent*/
/*                             <span class="pull-right text-muted small">4 minutes ago</span>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <i class="fa fa-tasks fa-fw"></i> New Task*/
/*                             <span class="pull-right text-muted small">4 minutes ago</span>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a href="#">*/
/*                         <div>*/
/*                             <i class="fa fa-upload fa-fw"></i> Server Rebooted*/
/*                             <span class="pull-right text-muted small">4 minutes ago</span>*/
/*                         </div>*/
/*                     </a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li>*/
/*                     <a class="text-center" href="#">*/
/*                         <strong>See All Alerts</strong>*/
/*                         <i class="fa fa-angle-right"></i>*/
/*                     </a>*/
/*                 </li>*/
/*             </ul>*/
/*             <!-- /.dropdown-alerts -->*/
/*         </li>*/
/*         <!-- /.dropdown -->*/
/*         <li class="dropdown">*/
/*             <a class="dropdown-toggle" data-toggle="dropdown" href="#">*/
/*                 <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>*/
/*             </a>*/
/*             <ul class="dropdown-menu dropdown-user">*/
/*                 <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>*/
/*                 </li>*/
/*                 <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>*/
/*                 </li>*/
/*                 <li class="divider"></li>*/
/*                 <li><a href="{{path('backend_security_logout')}}"><i class="fa fa-sign-out fa-fw"></i> Выход</a>*/
/*                 </li>*/
/*             </ul>*/
/*             <!-- /.dropdown-user -->*/
/*         </li>*/
/*         <!-- /.dropdown -->*/
/*     </ul>*/
/*     <!-- /.navbar-top-links -->*/
/* */
/*     <div class="navbar-default sidebar" role="navigation">*/
/*         <div class="sidebar-nav navbar-collapse">*/
/*             <ul class="nav" id="side-menu">*/
/*                 <li class="sidebar-search">*/
/*                     <div class="input-group custom-search-form">*/
/*                         <input type="text" class="form-control" placeholder="{{ 'Search'|trans({}, "global") }}...">*/
/*                         <span class="input-group-btn">*/
/*                         <button class="btn btn-default" type="button">*/
/*                             <i class="fa fa-search"></i>*/
/*                         </button>*/
/*                     </span>*/
/*                     </div>*/
/*                     <!-- /input-group -->*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="{{ path('backend_index_index') }}"><i class="fa fa-dashboard fa-fw"></i> {{ 'Dashboard'|trans({}, "backend") }}</a>*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-cubes fa-fw"></i> {{ 'Contents'|trans({}, "backend") }}<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'news'}) }}">{{ 'News'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'page'}) }}">{{ 'Page'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                     <!-- /.nav-second-level -->*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-suitcase fa-fw"></i> {{ 'Shop'|trans({}, "backend") }}<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'attribute'}) }}">{{ 'Attributes'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'vendor'}) }}">{{ 'Brends'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                     <!-- /.nav-second-level -->*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="{{ path('backend_content_entry', {'entityCode': 'user'}) }}"><i class="fa fa-users fa-fw"></i> {{ 'Users'|trans({}, "global") }}</a>*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-suitcase fa-fw"></i> {{ 'Scrolls'|trans({}, "global") }}<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'scroll'}) }}">{{ 'Scrolls'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'scroll_item'}) }}">{{ 'Scroll items'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                     <!-- /.nav-second-level -->*/
/*                 </li>*/
/*                 {% if is_granted('ROLE_ADMIN') %}*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-suitcase fa-fw"></i> {{ 'Administration'|trans({}, "backend") }}<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'content'}) }}">{{ 'Contents'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'content_page'}) }}">{{ 'Content Pages'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'navigation'}) }}">{{ 'Navigation'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="{{ path('backend_content_entry', {'entityCode': 'navigation_item'}) }}">{{ 'Navigation items'|trans({}, "global") }}</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                 </li>*/
/*                 {% endif %}*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="flot.html">Flot Charts</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="morris.html">Morris.js Charts</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                     <!-- /.nav-second-level -->*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="panels-wells.html">Panels and Wells</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="buttons.html">Buttons</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="notifications.html">Notifications</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="typography.html">Typography</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="icons.html"> Icons</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="grid.html">Grid</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                     <!-- /.nav-second-level -->*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="#">Second Level Item</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="#">Second Level Item</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="#">Third Level <span class="fa arrow"></span></a>*/
/*                             <ul class="nav nav-third-level">*/
/*                                 <li>*/
/*                                     <a href="#">Third Level Item</a>*/
/*                                 </li>*/
/*                                 <li>*/
/*                                     <a href="#">Third Level Item</a>*/
/*                                 </li>*/
/*                                 <li>*/
/*                                     <a href="#">Third Level Item</a>*/
/*                                 </li>*/
/*                                 <li>*/
/*                                     <a href="#">Third Level Item</a>*/
/*                                 </li>*/
/*                             </ul>*/
/*                             <!-- /.nav-third-level -->*/
/*                         </li>*/
/*                     </ul>*/
/*                     <!-- /.nav-second-level -->*/
/*                 </li>*/
/*                 <li>*/
/*                     <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>*/
/*                     <ul class="nav nav-second-level">*/
/*                         <li>*/
/*                             <a href="blank.html">Blank Page</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="login.html">Login Page</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                     <!-- /.nav-second-level -->*/
/*                 </li>*/
/*             </ul>*/
/*         </div>*/
/*         <!-- /.sidebar-collapse -->*/
/*     </div>*/
/*     <!-- /.navbar-static-side -->*/
/* </nav>*/
