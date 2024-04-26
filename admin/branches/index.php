<?php 
include '../connect.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $sql = "select * from ChiNhanh";
    $result = sqlsrv_query($conn, $sql);
}
include '../menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý chi nhánh</title>
</head>
<body>
<h1>Đây là khu vực quản lý chi nhánh</h1>
<br>
<a href="form_insert.php">Thêm</a>
<table border="1" width="100%">
    <tr>
        <th>Mã chi nhánh</th>
        <th>Tên chi nhánh</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['MaCN']; ?></td>
            <td><?php echo $row['TenCN']; ?></td>
            <td><?php echo $row['DiaChi']; ?></td>
            <td><?php echo $row['SDT']; ?></td>
            <td>
                <a href="form_update.php?id=<?php echo $row['MaCN']; ?>">Sửa</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row['MaCN']; ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>