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

	$sql = "select * from NhaXuatBan
	where MaNXB = '$id'";
	$result = sqlsrv_query($conn, $sql);
	if ($result === false) {
	    $_SESSION['error'] = "Lỗi truy vấn SQL Server";
	    header('location:index.php');
	    exit;
	}

	if (sqlsrv_has_rows($result) !== true) {
	    $_SESSION['error'] = "Nhà xuất bản không tồn tại với id = $id";
	    header('location:index.php');
	    exit;
	}

	$each = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>
<form method="post" action="process_update.php">
	<input type="hidden" name="id" value = "<?php echo $each['MaNXB'] ?>">
	Tên chi nhánh
    <input type="text" name="name" value = <?php echo $each['TenNXB'] ?>>
	<br>
	Địa chỉ
	<textarea name="address"><?php echo $each['DiaChi'] ?></textarea>
	<br>
	Số điện thoại
	<input type="text" name="phone" value="<?php echo $each['SDT'] ?>">
	<br>
	<button>Cập nhật</button>
</form>
</body>
</html>