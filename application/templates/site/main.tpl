<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}

{capture name=content}
    {foreach from=$cars->getCars() item=foo}
        <div class="panel panel-default">
            <div class="panel-heading"><h4>{$foo["brand"]}</h4></div>
            <div class="panel-body">

                <img src="./media/images/cars/{$foo["brand"]}_{$foo["model"]}.png" width="220px" height="150px"
                     class="img-rounded">
                <a>{$foo["model"]}</a>
            </div>
        </div>
    {/foreach}
{/capture}

{include 'container.tpl'}
</body>
</html>