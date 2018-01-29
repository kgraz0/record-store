<?php

$content = "<h1> Orders </h1>";

/*  Perform a query */
$sql = "SELECT id, customer_id FROM transaction ORDER BY customer_id";
$result = mysqli_query($link, $sql);

/* Check whether a query returned any results */
if ($result === false) {
    echo mysqli_error($link);
} else {
	$num_rows = mysqli_num_rows($result);

	if ($num_rows > 0) {
    $content .= "<table border='1'><tbody>";
    $content .= "<th>Order ID</th>";
    $content .= "<th>Customer ID</th>";

    // fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $content .= "<tr>";
        $content .= "<td><a href=\"?page=order&order_id=".$row['id']."\">".$row['id']."</a></td>";
        $content .= "<td>".$row['customer_id']."</td>";
        $content .= "</tr>";
    }
    $content .= "</tbody></table>";
} else {
	$content .= "<p>There are no orders to display.</p>";
}
    // free result set
    mysqli_free_result($result);
}

echo $content;
?>