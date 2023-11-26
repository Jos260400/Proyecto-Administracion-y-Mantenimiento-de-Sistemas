<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $id = $_POST['id'];
    $carne = $_POST['carne'];
    $nombre = $_POST['nombre'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $totalHoras = $_POST['totalHoras'];

    // Actualizar el registro en la base de datos
    $sql = "UPDATE registro_horas SET carne='$carne', nombre='$nombre', fecha_inicio='$fechaInicio', fecha_Fin='$fechaFin', total_Horas='$totalHoras' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
} else {
    echo "Acceso no permitido.";
}

$conn->close();
?>

