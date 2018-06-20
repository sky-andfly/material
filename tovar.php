<?
$id=$_GET['id'];
$query = "SELECT * FROM `nomenclatura` WHERE `id`='$id' ";
if ($result = mysqli_query($mysqli, $query)) {
 	        while ($array = mysqli_fetch_assoc($result)) {
           echo "<span id='names'>".$array['name']."</span>";
           echo "<br><img id='img' src='".$array['img']."'";
           echo "<br><span id='text'>Характеристики:<br>".$array['discription']."</span>";
           echo "<br><span id='text'>На складе: ".$array['kol']."</span>";
           echo "<br><span id='text'>Цена: ".$array['price']."</span>";
          
        }
            }
	?>
	<br><a href="index.php?page=index-tovar"><--Назад</a>
		</div>


