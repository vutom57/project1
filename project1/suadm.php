<?php
require('./connect.php');
$errors = []; 
if(isset($_POST['update'])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $status = $_POST['status'];

    if($name == "") {
        $errors[] =  "Vui lòng nhập tên danh mục!";
    }

    if(count($errors) == 0 ){
        $sql = "UPDATE categories SET name='$name', status='$status' , updated_at=NOW() WHERE id='$id'";
        $query = mysqli_query($conn, $sql);
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
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="images/logo.png" alt="img" class="fh5co_logo_width"/>
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        
                        <a class="nav-link" href="index.php"><i class="fa-solid fa-house" style="margin-right: 10px;"></i>Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="blog.html">Blog <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="single.html">Single <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Contact_us.html">Contact <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="quanly.html">Quản lý <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php
    // Lấy thông tin danh mục dựa trên ID từ URL
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Cập Nhật Danh Mục</h2>
                <form method="POST" action="" class="form">
                    <?php foreach ($errors as $error) :?>
                        <li style="color: red;background-color: white;"><?php echo $error; ?></li>
                    <?php endforeach;?>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label>Tên danh muc</label>
                        <input type="text" name="name" class="form-control" required style="width:40%" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="status">
                            <option value="ACTIVE" <?php if($row['status'] == 'ACTIVE') echo 'selected'; ?>>ACTIVE</option>
                            <option value="INACTIVE" <?php if($row['status'] == 'INACTIVE') echo 'selected'; ?>>INACTIVE</option>
                        </select>
                    </div>
                    <input type="submit" name="update" value="Cập nhật danh mục" class="btn btn-primary">
                    <a href="quanly.php" class="btn btn-danger">Hủy</a>
                </form>
            </div>
        </div>        
    </div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/957f9649c0.js" crossorigin="anonymous"></script>
<script src="js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>



