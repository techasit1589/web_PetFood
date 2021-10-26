<?php
session_start();
include("./connection.php");

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty'])) {
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem) {
        $int = (int) $meItem;
        $meQty = $meQty + $int;
    }
} else {
    $meQty = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FoodPetShop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <link href="assets/css/templatemo-sixteen.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/owl.css" rel="stylesheet" type="text/css"/>
        <style>
            body{
                font-family: 'Kanit', sans-serif;
                background: url(./images_logo/petsBack.jpg);
                background-repeat: no-repeat;
                background-size: cover ;
            }
            header {
                background-color: #ffffff;
            }
            
            .navbar .navbar-brand h2 {
                color: #000;
            }
            .navbar .navbar-brand h2 {
                color: #000;
            }
            .navbar .navbar-nav a.nav-link {
                 color: #000;
            }
            
        </style>
    </head>
    <body>
        <?php
        include_once ("./navber_customer.php");
        ?>
        
        <div class="container" style="padding-top: 100px">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">My profile</h6>
                        <a href="user_profile_edit.php" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-600">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">แก้ไข</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                        include("./connection.php");
                        $number = $_SESSION["userid"];
                        $sql = "Select * from user where UserID =" . $number;
                        $result = $con->query($sql);
                        while ($data = $result->fetch_object()) {
                            $userid = $data->UserID;
                            $Firstname = $data->NameUser;
                            $Lastname = $data->SurNameUser;
                            $address = $data->Address;
                            $tel = $data->Phone;
                            $id = $data->RoleID;
                            $image_profile = $data->image_profile;
                            if ($image_profile == "") {
                                ?>
                                <div class="text-center">
                                    <img src="images_profile/user.jpg" class="rounded" width="140px"  >
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="text-center">
                                    <img src="images_profile/<?php echo $image_profile ?>" class="rounded" width="140px"  >
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label for="exampleInputname">ชื่อ</label>
                                <input type="text" class="form-control" id="order_fullname" value=<?php echo $Firstname; ?>  name="order_fullname" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputsur">นามสกุล</label>
                                <input type="text" class="form-control" id="order_surname" value=<?php echo $Lastname; ?>  name="order_surname" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress">ที่อยู่</label>
                                <textarea class="form-control" rows="2"  name="order_address" id="order_address" readonly><?php echo $address; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="order_phone" value=0<?php echo $tel; ?>  name="order_phone" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden"  id="UserId"  name="UserId" readonly value=<?php echo $userid; ?> >
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>




        
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ยืนยันออกจากระบบ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">คุณต้องการออกจากระบบใช่หรือไม่?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                        <a class="btn btn-primary" href="logout.php">ออกจากระบบ</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php
mysqli_close($con);
?>

