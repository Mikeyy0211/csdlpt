<?php 

session_start();
require '../connect.php';

if(empty($_GET['id'])) {
	$_SESSION['error'] = "Phải truyền mã vào";
	header('location:index.php');
	exit;
}

$id = $_GET['id'];
$sql = "delete from SanPham
where MaSP = '$id'";

$result = sqlsrv_query($conn, $sql);

$_SESSION['success'] = "Xóa thành công";
header('location:index.php');