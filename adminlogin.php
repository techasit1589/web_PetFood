<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin - Dashboard</title>

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
        <style>
            body{
                font-family: 'Kanit', sans-serif;
            }
        </style>
        <style type="text/css">
            @media print{
                #accordionSidebar{
                    display: none; /* ซ่อน  */
                }
                #hid{
                    display: none; /* ซ่อน  */
                }
                #test{
                    width: auto;
                    height: auto;
                }
            }
        </style>

        <!--style="max-width: 92%-->
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php
            $page = 'one';
            include ("navbar.php");
            ?>


            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- เลือกปี -->
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle no-arrow" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-0 d-none d-lg-inline text-gray-600 medium">
                                        <?php
                                        if (isset($_GET['year'])) {
                                            echo "ปี " . $_GET['year'];
                                        } else {
                                            echo "ปี " . date("Y");
                                            ;
                                        }
                                        ?></span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <?php
                                include("./connection.php");
                                if (isset($_GET['year'])) {
                                    $meSqll = "SELECT * FROM dashboard where years =" . $_GET['year'];
                                    $Y = $_GET['year'];
                                } else {
                                    $meSqll = "SELECT * FROM dashboard where years =" . date("Y");
                                    $Y = date("Y");
                                }
                                $meQueryy = mysqli_query($con, $meSqll);
                                $meResult = mysqli_fetch_assoc($meQueryy);

                                $meSqlll = "SELECT * FROM dashboard ";
                                $meQueryyy = mysqli_query($con, $meSqlll);
                                ?>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="yearDropdown">
                                    <?php
                                    while ($meResultt = mysqli_fetch_assoc($meQueryyy)) {
                                        ?>
                                        <a class="dropdown-item" href="?year=<?php echo $meResultt['years']; ?>">
                                            <i class="text-gray-600 " style="padding-left:33px  "><?php echo $meResultt['years']; ?></i>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </li>

                        </ul>

                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                     aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                   placeholder="Search for..." aria-label="Search"
                                                   aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle no-arrow" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-0 d-none d-lg-inline text-gray-600 medium"><?php
                                        $Namee = $_SESSION["User"];
                                        echo $Namee;
                                        ?></span>
<!--                                    <img class="img-profile rounded-circle"
                                         src="#">-->
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>

                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">


                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h2 class="h3 mb-0 text-gray-800" id="hid">รายงานยอดขาย</h2>
                            <button id="hid" onclick="window.print();" class="btn btn-primary"> 
                                <i class="fas fa-download fa-sm text-white-50"></i> print</button>
                        </div>

                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 font-weight-bold text-primary text-uppercase mb-1">
                                                    ยอดขาย (เดือน)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $meResult[date("m")]; ?> บาท</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 font-weight-bold text-success  mb-1">
                                                    ยอดขาย (ปี)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                    $sum = $meResult['1'] + $meResult['2'] + $meResult['3'] + $meResult['4'] + $meResult['5'] + $meResult['6'] + $meResult['7'] + $meResult['8'] + $meResult['9'] + $meResult['10'] + $meResult['11'] + $meResult['12'];
                                                    echo $sum
                                                    ?> บาท</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <?php
                            $meSqlll = "SELECT * FROM orders WHERE succeed_status=1 ";
                            $meQueryyy = mysqli_query($con, $meSqlll);
                            $num = mysqli_num_rows($meQueryyy);

                            $my = "SELECT * FROM orders WHERE succeed_status=2 ";
                            $mys = mysqli_query($con, $my);
                            $nums = mysqli_num_rows($mys);
                            ?>
                            <div class="col-xl-3 col-md-6 mb-4" id="hid">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="้h4 font-weight-bold text-warning  mb-1">
                                                    รายการสั่งซื้อ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num; ?> Order</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="้h4  font-weight-bold text-warning  mb-1">
                                                    ขายสำเร็จ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nums; ?> Order</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 " id="test" >
                                <div class="card shadow mb-4" >
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">overview ยอดขาย ปี <?php echo $Y; ?></h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body" style="max-width: 90%" >
                                        <div >
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6" id="test">
                                <div class="card shadow mb-5">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">ยอดขายอาหารสัตว์</h6>

                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body" >
                                        <div >
                                            <canvas id="PieChart" ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row">

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>

                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white" id="hid">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>ติดต่อเรา 098-777777</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
                                const labels = [
                                    'มกราคม',
                                    'กุมภาพันธ์',
                                    'มีนาคม',
                                    'เมษายน',
                                    'พฤษภาคม',
                                    'มิถุนายน',
                                    'กรกฎาคม',
                                    'สิงหาคม',
                                    'กันยายน',
                                    'ตุลาคม',
                                    'พฤศจิกายน',
                                    'ธันวาคม',
                                ];
                                const data = {

                                    labels: labels,
                                    datasets: [{
                                            label: 'ยอดขาย',
                                            backgroundColor: 'rgb(255, 99, 132)',
                                            borderColor: 'rgb(255, 99, 132)',
                                            data: [<?php echo $meResult['1']; ?>, <?php echo $meResult['2']; ?>, <?php echo $meResult['3']; ?>, <?php echo $meResult['4']; ?>, <?php echo $meResult['5']; ?>, <?php echo $meResult['6']; ?>, <?php echo $meResult['7']; ?>, <?php echo $meResult['8']; ?>, <?php echo $meResult['9']; ?>, <?php echo $meResult['10']; ?>, <?php echo $meResult['11']; ?>, <?php echo $meResult['12']; ?>],
                                        }]
                                };
                                const config = {
                                    type: 'bar',
                                    data: data,

                                };

                                var myChart = new Chart(
                                        document.getElementById('myChart'),
                                        config
                                        );
        </script>

        <script >
            const data2 = {
                labels: [
                    'อาหารหมา <?php echo $meResult['dog']; ?>',
                    'อาหารแมว <?php echo $meResult['cat']; ?>',
                    'อาหารนก <?php echo $meResult['bird']; ?>',
                    'อาหารกระต่าย <?php echo $meResult['rabbit']; ?>',
                ],
                datasets: [{
                        label: 'ยอดขายอาหารสัตว์',
                        data: [<?php echo $meResult['dog']; ?>, <?php echo $meResult['cat']; ?>, <?php echo $meResult['bird']; ?>, <?php echo $meResult['rabbit']; ?>],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(252, 105, 0)'
                        ]
                    }]
            };
            const configg = {
                type: 'pie',
                data: data2
            };
            var myChart = new Chart(
                    document.getElementById('PieChart'),
                    configg
                    );

        </script>
    </body>

</html>