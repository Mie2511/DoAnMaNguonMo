<?php
include 'config-cart.php';

$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($conn->connect_error) {
    die('Could not connect to the database!' . $conn->connect_error);
}

mysqli_set_charset($conn, 'utf8mb4');

$tenMon = isset($_POST['tenmon']) ? $_POST['tenmon'] : array();
$soLuong = isset($_POST['soluong']) ? $_POST['soluong'] : array();
$giaTien = isset($_POST['giatien']) ? $_POST['giatien'] : array();

// Kiểm tra và xử lý $tenMon
if (!empty($tenMon)) {
    // Sử dụng Prepared Statement để tránh lỗi
    $stmt = $conn->prepare("INSERT INTO cart (id, tenmon, soluong, giatien) VALUES (NULL, ?, ?, ?)");

    foreach ($tenMon as $index => $mon) {
        $soluong = (int)$soLuong[$index];
        $giatien = $giaTien[$index];

        // Gán các giá trị vào Prepared Statement
        $stmt->bind_param("sis", $mon, $soluong, $giatien);

        if ($stmt->execute()) {
            echo "Thêm mục vào giỏ hàng thành công";
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    }

    $stmt->close();
} else {
    echo "Lỗi: Tên món không hợp lệ";
}


?>