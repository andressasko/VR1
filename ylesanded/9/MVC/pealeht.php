<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>minuleht</title>
<!--    stiili peaks lahku lööma sellest failist-->
    <style>
        body {background:skyblue;}
        #menu {margin:0; padding:0; background:goldenrod;}
        #menu li {display:inline-block;}
        #menu a {color: black; font-weight:bold; display:inline-block; padding: 5px; text-decoration:none;}
        #menu a:hover {color:maroon;}
        #wrap {
            width:600px; margin:auto; background:white;
        }
        #content{padding:10px;}
    </style>
</head>
<body>
<div id="wrap">
    <ul id="menu">
        <li><a href="pealeht.php">pealeht</a></li>
        <li><a href="pealeht.php">pealeht</a></li>
    </ul>
    <div id="content">
        <form action="kontroller.php?mode=kontroll" method="POST">
            <label>
                <input type="text" name="nimi" <?php
            if(!empty($_POST["nimi"]))
                echo "value=\"".htmlspecialchars($_POST["nimi"])."\" ";
            ?> />
            </label> Nimi <br/>

            <label>
                <input type="number" name="vanus" <?php
            if(!empty($_POST["vanus"]) && is_numeric($_POST["vanus"]))
                echo "value=\"".htmlspecialchars($_POST["vanus"])."\" ";
            ?>/>
            </label> Vanus<br/>

            Sugu: <br/>
            <label><input type="radio" name="sugu" value="m" <?php
                if(!empty($_POST["sugu"]) && $_POST["sugu"] == "m")
                    echo "checked";
                ?>
                /> M</label><br/>
            <label><input type="radio" name="sugu" value="n" <?php
                if(!empty($_POST["sugu"]) && $_POST["sugu"] == "n")
                    echo "checked";
                ?>/> N</label><br/>

            <label>
                <input type="text" name="kood" <?php
            if(!empty($_POST["kood"]))
                echo "value=\"".htmlspecialchars($_POST["kood"])."\" ";
            ?>/>
            </label> Kood<br/>

            <textarea name="komm" placeholder="Kommentaarid"><?php
                if (!empty($_POST["komm"]))
                    echo htmlspecialchars($_POST["komm"]);
                ?></textarea><br/>
            <input type="submit" value="registreeru"/>
<!--            --><?php
//            if (!empty(( $GLOBALS ['errors']))): foreach ( $GLOBALS ['errors'] as $e): ?>
<!--                <p style="color: crimson">--><?php //echo $e ?><!--</p>-->
<!--            --><?php //endforeach; endif;
//            ?>
        </form>
    </div>
</div>
</body>
</html>