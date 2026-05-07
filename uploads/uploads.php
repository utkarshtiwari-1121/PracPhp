<?php


// print_r($_FILES['image']);
$path = $_FILES['image']['name'];
echo $path;
$upload_path = $path;
if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
    echo "File uploaded successfully";
} else {
    echo "File upload failed";
}
?>