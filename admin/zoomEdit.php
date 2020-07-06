<?php
    include 'inc/header.php';
?>
<?php include './../classes/zoom.php' ?>
<?php
    $zoom = new zoom();
  	if(!isset($_GET['zoomid']) || $_GET['zoomid']==NULL){
  		echo "<scipt>window.location('zoomlist.php')</scipt>";
  	}else{
  		$id = $_GET['zoomid'];
  	}

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $zoomName = $_POST['zoom_name'];
        $zoomDesc = $_POST['zoom_desc'];
        $updateZoom = $zoom->update_zoom($zoomName, $zoomDesc, $id);

    }
 ?>
            </div>


            <div id="layoutSidenav_content">
                <main>
                  <div class="container-fluid">
                    <span><?php
                        if(isset($updateZoom)){
                            echo $updateZoom;
                        }
                     ?></span>
                  </div>
                    <div class="container-fluid">
                        <h2 class="mt-4">Sửa thông tin phòng </h2>
                        <div class="row">
                            <div class="container-fluid">
                  <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">Sửa phòng</li>
                  </ol>
                  <div class="container-fluid">
                    <?php
                    	$get_zoom_name = $zoom->getzoombyId($id);
                    	if($get_zoom_name){
                    		while($result = $get_zoom_name->fetch_assoc()){

                    ?>
                    <form action="" method="post">
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Tên phòng</label>
                        <div class="col-10">
                          <input class="form-control" type="text" name="zoom_name" value="<?php echo $result['zoomName'] ?>" id="example-text-input">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Mô tả chi tiết</label>
                        <div class="col-10">
                          <input class="form-control" type="text" name="zoom_desc" value="<?php echo $result['zoomDescription'] ?>" id="example-text-input">
                        </div>
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                          <input type="submit" class="btn btn-primary" value="Lưu">
                      </div>
                    </form>
                    <?php
                         }
                  }
                    ?>
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
