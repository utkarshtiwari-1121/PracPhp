    <?php
session_start();
    $nameErr = $emailErr = $phoneErr = $ageErr = $passwordErr = $websiteErr = "";
    $hasError = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['name'])) {
            $nameErr = "Name is required";
            $_SESSION['nameErr'] = $nameErr;
            $hasError = true;
        }

        if (empty($_POST['email'])) {
            $emailErr = "Email is required";
            $_SESSION['emailErr'] = $emailErr;
            $hasError = true;
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $_SESSION['emailErr'] = $emailErr;
            $hasError = true;
        }

        if (empty($_POST['phone'])) {
            $phoneErr =  "Phone number is required";
            $_SESSION['phoneErr'] = $phoneErr;
            $hasError = true;
        } else if (!preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
            $phoneErr = "Invalid phone number";
            $_SESSION['phoneErr'] = $phoneErr;
            $hasError = true;
        }

        if (empty($_POST['age'])) {
            $ageErr = "Age is required";
            $_SESSION['ageErr'] = $ageErr;
            $hasError = true;
        } else if (!filter_var($_POST['age'], FILTER_VALIDATE_INT)) {
            $ageErr = "Invalid age";
            $_SESSION['ageErr'] = $ageErr;
            $hasError = true;
        }

        if (empty($_POST['password'])) {
            $passwordErr = "Password is required";
            $_SESSION['passwordErr'] = $passwordErr;
            $hasError = true;
        } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/", $_POST['password'])) {
            $passwordErr = "Password must be at least 8 characters and include uppercase, lowercase, and special character";
            $_SESSION['passwordErr'] = $passwordErr;
            $hasError = true;
        }

        if (empty($_POST['website'])) {
            $websiteErr = "Website is required";
            $_SESSION['websiteErr'] = $websiteErr;
            $hasError = true;
            
        } 
       else if (!filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid URL";
            $_SESSION['websiteErr'] = $websiteErr;
            $hasError = true;
        }

        if ($hasError) {
            header("Location: index.php");
            $_SESSION['old'] = $_POST; 
            exit;
        }

        unset(
            $_SESSION['nameErr'],
            $_SESSION['emailErr'],
            $_SESSION['phoneErr'],
            $_SESSION['ageErr'],
            $_SESSION['passwordErr'],
            $_SESSION['websiteErr'],
            $_SESSION['old']
        );
        header("Location: index.php?success=1");
        exit;
    } ?>

<!-- hi there my name is utkarhs
hi there my name is utkarhs
hi there my name is utkarhs -->