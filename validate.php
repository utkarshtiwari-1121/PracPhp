   <?php
    session_start();
    $nameErr = $emailErr = $phoneErr = $ageErr = $passwordErr = $websiteErr = "";
    $hasError = false;
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
            // $_SESSION['nameErr'] = $nameErr;
            $errors['name'] = $nameErr;
            $hasError = true;
        }

        if (empty($_POST['email'])) {
            $emailErr = "Email is required";
            // $_SESSION['emailErr'] = $emailErr;
            $errors['email'] = $emailErr;
            $hasError = true;
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            // $_SESSION['emailErr'] = $emailErr;
            $errors['email'] = $emailErr;
            $hasError = true;
        }

        if (empty($_POST['phone'])) {
            $phoneErr =  "Phone number is required";
            // $_SESSION['phoneErr'] = $phoneErr;
            $errors['phone'] = $phoneErr;
            $hasError = true;
        } else if (!preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
            $phoneErr = "Invalid phone number";
            // $_SESSION['phoneErr'] = $phoneErr;
            $errors['phone'] = $phoneErr;
            $hasError = true;
        }

        if (empty($_POST['age'])) {
            $ageErr = "Age is required";
            // $_SESSION['ageErr'] = $ageErr;
            $errors['age'] = $ageErr;
            $hasError = true;
        } else if (!filter_var($_POST['age'], FILTER_VALIDATE_INT)) {
            $ageErr = "Invalid age";
            // $_SESSION['ageErr'] = $ageErr;
            $errors['age'] = $ageErr;
            $hasError = true;
        }

        if (empty($_POST['password'])) {
            $passwordErr = "Password is required";
            // $_SESSION['passwordErr'] = $passwordErr;
            $errors['password'] = $passwordErr;
            $hasError = true;
        } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/", $_POST['password'])) {
            $passwordErr = "Password must be at least 8 characters and include uppercase, lowercase, and special character";
            // $_SESSION['passwordErr'] = $passwordErr;
            $errors['password'] = $passwordErr;
            $hasError = true;
        }

        if (empty($_POST['website'])) {
            $websiteErr = "Website is required";
            // $_SESSION['websiteErr'] = $websiteErr;
            $errors['website'] = $websiteErr;
            $hasError = true;
        } else if (!filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL";
            // $_SESSION['websiteErr'] = $websiteErr;
            $errors['website'] = $websiteErr;
            $hasError = true;
        }

        if ($hasError || !empty($errors)) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'errors' => $errors
            ]);
            exit();
        }

        header('Content-Type: application/json');
        echo json_encode([
            "status" => "success",
            "message" => "Form submitted successfully"
        ]);
        exit();
    } ?>