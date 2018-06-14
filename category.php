<?
require_once 'db.php';
$idCategory=$_GET['category'];
	$query = "SELECT * FROM `nomenclatura` WHERE `category`='$idCategory' ";

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
           echo "<a href='tovar.php?id=$id'>".$array['name']."</a><hr>";
                   }
    }


	?>
	<a href="category-index.php"><--Назад</a>
	</div>

	</div>


</body>
</html>
