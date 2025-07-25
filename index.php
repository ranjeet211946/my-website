<?php
session_start();

$insert = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Collect form data
    $Name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    // Validation
    if (!preg_match("/^[A-Za-z][A-Za-z ]+$/", $Name)) {
        die("Invalid name");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("Invalid phone number");
    }

    // Insert into database
    $sql = "INSERT INTO `trip`.`trip_data` (`Name`, `Father Name`, `Mother Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`)
            VALUES ('$Name', '$fname', '$mname', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if ($con->query($sql) === true) {
        // ✅ Set the flash message and redirect
        $_SESSION['flash_message'] = "Thanks for submitting your form. We are happy to see you joining us for the US trip.";
        header("Location: index.php");
        exit();
    }

    $con->close();
}

// Check for flash message
$flash = "";
if (isset($_SESSION['flash_message'])) {
    $flash = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Travel Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .submitmsg {
            color: green;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <img src="iit.png" alt="IIT Jodhpur" class="bg">
    <div class="container">
        <h1>Welcome to IIT Jodhpur US Trip Form</h1>
        <p>Enter your details to confirm your participation in the trip</p>

        <!-- ✅ Flash message shows after each successful submit -->
        <?php if ($flash): ?>
            <p class="submitmsg"><?= htmlspecialchars($flash) ?></p>
        <?php endif; ?>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter your name" required pattern="[A-Za-z][A-Za-z ]+">
            <input type="text" name="fname" placeholder="Enter father name" required pattern="[A-Za-z][A-Za-z ]+">
            <input type="text" name="mname" placeholder="Enter mother name" required pattern="[A-Za-z][A-Za-z ]+">
            <input type="text" name="age" placeholder="Enter your Age" required pattern="[0-9]{1,2}">
            <input type="text" name="gender" placeholder="Enter your gender" required pattern="male|female|other">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="tel" name="phone" placeholder="Enter your phone number" required pattern="[0-9]{10}">
            <textarea name="desc" rows="5" cols="5" placeholder="Enter any other information here" required></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
