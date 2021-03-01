<?php
$aPhotos = array_slice( scandir(PHOTOS), 2 );

$template = $twig->loadTemplate('main.tmpl');
echo $template->render([
 'h1' => 'Page of Photos',
 'photosDir' => PHOTOS,
 'photos' => $aPhotos
]);