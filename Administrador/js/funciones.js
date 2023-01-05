$(document).ready(function(){

    $("#menuInicio").click(function(event){
       $("#divPrincipal").show("slow");
       $("#divFormulario").hide("slow");
    });
    //evento clic del menu alumno
    $("#menuAlumno").click(function(event){
       $("#divPrincipal").hide("slow");
       $("#divFormulario2").hide("slow");
       //LENAR EL DIV MOSTRAR
       $("#mostrar").load("./php/mostrarAlumnos.php");
       $("#divFormulario").show("slow");
       $("#mostrarGrafica").load("./php/generaGrafica.php");

    });

    




    //Evento del boton guardar
    $("#btnGuardar").click(function(event){
        var usuario, contraseña, accion;
        //Recoger los datos de las cajas de texto

        usuario=$("#txtUsuario").val();
        contraseña=$("#txtContraseña").val();
        estadoBoton=$("#btnGuardar").val();
        if(estadoBoton=="guardar")
        accion="guardarAlumno";
        else
        accion="editarAlumno";
        
        //Usamos ajax para enviar los datos recogidos al servidor php
        $.ajax({
            url:"./php/server.php",
            type:"GET",
            data:{usuario:usuario, contraseña:contraseña, accion:accion},
            success:function(respuestaServer){
               // alert(estadoBoton);
                //alert(respuestaServer);
                if(respuestaServer=="1")
                {
                    alertify.success("Registro exitoso");

                     //Quitamos color del boton
                    $("#btnGuardar").removeClass();

                    //Cambiamos su value
                    $("#btnGuardar").val("guardar");

                    //Cambiamos el texto
                    $("#btnGuardar").html("Guardar");

                    //Agregando al color al boton
                     $("#btnGuardar").addClass("btn btn-primary");


                    limpiarcampos();

                    $("#mostrar").load("./php/mostrarAlumnos.php");
                    $("#mostrarGrafica").load("./php/generaGrafica.php");

                }else{
                    alert("No se registro (+_+) ");
                }
            }

        });

    });
});


function limpiarcampos(){
    $("#txtUsuario").val("");
    $("#txtContraseña").val("");
    $("#txtUsuario").focus("");
}


function eliminarr(id){
    alertify.confirm("Seguro de eliminar el id "+id+"?", function(respuesta){
        if(respuesta){
        $.ajax({
            url:"./php/server.php",
            type: "GET",
            data: {id:id,accion: "eliminarAlumno"},
            success:function(respuestaServer){
                if(respuestaServer){
                    alertify.success("Eliminacion exitosa");
                    $("#mostrar").load("./php/mostrarAlumnos.php")
                    $("#mostrarGrafica").load("./php/generaGrafica.php");

                }
            }
        });
}
});
}


function editarr(id, usuario,contraseña) {
    
    //ENAMOS LAS CAJAS DE TEXTO SELECCIONADO
    $("#txtUsuario").val(usuario);
    $("#txtContraseña").val(contraseña);


    //Quitamos color del boton
    $("#btnGuardar").removeClass();

    //Cambiamos su value
    $("#btnGuardar").val("Actualizar");

    //Cambiamos el texto
    $("#btnGuardar").html("Actualizar");

    //Agregando al color al boton
    $("#btnGuardar").addClass("btn btn-secondary");
    

 
}
