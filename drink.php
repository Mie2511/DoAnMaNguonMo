<?php
	session_start();
	include 'config-menu.php';
	mysqli_set_charset($conn,'utf8mb4');
    $query = 'SELECT * FROM nuocuong';
    $result = mysqli_query($conn, $query);
	$update=false;
	$idnuoc="";
	$tennuoc="";
	$thongtinnuoc="";
	$giatiennuoc="";
    $photonuoc="";
    

	if(isset($_POST['add'])){
		$tennuoc=$_POST['tennuoc'];
		$thongtinnuoc=$_POST['thongtinnuoc'];
        $giatiennuoc=$_POST['giatiennuoc'];

		$photonuoc=$_FILES['image']['name'];
		$upload="uploads-nuocuong/".$photonuoc;

		$query="INSERT INTO nuocuong(tennuoc,thongtinnuoc,giatiennuoc,photonuoc)VALUES(?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssss",$tennuoc,$thongtinnuoc,$giatiennuoc,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);
		header('location:quanly-nuocuong.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";

	}
	if(isset($_GET['delete'])){
		$idnuoc=$_GET['delete'];

		$sql="SELECT photo FROM nuocuong WHERE idnuoc=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$idnuoc);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['photonuoc'];
		unlink($imagepath);

		$query="DELETE FROM nuocuong WHERE idnuoc=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$idnuoc);
		$stmt->execute();

		header('location:quanly-nuocuong.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$idnuoc=$_GET['edit'];

		$query="SELECT * FROM nuocuong WHERE idnuoc=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$idnuoc);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$idnuoc=$row['idnuoc'];
		$tennuoc=$row['tennuoc'];
		$thongtinnuoc=$row['thongtinnuoc'];
        $giatiennuoc=$row['giatiennuoc'];
		$photonuoc=$row['photonuoc'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$idnuoc = $_POST['idnuoc'];
		$tennuoc = $_POST['tennuoc'];
        $thongtinnuoc=$row['thongtinnuoc'];
        $giatiennuoc=$row['giatiennuoc'];

		$query = "UPDATE nuocuong SET tennuoc=?, thongtinnuocc=?, giatiennuoc=? WHERE idnuoc=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sssi", $tennuoc, $thongtinnuoc, $size, $giatiennuoc, $idnuoc);
		$stmt->execute();

		$_SESSION['response'] = "Updated Successfully!";
		$_SESSION['res_type'] = "primary";

		header('location:quanly-nuocuong.php');
	}

	if(isset($_GET['details'])){
		$idnuoc=$_GET['details'];
		$query="SELECT * FROM nuocuong WHERE idnuoc=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$idnuoc);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vidnuoc=$row['idnuoc'];
		$vtennuoc=$row['tennuoc'];
		$vthongtinnuoc=$row['thongtinnuoc'];
        $vgiatiennuoc=$row['giatiennuoc'];
		$vphotonuoc=$row['photonuoc'];
	}
?>
