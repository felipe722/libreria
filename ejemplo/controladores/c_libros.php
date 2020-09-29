<?php
include("../modelos/libro.php");
$opcion_user =$_GET["opcion"];
$idelibro= $_GET['idelibro'];
$titulo = $_GET['titulo'];
$numpaginas = $_GET['numpaginas'];
$nombre_autor = $_GET['nombre_autor'];
$num_estante = $_GET['num_estante'];
$estado = $_GET['id_estado'];
$ide_orden = $_GET['ide_orden'];



// m - html - v -js-  c -php- m ->base de datos  

$c_libros = new libro();


switch($opcion_user){

    case "vertodos":
        $libro = $c_libros->getLibros();
        echo json_encode($libro);         
    break;

    case "verlibro":
        $libro = $c_libros->getLibroByid($idelibro);
        echo json_encode($libro);         
    break;

    case "eliminar":
            $resultado = $c_libros->deleteLibro($idelibro);
        echo json_encode($resultado);  
    break;

    case "insertar":
        $resultado = $c_libros->createLibro($titulo, $numpaginas, $nombre_autor, $num_estante, $estado);
        echo $resultado;         
    break;
    
    case "update":
        $resultado = $c_libros->updateLibro($idelibro,$titulo, $numpaginas, $nombre_autor, $num_estante, $estado);
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