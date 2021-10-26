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
        <link href="assets/css/templatemo-sixteen.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/owl.css" rel="stylesheet" type="text/css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
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
            .navbar .navbar-nav a.nav-link {
                 color: #000;
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <?php
        include_once ("./navber_customer.php");
        ?>

        <div class="container-fluid" style="padding-top: 90px">
            <div class="col">
                <div class="card shadow mb-4" >
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary" style="margin-top: 100px">ตะกร้าสินค้าของฉัน</h6>
                    </div>
                    <?php
                    if ($action == 'removed') {
                        echo "<div class=\"alert alert-warning\" >ลบสินค้าเรียบร้อยแล้ว</div>";
                    }
                    if ($meCount == 0) {
                        echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
                    } else {
                        ?>
                        <form action="updatecart.php" method="post" name="fromupdate">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ตัวอย่าง</th>
                                                <th>ชื่อสินค้า</th>
                                                <th>รายละเอียด</th>
                                                <th>จำนวน</th>
                                                <th>ราคาต่อจำนวน</th>
                                                <th>รวมจำนวนเงิน</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_price = 0;
                                            $num = 0;
                                            while ($meResult = mysqli_fetch_assoc($meQuery)) {
                                                $key = array_search($meResult['ProductID'], $_SESSION['cart']);
                                                $total_price = $total_price + ($meResult['priceProduct'] * $_SESSION['qty'][$key]);
                                                $test = $_SESSION['qty'][$key];
                                                $meResult['remaining'];
                                                ?>
                                                <tr>
                                                    <td><img src="images/<?php echo $meResult['image']; ?>" border="0"width="120" height="200"></td>
                                                    <td><?php echo $meResult['NameProduct']; ?></td>
                                                    <td><?php echo $meResult['info']; ?></td>
                                                    <td>
                                                        <span id="massage_username"></span>

                                                        <input id="new" type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;" min="1" max="<?php echo $meResult['remaining']; ?>" >
                                                        เหลือ <?php echo $meResult['remaining']; ?>
                                                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                                                    </td>
                                                    <td><?php echo number_format($meResult['priceProduct'], 2); ?></td>
                                                    <td><?php echo number_format(($meResult['priceProduct'] * $_SESSION['qty'][$key]), 2); ?></td>
                                                    <td align="center">
                                                        <a class="btn btn-danger btn-circle" href="removecart.php?itemId=<?php echo $meResult['ProductID']; ?>" >
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $num++;
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="8" style="text-align: right;">
                                                    <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price, 2); ?> บาท</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" style="text-align: right;">
                                                    <button type="submit" class="btn btn-info btn-lg" style="font-size: 25px">คำนวณราคาสินค้าใหม่</button> 
                                                    <a href="order.php" type="button" class="btn btn-primary btn-lg" style="font-size: 25px" >สังซื้อสินค้า</a>  
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                                ?>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div> 
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document" style="margin-top: 90px;">
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
