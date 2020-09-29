<!DOCTYPE html>
<html lang="en">
    <?php
    
    include("./head.php");

    ?>
    <body id="page-top" onload="verlector()" >
        <!-- Navigation-->
        <?php include("nav.php"); ?>
        <!-- Masthead-->
        <?php include("header.php"); ?>



        <!-- espacio de trabajo-->

<!--ESTE ES EL BOTTON PARA INSERTAR-->
<div class="container">     
  <h2>Lectores</h2>

  <input type="date" name="fecha" id="fecha">
  <button onclick="verFecha()">ver fecha</button>
  <!-- Button to Open the Modal -->
  <button type="button" onclick="limpiarDatos()" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Ingresar nuevo lector
  </button>

  <!-- The Modal ES LA PANTTALLA PARA INSERTAR O ACTULUIXAR  -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nuevos Datos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body  ESTE ES PARA QUE TE PERMITA AGREGAR NOMBRE Y DE AUTOR-->
        <div class="modal-body">
        <input type="hidden" id="id_lec">

           
        <div class="col-4">
          <!-- # es para llamar elementos html-->
            Ingresar Nombre:<input type="text" id="nombre_lec">
            <br>
            Ingresar Direccion:<input type="text" id="direccio_lec">
            <br>
            Ingresar Telefono:<input type="number" id="telefono_lec">
            <br>
           Ingresar Registro:<input type="date" id="registro_lec">
            Ingresar Expiracion:<input  type="date" id="expiracion_lec">
            <br>

            
           
        </div>

        
        
        <!-- Modal footer PARA QUE ABRA EN EL MIMO LUGAR TODO -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"
          onclick="insertarLector()"><span id="spanopcion"></span></button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<!--AQUI ESTA PARA MOSTRAR LA TABLA-->


<div class="container">
 <table class="table table-hover">
    <thead>
      <tr>
        <th>Ide lector</th>
        <th>Nombre  </th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Registro</th>
        <th>Expiración</th>
        <th>Opciones</th>
 
      </tr>
    </thead>
    <tbody id="tbodylector">
      
        
    
    </tbody>
  </table>
</div>

<!--BOTON DE VER ESTA AL ULTIMO-->
      <button onclick="verlector()">ver lector </button>


        <!-- Footer A QUI REFERENCIA LA TABLA  EL ARCHIVO-->
        <script src="../assets/js/lector.js"></script>
        
        <?php include("footer.php"); ?>
        <?php include("scripts.php") ?>

        <script>
        /*
        console.log("la hora actual es ...");
        var fecha_actual = new Date();
        console.log(fecha_actual.getDate());
        console.log(fecha_actual.getHours());
        console.log(Date.now());
*/
        function verFecha(){
          var fech=$('#fecha').val();
          alert(fech);
          console.log("la hora escogida es es ...");
        console.log(fech);
        console.log(Date.now());
        }

        </script>
    </body>
</html>
