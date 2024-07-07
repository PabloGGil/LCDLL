<?php
/* ----------------------------------------------------------------
variables que vienen del front


----------------------------------------------------------------*/
require_once "../modelo/class.Personaje.php";
require_once "../modelo/class.Usuario.php";
$data = json_decode(file_get_contents('php://input'), true);

// if($_POST){
  
        if(isset($data['username'])&&isset($data['nombre'])&&isset($data['imagen'])&&isset($data['peso'])&&isset($data['altura'])){
            $username  =  $data['username'];       
            $nombrePoke  =  $data['nombre'];
            $imagen  =  $data['imagen'];
            $altura  =  $data['altura'];
            $peso  =  $data['peso'];
            $poke= new Personaje($nombrePoke,$imagen , $peso,$altura );
            $retorno=$poke->insertarReg();
            if($retorno['rc']==0){
                $grupo=new Usuario($username);
                $grupo->VincularPoke($nombrePoke);
            }
            else{

            }
        }else{
            echo "error";
        }

header('Content-Type: application/json');
http_response_code(200);
echo json_encode($retorno,JSON_PARTIAL_OUTPUT_ON_ERROR);
// }