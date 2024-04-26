<?php  
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <?php 
    if(empty($_GET['id'])) {
        $_SESSION['error'] = "Phải truyền mã vào";
        header('location:index.php');
        exit;
    }
    $id = $_GET['id'];

    include '../connect.php';
    include '../menu.php';

    $sql = "SELECT * FROM NhanVien WHERE MaNV = '$id'";
    $result = sqlsrv_query($conn, $sql);
    if (sqlsrv_has_rows($result) !== true) {
        $_SESSION['error'] = "Nhân viên không tồn tại với id = $id";
        header('location:index.php');
        exit;
    }
    $each = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $sql1 = "SELECT * FROM ChiNhanh";
    $result1 = sqlsrv_query($conn, $sql1);
?>
<form method="post" action="process_update.php">
    <input type="hidden" name="id" value="<?php echo $each['MaNV'] ?>">
    Tên nhân viên
    <input type="text" name="name" value="<?php echo $each['TenNV'] ?>">
    <br>
    Giới tính
    <input type="radio" name="gender" value="1" <?php if ($each['GioiTinh'] == 1) echo 'checked' ?>> Nam
    <input type="radio" name="gender" value="0" <?php if ($each['GioiTinh'] == 0) echo 'checked' ?>> Nữ
    <br>
    Ngày sinh
    <input type="date" name="dob" value="<?php echo date_format($each['NgaySinh'], 'Y-m-d') ?>">
    <br>
    Địa chỉ
    <input type="text" name="address" value="<?php echo $each['DiaChi'] ?>">
    <br>
    Số điện thoại
    <input type="text" name="phone" value="<?php echo $each['SDT'] ?>">
    <br>
    Chức vụ
    <input type="text" name="position" value="<?php echo $each['ChucVu'] ?>">
    <br>
    Chi nhánh
    <select name="branch_id">
		<?php while ($each1 = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) { ?>
			<option value="<?php echo $each1['MaCN'] ?>"
				<?php if($each1['MaCN'] === $each['maCN']) { ?>
					selected
				<?php } ?>
			>
				<?php echo $each1['TenCN'] ?>
			</option>
		<?php } ?>
	</select>
    <br>
    <button>Cập nhật</button>
</form>
</body>
</html>
