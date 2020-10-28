<!-- COPYRIGHT-->
<section class="p-t-60 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>All rights reserved. Designed and developed by TC-1 Batch (Marwadi University).</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END COPYRIGHT-->
</div>

</div>

<!-- Jquery JS-->
<script src="html/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="html/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="html/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="html/vendor/slick/slick.min.js">
</script>
<script src="html/vendor/wow/wow.min.js"></script>
<script src="html/vendor/animsition/animsition.min.js"></script>
<script src="html/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="html/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="html/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="html/vendor/circle-progress/circle-progress.min.js"></script>
<script src="html/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="html/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="html/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="html/js/main.js"></script>

<!-- model -->
<div class="modal fade" id="add_category">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="login-form">
            <form action="<?php echo BASE_URL;?>classes/Action.class.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input class="au-input au-input--full" type="text" name="name" placeholder="Category Name" />
                </div>
                <input type="hidden" name="postaction" value="additems" />
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="add_category">Submit</button>
            </form>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="add_sub_category">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Sub Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="login-form">
            <form action="<?php echo BASE_URL;?>classes/Action.class.php" method="post">
                <div class="form-group">
                    <label>Parent Category</label>
                    <?php echo $catObj->getParentCategories(); ?>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="au-input au-input--full" type="text" name="name" placeholder="Category Name" />
                </div>
                <input type="hidden" name="postaction" value="additems" />
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="add_category">Submit</button>
            </form>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- End Model -->

</body>

</html>
<!-- end document-->
