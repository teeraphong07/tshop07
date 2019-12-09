<?php
    session_start();
    include("connect.php");
    $pid  = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $unitInstock = $_POST['txtStrock'];
    $sql = "UPDATE product SET NAME ='$name', description='$description', price='$price', unitInstock='$unitInstock' WHERE id =$pid";
    echo $sql;
    $result=$conn->query($sql);
    if(!$result){
        echo "error: ".$conn->error;
    }
    else{
        header("location:index.php");
    }
?>