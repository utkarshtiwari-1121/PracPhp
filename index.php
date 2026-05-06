<?php
// session_start();
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
    <form method="POST" id="myForm">
        <h3>Simple Form</h3>


        <input type="text" name="name" value=""
            placeholder="Name">
        <span id="nameErr" style="color:red;"></span>



        <input type="email" name="email" value="" placeholder="Email">
        <span id="emailErr" style="color:red;"></span>


        <input type="tel" name="phone" value="" placeholder="Phone">
        <span id="phoneErr" style="color:red;"></span>


        <input type="number" name="age" value="" placeholder="Age">
        <span id="ageErr" style="color:red;"></span>
        <input type="password" name="password" value="" placeholder="Password">
        <span id="passwordErr" style="color:red;"></span>


        <input type="url" name="website" value="" placeholder="Website">
        <span id="websiteErr" style="color:red;"></span>

        <button type="submit">Submit</button>
    </form>

    <?php
    ?>

</body>

</html>