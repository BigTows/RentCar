<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}

{capture name=content}
    {foreach from=$cars->getCars() item=foo}
        <div class="media">

            <div class="media-left">
                <img src="./media/images/cars/{$foo["brand"]}_{$foo["model"]}.png" width="220px" height="150px"
                     class="img-rounded">
            </div>
            <div class="media-body">
                <div class="media-heading"><h4>{$foo["brand"]}</h4></div>
                <p>{$foo["model"]}</p>
            </div>
            <div class="media-right">
                <p>{$foo["description"]}</p>
            </div>
        </div>
        <hr>
    {/foreach}
    <ul class="pagination">
        {for $foo=1 to $cars->getCountCars()}
            {if $foo == $cars->getPage()}
                <li class="active"><a href="?page={$foo}">{$foo}</a></li>
            {else}
                <li><a href="?page={$foo}">{$foo}</a></li>
            {/if}
        {/for}
    </ul>
{/capture}

{include 'container.tpl'}
</body>
</html>