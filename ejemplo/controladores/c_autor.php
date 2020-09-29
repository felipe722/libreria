<?php
include("../modelos/autor.php");
$opcion_user =$_GET["opcion"];   
$ideautor = $_GET['idautor'];
$nombreautor = $_GET['nombreautor'];

// m - html - v -js-  c -php- m ->base de datos  


$c_autor = new autor();

switch($opcion_user){

    case "vertodos":
        $autor = $c_autor->getAutor();
        echo json_encode($autor);         
        
    break;

    case "verautor":
        $autor = $c_autor->getAutorById($ideautor);
        echo json_encode($autor);         
    break;

    case "eliminar":
        $resultado = $c_autor->deleteautor($ideautor);
        echo json_encode($resultado);         
    break;

    case "insertar":
        $resultado = $c_autor->createAutor($nombreautor);
        echo $resultado;         
    break;
    
    case "update":
        $resultado = $c_autor->updateAutor($ideautor, $nombreautor);
        echo $resultado;         
    break;

    case "mensaje":
        echo "hola, el nombre del libro es ".$autor;        
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