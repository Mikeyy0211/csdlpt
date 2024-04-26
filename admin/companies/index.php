<?php 
include '../connect.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $sql = "select * from NhaXuatBan";
    $result = sqlsrv_query($conn, $sql);
}
include '../menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý nhà xuất bản</title>
</head>
<body>
<h1>Đây là khu vực quản lý nhà xuất bản</h1>
<br>
<a href="form_insert.php">Thêm</a>
<table border="1" width="100%">
    <tr>
        <th>Mã nhà xuất bản</th>
        <th>Tên nhà xuất bản</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['MaNXB']; ?></td>
            <td><?php echo $row['TenNXB']; ?></td>
            <td><?php echo $row['DiaChi'] ?></td>
            <td><?php echo $row['SDT']; ?></td>
            <td>
                <a href="form_update.php?id=<?php echo $row['MaNXB']; ?>">Sửa</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row['MaNXB']; ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>