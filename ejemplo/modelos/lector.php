<?php
include("conexion.php");

class lector{

    private $conexi;

    public  function __construct() 
    {
        $this->conexi = new conexion();
    }

    function getLector()
    {
        // innner join con boleta

        /*
        SELECT * FROM leector as l 
inner join boleta as b 
on l.ide_lector = b.id_lector 
         */
        $consulta= "SELECT * FROM leector as l 
        inner join boleta as b 
        on l.ide_lector = b.id_lector ";
        $resultado= mysqli_query($this->conexi->getConexion(),$consulta);
        $arregloLector=[];
        
        $contador =0;
        if($resultado->num_rows >0){
            while($fila =$resultado->fetch_assoc()){
                $arregloLector[$contador]=$fila;
                $contador++;


                
            }
        }

        return $arregloLector;

    }

    function getLectorByid($id)
    {
        $consulta= "select * from leector where ide_lector=".$id;
        $resultado=mysqli_query($this->conexi->getConexion(),$consulta);
        return mysqli_fetch_assoc($resultado);
        
    }
    

    function getIdLector($nombre_lec,$direccio_lec,$telefono_lec){

        $consulta2= "select * from leector where nombre=".$nombre_lec." AND direccio=".$direccio_lec.
            " AND telefono=".$telefono_lec;
            $buscarUser=mysqli_query($this->conexi->getConexion(),$consulta2);
            $resultado_lector = json_encode(mysqli_fetch_assoc($buscarUser)); 
            $resultadofinal = json_decode($resultado_lector);
            $id_lector = $resultadofinal->ide_lector;

            return $id_lector;

    }

    function createLector($nombre_lec,$direccio_lec,$telefono_lec,$registro_lec,$expiracion_lec)
    {
        $consulta = "INSERT INTO `leector`(`ide_lector`,`nombre`,`direccio`,`telefono`) 
        VALUES (null,'".$nombre_lec."','".$direccio_lec."',".$telefono_lec.")";

        $resultado = mysqli_query($this->conexi->getConexion(), $consulta);

        
        if ($resultado) {
            //return true;

            $sid = $this->getIdLector($nombre_lec,$direccio_lec,$telefono_lec);
            
            $consulta_boleta = "INSERT INTO `boleta`(`ide_boleta`, `id_lector`,`registro`, `expiracion`) VALUES (null, ".$sid.", now(), '".$expiracion_lec."')";

        $resultado_final = mysqli_query($this->conexi->getConexion(), $consulta_boleta);


        if ($resultado_final) {
            # code...
            return true;
        }else{
            return false;
        }

        }else{
            return false;
        }

    }


    public function updateLector($ide_lec, $nombre_lec,$direccio_lec,$telefono_lec,$registro_lec,$expiracion_lec)
    {
        # code...
        
        $consulta = "UPDATE `leector` 
        SET `nombre`='".$nombre_lec."',`direccio`='".$direccio_lec."'
        ,`telefono`=".$telefono_lec." WHERE `ide_lector`=".$ide_lec;

       

       

         $resultado = mysqli_query($this->conexi->getConexion(), $consulta);
         $resultado2 = mysqli_query($this->conexi->getConexion(), $consulta);

         if ($resultado AND $resultado2) {
            return true;
        }else{
            return false;
        }
    }

function deletelector($ide_lec){
    $consultalector = "select * from leector where ide_lector=".$ide_lec.";";

    $resultadolector =mysqli_query($this->conexi->getConexion(),$consultalector);
    if ($resultadolector->num_rows > 0) {
        $consulta ="DELETE FROM leector where ide_lector=".$ide_lec.";";
        $resultado = mysqli_query($this->conexi->getConexion(),$consulta);
        if ($resultado) {
            return mysqli_fetch_assoc($resultadolector);
        }else{
            return "no se";
        }
    }
    }
}

