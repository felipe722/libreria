 <?php

//incluir la conexion a bese de datos
include("conexion.php");

class libro{

    //creamos una variable para conectar
    private $conex;

    public function __construct()
    {
        //inicializamos la base de datos
        $this->conex = new conexion();
    }

    //funcion para retornar un arreglo de libros
    function getLibros()
    {
        //consulta sql 
        $consulta = "select l.idelibro, l.titulo, 
        l.numPaginas, a.nombre_autor, s.num_estante, 
        o.ide_orden, e.descripcion as estado
        from libros as l 
        inner join autor as a on l.id_autor = a.ideautor 
        inner join stante as s on l.id_estante = s.id_stante 
        inner JOIN estado_libro as e on l.id_estado = e.id 
        left JOIN orden as o on o.ide_orden = l.id_orden";

        //aterrizamos el resultado
        $resultado = mysqli_query($this->conex->getConexion(), $consulta);

        //declaramos un arreglo
        $arregloLibros = [];

        //metodo para llenar el arreglo
        $contador = 0;
        if ($resultado->num_rows > 0) {
            # code...
            while($fila = $resultado->fetch_assoc()){
                $arregloLibros[$contador] = $fila;
                $contador++;
            }

        }

        //regresamos el arreglo
        return $arregloLibros;

    }
    // crud (create read update delete) para patron de diseño MVC (modelo-vista-controlador)

    function getLibroByid($id){
        /*
        $consulta ="SELECT l.idelibro, l.titulo, 
        l.numPaginas, a.nombre_autor, s.num_estante, 
        o.ide_orden, e.descripcion as estado
        from libros as l 
        inner join autor as a on l.id_autor = a.ideautor 
        inner join stante as s on l.id_estante = s.id_stante 
        inner JOIN estado_libro as e on l.id_estado = e.id 
        left JOIN orden as o on o.ide_orden = l.id_orden where l.idelibro = ".$id;
    */

    $consulta ="SELECT * from libros WHERE idelibro = ".$id;
     $resultado = mysqli_query($this->conex->getConexion(), $consulta);

     return mysqli_fetch_assoc($resultado);
    }
     
    function createLibro($titulo, $numPaginas, $nombre_autor, $num_estante, $estado)
    {

        

        $consulta ="insert into `libros`
        (`idelibro`, `titulo`, `numPaginas`, `id_autor`, `id_estante`, `id_orden`, `id_estado`) values 
        (null , '".$titulo."' , ".$numPaginas." ,".$nombre_autor.", ".$num_estante.", null,".$estado.")";
//de esta forman declaramos en updatelibro
        //print $consulta;
       // $resultado = mysqli_query($this->conex->getConexion(), $consulta);
        //3+4 = 2+ 5
        // "'hola"." "."mundo 7' 
        // = 'hola mundo' 7

        
        return mysqli_query($this->conex->getConexion(),$consulta);
        


    }
    function updateLibro($idelibro, $titulo, $numPaginas, 
    $nombre_autor, $num_estante, $estado)
    {
        # code...
        
        $consulta = "UPDATE `libros` 
        SET `titulo`='".$titulo."' ,
        `numPaginas`=".$numPaginas." , `id_autor`=".$nombre_autor." ,
        `id_estante`=".$num_estante." , `id_orden`= null ,
        `id_estado`=".$estado." WHERE `idelibro`=".$idelibro;

       

         //$resultado = mysqli_query($this->conex->getConexion(), $consulta);

         return mysqli_query($this->conex->getConexion(),$consulta);
    }
    


    function deleteLibro($idelibro){
        $consultalibro= "select * from libros where idelibro=".$idelibro.";";
    
        $resultadolibro =mysqli_query($this->conex->getConexion(),$consultalibro);
        if ($resultadolibro->num_rows > 0) {
            $consulta ="DELETE FROM libros where idelibro=".$idelibro.";";
            $resultado = mysqli_query($this->conex->getConexion(),$consulta);
            if ($resultado) {
                return mysqli_fetch_assoc($resultadolibro);
            }else{
                return "no se";
            }
        }
        }
        
    }
    




 