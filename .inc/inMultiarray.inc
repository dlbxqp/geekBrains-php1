<?php
function inMultiarray($target, $array){
 $array = array_values($array);

 $i = 0;
 while($i <= count($array) - 1){
  if(isset($array[$i])){
   if($array[$i] == $target){
    return TRUE;
   } else{
    if(is_array($array[$i])){
     if(inMultiarray($target, ($array[$i]))){
      return TRUE;
     }
    }
   }
  }
  $i++;
 }

 return FALSE;
}