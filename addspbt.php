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
	<div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Add product</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="song_id" id="Product_id" placeholder="id"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="song_name" id="Product_name" placeholder="name"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="song_describe" id="describe" placeholder="describe"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="file" name="song_image" id="Product_image" placeholder="image"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="file" name="song_audio" id="Product_audio" placeholder="audio"/>
                            </div>
                            
                            
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="add_product" id="Addproduct" class="form-submit" value="Add Product"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="https://maytinhvui.com/wp-content/uploads/2020/11/hinh-nen-may-tinh-4k-game-pubg-min.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link"></a>
                    </div>
                </div>
            </div>
        </section>

        

    </div>
       <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <?php
			$connect = mysqli_connect('3.132.234.157','minhmod_user','123@123a','minhmod_db');
			if (isset($_POST['add_product'])) {
			$song_id =$_POST['song_id'];
			$song_name =$_POST['song_name'];
			$song_Describe =$_POST['song_describe'];
			//l???y ???nh t??? th?? m???c b???t k??? c???a m??y t??nh
			$song_image =$_FILES['song_image']['name'];
			//di chuy???n ???nh t??? th?? m???c b???t k??? sang th?? m???c tmp_name c???a htdocs
			$song_image_tmp =$_FILES['song_image']['tmp_name'];
			//????a ???nh t??? th?? m???c tmp sang th?? m???c c???n l??u
			move_uploaded_file($song_image_tmp, "image/$song_image");
			//l???y audio t??? th?? m???c b???t k??? c???a m??y t??nh
			$song_audio =$_FILES['song_audio']['name'];
			//di chuy???n audio t??? th?? m???c b???t k??? sang th?? m???c tmp_name c???a htdocs
			$song_audio_tmp =$_FILES['song_audio']['tmp_name'];
			//????a audio t??? th?? m???c tmp sang th?? m???c c???n l??u
			move_uploaded_file($song_audio_tmp, "audio/$song_audio");
			//th??m s???n ph???m v??o c?? s??? d??? li???u
			$sql = "INSERT INTO song VALUES('$song_id','$song_name','$song_describe','$song_image','$song_audio')";
			$result = mysqli_query($connect, $sql);
			if($result){
				echo "<script>alert('New successful product added') </script>";
				echo "<script> window.location.href = '../../index.php' </script>";
				}
			else{
				echo "<script>alert('Add new error') </script";
			}

			}
		?>

</body>
</html>