<?php
if (ISSET($_POST['search'])) 
{
	$keyword = $_POST['keyword'];
?>
<div>
	<h2>Result</h2>
	<hr>
	<?php
	require 'includes/connection.php';
	$query = mysqli_query($conn,"SELECT * FROM `posts`  WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die(mysqli_error());

	while ($fetch = mysqli_fetch_array($query)) 
	{
		?>
		<div>
			<a href="result.php?id=<?php echo $fetch['id']?>"><h4><?php echo $fetch['title'] ?></h4></a>
			<p><?php echo $fetch['description'] ?>...</p>
		</div>
		<hr>
	<?php
	}

	?>
</div>
<?php
}


?>