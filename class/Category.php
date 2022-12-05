<?php 
class Category extends Db 
{
    //tra ve tat ca category
    function all()
    {
        $sql ='select * from category';
        return $this->select($sql);
    }
//xoa category co id=$id
    function delete($id)
    {
        $sql="delete from category where cat_id=?";
        $arrParam =[$id];
        return $this->update($sql, $arrParam);
    }
}