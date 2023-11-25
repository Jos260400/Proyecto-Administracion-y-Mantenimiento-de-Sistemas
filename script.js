function calcularTotalHoras() {
    const fechaInicio = new Date(document.getElementById('fechaInicio').value);
    const fechaFin = new Date(document.getElementById('fechaFin').value);

    // Calcular la diferencia en milisegundos
    const diferenciaMilisegundos = fechaFin - fechaInicio;

    // Convertir la diferencia a horas y redondear
    const totalHoras = Math.round(diferenciaMilisegundos / (1000 * 60 * 60));

    // Mostrar el total de horas en el campo correspondiente
    document.getElementById('totalHoras').value = totalHoras;
}
