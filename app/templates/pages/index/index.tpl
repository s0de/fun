{extends "_layouts/base.tpl"}

{block 'main'}
    <div class="index-actions">

    </div>

    <div class="index-sections">
        <div class="row">
            <div class="column large-6">
                <a class="index-sections__section index-sections__section_kitchens" href="#">
                    <span class="index-sections__bg index-sections__bg_kitchens">

                    </span>

                    <span class="index-sections__section-content">
                        <span class="index-sections__section-name">
                            Кухни
                        </span>
                        <span class="index-sections__section-description">
                            Высочайшая надежность и качество материалов
                        </span>
                        <span class="index-sections__section-more">
                            Выбрать модель &rarr;
                        </span>
                    </span>
                </a>
            </div>
            <div class="column large-6">
                <a class="index-sections__section index-sections__section_сupboard" href="#">
                    <span class="index-sections__bg index-sections__bg_сupboard">

                    </span>
                    <span class="index-sections__section-content">
                        <span class="index-sections__section-name">
                            Шкафы-купе
                        </span>
                        <span class="index-sections__section-description">
                            Фурнитура европейского уровня и гарантия качества
                        </span>
                        <span class="index-sections__section-more">
                            Выбрать модель &rarr;
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="index-advantages">
        <div class="row">
            <div class="column large-12">
                <ul class="index-advantages__list">
                    <li class="index-advantages__advantage">
                        <div class="index-advantages__advantage-data">
                            <div class="index-advantages__advantage-icon">
                                {icon:raw "0-0-24"}
                            </div>
                            <div class="index-advantages__advantage-text">
                                Выгодная <br/> рассрочка 0-0-24
                            </div>
                        </div>
                    </li>
                    <li class="index-advantages__advantage">
                        <div class="index-advantages__advantage-data">
                            <div class="index-advantages__advantage-icon">
                                {icon:raw "warranty"}
                            </div>
                            <div class="index-advantages__advantage-text">
                                Гарантия на мебель <br/> до 30 лет
                            </div>
                        </div>
                    </li>
                    <li class="index-advantages__advantage">
                        <div class="index-advantages__advantage-data">
                            <div class="index-advantages__advantage-icon">
                                {icon:raw "manufacture"}
                            </div>
                            <div class="index-advantages__advantage-text">
                                Собственное производство <br/>
                                мебели и стекла
                            </div>
                        </div>
                    </li>
                    <li class="index-advantages__advantage">
                        <div class="index-advantages__advantage-data">
                            <div class="index-advantages__advantage-icon">
                                {icon:raw "design"}
                            </div>
                            <div class="index-advantages__advantage-text">
                                Индивидуальный <br/>
                                дизайн-проект за 20 минут
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="index-reviews">
        <div class="row">
            <div class="column large-12">

                <div class="index-reviews__head">
                    <h2 class="index-reviews__title sub-title">
                        Отзывы
                    </h2>
                </div>
                <div class="row">
                    {set $reviewsColumn = $.get_reviews_columns()}
                    {foreach $reviewsColumn as $column}
                        <div class="column large-6">
                            {foreach $column as $review}
                                <div class="index-reviews__review">
                                    {include "_parts/review.tpl"}
                                </div>
                            {/foreach}
                        </div>
                    {/foreach}
                </div>

            </div>
        </div>
    </div>

    <div class="index-about">
        <div class="row">
            <div class="column large-12">
                <div class="index-about__head">
                    <h1 class="index-about__title sub-title">
                        Шкафы-купе и кухни в Сочи - Komandor
                    </h1>
                </div>
                <div class="row">
                    <div class="column large-4">
                        <div class="index-about__image">
                            <img src="{$.assets_public_path("images/index/team.png", "frontend")}" alt="Komandor Сочи">
                        </div>
                    </div>
                    <div class="column large-8">
                        <div class="index-about__text">
                            Бренду KOMANDOR исполнилось 25 лет. За это время представительства KOMANDOR открыты во многих странах мира, например, в Германии, Англии, Испании, Индии и, конечно же, в России. Международный опыт, европейские технологии и стандарты качества, ежегодная сертификация производств и салонов – это гарантии надежности нашего продукта. Широкий ассортимент систем и материалов KOMANDOR позволяет реализовывать самые смелые идеи при обустройстве интерьера.
                            <br><br/>
                            Мебель на заказ. Преимущество KOMANDOR в широком ассортименте систем для застройки помещений по индивидуальным проектам. Мы предлагаем решения для шкафов с распашными, раздвижными, складными и подвесными дверями, а также гардеробные, кухни, гостиные стенки, детскую мебель, прихожие, кабинеты и библиотеки.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--
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
    -->
{/block}

{block "core_js"}
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    {parent}
{/block}