<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <?php
            echo "Hello, World! its php";

            ?> -->

    <!-- <h2>Contact Form</h2>
    <form action="formhandling.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="subject">Subject:</label><br>
        <select id="subject" name="subject">
            <option selected disabled value="">-- Select a subject --</option>
            <option value="general">General Inquiry</option>
            <option value="support">Technical Support</option>
            <option value="billing">Billing Question</option>
            <option value="feedback">Feedback</option>
            <option value="other">Other</option>
        </select><br><br>


        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="30"></textarea><br><br>

        <input type="submit" value="Submit">
    </form> -->





    <?php

    $nameErr = $emailErr = $phoneErr = $ageErr = $passwordErr = $websiteErr = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' )
    // && ($_POST['form_type'] ?? '') == 'user_form') 
    {
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
    } ?>


    <!-- <form method="POST" action="validate.php"> -->
    <form method="POST" action="">
        <h3>Simple Form</h3>
        <input type="hidden" name="form_type" value="user_form">

        <!-- Name -->
        <input type="text" name="name" placeholder="Name">
        <span style="color:red;"><?php echo $nameErr; ?></span>

        <!-- Email -->
        <input type="email" name="email" placeholder="Email">
        <span style="color:red;"><?php echo $emailErr; ?></span>

        <!-- Phone -->
        <input type="tel" name="phone" placeholder="Phone">
        <span style="color:red;"><?php echo $phoneErr; ?></span>

        <!-- Age -->
        <input type="number" name="age" placeholder="Age">
        <span style="color:red;"><?php echo $ageErr; ?></span>

        <!-- Password -->
        <input type="password" name="password" placeholder="Password">
        <span style="color:red;"><?php echo $passwordErr; ?></span>

        <!-- Website -->
        <input type="url" name="website" placeholder="Website">
        <span style="color:red;"><?php echo $websiteErr; ?></span>

        <button type="submit">Submit</button>
    </form>



</body>

</html>