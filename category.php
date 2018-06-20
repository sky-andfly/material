<?
	$idCategory=$_GET['category'];
 $query1 = "SELECT * FROM `category` WHERE `id`='$idCategory' ";
    	if ($result1 = mysqli_query($mysqli, $query1)) {
        while ($array1 = mysqli_fetch_assoc($result1)) {
        	$name=$array1['name'];
		?>
		<h3>Панель администратора - Категория <?=$name?></h3><hr>
		<?
        }
    }
		

	$query = "SELECT * FROM `nomenclatura` WHERE `category`='$idCategory' ";	
    if ($result = mysqli_query($mysqli, $query)) {
        while ($array = mysqli_fetch_assoc($result)) {
           $id= $array['id'];
           echo "<a href='index.php?page=tovar&id=$id'>".$array['name']."</a><hr>";
                   }
    }


	?>
	<a href="index.php?page=category-index"><--Назад</a>
