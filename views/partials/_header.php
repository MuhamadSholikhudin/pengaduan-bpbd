<?php 
if (!isset($_SESSION['id_user'])) {
  echo Redirect("http://localhost/pengaduan-bpbd/", "Silahkan Login Terlebih Dahulu");
}
?>
  <!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BPBD PATI </title>
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
  <link rel="shortcut icon" href="<?= $url ?>/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">