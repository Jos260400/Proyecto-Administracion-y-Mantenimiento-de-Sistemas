<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Horas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
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

    // Inicializar la variable para almacenar la suma de horas
    $totalHorasSum = 0;

    // Mostrar cada fila de la tabla y sumar las horas
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["carne"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["fecha_inicio"] . "</td>";
        echo "<td>" . $row["fecha_Fin"] . "</td>";
        echo "<td>" . $row["total_Horas"] . "</td>";
        echo "<td>";
        echo "<button onclick='eliminarRegistro(" . $row["id"] . ", this)'>Eliminar</button>";
        echo "<button onclick='modificarRegistro(" . $row["id"] . ")'>Modificar</button>";
        echo "</td>";
        echo "</tr>";

        // Sumar las horas al total
        $totalHorasSum += $row["total_Horas"];
    }

    echo "</table>";

    // Mostrar el total de horas fuera del bucle
    echo "<p>Total de Horas: " . $totalHorasSum . "</p>";
} else {
    echo "No hay registros para mostrar.";
}

$conn->close();
?>

<!-- Botón para regresar a index.html -->
<a href="index.html"><button>Ingresar más datos</button></a>

<!-- Botón para ir a ver_graficas.php -->
<a href="ver_graficas.php"><button>Ver Gráficas</button></a>

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

    function modificarRegistro(id) {
        // Redirigir a la página de edición con el ID del registro
        window.location.href = 'editar_registro.php?id=' + id;
    }
</script>

</body>
</html>
