<?


	$query = "SELECT * FROM `promo` ";


?>

		<a href="index.php?page=new-promo">[Добавить промокод]</a><hr>	
		<?		
	    if ($result = mysqli_query($mysqli, $query)) {
	        while ($array = mysqli_fetch_assoc($result)) {
	           $id= $array['id'];
	           echo "<span id='text'>Название:</span> [".$array["name"]."]<span id='text'> Скидка:</span> [".$array["discount"]."%] <a href='index.php?page=update-promo&id=$id'>[Редактировать]</a> | <a href='index.php?do=del-promo&id=$id'>Удалить[x]</a><hr>";
	        }
	    }


