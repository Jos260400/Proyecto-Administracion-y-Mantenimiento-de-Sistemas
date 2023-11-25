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

// Recupera todos los registros de la base de datos
$sql = "SELECT * FROM registro_horas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Registros de Horas</h2>";
    echo "<table border='1'>";
    echo "</th><th>Carne</th><th>Nombre</th><th>Fecha y Hora de Inicio</th><th>Fecha y Hora de Fin</th><th>Total de Horas</th></tr>";

    // Muestra cada fila de la tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["carne"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["fecha_inicio"] . "</td><td>" . $row["fecha_Fin"] . "</td><td>" . $row["total_Horas"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros para mostrar.";
}

$conn->close();
?>
