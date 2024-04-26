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
                <li class="active">
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
                <td>
                    <?php echo $row['MaSP']; ?>
                </td>
                <td>
                    <?php echo $row['TenSP']; ?>
                </td>
                <td>
                    <?php echo $row['Loai'] ?>
                </td>
                <td>
                    <?php echo $row['Gia']; ?>
                </td>
                <td>
                    <?php echo $row['TenNXB'] ?>
                </td>
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