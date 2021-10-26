<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">

                    <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                
                <li<?php echo ($page== 'one') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
<!--                <li class="nav-item active">-->
                    <a class="nav-link" href="adminlogin.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>รายงานยอดขาย</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li<?php echo ($page== 'two') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-user"></i>
                        <span>รายชื่อ</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">รายชื่อ:</h6>
                            <a class="collapse-item" href="customer_list.php">ลูกค้า</a>
                            <a class="collapse-item" href="delivery_list.php">พนักงานส่งของ</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li<?php echo ($page== 'three') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                       aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-store-alt"></i>
                        <span>สินค้าในคลัง</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">หมวดอาหารสัตว์:</h6>
                            <a class="collapse-item" href="list_petall.php">ทั้งหมด</a>
                            <a class="collapse-item" href="list_pet.php?pet=1&link=list_pet.php?pet=1">หมา</a>
                            <a class="collapse-item" href="list_pet.php?pet=2&link=list_pet.php?pet=2">แมว</a>
                            <a class="collapse-item" href="list_pet.php?pet=3&link=list_pet.php?pet=3">กระต่าย</a>
                            <a class="collapse-item" href="list_pet.php?pet=4&link=list_pet.php?pet=4">นก</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Addons
                </div>

                <!-- Nav Item - Charts -->
                <li<?php echo ($page== 'four') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
                    <a class="nav-link" href="sell_list.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>รายการสั่งซื้อของลูกค้า</span></a>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li<?php echo ($page== 'five') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
                    <a class="nav-link" href="hitstory_sell.php">
                        <i class="fas fa-history"></i>
                        <span>ประวิติการขาย</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li<?php echo ($page== 'six') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
                    <a class="nav-link" href="promotion.php">
                        <i class="fas fa-percentage"></i>
                        <span>โปรโมชั่น</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>


            </ul>

