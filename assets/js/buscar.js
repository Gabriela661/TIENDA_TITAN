  
// Abrir el modal cuando se hace clic en el botón de login
var loginBtn = document.getElementById('loginBtn');
var loginModal = document.getElementById('loginModal');
var closeBtn = document.getElementsByClassName('close')[0];

loginBtn.onclick = function() {
    loginModal.style.display = 'block';
}

// Cerrar el modal cuando se hace clic en la 'x'
closeBtn.onclick = function() {
    loginModal.style.display = 'none';
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    if (event.target == loginModal) {
    loginModal.style.display = 'none';
    }
}

function toggleDropdown() {
var dropdownMenu = document.getElementById("dropdownMenu");
dropdownMenu.style.display = (dropdownMenu.style.display === "block") ? "none" : "block";
}

document.addEventListener("click", function(event) {
var isClickInside = document.getElementById("dropdownInput").contains(event.target);
var dropdownMenu = document.getElementById("dropdownMenu");

if (!isClickInside && dropdownMenu.style.display === "block") {
    dropdownMenu.style.display = "none";
}
});

