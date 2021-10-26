<?php
session_start();
include("./connection.php");
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
        <!--        <link href="assets/css/fontawesome.css" rel="stylesheet" type="text/css"/>-->
        <link href="assets/css/templatemo-sixteen.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/owl.css" rel="stylesheet" type="text/css"/>

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

        <!-- Header -->
        <header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php"><h2>FoodPet <em>Shop</em></h2></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="Register.php">สมัครสมาชิก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">ล็อกอิน</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
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

        <div class="latest-products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>อาหารสัตว์ทั้งหมด</h2>
                            <a href="productview.php">ดูรายการอาหารทั้งหมด <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <?php
                    $meSql = "SELECT * FROM product Orders LIMIT 6";
                    $meQuery = mysqli_query($con, $meSql);
                    while ($meResult = mysqli_fetch_assoc($meQuery)) {
                        ?>
                        <div class="col-lg-4 col-md-4">
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
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto disabled" href="login.php">สินค้าหมด</a></div>
                                        </div>
                                    <?php } else { ?>

                                        <div class="card-footer  border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="login.php">หยิบใส่ตะกร้า</a></div>
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
<?php
mysqli_close($con);
?>
