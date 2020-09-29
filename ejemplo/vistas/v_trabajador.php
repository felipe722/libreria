<!DOCTYPE html>
<html lang="en">
    <?php
    
    include("./head.php");

    ?>
    <body id="page-top" onload="vertrabajador()" >
        <!-- Navigation-->
        <?php include("nav.php"); ?>
        <!-- Masthead-->
        <?php include("header.php"); ?>



        <!-- espacio de trabajo-->

<!--ESTE ES EL BOTTON PARA INSERTAR-->
<div class="container">     
  <h2>Modal Example</h2>
  <!-- Button to Open the Modal -->
  <button type="button" onclick="limpiarDatos()" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Insertar trabajador
  </button>

  <!-- The Modal ES LA PANTTALLA PARA INSERTAR O ACTULUIXAR  -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">INGRESA TU NUEVA INFORMACION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body  ESTE ES PARA QUE TE PERMITA AGREGAR NOMBRE Y DE AUTOR-->
        <div class="modal-body">
        <input type="hidden" id="id_t">
        

        <div class="col-4">
          Ingresar nombre:<input type="text" id="nombre_t">
          <br>
          Ingresar Telefono:<input type="text" id="telefono_t">
          <br>

          
              
            
          
          

        </div>
        
        <!-- Modal footer PARA QUE ABRA EN EL MIMO LUGAR TODO -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"
          onclick="insertarTrabajador()"><span id="spanopcion"></span></button>
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
        <th>Id</th>
        <th>Nombre  </th>
        <th>Telefono</th>
        <th>Opciones</th>
 
      </tr>
    </thead>
    <tbody id="tbodytrabajador">
      
        
    
    </tbody>
  </table>
</div>

<!--BOTON DE VER ESTA AL ULTIMO-->
      <button onclick="vertrabajador()">ver trabajador </button>


        <!-- Footer A QUI REFERENCIA LA TABLA  EL ARCHIVO-->
        <script src="../assets/js/trabajador.js"></script>
        
        <?php include("footer.php"); ?>
        <?php include("scripts.php") ?>
    </body>
</html>
