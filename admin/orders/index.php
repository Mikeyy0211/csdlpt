<?php 
include '../connect.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $sql = "select HoaDon.*, 
    KhachHang.TenKH,
    NhanVien.TenNV
    from HoaDon
    join NhanVien on NhanVien.MaNV = HoaDon.maNV
    join KhachHang on KhachHang.MaKH = HoaDon.MaKH";
    $result = sqlsrv_query($conn, $sql);
}
include '../menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý đơn hàng</title>
</head>
<body>
<h1>Đây là khu vực quản lý đơn hàng</h1>
<br>
<table border="1" width="100%">
    <tr>
        <th>Mã hóa đơn</th>
        <th>Tên nhân viên</th>
        <th>Tên khách hàng</th>
        <th>Ngày mua</th>
        <th>Tổng tiền</th>
        <th>Xem chi tiết</th>
    </tr>
<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['MaHD']; ?></td>
            <td><?php echo $row['TenNV']; ?></td>
            <td><?php echo $row['TenKH'] ?></td>
            <td><?php echo $row['NgayMua']->format('d/m/Y'); ?></td>
           	<td><?php echo $row['TongTien'] ?></td>
            <td>
                <a href="detail.php?id=<?php echo $row['MaHD']; ?>">Xem chi tiết</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>