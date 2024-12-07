<?php
$targetDir = "uploads/"; // Directory to store uploaded files
$targetFile = $targetDir . basename($_FILES["userfile"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if file is a valid type
$allowedTypes = ['html', 'css', 'js', 'java', 'py', 'txt'];
if (!in_array($fileType, $allowedTypes)) {
    echo "Sorry, only HTML, CSS, JavaScript, Java, Python, and text files are allowed.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if file size is within the limit (max 10MB)
if ($_FILES["userfile"]["size"] > 10485760) { // 10MB limit
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["userfile"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
