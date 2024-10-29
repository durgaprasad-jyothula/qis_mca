<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Manipulation</title>
</head>
<body>
    <h1>String Manipulation Tool</h1>
    <form method="post">
        <label for="inputString">Enter a string:</label>
        <input type="text" id="inputString" name="inputString" value="<?php echo isset($_POST['inputString']) ? $_POST['inputString'] : ''; ?>">
        <br><br>
        
        <button type="submit" name="method" value="strlen">Get Length</button>
        <button type="submit" name="method" value="str_word_count">Word Count</button>
        <button type="submit" name="method" value="strpos">Find Position of 'Jyothula'</button>
        <button type="submit" name="method" value="strtoupper">Convert to Upper Case</button>
        <button type="submit" name="method" value="strtolower">Convert to Lower Case</button>
        <button type="submit" name="method" value="str_replace">Replace 'Prasad' with 'J'</button>
        <button type="submit" name="method" value="strrev">Reverse String</button>
        <button type="submit" name="method" value="trim">Trim Whitespace</button>
        <button type="submit" name="method" value="explode">Explode String by '_'</button>
        <button type="submit" name="method" value="concat">Concatenate with ' Prasad'</button>
        <button type="submit" name="method" value="substr">Substring from Index 6</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];
        $method = $_POST['method'];
        $output = "";
        $explanation = "";

        switch ($method) {
            case "strlen":
                $output = strlen($inputString);
                $explanation = "The length of the string is $output.";
                break;

            case "str_word_count":
                $output = str_word_count($inputString);
                $explanation = "The string contains $output word(s).";
                break;

            case "strpos":
                $output = strpos($inputString, "Jyothula");
                $explanation = $output !== false ? "The substring 'Jyothula' is found at position $output." : "The substring 'Jyothula' is not found.";
                break;

            case "strtoupper":
                $output = strtoupper($inputString);
                $explanation = "The string in upper case: $output.";
                break;

            case "strtolower":
                $output = strtolower($inputString);
                $explanation = "The string in lower case: $output.";
                break;

            case "str_replace":
                $output = str_replace("Prasad", "J", $inputString);
                $explanation = "Replaced 'Prasad' with 'J': $output.";
                break;

            case "strrev":
                $output = strrev($inputString);
                $explanation = "The reversed string is: $output.";
                break;

            case "trim":
                $output = trim($inputString);
                $explanation = "Trimmed string: '$output'.";
                break;

            case "explode":
                $output = explode("_", $inputString);
                $explanation = "Exploded string: ";
                echo "<pre>";
                print_r($output);
                echo "</pre>";
                break;

            case "concat":
                $output = $inputString . " Prasad";
                $explanation = "Concatenated string: $output.";
                break;

            case "substr":
                $output = substr($inputString, 6);
                $explanation = "Substring starting from index 6: $output.";
                break;
        }
        if ($method !== "explode") {
            echo "<h2>Result:</h2>";
            echo "<p>$explanation</p>";
        }
    }
    ?>
</body>
</html>
