$(document).ready(function(){

    $("#menuInicio").click(function(event){
       $("#divPrincipal").show("slow");
       $("#divFormulario").hide("slow");
    });
    //evento clic del menu alumno
    $("#menuAlumno").click(function(event){
       $("#divPrincipal").hide("slow");
    //llenar div mostrar
    $("#mostrarReportes").load("./php/index.php");
    $("#mostrar").load("./php/mostrarPacientes.php");
       $("#divFormulario").show("slow");
    });

    //evento de boton guardar
    $("#btnGuardar").click(function(event){
        var clave,nombre,apellido,accion;
        //recoger los datos de las cajas 
        clave=$("#txtClave").val();
        nombre=$("#txtNombre").val();
        apellido=$("#txtApellido").val();
        accion="guardarAlumno";

//BOTON NUEVO
    $("#btnConsultar").click(function(event){
    $("#mostrarReporte").load("./php/TraerDatos.php");
       $("#divFormulario").show("slow");
    });


        //usamos ajax para enviar los datos recogidos
        $.ajax({
            url:"./php/server.php",
            type:"GET",
            data:{clave:clave,nombre:nombre,apellido:apellido,accion:accion},
            success:function(respuestaServer){
                if(respuestaServer=="1")
                {
                    alert("Registro correcto");
                }else{
                    alert("No se registro :( ");
                }
            }
        });
    });
});


$("#btnNuevo").click(function(event){
    $("#txtClave").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtClave").focus("");
});

