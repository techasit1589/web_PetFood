<?php
session_start();
isset($_GET['id']);
require 'connection.php';
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());
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
    $meSql = "SELECT * FROM product WHERE ProductID in ({$inputItems})";
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

        <script type="text/javascript">
            function updateSubmit() {
                if (document.formupdate.order_fullname.value == "") {
                    alert('โปรดใส่ชื่อนามสกุลด้วย!');
                    document.formupdate.order_fullname.focus();
                    return false;
                }
                if (document.formupdate.order_address.value == "") {
                    alert('โปรดใส่ที่อยู่ด้วย!');
                    document.formupdate.order_address.focus();
                    return false;
                }
                if (document.formupdate.order_phone.value == "") {
                    alert('โปรดใส่เบอร์โทรด้วย!');
                    document.formupdate.order_phone.focus();
                    return false;
                }
                document.formupdate.submit();
                return false;
            }
        </script>
    </head>
    <body>
        <?php
        include_once ("./navber_customer.php");
        ?>
        <h1></h1>
        <div class="container-fluid" style="padding-top: 90px">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Order</h6>
                </div>
                <div class="card-body">
                    <?php
                    if ($action == 'removed') {
                        echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
                    }
                    if ($meCount == 0) {
                        echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
                    } else {
                        ?>       
                        <?php
                        include("./connection.php");
                        $number = $_SESSION["userid"];
//                if (isset($_GET['ID'])) {
                        $sql = "Select * from user where UserID =" . $number;
                        $result = $con->query($sql);
                        while ($data = $result->fetch_object()) {
                            $userid = $data->UserID;
                            $Firstname = $data->NameUser;
                            $Lastname = $data->SurNameUser;
                            $address = $data->Address;
                            $tel = $data->Phone;
                            $id = $data->RoleID;
                            ?>
                            <form action="updateorder.php" method="post" name="formupdate" role="form" id="formupdate" onsubmit="JavaScript:return updateSubmit();">
                                <div class="form-group">
                                    <label for="exampleInputname">ชื่อ</label>
                                    <input type="text" class="form-control" id="order_fullname" value=<?php echo $Firstname; ?> style="width: 300px;" name="order_fullname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputsur">นามสกุล</label>
                                    <input type="text" class="form-control" id="order_surname" value=<?php echo $Lastname; ?> style="width: 300px;" name="order_surname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress">ที่อยู่</label>
                                    <textarea class="form-control" rows="3" style="width: 500px;" name="order_address" id="order_address"><?php echo $address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" id="order_phone" value=0<?php echo $tel; ?> style="width: 300px;" name="order_phone">
                                </div>
                                <div class="form-group">
                                    <input type="hidden"  id="UserId"  name="UserId" value=<?php echo $userid; ?> >
                                    
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>รหัสสินค้า</th>
                                                <th>ชื่อสินค้า</th>
                                                <th>รายละเอียด</th>
                                                <th>จำนวน</th>
                                                <th>ราคาต่อหน่วย</th>
                                                <th>จำนวนเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_price = 0;
                                            $num = 0;
                                            while ($meResult = mysqli_fetch_assoc($meQuery)) {
                                                $key = array_search($meResult['ProductID'], $_SESSION['cart']);
                                                $total_price = $total_price + ($meResult['priceProduct'] * $_SESSION['qty'][$key]);
                                                ?>
                                                <tr>
                                                    <td><?php echo $meResult['ProductID']; ?></td>
                                                    <td><?php echo $meResult['NameProduct']; ?></td>
                                                    <td><?php echo $meResult['info']; ?></td>
                                                    <td>
                                                        <?php echo $_SESSION['qty'][$key]; ?>
                                                        <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                                                        <input type="hidden" name="ProductID[]" value="<?php echo $meResult['ProductID']; ?>" />
                                                        <input type="hidden" name="priceProduct[]" value="<?php echo $meResult['priceProduct']; ?>" />
                                                        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>" />
                                                        <input type="hidden" name="pet_type[]" value="<?php echo $meResult['pet_type']; ?>" />
                                                    </td>
                                                    <td><?php echo number_format($meResult['priceProduct'], 2); ?></td>
                                                    <td><?php echo number_format(($meResult['priceProduct'] * $_SESSION['qty'][$key]), 2); ?></td>
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
                                                    <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                                                    <a href="cart.php" type="button" class="btn btn-danger btn-lg">ย้อนกลับ</a>
                                                    <button type="submit" class="btn btn-primary btn-lg">บันทึกการสั่งซื้อสินค้า</button>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div> 
            </div>
        </div> 

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