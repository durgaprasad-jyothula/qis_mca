<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root";    
$password = "";    
$dbname = "librarydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request method is POST and the file name is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["file_name"])) {
    $fileName = basename($_POST["file_name"]);
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $fileName;

    // Delete the file from the server
    if (file_exists($targetFilePath)) {
        unlink($targetFilePath); // Delete file from directory
        
        // Prepare SQL statement to delete the file record from the database
        $sql = "DELETE FROM upload_files WHERE file_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $fileName);
        
        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "File deleted successfully.";
        } else {
            echo "Error deleting file from database: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "File does not exist.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the uploaded files page
header("Location: display.php"); // Change this to your actual file listing page
exit;
?>
