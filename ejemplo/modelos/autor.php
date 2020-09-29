<?php
include("conexion.php");

class autor{
    private $coner;
    public function __construct()
    {
    $this->coner =new conexion();    
    }
    
    function getAutor()
    {
    $consulta = "select * from autor";
    

       $resultado = mysqli_query($this->coner->getConexion(),$consulta);
       $arregloAutor =[];  
    
    
      $contador =0;
       if ($resultado->num_rows >0) {
        while($fila =$resultado->fetch_assoc()){
            $arregloAutor[$contador] = $fila;
        $contador++;
        }
    }


       return $arregloAutor;
    }
    

    function getAutorById($id)
    {
    $consulta = "select * from autor where ideautor=".$id;
    

       $resultado = mysqli_query($this->coner->getConexion(),$consulta);

       return mysqli_fetch_assoc($resultado);

    }


    function createAutor($nombre_autor)
    {
         $consulta = "INSERT INTO `autor`(`nombre_autor`) 
        VALUES ('".$nombre_autor."')";

         $resultado = mysqli_query($this->coner->getConexion(), $consulta);

         
         if ($resultado) {
            return true;
        }else{
            return false;
        }

    }

    public function updateAutor($id, $nombre)
    {
        # code...
        
        $consulta = "UPDATE `autor` SET `nombre_autor`='".$nombre."' WHERE `ideautor`=".$id;

         $resultado = mysqli_query($this->coner->getConexion(), $consulta);

         if ($resultado) {
            return true;
        }else{
            return false;
        }
    }

    function deleteautor($ideautor){
    $consultaautor = "select * from autor where ideautor=".$ideautor.";";

    $resultadoautor =mysqli_query($this->coner->getConexion(),$consultaautor);
    if ($resultadoautor->num_rows > 0) {
        $consulta ="DELETE FROM autor where ideautor=".$ideautor.";";
        $resultado = mysqli_query($this->coner->getConexion(),$consulta);
        if ($resultado) {
            return mysqli_fetch_assoc($resultadoautor);
        }else{
            return "no se";
        }
    }
    }
    
}








