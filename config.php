<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => 'https://santiagomoo.github.io/syverum-docs',
    'production' => true,
    'siteName' => 'Syverum Docs',
    'siteDescription' => 'Framework PHP liviano y modular con interfaz MVC.',

    // Repos & enlaces del proyecto
    'docsRepo'        => 'https://github.com/Santiagomoo/syverum-docs',
    'frameworkRepo'   => 'https://github.com/Santiagomoo/syverum-framework',
    'installerRepo'   => 'https://github.com/Santiagomoo/syverum-installer',
    'skeletonRepo'    => 'https://github.com/Santiagomoo/syverum-skeleton',
    'currentVersion'  => '1.x',

    // Algolia DocSearch credentials
    'docsearchAppId' => env('DOCSEARCH_APP_ID'),
    'docsearchApiKey' => env('DOCSEARCH_KEY'),
    'docsearchIndexName' => env('DOCSEARCH_INDEX'),

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // Theme colors (customizable desde config.php)
    'theme' => [
        'brand' => '#da1717ff',     // primary
        'brandDark' => '#470e0eff', // hover/active
        'sidebarBg' => '#ffffff', // sidebar background
    ],

    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },
];
