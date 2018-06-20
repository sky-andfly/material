<h3>Панель администратора - Категории</h3><hr>
<?

	$query= "SELECT * FROM `category`";
	if ($result = mysqli_query($mysqli, $query)) {
		while ($array = mysqli_fetch_assoc($result)) {
			$id= $array['id'];
			echo "<a href='index.php?page=category&category=$id'>".$array['name']."</a><hr>";
		}
	}
?>
	