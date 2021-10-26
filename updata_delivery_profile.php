<?php
include("./connection.php");
$fullname = $_POST['fullname'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$phone= $_POST['phone'];
$image= $_FILES['image'];

$id = $_POST['id'];
$ext= pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
if($ext!=""){
$ext= pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
$new_image_name='img_'. uniqid().".".$ext;
$Image_path ="images_profile/";
$upload_path = $Image_path.$new_image_name;
//uploading
$success= move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);

$imagepay=$new_image_name;
$sql2 ="SELECT image_profile FROM user where UserID=$id";
$sql3 = mysqli_query($con, $sql2);
$meResult = mysqli_fetch_assoc($sql3);
$imagedelete=$meResult['image_profile'];
if($imagedelete!=""){
    $flgDelete = unlink("images_profile/$imagedelete");
}
$sql = "UPDATE user SET NameUser='$fullname',SurNameUser='$surname',Address='$address',Phone='$phone',image_profile='$imagepay' WHERE UserID=$id";

} else {
$sql = "UPDATE user SET NameUser='$fullname',SurNameUser='$surname',Address='$address',Phone='$phone' WHERE UserID=$id";

}
//----- Connect DB

$result = $con->query($sql);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 1; url=user_profile.php");
    exit(0);
}
mysqli_close($con);
?>


