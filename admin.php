<?php
include('conn.php');
session_start();


// Logout handler
if (isset($_GET['logout'])) {
    header("Location: login.php");
}

$query = "SELECT * FROM crud";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: 'Roboto', sans-serif;
            padding: 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logout-btn {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: linear-gradient(to right, #ff4b2b, #ff416c);
        }

        h1 {
            font-size: 32px;
            color: #00eaff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #222;
            color: #00eaff;
        }

        td {
            background-color: #1c1c1c;
        }

        a {
            color: #ff4b2b;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 15px;
            color: #ff6347;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Admin - Order Management</h1>
        <a href="?logout=true" class="logout-btn">Logout</a>
    </div>

    <?php
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        if ($status == 'rejected') {
            echo "<p class='message'>Order Rejected Successfully!</p>";
        } elseif ($status == 'error_reject') {
            echo "<p class='message'>Error Rejecting Order.</p>";
        }
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['product']}</td>";
                    echo "<td>{$row['quantity']}</td>";
                    echo "<td><a href='reject.php?id={$row['id']}'>Reject</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
