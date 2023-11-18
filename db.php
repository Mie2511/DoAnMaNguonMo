<?php
    $con = mysqli_connect("localhost","root","","user");
    if (mysqli_connect_errno()){
        echo "Khong ket noi voi CSDL duoc: " . mysqli_connect_error();
    }
?>