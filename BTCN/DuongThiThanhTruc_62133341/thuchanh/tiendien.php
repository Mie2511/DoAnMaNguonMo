<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php
if (isset($_POST['tinh'])) {
    $cu = $_POST['cu'];
    $moi = $_POST['moi'];
    $dongia = $_POST['dongia'];

    $sotienthanhtoan = ($moi - $cu) * $dongia;

    echo "Số tiền thanh toán: " . $sotienthanhtoan;
}
?>
<form method="post" name="TT">
        <table style="background:orange">
            <tr>
                <th size="30">THANH TOÁN TIỀN ĐIỆN</th>
            </tr>
            <table style="background:lightpink">
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="chuho" size="20" value=" ">
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="number" name="cu" size ="20" value="text">(Kw)
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="number" name="moi" size="20" value="moi">(Kw)
                </td>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="number" name="dongia" size="20" value="20000" readonly>(VNĐ)
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán: </td>
                <td>
                    <input type="number" name="dongia" size="20" value="($moi - $cu) * $dongia" readonly color style:darkpink>(VNĐ)
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="tinh" value="Tính">
                </td>
            </tr>
</body>
</html>
