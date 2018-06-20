<?
	$query = "SELECT * FROM `nomenclatura` ";		
    if ($result = mysqli_query($mysqli, $query)) {
        while ($array = mysqli_fetch_assoc($result)) {
           $id= $array['id'];
           echo "<a href='index.php?page=tovar&id=$id'>".$array['name']."</a>";
           echo "  На складе: ".$array['kol']." <a href='?do=del-tovar&id=$id'>Удалить</a><hr>";
        }
    }
	?>
	</div>
	