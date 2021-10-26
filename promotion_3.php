<?php
$id = $_GET['id'];
//----- Connect DB
include("./connection.php");
$sql = "UPDATE product SET promotion='0' WHERE ProductID=$id";
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

