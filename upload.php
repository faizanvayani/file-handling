<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
    $cv = $_FILES['cv'];

    $uploadDir = 'uploads/';
    
    $fileName = basename($file['name']);
    $cvName = basename($cv['name']);
    
    $filePath = $uploadDir . $fileName;
    $cvPath = $uploadDir . $cvName;

    $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
    $cvType = pathinfo($cvPath, PATHINFO_EXTENSION);

    // Validate and upload image
    if (in_array($fileType, ['jpg', 'jpeg', 'png']) && move_uploaded_file($file['tmp_name'], $filePath)) {
        $stmt = $pdo->prepare("INSERT INTO uploads (filename, filetype) VALUES (?, ?)");
        $stmt->execute([$fileName, 'image']);
    }

    // Validate and upload CV
    if ($cvType == 'pdf' && move_uploaded_file($cv['tmp_name'], $cvPath)) {
        $stmt = $pdo->prepare("INSERT INTO uploads (filename, filetype) VALUES (?, ?)");
        $stmt->execute([$cvName, 'cv']);
    }

    header('Location: index.php');
    exit();
}
?>
