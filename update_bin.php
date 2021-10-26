<?php
$id = $_GET['ID'];
//----- Connect DB
include("./connection.php");
$sql = "UPDATE orders SET bin_status='การชำระถูกต้อง',send_status='จัดส่ง' WHERE id  =$id";

//echo $sql;
$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 1; url=sell_list.php");
    exit(0);
}
mysqli_close($con);
?>
