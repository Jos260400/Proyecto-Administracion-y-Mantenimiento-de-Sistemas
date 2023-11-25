<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Horas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include 'config.php';

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $carne = $_POST["carne"];
    $nombre = $_POST["nombre"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $totalHoras = $_POST["totalHoras"];

    // Procesa y almacena los datos en la base de datos
    $sql = "INSERT INTO registro_horas (carne, nombre, fecha_inicio, fecha_fin, total_horas)
            VALUES ('$carne', '$nombre', '$fechaInicio', '$fechaFin', '$totalHoras')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente.";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
}

// Muestra un botón para ver todos los registros
echo '<form method="get" action="ver_registros.php">';
echo '<button type="submit">Ver todos los registros</button>';
echo '</form>';

$conn->close();
?>

</body>
</html>


