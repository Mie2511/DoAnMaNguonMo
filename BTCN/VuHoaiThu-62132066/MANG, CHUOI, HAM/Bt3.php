
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST['submit'])){
        $n=$_POST['so'];
        function tao_mang($n){
            $mang=[];
            for($i=0;$i<$n;$i++){
                $mang[]=rand(0,20);
            }
            return $mang;
        }
        $mang=tao_mang($n);

        function xuat_mang($mang){
            return implode(',', $mang);
        }
        $mang_kq=xuat_mang($mang);

        function tinh_tong($mang){
            return array_sum($mang);
        }
        $tong=tinh_tong($mang);

        function tim_max($mang){
            return max($mang);
        }
        $max=tim_max($mang);

        function tim_min($mang){
            return min($mang);
        }
        $min=tim_min($mang);
}
?>
    <form method="POST" name="Tong" action="Bt3.php">
        <table style="background-color:lavenderblush;">
            <tr>
                <th colspan="2" style="background-color:mediumvioletred; color:white;">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
            </tr>
            <tr style="background-color:pink">
                <td>Nhập số phần tử: </td>
                <td><input type="number" name="so" size="20" value="<?php echo $n?>"></td>
            </tr>
            <tr>
                <td colspan="5" style="background-color:pink; text-align: center; align-items: center;">
                    <input type="submit" name="submit" value="Phát sinh và tính toán" style="background-color: gold; padding: 3px;padding-left:12px;padding-right:12px;">
                </td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td>
                    <input type="text" name="mang" size="43" readonly style="background-color:lightcoral;" value="<?php if (isset($mang_kq)) echo $mang_kq ?>">
                </td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng: </td>
                <td>
                    <input type="text" name="max" size="20" readonly style="background-color: lightcoral;" value="<?php if(isset($max)) echo $max; ?>">
                </td>
            </tr>
            <tr>
                <td>TTNN (MIN) trong mảng: </td>
                <td>
                    <input type="text" name="min" size="20" readonly style="background-color:lightcoral" value="<?php if(isset($min)) echo $min; ?>">
                </td>
            </tr>
            <tr>
                <td>Tổng mảng: </td>
                <td>
                    <input type="text" name="tong" size="20" readonly style="background-color:lightcoral" value="<?php if(isset($tong)) echo $tong;?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">(<a style="color:red; font-weight:bold">Ghi chú:</a> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
            </tr>
        </table>
    </form>
</body>
</html>