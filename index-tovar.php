<?
require_once 'db.php';
if(isset($_POST['search'])){
	$search=$_POST['search'];
	$query = "SELECT * FROM nomenclatura WHERE name LIKE '%$search%'";
}else{
	$query = "SELECT * FROM `nomenclatura` ";
}
if (isset($_POST['submitNew'])) {
	$img=$_POST['img'];
	$name=$_POST['name'];
	$discription=$_POST['discription'];
	$kol=$_POST['kol'];
	$price=$_POST['price'];
	$query1 = "INSERT INTO `nomenclatura` (`id`, `img`, `name`, `discription`, `kol`, `price`) VALUES (NULL, '$img', '$name', '$discription', '$kol', '$price') ";
	mysqli_query($mysqli, $query1);
}
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
           echo "<a href='tovar.php?id=$id'>".$array['name']."</a>";
           echo "  На складе: ".$array['kol']." <a href='?work=del&id=$id'>Удалить</a><hr>";
        }
    }


	?>
	</div>
	<?
    if(isset($_GET['work'])){
    	$work=$_GET['work'];
    	switch ($work) {
    		case 'new':
    				?>

		<form action="" method="POST">
			<div class="form-group col-sm-3 col-sm-offset-4">
				<span class="new-tovar">Добавить новый товар</span>
				<hr>
				<input type="" name="img" class="form-control" placeholder="Путь к картинке"><br>
				<input type="" name="name" class="form-control" placeholder="Название"><br>
				<textarea name="discription" placeholder="Описание"></textarea> 
				<input type="" name="kol" class="form-control" placeholder="Количество"><br>
				<input type="" name="price" class="form-control" placeholder="Цена"><br>
				<input type="submit" name="submitNew" class="form-control new-route-submit ">
			</div>
		</form>
<?php
    			break;
    			case 'del':
			$id_delete=$_GET['id'];
			$query2 = "DELETE FROM `nomenclatura` WHERE `id`='$id_delete'; ";
			mysqli_query($mysqli, $query2);
			?>
			<script>
  				setTimeout( 'location="/index.php"');
			</script>
			<?php
			break;	
    	}
    }?>

	</div>


</body>
</html>
