<?php 
class Cart 
{
    private $cart;
    function __construct()
    {
        if (!isset($_SESSION)  ) session_start();
        $this->cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
    }

    function __destruct()
    {
        $_SESSION['cart']= $this->cart;
    }
    // $cart = [
    //     'sp1'=>['book_id'=>'sp1', 'book_name'=>'Sach 1', 'price'=>10, 'qty'=>1], 
    //     'sp3'=>['book_id'=>'sp1', 'book_name'=>'Sach 3', 'price'=>20, 'qty'=>1],
    //     'sp4'=>['book_id'=>'sp1', 'book_name'=>'Sach 4', 'price'=>40, 'qty'=>2],
    //     ];
    //     add('sp2', 1);
    //     add('sp1', 2);
        
    function add($id, $qty=1)
    {
        if (isset($this->cart[$id]) ) //da co phan tu nay
        {
            $this->cart[$id]['qty']+= $qty;
        }
        else{
            $obj = new Book();
            $book = $obj->getById($id);
            if (Count($book)>0) 
            {
                $book['qty']=$qty;
                $this->cart[$id]=$book;
            }
            
        } 
    }

    function delete($id)
    {
        unset($this->cart[$id]);
    }

    function show()
    {
        // echo '<pre>';
        // print_r($this->cart);
        ?>
        <table border=1>
            <tr>
                <td>Ten</td>
                <td>Hinh</td>
                <td>So luong</td>
                <td>Gia</td>
                <td>Thanh tien</td>
                <td>#</td>
            </tr>
            <?php 
            $total =0;
            foreach($this->cart as $item)
            {
                $tt =$item['qty']* $item['price'];
                $total +=$tt;
                ?>
                <tr>
                    <td><?php echo $item['book_name'] ?></td>
                    <td><?php echo $item['img'] ?></td>
                    <td><?php echo $item['qty'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><?php echo number_format( $tt) ?></td>
                    <td>
                        <a href="cart.php?action=delete&id=<?php echo $item['book_id'] ?>">Delete</a>
                    </td>               
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan=4>Tong tien</td>
                <td colspan=2><?php echo number_format($total) ?></td>
            </tr>
        </table>
        <?php 
    }
}