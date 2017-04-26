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
    {/foreach}
{/capture}

{include 'container.tpl'}
</body>
</html>