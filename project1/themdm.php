<?php
require('./connect.php'); 
?>
<?php
    $errors = [];
    if(isset($_POST['add'])){
        $name = $_POST["name"];
        $status = $_POST['status'];

        if($name == "") {
            $errors[] =  "Vui lòng nhập tên danh mục!";
        }     
        if(count($errors) == 0 ){
            $sql ="INSERT INTO categories(name, status) VALUES('$name', '$status')";
            $query=mysqli_query($conn, $sql);
            header("location: quanly.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tin tức</title>
    <link href="css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="image/logo.png" alt="img" class="fh5co_logo_width"/>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <div class="text-center d-inline-block">
                    
                        <a class="fh5co_display_table"><div class="fh5co_verticle_middle">
                                <form>
                                    <input class="text-search" type="search" placeholder="Tìm kiếm bài viết">
                                    <i class="fa fa-search"></i>
                                </form>
                            </div>
                        </a>
                </div>
                <!--<div class="d-inline-block text-center"><img src="images/country.png" alt="img" class="fh5co_country_width"/></div>-->
                <div class="d-inline-block text-center dd_position_relative ">
                    <select class="form-control fh5co_text_select_option">
                        <option>Tiếng Việt </option>
                        <option>English </option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    $sql = "SELECT * FROM categories";
                    $query = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows(mysqli_query($conn, $sql));
                ?>
                <ul class="navbar-nav mr-auto" style="overflow: hidden;">
                    <li class="nav-item active">
                        
                        <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="quanly.php">Quản lý <span class="sr-only">(current)</span></a>
                    </li>
                    <?php 
                    while ($row = mysqli_fetch_array($query)) :
                     ?>
                  
                    <li class="nav-item ">
                        <a href="categories.php?id=<?php echo $row['id']; ?>" class="nav-link"><?php echo $row['name']; ?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>

                <!-- Menu -->
                <nav>
                <?php
                    $sql = "SELECT * FROM categories";
                    $query = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows(mysqli_query($conn, $sql));
                    ?>
                <button type="button" class="toggle-btn" onclick="toggleMenu()" style="height: 40px; border-color: rgba(0, 0, 0, 0.1);">
                <span class="fa fa-bars"></span>
                </button>
                    <ul class="menu" id="menu">
                    <?php 
                    while ($row = mysqli_fetch_array($query)) :
                     ?>
                  
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><?php echo $row['name']; ?></a>
                    </li>
                    <?php endwhile; ?>
                    </ul>
                    </nav>

                <script>
                    function toggleMenu() {
                    var menu = document.getElementById("menu");
                    if (menu.style.display === "none") {
                        menu.style.display = "block";
                    } else {
                        menu.style.display = "none";
                    }
                    }
                </script>

                <!-- CSS Styles -->
                <style>
                    
                .toggle-btn {
                    font-size: 20px;
                    cursor: pointer;
                    margin-left:20px
                }

                .menu {
                    display: none;
                    list-style: none;
                    margin: 0;
                    padding: 0;
                    position: absolute; 
                    top: 50px; 
                    left: 0; 
                    z-index: 1; 
                }

                .menu li {
                    display: inline;
                    margin-left: 15px;
                }

                .menu li:first-child {
                    
                }

                .menu a {
                    text-decoration: none;
                    color: #af1f1f;
                }
                </style>

            </div>
        </nav>
    </div>
</div>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Thêm Danh Mục</h2>
                    <form method="POST" action="" class="form">
                    <?php foreach ($errors as $error) :?>
                    <li style="color: red;background-color: white;"><?php echo $error; ?></li>
                    <?php endforeach;?>
                        <div class="form-group">
                            <label>Tên danh muc</label>
                            <input type="text" name="name" class="form-control" required style="width:40%" >
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status"class="status">
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                            </select>
                        </div>
                        <input type="submit" name="add" value="Thêm danh mục" class="btn btn-primary">
                        <a href="index.php" class="btn btn-danger">Hủy</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/957f9649c0.js" crossorigin="anonymous"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>



