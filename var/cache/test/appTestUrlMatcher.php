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

        // page
        if ($pathinfo === '/page') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_page;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::indexAction',  '_route' => 'page',);
        }
        not_page:

        // news
        if ($pathinfo === '/news') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_news;
            }

            return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\NewsController::indexAction',  '_route' => 'news',);
        }
        not_news:

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
            if (0 === strpos($pathinfo, '/news/v-')) {
                // newsvnasheminternetemagazinestartuetakciyanazimyuyuverhnyuyuodegduevropeyskogoproizvoditelyalemmi
                if ($pathinfo === '/news/v-nashem-internete-magazine-startuet-akciya-na-zimyuyu-verhnyuyu-odegdu-evropeyskogo-proizvoditelya-lemmi-25') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_newsvnasheminternetemagazinestartuetakciyanazimyuyuverhnyuyuodegduevropeyskogoproizvoditelyalemmi;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsvnasheminternetemagazinestartuetakciyanazimyuyuverhnyuyuodegduevropeyskogoproizvoditelyalemmi',);
                }
                not_newsvnasheminternetemagazinestartuetakciyanazimyuyuverhnyuyuodegduevropeyskogoproizvoditelyalemmi:

                // newsvprodagupostupaetnovayakollekciyaprazdnichnyhplatyev
                if ($pathinfo === '/news/v-prodagu-postupaet-novaya-kollekciya-prazdnichnyh-platyev') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_newsvprodagupostupaetnovayakollekciyaprazdnichnyhplatyev;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsvprodagupostupaetnovayakollekciyaprazdnichnyhplatyev',);
                }
                not_newsvprodagupostupaetnovayakollekciyaprazdnichnyhplatyev:

            }

            // newsroditelyameslivyishiterepetitorovobratitesyknashimmenedgerampoformeobratnoysvyazivkontaktah
            if ($pathinfo === '/news/roditelyam-esli-vy-ishite-repetitorov-obratitesy-k-nashim-menedgeram-po-forme-obratnoy-svyazi-v-kontaktah') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsroditelyameslivyishiterepetitorovobratitesyknashimmenedgerampoformeobratnoysvyazivkontaktah;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsroditelyameslivyishiterepetitorovobratitesyknashimmenedgerampoformeobratnoysvyazivkontaktah',);
            }
            not_newsroditelyameslivyishiterepetitorovobratitesyknashimmenedgerampoformeobratnoysvyazivkontaktah:

            // newssgvprodagupostupayutnovyeelegantnyedetskiebalynyeplatyya
            if ($pathinfo === '/news/s-121211g-v-prodagu-postupayut-novye-elegantnye-detskie-balynye-platyya') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newssgvprodagupostupayutnovyeelegantnyedetskiebalynyeplatyya;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newssgvprodagupostupayutnovyeelegantnyedetskiebalynyeplatyya',);
            }
            not_newssgvprodagupostupayutnovyeelegantnyedetskiebalynyeplatyya:

            // newsunasvprodagepoyavilisynovyemodeliizdginsovoykollekciilemmidlyamalychikov
            if ($pathinfo === '/news/u-nas-v-prodage-poyavilisy-novye-modeli-iz-dginsovoy-kollekcii-lemmi-dlya-malychikov') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsunasvprodagepoyavilisynovyemodeliizdginsovoykollekciilemmidlyamalychikov;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsunasvprodagepoyavilisynovyemodeliizdginsovoykollekciilemmidlyamalychikov',);
            }
            not_newsunasvprodagepoyavilisynovyemodeliizdginsovoykollekciilemmidlyamalychikov:

            // newsnashinternetmagazinbrateckrolikpredstavlyaetvamnovinkiizzimneykollekciiverhneydetskoyodegdylemmi
            if ($pathinfo === '/news/nash-internet-magazin-bratec-krolik-predstavlyaet-vam-novinki-iz-zimney-kollekcii-verhney-detskoy-odegdy-lemmi') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsnashinternetmagazinbrateckrolikpredstavlyaetvamnovinkiizzimneykollekciiverhneydetskoyodegdylemmi;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsnashinternetmagazinbrateckrolikpredstavlyaetvamnovinkiizzimneykollekciiverhneydetskoyodegdylemmi',);
            }
            not_newsnashinternetmagazinbrateckrolikpredstavlyaetvamnovinkiizzimneykollekciiverhneydetskoyodegdylemmi:

            if (0 === strpos($pathinfo, '/news/v')) {
                if (0 === strpos($pathinfo, '/news/v-na')) {
                    // newsvnachalefevralyabrateckrolikobnovitkollekciyuettidetti
                    if ($pathinfo === '/news/v-nachale-fevralya-bratec-krolik-obnovit-kollekciyu-etti-detti') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_newsvnachalefevralyabrateckrolikobnovitkollekciyuettidetti;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsvnachalefevralyabrateckrolikobnovitkollekciyuettidetti',);
                    }
                    not_newsvnachalefevralyabrateckrolikobnovitkollekciyuettidetti:

                    // newsvnasheminternetmagazinevprodagupostupilanovayakollekciyavesnaletootlemmi
                    if ($pathinfo === '/news/v-nashem-internet-magazine-v-prodagu-postupila-novaya-kollekciya-vesna-leto-2012-ot-lemmi') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_newsvnasheminternetmagazinevprodagupostupilanovayakollekciyavesnaletootlemmi;
                        }

                        return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsvnasheminternetmagazinevprodagupostupilanovayakollekciyavesnaletootlemmi',);
                    }
                    not_newsvnasheminternetmagazinevprodagupostupilanovayakollekciyavesnaletootlemmi:

                }

                // newsvideoprezentaciyanovoyvesenneletneykollekciibrendaettidetti
                if ($pathinfo === '/news/video-prezentaciya-novoy-vesenne-letney-kollekcii-brenda-etti-detti') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_newsvideoprezentaciyanovoyvesenneletneykollekciibrendaettidetti;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsvideoprezentaciyanovoyvesenneletneykollekciibrendaettidetti',);
                }
                not_newsvideoprezentaciyanovoyvesenneletneykollekciibrendaettidetti:

            }

            // newsuramyotkrylisvoyblogvgg
            if ($pathinfo === '/news/ura-my-otkryli-svoy-blog-v-gg') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsuramyotkrylisvoyblogvgg;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsuramyotkrylisvoyblogvgg',);
            }
            not_newsuramyotkrylisvoyblogvgg:

            if (0 === strpos($pathinfo, '/news/ogromnaya-')) {
                // newsogromnayasezonnayaakciya
                if ($pathinfo === '/news/ogromnaya-sezonnaya-akciya') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_newsogromnayasezonnayaakciya;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsogromnayasezonnayaakciya',);
                }
                not_newsogromnayasezonnayaakciya:

                // newsogromnayarasprodaganakollekciyuettidetti
                if ($pathinfo === '/news/ogromnaya-rasprodaga-na-kollekciyu-etti-detti') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_newsogromnayarasprodaganakollekciyuettidetti;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsogromnayarasprodaganakollekciyuettidetti',);
                }
                not_newsogromnayarasprodaganakollekciyuettidetti:

            }

            // newsglobalynayarasprodaganastupayushegoosennezimnegosezonalemmi
            if ($pathinfo === '/news/globalynaya-rasprodaga-nastupayushego-osenne-zimnego-sezona-lemmi') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsglobalynayarasprodaganastupayushegoosennezimnegosezonalemmi;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsglobalynayarasprodaganastupayushegoosennezimnegosezonalemmi',);
            }
            not_newsglobalynayarasprodaganastupayushegoosennezimnegosezonalemmi:

            // newsnovayazimnyayakollekciyalemmilemmi
            if ($pathinfo === '/news/novaya-zimnyaya-kollekciya-lemmilemmi') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsnovayazimnyayakollekciyalemmilemmi;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsnovayazimnyayakollekciyalemmilemmi',);
            }
            not_newsnovayazimnyayakollekciyalemmilemmi:

            // newsinformaciyapotovarnymostatkamlegolego
            if ($pathinfo === '/news/informaciya-po-tovarnym-ostatkam-legolego') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsinformaciyapotovarnymostatkamlegolego;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsinformaciyapotovarnymostatkamlegolego',);
            }
            not_newsinformaciyapotovarnymostatkamlegolego:

            // newspostuplenieshkolynoykollekcii
            if ($pathinfo === '/news/postuplenie-shkolynoy-kollekcii') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newspostuplenieshkolynoykollekcii;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newspostuplenieshkolynoykollekcii',);
            }
            not_newspostuplenieshkolynoykollekcii:

            // newsnovinkanashegointernetmagazinadetskiybrendcrockid
            if ($pathinfo === '/news/novinka-nashego-internet-magazina-detskiy-brend-crockid') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsnovinkanashegointernetmagazinadetskiybrendcrockid;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsnovinkanashegointernetmagazinadetskiybrendcrockid',);
            }
            not_newsnovinkanashegointernetmagazinadetskiybrendcrockid:

            // newsshkolynayaforma
            if ($pathinfo === '/news/shkolynaya-forma-2013') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsshkolynayaforma;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsshkolynayaforma',);
            }
            not_newsshkolynayaforma:

            // newsrasprodagashkolynogoassortimentaunasvmagazine
            if ($pathinfo === '/news/rasprodaga-shkolynogo-assortimenta-u-nas-v-magazine') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsrasprodagashkolynogoassortimentaunasvmagazine;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsrasprodagashkolynogoassortimentaunasvmagazine',);
            }
            not_newsrasprodagashkolynogoassortimentaunasvmagazine:

            // newsnashmagazinbrateckroliknachalplodotvornoesotrudnichestvosrossiyskimbrendomoldos
            if ($pathinfo === '/news/nash-magazin-bratec-krolik-nachal-plodotvornoe-sotrudnichestvo-s-rossiyskim-brendom-oldos') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsnashmagazinbrateckroliknachalplodotvornoesotrudnichestvosrossiyskimbrendomoldos;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsnashmagazinbrateckroliknachalplodotvornoesotrudnichestvosrossiyskimbrendomoldos',);
            }
            not_newsnashmagazinbrateckroliknachalplodotvornoesotrudnichestvosrossiyskimbrendomoldos:

            // newsakciyanovogodniypodarok
            if ($pathinfo === '/news/akciya-novogodniy-podarok') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsakciyanovogodniypodarok;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsakciyanovogodniypodarok',);
            }
            not_newsakciyanovogodniypodarok:

            // newslegonovinki
            if ($pathinfo === '/news/lego-novinki-2014') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newslegonovinki;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newslegonovinki',);
            }
            not_newslegonovinki:

            if (0 === strpos($pathinfo, '/news/u')) {
                // newsuravesennyayakollekciyaoldesugevprodage
                if ($pathinfo === '/news/ura-vesennyaya-kollekciya-oldes-uge-v-prodage') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_newsuravesennyayakollekciyaoldesugevprodage;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsuravesennyayakollekciyaoldesugevprodage',);
                }
                not_newsuravesennyayakollekciyaoldesugevprodage:

                // newsunasvprodageavtokresla
                if ($pathinfo === '/news/u-nas-v-prodage-avtokresla') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_newsunasvprodageavtokresla;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsunasvprodageavtokresla',);
                }
                not_newsunasvprodageavtokresla:

            }

            // newssnovavshkolu
            if ($pathinfo === '/news/snova-v-shkolu') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newssnovavshkolu;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newssnovavshkolu',);
            }
            not_newssnovavshkolu:

            // newsbrateckrolikprimetuchastievvystavkeshkolynayayarmarkaotadoya
            if ($pathinfo === '/news/bratec-krolik-primet-uchastie-v-vystavke-shkolynaya-yarmarka-ot-a-do-ya') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsbrateckrolikprimetuchastievvystavkeshkolynayayarmarkaotadoya;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsbrateckrolikprimetuchastievvystavkeshkolynayayarmarkaotadoya',);
            }
            not_newsbrateckrolikprimetuchastievvystavkeshkolynayayarmarkaotadoya:

            // newsshkolynyebryukivancliffnovoepostuplenie
            if ($pathinfo === '/news/shkolynye-bryuki-van-cliff-novoe-postuplenie') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsshkolynyebryukivancliffnovoepostuplenie;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsshkolynyebryukivancliffnovoepostuplenie',);
            }
            not_newsshkolynyebryukivancliffnovoepostuplenie:

            // newsogidaetsyadopolneniekshkolynoykollekciivancliff
            if ($pathinfo === '/news/ogidaetsya-dopolnenie-k-shkolynoy-kollekcii-van-cliff') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsogidaetsyadopolneniekshkolynoykollekciivancliff;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsogidaetsyadopolneniekshkolynoykollekciivancliff',);
            }
            not_newsogidaetsyadopolneniekshkolynoykollekciivancliff:

            // newsvystavkashkolynayayarmarkaotadoya
            if ($pathinfo === '/news/vystavka-shkolynaya-yarmarka-ot-a-do-ya') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsvystavkashkolynayayarmarkaotadoya;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsvystavkashkolynayayarmarkaotadoya',);
            }
            not_newsvystavkashkolynayayarmarkaotadoya:

            // newspozdravlyaemsnachalomuchebnogogoda
            if ($pathinfo === '/news/pozdravlyaem-s-nachalom-uchebnogo-goda') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newspozdravlyaemsnachalomuchebnogogoda;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newspozdravlyaemsnachalomuchebnogogoda',);
            }
            not_newspozdravlyaemsnachalomuchebnogogoda:

            // newsnashivashbrateckrolikobnovilsya
            if ($pathinfo === '/news/nash-i-vash-bratec-krolik-obnovilsya') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsnashivashbrateckrolikobnovilsya;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsnashivashbrateckrolikobnovilsya',);
            }
            not_newsnashivashbrateckrolikobnovilsya:

            // newsrasprodagabrendovyhprazdnichnyhplatyevdlyadevochek
            if ($pathinfo === '/news/rasprodaga-brendovyh-prazdnichnyh-platyev-dlya-devochek') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsrasprodagabrendovyhprazdnichnyhplatyevdlyadevochek;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsrasprodagabrendovyhprazdnichnyhplatyevdlyadevochek',);
            }
            not_newsrasprodagabrendovyhprazdnichnyhplatyevdlyadevochek:

            // newsnovayashkolynayakollekciyadlyamalychikov
            if ($pathinfo === '/news/novaya-shkolynaya-kollekciya-dlya-malychikov') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_newsnovayashkolynayakollekciyadlyamalychikov;
                }

                return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\ContentController::routeAction',  '_route' => 'newsnovayashkolynayakollekciyadlyamalychikov',);
            }
            not_newsnovayashkolynayakollekciyadlyamalychikov:

        }

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

                    return array (  '_controller' => 'AppBundle\\Controller\\Frontend\\NewsController::indexAction',  '_route' => 'news_index',);
                }
                not_news_index:

                // news_show
                if (preg_match('#^/news/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_news_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_show')), array (  '_controller' => 'AppBundle\\Controller\\Frontend\\NewsController::showAction',));
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

            if (0 === strpos($pathinfo, '/backend/co')) {
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

                // backend_core_route_content_entries
                if (0 === strpos($pathinfo, '/backend/core/route/routes') && preg_match('#^/backend/core/route/routes(?:/(?P<entityCode>[^/]++)(?:/(?P<format>json))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_core_route_content_entries')), array (  'entityCode' => 'news',  'format' => 'json',  '_controller' => 'AppBundle\\Controller\\Backend\\Core\\RouteController::contentEntriesAction',));
                }

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
