<!DOCTYPE html>
<html lang="en">
    <?php
    
    include("./head.php");

    ?>
    <body id="page-top" onload="verAutor()" >
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
    Insertar Autor
  </button>

  <!-- The Modal ES LA PANTTALLA PARA INSERTAR O ACTULUIXAR  -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body  ESTE ES PARA QUE TE PERMITA AGREGAR NOMBRE Y DE AUTOR-->
        <div class="modal-body">
        <input type="hidden" id="id_autor">
          Ingresar nombre:<input type="text" id="nombre_autor">

          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="select">Options</label>
            </div>
            <select class="custom-select" id="select">
              <option selected>Choose...</option>
              <option value="1">disponible</option>
              <option value="2">ocupado</option>
              <option value="3">proceso</option>
            </select>
          </div>

        </div>
        
        <!-- Modal footer PARA QUE ABRA EN EL MIMO LUGAR TODO -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"
          onclick="insertarAutor()"><span id="spanopcion"></span></button>
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
        <th>id autor</th>
        <th>nombre autor</th>
        <th>Opciones</th>
 
      </tr>
    </thead>
    <tbody id="tbodyautor">
      
        
    
    </tbody>
  </table>
</div>

<!--BOTON DE VER ESTA AL ULTIMO-->
      <button onclick="verAutor()">ver autor</button>


        <!-- Footer A QUI REFERENCIA LA TABLA  EL ARCHIVO-->
        <script src="../assets/js/autor.js"></script>
        
        <?php include("footer.php"); ?>
        <?php include("scripts.php") ?>
    </body>
</html>
