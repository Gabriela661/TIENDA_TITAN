// Inicialmente, ocultar las imágenes
document.getElementById("imagencargando").style.display = "none";
document.getElementById("imagencargandoplin").style.display = "none";

// Funcion para mostrar la imagen del QR de yape
function image() {
  var checkBoxYape = document.getElementById("imagen");
  var checkBoxPlin = document.getElementById("imagen1");
  var imagenYape = document.getElementById("imagencargando");
  var imagenPlin = document.getElementById("imagencargandoplin");

  if (checkBoxYape.checked == true) {
    checkBoxPlin.checked = false;
    imagenPlin.style.display = "none";
    imagenYape.style.display = "block";
  } else {
    imagenYape.style.display = "none";
  }
}

// Funcion para mostrar la imagen del QR de Plin
function image1() {
  var checkBoxYape = document.getElementById("imagen");
  var checkBoxPlin = document.getElementById("imagen1");
  var imagenYape = document.getElementById("imagencargando");
  var imagenPlin = document.getElementById("imagencargandoplin");

  if (checkBoxPlin.checked == true) {
    checkBoxYape.checked = false;
    imagenYape.style.display = "none";
    imagenPlin.style.display = "block";
  } else {
    imagenPlin.style.display = "none";
  }
}
