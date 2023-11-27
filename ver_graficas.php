<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Gráficas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php
include 'config.php';

// Recuperar todos los registros de la base de datos
$sql = "SELECT fecha_inicio, total_Horas FROM registro_horas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicializar arrays para almacenar fechas y horas
    $fechas = array();
    $horas = array();

    // Mostrar cada fila de la tabla y almacenar fechas y horas en arrays
    while($row = $result->fetch_assoc()) {
        echo "<p>Fecha: " . $row["fecha_inicio"] . ", Horas: " . $row["total_Horas"] . "</p>";

        // Almacenar fechas y horas en arrays
        array_push($fechas, $row["fecha_inicio"]);
        array_push($horas, $row["total_Horas"]);
    }

    // Mostrar el total de horas
    echo "<p>Total de Horas: " . array_sum($horas) . "</p>";

    // Crear el contenedor para la gráfica
    echo "<canvas id='grafica'></canvas>";

    // Convertir arrays a formato JSON para ser utilizados en JavaScript
    $fechas_json = json_encode($fechas);
    $horas_json = json_encode($horas);
} else {
    echo "No hay registros para mostrar.";
}

$conn->close();
?>

<!-- Botón para regresar a ver_registros.php -->
<a href="ver_registros.php"><button>Regresar</button></a>

<script>
    // Convertir JSON a variables de JavaScript
    var fechas = <?php echo $fechas_json; ?>;
    var horas = <?php echo $horas_json; ?>;

    // Configuración de la gráfica de barras
    var ctx = document.getElementById('grafica').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: fechas,
            datasets: [{
                label: 'Horas',
                data: horas,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
