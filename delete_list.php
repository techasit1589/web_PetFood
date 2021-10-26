<?php
$id = $_GET['ID'];
$link = $_GET['link'];
$image = $_GET['image'];
//----- Connect DB
include("./connection.php");
$sql = "DELETE FROM product WHERE ProductID = $id";

$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    $flgDelete = unlink("images/$image");

    header("refresh: 0.5; url=$link&link=$link");
    exit(0);
}
mysqli_close($con);
?>
