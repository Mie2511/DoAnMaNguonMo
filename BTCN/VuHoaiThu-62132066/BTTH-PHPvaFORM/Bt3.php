<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $old=$_POST['old'];
        $new=$_POST['new'];
        $monnum=$_POST['monnum'];
        
        $dongia=20000;
        
        if($old > 0 and $new > 0)
            if(empty($name))
                $msg="Yêu cầu nhập tên chủ hộ";
            else
                $money=($new-$old)*$dongia;
        else
            $msg="Yêu cầu nhập chỉ số mới và cũ, chỉ số không được nhỏ hơn 0";
        
    }
?>

    <form method="post" name="TienDien">
        <table style="background: beige">
            <tr>
                <th colspan="2" style="background-color: pink">THANH TOÁN TIỀN ĐIỆN</th>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="name" size="20" value="<?php if(isset($name)) echo $name; ?>">
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="number" name="old" size="20" value="<?php if(isset($old)) echo $old; ?>">&nbsp;(Kw)
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="number" name="new" size="20" value="<?php if(isset($new)) echo $new; ?>">&nbsp;(Kw)
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="number" name="monnum" size="20" value="20000" readonly>&nbsp;(VNĐ)
                </td>
            </tr>
            <tr>
                <td>Số tiển thanh toán:</td>
                <td>
                    <input type="text" name="money" size="20" readonly style="background: rgb(242, 178, 143)" value="<?php if(isset($money)) echo $money; ?>">&nbsp;(VNĐ)
                </td>
            </tr>
            <tr>
                <td colspan="2" style="display:flex; flex-direction:column; align-items:center;" >
                    <input type="submit" name="submit" style="background-color: floralwhite;" value="Tính toán">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($msg)) echo $msg;?></td>
            </tr>
        </table>
    </form>
</body>
</html>