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
    $start = isset($_POST['giobd']) ? $_POST['giobd'] : '';
    $finish = isset($_POST['giokt']) ? $_POST['giokt'] : '';
    
    // Chuyển đổi chuỗi thời gian thành timestamp
    $startTime = strtotime($start);
    $finishTime = strtotime($finish);
    
    if ($finishTime > $startTime) {
        $giosudung = ($finishTime - $startTime) / 3600; // Số giờ sử dụng

        $dongia_1 = 20000; 
        $dongia_2 = 45000; 
        
        if ($finishTime <= strtotime("17:00")) {
            $tt = $giosudung * $dongia_1;
        } elseif ($startTime >= strtotime("17:00")) {
            $tt = $giosudung * $dongia_2;
        } else {
            $so_gio_1 = (strtotime("17:00") - $startTime) / 3600;
            $so_gio_2 = $giosudung - $so_gio_1;
            $tt = ($so_gio_1 * $dongia_1) + ($so_gio_2 * $dongia_2);
        }
    } else {
        $mgs = "Giờ kết thúc phải lớn hơn giờ bắt đầu.";
    }
}
?>
<form action="" method="post">
    <table bgcolor="peachpuff">
        <tr>
            <td colspan="2" bgcolor="turquoise"><h1>TÍNH TIỀN KARAOKE</h1></td>
        </tr>
        <tr>
            <td>Giờ bắt đầu: </td>
            <td> <input type="time" name="giobd" value="<?php echo isset($start) ? $start : ''; ?>"><b>(h)</b></td>
        </tr>
        <tr>
            <td>Giờ kết thúc: </td>
            <td> <input type="time" name="giokt" value="<?php echo isset($finish) ? $finish : ''; ?>"><b>(h)</b></td>
        </tr>
        <tr>
            <td>Tiền thanh toán: </td>
            <td> <input type="text" name="tt" style="background-color:linen" readonly
                        value="<?php echo isset($tt) ? $tt : ''; ?>"><b>(VNĐ)</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính tiền">
            </td>
        </tr>
        <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
         </tr>
    </table>
</form>

</body>
</html>