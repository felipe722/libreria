
function verlector(){
    $.ajax({
        url :'../controladores/c_lector.php',
        data : 'opcion=vertodos&ide_lector=null&nombre=null&direccio=null&telefono=null&registro=null&expiracion=null',
        type : 'GET',
        success :function(resultado){

            console.log(resultado);
            

            json = JSON.parse(resultado);
            console.log("que onda men 1");
            console.log(resultado); 

            document.getElementById("tbodylector").innerHTML ="";

            //for (let index = 0; index < array.length; index++) {
            //    const element = array[index].nombre;
            //  }

            for(let objeto of json){
                document.getElementById("tbodylector").innerHTML +=`
                <tr>
                <td>${objeto.ide_lector}</td>
                <td>${objeto.nombre}</td>
                <td>${objeto.direccio}</td>
                <td>${objeto.telefono}</td>
                <td>${objeto.registro}</td>
                <td>${objeto.expiracion}</td>
                <td>
                
                <button onclick="eliminarlector(${objeto.ide_lector})" type="button" class="btn btn-danger">
                <i class="fas fa-trash"></i></button>
                <button onclick="updatelector(${objeto.ide_lector})" type="button" class="btn btn-info">
                <i class="fas fa-cloud"></i></button>
                </td>
              </tr>
              </tr>
             `;
            }
        }
        


    })

}



function updatelector(id){

    $.ajax({
        url : '../controladores/c_lector.php',
        data : 'opcion=verlector&ide_lector='+id+'&nombre=null&'
        +'direccio=null&telefono=null&registro=null&expiracion=null',
        type : 'GET', 
        success :function(resultado) {
            console.log(resultado);
            datos = JSON.parse(resultado);
            console.log("datos de lector");
            console.log(datos);

            console.log("el nombre del lector es");
            console.log(datos.nombre);

            $('#myModal').modal('show');
            //estos datos son como estan escriytos para la consulta de modelosautor
            $('#id_lec').val(id);
            $('#nombre_lec').val(datos.nombre);
            $('#direccio_lec').val(datos.direccio);
            $('#telefono_lec').val(datos.telefono);
            $('#registro_lec').val(datos.registro);
            $('#expiracion_lec').val(datos.expiracion);
            document.getElementById("spanopcion").innerHTML = "";

            document.getElementById("spanopcion").innerHTML = "actualizar";
            
        }
        });
    
    

    
}


    function limpiarDatos(){
    $('#nombre_lec').val('');
    $('#direccio_lec').val('');
    $('#telefono_lec').val('');
    $('#id_lec').val(null);
    $('#registro').val('');
    $('#expiracion').val('');
    
    
    document.getElementById("spanopcion").innerHTML = "";

    document.getElementById("spanopcion").innerHTML = "insertar";
}



// insertar autor
function insertarLector(){

    //recibe de html
    var id_lec=$('#id_lec').val();
    var nombre_lec=$('#nombre_lec').val();
    var direccio_lec=$('#direccio_lec').val();
    var telefono_lec=$('#telefono_lec').val();
    var registro_lec=$('#registro_lec').val();
    var expiracion_lec=$('#expiracion_lec').val();
    var seleccion=$('#select').val();

   // alert("valor escogido hoyyy "+seleccion);

    
    console.log("enviaste el valor");
    console.log(id_lec);
    console.log(nombre_lec);
    console.log(direccio_lec);
    console.log(telefono_lec);
    console.log(registro_lec);
    console.log(expiracion_lec);

    if(!id_lec){
        
        console.log("se va a insertar 006");
        //alert("valor enviado "+nombre_autor);

    //envia a php
    $.ajax({
        url : '../controladores/c_lector.php',
        data : 'opcion=insertar&ide_lector=null&nombre='+nombre_lec+'&'
        +'direccio='+direccio_lec+'&telefono='+telefono_lec+'&registro='
        +registro_lec+'&expiracion='+expiracion_lec,
        type : 'GET',

        
      
        //recibe de php
        success : function(resultado) {
            console.log("hay algo aqui");
            //alert("hasta aqui se inserto");
            console.log(resultado);
            
            // envia a html
            //json = JSON.parse(resultado);
            
            if(resultado){

                //alert("se inserto correctamente");
                verlector();
            }else{
                alert("no se inserto men")
            }

            
        }
        });
        
    }else{
        
        console.log("se va a actualizar men");

        //envia a php
    $.ajax({
        url : '../controladores/c_lector.php',
        data : 'opcion=update&ide_lector='+id_lec+'&nombre='+nombre_lec+'&direccio='+direccio_lec+'&telefono='+telefono_lec+
        '&registro='+registro_lec+'&expiracion='+expiracion_lec,
        type : 'GET',

        type : 'GET',
        //recibe de php
        success : function(resultado) {
            console.log("resultado esta funcionando")
            console.log(resultado)
            // envia a html
            //json = JSON.parse(resultado);

            if(resultado){
                //alert("se inserto correctamente");
                verlector();
            }else{
                alert("no se actualizo")
            }
        }
        });
        
    }

    
    
}

function a() {
    return 1;
}


function b() {
    return 0;
}

function c(decision) {
    if(decision == 1){
        a();
    }else{
        b();
    }
}

// que son los servicioes rest
function eliminarlector(id){

    //envia
    $.ajax({
        url : '../controladores/c_lector.php',
        data : 'opcion=eliminar&ide_lector='+id+'&nombre=null&'
        +'direccio=null&telefono=null',
        type : 'GET',
    //recibe
    success : function(resultado) {

        console.log("resultado");
        console.log(resultado);
        
        json = JSON.parse(resultado);
        console.log("se elimino el lector va  "+json);
        
        console.log(json);
        
        if(json!== null){
            alert("se elimino el autor "+json.nombre_lec);
            verlector();
        }else{
            alert("no se    elimino")
        }
    }
    });

}