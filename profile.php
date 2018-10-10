<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  h1 {
      position: absolute;
      left: 400px;
      top: 0px;
  }
  h2 {
      position: absolute;
      left: 550px;
      top: 310px;
  }
  h3 {
      position: absolute;
      left: 250px;
      top: 400px;
  }
  </style>
</head>


<body>
<?php
if(isset($_GET['id']))
{
	$id = $_GET['id'];	
	include ("db.php");		
	$result = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
	$myrow = mysqli_fetch_array($result);
	if(isset($_SESSION["role"]))
	{		
		if($_SESSION["role"]=="admin")
		{
			$_SESSION["other_id"] = $myrow['id'];
			echo'<form name="save" action="save.php" method="post">';
			echo'Role:';
			echo $myrow["role"].'<br>';
			echo '<br>';
			echo'Avatar:';
			echo '<img src= '.$myrow["avatarPatch"].'><br>';
			echo'Login:';
			echo'<input type="text" name="login" id="log" value='.htmlspecialchars($myrow["login"]).'><br>';
			echo '<br>';
			echo'First name:';
			echo'<input type="text" name="fname" id="fname" value='.htmlspecialchars($myrow["name"]).'><br>';
			echo '<br>';
			echo'Last name:';
			echo'<input type="text" name="lname" id=\"sname" value='.htmlspecialchars($myrow["surname"]).'><br>';
			echo '<br>';
			echo'Password:';
			echo'<input type="password" name="password" id="pass" value='.htmlspecialchars($myrow["password"]).'><br>';
			echo'<input type="submit" value="Save"><p>     </p><a href="delete.php?id='.$myrow["login"].'">Delete this</a>';
			echo'</form>';
			echo'<br>';
		}
		else
		{
			echo'Avatar:';
			echo '<img src= '.$myrow["avatarPatch"].'><br>';
			echo'Login:';
			echo $myrow["login"].'<br>';
			echo '<br>';
			echo'Role:';
			echo $myrow["role"].'<br>';
			echo '<br>';
			echo'Name:';
			echo $myrow["name"].'<br>';
			echo '<br>';
			echo'Surname:';
			echo $myrow["surname"].'<br>';
			echo '<br>';
		}
	}
	else
	{
		echo'Avatar:';
		echo '<img src= '.$myrow["avatarPatch"].'><br>';
		echo'Login:';
		echo $myrow["login"].'<br>';
		echo '<br>';
		echo'Role:';
		echo $myrow["role"].'<br>';
		echo '<br>';
		echo'Name:';
		echo $myrow["name"].'<br>';
		echo '<br>';
		echo'Surname:';
		echo $myrow["surname"].'<br>';
		echo '<br>';
	}
}
else
{	
	echo'<form name="save" action="save.php" method="post">';
	echo'Role:';
	echo $_SESSION["role"].'<br>';
	echo '<br>';	
	echo'Login:';
	echo'<input type="text" name="login" id="log" value='.htmlspecialchars($_SESSION["login"]).'><br>';
	echo '<br>';
	echo'First name:';
	echo'<input type="text" name="fname" id="fname" value='.htmlspecialchars($_SESSION["name"]).'><br>';
	echo '<br>';
	echo'Last name:';
	echo'<input type="text" name="lname" id=\"sname" value='.htmlspecialchars($_SESSION["surname"]).'><br>';
	echo '<br>';
	echo'Password:';
	echo'<input type="password" name="password" id="pass" value='.htmlspecialchars($_SESSION["password"]).'><br>';
	echo'<input type="submit" value="Save"><p>     </p><a href="delete.php?id='.$_SESSION["id"].'">Delete this</a>';
	echo'</form>';
	echo'<br>';
}
?>

<form>
<input type="button" value="Main page" onClick='location.href="http://localhost/index.php"'>
</form>

</body>
</html>
