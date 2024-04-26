<?php 

session_start();
require '../connect.php';

if(empty($_POST['name']) ||empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['id'])) {
	header('location:index.php');
	$_SESSION['error'] = "Phải điền đầy đủ thông tin";
	exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "EXEC [dbo].[UPDATECHINHANH]
    @p_maCn = '$id',
    @p_tenCn = '$name',
    @p_diaChi = '$address',
    @p_sdt = '$phone';

";

$result = sqlsrv_query($conn, $sql);

$_SESSION['success'] = "Cập nhật thành công chi nhánh";
header('location:index.php');