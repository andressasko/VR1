<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>yl 8-1</title>

    <?php
    $background_color="#aaa";
    if (isset($_POST['taustaVarv']) && $_POST['taustaVarv']!="") {
        $background_color=htmlspecialchars($_POST['taustaVarv']);
    }
    $text_color="#000";
    if (isset($_POST['tekstiVarv']) && $_POST['tekstiVarv']!="") {
        $text_color=htmlspecialchars($_POST['tekstiVarv']);
    }
    $border_color="#000";
    if (isset($_POST['piirjooneVarvus']) && $_POST['piirjooneVarvus']!="") {
        $border_color=htmlspecialchars($_POST['piirjooneVarvus']);
    }
    $border_style="solid";
    if (isset($_POST['piirjooneStiil']) && $_POST['piirjooneStiil']!="") {
        $border_style=htmlspecialchars($_POST['piirjooneStiil']);
    }
    $border_width="5px";
    if (isset($_POST['piirjooneLaius']) && $_POST['piirjooneLaius']!="") {
        $border_width=htmlspecialchars($_POST['piirjooneLaius']);
    }
    $radius="5px";
    if (isset($_POST['nurgaRaadius']) && $_POST['nurgaRaadius']!="") {
        $radius=htmlspecialchars($_POST['nurgaRaadius']);
    }
    $text="input";
    if (isset($_POST["input"]) && $_POST["input"]!="") {
        $text=htmlspecialchars($_POST["input"]);
    }
    ?>

    <style>
        #main {
            height: 150px;
            width: 250px;
            margin-bottom: 20px;
            background-color: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
            border-color: <?php echo $border_color; ?>;
            border-style: <?php echo $border_style; ?>;
            border-width: <?php echo $border_width."px"; ?>;
            border-radius: <?php echo $radius."px"; ?>;
        }
    </style>
</head>

<body>
<div id = main>
    <?php echo $text; ?>
</div>

<div>
    <form method="post" name="form">
        <textarea name="input" rows="5" cols="30"><?php
            if(!empty($_POST["input"])) {
                echo htmlspecialchars($_POST["input"]);
            } else {
                echo "\"\"";
            }
            ?></textarea><br>
        <input type="color" name="taustaVarv" <?php
        if(!empty($_POST["taustaVarv"])) {
            echo "value=\"" . htmlspecialchars($_POST["taustaVarv"]) . "\" ";
        } else {
            echo "value=\"#ffffff\"";
        }
        ?>>&emsp;Taustavärvus<br>
        <input type="color" name="tekstiVarv" <?php
        if(!empty($_POST["tekstiVarv"])) {
            echo "value=\"" . htmlspecialchars($_POST["tekstiVarv"]) . "\" ";
        } else {
            echo "value=\"#000000\"";
        }
        ?>>&emsp;Tekstivärvus<br>
        <input type="number" name="piirjooneLaius" min="0" max="50" <?php
        if(!empty($_POST["piirjooneLaius"]) && $_POST["piirjooneLaius"] > -1 && $_POST["piirjooneLaius"] <51) {
            echo "value=\"" . htmlspecialchars($_POST["piirjooneLaius"]) . "\" ";
        } else {
            echo "value=\"1\"";
        }
        ?>>&emsp; Piirjoone laius<br>
        <select name="piirjooneStiil">
            <option value ="none"<?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "none") {
                echo "selected";
            }
            ?>>none</option>
            <option value ="dotted" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "dotted") {
                echo "selected";
            }
            ?>>dotted</option>
            <option value ="dashed" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "dashed") {
                echo "selected";
            }
            ?>>dashed</option>
            <option value ="solid" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "solid") {
                echo "selected";
            }
            ?>>solid</option>
            <option value ="double" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "double") {
                echo "selected";
            }
            ?>>double</option>
            <option value ="groove" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "groove") {
                echo "selected";
            }
            ?>>groove</option>
            <option value ="ridge" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "ridge") {
                echo "selected";
            }
            ?>>ridge</option>
            <option value ="inset" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "inset") {
                echo "selected";
            }
            ?>>inset</option>
            <option value ="outset" <?php
            if(!empty($_POST["piirjooneStiil"]) && $_POST["piirjooneStiil"] == "outset") {
                echo "selected";
            }
            ?>>outset</option>
        </select>&emsp; Piirjoone stiil<br>
        <input type="color" name="piirjooneVarvus" <?php
        if(!empty($_POST["piirjooneVarvus"])) {
            echo "value=\"" . htmlspecialchars($_POST["piirjooneVarvus"]) . "\" ";
        } else {
            echo "value=\"#ffffff\"";
        }
        ?>>&emsp; Piirjoone värvus<br>
        <input type="number" name="nurgaRaadius" min="0" max="50" <?php
        if(!empty($_POST["nurgaRaadius"]) && $_POST["nurgaRaadius"] > -1 && $_POST["nurgaRaadius"] <51) {
            echo "value=\"" . htmlspecialchars($_POST["nurgaRaadius"]) . "\" ";
        } else {
            echo "value=\"0\"";
        }
        ?>>&emsp; Piirjoone nurga raadius<br>
        <input type="submit" value="esita">
    </form>
</div>
</body>
</html>