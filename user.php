<?php 

session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Application</title>
</head>
<body>
    <div class="header">
        <h2>Register</h2>
        <form>
            <div class="input">
                <label>User Name</label>
                <input type="text" name="user name">
            </div>
            <div class="input">
                <label>email i'd</label>
                <input type="text" name="email id">
            </div>
            <div class="input">
                <label>Type password</label>
                <input type="text" name="Type password">
            </div>
            <div class="input">
                <label>confirm password</label>
                <input type="text" name="confirm password">
            </div>
            <div class="input">
                <button type="submit" name="Register" class="button">Register</button>
                
            </div>
        </form>
    </div>

    <?php
    $user= $conn->query("SELECT * FROM user");
    
    ?>
</body>
</html>
    <?php

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "userPage";
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    if (isset($_POST['submit'])) {

        try {
            $conn = new PDO("mysql:host=localhost;dbname=Registration", $username, $pass);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $sqlQuery = "insert into user(first_name,last_name,email,contact,password) values('$first_name', '$last_name', '$email', '$contact','$password')";
        $sql = $conn->query($sqlQuery);
        if ($sql) {
            echo 'log in successful';
        } else {
            echo 'Failed';
        }
    }
    if (isset($_POST['login'])) {

        $loginemail = $_POST['email'];
        $loginpassword = $_POST['loginpassword'];
        $_SESSION["loginemail"] = $loginemail;
        $_SESSION["loginpassword"] = $loginpassword;

     

            try {
                $conn = new PDO("mysql:host=localhost;dbname=Registration", $username, $pass);
                $sql = $conn->query("SELECT * FROM user WHERE email='$loginemail' and password =$loginpassword");

                $record = $sql->fetch(PDO::FETCH_NUM);
                for ($i = 1; $i < 6; $i++) {
                    echo "<br>" . $record[$i] . "  ";
                }
                echo "<br>for Edit in profile <br> click here <a
                  href='edit.php'> edit</a>";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    