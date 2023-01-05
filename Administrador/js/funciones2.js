$(document).ready(function(){

 

    //evento clic del menu alumno

    $("#menuAdministrador").click(function(event){
        $("#divPrincipal").hide("slow");
        $("#divFormulario").hide("slow");
        //LENAR EL DIV MOSTRAR
        $("#divFormulario2").show("slow");
        $("#mostrarPacientes").load("./php/mostrarPacientes.php");
        $("#mostrarGraficaPacientes").load("./php/generaGraficaPacientes.php");
     });





    //Evento del boton guardar
    $("#btnGuardarPaciente").click(function(event){
        var nombre, edad, sexo, hr, spo, accion;
        //Recoger los datos de las cajas de texto

        nombre=$("#txtNombre").val();
        edad=$("#txtEdad").val();
        sexo=$("#txtSexo").val();
        hr=$("#txtHR").val();
        spo=$("#txtSPO").val();

        estadoBoton=$("#btnGuardarPaciente").val();
        if(estadoBoton=="guardar")

        accion="guardarAlumno";
        else
        accion="editarAlumno";
        
        //Usamos ajax para enviar los datos recogidos al servidor php
        $.ajax({
            url:"./php/serverPacientes.php",
            type:"GET",
            data:{nombre:nombre, edad:edad, sexo:sexo, hr:hr, spo:spo, accion:accion},
            success:function(respuestaServer){
               // alert(estadoBoton);
                //alert(respuestaServer);
                if(respuestaServer=="1")
                {
                    alertify.success("Registro exitoso");

                     //Quitamos color del boton
                    $("#btnGuardarPaciente").removeClass();

                    //Cambiamos su value
                    $("#btnGuardarPaciente").val("guardar");

                    //Cambiamos el texto
                    $("#btnGuardarPaciente").html("Guardar");

                    //Agregando al color al boton
                     $("#btnGuardarPaciente").addClass("btn btn-primary");

                    //Desabilitar el campo de texto de la clave
                    $("#txtClave").prop("disable",true);

                    



                    limpiar();
                    $("#mostrarPacientes").load("./php/mostrarPacientes.php");
                    $("#mostrarGrafica").load("./php/generaGrafica.php");

                }else{
                    alert("No se registro (+_+) ");
                }
            }

        });

    });
});


function limpiar(){
    $("#txtNombre").val("");
    $("#txtEdad").val("");
    $("#txtSexo").val("");
    $("#txtHR").val("");
    $("#txtSPO").val("");
    $("#txtNombre").focus("");
}


function eliminar(id){
    alertify.confirm("Seguro de eliminar el id "+id+"?", function(respuesta){
        if(respuesta){
        $.ajax({
            url:"./php/serverPacientes.php",
            type: "GET",
            data: {id:id,accion: "eliminarAlumno"},
            success:function(respuestaServer){
                if(respuestaServer){
                    alertify.success("Eliminacion exitosa");
                    $("#mostrarPacientes").load("./php/mostrarPacientes.php")
                    $("#mostrarGraficaPacientes").load("./php/generaGraficaPacientes.php");

                }
            }
        });
}
});
}


function editar(id, nombre,edad,sexo,hr,spo) {
    
    //LLENAMOS LAS CAJAS DE TEXTO SELECCIONADO
    $("#txtNombre").val(nombre);
    $("#txtEdad").val(edad);
    $("#txtSexo").val(sexo);
    $("#txtHR").val(hr);
    $("#txtSPO").val(spo);
  

    //Quitamos color del boton
    $("#btnGuardarPaciente").removeClass();

    //Cambiamos su value
    $("#btnGuardarPaciente").val("Actualizar");

    //Cambiamos el texto
    $("#btnGuardarPaciente").html("Actualizar");

    //Agregando al color al boton
    $("#btnGuardarPaciente").addClass("btn btn-secondary");

 
}
