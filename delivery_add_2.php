<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$RoleID= "2";

//----- Connect DB
include("./connection.php");
$sql = "INSERT INTO user (Username,Password,NameUser,SurNameUser,Address,Phone,RoleID)
VALUES ('{$Username}','{$Password}','{$name}','{$surname}','{$address}','{$tel}','{$RoleID}')";

//echo $sql;

$result = $con->query($sql);

if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 0.5; url=delivery_list.php");
    exit(0);
}
mysqli_close($con);
?>

