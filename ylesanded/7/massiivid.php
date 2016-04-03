<!DOCTYPE html>
<html>
<?php
$pildid= array(
    array('nimi'=>'viski', 'taust'=>'sinine', 'varv' => 'pruun', 'motiiv' => 'mees','pilt' => 'p7/THUMB/1t.jpg'),
    array('nimi'=>'twingo', 'taust'=>'kirju', 'varv' => 'roheline', 'motiiv' => 'auto', 'pilt' => 'p7/THUMB/2t.jpg'),
    array('nimi'=>'kek', 'taust'=>'valge', 'varv' => 'valge', 'motiiv' => 'irve', 'pilt' => 'p7/THUMB/3t.jpg'),
    array('nimi'=>'whale', 'taust'=>'kirju', 'varv' => 'roosa', 'motiiv' => 'trussarid', 'pilt' => 'p7/THUMB/4t.jpg'),
    array('nimi'=>'pepe', 'taust'=>'helesinine', 'varv' => 'roheline', 'motiiv' => 'konn', 'pilt' => 'p7/THUMB/5t.jpg'),

);?>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pildid</title>
</head>

<?php
foreach ($pildid as $pilt) {
    include 'pildid.html';
};
?>