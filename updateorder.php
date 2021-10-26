<?php
session_start();
$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
if ($formid != $_POST['formid']) {
    echo "E00001!! SESSION ERROR RETRY AGAINT.";
} else {
    unset($_SESSION['formid']);
    if ($_POST) {
        include("./connection.php");
        $order_fullname = $_POST['order_fullname'];
        $order_surname = $_POST['order_surname'];
        $order_address = $_POST['order_address'];
        $order_phone = $_POST['order_phone'];
        $userId = $_POST['UserId'];                                                                                                                                                                                                     
        $total_price = $_POST['total_price'];
        $meSql = "INSERT INTO orders (order_date,order_fullname,order_surname, order_address, order_phone,UserID,bin_status,send_status,succeed_status,total_money) VALUES (NOW(),'{$order_fullname}','{$order_surname}','{$order_address}','{$order_phone}','{$userId}','โปรดส่งสลิป','-','1','$total_price')";
        $meQeury = mysqli_query($con, $meSql);
        if ($meQeury) {
            $order_id = mysqli_insert_id($con);
            for ($i = 0; $i < count($_POST['qty']); $i++) {
                $order_detail_quantity = $_POST['qty'][$i];
                $order_detail_price = $_POST['priceProduct'][$i];
                $product_id = $_POST['ProductID'][$i];
                $pet_type_id = $_POST['pet_type'][$i];
                $lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id, pet_type) ";
                $lineSql .= "VALUES (";
                $lineSql .= "'{$order_detail_quantity}',";
                $lineSql .= "'{$order_detail_price}',";
                $lineSql .= "'{$product_id}',";
                $lineSql .= "'{$order_id}',";
                $lineSql .= "'{$pet_type_id}'";
                $lineSql .= ") ";
                mysqli_query($con,$lineSql);
            }
            mysqli_close($con);
            unset($_SESSION['cart']);
            unset($_SESSION['qty']);
            header('location:index_new.php?a=order');
            echo $lineSql;
        } else {
            mysqli_close($con);
            header('location:index_new.php?a=orderfail');
        }
    }
}
?>