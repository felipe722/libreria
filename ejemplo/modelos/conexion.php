<?php 


//$con = mysqli_connect("localhost","root","","MY_BOOKS");

//if ($con->connect_errno) {
    # code...
//    echo "error al conectar";
//}

//echo $con->host_info;

// clase conexion para conectar a base de datos
class conexion{

    // variable privada cone para crear el objeto mysqli (tambien se puede usar pdo)
    private $con;

    //constructor que inicializa la variable con
    public function __construct()
    {
        //inicializando la varialbe con para la conexion a base de datos
        //variables de mysqli host, usuario, contraseña, base de datos
        $this->con = new mysqli("localhost","root","","MY_BOOKS");
    } 

    //funcion que retorna la conexion
    public function getConexion()
    {
        return $this->con;
    }


    //funcion que cierra la base de datos
    public function closeConexion()
    {
        if ($this->con->close()) {
            //return "no se pudo cerrar la base de datos";
            return true;
        }else{
            return false;
        }
    }

}


?>