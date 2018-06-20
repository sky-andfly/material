<?php
session_start();

require_once 'db.php';
require_once 'function.php';
if(isset($_GET['do'])){
    $do=$_GET['do'];
    switch ($do) {
        case 'in':
            $login=$_POST['login'];
            $password=$_POST['password'];
            in($login, $password); 
            ?> 
            <script>
                setTimeout( 'location="/index.php?page=category-index"');
            </script> 
            <?         
            break;
        
        case 'new-tovar':
            if (isset($_POST['submitNew'])) {
                $img=$_POST['img'];
                $name=$_POST['name'];
                $discription=$_POST['discription'];
                $kol=$_POST['kol'];
                $price=$_POST['price'];
                $category=$_POST['category'];
                $query1 = "INSERT INTO `nomenclatura` (`id`, `img`, `name`, `discription`, `kol`, `price`, `category`) VALUES (NULL, '$img', '$name', '$discription', '$kol', '$price', '$category') ";
                mysqli_query($mysqli, $query1);
                            ?> 
            <script>
                setTimeout( 'location="/index.php?page=new"');
            </script> 
            <? 
               }
            break;
        case 'del-tovar':
                $id=$_GET['id'];
                $query1 = "DELETE FROM `nomenclatura` WHERE `id`='$id' ";
                mysqli_query($mysqli, $query1);
                 ?> 
            <script>
                setTimeout( 'location="index.php?page=index-tovar"');
            </script> 
            <? 
        break; 
        case "new-promo":  
            if (isset($_POST['NewPromo'])) {
                $dis=$_POST['dis'];
                $name=$_POST['name'];

                $query1 = "INSERT INTO `promo` (`id`, `name` , `discount`) VALUES (NULL, '$name', '$dis') ";
                mysqli_query($mysqli, $query1);
                                 ?> 
            <script>
                setTimeout( 'location="index.php?page=discount"');
            </script> 
            <? 
            }
        break; 
        case 'del-promo':
                $id_delete=$_GET['id'];
                $query2 = "DELETE FROM `promo` WHERE `id`='$id_delete'; ";
                mysqli_query($mysqli, $query2);
                ?>
                <script>
                    setTimeout( 'location="index.php?page=discount"');
                </script>
                <?php
        break; 
        case "update-promo":
            if(isset($_POST['submitUPD'])){

            $idUPD=$_GET['id'];
            $disUPD=$_POST['disUPD'];
            $nameUPD=$_POST['nameUPD'];
            $query2 = "UPDATE `promo` SET  `name`='$nameUPD',`discount`='$disUPD' WHERE `promo`.`id`='$idUPD' ";
            mysqli_query($mysqli, $query2);
            ?>
                        <script>
                setTimeout( 'location="index.php?page=discount"');
            </script> 
            <? 
}
        break;
        case 'exit':
            $_SESSION["user"]=0;    
        break;      
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php
    require_once "title.php";
    ?>
</head>
<body>
    <div class="container-fluid box">
        <?
            require_once 'nav.php';
        ?>
        <div class="white">
            <?php

            if(isIn()==false){
                
            }else{
                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                    switch ($page) {
                        case 'category-index':
                             require_once "category-index.php";
                            break;
                        case 'category':
                            require_once "category.php";
                        break;
                        case 'index-tovar':
                            require_once "index-tovar.php";
                            break;
                        case 'new':
                            ?>

                            <form action="index.php?do=new-tovar" method="POST">
                                <div class="form-group col-sm-3 col-sm-offset-4">
                                    <span class="new-tovar">Добавить новый товар</span>
                                    <hr>
                                    <input type="" name="img" class="form-control" placeholder="Путь к картинке"><br>
                                    <input type="" name="name" class="form-control" placeholder="Название"><br>
                                    <textarea name="discription" placeholder="Описание"></textarea> 
                                    <input type="" name="kol" class="form-control" placeholder="Количество"><br>
                                    <input type="" name="price" class="form-control" placeholder="Цена"><br>
                                    <select class="form-control" name="category">
                                    <option value="1">Керамическая плитка</option>
                                    <option value="2">Грунтовка</option>
                                    <option value="3">Гипсокартон</option>
                                    </select><br>
                                    <input type="submit" name="submitNew" class="form-control new-route-submit ">
                                </div>
                            </form>
                    <?php
                            break;
                        case 'tovar':
                            require_once "tovar.php";
                        break;
                        case "discount":
                            require_once "discount.php";
                        break;
                        case "new-promo":
                        ?>
                            <form action="index.php?do=new-promo" method="POST">
                            <div class="form-group col-sm-4 ">
                            <span class="new-tovar">Добавить новый промо-код</span>
                            <hr>
                            <input type="" name="name" class="form-control" placeholder="Название"><br>
                            <input type="" name="dis" class="form-control" placeholder="Скидка (без знака %)"><br>                          
                            <input type="submit" name="NewPromo" class="form-control  ">
                            </div>
                        </form>
                        <?
                        break; 
                        case 'update-promo':
                        $id=$_GET['id'];
                        $queryUPD = "SELECT * FROM `promo` WHERE `id`='$id' ";
                        if ($result = mysqli_query($mysqli, $queryUPD)) {
                        while ($array = mysqli_fetch_assoc($result)) {
                            $idUPD= $array['id'];
                            $name= $array['name'];
                            $discount=$array['discount'];
                            ?>
                            <form action="index.php?do=update-promo&id=<?=$idUPD?>" method="POST">
                                <div class="form-group col-sm-4 ">
                                <span class="new-tovar">Редактировать промо-код [<?=$name ?>]</span>
                                <hr>
                                <input readonly type="" name="idUPD" class="form-control" placeholder="id = <?=$idUPD?>"><br>
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
                }}
               
            

            ?>

        </div>
    </div>            

</body>
</html>