<?php

return [
    [
        'route' => '/sitemap',
        'path' => 'Modules.Sitemap.routes',
        'namespace' => 'sitemap'
    ],
    [
        'route' => '/admin',
        'path' => 'Modules.Admin.routes',
        'namespace' => 'admin'
    ],
    [
        'route' => '/admin/files',
        'path' => 'Modules.Files.routes',
        'namespace' => 'files'
    ],
    [
        'route' => '/admin/editor',
        'path' => 'Modules.Editor.routes',
        'namespace' => 'editor'
    ],
    [
        'route' => '',
        'path' => 'Modules.Meta.routes',
        'namespace' => 'meta'
    ],
    [
        'route' => '/request',
        'path' => 'Modules.Request.routes',
        'namespace' => 'request'
    ],
    [
        'route' => '',
        'path' => 'Modules.Main.routes',
        'namespace' => 'main'
    ],
];