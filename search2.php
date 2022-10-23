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
	

</head>
<body>
  <?php 
    $connect = mysqli_connect('3.132.234.157','minhmod_user','123@123a','minhmod_db');
    if(!$connect)
    {
      echo ""; //ket noi that bai
    }
    $sql="SELECT * FROM song";
    $result = mysqli_query($connect,$sql);  
    //Tìm và trả về kết quả dưới dạng 1 mảng và lấy từng dòng dữ liệu
  ?>

<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
	  <a class="navbar-brand" href="index2x.php">NhacCuaBat</a>
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
          
          <form class="form-inline my-2 my-lg-0" action="search2.php" method="GET">
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
<!-- end menu -->
<!-- slide -->

<!-- end slide -->
  <?php
  $conn = mysqli_connect('localhost','root','','play_music_website');
    if(!$conn)
    {
      echo ""; //ket noi that bai
    }
  
  $search = "";
  
    $search = $_GET['Search'];
  
  ?>
<!-- list product -->
<h3 class="title">Search Results for: <?= $search ?></h3>
  <div class="container" style="margin-top: 20px">
    <div class="row">
      <?php
      if( !empty($search))
      {
        $rs = mysqli_query($conn, "SELECT * FROM song WHERE song.song_name LIke '%{$search}%' ");
        while($row = mysqli_fetch_assoc($rs)) {
          ?>
          <div class="card" style="background-color: white;margin-top: 20px; margin-left: 35px;overflow: auto; width: 270px; border: 2px solid #F8ABAB;border-radius: 1px; border-bottom: 6px solid #FCA5A5; float: left;">
            <a href="detail.php?id=<?php echo $row['song_id']?>" style=" text-decoration: none; text-align: center;"> 
              <div style="height:80px">
                <h2><?php echo $row['song_name'] ?></h2>
              </div>
              <div><img src="image/<?php echo $row['song_image']?>" style="width: 247px;height: 200px;padding: 7px"></div>
              <p style="color: red"><?php echo $row['song_describe']." $"; ?></p>
              <!-- <h4 style="color: #3BA33D"><?php echo $row['singer_name'] ?></h4>  
              <h5>Genre: <?php echo $row['genre_name'] ?>/h5> -->
              </a>
            </div>
            <?php
          }
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