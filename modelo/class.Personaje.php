<?php
require_once "class.DAO.php";

class Personaje{

    
    // private $Nombre; 
    // private $Tipo; 
    // private $Categoria;
    // private $Ataque;
    // private $Defensa;

    // public function __construct($nombre,$tipo,$categoria,$ataque,$defensa)
    // {
    //    $this->setNombre($nombre);
    //    $this->setTipo($tipo);
    //    $this->setCategoria($categoria);
    //    $this->setAtaque($ataque);
    //    $this->setDefensa($defensa);
    // }

    public function __construct(private $Nombre, private $Tipo,private $Categoria, private $Ataque, private $Defensa)
    {
    /*funcion sin codigo 
    ver  Properties Promotion o Promoted Properties  https://stitcher.io/blog/constructor-promotion-in-php-8
    Que hace este tipo de constructor?
        * crea las propiedades afuera
        * le dices que son privadas (pueden ser tambien public o protected)
        * hace la asignacion incial
     */
    }
    /*-----------getters------------------*/
    public function getNombre (){
        return $this->Nombre;
    }

    public function getTipo (){
        return $this->Tipo;
    }

    public function getCategoria (){
        return $this->Categoria;
    }

    public function getAtaque (){
        return $this->Ataque;
    }

    public function getDefensa (){
        return $this->Defensa;
    }
  

    /*-----------setters------------------*/

    public function setNombre ($aux){
        $this->Nombre=$aux;
    }

    public function setTipo ($aux){
        $this->Tipo=$aux;
    }

    public function setCategoria ($aux){
        $this->Categoria=$aux;
    }

    public function setAtaque ($aux){
        $this->Ataque=$aux;
    }

    public function setDefensa ($aux){
        $this->Defensa=$aux;
    }
    /*-----------metodos------------------*/
    public function consultar(){
        $strSQL="SELECT nombre,tipo,categoria,puntos_ataque,puntos_defensa FROM PERSONAJE";
    }

    public function existe($nombre){
        $strSQL=" SELECT count(nombre) as cuenta FROM PERSONAJE where nombre='{$nombre}'";
        $dao=new DAO();
        $data=$dao->ejecutarSQL($strSQL);
        if($data['info']['cuenta']!=0){
            return true;
        }else{
            return false;
        }
    }

    public function insertarReg(){
        if(!$this->existe($this->getNombre())){
            $strSQL="INSERT INTO personaje(nombre,tipo,Categoria,puntos_ataque,puntos_defensa) 
            VALUES('{$this->getNombre()}','{$this->getTipo()}','{$this->getCategoria()}',{$this->getAtaque()},{$this->getDefensa()})";
            echo $strSQL;
            $dao=new DAO();
            $dao->ejecutarSQL($strSQL);
        }else{
            echo " el personaje ya existe";
        }
    }
    
}