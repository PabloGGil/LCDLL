<?php

require_once ".\\modelo\\class.Usuario.php";

$nombre="pablo";
$apellido="gabriel";
$username="pablog62@gmail.com";
$correo="pablog62@gmail.com";
$password="lamarzotti";
$fecha="20/06/2024";


if($_POST){

    if($_POST['q'])
    {
        echo " consulta";
    }
    else{
        if(isset($_POST['nombre'])&&isset($_POST['tipo'])&&isset($_POST['descripcion'])&&isset($_POST['precio'])){
            // $xprod= new usuario();
            // $xprod->insertarReg($nombre,$apellido,$username,$correo,$password,$fecha);
            echo "insert, update o delete";

        }
    }
}