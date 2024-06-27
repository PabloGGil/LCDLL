<?php
$dir= __DIR__ . '\\';
echo $dir;
require_once $dir ."class.conexionDAO.php";
class DAO{

    private $conn;
    private $strSQL;

    public function __construct(){
        $this->conn=conectar();
    }

    public function ejecutarSQL($sql){
        $array=array();
        $resultado= $this->conn->query($sql);
        if(!$resultado){
            $array['errmsg']=mysqli_error($this->conn);
            $array['rc']=1;
            $array['info'] =null;
        }else{
            if ($resultado instanceof mysqli_result){
                $array['info'] = $resultado->fetch_array(MYSQLI_BOTH);
                $array['rc']=0;
                $array['errmsg']="";
            }

        }
        return $array;

    }
}