<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

    $mysql = new mysqli('localhost', 'root', '', 'chuyenbay');

    if ($mysql->connect_errno){
        echo "Lỗi kết nối: " . $mysql->connect_error;
        exit();
    }

    $quoc_gia = getQuocGia($mysql);

    $tentp = $_POST['tentp'];
    $tenbang = $_POST['tenbang'];
    $tenqg = $_POST['tenqg'];

    if(isset($_POST['add'])) {
        addTP($mysql,$tentp, $tenbang, $tenqg);
    }

    if(isset($_POST['show'])) {
        $data = show($mysql);
    }

    function addTP($mysql,$tentp,$tenbang,$tenqg) {
        $sql = "INSERT INTO `thanh_pho` (`Ten_thanh_pho`, `Ten_bang_tinh`, `Quoc_gia`) VALUES ('$tentp', '$tenbang', '$tenqg')";
        $mysql->query($sql);
    }

    function show($mysql) {
//        $sql = "SELECT * FROM thanh_pho as tp JOIN quoc_gia as qg on tp.Quoc_gia = qg.Ma_quoc_gia ";
        $sql = "SELECT * FROM `chuyen_bay` WHERE `ma_tp_khoi_hanh` = 26 OR `ma_tp_den` = 26";
        $result = $mysql->query($sql);
        if ($result == TRUE) {
            $data = $result->fetch_all(MYSQLI_ASSOC) ;
        } else {
            echo "<p style='color: red'>Lấy dữ liệu thất bại!</p>";
        }
        return $data;
    }

    function getQuocGia($mysql) {
        $result = $mysql->query("SELECT * FROM Quoc_gia");
        $quoc_gia = $result->fetch_all(MYSQLI_ASSOC);
        return $quoc_gia;
    }

?>
<form action="" method="post">
    <table>
        <tr>
            <td>
                <label for="tentp">Tên thành phố</label></td>
                <td colspan="2"><input type="text" name="tentp" id="tentp"></td>
            <tr>
        <tr>
            <td><label for="tenbang">Tên bang/tỉnh</label></td>
            <td colspan="2"><input type="text" name="tenbang" id="tenbang"></td>
        </tr>
        <tr>
            <td><label for="tenqg">Tên quốc gia</label></td>
            <td colspan="2">
<!--                <input type="text" name="tenqg" id="tenqg">-->
                <select name="tenqg" id="tenqg">
                <?php
                    foreach ($quoc_gia as $row) {
                ?>
                    <option value="<?= $row['Ma_quoc_gia'] ?>"><?= $row['Ten_quoc_gia']?></option>
                <?php
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="add" value="Thêm dữ liệu">
            </td>
            <td>
                <input type="reset" name="reset" value="Reset dữ liệu">
            </td>
            <td>
                <input type="submit" name="show" value="Xem dữ liệu">
            </td>
        </tr>
    </table>
<!--    <h3>Thông tin thành phố</h3>-->
<!--    <table>-->
<!--        <tr>-->
<!--            <th>Mã thành phố</th>-->
<!--            <th>Tên thành phố</th>-->
<!--            <th>Tên bang tỉnh</th>-->
<!--            <th>Tên quốc gia</th>-->
<!--        </tr>-->
<!--        --><?php
//            foreach ($data as $row) {
//        ?>
<!--            <tr>-->
<!--                <td>--><?//= $row['Ma_thanh_pho'] ?><!--</td>-->
<!--                <td>--><?//= $row['Ten_thanh_pho'] ?><!--</td>-->
<!--                <td>--><?//= $row['Ten_bang_tinh'] ?><!--</td>-->
<!--                <td>--><?//= $row['Ten_quoc_gia'] ?><!--</td>-->
<!--            </tr>-->
<!--        --><?php
//            }
//        ?>
<!--    </table>-->

    <h3>Thông tin chuyến bay liên quan đến thành phố Nha Trang</h3>
    <table>
        <tr>
            <th>Mã chuyến bay</th>
            <th>Số hiệu chuyến bay</th>
            <th>Mã thành phố khởi hành</th>
            <th>Ngày khởi hành</th>
            <th>Mã thành phố đến</th>
            <th>Ngày đến</th>
            <th>Giá vé</th>
        </tr>
        <?php
            foreach ($data as $row) {
        ?>
            <tr>
                <td><?= $row['ma_chuyen_bay']?></td>
                <td><?= $row['so_hieu_chuyen_bay']?></td>
                <td><?= $row['ma_tp_khoi_hanh'] ?></td>
                <td><?= $row['ngay_khoi_hanh']?></td>
                <td><?= $row['ma_tp_den']?></td>
                <td><?= $row['ngay_den']?></td>
                <td><?= $row['gia_ve']?></td>
            </tr>
        <?php
            }
        ?>
    </table>

</form>
</body>
</html>