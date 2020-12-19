<?php
function f($a){ //die("<pre>" . print_r($a, TRUE) . "</pre>");
 foreach($a AS $v){
  $v = htmlspecialchars( stripslashes( trim( rawurldecode($v) ) ) );
 }

 return $v;
}
f($_GET);
f($_POST);