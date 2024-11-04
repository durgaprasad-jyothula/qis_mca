<?php
include "connection.php";

// SELECT query
$select = "SELECT * FROM Books";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "BookID: " . $row["BookID"] . " - Title: " . $row["Title"] . " - Author: " . $row["Author"] . " - Genre: " .$row["Genre"] . "<br>";
    }
} else {
    echo "0 results";
}




	
?>