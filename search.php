<?php 
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <a href="index.php"><title>TShop</title></a>
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
                    <li><a href="index.php">หน้าหลัก</a></li>
                    <li><a href="#">เกี่ยวกับ</a></li>
                    <li><a href="#">ติดต่อ</a></li>
                    <li><a href="search.php">ค้นหา</a></li>
                    <li><a href="newproduct.php">เพิ่มสินค้า</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                <li  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        ALL Product <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="showproduct.php?category=1">gaminggear</a></li>
                        <li><a href="showproduct.php?category=2">Monitor</a></li>
                        <li><a href="showproduct.php?category=3">Headphone</a></li>
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
                <h2>Search Product</h2>
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="col-md-10">
                                <input type="text" class="form-control" name="txtSearch" placeholder="กรอกข้อมูล"></div>
                                <div class="col-md-2">
                            <button type="summit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>  
            </div>
        </div>
    <?php
        if(isset($_POST['submit'])){
            $search = $_POST['txtSearch'];
            $sql ="SELECT * FROM product WHERE name LIKE '%$search%' ";
    ?>
        <div class="row">
            <div class="col-md-12">
            <?php  
                $result = $conn->query($sql);
                if(!$result){
                    echo "Error during data retrieval";
                }
                else{
                    while($prd=$result->fetch_object()){
                ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id; ?>&category=<?php echo $id;?>">
                        <img src="img/<?php echo $prd->picture;?>" alt="">
                    </a>
                    <div class="caption">
                        <h3><?php echo $prd->name?></h3>
                            <p><?php echo $prd->description?></p>
                                <p><strong>Price: <?php echo $prd->price?></strong></p>
                                <p><a href="#" class="btn btn-success">Read more</a></p>
                                <p><a href="#" class="btn btn-success">Add to Basket</a>
                                
                                <a href="editproduct.php?pid=<?php echo $prd->id?>"
                                class="btn btn-warning">
                                    <i class="glyphicon glyphicon-pencil"></i>Edit                     
                                </a>
                                <a href="deleteproduct.php?pid=<?php echo $prd->id?>"
                                class="btn btn-danger lnkdelete" >
                                    <i class="glyphicon glyphicon-trash"></i>Delete                     
                                </a>
                                </p>
                    </div>
                </div>
           </div>
            <?php
                }
            }
           ?>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>