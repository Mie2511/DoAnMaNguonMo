
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
     function thay_the($mang, $cu, $moi){
        $length = count($mang);
        for($i=0;$i<$length;$i++){
            if($mang[$i]==$cu){
                $mang[$i]=$moi;
            }
        }
        return $mang;
     }
     if(isset($_POST['submit'])){
        $pt=$_POST['phantu'];
        $so=$_POST['bithaythe'];
        $thaythe=$_POST['thaythe'];

        $mang = explode(",", $pt);
        $mangcu = implode("  ",$mang);
        $mangmoi = implode("  ",thay_the($mang,$so,$thaythe));
        
     }
?>
    <form method="POST" name="ThayThe" action="Bt5.php">
        <table style="background-color:lavenderblush;">
            <tr>
                <th colspan="2" style="background-color:mediumvioletred; color:white;">THAY THẾ</th>
            </tr>
            <tr style="background-color:pink">
                <td>Nhập các phần tử: </td>
                <td><input type="text" name="phantu" size="30" value="<?php if(isset($pt)) echo $pt ?>"></td>
            </tr>
            <tr style="background-color:pink">
                <td>Giá trị cần thay thế: </td>
                <td><input type="number" name="bithaythe" required value="<?php if(isset($so)) echo $so ?>"></td>
            </tr>
            <tr style="background-color:pink">
                <td>Giá trị thay thế: </td>
                <td><input type="number" name="thaythe" required value="<?php if(isset($thaythe)) echo $thaythe ?>"></td>
            </tr>
            <tr style="background-color:pink">
                <td colspan="5" style="text-align: center; align-items: center;">
                    <input type="submit" name="submit" value="Thay thế" style="background-color: gold; padding: 3px;padding-left:12px;padding-right:12px;">
                </td>
            </tr>
            <tr>
                <td>Mảng cũ: </td>
                <td>
                    <input type="text" name="cu" size="30" readonly style="background-color:lightcoral" value="<?php if(isset($mangcu)) echo $mangcu ?>">
                </td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế: </td>
                <td>
                    <input type="text" name="moi" size="30" readonly style="background-color: lightcoral" value="<?php if(isset($mangmoi)) echo $mangmoi ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">(<a style="color:red; font-weight:bold">Ghi chú:</a> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>