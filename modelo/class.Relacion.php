<?php
require_once "class.DAO.php";

class Producto{

    
    private $Nombre; 
    private $Tipo; 
    private $Descripcion;
    private $Precio;
    private $comentario;

    public function __construct($nombre,$tipo,$desc,$precio)
    {
       $this->setNombre($nombre);
       $this->setTipo($tipo);
       $this->setDescripcion($desc);
       $this->setPrecio($precio);
    }

    /*-----------getters------------------*/
    public function getNombre (){
        return $this->Nombre;
    }

    public function getTipo (){
        return $this->Tipo;
    }

    public function getDescripcion (){
        return $this->Descripcion;
    }

    public function getPrecio (){
        return $this->Precio;
    }

  

    /*-----------setters------------------*/

    public function setNombre ($aux){
        $this->Nombre=$aux;
    }

    public function setTipo ($aux){
        $this->Tipo=$aux;
    }

    public function setDescripcion ($aux){
        $this->Descripcion=$aux;
    }

    public function setPrecio ($aux){
        $this->Precio=$aux;
    }

    /*-----------metodos------------------*/
    public function consultarBD(){

    }

    public function insertarBD(){
        echo "..... ACA HAGO EL INSERT.....";
        $strSQL="INSERT INTO producto(producto,tipo,precio,descripcion) VALUES('{$this->getNombre()}','{$this->getTipo()}','{$this->getPrecio()}','{$this->getDescripcion()}')";
        echo $strSQL;
        $dao=new DAO();
        $dao->ejecutarSQL($strSQL);
    }
    
}