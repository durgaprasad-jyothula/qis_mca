<?php
include "connection.php";

// DELETE query
$delete = "DELETE FROM Books WHERE Title='The Catcher in the Rye'";

if (mysqli_query($conn, $delete)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}




	
?>