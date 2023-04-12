<?php
// $page = filter_var($_GET['page'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

include_once ("./App/vue/template.php");

?>

