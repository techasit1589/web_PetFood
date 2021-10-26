<?php

session_start();
$link=$_GET['link'];
$name=$_GET['name'];
$sel=$_GET['sel'];

$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
if ($_POST) {
    for ($i = 0; $i < count($_POST['qty']); $i++) {
        $key = $_POST['arr_key_' . $i];
        $_SESSION['qty'][$key] = $_POST['qty'][$i];
        header('location:cart.php');
    }
} else {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        $_SESSION['qty'][] = array();
    }

    if (in_array($itemId, $_SESSION['cart'])) {
        $key = array_search($itemId, $_SESSION['cart']);
        $_SESSION['qty'][$key] = $_SESSION['qty'][$key] + 1;
        if($sel==""){
            header("location:index_new.php?a=exists");
        } else {
            header("location:productview_ed.php?a=exists&sel=$sel");
        }
    } else {
        array_push($_SESSION['cart'], $itemId);
        $key = array_search($itemId, $_SESSION['cart']);
        $_SESSION['qty'][$key] = 1;
        if($sel==""){
            header("location:index_new.php?a=add");
        } else {
        header("location:productview_ed.php?a=add&sel=$sel");
    }
}
}
?>