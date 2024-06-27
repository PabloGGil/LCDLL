<?php


if($_POST){

    if(isset($_POST['nombre'])&&isset($_POST['tipo'])&&isset($_POST['descripcion'])&&isset($_POST['precio'])){
        $xprod= new Producto($_POST['nombre'],$_POST['tipo'] , $_POST['descripcion'],$_POST['precio'] );
        $xprod->insertarBD();

    }
}