<?php
require('./connect.php'); 
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
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <h2><?php echo $row['title']?></h2>
                    <span><?php echo $row['created_at']?></span><br>
                    <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" style=" width: 100%;height: 500px;">
                </div>
                <?php echo $row['content']?>
                <h4 style="font-size:18px; font-weight: bold;">Tác giả: <?php echo $row['author']?></h4>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Xem nhiều</div>
                </div>
                <div class="row pb-3">
                <?php
            $sql1 = "SELECT * FROM posts ORDER BY RAND() LIMIT 10";
            $resul1 = mysqli_query($conn, $sql1);
            while ($row = mysqli_fetch_array($resul1)) :
            $created_at = date('l, d/m/Y', strtotime($row['created_at']));
        ?>
                    <div class="col-5 align-self-center">
                    <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                    <a href="posts.php?id=<?php echo $row['id']; ?>" class="d-block fh5co_small_post_heading"><span class=""><?php echo $row['title']; ?> </span></a>
                        <div class="most_fh5co_treding_font_123"> <?php echo $created_at; ?></div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin mới</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
        <?php
            $sql1 = "SELECT * FROM posts ORDER BY created_at ";
            $resul1 = mysqli_query($conn, $sql1);
            while ($row = mysqli_fetch_array($resul1)) :
            $created_at = date('l, d/m/Y', strtotime($row['created_at']));
        ?>
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"> <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" alt="img" class="fh5co_most_trading"/></div>
                    <div>
                        <a href="posts.php?id=<?php echo $row['id']; ?>" class="d-block fh5co_small_post_heading"><span class=""><?php echo $row['title']; ?> </span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> <?php echo $created_at; ?></div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<footer class="footer section" id="contact">
    <h2 class="section-title">Contact Me</h2>
    <p class="footer-title">M Hoàng</p>
    <div class="footer-social">
      <a href="mailto:vuminhhoang6145@gmail.com" target="_blank" class="footer-icon"><i class='bx bxl-gmail'>
          <br />
          E-mail</i></a>
      <a href="#" target="_blank" class="footer-icon"><i class="bx bx-phone">
          <br />
          Phone</i></a>
      <a href="https://github.com/vutom57" target="_blank" class="footer-icon"><i
            class="bx bxl-github">
          <br />GitHub</i></a>
      <a href="https://www.youtube.com/channel/UC-LCAd8H0fEMkhPVQ3VgVfw" target="_blank" class="footer-icon"><i
          class="bx bxl-youtube">
          <br />Youtube</i></a>
    </div>
    <p>&#169; 2023 copyright all right reserved</p>
  </footer>
  <style>
.footer {
    background-color: #0e2431;;
    color: #fff;
    text-align: center;
    font-weight: #4070f4;
    padding: 3.5rem 0;
}
.footer-title {
    font-size: 2rem;
    margin-bottom: 2rem;
}
.footer-social {
    margin-bottom: 2rem;
    display: flex;
    justify-content: center;
}
.footer-icon {
  font-size: 1rem;
  color: #fff;
  margin: 0 1rem;
}
.section-title {
    position: relative;
    font-size: 2rem;;
    color: #4070f4;;
    margin-top: 1rem;
    margin-bottom: 2rem;
    text-align: center;
}
.footer-social a{
    text-decoration: none;
}
.footer-social a:hover{
    color: #17a2b8
}
  </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
<!-- Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
<script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>

</body>
</html>