<?php
require_once "class.DAO.php";

class Usuario{

    
    private $Username; 
    private $Correo; 
    private $Password;
    private $FechaRegistro;
    private $Grupo="";

    public function __construct($nombre="",$apellido="",$username="",$correo="",$password="",$fecha="")
    {
       $this->setUsername($username);
       $this->setCorreo($correo);
       $this->setPassword($password);
       $this->setFechaRegistro($fecha);
    }

    /*-----------getters------------------*/
    public function getUsername (){
        return $this->Username;
    }

    public function getCorreo (){
        return $this->Correo;
    }

    public function getPassword (){
        return $this->Password;
    }

    public function getFechaRegistro (){
        return $this->FechaRegistro;
    }

  

    /*-----------setters------------------*/

    public function setUsername ($aux){
        $this->Username=$aux;
    }

    public function setCorreo ($aux){
        $this->Correo=$aux;
    }

    public function setPassword ($aux){
        $this->Password=$aux;
    }

    public function setFechaRegistro ($fecha){
      
        $this->FechaRegistro=$fecha;
    }

    /*-----------metodos------------------*/
    public function consultar(){
        $filtro="";
        $strSQL=" SELECT username,correo,password,fechaRegistro FROM USUARIO ";
        echo $strSQL;
        $dao=new DAO();
        $data=$dao->ejecutarSQL($strSQL);
        return $data;
    }

    public function existe($username){
        $strSQL=" SELECT count(username) as cuenta FROM USUARIO where username='{$username}'";
        $dao=new DAO();
        $data=$dao->ejecutarSQL($strSQL);
        if($data['info']['cuenta']!=0){
            return true;
        }else{
            return false;
        }
    }

    public function insertarReg(){
        if(!$this->existe($this->getUsername())){
            $strSQL="INSERT INTO USUARIO(username,correo,password,fechaRegistro) VALUES('{$this->getUsername()}','{$this->getCorreo()}','{$this->getPassword()}',CURDATE())";
            echo $strSQL;
            $dao=new DAO();
            $dao->ejecutarSQL($strSQL);
        }else{
            echo " el username ya existe";
        }
    }

    public function actualizarReg(){
       
        $strSQL="UPDATE USUARIO SET ";
        echo $strSQL;
        $dao=new DAO();
        $dao->ejecutarSQL($strSQL);
    }

    public function BorrarReg($nombreUsr){
      
        if(isset($nombreUsr)){
            $strSQL="DELETE FROM USUARIO WHERE username='{$nombreUsr}'";
            echo $strSQL;
            $dao=new DAO();
            $dao->ejecutarSQL($strSQL);
        }
    }

    public function LoginOK($usuario,$password){
        $dao=new DAO();
        $login=$dao->ejecutarSQL("select count(username) as cuenta from usuario where correo='{$usuario}' and password='{$password}'");
        if($login['rc']==0){
            if($login['info']['cuenta']==1){
                // login exitoso
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getID(){
        $daousr=new DAO();
        $daousr->ejecutarSQL("SELECT ID from usuario where username='{$this->getUsername()}'");

    }
    Public function AsociarPoke($nombrepoke){
        if (isset($this->Username)){
buso ID
        }


    }


    
}