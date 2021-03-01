<?php
require './includes/config.php';

require './includes/header.inc';

if(isset($_GET['p']) AND $_GET['p'] == 'photo'){
 require './pages/photo.inc';
} else{
 require './pages/main.inc';
}

require './includes/footer.inc';
