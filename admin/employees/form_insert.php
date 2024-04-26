<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm Nhân viên</title>
    <link rel="stylesheet" href="./form.css">
    <link rel="stylesheet" href="./main.css">
</head>

<body>

    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'] . "<br>";
        unset($_SESSION['error']);
    }

    require '../connect.php'; // Kết nối đến CSDL
    
    $sql = "SELECT * FROM ChiNhanh"; // Truy vấn lấy danh sách chi nhánh
    $result = sqlsrv_query($conn, $sql); // Thực thi truy vấn
    
    ?>
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
    <div class="form-container">
        <form method="post" action="process_insert.php">
            Mã nhân viên
            <input type="text" name="id">
            <br>
            Tên nhân viên
            <input type="text" name="name">
            <br>
            Giới tính
            <select name="gender">
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
            <br>
            Ngày sinh
            <input type="date" name="dob">
            <br>
            Địa chỉ
            <textarea name="address"></textarea>
            <br>
            Số điện thoại
            <input type="text" name="phone">
            <br>
            Chức vụ
            <input type="text" name="position">
            <br>
            Chi nhánh
            <select name="branch_id" class="branch-select">
                <?php while ($each = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
                    <option value="<?php echo $each['MaCN'] ?>">
                        <?php echo $each['TenCN'] ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <button>Thêm</button>
        </form>
    </div>
</body>

</html>