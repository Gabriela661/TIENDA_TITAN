<?php include './assets/views/navbar.php' ?>

<body>

  <!-- Start Content Page -->
  <div class="banner-especial -lr">
    <img class="img-responsive vdk" src="assets/img/contacto1.jpeg" alt="Combo" width="100%" height="auto">
    <br><br><br>
    <center>
      <p class="banner-especial__txt">Puedes contactarnos a través de nuestros canales de venta y de atención.<br>
        Nuestros asesores te atenderán con gusto.</p>
    </center>
  </div>

  <div class="container">
    <div class="col-md-12  ">
      <h2 class="text-center">Nuestros canales de venta</h2>
      <div class="h-100 py-5 shadow ">
        <div class="row">
          <div class="col-md-4 center">
            <div class="h1 text-primary text-center"><i class="fa fa-globe text-orange"></i></div>
            <h2 class="h5 mt-4 text-center">Compra por nuestra web</h2>
            <center><a href="#" class="text-dark text-decoration-none">www.titan.pe</a></center>
          </div>
          <div class="col-md-4">
            <div class="h1 text-primary text-center"><i class="fab fa-whatsapp text-orange"></i></div>
            <h2 class="h5 mt-4 text-center">Compra por WhatsApp</h2>
            <center> <a href="https://api.whatsapp.com/send?phone=%2051916232342" class="text-dark text-decoration-none">923556568</a></center>
          </div>
          <div class="col-md-4 center">
            <div class="h1 text-primary text-center"><i class="fas fa-shopping-cart text-orange"></i></div>
            <h2 class="h5 mt-4 text-center">Compra por teléfono</h2>
            <center><a href="#" class="text-dark text-decoration-none">Lunes a Domimngo de 8:00 a 20:00(01) 619 - 1616</a></center>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="col-md-12 ">
      <h2 class="text-center">Nuestros canales de atención</h2>
      <div class="h-100 py-5 shadow">
        <div class="row">
          <div class="col-md-4">
            <div class="h1 text-primary text-center"><i class="fab fa-facebook-messenger text-orange"></i></div>
            <h2 class="h5 mt-4 text-center">Chatea con nostros</h2>
            <center> <a href="" class="text-dark text-decoration-none">Facebook messenger todo el día,todos los días del año</a></center>
          </div>
          <div class="col-md-4">
            <div class="h1 text-primary text-center"><i class="fas fa-envelope text-orange"></i></div>
            <h2 class="h5 mt-4 text-center">Escríbenos</h2>
            <center> <a href="" class="text-dark text-decoration-none">A nuestro correo electrónico servicioalcliente@titan.pe</a></center>
          </div>
          <div class="col-md-4">
            <div class="h1 text-primary text-center"><i class="fa fa-phone text-orange"></i></div>
            <h2 class="h5 mt-4 text-center">Compra por teléfono</h2>
            <center> <a href="" class="text-dark text-decoration-none">Lunes a Domingo de 8:00 a 20:00(01) 619 - 4810</a></center>
          </div>
        </div>
      </div>
    </div>


  </div>

  <!-- Start Contact -->

  <div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
    <div class="row">
      <div class="col-md-12 px-0">
        <div id="map" style="width: 100%; height: 100%; min-height: 600px"></div>
      </div>

    </div>
  </div>

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
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>
  <script src="assets/js/foodhut.js"></script>
  <script src="vista/js/busquedaProductos.js"></script>
  <!-- End Script
  <script src="vista/js/busquedaProductos.js"></script>
</body>

</html>