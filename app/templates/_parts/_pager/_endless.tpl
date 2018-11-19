{set $firstPage = $pagination->getFirstPage()}
{set $lastPage = $pagination->getLastPage()}

{set $prevPage = $pagination->getPreviousPage()}
{set $nextPage = $pagination->getNextPage()}

<div class="pagination-wrapper pagination-endless" data-pagination-nav="{$pagination->getRequestPageKey()}">
    {if $firstPage != $lastPage}
        {block 'before_pagination_block'}{/block}

        <div class="pagination-block pagination-endless__nav">
            {if $nextPage}
                <a href="{$pagination->getUrl($nextPage)}" class="button pagination-endless__button" data-endless-action>
                    Показать еще
                </a>
            {/if}
        </div>

        {block 'after_pagination_block'}{/block}
    {/if}
</div>