<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Image and CV Uploader</title>
</head>
<body>
    <div class="container">
        <h1>Upload Image and CV</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file">Image:</label>
            <input type="file" name="file" accept="image/*" required><br><br>
            <label for="cv">CV (PDF):</label>
            <input type="file" name="cv" accept=".pdf" required><br><br>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>
