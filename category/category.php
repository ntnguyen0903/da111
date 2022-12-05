<?php 
include './config.php';
include './function.php';
spl_autoload_register('loadClass');
?>
<html>
    <head><title>Quan ly category</title></head>
    <body>
        <?php 
        $cat = new Category();
        $data = $cat->all();
       // print_r($data);
       foreach($data as $item)
       {
        ?>
        <div> <?php echo $item['cat_id'] ?>,
              <?php echo $item['cat_name'] ?>, 
            <a href="./category_del.php?id=<?php echo $item['cat_id'] ?>">
              Xoa</a>
        </div>
        <?php
       }
        ?>
    </body>
</html>