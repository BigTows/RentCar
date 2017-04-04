<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-xs-12">
        <div class="thumbnail">
            <div class="row">

                <div class="col-md-3 col-xs-3">
                    <div class="tt"></div>
                </div>
                <div class="col-md-9 col-xs-9">
                    <div class="caption">
                        <h2>Нет прав!</h2>
                        <p>
                            Для просмотра этой страницы необходимо авторизоваться
                            <a href="auth"> Авторизуйтесь</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<style>
    .tt {
        height: 100px;
        width: 100px;
        border-radius: 90%;
        position: absolute;
        margin-top: 20px;
        position: relative;
    }

    .tt:after {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        content: "\274c"; /* use the hex value here... */
        font-size: 50px;
        line-height: 100px;
        text-align: center;
    }
</style>

{include 'container.tpl'}
</body>
</html>