<?php
include "connection.php";

// UPDATE query
$update = "UPDATE Books SET Genre='Classic Fiction' WHERE BookId=2";

if (mysqli_query($conn, $update)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}




	
?>