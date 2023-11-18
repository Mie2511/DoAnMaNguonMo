<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        // Lấy dữ liệu từ form
        $nhat = $_POST["nhat"];
        $hai = $_POST["hai"];
        $pheptinh = $_POST["pheptinh"];

        // Kiểm tra và thực hiện tính toán
        if (is_numeric($nhat) && is_numeric($hai)) {
            pheptinh($pheptinh,$nhat,$hai);
        }
        else{
            echo "<font color='red'>Vui lòng nhập số hợp lệ";
            echo '<a href="javascript:window.history.back(-1);">';
        }
    }
        function pheptinh($pheptinh,$nhat,$hai){
            if ($pheptinh == "cong") {
                echo $ketqua = $nhat + $hai;
            } elseif ($pheptinh == "tru") {
                echo $ketqua = $nhat - $hai;
            } elseif ($pheptinh == "nhan") {
                echo $ketqua = $nhat * $hai;
            } elseif ($pheptinh == "chia") {
                if($hai!=0){
                    echo $ketqua = $nhat / $hai;
                }
                else{ 
                    echo "Yêu cầu nhập số khác 0";
            }
        }
    }
    ?>
<div class="form">
        <table style="background: beige; text-align:center; align-items: center">
            <tr>
                <th colspan="2" style="background-color: pink">PHÉP TÍNH TRÊN HAI SỐ</th>
            </tr>
            <tr">
                <td style=" color:brown;">Chọn phép tính: <?php echo $pheptinh?></td>
                
            </tr>
            <tr>
                <td style=" text-align:right">Số 1:</td>
                <td>
                    <input type="text" name="nhat" size="31" readonly value="<?php echo $nhat; ?>">
                </td>
            </tr>
            <tr>
                <td style=" text-align:right" >Số 2:</td>
                <td>
                    <input type="text" name="hai" size="31" readonly value="<?php echo $hai; ?>">
                </td>
            </tr>
            <tr>
                <td style=" text-align:right">Kết quả:</td>
                <td>
                    <input type="text" name="kq" size="31" readonly value="<?php pheptinh($pheptinh,$nhat,$hai); ?>">
                </td>
            </tr>
           
            <tr >
                <td colsban="2" align="center"><a href="javascript:window.history.back(-1);"><i>Quay lại trang trước</i></a></td>
            </tr>
        </table>
</div>
 <!-------------Phần CSS------------------>
<style>
    *{
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    a{
        color: red;
    }
</style>
</body>
</html>
