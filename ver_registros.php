<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Horas</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    
<?php
include 'config.php';

// Recuperar todos los registros de la base de datos
$sql = "SELECT * FROM registro_horas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Registros de Horas</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Carne</th><th>Nombre</th><th>Fecha y Hora de Inicio</th><th>Fecha y Hora de Fin</th><th>Total de Horas</th><th>Acciones</th></tr>";

    // Mostrar cada fila de la tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["carne"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["fecha_inicio"] . "</td>";
        echo "<td>" . $row["fecha_Fin"] . "</td>";
        echo "<td>" . $row["total_Horas"] . "</td>";
        echo "<td><button onclick='eliminarRegistro(" . $row["id"] . ", this)'>Eliminar</button></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros para mostrar.";
}

$conn->close();
?>

<!-- Botón para regresar a index.html -->
<a href="index.html"><button>Regresar a Index</button></a>

<script>
    function eliminarRegistro(id, button) {
        if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
            $.ajax({
                type: 'POST',
                url: 'eliminar_registro.php',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    // Eliminar la fila de la tabla
                    $(button).closest('tr').remove();
                },
                error: function(error) {
                    console.error('Error al eliminar el registro:', error);
                }
            });
        }
    }
</script>
</body>
</html>
