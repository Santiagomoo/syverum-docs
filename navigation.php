<?php

return [
    'Introducción' => [
        'url' => 'docs/getting-started',
        'children' => [
            '¿Qué es SyverumX?' => 'docs/getting-started',
            'Instalación' => 'docs/installation',
        ],
    ],

    'Guía' => [
        'url' => 'docs/project-structure',
        'children' => [
            'Estructura del proyecto' => 'docs/project-structure',
            'Rutas' => 'docs/routing',
            'Controladores' => 'docs/controllers',
            'Vistas (Blade)' => 'docs/views-blade',
            'HTTP / Globals' => 'docs/http-globals',
            'Middlewares' => 'docs/middlewares',
            'Facades' => 'docs/facades',
            'Variables de entorno (.env)' => 'docs/env-config',
            'Base de datos' => 'docs/database',
            'Panel de monitoreo' => 'docs/panel-monitoring',
            'CLI' => 'docs/cli',
            'Frontend (Tailwind)' => 'docs/frontend-tailwind',
        ],
    ],

    'Soporte' => [
        'url' => 'docs/troubleshooting',
        'children' => [
            'Solución de problemas' => 'docs/troubleshooting',
            'FAQ' => 'docs/faq',
            'Notas de versión' => 'docs/releases',
        ],
    ],

    'Repositorio (Framework)' => 'https://github.com/Santiagomoo/syverum-framework',
    'Repositorio (Installer)' => 'https://github.com/Santiagomoo/syverum-installer',
    'Repositorio (Skeleton)' => 'https://github.com/Santiagomoo/syverum-skeleton',
];

