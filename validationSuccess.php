<?php
session_start();
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "usuario";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Éxito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/validationSuccess.css">
</head>

<body class="bg-light">

    <div class="container-fluid full-height">
        <div class="card shadow-lg" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">¡Bienvenido!</h5>
                <p class="card-text">¡Hola <?php echo htmlspecialchars($nombre); ?>! Tu validación fue exitosa. ✔</p>
                <a href="index.php" class="btn btn-success">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>

</html>