<?php 
include '../connect.php';
$id = $_GET['id'];
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
	
    $sql = "Select HoaDonChiTiet.SoLuong, 
    SanPham.TenSP,
    SanPham.Gia
    from HoaDonChiTiet
    join SanPham on SanPham.MaSP = [HoaDonChiTiet].[maSP]
    where MaHD = '$id'";
    $result = sqlsrv_query($conn, $sql);
    $sum = 0;
}
include '../menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý đơn hàng chi tiết</title>
</head>
<body>
<h1>Đây là khu vực xem chi tiết hóa đơn có mã = <?php echo $id ?></h1>
<br>
<table border="1" width="100%">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['TenSP']; ?></td>
            <td><?php echo $row['SoLuong']; ?></td>
            <td><?php echo $row['Gia'] ?></td>
            <td>
            	<?php 
            		$tmp = $row['SoLuong'] * $row['Gia'];
            		echo $tmp;
            		$sum += $tmp;
            	?>
            </td>
        </tr>
    <?php } ?>
</table>
<h1>Tổng tiền cho đơn hàng này của bạn là <?php echo $sum ?>VNĐ</h1>
</body>
</html>