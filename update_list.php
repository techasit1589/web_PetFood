<?php
$id = $_POST['id'];
$link = $_GET['link'];
$name = $_POST['name'];
$detail = $_POST['detail'];
$pirce = $_POST['pirce'];
$sum = $_POST['sum'];
//----- Connect DB
include("./connection.php");

//-sql
$sql = "UPDATE product SET NameProduct='$name',info='$detail',priceProduct=$pirce,remaining=$sum  WHERE ProductID=$id";

$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 1; url=edit_list.php?id=$id&link=$link");
    exit(0);
}
mysqli_close($con);
?>


