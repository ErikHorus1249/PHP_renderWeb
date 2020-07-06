<?php
    include 'inc/header.php';
?>
<?php include '../classes/salary.php' ?>
<?php

    $salary = new salary();
    if(isset($_GET['delid'])){
    	$id = $_GET['delid'];
    	$deletesalary = $salary->delete_salary($id);
    }
 ?>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <div class="container-fluid">
                        <span><?php
                            if(isset($updatesalary)){
                                echo $updatesalary;
                            }
                         ?></span>
                      </div>
                        <h1 class="mt-4">Danh sách lương</h1>
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
                                Bảng thông tin lương
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mô tả bậc lương</th>
                                                <th>Giá trị lương</th>
                                                <th>Quản trị</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Mô tả bậc lương</th>
                                              <th>Giá trị lương</th>
                                              <th>Quản trị</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                          <?php
                                            $show_salary = $salary->show_salary();
                                            if($show_salary){
                                              $i = 0;
                                              while($result = $show_salary->fetch_assoc()){
                                                $i++;
                                           ?>
                                            <tr>
                                                <td><?php echo $result['salDescription'] ?></td>
                                                <td><?php echo $result['salValue'] ?></td>
                                                <td><a href="salaryEdit.php?salaryid=<?php echo $result['salId'] ?>"><button type="button" class="btn btn-info">Sửa</button></a></td>
                                  						</tr>
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
