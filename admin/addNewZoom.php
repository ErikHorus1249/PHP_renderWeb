<?php
    include 'inc/header.php';
?>
<?php include './../classes/zoom.php' ?>
<?php

    $zoom = new zoom();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $zoomName = $_POST['zoom_name'];
        $zoomDesc = $_POST['zoom_desc'];
        $insertZoom = $zoom->insert_zoom($zoomName,$zoomDesc);

    }
 ?>
            </div>


            <div id="layoutSidenav_content">
                <main>
                  <div class="container-fluid">
                    <span><?php
                        if(isset($insertZoom)){
                            echo $insertZoom;
                        }
                     ?></span>
                  </div>
                    <div class="container-fluid">
                        <h2 class="mt-4">Thêm thông tin phòng ban mới</h2>
                        <div class="row">
                            <div class="container-fluid">
                  <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">Thêm phòng</li>
                  </ol>
                  <div class="container-fluid">
                    <form action="addNewZoom.php" method="post">
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Tên phòng</label>
                        <div class="col-10">
                          <input class="form-control" type="text" name="zoom_name" value="Giáo vụ" id="example-text-input">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Mô tả chi tiết</label>
                        <div class="col-10">
                          <textarea name="zoom_desc" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                          <input type="submit" class="btn btn-primary" value="Lưu">
                      </div>
                    </form>
                  </div>
                            </div>
                        </div>

                    </div>
                </main>
                <?php include 'inc/footer.php'; ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
