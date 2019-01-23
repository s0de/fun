{extends "_layouts/base.tpl"}

{block 'main'}
    {add $url = 'request:recall'}
    <div class="row">
        <div class="column">
            {add $form = $.get_recall_form()}
            <form action="{url $url}" method="post" data-ajax-form="{$form->getName()}" class="request-form">
                <div class="request-form__data">
                    {raw $form->render()}
                    <button class="button" type="submit">
                        Кнопка
                    </button>

                    <div>
                        Отправляя данную форму, я соглашаюсь

                        <a href="{$.setting('Main.policy')->url}" target="_blank" rel="nofollow noopener noreferrer">
                            с&nbsp;условиями обработки персональных данных
                        </a>
                    </div>
                </div>

                <div class="request-form__success">
                    Наш менеджер свяжется с вами!
                </div>
            </form>

            <div style="height: 300px;" data-map data-lat="{$.setting('Main.address_lat')}" data-lng="{$.setting('Main.address_lng')}" data-mark="{$.assets_public_path('images/base/placemark.svg', 'frontend')}" data-zoom="14"></div>
        </div>
    </div>
{/block}

{block "core_js"}
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    {parent}
{/block}