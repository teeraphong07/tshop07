<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php
        //รับข้อมูลจาก form 
        include("connect.php");
        if(isset($_POST['submit'])){ //check if it is posted back
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = md5($conn->real_escape_string($_POST['password']));
            $email = $_POST['email'];
            $sqlInsert = "INSERT INTO customer (username, password, firstname, lastname, email,active)VALUES('$username','$password','$firstname','$lastname','$email','0')";       
            $result = $conn ->query($sqlInsert);
            if($result){
               echo"<script>alert('Register Complete')<?script>";
               header("location:login.php");
            }
            else{
                echo"Error during :".$conn->error;
            }
        }
    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">สมัครสมาชิก</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="username" class="col-md-3">id</label>
                                <div class="col-md-9">
                                    <input type="text" name="id" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Firstname</label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Lastname</label>
                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Username</label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                        <div class="panel-footer">
                            <button type=submit class="btn btn-success btn-block" name="submit">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>