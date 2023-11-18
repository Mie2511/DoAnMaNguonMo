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
    if(isset($_POST['submit'])){
        $toan=$_POST['toan'];
        $ly=$_POST['ly'];
        $hoa=$_POST['hoa'];
        $diemchuan=$_POST['diemchuan'];

        if($toan>0 and $ly>0 and $hoa>0)
            $tong=$toan+$ly+$hoa;
        else
            $msg="Bạn đã rớt vì có môn 0 điểm";

        if($tong>=$diemchuan)
            $ketqua="Đậu";
        else
            $ketqua="Rớt";
        
    }
    ?>

    <form method="post" name="ThiDH">
        <table style="background: beige">
            <tr>
                <th colspan="2" style="background-color: pink">KẾT QUẢ THI ĐẠI HỌC</th>
            </tr>
            <tr>
                <td>Toán:</td>
                <td>
                    <input type="text" name="toan" size="20" value="<?php if(isset($toan)) echo $toan; ?>">
                </td>
            </tr>
            <tr>
                <td>Lý:</td>
                <td>
                    <input type="text" name="ly" size="20" value="<?php if(isset($ly)) echo $ly; ?>">
                </td>
            </tr>
            <tr>
                <td>Hóa:</td>
                <td>
                    <input type="text" name="hoa" size="20"  value="<?php if(isset($hoa)) echo $hoa; ?>">
                </td>
            </tr>
            <tr>
                <td>Điểm chuẩn:</td>
                <td>
                    <input type="text" name="diemchuan" size="20" style="color: red;" value="<?php if(isset($diemchuan)) echo $diemchuan; ?>">
                </td>
            </tr>
            <tr>
                <td>Tổng điểm:</td>
                <td>
                    <input type="text" name="tong" size="20" readonly style="background: rgb(242, 178, 143)" value="<?php if(isset($tong)) echo $tong; ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả thi:</td>
                <td>
                    <input type="text" name="ketqua" size="20" readonly style="background: rgb(242, 178, 143)" value="<?php if(isset($ketqua)) echo $ketqua; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="10" style="display:flex; flex-direction:column; align-items:center;">
                    <input type="submit" name="submit" value="Xem kết quả" style="background-color: floralwhite;">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($msg)) echo $msg;?></td>
            </tr>
        </table>
    </form>
</body>
</html>
