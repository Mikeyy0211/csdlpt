<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="./form.css">
  <link rel="stylesheet" href="./main.css">
</head>

<body>
  <?php
  if (empty($_GET['id'])) {
    $_SESSION['error'] = "Phải truyền mã vào";
    header('location:index.php');
    exit;
  }
  $id = $_GET['id'];

  include '../connect.php';
  include '../menu.php';

  $sql = "select * from ChiNhanh
	where MaCN = '$id'";
  $result = sqlsrv_query($conn, $sql);
  if ($result === false) {
    $_SESSION['error'] = "Lỗi truy vấn SQL Server";
    header('location:index.php');
    exit;
  }

  if (sqlsrv_has_rows($result) !== true) {
    $_SESSION['error'] = "Nhà sản xuất không tồn tại với id = $id";
    header('location:index.php');
    exit;
  }

  $each = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
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
    <form method="post" action="process_update.php">
      <input type="hidden" name="id" value="<?php echo $each['MaCN'] ?>">
      Tên chi nhánh
      <input type="text" name="name" value=<?php echo $each['TenCN'] ?>>
      <br>
      Địa chỉ
      <textarea name="address"><?php echo $each['DiaChi'] ?></textarea>
      <br>
      Số điện thoại
      <input type="text" name="phone" value="<?php echo $each['SDT'] ?>">
      <br>
      <button>Cập nhật</button>
    </form>
  </div>
</body>

</html>