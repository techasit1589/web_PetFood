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

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <title>FoodPetShop</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min_2.css" rel="stylesheet" type="text/css"/>
        

        <!-- Additional CSS Files -->
        <!--        <link rel="stylesheet" href="assets/css/fontawesome.css">-->
        <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
        <link rel="stylesheet" href="assets/css/owl.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <style>
            body{
                font-family: 'Kanit', sans-serif;
            }
        </style>
    </head>

    <body>

        <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>  
        <!-- ***** Preloader End ***** -->

        <!-- Navber-->
        <?php
        include_once ("./navber_customer.php");
        ?>

        <!-- Page Content -->
        <div class="page-heading products-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-content">
                            <h4>อาหารสัตว์</h4>
                            <h2>ประหยัด ราคาถูก</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($action == 'exists') {
            echo "<div class=\"alert alert-warning\">เพิ่มจำนวนสินค้าแล้ว</div>";
        }
        if ($action == 'add') {
            echo "<div class=\"alert alert-success\">เพิ่มสินค้าลงในตะกร้าเรียบร้อยแล้ว</div>";
        }
        if ($action == 'order') {
            echo "<div class=\"alert alert-success\">สั่งซื้อสินค้าเรียบร้อยแล้ว</div>";
            echo "<div class=\"alert alert-danger\">โปรดส่งสลิปที่รายการสั้งซื้อไปที่ <a href='order_List.php'>รายการสั้งซื้อ</a></div>";
        }
        if ($action == 'orderfail') {
            echo "<div class=\"alert alert-warning\">สั่งซื้อสินค้าไม่สำเร็จ มีข้อผิดพลาดเกิดขึ้นกรุณาลองใหม่อีกครั้ง</div>";
        }
        ?>


        <div class="products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filters">
                            <ul>
                                <li class="active" data-filter="*">อาหารทั้งหมด</li>
                                <li data-filter=".1">อาหารหมา</li>
                                <li data-filter=".2">อาหารแมว</li>
                                <li data-filter=".3">อาหารกระต่าย</li>
                                <li data-filter=".4">อาหารนก</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="filters-content">
                            <div class="row grid">
                                <?php
                                $meSql = "SELECT * FROM product ";
                                $meQuery = mysqli_query($con, $meSql);
                                while ($meResult = mysqli_fetch_assoc($meQuery)) {
                                    ?>
                                    <div class="col-lg-4 col-md-4 all <?php echo $meResult['pet_type']; ?>">
                                        <div class="product-item">
                                            <?php
                                            if ($meResult['best_sell'] == '1') {
                                                ?>
                                                <div class="badge bg-warning text-white position-absolute" style="top: 0.5rem; right: 1.2rem"><i class="far fa-star"> ขายดี</i></div>
                                                <?php
                                            }
                                            ?>
                                            <img src="images/<?php echo $meResult['image']; ?>" style="margin-left:35%">
                                            <div class="down-content">
                                                <h4><?php echo $meResult['NameProduct']; ?></h4>
                                                <?php
                                                $new = (int) $meResult['priceProduct'];
                                                $pro = (int) $meResult['promotion'];
                                                if ($pro != 0) {
                                                    $sum = $new - ($new * $pro / 100);
                                                    echo "<h5 class=\"text-decoration-line-through\" style=\"color: red;\">$new</h5><h6> $sum บาท </h6>";
                                                } else {
                                                    echo "<h6 class=\"text-decoration-line-through\"><br></h6><h6 >$new บาท </h6>";
                                                }
                                                ?> 
                                                <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur. <?php echo $meResult['info']; ?></p>
                                                
                                                <?php if ($meResult['remaining'] <= 0) { ?>

                                                    <div class="card-footer border-top-0 bg-transparent">
                                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto disabled" href="#">สินค้าหมด</a></div>
                                                    </div>
                                                <?php } else { ?>

                                                    <div class="card-footer  border-top-0 bg-transparent">
                                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="updatecart.php?itemId=<?php echo $meResult['ProductID']; ?><?php echo "&sel=" . $_GET['sel'] ?>">หยิบใส่ตะกร้า</a></div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    
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


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-content">
                            <p>ติดต่อเรา 098-777777
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min_1.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle_1.min.js" type="text/javascript"></script>


        <!-- Additional Scripts -->
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/owl.js"></script>
        <script src="assets/js/slick.js"></script>
        <script src="assets/js/isotope.js"></script>
        <script src="assets/js/accordions.js"></script>


        <script language = "text/Javascript">
            cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
            function clearField(t) {                   //declaring the array outside of the
                if (!cleared[t.id]) {                      // function makes it static and global
                    cleared[t.id] = 1;  // you could use true and false, but that's more typing
                    t.value = '';         // with more chance of typos
                    t.style.color = '#fff';
                }
            }
        </script>


    </body>

</html>



