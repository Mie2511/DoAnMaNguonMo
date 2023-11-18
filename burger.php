<?php
	session_start();
	include 'config-menu.php';
	mysqli_set_charset($conn, 'utf8mb4');
	$query = 'SELECT * FROM burger';
	$result = mysqli_query($conn, $query);
	$update = false;
	$idBG = "";
	$tenBG = "";
	$thongtinBG = "";
	$giatienBG = "";
	$photoBG = "";

	if (isset($_POST['add'])) {
		$tenBG = $_POST['tenBG'];
		$thongtinBG = $_POST['thongtinBG'];
		$giatienBG = $_POST['giatienBG'];

		$photoBG = $_FILES['image']['name'];
		$upload = "uploads-BG/" . $photoBG;

		$query = "INSERT INTO burger(tenBG,thongtinBG,giatienBG,photoBG) VALUES(?,?,?,?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssss", $tenBG, $thongtinBG, $giatienBG, $upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);
		header('location:quanly-burger.php');
		$_SESSION['response'] = "Successfully Inserted to the database!";
		$_SESSION['res_type'] = "success";
	}

	if (isset($_GET['delete'])) {
		$idBG = $_GET['delete'];

		$sql = "SELECT photoBG FROM burger WHERE idBG=?";
		$stmt2 = $conn->prepare($sql);
		$stmt2->bind_param("i", $idBG);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		$row = $result2->fetch_assoc();

		$imagepath = $row['photoBG'];
		unlink($imagepath);

		$query = "DELETE FROM burger WHERE idBG=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $idBG);
		$stmt->execute();

		header('location:quanly-burger.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}

	if (isset($_GET['edit'])) {
		$idBG = $_GET['edit'];

		$query = "SELECT * FROM burger WHERE idBG=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $idBG);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$idBG = $row['idBG'];
		$tenBG = $row['tenBG'];
		$thongtinBG = $row['thongtinBG'];
		$giatienBG = $row['giatienBG'];
		$photoBG = $row['photoBG'];

		$update = true;
	}

	if (isset($_POST['update'])) {
		$idBG = $_POST['idBG'];
		$tenBG = $_POST['tenBG'];
		$thongtinBG = $_POST['thongtinBG'];
		$giatienBG = $_POST['giatienBG'];

		$query = "UPDATE burger SET tenBG=?, thongtinBG=?, giatienBG=? WHERE idBG=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sssi", $tenBG, $thongtinBG, $giatienBG, $idBG);
		$stmt->execute();

		$_SESSION['response'] = "Updated Successfully!";
		$_SESSION['res_type'] = "primary";

		header('location:quanly-burger.php');
	}

	if (isset($_GET['details'])) {
		$idBG = $_GET['details'];
		$query = "SELECT * FROM burger WHERE idBG=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $idBG);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$vidBG = $row['idBG'];
		$vtenBG = $row['tenBG'];
		$vthongtinBG = $row['thongtinBG'];
		$vgiatienBG = $row['giatienBG'];
		$vphotoBG = $row['photoBG'];
	}
?>