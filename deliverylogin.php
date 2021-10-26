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

        <title>Deliverry</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                #dataTable_info{
                    display: none; /* ซ่อน  */
                }
                #dataTable_paginate{
                    display: none; /* ซ่อน  */
                }
                #dataTable_length{
                    display: none; /* ซ่อน  */
                }
                #dataTable_filter{
                    display: none; /* ซ่อน  */
                }
            }
        </style>


    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php
            $page = 'two';
            include_once ("./nav_deliver.php");
            ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column" >

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php
                    $user = 'delivery';
                    include_once ("navbar_admin.php");
                    ?>
                    <!-- End of Topbar -->



                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h2 class="h3 mb-0 text-gray-800" id="hid">การสั่งซื้อ</h2>
                            <button id="hid" onclick="window.print();" class="btn btn-primary"> 
                                <i class="fas fa-download fa-sm text-white-50"></i> print</button>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Order</h6>
                            </div>
                            <?php
                            include("./connection.php");
                            $meSqll = "SELECT * FROM orders WHERE bin_status='การชำระถูกต้อง' and succeed_status=1 ";
                            $meQueryy = mysqli_query($con, $meSqll);
                            ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>OrderID</th>
                                                <th>ID_ลูกค้า</th>
                                                <th>ชื่อจริง</th>
                                                <th>นามสกุล</th>
                                                <th>ที่อยู่</th>
                                                <th>เบอร์โทร</th>
                                                <th>เวลาสั่งซื้อ</th>
                                                <th>รายละเอียด</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($meResult = mysqli_fetch_assoc($meQueryy)) {
                                                ?>

                                                <tr>
                                                    <td>000<?php echo $meResult['id']; ?></td>
                                                    <td>00<?php echo $meResult['UserID']; ?></td>
                                                    <td><?php echo $meResult['order_fullname']; ?></td>
                                                    <td><?php echo $meResult['order_surname']; ?></td>
                                                    <td><?php echo $meResult['order_address']; ?></td>
                                                    <td><?php echo $meResult['order_phone']; ?></td>
                                                    <td><?php echo $meResult['order_date']; ?></td>
                                                    <td align="center">
                                                        <?php
                                                        $detail = "SELECT * FROM order_details WHERE order_id=".$meResult['id'];
                                                        $detail2 = mysqli_query($con, $detail);
                                                        while ($detail3 = mysqli_fetch_assoc($detail2)) {
                                                            echo "ID-".$detail3['product_id']." จำนวน ".$detail3['order_detail_quantity']."<br>";
                                                        }
                                                        ?>
                                                    </td>

                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
    </body>
</html>
<?php
mysqli_close($con);
?>

