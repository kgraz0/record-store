<?php

$content = "<h1> Records </h1>";

/*  Perform a query */
$sql = "SELECT a.first_name, a.last_name, r.title, r.genre, r.type, r.year, r.price, a.id 
FROM record_store r 
INNER JOIN artist a 
ON r.artist_id=a.id 
ORDER BY r.price ASC, r.title";
$result = mysqli_query($link, $sql);
$num_rows = 0;

/* Check whether a query returned any results */
if ($result === false) {
    echo mysqli_error($link);
} else {
    $content .= "<table border='1'><tbody>";
    $content .= "<th>Row</th>";
    $content .= "<th>Artist Name</th>";
    $content .= "<th>Title</th>";
    $content .= "<th>Genre</th>";
    $content .= "<th>Type</th>";
    $content .= "<th>Year</th>";
    $content .= "<th>Price</th>";
    // fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $num_rows++;
        $content .= "<tr>";
        $content .= "<th>$num_rows</th>";
        $content .= "<td><a href='?page=artist&id=".$row['id']."'>".$row['first_name']." ".$row['last_name']."</a></td>";
        $content .= "<td align = center>".$row['title']."</td>";
        $content .= "<td align = center>".$row['genre']."</td>";
        $content .= "<td align = center>".$row['type']."</td>";
        $content .= "<td align = center>".$row['year']."</td>";
        $content .= "<td align = center>&pound;".$row['price']."</td>";
        $content .= "</tr>";
    }
    $content .= "</tbody></table>";
    // free result set
    mysqli_free_result($result);
}

echo $content;
?>