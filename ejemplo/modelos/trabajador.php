<?php
include("conexion.php");

class trabajador{
    private $conness;
    public  function __construct() 
    {
        $this->conness = new conexion();
    }
    function getTrabajador()
    {
        $consulta= "select * from  trabajador";
        $resultado= mysqli_query($this->conness->getConexion(),$consulta);
    $arregloTrabajador=[];
        
    $contador =0;
    if($resultado->num_rows >0){
        while($fila =$resultado->fetch_assoc()){
            $arregloTrabajador[$contador]=$fila;
            $contador++;


        }
    }

  return $arregloTrabajador;

    }
    function getTrabajadorByid($id){
        $consulta="select * from trabajador where id=".$id;
        $resultado=mysqli_query($this->conness->getConexion(),$consulta);
        return mysqli_fetch_assoc($resultado);
        
    }


    function createTrabajador($nombre_t,$telefono_t)
    {
     $consulta = "INSERT INTO `trabajador`(`id`,`nombre`,`telefono`) 
    VALUES (null,'".$nombre_t."',".$telefono_t.")";



     $resultado = mysqli_query($this->conness->getConexion(), $consulta);

     
     if ($resultado) {
        return true;
    }else{
        return false;
    }

 }


 function updateTrabajador($id_t,$nombre_t,$telefono_t)
 {
     $consulta="UPDATE`trabajador`
     SET `nombre`='".$nombre_t."',`telefono`=".$telefono_t." WHERE `id`=".$id_t;
     $resultado = mysqli_query($this->conness->getConexion(), $consulta);

     if ($resultado) {
        return true;
    }else{
        return false;
    }


 }
 function deletetrabajador($id_t){
    $consultatrabaja = "select * from trabajador where id=".$id_t.";";

    $resultadotrabaja =mysqli_query($this->conness->getConexion(),$consultatrabaja);
    if ($resultadotrabaja->num_rows > 0) {
        $consulta ="DELETE FROM trabajador where id=".$id_t.";";
        $resultado = mysqli_query($this->conness->getConexion(),$consulta);
        if ($resultado) {
            return mysqli_fetch_assoc($resultadotrabaja);
        }else{
            return "no se";
        }
    }
    }
}
