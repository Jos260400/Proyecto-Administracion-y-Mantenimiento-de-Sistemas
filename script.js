// script.test.js

// Importa la función que deseas probar desde script.js
import { calcularTotalHoras } from './script';

// Prueba unitaria para la función calcularTotalHoras
describe('Calcular Total de Horas', () => {
    test('Debería calcular el total de horas correctamente', () => {
        // Simula el DOM necesario para la prueba
        document.body.innerHTML = `
            <input type="datetime-local" id="fechaInicio" value="2023-01-01T12:00">
            <input type="datetime-local" id="fechaFin" value="2023-01-01T15:30">
            <input type="number" id="totalHoras" name="totalHoras" readonly>
        `;

        // Ejecuta la función que deseas probar
        calcularTotalHoras();

        // Verifica que el total de horas se haya calculado correctamente
        expect(document.getElementById('totalHoras').value).toBe('3.5');
    });
});
