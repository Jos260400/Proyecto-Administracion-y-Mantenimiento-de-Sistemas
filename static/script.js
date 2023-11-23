function agregarActividad() {
  var carne = document.getElementById("carne").value;
  var fecha = document.getElementById("fecha").value;
  var horaInicio = document.getElementById("horaInicio").value;
  var horaFin = document.getElementById("horaFin").value;

  var total = calcularTotal(horaInicio, horaFin);

  // Enviar datos al servidor Flask usando AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/guardar_actividad", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      alert(xhr.responseText);
    }
  };
  xhr.send("carne=" + carne + "&fecha=" + fecha + "&horaInicio=" + horaInicio + "&horaFin=" + horaFin + "&total=" + total);
}

function calcularTotal(horaInicio, horaFin) {
  var inicio = new Date("2000-01-01 " + horaInicio);
  var fin = new Date("2000-01-01 " + horaFin);

  var diferencia = fin - inicio;
  var totalHoras = diferencia / (1000 * 60 * 60);

  return totalHoras.toFixed(2);
}
