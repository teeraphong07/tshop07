<?php
    session_start();
    include("connect.php");

    $pid  = $_POST['hdnProductId'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $unitInstock = $_POST['txtStrock'];
    //update picture
    $picture=$_POST['hdnProductPic'];
    //update picture

    if($_FILES["filepic"]["name"]!=""){
        
        $picture = $_FILES["filepic"]["name"];

        move_uploaded_file($_FILES["filepic"]["tmp_name"],"img/".$_FILES["filepic"]["name"]);
    }
    $sql = "UPDATE product SET NAME ='$name', description='$description', price='$price', unitInstock='$unitInstock', picture='$picture' WHERE id =$pid";
    echo $sql;
    $result=$conn->query($sql);
    if(!$result){
        echo "error: ".$conn->error;
    }
    else{
        header("location:index.php");
    }
?>