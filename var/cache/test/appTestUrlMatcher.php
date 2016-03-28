<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appTestUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appTestUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/page')) {
            // pagebublik
            if ($pathinfo === '/page/bub-lik') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_pagebublik;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'pagebublik',);
            }
            not_pagebublik:

            // pagemegastatya
            if ($pathinfo === '/page/mega-stat-ya11') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_pagemegastatya;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'pagemegastatya',);
            }
            not_pagemegastatya:

            // page
            if ($pathinfo === '/page') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_page;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::indexAction',  '_route' => 'page',);
            }
            not_page:

        }

        // news
        if ($pathinfo === '/news') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_news;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::indexAction',  '_route' => 'news',);
        }
        not_news:

        // content
        if ($pathinfo === '/__content__') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_content;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'content',);
        }
        not_content:

        // 
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\IndexController::indexAction',  '_route' => '',);
        }
        not_:

        if (0 === strpos($pathinfo, '/news')) {
            // newswefwe
            if ($pathinfo === '/news/wefwe11111111111') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newswefwe;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newswefwe',);
            }
            not_newswefwe:

            // newserger
            if ($pathinfo === '/news/erger222') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newserger;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newserger',);
            }
            not_newserger:

        }

        // test
        if ($pathinfo === '/test') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_test;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'test',);
        }
        not_test:

        if (0 === strpos($pathinfo, '/backend/user')) {
            // backend_user_new
            if ($pathinfo === '/backend/user/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_backend_user_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\BackendUserController::newAction',  '_route' => 'backend_user_new',);
            }
            not_backend_user_new:

            // backend_user_edit
            if (preg_match('#^/backend/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_backend_user_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_edit')), array (  '_controller' => 'AppBundle\\Controller\\BackendUserController::editAction',));
            }
            not_backend_user_edit:

            // backend_user_password_edit
            if (preg_match('#^/backend/user/(?P<id>[^/]++)/password$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_backend_user_password_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_password_edit')), array (  '_controller' => 'AppBundle\\Controller\\BackendUserController::passwordAction',));
            }
            not_backend_user_password_edit:

            // backend_user_delete
            if (preg_match('#^/backend/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_backend_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_delete')), array (  '_controller' => 'AppBundle\\Controller\\BackendUserController::deleteAction',));
            }
            not_backend_user_delete:

        }

        if (0 === strpos($pathinfo, '/frontend/content')) {
            // frontend_content_entry
            if (preg_match('#^/frontend/content/(?P<entityCode>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_frontend_content_entry;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'frontend_content_entry')), array (  'params' => 'false',  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::indexAction',));
            }
            not_frontend_content_entry:

            // frontend_content_entry_show
            if (preg_match('#^/frontend/content/(?P<entityCode>[^/]++)/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_frontend_content_entry_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'frontend_content_entry_show')), array (  'entityCode' => 'news',  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::showAction',));
            }
            not_frontend_content_entry_show:

        }

        // frontend_index_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'frontend_index_index');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\IndexController::indexAction',  '_route' => 'frontend_index_index',);
        }

        if (0 === strpos($pathinfo, '/n')) {
            // frontend_navigation_show
            if ($pathinfo === '/navigation') {
                return array (  'params' => NULL,  '_controller' => 'AppBundle\\Controller\\Frontend\\NavigationController::showAction',  '_route' => 'frontend_navigation_show',);
            }

            if (0 === strpos($pathinfo, '/news')) {
                // news_index
                if (rtrim($pathinfo, '/') === '/news') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_news_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'news_index');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\NewsController::indexAction',  '_route' => 'news_index',);
                }
                not_news_index:

                // news_show
                if (preg_match('#^/news/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_news_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_show')), array (  '_controller' => 'AppBundle\\Controller\\NewsController::showAction',));
                }
                not_news_show:

            }

        }

        if (0 === strpos($pathinfo, '/security/log')) {
            // security_login
            if ($pathinfo === '/security/login') {
                return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginAction',  '_route' => 'security_login',);
            }

            // security_logout
            if ($pathinfo === '/security/logout') {
                return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_index
            if (rtrim($pathinfo, '/') === '/user') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user_index');
                }

                return array (  '_controller' => 'AppBundle\\Controller\\UserController::indexAction',  '_route' => 'user_index',);
            }
            not_user_index:

            // user_new
            if ($pathinfo === '/user/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_user_new;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }
            not_user_new:

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'AppBundle\\Controller\\UserController::showAction',));
            }
            not_user_show:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_user_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'AppBundle\\Controller\\UserController::editAction',));
            }
            not_user_edit:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'AppBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

        }

        if (0 === strpos($pathinfo, '/backend')) {
            if (0 === strpos($pathinfo, '/backend/api')) {
                // backend_api
                if (preg_match('#^/backend/api(?:/(?P<entityCode>[^/]++)(?:/(?P<format>json))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_api')), array (  'entityCode' => 'news',  'format' => 'json',  '_controller' => 'AppBundle\\Controller\\Backend\\ApiController::indexAction',));
                }

                // backend_api_routes
                if (0 === strpos($pathinfo, '/backend/api/routes') && preg_match('#^/backend/api/routes(?:/(?P<entityCode>[^/]++)(?:/(?P<format>json))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_api_routes')), array (  'entityCode' => 'news',  'format' => 'json',  '_controller' => 'AppBundle\\Controller\\Backend\\ApiController::routesAction',));
                }

            }

            if (0 === strpos($pathinfo, '/backend/content')) {
                // backend_content_entry
                if (preg_match('#^/backend/content(?:/(?P<entityCode>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_content_entry')), array (  'entityCode' => 'news',  '_controller' => 'AppBundle\\Controller\\Backend\\ContentController::indexAction',));
                }

                // backend_content_entry_new
                if (preg_match('#^/backend/content/(?P<entityCode>[^/]++)/new$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_backend_content_entry_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_content_entry_new')), array (  'entityCode' => 'news',  '_controller' => 'AppBundle\\Controller\\Backend\\ContentController::newAction',));
                }
                not_backend_content_entry_new:

                // backend_content_entry_history
                if (preg_match('#^/backend/content/(?P<entityCode>[^/]++)/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_content_entry_history')), array (  'entityCode' => 'news',  '_controller' => 'AppBundle\\Controller\\Backend\\ContentController::historyAction',));
                }

                // backend_content_entry_show
                if (preg_match('#^/backend/content/(?P<entityCode>[^/]++)/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_backend_content_entry_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_content_entry_show')), array (  'entityCode' => 'news',  '_controller' => 'AppBundle\\Controller\\Backend\\ContentController::showAction',));
                }
                not_backend_content_entry_show:

                // backend_content_entry_edit
                if (preg_match('#^/backend/content/(?P<entityCode>[^/]++)/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_backend_content_entry_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_content_entry_edit')), array (  'entityCode' => 'news',  '_controller' => 'AppBundle\\Controller\\Backend\\ContentController::editAction',));
                }
                not_backend_content_entry_edit:

                // backend_content_entry_delete_soft
                if (preg_match('#^/backend/content/(?P<entityCode>[^/]++)/(?P<id>[^/]++)/delete/soft$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_backend_content_entry_delete_soft;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_content_entry_delete_soft')), array (  '_controller' => 'AppBundle\\Controller\\Backend\\ContentController::deleteSoftAction',));
                }
                not_backend_content_entry_delete_soft:

                // backend_content_entry_delete
                if (preg_match('#^/backend/content/(?P<entityCode>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_backend_content_entry_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_content_entry_delete')), array (  'entityCode' => 'news',  '_controller' => 'AppBundle\\Controller\\Backend\\ContentController::deleteAction',));
                }
                not_backend_content_entry_delete:

            }

            // backend_index_index
            if ($pathinfo === '/backend') {
                return array (  '_controller' => 'AppBundle\\Controller\\Backend\\IndexController::indexAction',  '_route' => 'backend_index_index',);
            }

            if (0 === strpos($pathinfo, '/backend/security/log')) {
                if (0 === strpos($pathinfo, '/backend/security/login')) {
                    // backend_security_login
                    if ($pathinfo === '/backend/security/login') {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\SecurityController::loginAction',  '_route' => 'backend_security_login',);
                    }

                    // backend_security_login_check
                    if ($pathinfo === '/backend/security/login_check') {
                        return array (  '_controller' => 'AppBundle\\Controller\\Backend\\SecurityController::loginCheckAction',  '_route' => 'backend_security_login_check',);
                    }

                }

                // backend_security_logout
                if ($pathinfo === '/backend/security/logout') {
                    return array (  '_controller' => 'AppBundle\\Controller\\Backend\\SecurityController::logoutAction',  '_route' => 'backend_security_logout',);
                }

            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
