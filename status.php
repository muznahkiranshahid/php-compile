<!-- Status Page: status.php -->
<?php
session_start();
include("conn.php");

$id = $_GET['id'] ?? '';
$query = mysqli_query($connection, "SELECT * FROM crud WHERE id = '$id' AND product IS NOT NULL");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* [style section unchanged] */
    </style>
</head>
<body>
    <a href="login.php" class="logout-button">Logout</a>
    <h1>Order Status</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$query) {
                echo "<tr><td colspan='5'>Error fetching data: " . mysqli_error($connection) . "</td></tr>";
            } elseif (mysqli_num_rows($query) === 0) {
                echo "<tr><td colspan='5'>No orders found.</td></tr>";
            } else {
                while ($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['product']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo ucfirst(htmlspecialchars($row['status'] ?? 'pending')); ?></td>
                    </tr>
                <?php endwhile;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
