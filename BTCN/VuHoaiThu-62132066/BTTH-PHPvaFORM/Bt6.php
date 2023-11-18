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

    <!----------------------Phần HTML--------------------->
    <form method="post" name="TinhToan" action="bt6v2.php">
        <table style="background: beige; text-align:center; align-items: center">
            <tr>
                <th colspan="2" style="background-color: pink">PHÉP TÍNH TRÊN HAI SỐ</th>
            </tr>
            <tr>
                <td style=" color:brown">Chọn phép tính:</td>
                <td>
                    <input type="radio" name="pheptinh" size="20"  value="cong" ><a>Cộng</a>
                    
                    <input type="radio" name="pheptinh" size="20"  value="tru"><a>Trừ</a>
                    
                    <input type="radio" name="pheptinh" size="20"  value="nhan" ><a>Nhân</a>
                    
                    <input type="radio" name="pheptinh" size="20"  value="chia"><a>Chia</a>
                </td>
            </tr>
            <tr>
                <td style=" text-align:right">Số thứ nhất:</td>
                <td>
                    <input type="text" name="nhat" size="31" value="<?php if(isset($nhat)) echo $nhat; ?>">
                </td>
            </tr>
            <tr>
                <td style=" text-align:right" >Số thứ nhì:</td>
                <td>
                    <input type="text" name="hai" size="31"  value="<?php if(isset($hai)) echo $hai; ?>">
                </td>
            </tr>
            <tr style="text-align: center; align-items:center">
                <td colspan="2">
                    <a href="bt6v2.php"><input type="submit" name="submit" value="Tính" style=" background-color:floralwhite"></a>
                </td>
            </tr>
        </table>
    </form>

   

    <!---------------Phần CSS------------------>
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

