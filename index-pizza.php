<?php
  include 'pizza.php';
  include 'action-cart.php';
  include 'config-cart.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza </title>
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

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    function confirmAction() {
        // Kiểm tra vai trò của người dùng ở đây
        if (role === "admin") {
            // Hiển thị hộp thoại "Bạn muốn đến trang quản lí cửa hàng hay Đăng xuất?" cho người dùng là admin
            Swal.fire({
                title: "Bạn muốn đến trang quản lí cửa hàng hay Đăng xuất?",
                showCancelButton: true,
                confirmButtonText: "Đăng xuất",
                cancelButtonText: "Quản lí",
                reverseButtons: true,
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
        } else {
            // Hiển thị hộp thoại "Bạn có muốn đăng xuất?" cho người dùng không phải admin
            Swal.fire({
                title: "Bạn có muốn đăng xuất?",
                showCancelButton: true,
                confirmButtonText: "Đăng xuất",
                cancelButtonText: "Hủy",
                reverseButtons: true,
                customClass: {
                    confirmButton: 'swal-cancel-button',
                    cancelButton: 'swal-confirm-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "logout.php";
                }
            });
        }
    }
</script>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		      <a class="navbar-brand" href="index-user.php"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>ConRongChauTien</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index-user.php" class="nav-link">Trang chủ</a></li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="menu.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thực đơn</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:burlywood; font-size: small; ">
            <a class="dropdown-item" href="index-pizza.php" >Pizza</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index-burger.php">Bánh Burger</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index-drink.php">Nước uống</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index-mi.php">Mì Ý</a>
        </div>
    </li>
            <li class="nav-item"><a href="services.php" class="nav-link">Dịch vụ</a></li>
            <li class="nav-item"><a href="blog.php" class="nav-link">Blog của quán</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">Về quán nhóm tui</a></li>
            <li class="nav-item active"><a href="contact.php" class="nav-link">Liên hệ</a></li>
            <li class="nav-item"><a href="giohang.php" class="nav-link">Giỏ hàng</a></li>
            <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $role = ""; // Khai báo biến vai trò của người dùng

        // Kiểm tra vai trò của người dùng (ví dụ: dựa vào dữ liệu từ CSDL hoặc xử lý logic khác)
        // Gán giá trị cho biến $role tương ứng với vai trò của người dùng

        echo '<script>var role = "' . $role . '";</script>';

        if ($username === 'admin') {
            echo '<li class="nav-item"><a class="nav-link" style="color: white; font-weight:bold; cursor:pointer;" onclick="confirmAction()">Xin chào, <span style="text-decoration: underline; color:white; font-weight: bold;">' . $username . '</span></a></li>';
            echo '<script>
                    function confirmAction() {
                        Swal.fire({
                            title: "Bạn muốn đến trang quản lí cửa hàng hay Đăng xuất?",
                            showCancelButton: true,
                            confirmButtonText: "Đăng xuất",
                            cancelButtonText: "Quản lí",
                            reverseButtons: true,
                            customClass: {
                                confirmButton: "swal-cancel-button",
                                cancelButton: "swal-confirm-button"
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "logout.php";
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                window.location.href = "index-qtv.php";
                            }
                        });
                    }
                </script>';
        } else {
            echo '<li class="nav-item"><a class="nav-link" style="color: white; font-weight:bold; cursor:pointer;" onclick="confirmAction()">Xin chào, <span style="text-decoration: underline; color:white; font-weight: bold;">' . $username . '</span></a></li>';
            echo '<script>
                    function confirmAction() {
                        Swal.fire({
                            title: "Bạn có muốn đăng xuất?",
                            showCancelButton: true,
                            confirmButtonText: "Đăng xuất",
                            cancelButtonText: "Hủy",
                            reverseButtons: true,
                            customClass: {
                                confirmButton: "swal-cancel-button",
                                cancelButton: "swal-confirm-button"
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "logout.php";
                            }
                        });
                    }
                </script>';
        }
    } else {
        echo '<li class="nav-item"><a href="login.php" class="nav-link">Đăng nhập</a></li>';
        echo '<script>var role = "";</script>'; // Thêm dòng này để đảm bảo biến "role" có giá trị rỗng khi người dùng chưa đăng nhập
    }
?>
          </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Pizza nóng hổi<br> Vừa thổi vừa ăn</h2>
            <p>Pizza được giao đến khi vừa mới ra lò.</p>
          </div>
        </div>
    	</div>
    	<div class="container-wrap">
    		
        <?php
  $query = 'SELECT * FROM pizza';
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result();
?>

<div class="row no-gutters d-flex">
  <?php $index = 0; // Thêm biến chỉ mục ?>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <div class="col-lg-4 d-flex ftco-animate">
      <div class="services-wrap d-flex">
        <a href="#" class="img" style="background-image: url(<?= $row['photo']; ?>);"></a>
        <div class="text p-4">
          <h3><?= $row['ten']; ?></h3>
          <p><?= $row['thongtin']; ?></p>
          <p class="price"><span>&nbsp;&nbsp;<?= $row['giatien']; ?></span>
            <form action="action-cart.php" method="POST" onsubmit="addToCart(event, <?= $index; ?>)"> <!-- Truyền chỉ mục vào hàm addToCart -->
              <input type="hidden" name="tenmon[]" value="<?= $row['ten']; ?>"> <!-- Sử dụng mảng cho tên -->
              <input type="hidden" name="giatien[]" value="<?= $row['giatien']; ?>"> <!-- Sử dụng mảng cho giá tiền -->
              <input type="number" name="soluong[]" placeholder="Nhập số lượng" style="width:150px">
              <button type="submit" class="ml-2 btn btn-white btn-outline-white">Đặt hàng</button>
            </form>
          </p>
        </div>
      </div>
    </div>
    <?php $index++; // Tăng chỉ mục ?>
  <?php } ?>
