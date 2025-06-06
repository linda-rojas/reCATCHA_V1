<?php
session_start();
include_once "funcs/funcs.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recatchap_v1</title>
    <link rel="stylesheet" href="styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="d-flex flex-column align-items-center h-100">
    <main class="form">
        <h2>Formulario de Verificación</h2>
        <?php if ($mensaje = getFlashData("Error")) {
            echo "<div class='alert alert-danger' role='alert'>$mensaje</div>";
        } ?>
        <form action="procesar.php" method="post">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" pattern="^[A-Za-zÑñ\s]+$" title="El nombre solo puede contener letras y espacios" placeholder="Ingresa tu nombre" required>
            </div>

            <div class="mb-3">
                <span></span>
                <label for="codigo" class="form-label">Código de verificación</label>
                <input type="text" name="codigo" class="form-control" placeholder="Ingresa el texto de la imagen" required>
            </div>

            <div class="mb-3">
                <img src="funcs/genera_codigo.php" alt="Código de verificación" id="img-codigo">
                &nbsp;
                <button type="button" class="btn btn-primary btn-sm" id="regenera">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                    </svg>
                </button>
                &nbsp;
                Genera nuevo
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>

    <script>
        const imgCodigo = document.getElementById('img-codigo');
        const btnGenera = document.getElementById('regenera');

        btnGenera.addEventListener('click', generaCodigo, false)

        function generaCodigo() {
            const url = "funcs/genera_codigo.php";

            fetch(url)
                .then(response => response.blob())
                .then(data => {
                    if (data) {
                        imgCodigo.src = URL.createObjectURL(data);
                    }
                })
        }
    </script>
</body>

</html>