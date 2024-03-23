<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Titan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .section {
            margin-bottom: 30px;
        }

        .section-header {
            background-color: #ffefd5;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .section-content {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .function-image {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .guide-section {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .guide-section img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center mb-4">TITAN</h1>
            <a href="paginaPrincipal.php" class="btn btn-success">Inicio</a>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="#caja" class="list-group-item list-group-item-action">Caja</a>
                    <a href="#gestionUsuarios" class="list-group-item list-group-item-action">Gestionar Usuarios</a>
                    <a href="#gestionCategorias" class="list-group-item list-group-item-action">Gestionar Categorías</a>
                    <a href="#gestionProformas" class="list-group-item list-group-item-action">Gestionar Proformas</a>
                    <a href="#gestionRoles" class="list-group-item list-group-item-action">Gestionar Roles</a>
                    <a href="#inventario" class="list-group-item list-group-item-action">Inventario</a>
                    <a href="#reportes" class="list-group-item list-group-item-action">Reportes</a>
                    <a href="#seccionClientes" class="list-group-item list-group-item-action">Sección Clientes</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="section">
                    <div class="section-header" data-toggle="collapse" data-target="#dashboard">
                        <h2>Dashboard</h2>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#dashModal">Ver Guía</button>
                    </div>
                    <div id="dashboard" class="collapse show section-content">
                        <p>Gráficos y resúmenes del sistema.</p>
                        <img src="https://via.placeholder.com/50" alt="Visualizar" class="function-image">
                    </div>
                </div>

                <div class="section">
                    <div class="section-header" data-toggle="collapse" data-target="#caja">
                        <h2>Caja</h2>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#cajaModal">Ver Guía</button>
                    </div>
                    <div id="caja" class="collapse section-content">
                        <p>Gestión de ventas y pagos.</p>
                        <img src="https://via.placeholder.com/50" alt="Agregar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Editar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Visualizar" class="function-image">
                    </div>
                </div>

                <!-- Otras secciones -->
                <div class="section">
                    <div class="section-header" data-toggle="collapse" data-target="#gestionUsuarios">
                        <h2>Gestionar Usuarios</h2>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#guiaModal">Ver Guía</button>
                    </div>
                    <div id="gestionUsuarios" class="collapse section-content">
                        <p>Administración de usuarios del sistema.</p>
                        <img src="https://via.placeholder.com/50" alt="Agregar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Editar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Borrar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Visualizar" class="function-image">
                    </div>
                </div>

                <div class="section">
                    <div class="section-header" data-toggle="collapse" data-target="#gestionCategorias">
                        <h2>Gestionar Categorías</h2>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#guiaModal">Ver Guía</button>
                    </div>
                    <div id="gestionCategorias" class="collapse section-content">
                        <p>Administración de categorías de productos.</p>
                        <img src="https://via.placeholder.com/50" alt="Agregar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Editar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Borrar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Visualizar" class="function-image">
                    </div>
                </div>

                <!-- Más secciones... -->

                <div class="section">
                    <div class="section-header" data-toggle="collapse" data-target="#seccionClientes">
                        <h2>Sección Clientes</h2>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#guiaModal">Ver Guía</button>
                    </div>
                    <div id="seccionClientes" class="collapse section-content">
                        <p>Gestión de clientes y sus compras.</p>
                        <img src="https://via.placeholder.com/50" alt="Agregar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Editar" class="function-image">
                        <img src="https://via.placeholder.com/50" alt="Visualizar" class="function-image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para la guía detallada dash -->
    <div class="modal fade" id="dashModal" tabindex="-1" role="dialog" aria-labelledby="dashModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dashModalLabel">Guía Detallada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="body" data-spy="scroll" data-target="#guideNavbarD" data-offset="70">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="guideNavbarD">
                            <div class="container">
                                <a class="navbar-brand" href="#">Dashboard</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDa" aria-controls="navbarNavDa" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDa">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#introducciond">Introducción</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#graficosVentasd">Gráficos de Ventas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#resumenInventariod">Resumen de Inventario</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#metricasClaved">Métricas Clave</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="container my-1 p-2">
                            <div class="guide-section" id="introducciond">
                                <h2>Introducción</h2>
                                <p>La sección de Dashboard proporciona una vista general del rendimiento y las métricas clave del negocio. Aquí encontrarás gráficos y resúmenes que te ayudarán a tomar decisiones informadas y mantener un control eficiente sobre tu empresa.</p>
                            </div>

                            <div class="guide-section" id="graficosVentasd" style="display: none;">
                                <h2>Gráficos de Ventas</h2>
                                <img src="https://via.placeholder.com/800x400" alt="Gráfico de Ventas">
                                <p>Los gráficos de ventas te permiten visualizar el rendimiento de tus ventas a lo largo del tiempo. Puedes ver las tendencias, los picos y las caídas, y comparar los datos con períodos anteriores. Estos gráficos se actualizan automáticamente y puedes filtrar la información por categorías, productos o vendedores.</p>
                            </div>

                            <div class="guide-section" id="resumenInventariod" style="display: none;">
                                <h2>Resumen de Inventario</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="https://via.placeholder.com/400x300" alt="Resumen de Inventario">
                                    </div>
                                    <div class="col-md-6">
                                        <p>El resumen de inventario te brinda una visión general de los niveles de stock actuales, los productos más vendidos y los artículos con stock bajo. Puedes identificar rápidamente los productos que necesitan ser reabastecidos y tomar medidas oportunas para evitar quedarte sin stock.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="guide-section" id="metricasClaved" style="display: none;">
                                <h2>Métricas Clave</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x200" alt="Métricas Clave">
                                        <h3>Ventas Totales</h3>
                                        <p>Visualiza las ventas totales de tu negocio en un período determinado.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x200" alt="Métricas Clave">
                                        <h3>Clientes Nuevos</h3>
                                        <p>Mantén un seguimiento del número de nuevos clientes que se han registrado.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x200" alt="Métricas Clave">
                                        <h3>Ventas por Vendedor</h3>
                                        <p>Compara el rendimiento de tus vendedores y reconoce a los más destacados.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para la guía detallada Caja -->
    <div class="modal fade" id="cajaModal" tabindex="-1" role="dialog" aria-labelledby="cajaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cajaModalLabel">Guía Detallada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="body" data-spy="scroll" data-target="#guideNavbarCa" data-offset="70">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="guideNavbarCa">
                            <div class="container">
                                <a class="navbar-brand" href="#">Caja</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavCa" aria-controls="navbarNavCa" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavCa">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#introduccionCa">Introducción</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#graficosVentasCa">Gráficos de Ventas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#resumenInventarioCa">Resumen de Inventario</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-target="#metricasClaveCa">Métricas Clave</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="container my-1 p-2">
                            <div class="guide-section" id="introduccionCa">
                                <h2>Introducción</h2>
                                <p>La sección de Dashboard proporciona una vista general del rendimiento y las métricas clave del negocio. Aquí encontrarás gráficos y resúmenes que te ayudarán a tomar decisiones informadas y mantener un control eficiente sobre tu empresa.</p>
                            </div>

                            <div class="guide-section" id="graficosVentasCa" style="display: none;">
                                <h2>Gráficos de Ventas</h2>
                                <img src="https://via.placeholder.com/800x400" alt="Gráfico de Ventas">
                                <p>Los gráficos de ventas te permiten visualizar el rendimiento de tus ventas a lo largo del tiempo. Puedes ver las tendencias, los picos y las caídas, y comparar los datos con períodos anteriores. Estos gráficos se actualizan automáticamente y puedes filtrar la información por categorías, productos o vendedores.</p>
                            </div>

                            <div class="guide-section" id="resumenInventarioCa" style="display: none;">
                                <h2>Resumen de Inventario</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="https://via.placeholder.com/400x300" alt="Resumen de Inventario">
                                    </div>
                                    <div class="col-md-6">
                                        <p>El resumen de inventario te brinda una visión general de los niveles de stock actuales, los productos más vendidos y los artículos con stock bajo. Puedes identificar rápidamente los productos que necesitan ser reabastecidos y tomar medidas oportunas para evitar quedarte sin stock.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="guide-section" id="metricasClaveCa" style="display: none;">
                                <h2>Métricas Clave</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x200" alt="Métricas Clave">
                                        <h3>Ventas Totales</h3>
                                        <p>Visualiza las ventas totales de tu negocio en un período determinado.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x200" alt="Métricas Clave">
                                        <h3>Clientes Nuevos</h3>
                                        <p>Mantén un seguimiento del número de nuevos clientes que se han registrado.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x200" alt="Métricas Clave">
                                        <h3>Ventas por Vendedor</h3>
                                        <p>Compara el rendimiento de tus vendedores y reconoce a los más destacados.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#introduccion').show();

            $('.section-header').click(function() {
                $(this).find('i').toggleClass('fa-plus fa-minus');
                $(this).next('.section-content').collapse('toggle');
            });
            $('.nav-link').click(function(e) {
                e.preventDefault();
                const targetSection = $($(this).data('target'));
                $('.guide-section').hide();
                targetSection.show();
                $('html, #body').animate({
                    scrollTop: targetSection.offset().top - 70
                }, 500);
            });
        });
    </script>
</body>

</html>