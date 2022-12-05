<?php 
include './config.php';
include './function.php';
spl_autoload_register('loadClass');
$id = isset($_GET['id'])?$_GET['id']:'';
if ($id !='')
{
    $obj = new Category();
    $obj->delete($id);
}
header('location:category.php');