<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Uso - Sistema TITAN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .manual-section {
            background-color: #ffefd5;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .role-header {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .role-content {
            color: #555;
        }

        .collapse-toggle {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Guía de Uso - Sistema TITAN</h1>

        <div class="manual-section">
            <h2 class="role-header collapse-toggle" data-toggle="collapse" data-target="#gerente">Gerente</h2>
            <div id="gerente" class="collapse show role-content">
                <p>El rol de Gerente tiene acceso a todas las funcionalidades del sistema, incluyendo la gestión de usuarios, el control de inventario, la generación de informes y la configuración de parámetros generales.</p>
                <ul>
                    <li>Visualización de informes de ventas, inventario y rendimiento</li>
                    <li>Administración de cuentas de usuarios y asignación de roles</li>
                    <li>Configuración de parámetros de precios, descuentos y políticas</li>
                    <li>Acceso a estadísticas y métricas clave del negocio</li>
                </ul>
            </div>
        </div>

        <div class="manual-section">
            <h2 class="role-header collapse-toggle" data-toggle="collapse" data-target="#supervisor">Supervisor</h2>
            <div id="supervisor" class="collapse role-content">
                <p>El rol de Supervisor tiene acceso a funcionalidades relacionadas con la gestión de personal, la asignación de tareas y el seguimiento del rendimiento de los empleados.</p>
                <ul>
                    <li>Asignación de tareas y seguimiento de su progreso</li>
                    <li>Evaluación del rendimiento de los empleados</li>
                    <li>Generación de informes de productividad</li>
                    <li>Gestión de horarios y turnos de trabajo</li>
                </ul>
            </div>
        </div>

        <div class="manual-section">
            <h2 class="role-header collapse-toggle" data-toggle="collapse" data-target="#logistico">Logístico de Inventario</h2>
            <div id="logistico" class="collapse role-content">
                <p>El rol de Logístico de Inventario se encarga de la gestión y el control del inventario de productos en el sistema.</p>
                <ul>
                    <li>Registro de entradas y salidas de productos</li>
                    <li>Actualización de niveles de stock</li>
                    <li>Generación de órdenes de compra y reabastecimiento</li>
                    <li>Visualización de informes de inventario</li>
                </ul>
            </div>
        </div>

        <div class="manual-section">
            <h2 class="role-header collapse-toggle" data-toggle="collapse" data-target="#vendedor">Vendedor</h2>
            <div id="vendedor" class="collapse role-content">
                <p>El rol de Vendedor tiene acceso a funcionalidades relacionadas con la gestión de clientes, la creación de órdenes de venta y el seguimiento de pedidos.</p>
                <ul>
                    <li>Registro de clientes y gestión de información de contacto</li>
                    <li>Creación de órdenes de venta y seguimiento de pedidos</li>
                    <li>Visualización de historial de ventas y comisiones</li>
                    <li>Acceso a información de productos y precios</li>
                </ul>
            </div>
        </div>

        <div class="manual-section">
            <h2 class="role-header collapse-toggle" data-toggle="collapse" data-target="#cliente">Cliente</h2>
            <div id="cliente" class="collapse role-content">
                <p>El rol de Cliente tiene acceso a funcionalidades específicas para realizar pedidos, realizar seguimiento de sus compras y gestionar su información personal.</p>
                <ul>
                    <li>Creación y seguimiento de órdenes de compra</li>
                    <li>Visualización de historial de compras</li>
                    <li>Actualización de información personal y preferencias</li>
                    <li>Acceso a catálogos de productos y ofertas especiales</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.collapse-toggle').click(function() {
                $(this).find('i').toggleClass('fa-plus fa-minus');
            });
        });
    </script>
</body>

</html>