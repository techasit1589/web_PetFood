<?php
$id = $_POST['id'];
$sum = $_POST['sum'];
//----- Connect DB
include("./connection.php");
$sql = "UPDATE product SET promotion='$sum' WHERE ProductID=$id";
//echo $sql;
$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 0.5; url=promotion.php");
    exit(0);
}
mysqli_close($con);
?>


