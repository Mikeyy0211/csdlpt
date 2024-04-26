<?php 

session_start();
require '../connect.php';

if(empty($_POST['name']) ||empty($_POST['type']) || empty($_POST['price'])) {
    header('location:index.php');
    $_SESSION['error'] = "Phải điền đầy đủ thông tin";
    exit;
}


$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['type'];
$com_id = $_POST['com_id'];

$sql = "EXEC [dbo].[UPDATESP]
    @p_masp = '$id',
    @p_tensp = '$name',
    @p_loai = '$type',
    @p_gia = $price, -- giá sản phẩm mới
    @p_manxb = '$com_id'
";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    $_SESSION['error'] = "Cập nhật thất bại";
}

$_SESSION['success'] = "Cập nhật thành công sản phẩm";
header('location:index.php');