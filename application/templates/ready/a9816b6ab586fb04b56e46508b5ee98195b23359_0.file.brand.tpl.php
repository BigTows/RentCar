<?php
/* Smarty version 3.1.30, created on 2017-03-15 12:41:16
  from "/var/www/html/cars/application/templates/adminpanel/cars/brand.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c90c3c370171_34066748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9816b6ab586fb04b56e46508b5ee98195b23359' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/cars/brand.tpl',
      1 => 1489570875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c90c3c370171_34066748 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <div class="form-group">
        <label for="name">Добавить новый Брэнд</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Брэнд" required>
    </div>
    <button class="btn btn-success" id="addRecord" name="addRecord" value="Brands">Добавить</button>
 <hr>
<table id="brandTable" class="table table-hover">

</table>

<?php echo '<script'; ?>
>
    var btn = document.getElementById("addRecord");
    btn.addEventListener("click", function () {
        new Binding({
            url: "../application/requests/index.php",
            action: "addRecord",
            responsePanel: document.getElementById("info"),
            data: ["name","addRecord"],

        },function () {
            init();
        });
    });
    function init() {
        new Binding({
            url: "../application/requests/index.php",
            action: "getTable",
            data: [],
            dataValue: {
                "getTable": "Brands"
            }
        }, function (data) {
            //replace this line
            document.getElementById("brandTable").innerHTML="";
            jsonToTable(data, document.getElementById("brandTable"));
        })
    }
    init();
<?php echo '</script'; ?>
><?php }
}
