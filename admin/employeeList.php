
<?php
    include 'inc/header.php';
?>
<?php include '../classes/zoom.php';?>
<?php include '../classes/salary.php';?>
<?php include '../classes/position.php';?>
<?php include '../classes/employee.php';?>
<?php include_once '../helper/format.php';?>

<?php $employee = new employee(); ?>
 <?php
    if(isset($_GET['delid'])){
    	$id = $_GET['delid'];
    	$deleteEmployee = $employee->delete_employee($id);
    }
 ?>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                  <div class="container-fluid">
                    <span>
                      <?php
                      if(isset($deleteEmployee)){
                          echo $deleteEmployee;
                      }
                     ?>
                   </span>
                  </div>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh sách nhân viên</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Bảng trung tâm</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                            <!-- <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div> -->
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Bảng thông tin nhân viên
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Họ & Tên</th>
                                                <th>Vị trí</th>
                                                <th>Phòng</th>
                                                <th>Ngày sinh</th>
                                                <th>Ngày vào làm</th>
                                                <th>Lương</th>
                                                <th>Ảnh</th>
                                                <th>Quản trị</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                          <tr>
                                              <th>Họ & Tên</th>
                                              <th>Vị trí</th>
                                              <th>Phòng</th>
                                              <th>Ngày sinh</th>
                                              <th>Ngày vào làm</th>
                                              <th>Lương</th>
                                              <th>Ảnh</th>
                                              <th>Quản trị</th>
                                          </tr>
                                        </tfoot>
                                        <tbody>
                                          <?php
                                  					$emlist = $employee->show_employee();
                                  					if($emlist){
                                  						$i = 0;
                                  						while($result=$emlist->fetch_assoc()){
                                  							$i++;
                                  				?>
                                              <tr>
                                                <td><?php echo $result['nvName'];?></td>
                                                <td><?php echo $result['positionName'];?></td>
                                                <td><?php echo $result['zoomName'];?></td>
                                                <td><?php echo $result['nvAge'];?></td>
                                                <td><?php echo $result['nvYears'];?></td>
                                                <td><?php echo $result['salValue'];?></td>
                                                <td><img src="upload/<?php echo $result['nvImg']?>" width="50px"></td>
                                                <td><a href="employeeEdit.php?employeeid=<?php echo $result['nvId'] ?>"><button type="button" class="btn btn-info">Sửa</button></a> || <a onclick = "return confirm('Bạn chắc chắn muốn xóa ?')"href="?delid=<?php echo $result['nvId'] ?>"><button type="button" class="btn btn-info">Xóa</button></a></td>
                                            </tr>
                                            <?php
                                    				}
                                    					}
                                    				?>
                                        </tbody>
                                    </table>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
