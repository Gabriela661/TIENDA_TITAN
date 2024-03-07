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
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/fierros.png">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Barras de acero'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Barras de Acero 3/8'; ?>&img=<?php echo 'fierros.png'; ?>"><i class="far fa-eye"></i></a></li>
                                       

                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Barras de acero</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Barras de Acero 3/8"</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/tubos.jpg">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Tubos'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Tubo PVC 1/2 SP-Agua Fria'; ?>&img=<?php echo 'tubos.jpg'; ?>"><i class="far fa-eye"></i></a></li>
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Tubos</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Tubo PVC 1/2" SP | Agua Fria</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/drywall-sinfondo.png">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Drywall'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Placa de Drywall Volcanita St 1/2 1.22mx2.44m'; ?>&img=<?php echo 'drywall-sinfondo.png'; ?>"><i class="far fa-eye"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Drywall</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Placa de Drywall Volcanita St 1/2" 1.22mx2.44m</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/alambre-recocido-n8.png">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Alambre recocido n8'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Alambre Recocido de Albañil N°16x50kg'; ?>&img=<?php echo 'alambre-recocido-n8.png'; ?>"><i class="far fa-eye"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Alambre recocido</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Alambre Recocido de Albañil N°16x50kg</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/Mesa-de-trabajo-3-9.png">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Tubo PVC 1/2'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Tubo PVC 1/2 C/R | Agua Fria'; ?>&img=<?php echo 'Mesa-de-trabajo-3-9.png'; ?>"><i class="far fa-eye"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Tubo PVC 1/2</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Tubo PVC 1/2" C/R | Agua Fria</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/fierros1.JPG">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Barra de Construcción 1/2'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Barra de Construcción 1/2 x9m'; ?>&img=<?php echo 'fierros1.JPG'; ?>"><i class="far fa-eye"></i></a></li>
                                     
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Barras de construccion</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Barra de Construcción 1/2''x9m</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/drywall1.JPG">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Drywall '; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Placa de Drywall Volcanita St 3/8 1.22mx2.44m'; ?>&img=<?php echo 'drywall1.JPG'; ?>"><i class="far fa-eye"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Drywall</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Placa de Drywall Volcanita St 3/8" 1.22mx2.44m</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/tubo_curva-removebg-preview.png">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="detalle.php?title=<?php echo 'Tubo Curva'; ?>&price=<?php echo '$250'; ?>&brand=<?php echo 'Easy wear'; ?>&desc=<?php echo 'Curva Presión 3/4'; ?>&img=<?php echo 'tubo_curva-removebg-preview.png'; ?>"><i class="far fa-eye"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="#" class="h3 text-decoration-none">Tubo Curva</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Curva Presión 3/4'' PavcoL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>
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
</body>

</html>