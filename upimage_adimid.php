<?php
$ID = $_GET['id'];
$link = $_GET['link'];

//----- Connect DB
include("./connection.php");

//upload image 
$ext= pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
$new_image_name='img_'. uniqid().".".$ext;
$Image_path ="images/";
$upload_path = $Image_path.$new_image_name;
//uploading
$success= move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
if($success==FAlSE){
    echo "ไม่สามารถอัพโหลดรูปได้";
    exit();
}
$imagepay=$new_image_name;

$sql = "UPDATE product SET image	='$imagepay' WHERE ProductID =$ID";

$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 1; url=edit_listimage.php?id=$ID&link=$link");
    exit(0);
}
mysqli_close($con);
?>