<?php
$error = $_FILES['my_file']['error'];

if ($error !== UPLOAD_ERR_OK) {
    echo 'File upload error!';
    die();
}

if (!is_dir('storage/www')) {
    mkdir('storage/www', 0777);
}

$fileName = $_POST['filename'];
$fileTmpPath = $_FILES['my_file']['tmp_name'];
$fileInfo = pathinfo($_FILES['my_file']['name']);
$fileExt = $fileInfo['extension'];
$fileStoragePath = sprintf('storage/www/%s', $fileName . '.' . $fileExt);

move_uploaded_file($fileTmpPath, $fileStoragePath);

echo 'File uploaded successfully!';

header("refresh:2;url=5exercise.php");

