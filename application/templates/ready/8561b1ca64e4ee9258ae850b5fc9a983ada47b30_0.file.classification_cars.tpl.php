<?php
/* Smarty version 3.1.30, created on 2017-03-15 13:11:40
  from "/var/www/html/cars/application/templates/adminpanel/cars/classification_cars.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c9135cb1caa2_83083643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8561b1ca64e4ee9258ae850b5fc9a983ada47b30' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/cars/classification_cars.tpl',
      1 => 1489572699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c9135cb1caa2_83083643 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="form-group">
    <label for="name">Добавить классификацию машины</label>
    <input type="text" class="form-control" id="nameClassificationСars" name="name" placeholder="Классификация" required>
</div>
<button class="btn btn-success" id="addClassificationСars" name="addRecord" value="Classification_cars">Добавить</button>
<hr>
<table id="ClassificationСarsTable" class="table table-hover">

</table>

<?php echo '<script'; ?>
>
    var btn = document.getElementById("addClassificationСars");
    btn.addEventListener("click", function () {
        new Binding({
            url: "../application/requests/index.php",
            action: "addRecord",
            responsePanel: document.getElementById("info"),
            data: ["nameClassificationСars","addClassificationСars"]

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
                "getTable": "Classification_cars"
            }
        }, function (data) {
            //replace this line
            document.getElementById("ClassificationСarsTable").innerHTML="";
            jsonToTable(data, document.getElementById("ClassificationСarsTable"));
        })
    }
    initTypeTransport();
<?php echo '</script'; ?>
><?php }
}
