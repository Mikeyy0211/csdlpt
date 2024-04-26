<?php 

session_start();
include '../connect.php';

if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['position']) || empty($_POST['branch_id'])) {
    header('location:form_insert.php');
    $_SESSION['error'] = "Phải điền đầy đủ thông tin";
    exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$branch_id = $_POST['branch_id'];

$sql = "EXEC [dbo].[ADDNHANVIEN]
    @p_maNV = '$id',
    @p_tenNV = '$name',
    @p_gioiTinh = $gender,
    @p_ngaySinh = '$dob',
    @p_diaChi = '$address',
    @p_sdt = '$phone',
    @p_chucVu = '$position',
    @p_maCN = '$branch_id'
";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    $_SESSION['error'] = "Thêm thất bại";
}

$_SESSION['success'] = "Thêm thành công nhân viên";
header('location:index.php');
