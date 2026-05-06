<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script src="script.js" defer></script>
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





    <!-- <form method="POST" action="validate.php">     <form method="POST" action="validate.php" id= "myForm">-->
    <form method="POST" id= "myForm">
        <h3>Simple Form</h3>


        <input type="text" name="name" value="<?php echo $_SESSION['old']['name'] ?? ''; ?>"
            placeholder="Name">
        <span id="nameErr" style="color:red;"><?php echo $_SESSION['nameErr']; ?></span>



        <input type="email" name="email" value="<?php echo $_SESSION['old']['email'] ?? ''; ?>" placeholder="Email">
        <span id="emailErr" style="color:red;"><?php echo $_SESSION['emailErr']; ?></span>


        <input type="tel" name="phone" value="<?php echo $_SESSION['old']['phone'] ?? ''; ?>" placeholder="Phone">
        <span id="phoneErr" style="color:red;"><?php echo $_SESSION['phoneErr']; ?></span>


        <input type="number" name="age" value="<?php echo $_SESSION['old']['age'] ?? ''; ?>" placeholder="Age">
        <span id="ageErr" style="color:red;"><?php echo $_SESSION['ageErr']; ?></span>
        <input type="password" name="password" value="<?php echo $_SESSION['old']['password'] ?? ''; ?>" placeholder="Password">
        <span id="passwordErr" style="color:red;"><?php echo $_SESSION['passwordErr']; ?></span>


        <input type="url" name="website" value="<?php echo $_SESSION['old']['website'] ?? ''; ?>" placeholder="Website">
        <span id="websiteErr" style="color:red;"><?php echo $_SESSION['websiteErr']; ?></span>

        <button type="submit">Submit</button>
    </form>

    <?php
    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //     unset(
    //         $_SESSION['nameErr'],
    //         $_SESSION['emailErr'],
    //         $_SESSION['phoneErr'],
    //         $_SESSION['ageErr'],
    //         $_SESSION['passwordErr'],
    //         $_SESSION['websiteErr'],
    //         $_SESSION['old']
    //     );
    // }

    // if (isset($_GET['success'])) {
    //     echo "<script>alert('Form submitted successfully!');</script>";
    // }
    ?>

</body>

</html>