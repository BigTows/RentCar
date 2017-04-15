<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
<div class="panel panel-default">
    <div class="panel-heading">
        Профиль: {$profile->getFirstName()} {$profile->getSecondName()}
    </div>
    <div class="panel-body">
        <div class="" id="profile">

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#default">Информация</a></li>
                    <li><a data-toggle="tab" href="#orders">Заказы</a></li>
                </ul>

                <div class="tab-content">
                    <div id="default" class="tab-pane fade in active">
                        <h3>Персональные данные</h3>
                        <ul class="list-group">
                            <li class="list-group-item"><i>Имя</i>: {$profile->getFirstName()} </li>
                            <li class="list-group-item"><i>Фамилия</i>: {$profile->getSecondName()} </li>
                            <li class="list-group-item"><i>Паспорт</i>: {$profile->getPassport()} </li>
                            <li class="list-group-item"><i>Телефон</i>: {$profile->getTelephone()} </li>
                            <li class="list-group-item"><i>E-mail</i>: {$profile->getEmail()} </li>

                        </ul>
                    </div>
                    <div id="orders" class="tab-pane fade">
                        <h3>Ваши заказы
                            <span style="font-size: 15px" data-toggle="tooltip"
                                  title="Показываются только актуальные заказа"
                                  class="glyphicon glyphicon-info-sign"></span>
                        </h3>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Номер заказа</th>
                                <th>Брэнд</th>
                                <th>Модель</th>
                                <th>Начальная дата</th>
                                <th>Дата конца</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                {foreach from=$profile->getOrders() item=foo}
                                    <td>{$foo["id_order"]}</td>
                                    <td>{$foo["brand"]}</td>
                                    <td>{$foo["model"]}</td>
                                    <td>{$foo["date_begin"]}</td>
                                    <td>{$foo["date_end"]}</td>
                                {/foreach}
                            </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>
    {/capture}
    {include 'container.tpl'}
</body>
</html>