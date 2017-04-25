<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}

{capture name=content}
    {foreach from=$cars->getCars() item=foo}
        <a>{$foo["brand"]}</a>
    {/foreach}
{/capture}

{include 'container.tpl'}
</body>
</html>