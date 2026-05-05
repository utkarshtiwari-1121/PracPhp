<?php

$nameErr = $emailErr = $phoneErr = $ageErr = $passwordErr = $websiteErr = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($_POST['phone'])) {
        $phoneErr =  "Phone number is required";
    } else if (!preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
        $phoneErr = "Invalid phone number";
    }

    if (empty($_POST['age'])) {
        $ageErr = "Age is required";
    } else if (!filter_var($_POST['age'], FILTER_VALIDATE_INT)) {
        $ageErr = "Invalid age";
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{8,}$/", $_POST['password'])) {
        $passwordErr = "Password must be at least 8 characters and include uppercase, lowercase, and special character";
    }

    if (empty($_POST['website'])) {
        $websiteErr = "Website is required";
    } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['website'])) {
        $websiteErr = "Invalid URL";
    }
    // header("Location: index.php");
}
