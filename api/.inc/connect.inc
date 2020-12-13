<?php
$connect = mysqli_connect(
 '127.0.0.1',
 'root',
 '',
 'geekbrains_db'
);
if(mysqli_connect_errno()){
 printf("Ошибка подключения к БД: %s\n", mysqli_connect_error());
 exit();
}
if(!mysqli_set_charset($connect, 'UTF8')){
 echo("Ошибка при загрузке набора символов UTF-8: %s\n" . mysqli_error($connect));
}