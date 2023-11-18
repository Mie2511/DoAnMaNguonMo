<?php
	session_start();
	include 'config-menu.php';
	mysqli_set_charset($conn,'utf8mb4');
    $query = 'SELECT * FROM pizza';
    $result = mysqli_query($conn, $query);
	$update=false;
	$id="";
	$ten="";
	$thongtin="";
	$size="";
	$giatien="";
    $photo="";
    

	if(isset($_POST['add'])){
		$ten=$_POST['ten'];
		$thongtin=$_POST['thongtin'];
		$size=$_POST['size'];
        $giatien=$_POST['giatien'];

		$photo=$_FILES['image']['name'];
		$upload="uploads-pizza/".$photo;

		$query="INSERT INTO pizza(ten,thongtin,size,giatien,photo)VALUES(?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssss",$ten,$thongtin,$size,$giatien,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);
		header('location:quanly-pizza.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";

	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT photo FROM pizza WHERE id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['photo'];
		unlink($imagepath);

		$query="DELETE FROM pizza WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:quanly-pizza.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM pizza WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$ten=$row['ten'];
		$thongtin=$row['thongtin'];
		$size=$row['size'];
        $giatien=$row['giatien'];
		$photo=$row['photo'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$ten = $_POST['ten'];
        $thongtin = $_POST['thongtin'];
		$size = $_POST['size'];
        $giatien = $_POST['giatien'];

		$query = "UPDATE pizza SET ten=?, thongtin=?, size=?, giatien=? WHERE id=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssssi", $ten, $thongtin, $size, $giatien, $id);
		$stmt->execute();

		$_SESSION['response'] = "Updated Successfully!";
		$_SESSION['res_type'] = "primary";

		header('location:quanly-pizza.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM pizza WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vten=$row['ten'];
		$vthongtin=$row['thongtin'];
		$vsize=$row['size'];
        $vgiatien=$row['giatien'];
		$vphoto=$row['photo'];
	}
?>