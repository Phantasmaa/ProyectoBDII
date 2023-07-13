function mostrarTarjeta(numTarjeta) {
    var tarjeta1 = document.getElementById("tarjeta1");
    var tarjeta2 = document.getElementById("tarjeta2");
    var tarjeta3 = document.getElementById("tarjeta0");
    var opciones = document.getElementById("opciones");
    var contenido = document.getElementById("procesoContainer");

    if (numTarjeta === 1) {
      tarjeta1.style.display = "flex";
      tarjeta2.style.display = "none";
      tarjeta3.style.display = "flex";
      opciones.style.display = "none";
    } else if (numTarjeta === 2) {
      tarjeta1.style.display = "none";
      tarjeta2.style.display = "flex";
      tarjeta3.style.display = "flex";
      opciones.style.display = "none";
    } else if (numTarjeta === 0) {
      tarjeta1.style.display = "none";
      tarjeta2.style.display = "none";
      tarjeta3.style.display = "none";
      opciones.style.display = "flex";
    }
  }