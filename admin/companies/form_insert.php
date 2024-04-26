<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php 
session_start(); 
if(isset($_SESSION['error'])) {
	echo $_SESSION['error'] . "<br>";
	unset($_SESSION['error']);
}
?>
<form method="post" action="process_insert.php">
	Mã nhà xuất bản
	<input type="text" name="id">
	<br>
    Tên nhà xuất bản
    <input type="text" name="name">
	<br>
	Địa chỉ
	<textarea name="address"></textarea>
	<br>
	Số điện thoại
	<input type="text" name="phone">
	<br>
	<button>Thêm</button>
</form>
</body>
</html>