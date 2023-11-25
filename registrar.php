<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Horas</title>
    <link rel="stylesheet" href="style.css">
</head>


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

    // Después de procesar los datos, genera la tabla de resumen
    echo "<h2>Resumen del Registro</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Carne</th><th>Nombre</th><th>Fecha y Hora de Inicio</th><th>Fecha y Hora de Fin</th><th>Total de Horas</th></tr>";
    echo "<tr><td>$carne</td><td>$nombre</td><td>$fechaInicio</td><td>$fechaFin</td><td>$totalHoras</td></tr>";
    echo "</table>";
}
$conn->close();
?>

