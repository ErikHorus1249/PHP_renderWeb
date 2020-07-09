<?php
    include 'inc/header.php';
    include('PHPMailer-master/src/Exception.php');
    include('PHPMailer-master/src/OAuth.php');
    include('PHPMailer-master/src/PHPMailer.php');
    include('PHPMailer-master/src/POP3.php');
    include('PHPMailer-master/src/SMTP.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
?>

            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">Chào mừng admin <?php echo Session::get('adminName') ?> đã quay trở lại !</h3>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Quản trị nhân sự</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Bảng quản lý thông tin nhân viên
                            </div>
                            <!-- <div class="card-body">
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
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr>
                                            <tr>
                                                <td>Herrod Chandler</td>
                                                <td>Sales Assistant</td>
                                                <td>San Francisco</td>
                                                <td>59</td>
                                                <td>2012/08/06</td>
                                                <td>$137,500</td>
                                            </tr>
                                            <tr>
                                                <td>Rhona Davidson</td>
                                                <td>Integration Specialist</td>
                                                <td>Tokyo</td>
                                                <td>55</td>
                                                <td>2010/10/14</td>
                                                <td>$327,900</td>
                                            </tr>
                                            <tr>
                                                <td>Colleen Hurst</td>
                                                <td>Javascript Developer</td>
                                                <td>San Francisco</td>
                                                <td>39</td>
                                                <td>2009/09/15</td>
                                                <td>$205,500</td>
                                            </tr>
                                            <tr>
                                                <td>Sonya Frost</td>
                                                <td>Software Engineer</td>
                                                <td>Edinburgh</td>
                                                <td>23</td>
                                                <td>2008/12/13</td>
                                                <td>$103,600</td>
                                            </tr>
                                            <tr>
                                                <td>Jena Gaines</td>
                                                <td>Office Manager</td>
                                                <td>London</td>
                                                <td>30</td>
                                                <td>2008/12/19</td>
                                                <td>$90,560</td>
                                            </tr>
                                            <tr>
                                                <td>Quinn Flynn</td>
                                                <td>Support Lead</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2013/03/03</td>
                                                <td>$342,000</td>
                                            </tr>
                                            <tr>
                                                <td>Charde Marshall</td>
                                                <td>Regional Director</td>
                                                <td>San Francisco</td>
                                                <td>36</td>
                                                <td>2008/10/16</td>
                                                <td>$470,600</td>
                                            </tr>
                                            <tr>
                                                <td>Haley Kennedy</td>
                                                <td>Senior Marketing Designer</td>
                                                <td>London</td>
                                                <td>43</td>
                                                <td>2012/12/18</td>
                                                <td>$313,500</td>
                                            </tr>
                                            <tr>
                                                <td>Tatyana Fitzpatrick</td>
                                                <td>Regional Director</td>
                                                <td>London</td>
                                                <td>19</td>
                                                <td>2010/03/17</td>
                                                <td>$385,750</td>
                                            </tr>

                                            <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>New York</td>
                                                <td>27</td>
                                                <td>2011/01/25</td>
                                                <td>$112,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                            <?php
                            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                                $name = $_POST['name'];
                                $phone = $_POST['phone'];
                                $user_mail = $_POST['mail'];
                                $add = $_POST['add'];


                                $str_body = '
                                <p>
                                Cám ơn quý khách đã mua hàng tại Shop của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận sau 5 phút kể từ khi đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau 24 tiếng.
                                </p>
                            ';
                            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                            try {
                              //Server settings
                              $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                              $mail->isSMTP();                                      // Set mailer to use SMTP
                              $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                              $mail->SMTPAuth = true;                               // Enable SMTP authentication
                              $mail->Username = 'samizukichi1421999@gmail.com';                 // SMTP username
                              $mail->Password = '1421999hiro';                           // SMTP password
                              $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                              $mail->Port = 587;                                    // TCP port to connect to
                              //Recipients
                              $mail->CharSet = 'UTF-8';
                              $mail->setFrom('tuananh1421999@gmail.com', 'Quản trị viên cấp cao');
                              $mail->addAddress($user_mail);     // Add a recipient
                              // $mail->addAddress('ellen@example.com');               // Name is optional
                              // $mail->addReplyTo('info@example.com', 'Information');
                              $mail->addCC('quantri.ptit@gmail.com');
                              // $mail->addBCC('bcc@example.com');
                              //Attachments
                              // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                              //Content
                              $mail->isHTML(true);                                  // Set email format to HTML
                              $mail->Subject = 'Cảnh báo lỗi nhân viên';
                              $mail->Body    = $str_body;
                              $mail->AltBody = 'Chi tiết lỗi nhân viên';
                              if($mail->send()){
                                echo 'ok';
                              }
                              echo 'Bạn đã gửi mail thành công';
                            } catch (Exception $e) {
                              echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                            }

                            }
                            ?>
                            <div id="customer">
                                <form id = "frm" action="" method="post">
                                    <div class="row">
                                        <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                                            <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
                                        </div>
                                        <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                                            <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
                                        </div>
                                        <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                                            <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
                                        </div>
                                        <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                                            <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" required>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 col-lg-12 col-md-12 col-sm-12">
                                            <input type="submit" class="btn btn-primary" value="Lưu">
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                        <!-- <a  onclick = "byNow();">
                                            <b>Mua ngay</b>
                                            <span>Giao hàng tận nơi siêu tốc</span>
                                        </a> -->
                                    </div>
                                    <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                        <a href="#">

                                        </a>
                                    </div>
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