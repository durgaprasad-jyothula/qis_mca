<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    
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

    // File upload configuration
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
    
    if (!empty($_FILES["file"]["name"])) {
        // Validate file type
        if (in_array($fileType, $allowedTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                echo "The file " . $fileName . " has been uploaded.";
                echo "<br>";
                // Prepare SQL statement
                $sql = "INSERT INTO upload_files (file_name) VALUES ('$fileName')";
                
                // Execute the query
                if (mysqli_query($conn, $sql)) {
                    echo "File name stored in database.";
                } else {
                    echo "Error storing file name in database: " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed to upload.";
        }
    } else {
        echo "Please select a file to upload.";
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
