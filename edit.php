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

   
</body>
</html>

<?php

if (isset($_POST['edit'])) {
    $loginemail = $_SESSION['loginemail'];
    $password = $_SESSION['loginpassword'];
    $newemail = $_POST['newmail'];
    $newcontact = $_POST['newcontact'];
    $newpass = $_POST['newpass'];
    $first_name = $_POST['firstname'];
    $username = "root";
    $pass = "";

    try {
        $conn = new PDO("mysql:host=localhost;dbname=Registration", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE user SET first_name='$first_name',email='$newemail',contact='$newcontact',password='$newpass' WHERE email='$loginemail' and password='$password'";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        echo $stmt->rowCount() . "Upadate sucessfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}