<?php
if(isset($_POST)&&!empty($_POST)){
    if(isset($_POST['function'])&& $_POST['function']=='checkusername' ){
        include("./connection.php");
        $username = $_POST['value'];
        $sql ="SELECT * FROM user WHERE Username='$username' ";
        $meQuery = mysqli_query($con,$sql);
        $row= mysqli_num_rows($meQuery);
        echo $row;
    }
}

?>

