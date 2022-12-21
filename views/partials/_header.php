<?php 
if (!isset($_SESSION['id_user'])) {
  Redirect("http://localhost/pengaduan-bpbd/", "Silahkan Login Terlebih Dahulu");
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

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="<?= $url ?>/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= $url ?>/assets/images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
 
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

</head>

<body>
  <div class="container-scroller">