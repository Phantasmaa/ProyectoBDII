function mostrarTarjeta(numTarjeta) {
    var tarjeta1 = document.getElementById("tarjeta1");
    var tarjeta2 = document.getElementById("tarjeta2");
    var opciones = document.getElementById("opciones");

    if (numTarjeta === 1) {
        tarjeta1.style.display = "flex";
        tarjeta2.style.display = "none";
    } else if (numTarjeta === 2) {
        tarjeta1.style.display = "none";
        tarjeta2.style.display = "flex";
    }

    opciones.style.display = "none";
}