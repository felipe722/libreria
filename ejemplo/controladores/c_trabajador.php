<?php
include("../modelos/trabajador.php");
$opcion_user =$_GET["opcion"];
$id =$_GET["id"];
$nombre =$_GET["nombre"];
$telefono=$_GET["telefono"];

$c_trabajador = new trabajador();

switch($opcion_user){

    case "vertodos":
        $trabajador= $c_trabajador->getTrabajador();
        echo json_encode($trabajador);         
    break;

    case "vertrabajador":
        $trabajador = $c_trabajador->getTrabajadorByid($id);
        echo json_encode($trabajador);    
           
    break;

    case "eliminar":
        $resultado = $c_trabajador->deletetrabajador($id);
        echo json_encode($resultado); 
    break;

    case "insertar":
        $resultado = $c_trabajador->createTrabajador($nombre, $telefono);
        echo $resultado;  
    break;
    
    case "update":
        $resultado = $c_trabajador->updateTrabajador($id,$nombre,$telefono);
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
        echo "no se recibio ninguna opcion valida2";
    break;

}


?>