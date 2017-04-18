<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{$data.name.nav}</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                {foreach from=$data.nav item=link key=name}
                    <li><a href={$link}>{$name}</a></li>
                {/foreach}
                <li class="dropdown">
                    <a class="dropdown-toggle" type="button" id="tables" data-toggle="dropdown">Таблицы
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="tables">
                        {foreach from=$data.tables item=link key=name}
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{$link}">{$name}</a></li>
                        {/foreach}
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>