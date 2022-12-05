<?php 
class Product extends Db 
{
    function all()
    {
        return $this->select('select * from book');
    }
    //1 sach theo id
    function getById($book_id)
    {
        $sql ='select * from book where book_id=?';
        $a= [$book_id];
        $data = $this->select($sql, $a);
        if (Count($data)>0) return $data[0];
        return [];//tra ve mang rong
    }
}