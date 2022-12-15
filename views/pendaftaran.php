<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PENGAJUAN BPBD PATI</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= $url ?>/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= $url ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= $url ?>/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= $url ?>/assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?= $url ?>/assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= $url ?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= $url ?>/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9KTduKbv9DqsQhb9CJD21ZLBrfnpy4h0577BLdZHiAg&s" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9KTduKbv9DqsQhb9CJD21ZLBrfnpy4h0577BLdZHiAg&s" alt="logo">
              </div>
              <h6 class="fw-light text-center">Daftar Untuk Mengakses.</h6>
              <form class="pt-3" action="<?= $url ?>/?auth=pendaftaran" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control form-control" id="nama_user" name="nama_user" placeholder="nama_user" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control" id="no_telp_user" name="no_telp_user" placeholder="no_telp_user" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control" id="password1"  placeholder="password" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                      <input type="text" class="form-control form-control" id="alamat_user" name="alamat_user" placeholder="alamat_user" required>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control" id="password2" name="password" placeholder="Ulangi Password" required>
                    </div>
                  </div>
                </div>
                <script>                  
                  function ButtonCick(){
                    var password1 = document.getElementById("password1").value;
                    var password2 = document.getElementById("password2").value;                    
                    if(password1 == password2){
                      document.getElementById("simpandaftar").click;
                    }else{
                      alert("Password anda tidak sama");
                    }
                  }
                </script>

                <div class="mt-3">
                  <button onclick="ButtonCick();" class="btn  btn-primary ">SIGN UP</button>
                  <button type="submit" id="simpandaftar" class="btn  btn-primary d-none">SIGN UP</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">

                </div>
                <div class="text-center mt-4 fw-light">
                  have an account? <a href="<?= $url ?>/?pages=login" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= $url ?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= $url ?>/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= $url ?>/assets/js/off-canvas.js"></script>
  <script src="<?= $url ?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?= $url ?>/assets/js/template.js"></script>
  <script src="<?= $url ?>/assets/js/settings.js"></script>
  <script src="<?= $url ?>/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>