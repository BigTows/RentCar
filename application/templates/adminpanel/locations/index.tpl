<div id="info">

</div>
<div class="panel panel-default">
    <div class="panel-heading">Метоположения</div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                {include 'locations/type_locations.tpl'}
            </div>
            <div class="col-xs-12 col-sm-12">
                {include 'locations/history_locations.tpl'}
            </div>
            <div class="col-xs-12 col-sm-12">
                {include 'locations/locations.tpl'}
            </div>
        </div>
    </div>
    <div class="panel-footer">
        {$data.footer}
    </div>
</div>