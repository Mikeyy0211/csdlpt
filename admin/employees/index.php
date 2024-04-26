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
    <link rel="stylesheet" href="./main.css">
</head>

<body>
    <div id="main">
        <div id="header">
            <ul>
                <li>
                    <a href="../branches">
                        Quản lý chi nhánh
                    </a>
                </li>
            </ul>
            <ul>
                <li class="active">
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
    <div class="button-container">
        <a href="form_insert.php" class="centered-button">Thêm</a>
    </div>
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
                <td>
                    <?php echo $row['MaNV']; ?>
                </td>
                <td>
                    <?php echo $row['TenNV']; ?>
                </td>
                <td>
                    <?php
                    if ($row['GioiTinh'] === 0) {
                        echo "Nữ";
                    } else {
                        echo "Nam";
                    }
                    ?>
                </td>
                <td>
                    <?php echo $row['NgaySinh']->format('d/m/Y'); ?>
                </td>
                <td>
                    <?php echo $row['DiaChi'] ?>
                </td>
                <td>
                    <?php echo $row['SDT'] ?>
                </td>
                <td>
                    <?php echo $row['ChucVu'] ?>
                </td>
                <td>
                    <?php echo $row['TenCN'] ?>
                </td>
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