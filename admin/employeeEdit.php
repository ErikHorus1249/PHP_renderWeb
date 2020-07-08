<?php
    include 'inc/header.php';
?>
<?php include '../classes/zoom.php';?>
<?php include '../classes/salary.php';?>
<?php include '../classes/position.php';?>
<?php include '../classes/employee.php';?>

<?php
    $employee = new employee();

    if(!isset($_GET['employeeid']) || $_GET['employeeid']==NULL){
        echo "<scipt>window.location('employeelist.php')</scipt>";
    }else{
        $id = $_GET['employeeid'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $updateEmployee = $employee->update_employee($_POST, $_FILES,$id);



    }

 ?>
            </div>

            <div id="layoutSidenav_content">
              <div class="container-fluid">
                <span>
                  <?php
                  if(isset($updateEmployee)){
                      echo $updateEmployee;
                  }
                 ?>
               </span>
              </div>
                <main>

                    <div class="container-fluid">
                        <h2 class="mt-4">Sửa thông tin nhân viên</h2>


                        <div class="row">


                            <div class="container-fluid">
                  <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">Nhân viên</li>
                  </ol>
                  <div class="container-fluid">
                  <?php
                    $get_employee_name = $employee->getemployeebyId($id);
                    if($get_employee_name){
                        while($result_employee=$get_employee_name->fetch_assoc()){
                  ?>
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Họ và Tên</label>
                        <div class="col-10">
                          <input class="form-control" type="text" value="<?php echo $result_employee['nvName']?>" name="emName" id="example-text-input">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Quê quán</label>
                        <div class="col-10">
                          <input class="form-control" type="text" value="<?php echo $result_employee['nvLocal']?>" name="emLocal" id="example-text-input">
                        </div>
                      </div>



                      <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Ngày sinh</label>
                        <div class="col-10">
                          <input class="form-control" type="date" value="<?php echo $result_employee['nvAge']?>" name="emBorn" id="example-date-input">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                          <input class="form-control" type="email" value="<?php echo $result_employee['nvEmail']?>" name="emEmail" id="example-email-input">
                        </div>
                      </div>



                      <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Bắt đầu làm</label>
                        <div class="col-10">
                          <input class="form-control" type="date" value="<?php echo $result_employee['nvYears']?>" name="emDate" id="example-date-input">
                        </div>
                      </div>



                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Vị trí</label>
                        <select class="custom-select custom-select-sm" name="emPosition">
                          <?php
                            $pos = new position();
                            $selectedPos =  $pos->getpositionbyId($result_employee['nvPosition'])
                          ?>
                          <?php
                              if($selectedPos){
                              $resultPos  = $selectedPos->fetch_assoc();
                          ?>
                          <option value="<?php echo $result_employee['nvPosition']; ?>" selected><?php echo $resultPos['positionName']; ?></option>
                        <?php } ?>
                          <?php
                                $poslist = $pos->show_position();
                                if($poslist){
                                    while($result = $poslist->fetch_assoc()){

                          ?>
                          <option value="<?php echo $result['positionId']; ?>"><?php echo $result['positionName'];?></option>
                          <?php
                                    }
                                }
                          ?>
                        </select>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Phòng ban</label>
                        <select class="custom-select custom-select-sm" name="emZoom">
                          <?php
                            $zoom = new zoom();
                            $selectedZoom =  $zoom->getzoombyId($result_employee['nvZoomId'])
                          ?>
                          <?php
                              if($selectedZoom){
                              $resultZoom  = $selectedZoom->fetch_assoc();
                          ?>
                          <option value="<?php echo $result_employee['nvZoomId']; ?>" selected><?php echo $resultZoom['zoomName']; ?></option>
                        <?php } ?>
                          <?php

                                $zoomlist = $zoom->show_zoom();
                                if($zoomlist){
                                    while($result = $zoomlist->fetch_assoc()){

                          ?>
                          <option value="<?php echo $result['zoomId']; ?>"><?php echo $result['zoomName'];?></option>
                          <?php
                                    }
                                }
                          ?>
                        </select>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Mức lương</label>
                        <select class="custom-select custom-select-sm" name="emSalary">
                          <?php
                            $sal = new salary();
                            $selectedSal =  $sal->getsalarybyId($result_employee['nvSalaryId'])
                          ?>
                          <?php
                              if($selectedSal){
                              $resultSal  = $selectedSal->fetch_assoc();
                          ?>
                          <option value="<?php echo $result_employee['nvSalaryId']; ?>" selected><?php echo $resultSal['salValue'] ?></option>
                        <?php } ?>
                          <?php
                                $salList = $sal->show_salary();
                                if($salList){
                                    while($result = $salList->fetch_assoc()){

                          ?>
                          <option value="<?php echo $result['salId']; ?>"><?php echo $result['salValue'];?></option>
                          <?php
                                    }
                                }
                          ?>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label for="exampleFormControlFile1">Chọn ảnh đại diện</label>
                        <input type="file" class="form-control-file" name="emImg" id="exampleFormControlFile1">
                      </div>
                      <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                          <img src="upload/<?php echo $result_employee['nvImg']?>" width=100><br>
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
