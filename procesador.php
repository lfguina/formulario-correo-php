<?php
//validacion
$error="";
if(isset($_POST['envio'])) {//si se envio el formulario

if (empty($_POST['nombre']))
    $error.="Ingresa un nombre </br>";
else{
    $nombre=$_POST['nombre'];
    $nombre= filter_var($nombre, FILTER_SANITIZE_STRING);//ELIMINAR ETIQUETAS DE HTML AL INPUT
    $nombre= trim($nombre);
    if ($nombre=="") $error.="El nombre esta vacio </br>";
}
if (empty($_POST['email']))
    $error.="Ingresa un email </br>";
else{
    $email=$_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error.="Ingresa un email verdadero </br>";
    }else{
        $email= filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}
if (empty($_POST['mensaje']))
    $error.="Ingresa un mensaje </br>";
else{
    $mensaje=$_POST['mensaje'];
    $mensaje= filter_var($mensaje, FILTER_SANITIZE_STRING);//ELIMINAR ETIQUETAS DE HTML AL INPUT
    $mensaje= trim($mensaje);
    if ($mensaje=="") $error.="El mensaje esta vacio </br>";
}





//enviar correo
if($error==""){
    //cuerpo del mensaje
    $cuerpo ="Nombre: ".$nombre."\n";
    $cuerpo.="Email: ".$email."\n";
    $cuerpo.="Mensaje: ".$mensaje."\n";
    //Direccion a enviar
    $destinatario="xxxdestinatarioxxx@gmail.com";
    $asunto="Nuevo mensaje formulario";
    $cabeceras = "From: SoyElAdmin <xxCorreoAdminxxx@gmail.com>". "\r\n";


    //envio de correo
    $success= mail($destinatario,$asunto,$cuerpo, $cabeceras);
    if ($success)
    echo "exito";
    else
    echo $error;
}else{
    echo $error;
}



}
else{
    echo "No se envio formulario";
}



?>
