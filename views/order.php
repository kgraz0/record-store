<?php

if (isset($_GET['order_id']))
{
	$order_id = $_GET['order_id'];
} else { 
	$order_id = -1; // if not, set to an implausible value
}

/*  Perform a query */
$sql = "SELECT r.identifier, r.title, o.quantity, o.transaction_id, r.price 
FROM record_store r 
INNER JOIN orderInfo o
ON o.record_identifier=r.identifier
WHERE o.transaction_id ='$order_id'
ORDER BY r.price ASC, r.title";

$result = mysqli_query($link, $sql);

/* Check whether a query returned any results */
if ($result === false) {
    echo mysqli_error($link);
} else {
	$num_rows = mysqli_num_rows($result);

	if ($num_rows == 0) {
		$content = "<h1>Order was not found</h1>";
	} else {
		$content = "<h1>Order ".$order_id."</h1>";
		$content .= "<table border='1'>";
		$content .= "<thead><tr>
		            <th> Identifier </th>
		            <th> Title </th>
		            <th> Quantity </th>
		            <th> Price </th>
		            <th> Total </th>
		            </tr></thead>";
		$content .= "<tbody>";
		$total = 0.00;
    
    // fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
    	$subtotal = $row['quantity'] * $row['price'];
    	$total = $total + $subtotal;
        $content .= "<tr>";
        $content .= "<td align = center>".$row['identifier']."</td>";
        $content .= "<td align = center>".$row['title']."</td>";
        $content .= "<td align = center>".$row['quantity']."</td>";
        $content .= "<td align = center>&pound;".$row['price']."</td>";
        $content .= "<td align = center>&pound;".$subtotal."</td>";
        $content .= "</tr>";
    }
    $content .= "<tr><td colspan=4><b>TOTAL</b><td align = center><b>&pound;".$total."</b></td></tr>";
    $content .= "</tbody></table>";
    // free result set
    mysqli_free_result($result);
}
}

echo $content;
?>