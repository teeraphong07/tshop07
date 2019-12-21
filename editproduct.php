<?php 
    session_start();
    include("connect.php");
    if(!isset($_GET['pid']) || $_GET['pid']==''){
        header("Location:index.php");
    }
    else{
        $pid = $_GET['pid'];
    }
    $sql="SELECT * FROM product WHERE id = $pid";
    $result = $conn->query($sql);
    if(!$result){
        echo "Error : ". $conn->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd = NULL;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TShop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">TShop</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">หน้าหลัก</a></li>
                    <li><a href="#">เกี่ยวกับ</a></li>
                    <li><a href="#">ติดต่อ</a></li>
                    <li><a href="newproduct.php">เพิ่มสินค้า</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                <li  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        ALL Product <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?menu=computer">gaminggear</a></li>
                        <li><a href="index.php?menu=monitor">Monitor</a></li>
                        <li><a href="index.php?menu=headphone">Headphone</a></li>
                    </ul>
                </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php 
                    if(isset($_SESSION['id'])){
                ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"role="button"aria-haspopup="true"aria-expanded="false">
                        <i class="glyphicon glyphicon-user"></i>
                            ยินดีต้อนรับ <?php echo $_SESSION ['name']?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">โปรไฟล์</a></li>
                            <li><a href="#">รายการสั่งซื้อ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-shopping-cart"></i>(0)
                        </a>
                    </li>
                    <?php 
                    }
                    else{
                    ?>
                    <li><a href="login.php">เข้าสู่ระบบ</a></li>
                    <li><a href="#">สมัครสมาชิก</a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
        <div class="container">
            <div class="row">
                <form action="updateproduct.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">Name :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtName" class="form-control" value="<?php echo $prd->name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">Description :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtDescription" class="form-control" value="<?php echo $prd->description; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">Price :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtPrice" class="form-control" value="<?php echo $prd->price; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">Strock :</label>
                        <div class="col-md-9">
                            <input type="text" name="txtStrock" class="form-control" value="<?php echo $prd->unitInstock; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">procudt</label>
                        <div class="col-md-9">
                            <div class="thumbnail">
                                <img src="img/<?php echo $prd->picture?>" alt="">
                            </div>
                            <input type="file" name="filepic" class="form-control-file" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="picture" class="control-label col-md-3">Picture : </label>  
                    <div class="col-md-9">
                        <input type="radio" name="rdoType" value="gaminggear" checked required> gaminggear</label>
                        <input type="radio" name="rdoType" value="monitor"> Monitor</label>
                        <input type="radio" name="rdoType" value="headphone"> Headphone</label>
                    </div>
                    </div>
                    <div class="from-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="hidden" name="hdnProductId" value="<?php echo $prd->id; ?>">
                            <input type="hidden" name="hdnProductPic" value="<?php echo $prd->picture; ?>">
                            <button type="summit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </from>
            </div>
        </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>