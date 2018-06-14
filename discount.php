<?
require_once 'db.php';

	$query = "SELECT * FROM `promo` ";

if (isset($_POST['submitNew'])) {
	$dis=$_POST['dis'];
	$name=$_POST['name'];

	$query1 = "INSERT INTO `promo` (`id`, `name` , `discount`) VALUES (NULL, '$name', '$dis') ";
	mysqli_query($mysqli, $query1);
}
if(isset($_POST['submitUPD'])){

	$idUPD=$_GET['id'];
	$disUPD=$_POST['disUPD'];
	$nameUPD=$_POST['nameUPD'];
	echo $idUPD;	
	echo $disUPD;
	echo $nameUPD;
	$query2 = "UPDATE `promo` SET  `name`='$nameUPD',`discount`='$disUPD' WHERE `promo`.`id`='$idUPD' ";
	mysqli_query($mysqli, $query2);
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
		<a href="discount.php?work=new">[Добавить промокод]</a><hr>	
		<?		
	    if ($result = mysqli_query($mysqli, $query)) {
	        while ($array = mysqli_fetch_assoc($result)) {
	           $id= $array['id'];
	           echo "<span id='text'>Название:</span> [".$array["name"]."]<span id='text'> Скидка:</span> [".$array["discount"]."%] <a href='?work=update&id=$id'>[Редактировать]</a> | <a href='?work=del&id=$id'>Удалить[x]</a><hr>";
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
							<div class="form-group col-sm-4 ">
							<span class="new-tovar">Добавить новый промо-код</span>
							<hr>
							<input type="" name="name" class="form-control" placeholder="Название"><br>
							<input type="" name="dis" class="form-control" placeholder="Скидка (без знака %)"><br>							
							<input type="submit" name="submitNew" class="form-control  ">
							</div>
						</form>
					<?php
					break;
					case 'del':
					$id_delete=$_GET['id'];
					$query2 = "DELETE FROM `promo` WHERE `id`='$id_delete'; ";
					mysqli_query($mysqli, $query2);
					?>
					<script>
		  				setTimeout( 'location="/discount.php"');
					</script>
					<?php
					break;	
					case 'update':
						$id=$_GET['id'];
						$queryUPD = "SELECT * FROM `promo` WHERE `id`='$id' ";
					    if ($result = mysqli_query($mysqli, $queryUPD)) {
				        while ($array = mysqli_fetch_assoc($result)) {
				        	$idUPD= $array['id'];
				        	$name= $array['name'];
				        	$discount=$array['discount'];
				        	?>
				        	<form action="" method="POST">
								<div class="form-group col-sm-4 ">
								<span class="new-tovar">Редактировать промо-код [<?=$name ?>]</span>
								<hr>
								<input readonly type="" name="idUPD" class="form-control" placeholder="id = <?=$id?>"><br>
								<input type="" name="nameUPD" class="form-control" placeholder="<?=$name ?>"><br>
								<input type="" name="disUPD" class="form-control" placeholder="<?=$discount ?>%"><br>					
								<input type="submit" name="submitUPD" class="form-control  ">
								</div>
							</form>	


				        	<?php


				        }
				    }	
						break;
			}
		}?>
	</div>


</body>
</html>
