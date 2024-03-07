let imagenVisible = false;

function image() {
  if (imagenVisible) {
    document.getElementById('imagencargando').innerHTML = '';
    imagenVisible = false;
  } else {
    imagen = '<img src="assets/img/Captura.JPG" alt="cargando..." />';
    document.getElementById('imagencargando').innerHTML = imagen;
    imagenVisible = true;
  }
}

function image1() {
  if (imagenVisible) {
    document.getElementById('imagencargandoplin').innerHTML = '';
    imagenVisible = false;
  } else {
    imagen = '<img src="assets/img/Plin.JPG" alt="cargando..." />';
    document.getElementById('imagencargandoplin').innerHTML = imagen;
    imagenVisible = true;
  }
}
function tarjeta() {
  console.log("La función tarjeta() se está ejecutando");
  var formularioTarjeta = document.getElementById('formularioTarjeta');
  var checkboxImagen = document.getElementById('imagen');
  console.log("Estado del checkbox: ", checkboxImagen.checked);
  if (checkboxImagen.checked) {
    formularioTarjeta.style.display = 'block'; // Mostrar el formulario
  } else {
    formularioTarjeta.style.display = 'none'; // Ocultar el formulario
  }
}


