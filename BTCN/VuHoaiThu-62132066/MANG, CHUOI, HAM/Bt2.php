
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    // Kiểm tra xem form đã được submit hay chưa
    if (isset($_POST['submit'])) {
        // Lấy giá trị nhập vào từ ô input
        $inputNumbers = $_POST['so'];
        
        // Tách các số thành một mảng
        $numbers = explode(',', $inputNumbers);
        // Tính tổng dãy số
        $sum = array_sum($numbers);
        
    }
?>
    <form method="POST" name="Tong">
        <table style="background-color: darkgrey;">
            <tr>
                <th colspan="2" style="background-color:darkcyan">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
            </tr>
            <tr>
                <td>Nhập dãy số: </td>
                <td><input type="text" name="so" size="20" ><a style="color:red;">(*)</a></td>
            </tr>
            <tr>
                <td colspan="5">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    <input type="submit" name="submit" value="Tổng dãy số" style="background-color: gold;">
                </td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td><input type="text" name="tong" readonly style="background-color: blanchedalmond;" value="<?php if(isset($sum)) echo $sum; ?>"></td>
            </tr>
        </table>
    </form>
</body>
</html>