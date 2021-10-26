<header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index_new.php"><h2>FoodPet <em>Shop</em></h2></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">                          
                            <form class="d-flex" action="cart.php" >
                                <button class="btn btn-outline-dark" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    ตะกร้าสินค้า
                                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $meQty; ?></span>
                                </button>
                            </form>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-0 d-none d-lg-inline medium"><?php
                                        $Namee = $_SESSION["User"];
                                        echo $Namee;
                                        ?></span>
                                    <img class="img-profile rounded-circle"
                                         src="">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="user_profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ข้อมูลของฉัน
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="order_List.php">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        รายการสั่งซื้อ
                                    </a>
                                    <a class="dropdown-item" href="history_list.php">
                                        <i class="fas fa-history fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ประวัติการซื้อ
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>