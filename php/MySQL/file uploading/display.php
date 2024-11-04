<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Files</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Uploaded Files</h1>
    
    <table>
        <thead>
            <tr>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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

            // Directory where files are uploaded
            $targetDir = "uploads/";
            
            // Get all files in the uploads directory
            $uploadedFiles = array_diff(scandir($targetDir), array('..', '.'));
            
            // Display each file in a table row
            foreach ($uploadedFiles as $file): ?>
                <tr>
                    <td><?php echo htmlspecialchars($file); ?></td>
                    <td>
                        <a href="<?php echo $targetDir . htmlspecialchars($file); ?>" target="_blank">View</a>
                        <form action="delete_file.php" method="post" style="display:inline;">
                            <input type="hidden" name="file_name" value="<?php echo htmlspecialchars($file); ?>">
                            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this file?');">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="upload_form.php">Upload More Files</a></p>
</body>
</html>
