
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <title></title>
</head>
<body>
    <?php 
    $connect = mysqli_connect('3.132.234.157','minhmod_user','123@123a','minhmod_db');
    if(!$connect)
    {
      echo "Kết nối thất bại";
    }
    //Tìm và trả về kết quả dưới dạng 1 mảng và lấy từng dòng dữ liệu
  ?>
<table border="1">
    <tr>
        <th>User Id</th>
        <th>Song Id </th>
        <th>dateAdded </th>
     </tr>
         <?php
         $sql = "SELECT * FROM cart";
        $result = mysqli_query($connect, $sql);
        while($row= mysqli_fetch_array($result)){
               $user_id = $row['user_id'];
               $song_id = $row['song_id'];
               $dateAdded = $row['dateAdded'];

            ?>
        <tr>
            <td> <?php echo $user_id ?></td>

            <td> <?php echo $song_id ?></td>
            <td> <?php echo $dateAdded ?></td>
            <td> <a href="editsong.php?id=<?php echo $song_id ?>">Update cart</a></td>
            <td> <a href="?id=<?php echo $song_id ?>">Delete cart</a></td>
             </tr>
             <?php
             }
             ?>

     
</table>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql="DELETE FROM song where user_id = $id";
    $result=mysqli_query($connect,$sql);
    if($result) {
        echo "<script> alert ('Update success!')</script>";
    }
} else{
    echo"";
}
?>
</body>
</html>