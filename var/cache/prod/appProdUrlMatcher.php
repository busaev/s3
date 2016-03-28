<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
