<!DOCTYPE html>
<html>
<head>
    <title>Chọn phép tính</title>
</head>
<body>
    <form method="POST" action="">
        <input type="number" name="number1" placeholder="Số thứ nhất" required>
        <input type="number" name="number2" placeholder="Số thứ hai" required>
        <br><br>
        <input type="submit" name="operation" value="Cộng">
        <input type="submit" name="operation" value="Trừ">
        <input type="submit" name="operation" value="Nhân">
        <input type="submit" name="operation" value="Chia">
    </form>

    <?php
    if(isset($_POST['operation'])){
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case 'Cộng':
                $result = $number1 + $number2;
                break;
            case 'Trừ':
                $result = $number1 - $number2;
                break;
            case 'Nhân':
                $result = $number1 * $number2;
                break;
            case 'Chia':
                if ($number2 != 0) {
                    $result = $number1 / $number2;
                } else {
                    $result = "Không thể chia cho 0";
                }
                break;
            default:
                $result = "Phép tính không hợp lệ";
                break;
        }

        echo "<br>Kết quả: " . $result;
    }
    ?>
</body>
</html>