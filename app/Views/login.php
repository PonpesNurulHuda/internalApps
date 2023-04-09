<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pusat Data Nurul Huda</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('niceAdmin/vendorNiceAdmin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?php echo base_url('niceAdmin/css/style.css'); ?>">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Pusat Data Nurul Huda</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Masuk ke akun anda</h5>
                    <p class="text-center small">Masukan email dan password anda</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                        <label for="" class="form-label">NIS</label>
                        <input type="email" name="email" class="form-control" id="nis" required>
                    </div>

                    <div class="col-12">
                        <label for="" class="form-label">Sandi</label>
                        <input type="Password" name="Password" class="form-control" id="sandi" required>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100 btnMasuk" type="" onclick="login()">Masuk</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a><br>
                Created by <a href="">Rifki Ahmad Sururi</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
  function login(){
    event.preventDefault();
    var dataPost = new Object;
      dataPost.nis = $("#nis").val();
      dataPost.sandi = $("#sandi").val();

      console.log("dataPost", dataPost);
      $.ajax({
          url: "login",
          type: "POST",
      
          data: dataPost,
          success: function (response) {
            alert(response.pesan)
            if(response.status == 1){
              window.location.replace("dashboard");
            }
          },
          error: function () {
            alert("Terjadi kesalahan");
          },
      });
  }

  var ipServer = "<?php echo $ipServer; ?>";
  </script>

</body>

</html>