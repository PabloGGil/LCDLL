<?php

// require_once ".\\equipo.php";
// require_once ".\\login.php";
// require_once ".\\registro.php";
require_once ".\\modelo\\class.personaje.php";
// programa para chequear las funcionalidades como si fuera el html

// --- variables para el registro

// --- variables para el equipo

/*
$username=$_POST['usuario'];
$nombrePoke=$_POST['nombrePoke'];
$categoria=$_POST['categoria'];
$tipo=$_POST['tipo'];
$ataque=$_POST['ataque'];
$defensa=$_POST['defensa'];
*/

$nombrePoke="castrona";
$tipo="radianex";
$categoria="electricus";
$ataque=100;
$defensa=80;

$poke=new Personaje($nombrePoke,$tipo,$categoria,$ataque,$defensa);
$poke->insertarReg();

// prueba query

// $registro=new Usuario($nombre,$apellido,$username,$correo,$password,$fecha);

// $registro->insertarReg();
// $usuarios=$registro->consultar();
// var_dump($usuarios);