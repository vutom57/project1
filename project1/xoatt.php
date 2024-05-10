<?php
require('./connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sqlCheckExist = "SELECT * FROM posts WHERE id = $id";
    $resultCheckExist = mysqli_query($conn, $sqlCheckExist);
    if (mysqli_num_rows($resultCheckExist) > 0) {
        $post = mysqli_fetch_assoc($resultCheckExist);
        if (!empty($post['image']) && file_exists("image/{$post['image']}")) {
            unlink("image/{$post['image']}");
        }
        $sqlDelete = "DELETE FROM posts WHERE id = $id";
        if (mysqli_query($conn, $sqlDelete)) {
            header("Location: tintuc.php");
            exit;
        } else {
            echo 'Không thành công. Lỗi' . mysqli_error($conn);
        }
    } else {
        echo 'Bài viết không tồn tại';
    }
} else {
    echo 'ID không hợp lệ';
}
?>