</div>

<script>
  function addToCart(event, index) {
    event.preventDefault();

    var form = event.target;
    var formData = new FormData(form);

    fetch(form.action, {
      method: 'POST',
      body: formData
    })
    .then(function(response) {
      return response.text();
    })
    .then(function(result) {
      alert(result);
      form.reset(); // Đặt lại form để nhập các mục khác
    })
    .catch(function(error) {
      console.error('Lỗi:', error);
    });
  }
</script>
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Order tại chỗ</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Pizza nè.</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-1.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Margherita</span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Phô mai mozzarella và xốt cà chua.</p>
	        			</div>
						<span class="price"><strong>S</strong> 99,000 </span>&nbsp;&nbsp; 
						<span class="price"><strong>M</strong> 165,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 199,000 </span>&nbsp;&nbsp;
        			</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-2.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Hawaiian </span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Thịt xông khói, giăm bông, dứa, phô mai và xốt cà chua.</p>
	        			</div>
						<span class="price"><strong>S</strong> 155,000 </span>&nbsp;&nbsp; 
						<span class="price"><strong>M</strong> 195,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 265,000 </span>&nbsp;&nbsp;
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-3.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>American Style</span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Bò cay, sườn nướng, gà nướng, ngô hạt, hành tây, phô mai & xốt BBQ./p>
	        			</div>
						<span class="price"><strong>S</strong> 159,000 </span>&nbsp;&nbsp; 
						<span class="price"><strong>M</strong> 199,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 265,000 </span>&nbsp;&nbsp;
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-4.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>TEX-MEX</span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Gà nướng Mexico, salami, nấm, quả oliu & phô mai.</p>
	        			</div>
						<span class="price"><strong>S</strong> 159,000 </span>&nbsp;&nbsp; 
						<span class="price"><strong>M</strong> 199,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 265,000 </span>&nbsp;&nbsp;
	        		</div>
        		</div>
        	</div>

        	<div class="col-md-6">
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-5.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Beefy</span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Bò cay, salami, giăm bông, ngô hạt, phô mai & xốt mayonnaise.</p>
	        			</div>
						<span class="price"><strong>S</strong> 159,000 </span>&nbsp;&nbsp; 
						<span class="price"><strong>M</strong> 199,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 265,000 </span>&nbsp;&nbsp;
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-6.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Tuna</span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Cá ngừ, hành tây, ngô hạt, ớt chuông, phô mai & xốt mayonnaise.</p>
	        			</div>
						<span class="price"><strong>S</strong> 155,000 </span>&nbsp;&nbsp; 
						<span class="price"><strong>M</strong> 195,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 260,000 </span>&nbsp;&nbsp;
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-7.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Marinara</span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Hải sản tươi: Tôm, mực, cá vược, thanh cua, phô mai & xốt cà chua.</p>
	        			</div>
						<span class="price"><strong>M</strong> 245,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 325,000 </span>&nbsp;&nbsp;
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-8.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Pepperoni</span></h3>
	        			</div>
	        			<div class="d-block">
	        				<p>Xúc xích, phô mai mozzarella & xốt cà chua</p>
	        			</div> 
						<span class="price"><strong>M</strong> 245,000 </span>&nbsp;&nbsp;
						<span class="price"><strong>L</strong> 325,000 </span>&nbsp;&nbsp;
	        		</div>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

    

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Địa chỉ</h2>
              <p>Ở trường DH Nha Trang.</p>
			  <br>
			  <h2>HOTLINE</h2>
			  <p> +84.258.383 1148</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">GIỚI THIỆU__________</h2>
              <div class="block-21 mb-4 d-flex">
                <div class="text">
                  <p>- CHÍNH SÁCH THANH TOÁN</p>
				  <p>- CHÍNH SÁCH BÁN HÀNG</p>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
				<div class="text">
                  <h2>LIÊN HỆ____________</h2>
				  <p>TÌM KIẾM</p>
				  <p>GIỚI THIỆU</p>
				  <p>CHÍNH SÁCH ĐỔI TRẢ</p>	
				  <p>CHÍNH SÁCH BẢO MẬT</p>
				  <p>ĐIỀU KHOẢN DỊCH VỤ</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">THEO DÕI TRANG ĐỂ NHẬN THÔNG BÁO</h2>
            	<div class="block-23 mb-3">
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FNTUedu.Fanpage&tabs=timeline&width=400&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" 
					width="400" 
					height="130" 
					style="border:none;overflow:hidden" 
					scrolling="no" 
					frameborder="0" 
					allowfullscreen="true" 
					allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
	            </div>
            </div>
			<div class="ftco-footer-widget mb-4">
				<h2>ĐƯỜNG ĐẾN CON RỒNG CHÁU TIÊN</h2>
				<div class="block-23 mb-3">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3898.7062240814384!2d109.19980097513348!3d12.268148929910277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1700062054813!5m2!1svi!2s" 
					width="400" 
					height="250" 
					style="border:0;" 
					allowfullscreen="" loading="lazy" 
					referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <h2>Nhóm Mã Nguồn Mở PHP - GV Nguyễn Hải Triều - CNTT2</h2>
			<h4>Thành viên nhóm gồm:</h4>
			<p>Phạm Hoàng Long</p>
			<p>Lê Hoàng Việt</p>
			<p>Vũ Hoài Thu</p>
			<p>Dương Thị Thanh Trúc</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>