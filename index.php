<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome - Order System</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #111;
      color: #fff;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
      max-width: 600px;
    }

    h1 {
      font-size: 36px;
      color: #00eaff;
      margin-bottom: 15px;
    }

    p {
      font-size: 18px;
      color: #ccc;
      margin-bottom: 30px;
    }

    .btn {
      display: inline-block;
      padding: 14px 28px;
      margin: 10px;
      border: none;
      border-radius: 10px;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      color: #fff;
      background: linear-gradient(45deg, #ff416c, #ff4b2b);
      transition: all 0.3s ease-in-out;
      box-shadow: 0 0 12px rgba(255, 65, 108, 0.6);
    }

    .btn:hover {
      background: linear-gradient(45deg, #ff4b2b, #ff416c);
      box-shadow: 0 0 20px rgba(0, 234, 255, 0.9);
      transform: scale(1.05);
    }

    .note {
      margin-top: 25px;
      font-size: 15px;
      color: #aaa;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome to Order System</h1>
    <p>A simple project with Registration, Login, Order Placement, and an Admin Panel.</p>

    <a href="register.php" class="btn">Register</a>
    <a href="login.php" class="btn">Login</a>
    <a href="order.php" class="btn">Place Order</a>
    <a href="admin.php" class="btn">Admin Panel</a>

    <p class="note">Use the above options to explore the system.</p>
  </div>
</body>
</html>
