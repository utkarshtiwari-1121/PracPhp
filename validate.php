<?php
header('Content-Type: application/json');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($_POST['phone'])) {
        $errors['phone'] = 'Phone number is required';
    } elseif (!preg_match('/^[0-9]{10}$/', $_POST['phone'])) {
        $errors['phone'] = 'Invalid phone number';
    }

    if (empty($_POST['age'])) {
        $errors['age'] = 'Age is required';
    } elseif (!filter_var($_POST['age'], FILTER_VALIDATE_INT)) {
        $errors['age'] = 'Invalid age';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/', $_POST['password'])) {
        $errors['password'] = 'Password must be at least 8 characters and include uppercase, lowercase, and special character';
    }

    if (empty($_POST['website'])) {
        $errors['website'] = 'Website is required';
    } elseif (!filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
        $errors['website'] = 'Invalid URL';
    }

    $allowed = array('jpg', 'jpeg', 'png');
    $fileExt = explode('.', $_FILES['image']['name']);
    $fileAExt = strtolower(end($fileExt));
    if (!isset($_FILES['image'])) {
        $errors['image'] = 'Image file is required';
    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) { //image is the file name in the form
        $errors['image'] = 'Upload error code: ' . $_FILES['image']['error'];
    } elseif (!in_array($fileAExt, $allowed)) {
        $errors['image'] = 'Invalid file type. Only JPG, JPEG, PNG allowed';
    } elseif ($_FILES['image']['size'] > 2097152) { //2MB in bytes
        $errors['image'] = 'File size exceeds 2MB limit';
    }

    if (!empty($errors)) {
        echo json_encode([
            'status' => 'error',
            'errors' => $errors
        ]);
        exit();
    }

    $filename = basename($_FILES['image']['name']);
    $uploadDir = __DIR__ . '/uploads/';
    // if (!is_dir($uploadDir)) {f
    //     mkdir($uploadDir, 0755, true);
    // }
    $uploadPath = $uploadDir . $filename;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
    // if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
    //     echo json_encode([
    //         'status' => 'error',
    //         'errors' => [
    //             'image' => 'File upload failed. Check permissions and path.'
    //         ]
    //     ]);
    //     exit();
    // }

    echo json_encode([
        'status' => 'success',
        'message' => 'Form submitted successfully'
    ]);
    exit();
}

echo json_encode([
    'status' => 'error',
    'errors' => ['general' => 'Invalid request method']
]);
