<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css"/>\
</head>
<body>
<?php
    require('db.php');
    session_start();
    
    if (isset($_POST['submit'])) {
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query  = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $query);
        $rows   = mysqli_num_rows($result);
        
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            
            // Kiểm tra nếu tài khoản đăng nhập là admin
            if ($username === 'admin') {
                header("Location: index-qtv.php");
            } else {
                header("Location: index-user.php");
            }
        } else {
            echo "<div class='form'>
                  <h3>Tài khoản chưa được đăng ký hoặc mật khẩu không chính xác.</h3><br/>
                  <p class='link'>Bấm vào đây để <a href='login.php'>Đăng nhập</a> lại.</p>
                  </div>";
        }
    } else {
?>
    <form action="" method="post" name="login" class="form">
        <h1 class="login-title">Đăng nhập</h1>
        <input type="text" class="login-input" name="username" placeholder="Tên người dùng" autofocus="true" required />
        <div class="password-container">
            <input type="password" class="login-input" name="password" id="password" placeholder="Mật khẩu" required />
            <span class="password-toggle-icon" onclick="togglePassword()">
                <i class="fa fa-eye"></i>
            </span>
        </div>
        <input type="submit" value="Đăng nhập" name="submit" class="login-button">
        <p class="link">Bạn chưa có tài khoản? 👉<a href="regis.php">Đăng ký ngay!</a></p>
    </form>
<?php
    }
?>
<style>
    html, body {
        height: 100%;
        
        align-items: center;
        background-image: url('images/bglog.png');
            background-size: cover;
            background-position: center;
    }
    .form {
    max-width: 300px;
    margin: 13% auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    float: right; /* Di chuyển form về phía bên phải */
    margin-right: 50px; /* Căn lề phải cho form */
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

    .login-button {
        width: 101%;
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
    .password-container{
        position: relative;
    }
    .password-toggle-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        color: #888;
        cursor: pointer;
    }

    .password-toggle-icon .fa {
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        cursor: pointer;
        margin-top: 3.5px;
    }
</style>
<script src="https://kit.fontawesome.com/6561ce4c94.js" crossorigin="anonymous"></script>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById('password');
        var icon = document.getElementById('password-toggle-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
</body>
</html>