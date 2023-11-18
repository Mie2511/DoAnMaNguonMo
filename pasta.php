<?php
	session_start();
	include 'config-menu.php';
	mysqli_set_charset($conn, 'utf8mb4');
	$query = 'SELECT * FROM my';
	$result = mysqli_query($conn, $query);
	$update = false;
	$idmy = "";
	$tenmy = "";
	$thongtinmy = "";
	$giatienmy = "";
	$photomy = "";

	if (isset($_POST['add'])) {
		$tenmy = $_POST['tenmy'];
		$thongtinmy = $_POST['thongtinmy'];
		$giatienmy = $_POST['giatienmy'];

		$photomy = $_FILES['image']['name'];
		$upload = "uploads-my/" . $photomy;

		$query = "INSERT INTO my(tenmy,thongtinmy,giatienmy,photomy) VALUES(?,?,?,?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssss", $tenmy, $thongtinmy, $giatienmy, $upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);
		header('location:quanly-burger.php');
		$_SESSION['response'] = "Successfully Inserted to the database!";
		$_SESSION['res_type'] = "success";
	}

	if (isset($_GET['delete'])) {
		$idmy = $_GET['delete'];

		$sql = "SELECT photomy FROM my WHERE idmy=?";
		$stmt2 = $conn->prepare($sql);
		$stmt2->bind_param("i", $idmy);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		$row = $result2->fetch_assoc();

		$imagepath = $row['photomy'];
		unlink($imagepath);

		$query = "DELETE FROM burger WHERE idmy=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $idmy);
		$stmt->execute();

		header('location:quanly-mi.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}

	if (isset($_GET['edit'])) {
		$idmy = $_GET['edit'];

		$query = "SELECT * FROM my WHERE idmy=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $idmy);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$idmy = $row['idmy'];
		$tenmy = $row['tenmy'];
		$thongtinmy = $row['thongtinmy'];
		$giatienmy = $row['giatienmy'];
		$photomy = $row['photomy'];

		$update = true;
	}

	if (isset($_POST['update'])) {
		$idmy = $_POST['idmy'];
		$tenmy = $_POST['tenmy'];
		$thongtinmy = $_POST['thongtinmy'];
		$giatienmy = $_POST['giatienmy'];

		$query = "UPDATE my SET tenmy=?, thongtinmy=?, giatienmy=? WHERE idmy=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sssi", $tenmy, $thongtinmy, $giatienmy, $idmy);
		$stmt->execute();

		$_SESSION['response'] = "Updated Successfully!";
		$_SESSION['res_type'] = "primary";

		header('location:quanly-mi.php');
	}

	if (isset($_GET['details'])) {
		$idmy = $_GET['details'];
		$query = "SELECT * FROM my WHERE idmy=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $idmy);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$vidmy = $row['idmy'];
		$vtenmy = $row['tenmy'];
		$vthongtinmy = $row['thongtinmy'];
		$vgiatienmy = $row['giatienmy'];
		$vphotomy = $row['photomy'];
	}
?>