<?php 
include 'config.php';//khac nhau cac trang
include ROOT .'/function.php';
spl_autoload_register('loadClass');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gio hang</title>
</head>
<body>
    <a href="index.php">Tiep tuc mua hang</a>
    <?php 
    $obj = new Cart();
    $action = isset($_GET['action'])?$_GET['action']:'';
    if ($action=='add')
    {
        echo 'Them';
        $id = isset($_GET['id'])?$_GET['id']:'';
        $qty =isset($_GET['qty'])?$_GET['qty']:1;
        $obj->add($id, $qty);
    }
    if ($action=='update')
    {
        echo 'Sua';
        $id = isset($_GET['id'])?$_GET['id']:'';
        $qty =isset($_GET['qty'])?$_GET['qty']:1;
        $obj->update($id, $qty);
    }
    if ($action=='delete')
    {
        echo 'Xoa';
        $id = isset($_GET['id'])?$_GET['id']:'';
        $obj->delete($id);
    }
    if ($action !='')
        header('location:cart.php');
    else
        $obj->show();
    ?>
</body>
</html>