<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php
    if (!empty($_POST)){
        if (!empty($_POST["q"])){
            $q=urlencode($_POST['q']);
            header("Location: https://www.google.com/search?q={$q}");
            exit(0);
        } else {
            echo "Palun sisesta otsingusõna";
        }
    }
    ?>
</head>

<body>
<form action="loeng9_1.php" METHOD="POST">
    <input type="text" name="q">
    <input type="submit" name="s" value="Otsi Googlest">
</form>
</body>
</html>

