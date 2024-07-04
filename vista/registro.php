<?php

require_once ".\\modelo\\class.Usuario.php";

$nombre="pablo";
$apellido="gabriel";
// $username="pablog62@gmail.com";
$correo="pablog62@gmail.com";
$password="lamarzotti";
$fecha="20/06/2024";



if($_POST){
    if(isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['correo'])&&isset($_POST['password'])&&isset($_POST['fecha'])){
    {   
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        // $username="pablog62@gmail.com";
        $correo=$_POST['correo'];
        $password=$_POST['password'];
        $fecha=$_POST['fecha'];
        
        $registro=new Usuario($nombre,$apellido,$correo,$password,$fecha);
        if(isset($_GET['q']))
        {
            switch ($_GET['q']) 
            {
                case 'consulta':
                    $datos=new Usuario();
                    $retorno=$datos->consultar();
                    break;
                case 'alta':
                    $retorno=$registro->insertarReg();
                    break;
                case 'baja':
                    $retorno=$registro->BorrarReg();
                    break;
            }
        
        }
    }
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($retorno, JSON_UNESCAPED_UNICODE);
}