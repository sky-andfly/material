<?
require_once 'db.php';

	$query = "SELECT * FROM `category` ";

?>
<!DOCTYPE html>
<html>
<head>
	<?
		require_once 'title.php';
	?>

</head>
<body>
	<div class="container-fluid box">
		<?
		require_once 'nav.php';
		?>
	<div class="white">
		<?
		
    if ($result = mysqli_query($mysqli, $query)) {
        while ($array = mysqli_fetch_assoc($result)) {
           $id= $array['id'];
           echo "<a href='category.php?category=$id'>".$array['name']."</a><hr>";
                   }
    }


	?>
	</div>

	</div>


</body>
</html>
