{if $breadcrumbs|length > 0}
    <div class="breadcrumbs">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item">
                <a href="/" class="breadcrumbs__link">
                    Главная
                </a>
            </li>

            {foreach $breadcrumbs as $item}
                <li class="breadcrumbs__item breadcrumbs__item_delimiter">
                    &rarr;
                </li>

                <li class="breadcrumbs__item">
                    {if $item['url']}
                        <a href="{$item['url']}" class="breadcrumbs__link">
                            {$item['name']}
                        </a>
                    {else}
                        {$item['name']}
                    {/if}
                </li>
            {/foreach}
        </ul>
    </div>
{/if}