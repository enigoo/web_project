<?php 
session_start();
include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 	
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="#" method="POST">		
		<h1><i>Hello, <?php echo $_SESSION['name']; ?></i></h1>
		<?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
         <?php 
 if(isset($_POST['click'])){
 	$nme = $_POST['name'];
 	$cmnt = $_POST['comment'];

 	$qry = "INSERT INTO comment (name, comments) VALUES ('$nme', '$cmnt');";
 	$rslt = mysqli_query($conn, $qry);
 	if ($rslt) {
           	 header("Location: home.php?success=your comment entered successfully");
	         exit();
           }else {
	           	header("Location: home.php?error=unknown error occurred");
		        exit();
           } 	
 	}
 ?>
		<textarea rows="5" cols="60" name="comment" placeholder="comments..."></textarea><br>
     	<input type="text" name="name" placeholder="Name">
     	<button type="submit" name="click">Post!!</button><br>
     	<h3 align="center"><b><i>comments!!!!</i></b><br></h3>
     	<?php 
 $qry = "SELECT * FROM comment ORDER BY id DESC";
 $rslt = mysqli_query($conn,$qry); 
 while($rows=mysqli_fetch_assoc($rslt)){
 	$nme = $rows['name'];
 	$cmnt = $rows['comments'];
 	 echo  $nme . "<br />" . $cmnt . "<br />" . "<br />" . "<hr width=100px>" ;
 }
?>
	</form>
	<div style="float: right;">
		<label class="lg">
			<a href="logout.php">logout</a>	
			<a href="search.php">search</a>	
			<a href="profile.php">profile</a>
		</label>
	</div>	
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>