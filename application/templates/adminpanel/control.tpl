<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
{include 'nav.tpl'}
{capture name=content}
    <div id="info">

    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Работа с машинами</div>

        <div class="panel-body">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Машина</th>
                        <th>Знак</th>
                        <th>Пользователь</th>
                        <th>Статус</th>
                        <th>Дата начала</th>
                        <th>Дата конца</th>
                        <th>Просрочена</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach from=$control->getCars() item=foo}
                        <tr>
                            <td>{$foo["brand"]} - {$foo["model"]}</td>
                            <!-- Modal sign !-->
                            <td><a data-toggle="modal" data-target="#{$foo["sign"]}Modal">{$foo["sign"]}</a></td>
                            <div class="modal fade" id="{$foo["sign"]}Modal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{$foo["brand"]} - {$foo["model"]}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p
                                            <i>Знак: </i>{$foo["sign"]} <br>

                                            <div id="map-{$foo["sign"]}" style="width: auto; height: 400px"></div>
                                            <script>
                                                ymaps.ready(init);
                                                var map;
                                                function init() {
                                                    map = new ymaps.Map("map-{$foo["sign"]}", {
                                                        center: [{$foo["latitude"]},{$foo["longitude"]}],
                                                        zoom: 16
                                                    });
                                                    var myPlacemark = new ymaps.Placemark([{$foo["latitude"]}, {$foo["longitude"]}], {
                                                        hintContent: '{$foo["sign"]}',
                                                        balloonContent: 'Последние местоположение машины'
                                                    });

                                                    map.geoObjects.add(myPlacemark);
                                                }
                                            </script>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Modal sign end !-->
                            <!-- Modal user !-->
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
                            <!-- Modal user end !-->
                            <td>{$foo["status"]}</td>
                            <td>{$foo["date_begin"]} </td>
                            <td>{$foo["date_end"]}</td>
                            <td>
                                {if 1 == $foo["arrears"] }
                                    <button type="button" class="btn btn-danger btn-xs">Да</button>
                                {else}
                                    <button type="button" class="btn btn-success btn-xs">Нет</button>
                                {/if}
                            </td>
                            <td>@TODO</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                {$data.footer}
            </div>
        </div>
    </div>
{/capture}
{include 'container.tpl'}
</body>
</html>


