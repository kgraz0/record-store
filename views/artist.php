<?php

if (!isset($_GET['id'])) {
    $content = "<h1>This artist cannot be found.</h1>";
} else {
    $artist_id = $_GET['id'];

/*  Perform a query */
$sql = "SELECT r.title, r.year, r.genre, r.type, r.price, a.first_name, a.last_name 
FROM record_store r 
INNER JOIN artist a 
ON r.artist_id=a.id 
WHERE a.id='$artist_id'
ORDER BY r.price ASC, r.title"; 
$result = mysqli_query($link, $sql);

/* Check whether a query returned any results */
if ($result === false) {
	echo mysqli_error($link);
} else {
    $num_rows = 0;

    // fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
        if ($num_rows == 0) {
            $content = "<h1>".$row['first_name']." ".$row['last_name']." Records</h1>";
            $content .= "<table border='1'></tbody>";
            $content .= "<th>Row</th>";
            $content .= "<th>Title</th>";
            $content .= "<th>Genre</th>";
            $content .= "<th>Type</th>";
            $content .= "<th>Year</th>";
            $content .= "<th>Price</th>";
        }
        $num_rows++;
        $content .= "<tr>";
        $content .= "<th>$num_rows</th>";
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
}

echo $content;

?>