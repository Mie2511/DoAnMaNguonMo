
<!DOCTYPE html>
<html>
<head>
    <title>KẾT QUẢ THI ĐẠI HỌC</title>
    <style>
        .form-container {
            width: 400px;
            background-color: lightpink;
            padding: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
if (isset($_POST['xemketqua'])) {
    $toan = $_POST['toan'];
    $ly = $_POST['ly'];
    $hoa = $_POST['hoa'];
    $diemchuan = 15;

    $tongdiem = $toan + $ly + $hoa;

    if ($toan == 0 || $ly == 0 || $hoa == 0 || $tongdiem < $diemchuan) {
        $ketqua = "Rớt";
    } else {
        $ketqua = "Đậu";
    }
}
?>
    <div class="form-container">
        <h2>KẾT QUẢ THI ĐẠI HỌC</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <td for="toan">Toán:</td>
            <input type="text" id="toan" name="toan">

            <td for="ly">Lý:</td>
            <input type="text" id="ly" name="ly">

            <td for="hoa">Hóa:</td>
            <input type="text" id="hoa" name="hoa">

            <td for="tongdiem">Tổng điểm:</td>
            <input type="number" id="tongdiem" name="tongdiem" value="<?php echo isset($tongdiem) ? $tongdiem : ''; ?>" readonly>

            <td for ="diemchuan">Điểm chuẩn:</td>
            <input type="number" name="dongia" value="20" color="red" readonly>

            <td for="ketqua">Kết quả thi:</td>
            <input type="text" id="ketqua" name="ketqua" value="<?php echo isset($ketqua) ? $ketqua : ''; ?>" readonly>

            <input type="submit" name="xemketqua" value="Xem kết quả">
        </form>
    </div>
</body>
</html>