<?php 

session_start();
include '../connect.php';

if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) ) {
	header('location:form_insert.php');
	$_SESSION['error'] = "Phải điền đầy đủ thông tin";
	exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "EXEC [dbo].[ADDNXB]
    @p_maNXB = '$id',
    @p_tenNXB = '$name',
    @p_DiaChi = '$address',
    @p_sdt = '$phone'
";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    $_SESSION['error'] = "Thêm thất bại";
}

$_SESSION['success'] = "Thêm thành công nhà xuất bản";
header('location:index.php');