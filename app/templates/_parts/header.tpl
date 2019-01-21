{add $class = ""}

<header class="header {$class}">
    <div class="row">
        <div class="column large-12">
            <div class="header__inner">
                <a href="/" class="header__logo">
                    <span class="header__logo-image">
                        <img src="{$.assets_public_path('images/base/logo.png', 'frontend')}" alt="">
                    </span>
                    <span class="header__logo-text">
                        <span class="header__logo-name">
                            Komandor
                        </span>
                        <span class="header__logo-description">
                            шкафы-купе и кухни в Сочи
                        </span>
                    </span>
                </a>
                <ul class="main-menu justify header__menu">
                    <li class="main-menu__item">
                        <a href="#" class="main-menu__link">
                            <span class="main-menu__link-text">
                                Шкафы-купе
                            </span>
                        </a>
                    </li>
                    <li class="main-menu__item">
                        <a href="#" class="main-menu__link">
                            <span class="main-menu__link-text">
                                Кухни
                            </span>
                        </a>
                    </li>
                    <li class="main-menu__item">
                        <a href="#" class="main-menu__link">
                            <span class="main-menu__link-text">
                                Проекты
                            </span>
                        </a>
                    </li>
                    <li class="main-menu__item">
                        <a href="#" class="main-menu__link">
                            <span class="main-menu__link-text">
                                О компании
                            </span>
                        </a>
                    </li>
                    <li class="main-menu__item">
                        <a href="#" class="main-menu__link">
                            <span class="main-menu__link-text">
                                Контакты и адреса
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="header__contacts">
                    <a href="tel:{$.setting('Main.phone')|tel}" class="header__phone">
                        {$.setting('Main.phone')}
                    </a>
                    <a href="#" class="header__recall">
                        Перезвоните мне
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>