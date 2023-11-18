<?php
    if(isset($_POST['submit'])) {
        $n = $_POST['n'];
        if ($n >= 1 && $n <= 19) {
            $arr = sinhMang($n);
            $chinhPhuongArr = lietKeChinhPhuong($arr);
            $arr_sum = tongMang($chinhPhuongArr);
        } else $msg = "Nhập lại";
    }


    function sinhMang($n) {
        $arr = array();
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = rand(-100, 100);
        }
        return $arr;
    }


    function lietKeChinhPhuong($arr) {
        $chinhPhuongArr = array();
        foreach ($arr as $number) {
            if (isChinhPhuong($number)) {
                $chinhPhuongArr[] = $number;
            }
        }
        return $chinhPhuongArr;
    }

    function isChinhPhuong($num) {
        return $num >= 0 && sqrt($num) == (int)sqrt($num);
    }

    function tongMang($arr) {
        $sum = 0;
        foreach ($arr as $value) {
            $sum += $value;
        }
        return $sum;
    }


?>

<form action="" method="post">
    <?php if(isset($msg)) echo "<p style='color: red'> $msg </p>"; ?>
    <table>
        <tr>
            <td colspan="2">
                <h2 style="text-transform: uppercase;color: #1d78ac">phát sinh mảng và tính toán</h2>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="n" style="width: 100%;" value="<?php if(isset($n)) echo $n; ?>">
            </td>
            <td>
                <input type="submit" name="submit" style="background: lightgoldenrodyellow;" value="Phát sinh và tính toán">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea name="" id="" cols="48" rows="10"><?php
                         if (!empty($arr)) {
                             echo "Mảng: " . implode(" | ", $arr);
                         }
                        echo "\nDanh sách số chính phương: " . implode(" | ", $chinhPhuongArr) . "\n";
                         echo "\nTổng mảng: $arr_sum";
                 ?></textarea>
            </td>
        </tr>
    </table>
</form>