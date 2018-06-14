<?php
session_start();
require_once 'db.php';

if(isset($_POST['search'])){
	$search=$_POST['search'];
	$query = "SELECT * FROM route WHERE name2 LIKE '%$search%' OR name1 LIKE '%$search%' OR time LIKE '%$search%'";
}else{
	$query = "SELECT * FROM `route` ";
}

if (isset($_POST['submitNew'])) {
	$name1=$_POST['name1'];
	$name2=$_POST['name2'];
	$time=$_POST['time'];
	$price=$_POST['price'];
	$query1 = "INSERT INTO `route` (`id`, `name1`, `name2`, `time`, `price`) VALUES (NULL, '$name1', '$name2', '$time', '$price') ";
	mysqli_query($mysqli, $query1);
}
if (isset($_POST['submitEdit'])) {
	$id=$_POST['id'];
	$name1=$_POST['name1'];
	$name2=$_POST['name2'];
	$time=$_POST['time'];
	$price=$_POST['price'];
	$query1 = "UPDATE `route` SET `name1` = '$name1', `name2` = '$name2', `time` = '$time', `price` = '$price' WHERE `route`.`id` = 2; ";
	mysqli_query($mysqli, $query1);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Автовокзал.Администратор</title>
	<? require_once 'title.php'?>	
</head>
<body>

	<div class="toolbar">
		<span> Маршруты </span>
		<form action="" method="POST" class="search-form">
            <div class="form-group has-feedback">         	
	         	<input type="text" class="form-control" name="search" id="search" placeholder="Введите город/время">
	           	<span class="glyphicon glyphicon-search form-control-feedback"></span>
        	</div>
        </form>

	</div>
	
	<div class="container-fluid route-table">
		<!--todo: вывести ошибки если таковые есть (проверка должна происходить также ввурху, а здесь работа только с масивом)-->
		<table class="table table1">
		  	<thead>
			    <tr>
				    <th scope="col">№ маршрута	</th>
				    <th scope="col">От куда</th>
				    <th scope="col">    </th>
				    <th scope="col">Куда</th>
				    <th scope="col">Время отправления</th>
				    <th scope="col">Цена</th>
				    <th scope="col">Ред.</th>
				    <th scope="col">Удалить</th>
			    </tr>
			</thead>
			<tbody>
				<!--todo: перенеснти логику запроса вверх, здесь сотавить только работу с масивом которій уже заполнен данными-->
			    <?php if ($result = mysqli_query($mysqli, $query)):?>
			        <?php while ($array = mysqli_fetch_assoc($result)):?>
				        <tr>
					      	<th scope="row"><?=$array['id'] ?></th>
					      	<td><?= $array['name1']  ?></td>
					      	<td> - </td>
					      	<td><?= $array['name2']  ?></td>      	
					      	<td><?= $array['time']  ?></td>
					      	<td><?= $array['price']  ?></td>					      	
					      	<td><a href='admin.php?do=edit&id=<?php echo $array['id'] ?>'>[Edit]</a></td>
					      	<td><a href='admin.php?do=delete&id=<?php echo $array['id'] ?>'>[Delete]</a></td>
				    	</tr>
				    <?php endwhile;?>
			    <?php endif;?>
			</tbody>
		</table>
	</div>
	<div class="container-fluid right">
		<a  href="?do=new" class="new-route-botton">+</a> 
	</div>
	<?php
	if(isset($_GET['do'])){
		$do=$_GET['do'];
	switch ($do) {
		case 'new':
		?>

		<form action="admin.php" method="POST">
			<div class="form-group col-sm-3 col-sm-offset-4">
				<span class="new-route">Добавить новый маршрут</span>
				<hr>
				<input type="" name="name1" class="form-control" placeholder="От куда"><br>
				<input type="" name="name2" class="form-control" placeholder="Куда"><br>
				<input type="" name="time" class="form-control" placeholder="Время"><br>
				<input type="" name="price" class="form-control" placeholder="Цена"><br>
				<input type="submit" name="submitNew" class="form-control new-route-submit ">
			</div>
		</form>
<?php
			break;
		case 'edit':
		$edit_id=$_GET['id'];
				?>

		<form action="admin.php" method="POST">
			<div class="form-group col-sm-3 col-sm-offset-4">
				<span class="new-route">Редактировать маршрут</span>
				<hr>
				<?php
					$query3 = "SELECT * FROM `route` WHERE id='$edit_id'";
    				if ($result3 = mysqli_query($mysqli, $query3)) {
       					while ($array3 = mysqli_fetch_assoc($result3)) {
       						?>
       							<input type="" name="id" class="form-control" readonly value="<?php echo $edit_id ?>"><br>
       							<input type="" name="name1" class="form-control" value="<?php echo $array3['name1'] ?>"><br>
								<input type="" name="name2" class="form-control" value="<?php echo $array3['name2']?>"><br>
								<input type="" name="time" class="form-control" value="<?php echo $array3['time']?>"><br>
								<input type="" name="price" class="form-control" value="<?php echo $array3['price']?>"><br>
								<input type="submit" name="submitEdit" class="form-control new-route-submit ">


       						<?php
				        	
						}
					}

				?>
				
			</div>
		</form>
<?php
			break;
		case 'delete':
			$id_delete=$_GET['id'];
			$query2 = "DELETE FROM `route` WHERE `id`='$id_delete'; ";
			mysqli_query($mysqli, $query2);
			?>
			<script>
  				setTimeout( 'location="/admin.php"');
			</script>
			<?php
			break;		
	}
	}
		
	?>
</body>
</html>
