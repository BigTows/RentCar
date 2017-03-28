<?php
/* Smarty version 3.1.30, created on 2017-03-28 20:42:17
  from "/var/www/html/cars/application/templates/adminpanel/cars/brand.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58daa0795c2e88_86991752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9816b6ab586fb04b56e46508b5ee98195b23359' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/cars/brand.tpl',
      1 => 1490722936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58daa0795c2e88_86991752 (Smarty_Internal_Template $_smarty_tpl) {
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
            initBrands();
        });
    });
    function initBrands() {
        new Table("Brands",document.getElementById("brandTable"));
    }
    initBrands();
<?php echo '</script'; ?>
><?php }
}
