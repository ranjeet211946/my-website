<!-- 
    /* <?php 
    $insert=false;
    if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password );
    if(!$con){
        die("Connection to this database failed due to".mysqli_connect_error());
    }
    // echo "success connecing to the db";
    $Name=$_POST['name'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
     $desc=$_POST['desc'];
   $sql="INSERT INTO `trip`.`trip_data` ( `Name`, `Father Name`, `Mother Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`)
         VALUES ( '$Name', '$fname', '$mname', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
        //  echo $sql;
         if($con->query($sql)==true){
            $insert= true;
            // echo "successfully inserted";
         }
         else{
            echo "ERROR: $sql<br>$con->error";

         }
        //  
        
        $con->close();
    }
     ?>  -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="iit.png" alt=" IIT Jodhpur"  class="bg">
    <div class="container">
        <h1>Welcome to IIT Jodhpur Us Trip Form</h1>
        <p>Enter your details to confirm your  participation  in the trip</p>
        <?php 
        if($insert == true){
        echo"<p class='submitmsg'>Thanks for submitting your form. We are happy to see you joining us for the Us trip </p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="ID" placeholder="Enter your name">
            <input type="text" name="fname" id="fname" placeholder="Enter father name">
            <input type="text" name="mname" id="mname" placeholder="Enter mother name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" rows="05" cols="05" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button  class="btn"type="reset">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>



<!-- <?php 
$insert = false;
if (isset($_POST['name'])) {
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    // createa database connection
    $con = mysqli_connect($server, $username, $password);
    // Check for connection success
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
// echo "success connecting to the database";
// collect post variables
    $Name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip_data` (`Name`, `Father Name`, `Mother Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) 
            VALUES ('$Name', '$fname', '$mname', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        // echo $sql
        // Excute the query
    if ($con->query($sql) === true) {
        // flag for successfull insertion
        $insert = true;
    }
//   close the database connection
    $con->close();

if ($insert) {
    echo "<script>
        window.onload = function() {
            document.getElementById('successMsg').style.display = 'block';
        }
    </script>";
}
// checking for format latter 
if (!preg_match("/^[A-Za-z][A-Za-z ]+$/", $Name)) {
    die("Invalid name");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}
if (!preg_match("/^[0-9]{10}$/", $phone)) {
    die("Invalid phone number");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="iit.png" alt=" IIT Jodhpur"  class="bg">
    <div class="container">
        <h1>Welcome to IIT Jodhpur Us Trip Form</h1>
        <p>Enter your details to confirm your  participation  in the trip</p>
        <p id="successMsg" class="submitmsg" style="display: none;">
              Thanks for submitting your form. We are happy to see you joining us for the Us trip.
        </p>
        <?php
        // This is without javascript code 
        // if ($insert) {
        //  echo"<p id='successMsg' class='submitmsg' style='display: none;'>
        //     Thanks for submitting your form. We are happy to see you joining us for the Us trip.
        // </p>";
        // }
        // This is javascript using code 
                echo "<script>
    window.onload = function() {
        document.getElementById('successMsg').style.display = 'block';
               }
           </script>";
    // if ($insert) {
    //     echo "<p class='submitmsg'>Thanks for submitting your form. We are happy to see you joining us for the Us trip</p>";
    // }
    ?>
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
    <script src="index.js"></script>
</body>
</html> -->

<?php 
$insert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    
    // create database connection
    $con = mysqli_connect($server, $username, $password);
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // collect post variables
    $Name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    // validation
    if (!preg_match("/^[A-Za-z][A-Za-z ]+$/", $Name)) {
        die("Invalid name");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("Invalid phone number");
    }

    // insert query
    $sql = "INSERT INTO `trip`.`trip_data` (`Name`, `Father Name`, `Mother Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) 
            VALUES ('$Name', '$fname', '$mname', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    
    if ($con->query($sql) === true) {
        $insert = true;
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="iit.png" alt=" IIT Jodhpur"  class="bg">
    <div class="container">
        <h1>Welcome to IIT Jodhpur Us Trip Form</h1>
        <p>Enter your details to confirm your  participation  in the trip</p>
        <p id="successMsg" class="submitmsg" style="display: none;">
              Thanks for submitting your form. We are happy to see you joining us for the Us trip.
        </p>
<?php if ($insert): ?>
    <p class="submitmsg">
        Thanks for submitting your form. We are happy to see you joining us for the Us trip.
    </p>
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
    <script src="index.js"></script>
</body>
</html> 
    <?php 
$insert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Form data
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

    // SQL query
    $sql = "INSERT INTO `trip`.`trip_data` (`Name`, `Father Name`, `Mother Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) 
            VALUES ('$Name', '$fname', '$mname', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if ($con->query($sql) === true) {
        // ✅ Redirect after successful form submission
        header("Location: index.php?submitted=true");
        exit();
    }

    $con->close();
}

// ✅ Check if redirected with success
if (isset($_GET['submitted']) && $_GET['submitted'] == 'true') {
    $insert = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="iit.png" alt="IIT Jodhpur" class="bg">
    <div class="container">
        <h1>Welcome to IIT Jodhpur US Trip Form</h1>

        <!-- ✅ Show only after successful submission -->
        <?php if ($insert): ?>
            <p class="submitmsg" style="color: green; font-weight: bold;">
                 Thanks for submitting your form. We are happy to see you joining us for the US trip.
            </p>
        <?php endif; ?>

        <p>Enter your details to confirm your participation in the trip</p>

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
