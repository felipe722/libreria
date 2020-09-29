<?php
include("../modelos/lector.php");
$opcion_user =$_GET["opcion"];
$ide_lector =$_GET["ide_lector"];
$nombre =$_GET["nombre"];
$direccio =$_GET["direccio"];
$telefono=$_GET["telefono"];
$registro=$_GET["registro"];
$expiracion=$_GET["expiracion"];

$c_lector = new lector();

switch($opcion_user){

    case "vertodos":
        $lector= $c_lector->getLector();
        echo json_encode($lector);         
    break;

    case "verlector":
        $lector = $c_lector->getLectorByid($ide_lector);
        echo json_encode($lector);     
    break;

    case "eliminar":
        $resultado = $c_lector->deletelector($ide_lector);
        echo json_encode($resultado); 
            
    break;

    case "insertar":
        $resultado = $c_lector->createLector($nombre,$direccio, $telefono,$registro,$expiracion);
        echo $resultado;  
        
        
    break;
    
    case "update":
        $resultado = $c_lector->updateLector($ide_lector,$nombre, $direccio, $telefono);
        echo $resultado;  
    break;

    case "mensaje":
        
    break;

    case "bool":
        
        if($titulo == "true"){
            echo "true";
        }else{
            echo "false";
        }
    break;

    default:
        echo "no se recibio ninguna opcion valida";
    break;

}


?>