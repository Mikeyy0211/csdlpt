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

	$sql = "select * from SanPham
	where MaSP = '$id'";
	$result = sqlsrv_query($conn, $sql);
	if (sqlsrv_has_rows($result) !== true) {
	    $_SESSION['error'] = "Sản phẩm không tồn tại với id = $id";
	    header('location:index.php');
	    exit;
	}
	$each = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	$sql1 = "select * from NhaXuatBan";
	$result1 = sqlsrv_query($conn, $sql1);
?>
<form method="post" action="process_update.php">
	<input type="hidden" name="id" value = "<?php echo $each['MaSP'] ?>">
	Tên sản phẩm
	<input type="text" name="name" value="<?php echo $each['TenSP'] ?>">
	<br>
	Loại sách
	<input type="text" name="type" value="<?php echo $each['Loai'] ?>">
	<br>
	Giá bán
	<input type="text" name="price" value="<?php echo $each['Gia'] ?>">
	<br>
	Nhà xuất bản
	<select name="com_id">
		<?php while ($each1 = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) { ?>
			<option value="<?php echo $each1['MaNXB'] ?>"
				<?php if($each1['MaNXB'] === $each['maNXB']) { ?>
					selected
				<?php } ?>
			>
				<?php echo $each1['TenNXB'] ?>
			</option>
		<?php } ?>
	</select>
	<br>
	<button>Cập nhật</button>
</form>
</body>
</html>