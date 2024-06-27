<?php


require_once ".\\modelo\\class.usuario.php";
echo "llego al php";

// --- verificar que los datos necesarios no esten vacios

if(isset($_POST['correo'])&&isset($_POST['password'])){
    $correo=$_POST['correo'];
    $password=$_POST['password'];
    $usuario=new usuario( );
    if($usuario->LoginOK($correo,$password)){
        $retorno['rc']=0;
        $retorno['msgerror']="";
        $retorno['info']=true;
    }
    else{
        $retorno['rc']=1;
        $retorno['msgerror']="login fallido";
        $retorno['info']=null;
       
    }
}else{
    $retorno['rc']=1;
    $retorno['msgerror']="Datos insuficientes, por favor vuelva a cargar";
    $retorno['info']=null;
    
}
header('Content-Type: application/json');
http_response_code(200);
echo json_encode($retorno, JSON_UNESCAPED_UNICODE);