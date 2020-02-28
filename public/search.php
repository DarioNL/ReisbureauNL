<?php


require '../private/functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>challenge</title>
    <link rel="stylesheet" href="stylesheets/reisbureau1.css">
    <script src="https://kit.fontawesome.com/0c4bf3b3d6.js" crossorigin="anonymous"></script>

</head>

<?php
$normal_user = false;
$stad = $_GET['stad'];
$landen = $_GET['land'];
$continenten = $_GET['continent'];

print_r($_GET);
echo "azië";


?>

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
    <form action="index.php" id="Reisformulier" method="get">
        <label for="continent">
            <input type="text" id="continent" name="continent" placeholder="continent">
        </label>
        <label for="land">
            <input type="text" id="land" name="land" placeholder="land">
        </label>
        <label for="stad">
            <input type="text" id="stad" name="stad" placeholder="stad">
        </label>
        <label for="stad">
            <input type="submit" value="zoeken">
        </label>
    </form>
</div>

<div id="wrapper">
    <table class="zoektabel">
        <tbody>
        <tr id="termen">
            <td>
                continent
            </td>
            <td>
                land
            </td>
            <td>
                stad
            </td>
            <td>
                prijs
            </td>

        </tr>
        <?php
        if (!empty($stad)){
        search(0,0, $stad);
        }
        if (!empty($landen)){
            search(0, $landen, $stad);
        }else{
            search($continenten,0,0);
        }
        ?>
        </tbody>
    </table>
</div>
<footer>
    <?php echo auto_copyright(2019)?>
</footer>
</body>
</html>