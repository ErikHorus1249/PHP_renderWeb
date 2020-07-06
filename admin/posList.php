<?php
    include 'inc/header.php';
?>
<?php include '../classes/position.php' ?>
<?php

    $position = new position();
    if(isset($_GET['delid'])){
    	$id = $_GET['delid'];
    	$deleteposition = $position->delete_position($id);
    }
 ?>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <div class="container-fluid">
                        <span><?php
                            if(isset($updatePos)){
                                echo $updatePos;
                            }
                         ?></span>
                      </div>
                        <h1 class="mt-4">Danh sách vị trí</h1>
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
                                Bảng thông vị trí
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Vị trí</th>
                                                <th>Quản trị</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Vị trí</th>
                                              <th>Quản trị</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                          <?php
                                            $show_position = $position->show_position();
                                            if($show_position){
                                              $i = 0;
                                              while($result = $show_position->fetch_assoc()){
                                                $i++;
                                           ?>
                                            <tr>
                                                <td><?php echo $result['positionName'] ?></td>
                                                <td><a href="posEdit.php?positionid=<?php echo $result['positionId'] ?>"><button type="button" class="btn btn-info">Sửa</button></a></td>
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
