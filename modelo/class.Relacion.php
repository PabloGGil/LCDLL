<?php
require_once "class.DAO.php";

class Relacion{

    
    

    public function __construct(private $id,private $id_poke,private $id_usr)
    {
       
    }

    /*-----------getters------------------*/
    public function getid (){
        return $this->id;
    }

    public function getid_poke (){
        return $this->id_poke;
    }

    public function getid_usr (){
        return $this->id_usr;
    }


  

    /*-----------setters------------------*/

    public function setid ($aux){
        $this->id=$aux;
    }

    public function setid_poke ($aux){
        $this->id_poke=$aux;
    }

    public function setid_usr ($aux){
        $this->id_usr=$aux;
    }

 
    

    /*-----------metodos------------------*/
    public function consultarBD(){
        $strSQL="select u.username ,p.nombre, p.puntos_ataque ,p.puntos_defensa,p.imagen 
                from pokemon.usuario u ,pokemon.personaje p ";
        $dao=new DAO();
        $data=$dao->ejecutarSQL($strSQL);
        return $data;
    }

    public function insertar($id_poke,$id_usr){
        echo "..... ACA HAGO EL INSERT.....";
        $strSQL="INSERT INTO producto(id_poke,id_usr) VALUES('{$this->getid()}','{$this->getid_poke()}','{$this->getid_usr()}')";
        echo $strSQL;
        $dao=new DAO();
        $dao->ejecutarSQL($strSQL);
    }
    
}