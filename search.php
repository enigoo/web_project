<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="#" method="POST"> 
		<input type="text" name="name" placeholder="search">
		<button type="submit" name="submit">search</button><br><br>
		<?php
            session_start(); 
            include "db_conn.php";            
            if(isset($_POST['submit']))
            {
                if(!empty($_REQUEST['name'])){
                $name = $_POST['name'];
                $sql = "SELECT * FROM users where name like '%$name%' ";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                echo "<table>";
                    echo "<tr>";
                        echo "<th>name</th>";
                        echo "<th>username</th>";
                        echo "<th>email</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                     echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                    }
                echo "</table>";        
                mysqli_free_result($result);
                }else{
          echo "no records found";
         }
             } else{
          echo "please enter a name to search";
      }}
        //mysqli_close($conn);
        ?>	
	</form>	
	<div style="float: right;">
		<label class="lg">
			<a href="home.php">Back</a>				
		</label>
	</div>
</body>
</html>