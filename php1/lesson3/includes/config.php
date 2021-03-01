<?php
CONST PHOTOS = './images/';

//< twig
require './vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment(
 $loader,
 [
  'cache' => './vendor/twig/twig/compilation_cache'
 ]
);