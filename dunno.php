<?php
$imageUrl = '';
$submitted = false;

// Step 1: Image upload for preview
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tempDir = 'temp_uploads/';
    if (!is_dir($tempDir)) mkdir($tempDir, 0755, true);

    $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetPath = $tempDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $imageUrl = $targetPath;
    }
}



// Step 2: Form submitted — remove image
if (isset($_POST['submit']) && isset($_POST['image_path'])) {
    $submitted = true;
    $imageToDelete = $_POST['image_path'];
    if (file_exists($imageToDelete)) {
        unlink($imageToDelete);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Preview & Auto Delete</title>
</head>
<body>
    <h2>Upload Image</h2>

    <!-- Upload form -->
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" onchange="this.form.submit()">
        <!-- Form auto-submits to upload & show preview -->
    </form>

    <!-- Show preview and submit button if image is uploaded -->
    <?php if ($imageUrl && !$submitted): ?>
        <h3>Preview:</h3>
        <img src="<?= htmlspecialchars($imageUrl) ?>" style="max-width: 300px;" alt="Preview">

        <form method="POST">
            <input type="hidden" name="image_path" value="<?= htmlspecialchars($imageUrl) ?>">
            <button type="submit" name="submit">Send and Remove Image</button>
        </form>
    <?php elseif ($submitted): ?>
        <p style="color:green;">Image sent and removed successfully.</p>
    <?php endif; ?>
</body>
</html>
