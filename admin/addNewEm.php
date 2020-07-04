<?php
    include 'inc/header.php';
?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h2 class="mt-4">Thêm thông tin phòng ban mới</h2>


                        <div class="row">


                            <div class="container-fluid">
                  <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active">Thêm nhân viên</li>
                  </ol>
                  <div class="container-fluid">
                    <form>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Họ và Tên</label>
                        <div class="col-10">
                          <input class="form-control" type="text" value="Họ và Tên" id="example-text-input">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Quê quán</label>
                        <div class="col-10">
                          <input class="form-control" type="text" value="Hà Nội" id="example-text-input">
                        </div>
                      </div>



                      <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Ngày sinh</label>
                        <div class="col-10">
                          <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                          <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-tel-input" class="col-2 col-form-label">Số điện thoại</label>
                        <div class="col-10">
                          <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Bắt đầu làm</label>
                        <div class="col-10">
                          <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Hệ số lương</label>
                        <div class="col-10">
                          <input class="form-control" type="number" value="42" id="example-number-input">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Vị trí</label>
                        <select class="custom-select custom-select-sm">
                          <option selected>Open this select menu</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Phòng ban</label>
                        <select class="custom-select custom-select-sm">
                          <option selected>Open this select menu</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>

                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Mức lương</label>
                        <select class="custom-select custom-select-sm">
                          <option selected>Open this select menu</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                      <div class="form-group row">
                        <label for="exampleFormControlFile1">Chọn ảnh đại diện</label>
                        <input type="file" class="form-control-file"  id="exampleFormControlFile1">
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
