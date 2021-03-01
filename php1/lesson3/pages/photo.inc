<?php
$template = $twig->loadTemplate('photo.tmpl');
echo $template->render([
 'h1' => 'Page of Photo ' . $_GET['i'],
 'pathToPhoto' => PHOTOS . $_GET['i'],
]);