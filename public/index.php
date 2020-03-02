<?php
$normal_user = true;

$error = [];

require '../private/functions.php';





if (isset($_GET['continent'])) {
    $search_continent = urldecode($_GET['continent']);
    $lowerd_Search_continent = strtolower($search_continent);
    $_GET['continent'] = $search_continent;
    echo $search_continent." continent zit er in";
}
if (isset($_GET['land'])){
    $search_landen = urldecode($_GET['land']);
    $lowerd_Search_landen = strtolower($search_landen);
    $_GET['land'] = $lowerd_Search_landen;
    echo "land zit er in";
}
if (isset($_GET['stad'])){
    $search_steden = urldecode($_GET['stad']);
    $lowerd_Search_steden = strtolower($search_steden);
    $_GET['stad'] = $lowerd_Search_steden;
}

print_r($_GET);

if (!empty($_GET['continent'] && $_GET['land'] && $_GET['stad'])){
    header("location: search.php?continent=".$_GET['continent']."&land=".$_GET['land']."&stad=".$_GET['stad']."");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>challenge</title>
    <link rel="stylesheet" href="stylesheets/reisbureau1.css">
    <script src="https://kit.fontawesome.com/0c4bf3b3d6.js" crossorigin="anonymous"></script>

</head>

<body>
<div class="transnav">
    <ul>
        <li>ReisbureauNL</li>
        <li id="1"><a href="index.php">Home</a></li>
        <li><a href="reizen.php">Reizen</a></li>
        <li><a href="login.php">log in</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php if (!$normal_user): ?>
        <li><a href="beheer.php">Beheer</a></li>
        <?php endif; ?>
    </ul>
</div>

<div id="reismenu">
    <form action="index.php " id="Reisformulier" method="get">
        <label for="continent">
            <input list="continenten" name="continent" id="continent" placeholder="continent" autocomplete="off">
            <datalist id="continenten">
                <?php zoek_lijst_maken("continentennaam"); ?>
            </datalist>
        </label>
        <label for="land">
            <input list="landen" id="land" name="land" placeholder="land" autocomplete="off">
            <datalist id="landen">
                <?php zoek_lijst_maken("landnaam"); ?>
            </datalist>
        </label>
        <label for="stad">
            <input list="steden" id="stad" name="stad" placeholder="stad" autocomplete="off">
            <datalist id="steden">
                <?php zoek_lijst_maken("stadnaam"); ?>
            </datalist>
        </label>
        <label for="submit">
            <input type="submit" value="zoeken">
        </label>
    </form>
</div>

<div id="wrapper">

    </div>
<footer>
    <?php echo auto_copyright(2019)?>
</footer>
</body>
</html>