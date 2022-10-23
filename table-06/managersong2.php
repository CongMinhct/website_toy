<!doctype html>
<html lang="en">
  <head>
  	<title>Table 06</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		<?php 
    $connect = mysqli_connect('localhost','root','','play_music_website');
    if(!$connect)
    {
      echo "Kết nối thất bại";
    }
    //Tìm và trả về kết quả dưới dạng 1 mảng và lấy từng dòng dữ liệu
  ?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
					<h2 class="heading-section">Manage songs</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
						    	<th>Song ID</th>
						    	<th>Song Name</th>
						      <th>Price</th>
						  
						      <th>Genre Name</th>
						      <th>Singer Name</th>
						      <th>Action</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
						    <?php
         $sql = "SELECT * FROM song";
        $result = mysqli_query($connect, $sql);
        while($row= mysqli_fetch_array($result)){
               $song_id = $row['song_id'];
               $song_name = $row['song_name'];
               $song_price = $row['song_price'];
               $genre_name = $row['genre_name'];
               $singer_name = $row['singer_name'];

            ?>
        <tr>
        	<td>
				<label class="checkbox-wrap checkbox-primary">
				<input type="checkbox" checked>
				<span class="checkmark"></span>
				</label>
			</td>
            <td> <?php echo $song_id ?></td>
            <td> <?php echo $song_name ?></td>
            <td> <?php echo $song_price ?></td>
            <td> <?php echo $genre_name ?></td>
            <td> <?php echo $singer_name ?></td>
            <td> <a href="editsong.php?id=<?php echo $song_id ?>">Update Song </a></td>
            <td> <a href="?id=<?php echo $song_id ?>">Delete Song </a></td>
         </tr>
             <?php
             }
             ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql="DELETE FROM song where song_id = $id";
    $result=mysqli_query($connect,$sql);
    if($result) {
        echo "<script> alert ('Xóa thành công!')</script>";
    }
} else{
    echo"Lỗi";
}
?>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

