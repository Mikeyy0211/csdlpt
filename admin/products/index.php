<?php 
include '../connect.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $sql = "select SanPham.*,NhaXuatBan.TenNXB from SanPham
    join NhaXuatBan on NhaXuatBan.MaNXB = SanPham.maNXB";
    $result = sqlsrv_query($conn, $sql);
}
include '../menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sản phẩm</title>
</head>
<body>
<h1>Đây là khu vực quản lý sản phẩm</h1>
<br>
<a href="form_insert.php">Thêm</a>
<table border="1" width="100%">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Loại sách</th>
        <th>Giá bán</th>
        <th>Tên nhà xuất bản</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['MaSP']; ?></td>
            <td><?php echo $row['TenSP']; ?></td>
            <td><?php echo $row['Loai'] ?></td>
            <td><?php echo $row['Gia']; ?></td>
            <td><?php echo $row['TenNXB'] ?></td>
            <td>
                <a href="form_update.php?id=<?php echo $row['MaSP']; ?>">Sửa</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row['MaSP']; ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>