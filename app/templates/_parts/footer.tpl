{add $class = ""}

<footer class="footer {$class}">
    <div class="row">
        <div class="column large-3">
            <div class="footer__title">
                Контакты
            </div>
            <div class="footer__contacts">
                <a class="footer__contact footer__contact_phone" href="tel:{$.setting('Main.phone')|tel}">
                    {$.setting('Main.phone')}
                </a>
            </div>
        </div>
        <div class="column large-3">

        </div>
        <div class="column large-3">

        </div>
        <div class="column large-3">
            Разработка сайта - <a href="https://rclass.pro" target="_blank">R.class</a>
        </div>
    </div>
</footer>