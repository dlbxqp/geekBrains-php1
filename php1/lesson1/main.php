<?php
/*
Обязательная часть
1. Установить программное обеспечение: веб-сервер, базу данных, интерпретатор,
текстовый редактор и проверить, что всё работает правильно.
- Уставноил, проверил.

2. Выполнить примеры из методички, разобраться, как это работает.
- Выполнил, разобрался.

3. Объясните, как работает данный код:
<?php
$a = 5;
$b = '05';
var_dump($a == $b); // Почему true?
#Ибо PHP - слаботипизированный язык, соответственно типы данных могут подгоняться под текущие операции. А сравнение '==' не подразумевает проверку на тип данных '==='

var_dump((int)'012345'); // Почему 12345?
#Потому как конструкция (int) меняет тип данных с изначального (string) на числовой?

var_dump((float)123.0 === (int)123.0); // Почему false?
#Поскольку оператор '===' осуществляет проверку ещё и на тип данных

var_dump((int)0 === (int)'hello, world'); // Почему true?
#Видимо потому что строка 'hello, world' не начинается с цифры и соответственно при изменении её типа данных возвращает 0.
*/


/*
Дополнительные задания
Используя только две переменные, поменяйте их значение местами.
Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2.
Дополнительные переменные использовать нельзя.
$a = 1;
$b = 2;

$a = "{$a}.{$b}";
$b = (int)$a;
$a = ((float)$a - $b) * 10;
*/