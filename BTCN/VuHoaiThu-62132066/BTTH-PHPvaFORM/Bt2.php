<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    define('PI',3.14);//đn hằng số là define
        if (isset($_POST['submit'])){
            $bk=$_POST['bk'];;
        if (isset($bk) and is_numeric($bk) and $bk>0){
            $dt=round(PI*$bk*$bk);//hiện rõ số thập phân round(...,1)
            $cv=round(2*PI*$bk);
        }
        else{
            $msg="ban kinh phai la so lon hon 0 hoac khong duoc de trong";
        }
    }
?>
    <form method="post" name="DTvaCVhinhtron">
        <table style="background: beige">
            <tr>
                <th colspan="2" style="background-color: pink">DIỆN TÍCH và CHU VI HÌNH TRÒN</th>
            </tr>
            <tr>
                <td>Bán kính:</td>
                <td>
                    <input type="number" name="bk" size="20" value="<?php if(isset($bk)) echo $bk; ?>">
                </td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input type="number" name="dt" size="20" readonly style="background: rgb(242, 178, 143)" value="<?php if(isset($dt)) echo $dt; ?>">
                </td>
            </tr>
            <tr>
                <td>Chu vi:</td>
                <td>
                    <input type="text" name="cv" size="20" readonly style="background: rgb(242, 178, 143)" value="<?php if(isset($cv)) echo $cv; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center; align-items:center">
                    <input type="submit" name="submit" style="background-color: floralwhite;" value="Tính">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($msg)) echo $msg;?></td>
            </tr>
        </table>
    </form>
</body>
</html>