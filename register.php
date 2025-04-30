<?php
include('conn.php');  // Ensure this is pointing to the correct location of your conn.php

if (isset($_POST['btnregister'])) {
    // Collect form data
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    // Insert the new user into the database
    $query = "INSERT INTO crud (name, password) VALUES ('$name','$password' )";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location:./login.php");

        // echo "<script>alert('Registration successful! You can now login.');</script>";
    } else {
        echo "<script>alert('Registration failed! Please try again.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background-color: #1c1c1c;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 400px;
        }
        .register-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 32px;
            color: #00eaff;
        }
        label {
            color: #ccc;
            font-size: 18px;
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #2a2a2a;
            background-color: #333;
            color: #fff;
            font-size: 18px;
        }
        button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(to right, #00eaff, #0072ff);
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 20px;
        }
        button:hover {
            background: linear-gradient(to right, #0072ff, #00eaff);
        }
        .admin-link {
            text-align: center;
            margin-top: 20px;
        }
        .admin-link a {
            color: #00eaff;
            text-decoration: none;
            font-weight: bold;
        }
        .admin-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" name="btnregister">Register</button>
        </form>

        <!-- Admin Link -->
        <div class="admin-link">
            <p>Already an admin? <a href="login.php">Click here to access Admin Panel</a></p>
        </div>
    </div>
</body>
</html>
