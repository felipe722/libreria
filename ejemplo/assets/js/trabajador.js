
function vertrabajador(){
    $.ajax({
        url :'../controladores/c_trabajador.php',
        data : 'opcion=vertodos&id=null&nombre=null&telefono=null',
        type : 'GET',
        success :function(resultado){

            console.log(resultado);
            

            json = JSON.parse(resultado);
            console.log("vas bien!");
            console.log(resultado); 

            document.getElementById("tbodytrabajador").innerHTML ="";
            for(let objeto of json){
                document.getElementById("tbodytrabajador").innerHTML +=`
                <tr>
                <td>${objeto.id_ok}</td>
                <td>${objeto.nombre}</td>
                 <td>${objeto.telefono}</td>
                 <td>
                 
                    <button onclick="eliminartrabajador(${objeto.id})" type="button" class="btn btn-danger">
                    <i class="fas fa-trash"></i></button>
                    <button onclick="updatetrabajador(${objeto.id})" type="button" class="btn btn-info">
                    <i class="fas fa-cloud"></i></button>
                 </td>
              </tr>
              </tr>
             `;
            }
        }
        


    })

}




function updatetrabajador(id){

    $.ajax({
        url : '../controladores/c_trabajador.php',
        data : 'opcion=vertrabajador&id='+id+'&nombre=null&'
        +'telefono=null',
        type : 'GET', 
        success :function(resultado) {
            console.log("esta enviando");
            console.log(resultado);

            datos = JSON.parse(resultado);
            console.log("datos de lector");
            console.log(datos);

            console.log("el nombre del lector es");
            console.log(datos.nombre);

            $('#myModal').modal('show');
            //estos datos son como estan escriytos para la consulta de modelosautor
            $('#id_t').val(id);
            $('#nombre_t').val(datos.nombre);
            $('#telefono_t').val(datos.telefono);
   
            document.getElementById("spanopcion").innerHTML = "";

            document.getElementById("spanopcion").innerHTML = "actualizar";
            
        }
        });
    
    

    
}

function limpiarDatos(){
    $('#nombre').val('');
    $('#telefono').val('');
    $('#id').val(null);
    document.getElementById("spanopcion").innerHTML = "";

    document.getElementById("spanopcion").innerHTML = "insertar";
}

// insertar autor
function insertarTrabajador(){

    //recibe de html
    var id_t=$('#id_t').val();
    var nombre_t=$('#nombre_t').val();
    var telefono_t=$('#telefono_t').val();
    
    var seleccion=$('#select').val();

    alert("valor escogido "+seleccion);

    
    console.log("enviaste el valor");
    console.log(id_t);
    console.log(nombre_t);
    console.log(telefono_t);

    if(!id_t){
        
        console.log("se va a insertar ok");
        //alert("valor enviado "+nombre_autor);

    //envia a php
    $.ajax({
        url : '../controladores/c_trabajador.php',
        data : 'opcion=insertar&id=null&nombre='+nombre_t+'&telefono='+telefono_t,
        type : 'GET',
        //recibe de php
        success : function(resultado) {
            console.log("resultado");
            console.log(resultado);
            
            // envia a html
            //json = JSON.parse(resultado);

            if(resultado){
                //alert("se inserto correctamente");
                vertrabajador();
            }else{
                alert("no se inserto")
            }
        }
        });
        
    }else{
        console.log("se va a actualizar");

        //envia a php
    $.ajax({
        url : '../controladores/c_trabajador.php',
        data : 'opcion=update&id='+id_t+'&nombre='+nombre_t+'&'
        +'telefono='+telefono_t,
        type : 'GET',
        //recibe de php
        success : function(resultado) {
            
            // envia a html
            //json = JSON.parse(resultado);

            if(resultado){
                //alert("se inserto correctamente");
                vertrabajador();
            }else{
                alert("no se actualizo")
            }
        }
        });
        
    }

    
    
}

// que son los servicioes rest
function eliminartrabajador(id){

    //envia
    $.ajax({
    url : '../controladores/c_trabajador.php',
    data : 'opcion=eliminar&id='+id+'&nombre=null&'
    +'telefono=null',
    type : 'GET',
    //recibe
    success : function(resultado) {
        
        json = JSON.parse(resultado);
        console.log("se elimino el trabajador "+json);
        
        console.log(json);
        
        if(json!== null){
            alert("se elimino el autor "+json.nombre_t);
            vertrabajador();
        }else{
            alert("no se    elimino")
        }
    }
    });

}
