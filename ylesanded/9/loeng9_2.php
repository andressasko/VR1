<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php
    //turvaline
    if (!empty($_POST)){
        if (!empty($_POST["q"])) {
        echo htmlspecialchars($_POST['q']);
        }
    }
    ?>
    <hr/>
    <?php
    //ebaturvaline
    if (!empty($_POST)){
        if (!empty($_POST["q"])) {
            echo $_POST['q'];
        }
    }
    ?>
</head>

<body>
<form action="loeng9_2.php" METHOD="POST">
    <textarea name="q"></textarea>
    <input type="submit" name="s" value="Postita">
</form>
</body>
</html>

