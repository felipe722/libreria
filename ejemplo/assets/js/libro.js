function verlibro(){
    $.ajax({
            url : '../controladores/c_libros.php',
            data : 'opcion=vertodos&idelibro=null&titulo=null&'
            +'numpaginas=null&nombre_autor=null&num_estante=null&'
            +'ide_orden=null&id_estado=null',
            type :'GET',
          success : function(resultado){

            json =JSON.parse(resultado);
            //console.log("debug");
            //console.log(resultado);
            
            //console.log(resultado);
            document.getElementById("tbodylibro").innerHTML ="";
            for(let objeto of json){
                document.getElementById("tbodylibro").innerHTML += `
                <tr>
                 <td>${objeto.idelibro}</td>
                    <td>${objeto.titulo}</td>
                    <td>${objeto.numPaginas}</td>
                    <td>${objeto.nombre_autor}</td>
                    <td>${objeto.num_estante}</td>
                    <td>

                        <button onclick="eliminarlibro(${objeto.idelibro})" type="button" class="btn btn-danger">
                        <i class="fas fa-trash"></i></button>
                        <button onclick="updateLibro(${objeto.idelibro})" type="button" class="btn btn-info">
                        <i class="fas fa-cloud"></i></button>
                    </td>
                 </td>
                 </tr>
                 `;

            }
        }
    });

}






      function updateLibro(id){

        verAutor();

        $.ajax({
            
            url : '../controladores/c_libros.php',
         data :'opcion=verlibro&idelibro='+id+'&titulo=null&'
            +'numpaginas=null&nombre_autor=null&num_estante=null&'
            +'ide_orden=null&id_estado=null',
            type : 'GET',  
            success : function(resultado) {
                

                //alert(resultado);
                datos = JSON.parse(resultado);
                console.log("datos del libro");
                console.log(datos);
               
                

                $('#myModal').modal('show');
                //etos datos se tienen que pareser a los de la consula de crear libro
                //hace referencia al elemento html por id y el punto es para hacer refereeencia a atributos
                // o mmetodos del elemento
                $('#id_libro').val(id);
                $('#nombre_titulo').val(datos.titulo);
                $('#numPaginas').val(datos.numPaginas);
                $('#nombre_autor').val(datos.id_autor);
                 $('#num_estante').val(datos.id_estante);
                 $('#estado').val(datos.id_estado);

                 
            
                 //document.getElementById("estado").selectedIndex = '57';
                document.getElementById("spanopcion").innerHTML = "";

                document.getElementById("spanopcion").innerHTML = "actualizar";
                
            }
            });


        }
        function limpiarDatos(){
            $('#ide_libro').val(null);
            $('#titulo').val("");
            $('#numPaginas').val("");
            $('#id_autor').val(null);
             $('#id_estante').val(null);
             $('#id_estado').val(null);
    
            verAutor();
    
            document.getElementById("spanopcion").innerHTML = "";
    
        document.getElementById("spanopcion").innerHTML = "insertar";
        }
    
      
        function verAutor(){
            $.ajax({
            url : '../controladores/c_autor.php',
            data : 'opcion=vertodos&idautor=null&nombreautor=null',
            type : 'GET',
            success : function(resultado) {
                json = JSON.parse(resultado);
            console.log("que hay?");
                console.log(resultado);
                document.getElementById("nombre_autor").innerHTML = "";
                for(let objeto of json){
                 document.getElementById("nombre_autor").innerHTML += `
                 <option value="${objeto.ideautor}">${objeto.nombre_autor}</option>
                 `;
                }
                
            }
            });
    
        }


    function hola(){
        alert("estoy vivo");
    }
        
    function insertarLibro(){

        var id_libro=$('#id_libro').val();
        var nombre_titulo=$('#nombre_titulo').val();
        var numPaginas=$('#numPaginas').val();
        var nombre_autor=$('#nombre_autor').val();
        var num_estante=$('#num_estante').val();
        var estado=$('#estado').val()
        var ide_orden=$('#ide_orden').val()


              
         console.log("enviaste el valor");
         console.log(id_libro, nombre_titulo,numPaginas,
            nombre_autor,estado, num_estante,ide_orden);
        
    
         if(!id_libro){
            console.log("se va a insertar");

            $.ajax({
                url :'../controladores/c_libros.php',
                data : 'opcion=insertar&idelibro=null&titulo='+nombre_titulo+'&'
                +'numpaginas='+numPaginas+'&nombre_autor='+nombre_autor+'&num_estante='+num_estante+'&'
                +'ide_orden=null&id_estado='+estado,
                type: 'GET',
                success : function(resultado) {
                   if(resultado){
                       alert("hasta aqui se inserto");
                       verlibro();
                   }else{
                       alert("no se inserto")
                   }
               }
                   
            });
       

            
         }else{
            console.log("se va a actualizar");
            $.ajax({
                url :'../controladores/c_libros.php',
                data : 'opcion=update&idelibro='+id_libro+'&titulo='+nombre_titulo+'&'
                +'numpaginas='+numPaginas+'&nombre_autor='+nombre_autor+'&num_estante='+num_estante+'&'
                +'ide_orden=null&id_estado='+estado,
                type :'GET',
                success : function(resultado) {

                    console.log("resuldato update 37");
                    console.log(resultado);
                    

                    if(resultado){
                        verlibro();
                    }else{
                        alert("no va actualizar chico")
                        }
                    }            
            });
        
        }

    }              //<option value="${objeto.id}">${objeto.nombre}</option>}

    
            
                  function eliminarlibro(id){

                    //envia
                    $.ajax({
                    url : '../controladores/c_libros.php',
                     data :'opcion=eliminar&idelibro='+id+'&titulo=null&'
                    +'numpaginas=null&nombre_autor=null&num_estante=null&'
                    +'ide_orden=null&id_estado=null',
                    type : 'GET',
                    //recibe
                    success : function(resultado) {
                        
                        json = JSON.parse(resultado);
                        console.log("se va a  eliminar "+json);
                        
                        //console.log(json);
                        
                        if(json!== null){
                            alert("se elimino el  "+json.nombre_titulo);
                            verlibro();
                        }else{
                            alert("no se    elimino")
                        }
                    }
                    });

                    }