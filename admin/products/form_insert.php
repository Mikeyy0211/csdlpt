<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php  
if(isset($_SESSION['error'])) {
	echo $_SESSION['error'] . "<br>";
	unset($_SESSION['error']);
}

require '../connect.php';
$sql = "select * from NhaXuatBan";
$result = sqlsrv_query($conn, $sql);

?>
<form method="post" action="process_insert.php">
	Mã sản phẩm
	<input type="text" name="id">
	<br>
    Tên sản phẩm
    <input type="text" name="name">
	<br>
	Loại sách
	<input type="text" name="type">
	<br>
	Giá bán
	<input type="number" name="price">
	<br>
	Nhà xuất bản
	<select name="com_id">
		<?php while ($each = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
			<option value="<?php echo $each['MaNXB'] ?>">
				<?php echo $each['TenNXB'] ?>
			</option>
		<?php } ?>
	</select>
	<br>
	<button>Thêm</button>
</form>
</body>
</html>