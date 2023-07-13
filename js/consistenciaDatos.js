const fechaActual = new Date();
fechaActual.setFullYear(fechaActual.getFullYear() - 18);
const fechaMaxima = fechaActual.toISOString().split('T')[0];
const campoFecha = document.getElementById('nacimiento');
campoFecha.setAttribute('max', fechaMaxima);

function restrictInput(event, pattern) {
    const input = event.target;
    const value = input.value;
    if (!pattern.test(value)) {
        input.value = value.slice(0, -1);
    }
}
function restrictMaxCuotas(event, maxCuotas) {
    const input = event.target;
    const value = parseInt(input.value);
    
    if (isNaN(value) || value > maxCuotas) {
      input.value = "";
    }
  }

  function calcularInteres() {
    const monto = parseFloat(document.getElementById('monto-prestamo').value);
    const cuotas = parseInt(document.getElementById('numero-cuotas').value);
    
    const interesGenerado = monto * 0.05 * cuotas;
    
    document.getElementById('interes').value = interesGenerado.toFixed(2);
  }
  