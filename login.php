<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบบ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php
        include_once("connect.php");
        if(isset($_POST['submit'])){
            //mysql_escape_string
            $username = $conn-> real_escape_string ($_POST['username']);
            $password = md5($conn->real_escape_string($_POST['password']));

            $sql = "SELECT * FROM customer WHERE username ='$username' AND password ='$password'";

            //mysql_query
            $result = $conn->query($sql);
            //print_r($result);
            if($result->num_rows>0){
                //เก็บค่าลง session
                //fetch data
                $row=$result->fetch_array();   //mysql fetch array
                $_SESSION['id']=$row['id'];
                $_SESSION["name"]=$row['firstname'] . " " . $row['lastname'];
                $_SESSION['username']=$row['username'];
                header("location: index.php");
                //วาปไปหน้าแรก
               // header('location: index.php');
            }
        }
    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">กรุณาเข้าสู่ระบบ</div>
                        <div class="panel-body">
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