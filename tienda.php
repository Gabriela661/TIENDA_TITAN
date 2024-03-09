<?php include './assets/views/navbar.php' ?>

<body>

    <!-- Menu de tienda -->
    <div class="encuadre py-4">
        <div class="row">
            <div class="col-lg-2">
                <img src="assets/img/CATEGORIAS (1) (1).png">
                <br><br>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-1">
                        <a class="collapsed d-flex justify-content-between h4 text-decoration-none" href="#">
                            FIERROS
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Liso</a></li>
                            <li><a class="text-decoration-none" href="#">Corrugado</a></li>
                        </ul>
                    </li>
                    <li class="pb-2">
                        <a class="collapsed d-flex justify-content-between h4 text-decoration-none" href="#">
                            TUBOS
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Tubos de agua</a></li>
                            <li><a class="text-decoration-none" href="#">Tubos de desagüe</a></li>
                        </ul>
                    </li>
                    <li class="pb-2">
                        <a class="collapsed d-flex justify-content-between h4 text-decoration-none" href="#">
                            DRYWALL
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">estándar (ST)</a></li>
                            <li><a class="text-decoration-none" href="#">resistentes al fuego (RF)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Fin menu tienda -->
            <!-- Productos -->
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">

                        </ul>
                    </div>
                </div>
                <div class="row" id="productos_tienda">

                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Fin productos -->

    <a href="https://api.whatsapp.com/send?phone=51916232342&text=Hola!%20Estoy%20interesado%20en%20comprar%20productos%20de%20la%20categor%C3%ADa%20Perfiles%20met%C3%A1licos%20%C2%BFPodr%C3%ADas%20asistirme?" class="btnchat" target="_blank">
        <i class="fab fa-whatsapp my-btnchat "></i>
    </a>


    <!-- page whatsapp  -->
    <?php include 'whatsapp.php' ?>
    <!-- Start Footer -->
    <?php include 'assets/views/footer.php' ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <script src="vista/js/productos.js"></script>
</body>

</html>