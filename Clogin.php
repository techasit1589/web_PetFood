<?php
session_start();
if (isset($_POST['Username'])) {
    //connection
    include("./connection.php");
    //รับค่า user & password
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    //query 
    $sql = "SELECT * FROM user Where Username='" . $Username . "' and Password='" . $Password . "' ";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);
        $_SESSION["userid"] = $row["UserID"];
        $id= $_SESSION["userid"];
        $_SESSION["User"] = $row["NameUser"];
        $_SESSION["last"] = $row["SurNameUser"];
        $_SESSION["RoleID"] = $row["RoleID"];

        if ($_SESSION["RoleID"] == "1") { //ถ้าเป็น เจ้าของ
            Header("Location: adminlogin.php");
        }
        if ($_SESSION["RoleID"] == "2") { //ถ้าเป็น ของส่งของ
            Header("Location: delivery_profile.php");
        }

        if ($_SESSION["RoleID"] == "3") {  //ถ้าเป็น สมาชิก
            Header("Location: index_new.php");
        }
    } else {
        echo "<script>";
        echo "alert(\" Username หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {


    Header("Location: login.php"); //user & password incorrect back to login again
}
?>
