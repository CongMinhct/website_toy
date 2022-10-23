<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    $connect = mysqli_connect('3.132.234.157','minhmod_user','123@123a','minhmod_db');
    if($connect){
    echo "Kết nối thành công";
    }
    else{
    echo "Kết nối thất bại";
    }
    ?>

    <div class="main">

    
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="https://cdn3.ivivu.com/2019/06/chup-hinh-dep-nha-trang-ivivu-6.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
        <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
    

    <?php
        if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password =$_POST['password'];
            //Lựa từ bảng user cột username = username nhập từ form và cột password = giá trị password nhập từ form

            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

            // Thực thi truy vấn từ csdl dùng hàm mysqli_query

            $result = mysqli_query($connect,$sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows==0)
            {
                ?>
                    <script>
                        alert("Username or password is incorrect");
                    </script>
                <?php
            }
            else
            {
                $user = mysqli_fetch_array($result);
                $user_id = $user['user_id'];
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_id;
                ?>
                    <script>
                        alert("Login success");
                        window.location.href = "../../index2x.php";
                    </script>  
                <?php
            }
        }
    ?>


</body>
</html>