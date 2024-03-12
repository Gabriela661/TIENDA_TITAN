<?php
include_once "./assets/views/header.php";
?>

<nav class="navbar navbar-expand-lg navbar-light shadow" style="padding: 0.1px">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center ml-3" href="index.php">
            <img class="tiltle" src="assets/img/logo_titan1.png" alt="">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill ml-3">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto" style="font-size: 100px;">
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
            </div>
            <div class="navbar align-self-center d-flex">

                <div class="nav-icon position-relative text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <div class="dropdown mt-2">
                        <div class="input-group-text bg-white" style="border-radius: 150px;">
                            <input type="text" name="bsucar" class="form-control border-0" id="dropdownInput" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon3" oninput="toggleDropdown()">
                            <i class="fa fa-fw fa-search text-decoration-none"></i>
                        </div>
                        <ul class="dropdown-menu w-100 z-index-1000 dropdown-menu-end bg-blue" id="dropdownMenu">
                            <!-- SE MUESTRAN LOS ARCHIVOS QUE SE BUSCAN -->
                        </ul>
                    </div>
                </div>



                &nbsp;&nbsp;


                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                </a>
                <a id="loginBtn" class="nav-icon position-relative text-decoration-none dropdown-toggle" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 right-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                </a>
            </div>

            <!-- ---------------------modal----de login----------------- -->
            <div id="modalLogin" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-right modal-dialog-scrollable" style="margin-left: auto; margin-right: 0;">
                    <div class="modal-content h-1">
                        <!-- Cabecera del modal -->
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold">LOGIN USUARIO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="container" style="padding:50px">
                            <form action="vista/index_principal.php" method="post">
                                <div class="row">
                                    <label>E-mail <i class="fas fa-envelope text-primary"></i> </label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div><br>
                                <div class="row">
                                    <label>Contraseña <span class="fas fa-lock text-primary"></span></label>
                                    <input type="password" name="password_user" class="form-control" placeholder="Password">
                                </div><br>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                    </div>
                                </div>
                                <br>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ----------------------fin del modal login------------- -->

            </body>
        </div>
    </div>
</nav>