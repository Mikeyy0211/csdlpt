<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chỉnh sửa chi nhánh</title>
	<link rel="stylesheet" href="./form.css">
	<link rel="stylesheet" href="./main.css">
</head>

<body>

	<?php
	session_start();
	if (isset($_SESSION['error'])) {
		echo $_SESSION['error'] . "<br>";
		unset($_SESSION['error']);
	}
	?>
	<div id="main">
		<div id="header">
			<ul>
				<li class="active">
					<a href="../branches">
						Quản lý chi nhánh
					</a>
				</li>
			</ul>
			<ul>
				<li>
					<a href="../employees">
						Quản lý nhân viên
					</a>
				</li>
			</ul>
			<ul>
				<li>
					<a href="../orders">
						Quản lý đơn hàng
					</a>
				</li>
			</ul>
			<ul>
				<li>
					<a href="../companies">
						Quản lý nhà xuất bản
					</a>
				</li>
			</ul>
			<ul>
				<li>
					<a href="../products">
						Quản lý sản phẩm
					</a>
				</li>
			</ul>
			<ul>
				<li>
					<a href="../customers">
						Quản lý khách hàng
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="form-container">
		<form method="post" action="process_insert.php">
			Mã chi nhánh
			<input type="text" name="id">
			<br>
			Tên chi nhánh
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
	</div>
</body>

</html>