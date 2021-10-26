<?php
$id = $_GET['a'];

//----- Connect DB
include("./connection.php");
$sql = "DELETE FROM user WHERE UserID = $id";

$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 0.5; url=delivery_list.php");
    exit(0);
}
mysqli_close($con);
?>