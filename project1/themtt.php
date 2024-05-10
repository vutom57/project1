<?php
require('./connect.php'); 
?>

<?php
    $sql_category= "SELECT * FROM categories";
    $sql_post = "SELECT * FROM posts";
    $query_category = mysqli_query($conn, $sql_category);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content']; 
        $category = $_POST['category_id'];
        $category_id = (int)$category;
        $status = $_POST['status'];
        $author = $_POST['author'];
            
            if (!empty($_FILES['image']['name'])) {
              $targetDir = "image/";
              $imageName = basename($_FILES['image']['name']);
              $imagePath = $targetDir . $imageName;
          
              if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
          
                $sql = "INSERT INTO posts (title, image, content, category_id, status,author) 
                VALUES ('$title', '$imageName', '$content', '$category_id', '$status','$author')";
        
                if ($conn->query($sql) === TRUE) {
                  header("Location: tintuc.php");
                  exit;
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              } else {
                echo '<>Lỗi update hình ảnh.';
              }
            } else {
              echo 'Chọn file hình.';
            }
          }
          
          $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head>
<body>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Thêm bài viết</h2>
            </div>
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">
    
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" require>
                    </div>
    
                    <div class="form-group">
                        <label for="">Ảnh bài viết</label>
                        <input type="file" name="image" class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea type="file"name="content" class="form-control form-control-size" id="content" require></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Thể loại</label>
                        <select name="category_id" id="category_id">
                            <?php while ($row = mysqli_fetch_assoc($query_category)):?>
                                <option value=<?php echo $row['id'];?>> <?php echo $row['name'];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="radio" name="status" value="PUBLIC" checked>Public
                        <input type="radio" name="status" value="PRIVATE"> Private
                    </div>
    
                    <div class="form-group">
                        <label for="">Người viết</label>
                        <input type="text" name="author" class="form-control" require>
                    </div>
                    
                    <input type="submit" value="Thêm tin tức" class="btn btn-primary">
                    <a href="tintuc.php" class="btn btn-danger">Hủy</a>
                </form>
            </div>
        </div>
    
    </div>
</body>
</html>

<script>
    CKEDITOR.replace( 'content' );
</script>