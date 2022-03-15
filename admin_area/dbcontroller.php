<?php
class DBController{
    private $host ="localhost";
    private $user ="root";
    private $pass ="";
    private $dbname ="ecyclehub";

    private $conn2;

    function __construct()
    {
        $this->conn2=$this->connectDB();
    }
    function connectDB(){
        $conn2=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
        mysqli_set_charset($conn2,"utf8");
        return $conn2;
    }
    function runQuery($query){
        $result=mysqli_query($this->conn2,$query);
        while($row=mysqli_fetch_assoc($result)){
            $resultset[]=$row;
        }
        if(!empty($resultset)){
            return $resultset;
        }
    }
    function numRows($query){
        $result=mysqli_query($this->conn2,$query);
        $rowcount=mysqli_num_rows($result);
        return $rowcount;
    }

}
?>
