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
    $n=$_POST['n'];
    if(isset($n) and is_numeric($n) and $n>0)
    {   
        tao_mang($n,$a);
        $inmang= in_mang($a);
        $demsochan= dem_chan($a);
        $demnho= dem_nho($a);
        $tongam= tong_am($a);
        $vitri= vi_tri($a);
        $sapxep = sap_xep($a);
    }
    else{
        $mgs="SỐ 0 KHÔNG PHẢI LÀ SỐ NGUYÊN";}
    }
    function tao_Mang($n,&$a){
        for($i=0;$i<$n;$i++){
            $a[$i]=rand(-20,20);
        }
        return $a;
    }
    function in_mang($a){
        $mang="";
        for($i=0;$i<count($a);$i++){
            $mang .= $a[$i]." ";
        }
        return $mang;
    }
    function dem_chan($a){
        $count =0;

        foreach($a as $demsochan){
            if($demsochan % 2 === 0){
                $count++;
            }
        }
        return $count;
    }
    function dem_nho($a){
        $count=0;
        foreach($a as $demnho){
            if($demnho < 100){
                $count++;
            }
        }
        return $count;
    }
    function tong_am($a){
        $tong=0;
        for($i=0;$i<count($a);$i++){
            if($a[$i]<0){
                $tong+=$a[$i];
            }
        }
        return $tong;
    }
    function vi_tri($a){
        $vitri="";
        for($i=0;$i<count($a);$i++){
            if($a[$i]==0){
                $s=$i+1;
                $vitri.=$s." ";
            }
        }
        return $vitri;
    }
    function sap_xep($a){
        for($i=0;$i<count($a)-1;$i++){
            for($j=$i+1;$j<count($a);$j++){
                if($a[$i]>$a[$j]){
                    $tg = $a[$i];
                    $a[$i] = $a[$j];
                    $a[$j] = $tg;        
                }
            }
        }
        return $a;
    }
?>
<form action="" method="post">
    <table bgcolor="peachpuff" align="center">
        <tr>
            <td colspan="2" bgcolor="turquoise"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
        </tr>
        <tr>
            <td>Nhập số: </td>
            <td>
                <input class="n" type="text" name="n" value="<?php if(isset($n)) echo $n;?>" required>
            </td>
        </tr>
        <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
         </tr>
         <tr>
            
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Thực hiện">
            </td>
        </tr>
        <tr>
        <td>Mảng phát sinh:</td><br>
         <td>
         <input class="mang" type="text" value="<?php if(isset($inmang)) echo $inmang; ?>" readonly></td>
         </td>
         </tr>
        <tr>
            <td >Số phần Tử Chẵn:</td>
            <td><input class="a" type="text" value="<?php if(isset($demsochan)) echo $demsochan; ?>" readonly></td>
        </tr>
        <tr>
            <td>Số phần tử nhỏ hơn 100: </td>
            <td><input class="a" type="text" value="<?php if(isset($demnho)) echo $demnho; ?>"readonly></td>
        </tr>
        <tr>
        <td>Tổng phần tử âm: </td>
        <td><input class="a" type="text" value="<?php if(isset($tongam)) echo $tongam; ?>"readonly></td>
        </tr>
        <tr>
            <td>Vị trí phần tử giá trị 0: </td>
            <td><input class="a"  type="text" value="<?php if(isset($vitri)) echo $vitri; ?>"readonly></td>
        </tr>
        <tr>
            <td>Các phần tử tăng dần: </td>
            <td><input class="mang" type="text" value="<?php if(isset($sapxep)) echo $sapxep; ?>" readonly></td>
        </tr>
    </table>
</form>

</body>
</html>