<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Employee Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f8;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Employee Form</h1>
    <form method="POST">
        <input type="number" name="empid" placeholder="Enter ID"><br>
        <input type="text" name="empname" placeholder="Enter Name"><br>
        <input type="number" name="empage" placeholder="Enter Age"><br>
        <input type="number" name="empsalary" placeholder="Enter Salary"><br>
        <input type="submit" value="Insert Data" name="btninsert">
    </form>

<?php
include('conn.php');

    if (isset($_POST['btninsert'])) {
        $id = $_POST['empid'];
        $name = $_POST['empname'];
        $age = $_POST['empage'];
        $salary = $_POST['empsalary'];
   
        $query = "INSERT INTO crud VALUES($id,'$name',$age ,$salary)";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo "<script>alert('Data inserted')</script>";
        }
    }

?>
</body>
</html>