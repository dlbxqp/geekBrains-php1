1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:<br>
если $a и $b положительные, вывести их разность;<br>
если $а и $b отрицательные, вывести их произведение;<br>
если $а и $b разных знаков, вывести их сумму;<br>
ноль можно считать положительным числом.<br>
<strong>
<?php
$a = rand(-9, 9);
$b = rand(-9, 9);
if($a > 0 && $b > 0){
 echo "\$a - \$b = {$a} - {$b} = " . ($a - $b);
} elseif($a < 0 && $b < 0){
 echo "\$a * \$b = {$a} * {$b} = " . ($a * $b);
} elseif(($a < 0 && $b >= 0) || ($a >= 0 && $b < 0)){
 echo "\$a + \$b = {$a} + {$b} = " . ($a + $b);
} else{
 echo 'Остальные условия ($a = 0, $b = 0) рассматривать не требовалось';
}
?>
</strong>
<hr>
2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.<br>
<strong>
<?php
$b = 15;
$a = rand(0, $b);
switch($a <= $b){
 case($a === 0):
  echo $a++ . ', ';
 case($a === 1):
  echo $a++ . ', ';
 case($a === 2):
  echo $a++ . ', ';
 case($a === 3):
  echo $a++ . ', ';
 case($a === 4):
  echo $a++ . ', ';
 case($a === 5):
  echo $a++ . ', ';
 case($a === 6):
  echo $a++ . ', ';
 case($a === 7):
  echo $a++ . ', ';
 case($a === 8):
  echo $a++ . ', ';
 case($a === 9):
  echo $a++ . ', ';
 case($a === 10):
  echo $a++ . ', ';
 case($a === 11):
  echo $a++ . ', ';
 case($a === 12):
  echo $a++ . ', ';
 case($a === 13):
  echo $a++ . ', ';
 case($a === 14):
  echo $a++ . ', ';
 default:
  echo "{$b}.";
}
?>
</strong>
<hr>
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.<br>
<strong>
<?php
function fA($a = 0, $b = 0){
 return "\$a - \$b = {$a} - {$b} = " . ($a-$b);
}
function fB($a = 0, $b = 0){
 return "\$a + \$b = {$a} + {$b} = " . ($a+$b);
}
function fC($a = 0, $b = 0){
 if($b == 0){
  return 'На ноль делить нельзя';
 }
 return "\$a / \$b = {$a} / {$b} = " . ($a/$b);
}
function fD($a = 0, $b = 0){
 return "\$a * \$b = {$a} * {$b} = " . ($a*$b);
}

echo fA(rand(1, 3), rand(1, 3)) . "<br>" .
     fB(rand(1, 3), rand(1, 3)) . "<br>" .
     fC(rand(1, 3), rand(1, 3)) . "<br>" .
     fD(rand(1, 3), rand(1, 3));
?>
</strong>
<hr>
4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).<br>
<strong>
<?php
function mathOperation($arg1, $arg2, $operation){
 switch(!empty($arg1) && !empty($arg2) && !empty($operation)){
  case($operation == 0):
   $response = fA($arg1, $arg2);
   break;
  case($operation == 1):
   $response = fB($arg1, $arg2);
   break;
  case($operation == 2):
   $response = fC($arg1, $arg2);
   break;
  default:
   $response = fD($arg1, $arg2);
 }

 return $response;
}
echo mathOperation(rand(1, 3), rand(1, 3), rand(0, 3));
?>
</strong>
<hr>
5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.<br>
<strong>
<?php
//Делали на уроке
?>
</strong>
<hr>
6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.<br>
<strong>
<?php
function power($val, $pow, $initialVal = 0){
 if($initialVal == 0){
  $initialVal = $val;
 }
 if($pow > 1){
  $val *= $initialVal;
  $pow--;

  return power($val, $pow, $initialVal);
 }

 return $val;
}
$a = rand(2, 9);
$b = rand(2, 3);
echo "\$a<sup>\$b</sup> = {$a}<sup>{$b}</sup> = " . power($a, $b);
?>
</strong>
<hr>
7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:<br>
22 часа 15 минут<br>
21 час 43 минуты<br>
<strong>
<?php
$h = date('H'); // rand(0, 23);
$m = date('i'); // rand(0, 59);
$s =date('s'); // rand(0, 59);

switch(isset($h)){
 case((int)$h === 0 || ((int)$h > 4 && (int)$h < 21)):
  $h .= ' часов';
  break;
 case((int)$h === 1 || (int)$h == 21):
  $h .= ' час';
  break;
 default:
  $h .= ' часа';
}

$m_ = substr($m, -1, 1);
switch(isset($m_)){
 case((int)$m_ === 1):
  $m .= ' минута';
  break;
 case((int)$m_ > 1 && (int)$m_ < 5):
  $m .= ' минуты';
  break;
 default:
  $m .= ' минут';
}

$s_ = substr($s, -1, 1);
switch(isset($s_)){
 case((int)$s_ === 1):
  $s .= ' секунда';
  break;
 case((int)$s_ > 1 && (int)$s_ < 5):
  $s .= ' секунды';
  break;
 default:
  $s .= ' секунд';
}

echo $h . ' ' . $m . ' ' . $s;
?>
</strong>