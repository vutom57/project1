<?php
require('./connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM categories WHERE id='$id'";
header("location: quanly.php");
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>