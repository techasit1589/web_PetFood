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
if (isset($_SESSION['cart']) and $itemCount > 0) {
    $itemIds = "";
    foreach ($_SESSION['cart'] as $itemId) {
        $itemIds = $itemIds . $itemId . ",";
    }
    $inputItems = rtrim($itemIds, ",");
    $meSql = "SELECT * FROM product WHERE ProductID  in ({$inputItems})";
    $meQuery = mysqli_query($con, $meSql);
    $meCount = mysqli_num_rows($meQuery);
} else {
    $meCount = 0;
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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <link href="assets/css/templatemo-sixteen.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/owl.css" rel="stylesheet" type="text/css"/>
        <style>
            body{
                font-family: 'Kanit', sans-serif;
                background: url(./images_logo/imagepet.jpg);
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
        <!-- Navigation-->
        <?php
        include_once ("navber_customer.php");
        ?>

        <div class="container-fluid" style="padding-top: 100px">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">ประวัติการสั่งซื้อของฉัน</h6>

                </div>
                <?php
                $number = $_SESSION["userid"];
                include("./connection.php");
                $meSqll = "SELECT * FROM orders WHERE UserID=" . $number . " AND succeed_status=2";
                $meQueryy = mysqli_query($con, $meSqll);
                ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="row">OrdersID</th>
                                    <th scope="row">ชื่อจริง</th>
                                    <th scope="row">นามสกุล</th>
                                    <th scope="row">ที่อยุ่</th>      
                                    <th scope="row">เบอร์โทรศัทพ์</th>
                                    <th scope="row">เวลาสั่งซื้อ</th>
                                    <th scope="row">รายการสินค้า</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($meResult = mysqli_fetch_assoc($meQueryy)) {
                                    ?>
                                    <tr>
                                        <td>000<?php echo $meResult['id']; ?></td>
                                        <td><?php echo $meResult['order_fullname']; ?></td>
                                        <td><?php echo $meResult['order_surname']; ?></td>
                                        <td><?php echo $meResult['order_address']; ?></td>
                                        <td><?php echo $meResult['order_phone']; ?></td>
                                        <td><?php echo $meResult['order_date']; ?></td>


                                        <td align="center">
                                            <a class="btn btn-outline-primary btn-default " href="order_List_2.php?OrderId=<?php echo $meResult['id']; ?>" role="button">
                                                <i class="fas fa-tasks"> ตรวจสอบ</i>
                                            </a>




                                    </tr>
                                    <?php
                                }
                                ?>                   
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> <!-- /container -->
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<?php
mysqli_close($con);
?>

