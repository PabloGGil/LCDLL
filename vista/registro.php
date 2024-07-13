<?php

require_once "../modelo/class.Usuario.php";
$data = json_decode(file_get_contents('php://input'), true);
// $nombre="pablo";
// $apellido="gabriel";
// // $username="pablog62@gmail.com";
// $correo="pablog62@gmail.com";
// $password="lamarzotti";
// $fecha="20/06/2024";



if($data['q']){
    if(isset($data['nombre'])&&isset($data['apellido'])&&isset($data['correo'])&&isset($data['password'])&&isset($data['fechaNac']))
    {   
        $nombre=$data['nombre'];
        $apellido=$data['apellido'];
        // $username="pablog62@gmail.com";
        $correo=$data['correo'];
        $password=$data['password'];
        $fecha=$data['fechaNac'];
        
        $registro=new Usuario($nombre,$apellido,$correo,$password,$fechaNac);
        if(isset($data['q']))
        {
            switch ($data['q']) 
            {
                
                case 'alta':
                    $retorno=$registro->insertarReg();
                    break;
                case 'baja':
                    $retorno=$registro->BorrarReg();
                    break;
            }
        
        }
    }else{
        $retorno['info']="";
        $retorno['rc']=1;
        $retorno['errmsg']="ALgun campo esta vacío, no se dio de alta el registro";
    }
    if($data['q']=='consulta'){
        $datos=new Usuario();
        $retorno=$datos->consultar();
    }
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($retorno, JSON_UNESCAPED_UNICODE);
}