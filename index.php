<?php
require 'application/configs/smarty.site.config.php';
$smarty->display(getPage($_GET));
?>