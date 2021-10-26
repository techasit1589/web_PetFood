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

        <title>Admin - list_dog</title>

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


    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php
            $page = 'three';
            include_once ("navbar.php");
            ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php
                    include_once ("navbar_admin.php");
                    ?>
                    <!-- End of Topbar -->



                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                       

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">รายการอาหารหมาในคลัง</h6>
                                <a href="add_list.php?pet=<?php echo $_GET['pet']; ?>&link=<?php echo $_GET['link']; ?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-600">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">เพิ่ม</span>
                                </a>
                            </div>
                            <?php
                            include("./connection.php");
                            $meSqll = "SELECT * FROM product where pet_type=" . $_GET['pet'];
                            $meQueryy = mysqli_query($con, $meSqll);
                            ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ProductID</th>
                                                <th>ชื่อสินค้า</th>
                                                <th>ข้อมูล</th>
                                                <th>ราคา</th>
                                                <th>จำนวนคงเหลือ</th>
                                                <th>รูปสินค้า</th>
                                                <th>แก้ไขข้อมูล-รูป-ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($meResult = mysqli_fetch_assoc($meQueryy)) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $meResult['ProductID']; ?></td>
                                                    <td><?php echo $meResult['NameProduct']; ?></td>
                                                    <td><?php echo $meResult['info']; ?></td>
                                                    <td><?php echo $meResult['priceProduct']; ?></td>
                                                    <td><?php
                                                        if ($meResult['remaining'] == "0") {
                                                            echo "<div style=\"color: red\">0</div>";
                                                        } else {
                                                            $sum = $meResult['remaining'];
                                                            echo "<div style=\"color: green\">$sum</div>";
                                                        }
                                                        ?></td>
                                                    <td><img src="images/<?php echo $meResult['image']; ?>" border="0"width="120" height="200"></td>
                                                    <td align="center">
                                                        <a class="btn btn-primary btn-circle" title="แก้ไขข้อมูล" href="edit_list.php?id=<?php echo $meResult['ProductID']; ?>&link=<?php echo $_GET['link']; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <span class="class"></span>
                                                        <a class="btn btn-primary btn-circle" title="แก้ไขรูป" href="edit_listimage.php?id=<?php echo $meResult['ProductID']; ?>&link=<?php echo $_GET['link']; ?>">
                                                            <i class="far fa-image"></i>
                                                        </a>

                                                        <a class="btn btn-danger btn-circle" href="delete_list.php?ID=<?php echo $meResult['ProductID']; ?>&link=<?php echo $_GET['link']; ?>&image=<?php echo $meResult['image']; ?>"  >
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
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
        <!-- delete Modal-->


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


