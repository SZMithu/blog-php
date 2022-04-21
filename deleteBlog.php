<?php
@include './componants/header.php';
@include './database/configer.php';
if (!isset($_SESSION['name'])) {
    header("Location: signin.php");
}


if(isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];

    $query = "DELETE FROM blogs WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: dashboard.php");
    }
}
