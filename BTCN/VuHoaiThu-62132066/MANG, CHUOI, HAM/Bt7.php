<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai_7</title>
</head>
<style>
</style>
<body>
<?php
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.gif", "ran.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

    $nam_al = "";
    $hinh_anh = "<img src='12con_giap/sa.gif'>";//ảnh mặc định

    if (isset($_POST['submit'])) {
        $nam = $_POST['year'];
        $nam = $nam - 3;
        if(isset($nam) && is_numeric($nam) && $nam > 0){
            $can = $nam % 10;
            $chi = $nam % 12;
            $nam_al = $mang_can[$can] . " " . $mang_chi[$chi];
            $hinh = $mang_hinh[$chi];
            $hinh_anh = "<img src='12con_giap/$hinh'>";
        }
        else{
            $error="Năm dương lịch phải là số và lớn hơn 0!";
        }
    }
?>
<form action="" method="post">
    <table style="background-color:#b3e8f5">
        <tr style=" background-color:#0f62c6; align-items:center; text-align: center">
            <th colspan="5" style="color:aliceblue;">TÍNH NĂM ÂM LỊCH</th>
        </tr>
        <tr style="align-items:center; text-align: center">
            <td>Năm dương lịch</td>
            <td></td>
            <td>Năm âm lịch</td>
        </tr>
        <tr style="align-items:center; text-align: center">
            <td>
                <input class="a" type="number" name="year" required value="<?php if(isset($_POST['year'])) echo $_POST['year']; ?>">
            </td>
            <td>
                <input class="a1" type="submit" style="color: red; background-color: lightyellow;" name="submit" >
            </td>
            <td>
                <input class="a2" type="text" style="color: red; background-color: lightyellow;" id="amlich" readonly value="<?php echo $nam_al; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="3" style="color: red; align-items:center; text-align: center">
                <?php
                    if(isset($error)){
                        echo $error;
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="align-items:center; text-align: center">
            <div id="hinh_anh"><?php echo $hinh_anh; ?></div>
            </td>
        </tr>
    </table>
</form>
</body>
</html>