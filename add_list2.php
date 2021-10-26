<?php
$pet_type = $_POST['pet_type'];
$name = $_POST['name'];
$detail = $_POST['detail'];
$pirce = $_POST['pirce'];
$sum = $_POST['sum'];
$link=$_POST['link'];
//----- Connect DB
include("./connection.php");
//-image
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
//-sql
$sql = "INSERT INTO product (NameProduct,info,priceProduct,remaining,image,pet_type)
VALUES ('{$name}','{$detail}','{$pirce}','{$sum}','{$imagepay}','{$pet_type}')";

$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 1; url=add_list.php?pet=$pet_type&link=$link");
    exit(0);
}
mysqli_close($con);
?>


