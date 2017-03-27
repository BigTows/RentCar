<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
    {include file='cars/index.tpl'}
{/capture}
{include 'container.tpl'}
</body>
</html>