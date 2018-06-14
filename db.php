<?php
$mysqli = new mysqli("localhost", "root", "", "material");
/* проверка подключения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
/* $query = "SELECT * FROM `dispatcher` ";
    if ($result = mysqli_query($mysqli, $query)) {
        while ($array = mysqli_fetch_assoc($result)) {
           echo $array[login];
           echo "<br>".$array[password];
        }
    }*/?>