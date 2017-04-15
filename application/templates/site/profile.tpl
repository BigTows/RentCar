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
                  <p>Some content.</p>
               </div>
               <div id="orders" class="tab-pane fade">
                  <h3>Menu 1</h3>
                  <p>Some content in menu 1.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
{/capture}
{include 'container.tpl'}
</body>
</html>