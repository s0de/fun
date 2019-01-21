<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    {* Title, description, keywords *}
    {block 'seo'}
        {render_meta:raw}
    {/block}


    {*<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i|Roboto:300,400,400i,500,500i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">*}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{$.assets_public_path('main.css', 'frontend')}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    {* Another head information *}
    {block 'head'}{/block}
</head>
<body>
    <div class="layout">
        <div class="layout__wrapper">
            {include "_parts/header.tpl" class="layout__header"}

            {render_flash:raw template='base/_flash.tpl'}

            {block 'content-header'}
                <div class="content-header">
                    <div class="row">
                        <div class="column large-12">
                            {block 'breadcrumbs'}
                                {render_breadcrumbs:raw template="base/_breadcrumbs.tpl"}
                            {/block}

                            {block 'heading'}

                            {/block}
                        </div>
                    </div>
                </div>
            {/block}

            <div id="main" class="layout__main">
                {block 'main'}
                    <div class="layout__content">
                        {block 'before-content'}

                        {/block}

                        <div class="row">
                            <div class="column large-12">
                                {block 'content'}

                                {/block}
                            </div>
                        </div>

                        {block 'after-content'}

                        {/block}
                    </div>
                {/block}
            </div>
        </div>

        {include "_parts/footer.tpl" class="layout__footer"}
    </div>

    {block 'core_js'}
        <script src="{$.assets_public_path('vendors.js', 'frontend')}"></script>
        <script src="{$.assets_public_path('main.js', 'frontend')}"></script>
    {/block}

    {render_dependencies_js:raw}
    {render_inline_js:raw}
    {render_dependencies_css:raw}
    {render_inline_css:raw}
    {block 'js'}

    {/block}
    {raw $.setting('Main.counters')}
</body>
</html>