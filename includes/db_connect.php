<?php

/* Establish a connection with the database */
$link = mysqli_connect(
'doc.gold.ac.uk',
'',
'',
'kgraz001_recordstore'
);

/* Check if the connection is successful */
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

?>