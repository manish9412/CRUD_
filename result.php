<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>
<body>
<div class="col-md-6 ">
	<h3>Search Results here.....</h3>
	<hr>
	<?php
		require 'includes/connection.php';
		if (ISSET($_REQUEST['id']))
		{
			$query = mysqli_query($conn,"SELECT * FROM `posts` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
		?>
		<h3><?php echo $fetch['title']?></h3>
		<p><?php echo nl2br($fetch['description']);?></p>
	<?php
		}
	?>
	<a href="index.php" class="btn btn-secondary">Back</a>
	
</div>
</body>
</html>