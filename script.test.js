// Importar la función que se va a probar
const { calcularTotalHoras } = require('./script');

// Simular el entorno del navegador (puedes usar una biblioteca como jsdom)
const { JSDOM } = require('jsdom');
const { document } = new JSDOM('<html><body></body></html>').window;

// Mockear la función getElementById
document.getElementById = jest.fn((id) => {
  if (id === 'fechaInicio') {
    return { value: '2023-01-01T7:00' }; 
  } else if (id === 'fechaFin') {
    return { value: '2023-01-01T15:00' }; 
  } else if (id === 'totalHoras') {
    return { value: '' }; // Inicialmente el campo está vacío
  }
});

// Prueba unitaria
test('calcularTotalHoras calcula correctamente el total de horas', () => {
  calcularTotalHoras();

  // Obtener el valor del campo 'totalHoras' después de llamar a la función
  const totalHoras = document.getElementById('totalHoras').value;

  // Verificar que el resultado sea el esperado
  expect(totalHoras).toBe('8'); // Cambiar según tus expectativas
});
