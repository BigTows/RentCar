<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
    <div id="info">

    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Работа с машинами</div>

    </div>
    <div class="panel-body">
        <div class="row">
            {foreach from=$control->getCars() item=foo}
                <tr>
                    <td>{$foo["brand"]}</td>
                </tr>
            {/foreach}
        </div>
        <div class="panel-footer">
            {$data.footer}
        </div>
    </div>
{/capture}
{include 'container.tpl'}
</body>
</html>


