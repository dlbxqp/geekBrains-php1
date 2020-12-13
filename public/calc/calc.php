<?php
$_POST = json_decode(file_get_contents('php://input'), TRUE);
require '../../.inc/security.inc';

if($_POST['action'] == '+'){
 $result = (int)$_POST['x'] + (int)$_POST['y'];
} elseif($_POST['action'] == '-'){
 $result = (int)$_POST['x'] - (int)$_POST['y'];
} elseif($_POST['action'] == '*'){
 $result = (int)$_POST['x'] * (int)$_POST['y'];
} elseif($_POST['action'] == '/'){
 $result = ((int)$_POST['y'] > 0) ? (int)$_POST['x'] / (int)$_POST['y'] : '?';
} else{
 $result = '?';
}

die( json_encode( $result ) );