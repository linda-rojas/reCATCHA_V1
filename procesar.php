<?php

session_start();
include_once "funcs/funcs.php";

$codigoVerificacion = isset($_SESSION['codigo_de_verficacion']) ? $_SESSION['codigo_de_verificacion'] : "";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";

if ($nombre == "" || $codigo == "") {
    setFlashData("Error", "Debe llenar todos los campos");
    redirect("index.php");
}

$catchap = sha1($codigo);

if ($codigoVerificacion != $catchap) {
    $_SESSION['codigo_de_verficacion'] = ""; //Limpiar código de verificación para que no se reutilice
    setFlashData("Error", "El Código de verificación es incorrecto");
    redirect('index.php');
} else {
    $_SESSION['codigo_de_verficacion'] = ""; //Limpiar código de verificación para que no se reutilice
    setFlashData("Exito", "El Código de verificación es correcto, bienvenid@ $nombre");
    redirect('index.php');
}
