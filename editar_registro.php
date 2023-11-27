<?php
include 'config.php';

// Verificar si se proporciona un ID válido en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los detalles del registro seleccionado
    $sql = "SELECT * FROM registro_horas WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $carne = $row['carne'];
        $nombre = $row['nombre'];
        $fechaInicio = $row['fecha_inicio'];
        $fechaFin = $row['fecha_Fin'];
        $totalHoras = $row['total_Horas'];
    } else {
        echo "No se encontró el registro con el ID proporcionado.";
        exit();
    }
} else {
    echo "ID no proporcionado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Editar Registro</h2>

<form action="guardar_edicion.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label for="carne">Carne del estudiante:</label>
    <input type="text" id="carne" name="carne" value="<?php echo $carne; ?>" required>

    <label for="nombre">Nombre del estudiante:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>

    <label for="fechaInicio">Fecha y hora de inicio:</label>
    <input type="datetime-local" id="fechaInicio" name="fechaInicio" value="<?php echo $fechaInicio; ?>" required>

    <label for="fechaFin">Fecha y hora de fin:</label>
    <input type="datetime-local" id="fechaFin" name="fechaFin" value="<?php echo $fechaFin; ?>" required>

    <label for="totalHoras">Total de horas:</label>
    <input type="number" id="totalHoras" name="totalHoras" value="<?php echo $totalHoras; ?>" required>

    <button type="submit">Guardar Cambios</button>
</form>


</body>
</html>
