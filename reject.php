<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    $query = "DELETE FROM crud WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "
        <script>
        window.location.href='admin.php';
        </script>
        ";
    } else {
        echo "Error: ".mysqli_error($connection);
    }
}
?>
