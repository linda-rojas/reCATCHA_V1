<?php

session_start();

$codigoVerificacion = isset($_SESSION['codigo_de_verficacion']) ? $_SESSION['codigo_de_verificacion'] : "";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";

if ($nombre == "" || $codigo == "") {
    echo "Error: Debe llenar todos los campos";
    exit;
}

$catchap = sha1($codigo);
$resCatchap = "";

if ($codigoVerificacion != $catchap) {
    $_SESSION['codigo_de_verficacion'] = ""; //Limpiar código de verificación para que no se reutilice
    $resCatchap = "El Código de verificación es incorrecto";
    echo $resCatchap;
    exit;
}
