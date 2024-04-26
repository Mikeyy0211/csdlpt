<?php 
include '../connect.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    $sql = "select NhanVien.*, ChiNhanh.TenCN from NhanVien
    join ChiNhanh on NhanVien.maCN = ChiNhanh.MaCN";
    $result = sqlsrv_query($conn, $sql);
}
include '../menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý nhân viên</title>
</head>
<body>
<h1>Đây là khu vực quản lý nhân viên</h1>
<br>
<a href="form_insert.php">Thêm</a>
<table border="1" width="100%">
    <tr>
        <th>Mã nhân viên</th>
        <th>Tên nhân viên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Chức vụ</th>
        <th>Tên chi nhánh</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['MaNV']; ?></td>
            <td><?php echo $row['TenNV']; ?></td>
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
            <td><?php echo $row['ChucVu'] ?></td>
            <td><?php echo $row['TenCN'] ?></td>
            <td>
                <a href="form_update.php?id=<?php echo $row['MaNV']; ?>">Sửa</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row['MaNV']; ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>