<nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tienda.php">TIENDA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nosotros.php">NOSOTROS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php">CONTACTO</a>
            </li>
        </ul>
        <a class="navbar-brand m-auto" href="#">
            <img src="assets/img/logo_titan1.png" class="brand-img" alt="">
            <span class="brand-txt">
                <img src="assets/img/logo_titan_oficial.png" alt="" style="width: 100px; height: 60px;">
            </span>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item mr-2  mb-3">
                <div class="nav-icon position-relative text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <div class="dropdown">
                        <div class="input-group" style="border-radius: 20px;">

                            <input type="text" name="buscar" class="form-control border-0 pt-2 pb-3" id="dropdownInput" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon3" oninput="toggleDropdown()" style="font-size: 14px; padding: 0.375rem 0.75rem;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="button-addon3" style="background-color: orangered;"><i class="fas fa-search" style="color: white;"></i></span>
                            </div>
                        </div>




                        <ul class="dropdown-menu w-100 z-index-1000 dropdown-menu-end" id="dropdownMenu">
                            <!-- SE MUESTRAN LOS ARCHIVOS QUE SE BUSCAN -->
                        </ul>
                    </div>
                </div>

            </li>
            <li class="nav-item">
                <!-- <a class="nav-icon position-relative text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalCarrito">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                </a> -->
            </li>
            <li class="nav-item">
                <a href="components.html" class=" nav-link btn ml-xl-4" style="background-color: orangered; color: white; ">
                    <i class="fas fa-sign-in-alt"></i> INICIAR SESION
                </a>

            </li>
        </ul>
    </div>
</nav>