<?php 

session_start();
include '../connect.php';

if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['type']) || empty($_POST['price']) ) {
	header('location:form_insert.php');
	$_SESSION['error'] = "Phải điền đầy đủ thông tin";
	exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];
$com_id = $_POST['com_id'];

$sql = "EXEC [dbo].[ADDSP]
    @p_masp = '$id',
    @p_tensp = '$name',
    @p_loai = '$type',
    @p_gia = $price,
    @p_manxb = '$com_id'
";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    $_SESSION['error'] = "Thêm thất bại";
}

$_SESSION['success'] = "Thêm thành công sản phẩm";
header('location:index.php');