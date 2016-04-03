<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<h1>PHP</h1>
<code>
    <?php
    $muutuja = "444";
    $muutuja2 = 123;
    echo $muutuja . $muutuja2;
    echo nl2br ("\n"); //reavahetus
    echo $muutuja + $muutuja2;
    echo nl2br ("\n"); //reavahetus
    $muutuja = "33aaa";
    $muutuja2 = bb12;
    echo $muutuja + $muutuja2 + 6;
    echo nl2br ("\n"); //reavahetus
    $muutuja = "3e3aaa";
    $muutuja2 = bb12;
    echo $muutuja + $muutuja2 + 6;
    echo nl2br ("\n\n"); //reavahetus
    $user ="Meelis";
    echo "Tere <b>${user}</b>";
    echo nl2br ("\n"); //reavahetus
    $user ="Meelis,
    Mati,
    Kuldar";
    echo "Tere <b>${user}</b>";
    echo nl2br ("\n"); //reavahetus
    $user ="\n
    Meelis,
    Mati ja
    Kuldar.";
    echo nl2br ("Tere <b>${user}</b>");
    /*mitmerealine
    kommentaar */
    echo nl2br ("\n\n"); //reavahetus
    $tekst = <<<LOPU_TAHIS
        ...mingi \npikk \ntekst...
LOPU_TAHIS;
    echo  nl2br ($tekst);

    echo nl2br ("\n\n"); //reavahetus

    function loenda_lambaid($n) {
        $l = "lammas";
        for ($i=1; $i<$n+1; $i=$i+1) {
            if ($i==1){
                echo "$i. $l<br/>\n";
            }
            else {
                echo "$i. {$l}t<br/>\n";
            }
        }
    }
    loenda_lambaid(10);

    echo nl2br ("\n"); //reavahetus
    $aaa =123;
    if (isset($aaa)){
        echo "olemas";
    } else {
        echo "ei ole";
    }

    echo nl2br ("\n\n"); //reavahetus
    $abc =123;
    if (isset($bbb)){
        echo "olemas";
    } else {
        echo "ei ole olemas";
    }

    $kala = "saba";
    $puud = "mets";
    echo nl2br ("\n \n"); //reavahetus
    function mingi(){
        global $kala;
        if (isset($kala)){
            echo "kala olemas";
        } else {
            echo " kala ei ole olemas";
        }
        echo nl2br ("\n"); //reavahetus
        if (isset($puud)){
            echo "puud olemas";
        } else {
            echo " puid ei ole olemas";
        }
    }
    mingi();

    $vanus = 51;
    echo nl2br ("\n \n"); //reavahetus

    switch ($mode){
        case 'kass': /* tee midagi kassiga */ break;
        case 'koer': /* tee midagi koeraga */ break;
        default : echo "Eritingimused ei kohaldu"; break;
    }

    echo nl2br ("\n \n"); //reavahetus
//    $kass=array();
//    $kass = array('Tom', 3, 'Hall');
    $kass = array(
        'nimi' => 'Tom',
        'vanus' => 3,
        'karv' => 'hall'
    );
    $kass["kaal"] = "5 kilo";
    echo nl2br ("Kassi nimi on ${kass['nimi']}.\n");
    echo "Kassi kaal on ${kass['kaal']}.";

    echo nl2br ("\n \n"); //reavahetus
    var_dump($kass);

    $loomad = array();
    $loomad[] = $kass;
    echo nl2br ("\n \n"); //reavahetus
    echo "Kassi karv on " . $loomad[0][karv] . ".";

    echo nl2br ("\n \n"); //reavahetus
    echo "Kass:";
    foreach ($kass as $vaartus){
        echo "| $vaartus |";
    }

    echo nl2br ("\n \n"); //reavahetus
    echo "Kass:";
    foreach ($kass as $voti => $vaartus){
        echo "| $voti = $vaartus |";
    }

    echo nl2br ("\n \n"); //reavahetus
    shuffle($kass);
    var_dump($kass);
    count($kass);

//    include('fail.php'); //kui seda ei ole, siis veateade
//    require('fail.php'); //kui seda ei ole, siis programm lõpetab töö

    echo nl2br ("\n \n"); //reavahetus
    print_r($kass);
?>

    <?php echo nl2br ("\n \n"); if($vanus > 50): ?>
    Sulle kehtib pensionäride hind
    <?php else: ?>
    Sulle kehtib tavaline hind
    <?php endif; ?>

    <?php
    echo nl2br ("\n \n");
    for ($i=1; $i<10; $i++): ?>
    <img src="pilt<?php echo $i; ?>.jpg" />
    <?php endfor; ?>



</code>

</body>
</html>