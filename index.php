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
    <title>Trang chu</title>
</head>
<body>
    <?php 
    $obj = new Book();
    $data=$obj->all();
    // print_r($data);
    ?>
    <table>
        <?php 
        foreach($data as $item)
        {
            ?>
             <tr>
                <td><?php echo $item['book_id'] ?></td>
                <td><?php echo $item['book_name'] ?></td>
                <td><?php echo $item['price'] ?></td>
                <td><?php echo $item['img'] ?></td>
                <a href='cart.php?action=add&id=<?php echo $item['book_id'] ?>'>Add to Cart</a>         </td>
             
            </tr>
            <?php
        }
        ?>
       
    </table>
</body>
</html>