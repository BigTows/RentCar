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
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Машина</th>
                    <th>Пользователь</th>
                    <th>Статус</th>
                    <th>Дата</th>
                    <th>Просрочена</th>
                </tr>
                </thead>
                <tbody>
                {foreach from=$control->getCars() item=foo}
                    <tr>
                        <td>{$foo["brand"]} - {$foo["model"]}</td>
                        <td><a data-toggle="modal" data-target="#{$foo["id_user"]}Modal">{$foo["id_user"]}</a></td>
                        <div class="modal fade" id="{$foo["id_user"]}Modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{$foo["first_name"]} {$foo["second_name"]}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p
                                        <i>Код пользователя: </i>{$foo["id_user"]} <br>
                                        <i>Телефон: </i>{$foo["phone"]} <br>


                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <td>{$foo["status"]}</td>
                        <td>{$foo["date_begin"]} - {$foo["date_end"]}</td>
                        <td>{$foo["arrears"]}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            {$data.footer}
        </div>
    </div>
{/capture}
{include 'container.tpl'}
</body>
</html>


