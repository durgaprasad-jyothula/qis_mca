<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    
    // File upload configuration
    //$targetDir: Specifies the directory where the uploaded files will be saved (uploads/)
    $targetDir = "uploads/";
    //$fileName: Retrieves the original name of the uploaded file (removes any path information).
    $fileName = basename($_FILES["file"]["name"]);
    //$targetFilePath: Combines the target directory and the file name to create the full path where the file will be stored.
    $targetFilePath = $targetDir . $fileName;
    //$fileType: Extracts the file extension from the target file path (e.g., jpg, png, etc.).
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
    
    if (!empty($_FILES["file"]["name"])) {
        // Validate file type
        if (in_array($fileType, $allowedTypes)) {
            // Upload file to server
            //move_uploaded_file(): This function moves the uploaded file from its temporary location to the desired target location ($targetFilePath).
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                echo "The file ".$fileName. " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed to upload.";
        }
    } else {
        echo "Please select a file to upload.";
    }
}
?>
