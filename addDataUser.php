<?php

$Username = $_POST['Username'];
$Password = $_POST['Password'];
$NameCustomer = $_POST['Firstname'];
$SurnameCustomer = $_POST['Lastname'];
$Address = $_POST['Address'];
$Phone = $_POST['Tel'];
$RoleID= "3";

//----- Connect DB
include("./connection.php");
$sql = "INSERT INTO user (Username,Password,NameUser,SurNameUser,Address,Phone,RoleID)
VALUES ('{$Username}','{$Password}','{$NameCustomer}','{$SurnameCustomer}','{$Address}','{$Phone}','{$RoleID}')";

//echo $sql;

$result = $con->query($sql);

if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 0.5; url=index.php");
    exit(0);
}
mysqli_close($con);
?>
