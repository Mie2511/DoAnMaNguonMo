
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function timkiem($mang, $gia_tri) {
        foreach ($mang as $key => $value) {
            if ($value == $gia_tri) {
                return $key;
            }
        }
        return -1;
    }

    if(isset($_POST['submit'])){
        $inp = $_POST['inp'];
        $so = $_POST['so'];
        $mang_kq = $_POST['mang_kq'];

        if (is_numeric($so) && $so >= 0) {
            $mang = explode(",", $inp);
            $viTri = timkiem($mang, $so);
            $mang_kq = implode(", ",$mang);

            if ($viTri != -1) {
                $kq = "Đã tìm thấy $so tại vị trí thứ $viTri của mảng.";
            } else {
                $kq = "Không tìm thấy $so trong mảng.";
            }
        } else {
            $kq = "Vui lòng nhập một số nguyên không âm.";
        }
    }
?>
    <form method="POST" name="SapXep" action="Bt6.php">
        <table style="background-color:#B8D7CE;">
            <tr>
                <th colspan="2" style="background-color:cadetblue; color:white;">TÌM KIẾM</th>
            </tr>
            <tr>
                <td>Nhập mảng: </td>
                <td><input type="text" name="inp" size="30" value="<?php if(isset($inp)) echo $inp; ?>"></td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center; align-items: center;">
                    <input type="submit" name="submit" value="Sắp xếp tăng/giảm" style="background-color:white; padding: 3px;padding-left:12px;padding-right:12px;">
                </td>
            </tr>
            <td style="background-color:lightcyan ;"><a style="font-weight:bolder; color: red;">Sau khi sắp xếp:</a></td>
            <tr style="background-color:lightcyan ;">
                <td>Tăng dần: </td>
                <td><input type="number" name="so" required value="<?php if(isset($so)) echo $so; ?>" ></td>
            </tr>
            <tr style="background-color:lightcyan ;">
                <td>Giảm dần: </td>
                <td>
                    <input type="text" name="mang_kq" size="30"  value="<?php if (isset($mang_kq)) echo $mang_kq ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td>
                    <input type="text" name="kq" size="30" readonly style="background-color:aqua" value="<?php if(isset($kq)) echo $kq;?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; align-items: center;"><a style="color:red">(*)</a>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>