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

        <title>Admin - Customer_list</title>

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
            $page = 'two';
            include_once ("navbar.php");
            ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
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
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ข้อมูลฉัน
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
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

                                     
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">เพิ่มพนักงาน</h6>
                                <a href="delivery_list.php" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-600">
                                        <i class="fas fa-angle-left"></i>
                                    </span>
                                    <span class="text">ย้อนกลับ</span>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <form name="add_delivery"  method="post" action="delivery_add_2.php" >
                                        <div class="form-group">
                                            <label for="Username" class="text-dark">Username</label><br>
                                            <input type="text" id="Username" required name="Username"  class="form-control" autocomplete="off" >
                                            <span id="massage_username"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password" class="text-dark">Password</label><br>
                                            <input type="password" id="name" required name="Password"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="text-dark">ชื่อจริง</label><br>
                                            <input type="text" id="name" required name="name"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="surname" class="text-dark">นามสกุล</label><br>
                                            <input type="text" id="pirce" required name="surname"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="text-dark">ที่อยู่</label><br>
                                            <textarea class="form-control" rows="3" style="max-width: 1588px;" name="address" id="detail" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tel" class="text-dark">เบอร์โทร</label><br>
                                            <input type="number" id="sum" required name="tel" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-outline-primary btn-md btn-save " value="เพิ่ม">
                                        </div>
                                        <br>
                                    </form> 
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
        <script>
            $('#Username').keyup(function () {
//                console.log($(this).val())
                var value = $(this).val();
                if (value == "") {
                    $('#massage_username').html('โปรดใส่ชื่อผู้ใช้');
                    $('#massage_username').addClass('text-danger');
                    
                    $('#massage_username').removeClass('text-success');
                    $('.btn-save').attr('disabled',true)
                } else {
                    $('.btn-save').attr('disabled',false)
                    $.ajax({
                        method: 'post',
                        url: 'function_ajax.php',
                        data: {value: value, function: 'checkusername'},
                        success: function (data) {
//                            alert(data)
                            if (data > 0) {
                                $('#massage_username').html('มี UserName นี้แล้ว');
                                $('#massage_username').addClass('text-danger');
                                
                                $('#massage_username').removeClass('text-success');
                            } else {
                                $('#massage_username').html('สามารถใข้ UserName นี้ได้');
                                $('#massage_username').addClass('text-success');
                                
                                $('#massage_username').removeClass('text-danger');
                            }
                        }
                    })
                }
            });

        </script>
    </body>
</html>




