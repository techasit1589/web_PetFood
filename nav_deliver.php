<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="deliverylogin.php">
        
        <div class="sidebar-brand-text mx-3">คนส่งของ <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    

    <!-- Nav Item - Dashboard -->

    <li<?php echo ($page == 'one') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
        <!--                <li class="nav-item active">-->
        <a class="nav-link" href="delivery_profile.php">
            <i class="fas fa-fw fa-user"></i>
            <span>ประวัติฉัน</span></a>
    </li>
    <li<?php echo ($page == 'two') ? " class=\"nav-item active\" " : " class=\"nav-item \" "; ?>>
        <a class="nav-link" href="deliverylogin.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>รายการสั่งซื้อของลูกค้า</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>


