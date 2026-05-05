<?php

// var_dump($_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // echo "All fields are required.";
        //     header("Location: index.php");

        header("Location: index.php?error=All fields are required");
        exit();


        // exit();
    }

    echo "<h2>Form Submission Received these are the data theat user submitted </h2>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Subject: " . $subject . "<br>";
    echo "Message: " . $message . "<br>";

    // header("Location: index.php");
} else {
    header("Location: index.php");
}
