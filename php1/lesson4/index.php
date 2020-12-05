<?php
function photogallery($dir){
 if(is_dir($dir)){
  $aFiles = scandir($dir);
  for($i=2; $i<count($aFiles); $i++){
   if(is_dir($dir . '/' . $aFiles[$i])){
 continue;
   }

   $src = $dir . '/small/' . $aFiles[$i];
   if(!is_file($src)){
    $filename = $dir . '/' . $aFiles[$i];
    $info = getimagesize($filename);
    $width = $info[0];
    $height = $info[1];
    $type = $info[2];

    switch ($type) {
     case 1:
      $img = imageCreateFromGif($filename);
      imageSaveAlpha($img, true);
      break;
     case 3:
      $img = imageCreateFromPng($filename);
      imageSaveAlpha($img, true);
      break;
     default:
      $img = imageCreateFromJpeg($filename);
    }
    //< Уменьшение изображения
    $w = 240;
    $h = 240;
    if (empty($w)) {
     $w = ceil($h / ($height / $width));
    }
    if (empty($h)) {
     $h = ceil($w / ($width / $height));
    }

    $tmp = imageCreateTrueColor($w, $h);
    if ($type == 1 || $type == 3) {
     imagealphablending($tmp, true);
     imageSaveAlpha($tmp, true);
     $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
     imagefill($tmp, 0, 0, $transparent);
     imagecolortransparent($tmp, $transparent);
    }

    $tw = ceil($h / ($height / $width));
    $th = ceil($w / ($width / $height));
    if ($tw < $w) {
     imageCopyResampled($tmp, $img, ceil(($w - $tw) / 2), 0, 0, 0, $tw, $h, $width, $height);
    } else {
     imageCopyResampled($tmp, $img, 0, ceil(($h - $th) / 2), 0, 0, $w, $th, $width, $height);
    }

    $img = $tmp;
    //> Уменьшение изображения
    switch ($type) {
     case 1:
      imageGif($img, $src);
      break;
     case 3:
      imagePng($img, $src);
      break;
     default:
      imageJpeg($img, $src, 80);
    }
    imagedestroy($img);
   }

   $photos .= '<a data-fancybox="gallery" href="' . $dir . '/' . $aFiles[$i] . '"><img src="' . $src . '"></a>';
  }

  return $photos;
 } else{
  return $dir . ' не найдена, проверте указанный адрес';
 }
}
?>
<style>
#photogallery{ border: 1px dotted red;
 display: flex; flex-wrap: wrap; justify-content: center;
}
#photogallery > *{
 padding: 1px
}

#photogallery img{
 width: 100%; height: auto
}
</style>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


<div id="photogallery">
<?=photogallery('./img')?>
</div>
