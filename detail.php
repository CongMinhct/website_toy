<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
    .images-detail img {
        margin-top: 5%;
        width: 100%;
        align-items: center;
        border-radius: 100%;
        margin-bottom: 30px;
        animation: app-logo-spin infinite 20s linear
        }
        @keyframes app-logo-spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
	</style>

</head>
<body>
  <?php 
    $connect = mysqli_connect('3.132.234.157','minhmod_user','123@123a','minhmod_db');
    if(!$connect)
    {
      echo ""; // ket noi that bai
    }
    $sql="SELECT * FROM song";
    //Tìm và trả về kết quả dưới dạng 1 mảng và lấy từng dòng dữ liệu
  ?>

<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand" href="index.php">NhacCuaBat</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="Managesongs.php"> <span class="glyphicon glyphicon-user"></span>Manage Songs</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Playlist
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="#">Vietnam</a>
                      <a class="dropdown-item" href="#">U.S. UK</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Asia</a>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="login/colorlib-regform-7/addspbt.php"> <span class="glyphicon glyphicon-user"></span>Add product</a>
              </li>
          </ul>
          
          <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
              <input class="form-control mr-sm-2" type="search" placeholder="Search for song" aria-label="Search" name="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
              
          </form>
          <div class="dn" style="padding-left: 100px;">
            <?php
          if (!isset($_SESSION['username'])) {
            echo "<div><a href='login/colorlib-regform-7/registerbt.php' class='btn btn-primary'>Register</a>
                <a href='login/colorlib-regform-7/loginbt.php' class='btn btn-primary' style='padding-left: 15px'>Login</a> </div>";
          } else {
            $username = $_SESSION['username'];
            $result = mysqli_fetch_array(mysqli_query($connect, $sql));
            echo "<div class='dropdown show'>
            <a class='btn btn-outline-dark dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              <span class=user-name>" . $_SESSION['username'] . "</span>
            </a>

            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
              <a class='dropdown-item' href='user.php'>Account</a>
              <a class='dropdown-item' href='cart.php'>Cart</a>";
            // how do I make this more secure??? it is pretty shit I rely entirely on session for the authentication
            echo "<div class='dropdown-divider'></div>
              <a class='dropdown-item' href='logout.php'>Logout</a>
            </div>
          </div>";
          }
          ?>
          </div>

      </div>
  </div>
</nav>
<br>
<br>
<br>
<!-- end menu -->
<!-- list product -->
<div class="container">
    <div class="row">
        <?php
        $id = $_GET["id"];
        $sql = "SELECT * FROM song WHERE song_id = {$id}";
        $result = mysqli_query($connect, $sql);
        while($row= mysqli_fetch_array($result)){
            $id = $row['song_id'];
            ?>
            <div class="col-md-6" style="text-align: left;">
                <h2> Name of Music: <?php echo $row['song_name'];?> </h2>
                <p>Price: <?php echo $row['song_price'];?> </p>
                <audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px;">
                           <source src="audio/<?php echo $row['song_audio'];?>" type="audio/mpeg">
                       </audio>
                       <script type="text/javascript">
                           function MyAudio(event){
                               if(event.currentTime>30){
                                   event.currentTime=0;
                                   event.pause();
                                   alert("You have to pay to listen to the whole song")
                               }
                           }
                       </script>
                       <h5> Singer:<?php echo $row["singer_name"] ;?></h5>
                       <h4> Genre:<?php echo $row["genre_name"]; ?></h4>
                        <textarea cols="40" rows="10" disabled><?php echo $row["song_lyric"];?></textarea>

                      <a href="addtocart.php?id=<?php echo $id ;?>">  <button type="submit" name ="buy" class='btn btn-primary'><i class="fas fa-cart-plus"></i> Add to cart</button> </a>
                    
            </div>  
            <!-- cho ảnh quay tròn-->
            <div class="images-detail">
            <div class="col-md-6">
                <img src="image/<?php echo $row['song_image'] ?>" style = "width: 500px;height: 500px;">
            </div>
        </div>
       
            <?php
        }

    ?>
    </div>
</div>
<!-- end list product -->


<!-- Load jquery trước khi load bootstrap js -->
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>