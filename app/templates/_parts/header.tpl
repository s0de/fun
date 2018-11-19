{add $class = ""}

<header class="header {$class}">
    <div class="row">
        <div class="column large-2">
            <a href="/" class="logo">
                <img src="{$.assets_public_path('images/base/logo.png', 'frontend')}" alt="">
            </a>
        </div>
        <div class="column large-8">
            <ul class="main-menu justify">
                <li>
                    <a href="#">Index</a>
                </li>
                <li>
                    <a href="#">News</a>
                </li>
                <li>
                    <a href="#">Articles</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contacts</a>
                </li>
            </ul>
        </div>
        <div class="column large-2">
            <a href="tel:{$.setting('Main.phone')|tel}">
                {$.setting('Main.phone')}
            </a>
        </div>
    </div>
</header>