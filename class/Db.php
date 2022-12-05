<?php 
class Db{
    protected $conn ;
    function __construct()
    {   $connStr ='mysql:host=localhost:3308' .HOST.';dbname='.DB ;
        try {
        $this->conn = new PDO($connStr, USER, PASSWORD );
        $this->conn->query('set names utf8');
        }
        catch(Exception $e)
        {
            echo "Loi connect."; exit;
        }
    }
    
    protected function select($sql, $arrParam=[])
    {//$stm: bien object PdoStatement
        $stm = $this->conn->prepare($sql);
      //  echo $sql;
        $stm->execute($arrParam);
        return $stm->fetchAll(PDO::FETCH_ASSOC);//TRA VE DANG ARRAY
    }
    
    protected function update($sql, $arrParam=[])
    {//$stm: bien object PdoStatement
        $stm = $this->conn->prepare($sql);
        $stm->execute($arrParam);
        return $stm->rowCount();
    }
}