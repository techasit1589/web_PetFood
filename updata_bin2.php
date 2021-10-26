<?php
$id = $_GET['ID'];
$image = $_GET['image'];
//----- Connect DB
include("./connection.php");
$sql = "UPDATE orders SET image_bin='',bin_status='สลิปไม่ถูกต้องรอส่งใหม่',send_status='-' WHERE id  =$id";
//echo $sql;
$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    $flgDelete = unlink("images_bin/$image");

    header("refresh: 0.5; url=sell_list.php");
    exit(0);
}
mysqli_close($con);
?>
