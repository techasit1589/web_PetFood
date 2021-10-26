<?php
$ID_bin = $_GET['id'];
//$imagepay = $_POST['imagepay'];
//----- Connect DB
include("./connection.php");

//upload image 
$ext= pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
$new_image_name='img_'. uniqid().".".$ext;
$Image_path ="images_bin/";
$upload_path = $Image_path.$new_image_name;
//uploading
$success= move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
if($success==FAlSE){
    echo "ไม่สามารถอัพโหลดรูปได้";
    exit();
}
$imagepay=$new_image_name;

$sql = "UPDATE orders SET image_bin='$imagepay',bin_status='รอตรวจสอบสลิป' WHERE id=$ID_bin";
//echo $sql;
$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 1; url=order_List.php");
    exit(0);
}
mysqli_close($con);
?>