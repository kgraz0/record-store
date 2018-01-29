<?php

$content = "<h1>Add a new record</h1>";

$action = htmlspecialchars($_SERVER["PHP_SELF"]."?page=add-record");

$sql = "SELECT id, first_name, last_name FROM artist ORDER BY last_name";

$result = mysqli_query($link, $sql);

if ($result === false) {
    echo mysqli_error($link);
} else {
    $options = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='".$row['id']."'>";
        $options .= $row['first_name']." ".$row['last_name'];
        $options .= "</option>";
    }
}

$form_html = "<form action='".$action."' method='POST'>
		     
             <div style='width:250px;'>
            <fieldset>
            Identifier: <input type='text' name='identifier' placeholder='XXXXX' maxlength='5' size='5' style='float:right'/> <br> <br>
            Title: <input type='text' name='title' maxlength='20' size='20' style='float:right'/> <br> <br>
            
            Artist: <select name='artist_id' style='float:right'>
            ".$options."
            </select> <br> <br>

            Type: <select name='type' style='float:right'/>
            <option value='CD'>CD</option>
            <option value='DVD'>DVD</option>
            <option value='Cassette'>Cassette
            <option value='Vinyl 9'>Vinyl 9</option>
            <option value='Vinyl 12'>Vinyl 12</option>
            </select> <br> <br>

            Genre: <select name='genre' style='float:right'>
            <option value='Jazz'>Jazz</option>
            <option value='Pop'>Pop</option>
            <option value='Country'>Country</otion>
            <option value='Hip-Hop'>Hip-Hop</option>
            </select> <br> <br>

            Year: <input type='text' name='year' placeholder='YYYY' maxlength='4' size='4' style='float:right'/> <br> <br>
            Price (&pound): <input type='text' name='price' placeholder='00.00' maxlength='6' size='6' style='float:right'/> <br> <br>
            <button type='submit'>Submit</button>
            </fieldset>
            </div>
            </form>";

$content .= $form_html;

function clean_input($data) {
  $data = trim($data); // strips unnecessary characters from beginning/end
  $data = stripslashes($data); // remove backslashes
  $data = htmlspecialchars($data); // replace special characters with HTML entities
  return $data;
}

$title = $artist_id = $price = $year = $genre = $type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$identifier = mysqli_real_escape_string($link, clean_input($_POST["identifier"]));
	$title =  mysqli_real_escape_string($link, clean_input($_POST["title"]));
	$artist_id =  mysqli_real_escape_string($link, clean_input($_POST["artist_id"]));
    $type = mysqli_real_escape_string($link, clean_input($_POST["type"]));
	$genre =  mysqli_real_escape_string($link, clean_input($_POST["genre"]));
	$year =  mysqli_real_escape_string($link, clean_input($_POST["year"]));
	$price =  mysqli_real_escape_string($link, clean_input($_POST["price"]));

	$sql = "INSERT INTO record_store (identifier, artist_id, title, year, genre, type, price)
		VALUES ('$identifier', '$artist_id', '$title', '$year', '$genre', '$type', '$price')";

	$result = mysqli_query($link, $sql);

	if ($result === false) {
		echo mysqli_error($link);
	} else {
		$content .= "Record successfully added to database.";
	}
}

echo($content);

?>