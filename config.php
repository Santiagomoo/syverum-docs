<?php

use Illuminate\Support\Str;

return [
    // Para desarrollo local, dejar vacío y production=false.
    // En GitHub Pages se sobreescribe en config.production.php
    'baseUrl' => '',
    'production' => false,
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
    // Genera URLs absolutas respetando el baseUrl (útil para GitHub Pages)
    'url' => function ($page, $path) {
        if (Str::startsWith($path, 'http')) {
            return $path;
        }
        $base = rtrim($page->baseUrl ?? '', '/');
        return ($base ? $base : '') . '/' . trimPath($path);
    },

    // Prefija baseUrl para assets compilados y estáticos
    'assetUrl' => function ($page, $path) {
        if (Str::startsWith($path, 'http')) {
            return $path;
        }
        $base = rtrim($page->baseUrl ?? '', '/');
        $clean = '/' . ltrim($path, '/');
        return ($base ? $base : '') . $clean;
    },
];
