        <!-- content-wrapper ends -->
        <!-- partial:<?= $url ?>/assets/partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium Bootstrap admin template.</span> -->
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © <?= date(
                'Y'
            ) ?>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->

        <!-- main-panel ends -->
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
          // In your Javascript (external .js resource or <script> tag)
          $(document).ready(function() {
            $('.js-example-basic-single').select2();
          });
        </script>

        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


        <script>
          $('.tambahpeninjauan').on('click', function() {
            var id = $(this).data('id');            

            $('#id_pelaporan').val(id);
            // $('#deladd').html(sk);
          });
        </script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        <script>
          $(document).ready(function() {
            $('#myTable').DataTable();
          });
        </script>



        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
        </body>

        </html>