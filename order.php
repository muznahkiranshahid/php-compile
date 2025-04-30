<?php
session_start();
include("conn.php");

$products = ["Laptop", "Mobile", "Tablet", "Smartwatch", "Headphones", "Monitor", "Keyboard", "Mouse", "Printer", "Camera"];

$username = $_SESSION['username'] ?? '';
$query = mysqli_query($connection, "SELECT * FROM crud WHERE name = '$username' ORDER BY id DESC LIMIT 1");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: #111;
            background-image: radial-gradient(circle at top left, #333, #111);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }
        header {
            width: 100%;
            max-width: 600px;
            background-color: #1c1c1c;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            border: 1px solid #2c2c2c;
        }
        header div.id {
            font-size: 20px;
            font-weight: bold;
            color: #aaa;
        }
        header div.name {
            font-size: 32px;
            font-weight: bold;
            color: #00eaff;
        }
        form {
            width: 100%;
            max-width: 600px;
            background-color: #1c1c1c;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
            border: 1px solid #2c2c2c;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #ccc;
            font-size: 20px;
            font-weight: bold;
        }
        input[type="number"], select {
            width: 100%;
            padding: 16px;
            margin-bottom: 25px;
            border: none;
            border-radius: 6px;
            background-color: #2a2a2a;
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
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background: linear-gradient(to right, #0072ff, #00eaff);
            transform: scale(1.03);
        }
        .logout-button {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(to right, #ff4b2b, #ff416c);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
}

.logout-button:hover {
    background: linear-gradient(to right, #ff416c, #ff4b2b);
}

    </style>
</head>
<body>
    <header>
        <div class="id">ID: <?php echo $user['id'] ?? 'N/A'; ?></div>
        <div class="name">Welcome, <?php echo $user['name'] ?? 'Guest'; ?>!</div>
    </header>

    <form method="POST">
    <a href="login.php" class="logout-button">Logout</a>
        <label for="product">Select Product</label>
        <select name="product" id="product" required>
            <option value="">-- Choose a Product --</option>
            <?php foreach ($products as $item): ?>
                <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1" required>

        <button type="submit" name="btnorder">Place Order</button>
    </form>

<?php
if (isset($_POST['btnorder'])) {
    $product = mysqli_real_escape_string($connection, $_POST['product']);
    $quantity = (int)$_POST['quantity'];
    $name = $_SESSION['username'] ?? ''; // Get the logged-in user's name

    // Insert the order into the database
    $query = "INSERT INTO crud (name, product, quantity) VALUES ('$name', '$product', $quantity)";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Order placed successfully!',
                icon: 'success',
                background: '#1c1c1c',
                color: '#fff',
                confirmButtonColor: '#00eaff',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'order.php?name=" . urlencode($name) . "';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Order failed! Please try again.',
                icon: 'error',
                background: '#1c1c1c',
                color: '#fff',
                confirmButtonColor: '#00eaff',
                confirmButtonText: 'Retry'
            });
        </script>";
    }
    
}
?>
</body>
</html>
