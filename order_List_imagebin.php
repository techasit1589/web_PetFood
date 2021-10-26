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
    </head>
    <body>
        <!-- Navigation-->
       <?php
        include_once ("navber_customer.php");
        ?>
        <h1></h1>

        <div class="container-fluid">
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">ส่งสลิป</h6>
                    <a href="javascript:history.back(1)" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-600">
                                        <i class="fas fa-angle-left"></i>
                                    </span>
                                    <span class="text">ย้อนกลับ</span>
                                </a>
                </div>
                <div class="card-body">
                    <form action="upimage.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="text">รูปใบแจ้งชำระเงิน</label>
                            <input type="file" class="form-control" data-browse-on-zone-click="true" name="image" placeholder="รูป" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        <h1></h1>
                    </form>
                </div>
                </div>
            </div>
            
        </div> <!-- /container -->
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

