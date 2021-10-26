<?php
//----- Connect DB
include("./connection.php");
$id = $_GET['id'];
$sum = "SELECT total_money FROM orders WHERE id=$id";
$sum2 = mysqli_query($con, $sum);
$meResult = mysqli_fetch_assoc($sum2);

$m = date("m");
$Y = date("Y");
$dashboard = "SELECT * FROM dashboard WHERE dashboard.years=$Y";
$dashboard2 = mysqli_query($con, $dashboard);
$meResult2 = mysqli_fetch_assoc($dashboard2);
$dashboard3 = $meResult2[$m];
$sum3 = $meResult['total_money'];
$sql = "UPDATE orders SET succeed_status='2' WHERE id =$id";
$sql2 = "UPDATE dashboard SET `$m`='$dashboard3'+'$sum3' WHERE dashboard.years=$Y";

$pet = "SELECT * FROM order_details WHERE order_id=$id";
$result = $con->query($pet);

$test2 = "SELECT * FROM dashboard WHERE dashboard.years=$Y";
$test3 = mysqli_query($con, $test2);
$meResult3 = mysqli_fetch_assoc($test3);
//เพิ่มปี
$newyears = "SELECT years FROM dashboard ORDER BY dashboard.years DESC";
$newyears2 = mysqli_query($con, $newyears);
$newyears3 = mysqli_fetch_assoc($newyears2);
//echo $newyears3['years'];
if($newyears3['years']!=$Y){
    $newspl="INSERT INTO dashboard (`years`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `dog`, `cat`, `bird`, `rabbit`) VALUES ('$Y', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');";
    $result5 = $con->query($newspl);
//    echo $newspl;
}
if ($result->num_rows > 0) {
    $num = mysqli_num_rows($result);
    while ($row = $result->fetch_assoc()) {
        $type = $row["pet_type"];
        $product_id = $row["product_id"];
        $product = "SELECT remaining FROM product WHERE ProductID=$product_id";
        $product2 = mysqli_query($con, $product);
        $product3 = mysqli_fetch_assoc($product2);
        $product4 = $product3['remaining'];
        if ($type == 1) {
            $Pett = 'dog';
        } elseif ($type == 2) {
            $Pett = 'cat';
        } elseif ($type == 3) {
            $Pett = 'rabbit';
        } elseif ($type == 4) {
            $Pett = 'bird';
        }
        $test4 = $meResult2[$Pett];
        $order = $row["order_detail_quantity"];
        $test = "UPDATE dashboard SET $Pett='$test4'+'$order' WHERE years=$Y";
        $test2 = "UPDATE product SET remaining='$product4'-'$order' WHERE ProductID=$product_id";
       $result3 = $con->query($test);
       $result4 = $con->query($test2);
//        echo $test . "<br>";
//        echo $test2 . "<br>";
    }
} else {
    echo "0 results";
}
$result = $con->query($sql);
$result2 = $con->query($sql2);
if (!isset($result)) {
    echo 'การบันทึกผิดพลาด';
} else {
    header("refresh: 0.5; url=order_List.php");
    exit(0);
}
mysqli_close($con);
?>

