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
    if(isset($_POST['submit'])) {
        $bd=$_POST['bd'];
        $kt=$_POST['kt'];
        $bd = intval($bd);
        $kt = intval($kt);
        if($bd>$kt)
            $msg="Giờ bắt đầu phải nhỏ hơn giờ kết thúc";
        else
            if($bd<10 || $kt>24)
                $msg="Giờ này karaoke không mở cửa!";
            else
                if($bd>=10 && $kt<=17)
                    $money=($kt-$bd)*20000;
                else if($bd>=17 && $kt<=24)
                    $money=($kt-$bd)*45000;
                    else if($bd>=10 && $kt<=24)
                    $money=((17-$bd)*20000)+((17+$kt)*45000);
    }
    ?>
    <form method="post" name="Karaoke">
        <table style="background: beige">
            <tr>
                <th colspan="2" style="background-color: pink">TÍNH TIỀN KARAOKE</th>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td>
                    <input type="time" name="bd" style="width: 174px" value="<?php if(isset($bd)) echo $bd; ?>">&nbsp;(hh:mm)
                </td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td>
                    <input type="time" name="kt" style="width: 174px" value="<?php if(isset($kt)) echo $kt; ?>">&nbsp;(hh:mm)
                </td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td>
                    <input type="text" name="money" size="20" readonly style="background: rgb(242, 178, 143)" value="<?php if(isset($money)) echo $money; ?>">&nbsp;(VND)
                </td>
            </tr>
            <tr style="align-items:center; text-align:center">
                <td colspan="2">
                    <input type="submit" name="submit" value="Tính tiền" style="background-color: floralwhite;">
                    <input type="reset" name="resetbtn" value="Nhập lại" style="background-color: floralwhite;">
                </td>

            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($msg)) echo $msg;?></td>
            </tr>
        </table>
    </form>
</body>
</html>