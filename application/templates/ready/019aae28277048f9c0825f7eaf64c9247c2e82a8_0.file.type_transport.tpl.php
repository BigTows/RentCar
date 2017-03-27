<?php
/* Smarty version 3.1.30, created on 2017-03-15 13:06:02
  from "/var/www/html/cars/application/templates/adminpanel/cars/type_transport.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c9120a5180e9_65155840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '019aae28277048f9c0825f7eaf64c9247c2e82a8' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/cars/type_transport.tpl',
      1 => 1489572361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c9120a5180e9_65155840 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-group">
    <label for="name">Добавить новый вид транспорта</label>
    <input type="text" class="form-control" id="nameTypeTransport" name="name" placeholder="Тип транспорта" required>
</div>
<button class="btn btn-success" id="addTypeTransport" name="addRecord" value="Type_transport">Добавить</button>
<hr>
<table id="typeTransportTable" class="table table-hover">

</table>

<?php echo '<script'; ?>
>
    var btn = document.getElementById("addTypeTransport");
    btn.addEventListener("click", function () {
        new Binding({
            url: "../application/requests/index.php",
            action: "addRecord",
            responsePanel: document.getElementById("info"),
            data: ["nameTypeTransport"],
            dataValue: {
                "addRecord": "Type_transport"
            }

        },function () {
            initTypeTransport();
        });
    });
    function initTypeTransport() {
        new Binding({
            url: "../application/requests/index.php",
            action: "getTable",
            data: [],
            dataValue: {
                "getTable": "Type_transport"
            }
        }, function (data) {
            //replace this line
            document.getElementById("typeTransportTable").innerHTML="";
            jsonToTable(data, document.getElementById("typeTransportTable"));
        })
    }
    initTypeTransport();
<?php echo '</script'; ?>
><?php }
}
