let imagenVisibleYape = false;
let imagenVisiblePlin = false;
//Funcion para mostrar la imagen del QR de yape
function image() {
  if (!imagenVisibleYape) {
    document.getElementById("imagencargando").innerHTML = "";
    imagenVisibleYape = true;

    // Deseleccionar la opción Plin si estaba seleccionada
    if (imagenVisiblePlin) {
      document.getElementById("imagen1").checked = false;
      imagenVisiblePlin = false;
      document.getElementById("imagencargandoplin").innerHTML = "";
    }

    imagen =
      '<img src="assets/img/tienda/Yape.jpeg" class="img-fluid" alt="cargando..." />';
    document.getElementById("imagencargando").innerHTML = imagen;
  } else {
    document.getElementById("imagencargando").innerHTML = "";
    imagenVisibleYape = false;
  }
}
//Funcion para mostrar la imagen del QR de PLin
function image1() {
  if (!imagenVisiblePlin) {
    document.getElementById("imagencargandoplin").innerHTML = "";
    imagenVisiblePlin = true;

    // Deseleccionar la opción Yape si estaba seleccionada
    if (imagenVisibleYape) {
      document.getElementById("imagen").checked = false;
      imagenVisibleYape = false;
      document.getElementById("imagencargando").innerHTML = "";
    }

    imagen =
      '<img src="assets/img/tienda/Plin.jpeg" class="img-fluid" alt="cargando..." />';
    document.getElementById("imagencargandoplin").innerHTML = imagen;
  } else {
    document.getElementById("imagencargandoplin").innerHTML = "";
    imagenVisiblePlin = false;
  }
}
