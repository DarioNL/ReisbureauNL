<?php
function search($continent, $land, $stad){
    $dbc = mysqli_connect('localhost', 'ReisbureauNL', 'Reizen', 'locatie') or die('Error connecting.');
    mysqli_set_charset($dbc, "utf8");
    $query = "SELECT * FROM reis_view WHERE stadnaam = '$stad' OR landnaam = '$land' OR continentennaam = '$continent'";
    $result = mysqli_query($dbc, $query) or die ("Error querying.");
    print_r($result);
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>";
        echo ucwords($row["continentennaam"]);
        echo "</td>";
        echo "<td>";
        echo ucwords($row["landnaam"]);
        echo "</td>";
        echo "<td>";
        echo ucwords($row["stadnaam"]);
        echo "<br>";
        echo "</td>";
        echo "<td>";
        echo "".$row["prijs"];
        echo "</td>";
    }
}

function zoek_lijst_maken($type){
    $dbc = mysqli_connect('localhost', 'ReisbureauNL', 'Reizen', 'locatie') or die('Error connecting.');
    mysqli_set_charset($dbc, "utf8");
    $query = "SELECT $type FROM reis_view";
    $result = mysqli_query($dbc, $query) or die ("Error querying.");
    while($row = mysqli_fetch_row($result)) {
        echo "<option value=";
        echo ucwords($row[$type]);
        echo ">";
    }
}

function auto_copyright($startYear) {
    $currentYear = date('Y');
    if ($startYear < $currentYear) {
        $currentYear = date('y');
        return "&copy; $startYear&ndash;$currentYear";
    } else {
        return "&copy; $startYear";
    }
}