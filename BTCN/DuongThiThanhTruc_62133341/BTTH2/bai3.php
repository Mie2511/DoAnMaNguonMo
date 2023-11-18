<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bai_3</title>
</head>
<body>
<style>
    table{
       
        background-color: #FFFFCC;
    }
    .header{
        font-size: 20px;
        color: white;
        padding: 5px;
        font-weight: bold;
    }
    .a1, .a2{
        padding-left: 10px;
    }
    .btn{background-color: #FFFF66; width: 180px;}
    .a, .a2{background-color: CC0033;}
    .b, .arr{background: CC0033;}
    .nhap{width: 210px;}
    b{color: red;}
    .error{color: red;}
</style>
<?php
if(isset($_POST['submit'])){
    $n=$_POST['n'];
    if(isset($n) and is_numeric($n) and $n>0){
        $a = [];
        tao_mang($n,$a);
        $xuatMang=xuat_mang($a);
        $giaTriMax=tim_max($a);
        $giaTriMin=tim_min($a);
        $Sum=tinh_tong($a);
    }
    else{
        $error="Nhập N lớn hơn 0";
    }
}
function tao_mang($n,&$a){
    for($i=0;$i<$n;$i++){
        $a[$i]=rand(0,20);
    }
}
function xuat_mang($a){
    $s="";
    if (!empty($a)) {
        for($i=0;$i<count($a);$i++){
            $s.=$a[$i]." ";
        }
    }
    return $s;
}
function tim_max($a){
    $giaTriMax=$a[0];
    for($i=0;$i<count($a);$i++){
        if($a[$i] > $giaTriMax){
            $giaTriMax = $a[$i];
        }
    }
    return $giaTriMax;
}
function tim_min($a){
    $giaTriMin=$a[0];
    for($i=0;$i<count($a);$i++){
        if($a[$i] < $giaTriMin){
            $giaTriMin = $a[$i];
        }
    }
    return $giaTriMin;
}
function tinh_tong($a){
    $Sum=0;
    for($i=0;$i<count($a);$i++){
        $Sum+=$a[$i];
    }
    return $Sum;
}
?>
<form action="" method="post">
    <table align="center">
        <tr bgcolor="CC3366" align="center">
            <td class="header" colspan="2">PHÁT SINH MẢNG VÀ TÍNH TOÁN</td>
        </tr>
        <tr>
            <td class="a2">Nhập số phần tử:</td>
            <td class="a"> <input class="nhap" type="text" name="n" value="<?php if (isset($n)) echo $n?>" required></td>
        </tr>
        <tr>
            <td class="a"><input class="btn" type="submit" name="submit" value="Submit"></td>
        </tr>
        <tr>
            <td class="a2">Mảng:</td>
            <td class="a"><input class="arr" type="text" name="arr" value="<?php if (isset($n)) echo $xuatMang?>"> 
                <span class="arr"><?php if (isset($n)) echo $xuatMang?></span>
            </td>
        </tr>
        <tr>
            <td class="a2">GTLN(Max) trong mảng:</td>
            <td class="a"><input class="arr" type="text" name="Max" value="<?php if (isset($n)) echo $giaTriMax?>" readonly></td>
        </tr>
        <tr>
            <td class="a2">GTNN(Min) trong mảng:</td>
            <td class="a"><input class="arr" type="text" name="Min" value="<?php if (isset($n)) echo $giaTriMin?>" readonly></td>
        </tr>
        <tr>
            <td class="a2">Tổng mảng:</td>
            <td class="a"><input class="arr" type="text" name="Sum" value="<?php if (isset($n)) echo $Sum?>" readonly></td>
        </tr>
        <tr>
            <td colspan="2" align="center">(<b>Ghi chú: </b>Các phần tử trong mảng sẽ có giá trị từ 0 tới 20)</td>
        </tr>
        <?php if (isset($error)): ?>
        <tr>
            <td class="a2"></td>
            <td class="a"><b class="error"><?php echo $error; ?></b></td>
        </tr>
        <?php endif; ?>
    </table>
</form>
</body>
</html>