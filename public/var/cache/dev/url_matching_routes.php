<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/author/list' => [[['_route' => 'app_list', '_controller' => 'App\\Controller\\AuthorController::list'], null, null, null, false, false, null]],
        '/author/read' => [[['_route' => 'app_author_read', '_controller' => 'App\\Controller\\AuthorController::read'], null, null, null, false, false, null]],
        '/author/add' => [[['_route' => 'app_author_add', '_controller' => 'App\\Controller\\AuthorController::add'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'app_homes', '_controller' => 'App\\Controller\\HomeController::home'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/author/(?'
                    .'|show/([^/]++)(*:31)'
                    .'|de(?'
                        .'|tails/([^/]++)(*:57)'
                        .'|lete/([^/]++)(*:77)'
                    .')'
                    .'|update/([^/]++)(*:100)'
                .')'
                .'|/service/show/([^/]++)(*:131)'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:170)'
                    .'|wdt/([^/]++)(*:190)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:236)'
                            .'|router(*:250)'
                            .'|exception(?'
                                .'|(*:270)'
                                .'|\\.css(*:283)'
                            .')'
                        .')'
                        .'|(*:293)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        31 => [[['_route' => 'app_author_show', '_controller' => 'App\\Controller\\AuthorController::showAuthor'], ['name'], null, null, false, true, null]],
        57 => [[['_route' => 'app_author_details', '_controller' => 'App\\Controller\\AuthorController::details'], ['id'], null, null, false, true, null]],
        77 => [[['_route' => 'delete_author', '_controller' => 'App\\Controller\\AuthorController::delete'], ['id'], null, null, false, true, null]],
        100 => [[['_route' => 'update_author', '_controller' => 'App\\Controller\\AuthorController::update'], ['id'], null, null, false, true, null]],
        131 => [[['_route' => 'app_service_show', '_controller' => 'App\\Controller\\ServiceController::showService'], ['name'], null, null, false, true, null]],
        170 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        190 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        236 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        250 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        270 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        283 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        293 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
