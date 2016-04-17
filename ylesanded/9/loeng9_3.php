<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php if ((!empty($_GET) || !empty($_GET["q"])) && is_numeric($_GET["q"])): ?>
        <table border="2">
            <?php for ($i=0; $i < $_GET['q']; $i++): ?>
                <tr>
                    <?php for ($j=0; $j < $_GET['q']; $j++): ?>
                        <td>
                            <?php
                            echo (($i+1)."-".($j+1));
                            ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
    <?php elseif (empty($_GET)): { echo ("Tere, palun sisesta number"); } else: { echo "Proovige uuesti, Te ei sisestanud numbrit";}?>
    <?php endif; ?>
</head>

<body>
<form action="loeng9_3.php" METHOD="GET">
    <input type="number" name="q">
    <input type="submit" name="s" value="Esita">
</form>
</body>
</html>

