<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://kit.fontawesome.com/6561ce4c94.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <?php
            require('db.php');

            if (isset($_REQUEST['username'])) {
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($con, $username);
                $email    = stripslashes($_REQUEST['email'] ?? '');
                $email    = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_REQUEST['password'] ?? '');
                $password = mysqli_real_escape_string($con, $password);
                $sdt      = stripslashes($_REQUEST['sdt'] ?? '');
                $sdt      = mysqli_real_escape_string($con, $sdt);
                $query    = "INSERT INTO `users` (username, password, email, sdt)
                     VALUES ('$username', '$password', '$email', '$sdt')";
                $result   = mysqli_query($con, $query);
                if ($result) {
                    echo "<div class='form'>
                          <h3>Đăng ký thành công.</h3><br/>
                          <p class='link'>Bấm vào đây để <a href='login.php'>Đăng nhập</a></p>
                          </div>";
                } else {
                    echo "<div class='form'>
                          <h3>Yêu cầu nhập đầy đủ thông tin.</h3><br/>
                          <p class='link'>Bấm vào đây để <a href='registration.php'>Đăng ký</a> again.</p>
                          </div>";
                }
            } else {
            ?>
                <form class="form" action="" method="post">
                    <h1 class="login-title">Đăng ký</h1>
                    <input type="text" class="login-input" name="username" placeholder="Tên người dùng" required />
                    <input type="text" class="login-input" name="email" placeholder="Email">
                    <div class="password-container">
                        <input type="password" class="login-input" name="password" id="password" placeholder="Mật khẩu">
                        <span class="password-toggle-icon" onclick="togglePassword()">
                            <i id="password-toggle-icon" class="fas fa-eye"></i>
                        </span>
                    </div>
                    <input type="number" class="login-input" name="sdt" placeholder="Số điện thoại">
                    <input type="submit" name="submit" value="Đăng ký" class="login-button">
                    <p class="link">Bạn đã có tài khoản? 👉<a href="login.php">Đăng nhập ngay!</a></p>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/bglog.png');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            max-width: 300px;
            margin-right: 70px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: antiquewhite;
        }

        .login-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-input {
            width: 93%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .password-container {
            position: relative;
        }

        .password-toggle-icon {
            position: absolute;
            top: 38%;
            right: 10px;
            transform: translateY(-50%);
            color: #888;
            cursor: pointer;
        }

.login-button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-button:hover {
    background-color: #45a049;
}

.link {
    text-align: center;
    margin-top: 10px;
}

.link a {
    color: #1e88e5;
    text-decoration: none;
}

.link a:hover {
    text-decoration: underline;
}
</style>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const passwordToggleIcon = document.getElementById("password-toggle-icon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggleIcon.classList.remove("fa-eye");
            passwordToggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            passwordToggleIcon.classList.remove("fa-eye-slash");
            passwordToggleIcon.classList.add("fa-eye");
        }
    }
</script>
</body>
</html>