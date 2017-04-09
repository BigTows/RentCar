<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}

{capture name=content}
    <script src="../cars/media/JavaScript/Order.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <div class="panel panel-default">
        <div class="panel-heading">
            Заказать
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6 col-xs-12" id="orderPanel">
                        <select id="brands"></select>
                        <select id="models"></select>
                        <div id="div-colors">

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div id="map" style="width: auto; height: 400px"></div>
                        <script>
                            ymaps.ready(init);
                            var map;

                            function init() {
                                map = new ymaps.Map("map", {
                                    center: [55.76, 37.64],
                                    zoom: 10
                                });
                            }
                            new Order(document.getElementById("orderPanel"));
                        </script>
                    </div>
                </div>
            </div>

        </div>
    </div>
{/capture}

{include 'container.tpl'}
</body>
</html>