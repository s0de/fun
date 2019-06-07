{extends "_layouts/base.tpl"}

{block 'main'}
    {include 'pages/index/_accordion.tpl'}
{/block}

{block "core_js"}
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    {parent}
{/block}