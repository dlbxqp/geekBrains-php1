<?php
#< CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
#> CORS
header('Content-type: json/application');

require './.inc/connect.inc';


$a_Q = explode('/', $_REQUEST['q']);
$type = $a_Q[0];
if($a_Q[1] != ''){
 $index = $a_Q[1];
}
#
$method = $_SERVER['REQUEST_METHOD'];

if($type === 'offers'){
 require './.inc/offers.inc';
} else{
 require './.inc/reports.inc';
}

die( json_encode($aResult) );