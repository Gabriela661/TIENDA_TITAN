<?php
session_start();
if ($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2 || $_SESSION['id_rol'] == 3 || $_SESSION['id_rol'] == 4 || $_SESSION['id_rol'] == 5) {
?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Panel de usuario</title>
    <?php
    include_once "assets/views/nav.php";
    ?>



    <div class="content-wrapper" style="font-family: 'Open Sans', sans-serif;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <center>
                            <h1 class="m-0"> Sistema Ferretaría <strong>TITAN</strong> </h1>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="container my-5">
                        <h1 class="text-center mb-4">Catálogo de Productos Favoritos</h1>
                        <div id="productList" class="row">
                            <!-- Los productos se cargarán aquí -->
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <script>
                        // Datos de ejemplo de productos favoritos
                        const favProducts = [{
                                id: 1,
                                name: 'Producto 1',
                                price: 19.99,
                                image: 'https://via.placeholder.com/300x200'
                            },
                            {
                                id: 2,
                                name: 'Producto 2',
                                price: 24.99,
                                image: 'https://via.placeholder.com/300x200'
                            },
                            {
                                id: 3,
                                name: 'Producto 3',
                                price: 14.99,
                                image: 'https://via.placeholder.com/300x200'
                            },
                            {
                                id: 4,
                                name: 'Producto 4',
                                price: 29.99,
                                image: 'https://via.placeholder.com/300x200'
                            }
                        ];

                        // Función para renderizar los productos favoritos
                        function renderProducts() {
                            const productList = $('#productList');
                            productList.empty();

                            favProducts.forEach(product => {
                                const productCard = $(`
                    <div class="col-md-3">
                        <div class="card product-card">
                            <img src="${product.image}" class="card-img-top" alt="${product.name}">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">$${product.price}</p>
                                <button class="btn btn-primary">Agregar al Carrito</button>
                            </div>
                        </div>
                    </div>
                `);
                                productList.append(productCard);
                            });
                        }

                        // Llamar a la función para renderizar los productos al cargar la página
                        $(document).ready(function() {
                            renderProducts();
                        });
                    </script>
                </div>

                <hr>
                <!-- Gráficos -->
                <!-- Contenedor principal de gráficas -->
                <div class="card p-5 row" style="background-color: #cdd2db;">
                    <style>
                        .filter-btn {
                            margin-bottom: 10px;
                        }
                    </style>
                    <div class="row">
                        <div class="container my-5">
                            <h1 class="text-center mb-4">Historial de Compras</h1>
                            <div class="btn-group filter-btn">
                                <button type="button" class="btn btn-secondary" data-filter="all">Todos</button>
                                <button type="button" class="btn btn-secondary" data-filter="herramientas">Herramientas</button>
                                <button type="button" class="btn btn-secondary" data-filter="materiales">Materiales</button>
                                <!-- <button type="button" class="btn btn-secondary" data-filter="jardineria">Jardinería</button> -->
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="purchaseHistory">
                                    <!-- Los productos se cargarán aquí -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
    <script>
        // Datos de ejemplo de historial de compras
        const purchaseHistory = [{
                product: 'Martillo',
                category: 'herramientas',
                quantity: 2,
                unitPrice: 8.99
            },
            {
                product: 'Clavos',
                category: 'materiales',
                quantity: 100,
                unitPrice: 0.05
            },
            {
                product: 'Pala',
                category: 'jardineria',
                quantity: 1,
                unitPrice: 12.99
            },
            {
                product: 'Destornillador',
                category: 'herramientas',
                quantity: 3,
                unitPrice: 4.99
            },
            {
                product: 'Cemento',
                category: 'materiales',
                quantity: 10,
                unitPrice: 2.49
            },
            {
                product: 'Rastrillo',
                category: 'jardineria',
                quantity: 1,
                unitPrice: 9.99
            }
        ];

        // Función para renderizar el historial de compras
        function renderPurchaseHistory(filter = 'all') {
            const purchaseHistoryTable = $('#purchaseHistory');
            purchaseHistoryTable.empty();

            purchaseHistory.forEach(purchase => {
                if (filter === 'all' || purchase.category === filter) {
                    const total = purchase.quantity * purchase.unitPrice;
                    const row = $(`
                        <tr>
                            <td>${purchase.product}</td>
                            <td>${purchase.category}</td>
                            <td>${purchase.quantity}</td>
                            <td>$${purchase.unitPrice.toFixed(2)}</td>
                            <td>$${total.toFixed(2)}</td>
                        </tr>
                    `);
                    purchaseHistoryTable.append(row);
                }
            });
        }

        // Función para manejar el filtro de productos
        function handleFilter() {
            const filter = $(this).data('filter');
            renderPurchaseHistory(filter);
        }

        // Llamar a la función para renderizar el historial de compras al cargar la página
        $(document).ready(function() {
            renderPurchaseHistory();

            // Agregar eventos de clic a los botones de filtro
            $('.filter-btn button').click(handleFilter);
        });
    </script>

    <!--  <footer class="main-footer">
     <strong>Copyright &copy; 2024-2025 <a href="#">Tienda TITAN</a>.</strong>
     Derechos reservados.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 1.0.0
     </div>
 </footer> -->

    <script src="js/graph/graph.js"></script>
    </div>
    </body>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>