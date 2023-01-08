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
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9KTduKbv9DqsQhb9CJD21ZLBrfnpy4h0577BLdZHiAg&s" alt="logo"> -->
                <img src="<?= $url ?>/assets/images/bpbdkudus.png" alt="logo">
              </div>
              <h6 class="fw-light text-center">Sign in to continue.</h6>
              <form class="pt-3" action="<?= $url ?>/?auth=login" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="<?= $url ?>/assets/index.html">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="<?= $url ?>/?pages=pendaftaran" class="text-primary">Create</a>
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
