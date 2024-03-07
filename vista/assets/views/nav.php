<?php
include "header.php"
?>
<!-- Preloader -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index_principal.php" class="nav-link">Inicio</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search fa-lg"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search fa-lg"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times fa-lg"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <!-- Carrito -->
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa-solid fa-cart-shopping "></i>
                <span class="badge badge-warning navbar-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Opciones</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-clipboard-list fa-lg"></i> Generar Proforma
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-credit-card fa-lg"></i> Comprar
                </a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell "></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope fa-lg mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users fa-lg mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file fa-lg mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->




<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../vista/index_principal.php" class="brand-link d-flex justify-content-center">
        <img src="../assets/img/logo_titan1.png" class="brand-image img-elevation-3">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/img/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">
                    USUARIO
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">DISEÑOS</li>

                <li class="nav-item">
                    <a href="usuarios.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>Gestionar Usuarios</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="categoria.php" class="nav-link">
                        <i class="fas fa-briefcase"></i>
                        <p>Gestionar Categoria</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="productos.php" class="nav-link">
                        <i class="fas fa-toolbox"></i>
                        <p>Productos</p>
                    </a>

                </li>
                 <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <p>Reportes</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="reporteUsuario.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reporteFacturas.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de Facturas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reporteProductos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de Productos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="soporte.php" class="nav-link">
                        <i class="fa fa-info-circle"></i>
                        <p>Soporte</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="../index.php" class="nav-link">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        <p>
                            Salir
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>