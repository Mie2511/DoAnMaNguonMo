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
  <?php
    session_start();
  	?>

  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		      <a class="navbar-brand" href="index-user.php"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>ConRongChauTien</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <ul class="navbar-nav ml-auto">
    <li class="nav-item active"><a href="index-user.php" class="nav-link">Trang chủ</a></li>

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
	          <li class="nav-item active"><a href="blog.php" class="nav-link">Blog của quán</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">Về quán nhóm tui</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Liên hệ</a></li>
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

    <section class="home-slider owl-carousel img" >
      <div class="slider-item" style="background-image: url(images/blog1.png);"></div>
    </section>
    

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
                    <h2 class="mb-3"> Caucasian Pizza </h2>
                    <p>Caucasian Pizza là một loại pizza có nguồn gốc từ vùng Caucasia, một khu vực nằm ở phía Đông Nam châu Âu và phía Tây Nam châu Á. Với đa dạng văn hóa và ẩm thực, vùng này đã truyền cảm hứng cho một hương vị pizza độc đáo.</p>
                    <p>
                      <img src="images/image_1.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Caucasian Pizza mang đến cho bạn hương vị đa dạng và độc đáo mà bạn chưa từng trải nghiệm. Với các thành phần tươi ngon như sốt cà chua đậm đà, phô mai béo ngậy, các loại thịt thơm ngon và các gia vị đặc trưng, mỗi miếng pizza đều là một cuộc phiêu lưu hương vị đặc biệt. Hãy chuẩn bị để khám phá những trải nghiệm hương vị mới mẻ!
                    </p>
                    <h2 class="mb-3 mt-5"></h2>
                    <p>Tiệm Con Rồng Cháu Tiên chúng tôi sử dụng nguyên liệu tươi ngon và chất lượng cao để tạo ra Caucasian Pizza hoàn hảo. Từ bánh mềm mịn cho đến các thành phần như sốt cà chua tươi, phô mai tươi ngon và các loại thịt tươi ngon, chúng tôi đảm bảo rằng mỗi miếng pizza sẽ mang đến sự thỏa mãn tối đa cho bạn.</p>
                    <p>
                      <img src="images/image_2.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Đừng lo lắng về việc lấy hàng! Chúng tôi cung cấp dịch vụ giao hàng nhanh chóng và tiện lợi, đảm bảo rằng mỗi miếng pizza Caucasian sẽ được đưa đến tận cửa nhà bạn. Bạn chỉ cần ngồi thoải mái, thưởng thức và tận hưởng hương vị độc đáo mà chúng tôi mang đến.</p>
                    <p>Hãy đặt gọi ngay và khám phá hương vị độc đáo từ Đất Nước Caucasia. Đừng bỏ lỡ cơ hội thưởng thức trọn vẹn sự đa dạng và độc đáo của Caucasian Pizza. Gọi ngay để đặt hàng và trải nghiệm hương vị mới mẻ và thú vị ngay hôm nay!
                    </p>            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">Sức khỏe</a>
                <a href="#" class="tag-cloud-link">Food</a>
                <a href="#" class="tag-cloud-link">Pizza</a>
                <a href="#" class="tag-cloud-link">Con rồng cháu tiên</a>
              </div>
            </div>
            
            <div class="about-author d-flex">
              <div class="bio align-self-md-center mr-5">
                <img src="images/person_4.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc align-self-md-center">
                <h3>Phạm Hoàng Long</h3>
                <p>Tạo cơ sở dữ liệu, làm đăng nhập/đăng ký, tạo trang admin</p>
              </div>
            </div>


            <div class="pt-5 mt-5">
              <h3 class="mb-5">Bình luận</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/per1.jpg" alt="Image placeholder" width="100px" height="100px">
                  </div>
                  <div class="comment-body">
                    <h3>Jennie Kim</h3>
                    <div class="meta">Oct 19, 2023 at 2:21pm</div>
                    <p>Wow, so good</p>
                    <p><a href="#" class="reply">Trả lời</a></p>
                  </div>
                </li>

                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/per2.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Lisa Manoban</h3>
                    <div class="meta">Oct 30, 2023 at 19:21pm</div>
                    <p>Looks so delicious</p>
                    <p><a href="#" class="reply">Trả lời</a></p>
                  </div>

                  <ul class="children">
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="images/per3.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>Roseanne</h3>
                        <div class="meta">Oct 30, 2023 at 19:23pm</div>
                        <p><a style="color: beige;">@Lisa Manoban</a> Lets eat pizza together!</p>
                        <p><a href="#" class="reply">Trả lời</a></p>
                      </div>


                      <ul class="children">
                        <li class="comment">
                          <div class="vcard bio">
                            <img src="images/per2.jpg" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>Lisa Manoban</h3>
                            <div class="meta">Oct 30, 2023 at 19:27pm</div>
                            <p><a style="color: beige;">@Roseanne</a> Lets go. <a style="color: beige;">@sooooyaaaa__</a>Going to pizza??</p>
                            <p><a href="#" class="reply">Trả lời</a></p>
                          </div>

                            <ul class="children">
                              <li class="comment">
                                <div class="vcard bio">
                                  <img src="images/per4.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                  <h3>sooooyaaaa__</h3>
                                  <div class="meta">Oct 30, 2023 at 19:31pm</div>
                                  <p><a style="color: beige;">@Lisa Manoban</a> I dunno. Let me see.</p>
                                  <p><a href="#" class="reply">Trả lời</a></p>
                                </div>
                              </li>
                            </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/per5.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Taylor Swift</h3>
                    <div class="meta">Nov 5, 2023 at 2:21am</div>
                    <p>That I can see you, oh, I can see you<br>
                      Oh, I see you, I see you, baby, I see you<br>
                      I see you, I see you, baby, oh, baby</p>
                    <p><a href="#" class="reply">Trả lời</a></p>
                  </div>
                </li>
              </ul>
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Để lại bình luận của bạn</h3>
                <form action="#">
                  <div class="form-group">
                    <label for="name">Tên *</label>
                    <input type="text" class="form-control" id="name">
                  </div>

                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>

                  <div class="form-group">
                    <label for="message">Lời nhắn</label>
                    <textarea name="" id="message" cols="10" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Gửi" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                	<div class="icon">
	                  <span class="icon-search"></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Bạn cần tìm gì...">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Phân loại</h3>
                <li><a href="#">Mì Ý <span>(12)</span></a></li>
                <li><a href="#">Nước uống <span>(6)</span></a></li>
                <li><a href="#">Pizza <span>(8)</span></a></li>
                <li><a href="#">Bánh Burgers <span>(4)</span></a></li>
                <li><a href="#">Combo nhanh <span>(6)</span></a></li>
                <li><a href="#">Đồ ăn Việt Nam <span>(10)</span></a></li>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Bài viết gần đây</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Món ăn tuyệt vời</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 12, 2023</a></div>
                    <div><a href="#"><span class="icon-person"></span> MieMie</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Những cách làm mì ý đơn giản tại nhà</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 12, 2023</a></div>
                    <div><a href="#"><span class="icon-person"></span> Phạm H.Long</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Pizza - một món ăn độc đáo du nhập vào Việt Nam</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Lê Việt</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Thẻ</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">đồ ăn</a>
                <a href="#" class="tag-cloud-link">nấu ăn</a>
                <a href="#" class="tag-cloud-link">giúp ích</a>
                <a href="#" class="tag-cloud-link">ngon</a>
                <a href="#" class="tag-cloud-link">món âu</a>
                <a href="#" class="tag-cloud-link">bữa chính</a>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Web này là đồ án môn PHP</h3>
              <p>Mã nguồn mở - Nguyễn Hải Triều - DH Nha Trang - Order Pizza</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->


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