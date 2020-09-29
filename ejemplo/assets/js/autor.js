

//html va de la mano con javascript

    // funcion para insertar la informacion de los libros en la tabla
    function verAutor(){
        //metodo para obtener el valor de un input de html a js $('#id').val();
        //variable html paraconcatenar texto
        //var html
        //funcion ajax para enviar datos y recibirlos de un controlador o pagina anexa
        $.ajax({
        url : '../controladores/c_autor.php',
        //la informacin debe ser enviada por el metodo que tu le indiques
        //data: {"nombre":"valor"},
        data : 'opcion=vertodos&idautor=null&nombreautor=null',
        type : 'GET',
        //funcion activada cuando tenemos resultao positivo
        //resultado de la consulta
        success : function(resultado) {
                //aterrizamos el resultado y lo transformamos en json
            json = JSON.parse(resultado);
        console.log("que hay?");
            console.log(resultado);
            
            /*
            html = '';

            for (let index = 0; index < json.length; index++) {

                html += '<tr>'+
                '<td>'+json[index].titulo+'</td>'+
                '<td>'+json[index].numPaginas+'</td>'+
                '</tr>';
                
            }
            $('#cuerpo').html(html);
            */


            //Metodo para llenar el cuerpo de la tabla e insertarlo en el id cuerpo de html
            //primero se limpia y despuesse suma con un for
            document.getElementById("tbodyautor").innerHTML = "";
            //crea un objeto en el indice 0 del arreglo json
            for(let objeto of json){
                //metodo para sumar las filas de la tabla
             document.getElementById("tbodyautor").innerHTML += `
              <tr>
                <td>${objeto.ideautor}</td>
                 <td>${objeto.nombre_autor}</td>
                 <td>
                 
                    <button onclick="eliminarautor(${objeto.ideautor})" type="button" class="btn btn-danger">
                    <i class="fas fa-trash"></i></button>
                    <button onclick="updateAutor(${objeto.ideautor})" type="button" class="btn btn-info">
                    <i class="fas fa-cloud"></i></button>
                 </td>
              </tr>
             `;
            }
            
        }
        });

    }

    function updateAutor(id){

        $.ajax({
            url : '../controladores/c_autor.php',
            data : 'opcion=verautor&idautor='+id+'&nombreautor=null',
            type : 'GET', 
            success : function(resultado) {
    
                datos = JSON.parse(resultado);
                console.log("datos de la autor");
                console.log(resultado);

                $('#myModal').modal('show');
//estos datos son como estan escriytos para la consulta de modelosautor
                $('#id_autor').val(id);
                $('#nombre_autor').val(datos.nombre_autor);

                document.getElementById("spanopcion").innerHTML = "";

                document.getElementById("spanopcion").innerHTML = "actualizar";
                
            }
            });
        
        

        
    }

    function limpiarDatos(){
        $('#nombre_autor').val('');
        $('#id_autor').val(null);
        
        document.getElementById("spanopcion").innerHTML = "";

        document.getElementById("spanopcion").innerHTML = "insertar";
    }

    // insertar autor
    function insertarAutor(){

        //recibe de html
        var id_autor=$('#id_autor').val();
        var nombre_autor=$('#nombre_autor').val();
        var seleccion=$('#select').val();

        alert("valor escogido "+seleccion);

        
        console.log("enviaste el valor");
        console.log(id_autor);
        console.log(nombre_autor);

        if(!id_autor){
            
            console.log("se va a insertar");
            //alert("valor enviado "+nombre_autor);

        //envia a php
        $.ajax({
            url : '../controladores/c_autor.php',
            data : 'opcion=insertar&idautor=null&nombreautor='+nombre_autor+'',
            type : 'GET',
            //recibe de php
            success : function(resultado) {
                
                // envia a html
                //json = JSON.parse(resultado);
    
                if(resultado){
                    //alert("se inserto correctamente");
                    verAutor();
                }else{
                    alert("no se inserto")
                }
            }
            });
            
        }else{
            console.log("se va a actualizar");

            //envia a php
        $.ajax({
            url : '../controladores/c_autor.php',
            data : 'opcion=update&idautor='+id_autor+'&nombreautor='+nombre_autor,
            type : 'GET',
            //recibe de php
            success : function(resultado) {
                
                // envia a html
                //json = JSON.parse(resultado);
    
                if(resultado){
                    //alert("se inserto correctamente");
                    verAutor();
                }else{
                    alert("no se actualizo")
                }
            }
            });
            
        }

        
        
    }

// que son los servicioes rest
    function eliminarautor(id){

        //envia
        $.ajax({
        url : '../controladores/c_autor.php',
        data : 'opcion=eliminar&idautor='+id+'&nombreautor=null',
        type : 'GET',
        //recibe
        success : function(resultado) {
            
            json = JSON.parse(resultado);
            console.log("se elimino el autor "+json);
            
            console.log(json);
            
            if(json!== null){
                alert("se elimino el autor "+json.nombre_autor);
                verAutor();
            }else{
                alert("no se    elimino")
            }
        }
        });

    }
