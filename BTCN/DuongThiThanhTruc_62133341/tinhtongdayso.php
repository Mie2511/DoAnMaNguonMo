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

if (isset ( $_POST ['submit'] )) {
    $txt = $_POST ['list'];
    $arr=explode(separator:",");
    $sum=array_sum()
}
function totalDigitsOfNumber($n) {
    $total = 0;
    do {
        $total = $total + ($n % DEC_10);
        $n = floor ( $n / DEC_10 );
    } while ( $n > 0 );
    return $total;
    if (filter_var ( $n, FILTER_VALIDATE_INT )) 
        echo ("Tổng của các chữ số của $n là: " . totalDigitsOfNumber ( $n ));
     else $msg="Các số được nhập cách nhau bằng dấu phẩy";
    
}
 
?>
    <form method="post" name="Sum">
        <table style="background:lightblue">
            <tr style="background:darkgreen">
                <th style="color:white" colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="dayso" size="30" value="<?php if(isset($cd)) echo $cd; ?>">
                </td>
            </tr>
            <tr>
                <td colspan ></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Tổng dãy số">
                </td>
            <tr>
                <td>Tổng dãy số:</td>
                <td>
                    <input type="text" name="result" size="20" readonly style="background:greenyellow"
                    value='<?php if(isset($sum)) echo $sum;
                    >
                     
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($msg)) echo $msg;?></td>
                <p style="color:red">(*)>Các số được nhập cách nhau bằng dấu <b>,</b></p> 
            </tr>
        </table>
    </form>
</body>
</html>
