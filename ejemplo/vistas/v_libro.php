<!DOCTYPE html>
<html lang="en">
    <?php
    
    include("./head.php");

    ?>
    <body id="page-top" onload="verlibro()" >
        <!-- Navigation-->
        <?php include("nav.php"); ?>
        <!-- Masthead-->
        <?php include("header.php"); ?>



        <!-- espacio de trabajo-->


<div class="container">
  <h2>MYBOOKS</h2>
  <!-- Button to Open the Modal -->
  <button type="button" onclick="limpiarDatos()" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Insert book
  </button>


  <!-- The Modal -->
  <div class="modal" id="myModal" >
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Moddal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->


        <div class="modal-body">
        <input type="hidden" id="id_libro">

          <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
            
              nombre del libro:<input type="text" id="nombre_titulo">
              
              <br>
              numero de paginas:<input type="number" id="numPaginas">
              <br> 
            </div>

            
            

          </div>

          <div class="row">
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="estado">estado</label>
              </div>
              <select class="custom-select" id="estado">
                <option selected>Choose...</option>
                <option value="1">disponible</option>
                <option value="2">ocupado</option>
                <option value="3">proceso</option>
                <option value="57">test</option>
              </select>
            </div>
              
          </div>

          <div class="row">

            <div class="input-group">
            
              <div class="input-group-prepend">
                <label class="input-group-text" for="num_estante">estante</label>
              </div>
              <select class="custom-select" id="num_estante">
                <option selected>Choose...</option>
                <option value="1">1 a-g</option>
                <option value="2">1 h-o</option>
                <option value="3">1 p-z</option>
              </select>
            </div>
            
          </div>

          <div class="row">

            <div class="input-group">
            
              <div class="input-group-prepend">
                <label class="input-group-text" for="nombre_autor">autores</label>
              </div>
              <select class="custom-select" id="nombre_autor">
              </select>
            </div>
          </div>
                
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"
          onclick="insertarLibro()"><span id="spanopcion"></span></button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>




<div class="container">
  
 <table class="table table-hover">
    <thead>
      <tr>
        <th>id libro</th>
        <th>titulo</th>
        <th>numpaginas</th>
        <th>nombre_autor</th>
        <th>nombre_estante</th>
        <th>Opciones</th>
 
      </tr>
    </thead>
    <tbody id="tbodylibro">
      
        
    
    </tbody>
  </table>
</div>


      <button onclick="verlibro()">ver LIBRO</button>
    


        <!-- Footer-->
        <script src="../assets/js/libro.js"></script>
        
        <?php include("footer.php"); ?>
        <?php include("scripts.php") ?>
    </body>
</html>
