<?php 
include '../connect.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $sql = "select * from KhachHang";
    $result = sqlsrv_query($conn, $sql);
}
include '../menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý khách hàng</title>
</head>
<body>
<h1>Đây là khu vực quản lý khách hàng</h1>
<br>
<table border="1" width="100%">
    <tr>
        <th>Mã khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
    </tr>
<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['MaKH']; ?></td>
            <td><?php echo $row['TenKH']; ?></td>
            <td>
                <?php 
                    if ($row['GioiTinh'] === 0) {
                        echo "Nữ";
                    }
                    else {
                        echo "Nam";
                    }
                ?>
            </td>
            <td><?php echo $row['NgaySinh']->format('d/m/Y'); ?></td>
            <td><?php echo $row['DiaChi'] ?></td>
            <td><?php echo $row['SDT'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>