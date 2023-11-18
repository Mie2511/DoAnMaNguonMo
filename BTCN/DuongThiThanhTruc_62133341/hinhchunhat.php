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
        $cd = $_POST['dai'];
        $cr = $_POST['rong'];
        if(is_numeric($cd) and is_numeric($cr))
            if($cd>0 and $cr>0)
                if($cd>=$cr)
                    $dt=$cd*$cr;
                else $msg="chieu dai khong duoc be hon chieu rong";
            else $msg="chieu dai hoac chieu rong khong duoc <=0";
        else $msg="chieu dai hoac chieu rong khong phai la so";
    }
    ?>
    <form method="post" name="HCN">
        <table style="background: beige">
            <tr>
                <th colspan="2">DIỆN TÍCH HÌNH CHỮ NHẬT</th>
            </tr>
            <tr>
                <td>Chiều dài:</td>
                <td>
                    <input type="number" name="dai" size="20" value="<?php if(isset($cd)) echo $cd; ?>">
                </td>
            </tr>
            <tr>
                <td>Chiều rộng:</td>
                <td>
                    <input type="number" name="rong" size="20" value="<?php if(isset($cr)) echo $cr; ?>">
                </td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input type="text" name="dt" size="20" readonly style="background: rgb(242, 178, 143)" value="<?php if(isset($dt)) echo $dt; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Tính">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($msg)) echo $msg;?></td>
            </tr>
        </table>
    </form>
</body>
</html>
