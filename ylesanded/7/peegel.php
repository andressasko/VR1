<?php
$tekst = '0 aias sadas saia 1';
echo nl2br("Enne: $tekst\n\n");
$temp = '';
for ($i = 0, $j = mb_strlen($tekst); $i < $j; $i++) {
    $temp .= $tekst{$j - $i - 1};
};
echo nl2br ("Pärast: $temp\n\n");
?>

