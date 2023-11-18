<?php
  include 'pasta.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Mì Ý</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

  <!-- Thư viện jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tệp tin JavaScript của Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmAction() {
        Swal.fire({
            title: "Bạn muốn chuyển đến trang quản lí cửa hàng hay Đăng xuất?",
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: "Đăng xuất",
            cancelButtonText: "Quản lí",
            customClass: {
                confirmButton: 'swal-cancel-button',
                cancelButton: 'swal-confirm-button'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "logout.php";
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                window.location.href = "index-qtv.php";
            }
        });
    }
</script>



</head>

<body>
<style>
    .swal-confirm-button {
        background-color: #4CAF50;
        color: white;
        float: left;
    }

    .swal-cancel-button {
        background-color: #f44336;
        color: white;
        float: right;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		    <a class="navbar-brand" href="index-user.php"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>ConRongChauTien</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index-qtv.php" class="nav-link">Quản lý nhân viên</a></li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý thực đơn</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:burlywood; ">
          <a class="dropdown-item" href="quanly-pizza.php">Pizza</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="quanly-burger.php">Bánh Burger</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="quanly-nuocuong.php">Nước uống</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="quanly-mi.php">Mì Ý</a>
        </div>
      </li>
			<?php
    		if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                if ($username === 'admin') {
                    echo '<li class="nav-item"><a class="nav-link" style="color: white; font-weight:bold; cursor:pointer;" onclick="confirmAction()">Xin chào, <span style="text-decoration: underline; color:white; font-weight: bold;">' . $username . '</span></a></li>';
                } else {
                    echo '<li class="nav-item"><a class="nav-link" style="color: white; font-weight:bold;">Xin chào, <span style="text-decoration: underline; color:white; font-weight: bold;">' . $username . '</span></a></li>';
                }
            } else {
        		echo '<li class="nav-item"><a href="login.php" class="nav-link">Đăng nhập</a></li>';
    		}
			?> 
	        </ul>
	      </div>
		  </div>
	  </nav>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">Thêm loại mì ý</h3>
        <form action="pasta.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idmy" value="<?= $idmy; ?>">
          <div class="form-group">
            <input type="text" name="tenmy" value="<?= $tenmy; ?>" class="form-control" placeholder="Tên Mì" required>
          </div>
          <div class="form-group">
            <input type="thongtinmy" name="thongtinmy" value="<?= $thongtinmy; ?>" class="form-control" placeholder="Mô tả" required>
          </div>
          <div class="form-group">
            <input type="tel" name="giatienmy" value="<?= $giatienmy; ?>" class="form-control" placeholder="Giá tiền" required>
          </div>
          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $photomy; ?>">
            <input type="file" name="image" class="custom-file">
            <img src="<?= $photomy; ?>" width="120" class="img-thumbnail">
          </div>
          <div class="form-group">
            <?php if ($update == true) { ?>
            <input type="submit" name="update" class="btn btn-success btn-block" value="Cập nhật">
            <?php } else { ?>
            <input type="submit" name="add" class="btn btn-primary btn-block" value="Thêm">
            <?php } ?>
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <?php
          $query = 'SELECT * FROM my';
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>
        <h3 class="text-center text-info">Mì Ý</h3>
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Ảnh</th>
              <th>Tên </th>
              <th>Thông tin</th>
              <th>Giá tiền</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['idmy']; ?></td>
              <td><img src="<?= $row['photomy']; ?>" width="25"></td>
              <td><?= $row['tenmy']; ?></td>
              <td><?= $row['thongtinmy']; ?></td>
              <td><?= $row['giatienmy']; ?></td>
              <td>
                <a href="details-pasta.php?details=<?= $row['idmy']; ?>" class="badge badge-primary p-2">Thông tin</a> |
                <a href="pasta.php?delete=<?= $row['idmy']; ?>" class="badge badge-danger p-2" onclick="return confirm('Bạn có muốn xóa cái này?');">Xóa</a> |
                <a href="quanly-pasta.php?edit=<?= $row['idmy']; ?>" class="badge badge-success p-2">Sửa</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
</body>

</html>