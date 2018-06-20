
<?


//Функция для авторизации пользователя должна принимать два параметра логи и пароль пользователя
function in($login, $password){
  global $mysqli;

  $query = "SELECT * FROM `user` WHERE `login`='$login' AND `password`='$password'";
    if ($result = mysqli_query($mysqli, $query)) {
        while ($array = mysqli_fetch_assoc($result)) {
           $_SESSION["user"]=1;
                       return true;
        }}
}
//Функция для проверки автоизирован пользователь или нет
function isIn(){
  if(isset($_SESSION["user"])){
      if($_SESSION["user"] > 0){
          return true;
      }else{
        return false;
      }
  } 

}



    

