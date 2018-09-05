$("#formulario").submit(function(event){
    event.preventDefault();//almacena datos sin refrescar
    enviar();
});

function enviar(){
    var datos = $("#formulario").serialize();//toma todos los name y covierte a arreglo
    $.ajax({
        url:"procesador.php",
        data:datos,
        type:"post",
        success:function(res){
            if (res=="exito") exito(res);
            else error(res);
        }
    });
}

function exito(texto){
    console.log(texto);
    $("#msgExito").removeClass("d-none");
    $("#msgError").addClass("d-none");

}
function error(texto){
    console.log(texto);
    $("#msgError").removeClass("d-none");
    $("#msgError").html(texto);
}



