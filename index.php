<?php
require_once 'db.php';
if(isset($_POST["submit"])){
	$login=$_POST["login"];
	$password=$_POST["password"];
	$query = "SELECT * FROM `user` WHERE `login`='$login' AND `password`='$password'";
    if ($result = mysqli_query($mysqli, $query)) {
        while ($array = mysqli_fetch_assoc($result)) {
        	?>
           	<script>
  				setTimeout( 'location="/category-index.php";', 1 );
			</script>
			<?php
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php
		require_once 'title.php';


	?>
</head>
<body>
	<div class="container-fluid box">
		
		<div class="">

			<form class="form-1" method="POST">
				<span id="text">Войти в аккаунт администратора</span>
			    <p class="field">
			        <input type="text" name="login" placeholder="Логин ">
			        <i class="icon-user icon-large"></i>
			    </p>
			        <p class="field">
			        <input type="password" name="password" placeholder="Пароль">
			        <i class="icon-lock icon-large"></i>
			    </p>       
			    <p class="submit">
			        <button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
			    </p>
			</form>
		</div>


	</div>
</body>
</html>