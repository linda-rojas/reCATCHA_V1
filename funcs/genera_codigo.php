<?php
session_start();


$codigoAleatorio = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);

$ancho = 150;
$alto = 70;
$fuente = '../font/Consolas.ttf';
$tamanoFuente = 30;

$_SESSION['codigo_de_verificacion'] = sha1($codigoAleatorio);

$imagen = imagecreatetruecolor($ancho, $alto);
$colorFondo = imagecolorallocate($imagen, 255, 255, 255);
imagefill($imagen, 0, 0, $colorFondo);
$colorLineayPuntos = imagecolorallocate($imagen, 200, 200, 200);

$colorTexto = imagecolorallocate($imagen, 50, 50, 50);

for ($i = 0; $i < 10; $i++) {
    imageline($imagen, 0, rand(0, $alto), $ancho, rand(0, $alto), $colorLineayPuntos);
}
for ($i = 0; $i < 700; $i++) {
    imagesetpixel($imagen, rand(0, $ancho), rand(0, $alto), $colorLineayPuntos);
}
imagettftext($imagen, $tamanoFuente, rand(-8, 12), 8, 50, $colorTexto, $fuente, $codigoAleatorio);

header('Content-Type: image/png');
imagepng($imagen);
imagedestroy($imagen); // para que no se que guardada en memoria