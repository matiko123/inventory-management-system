<?php
include 'connection.php';
$email=$_POST['email'];
$passwd=$_POST['password'];

include 'connection.php';

// Fetch the hashed password from the database
$query = "SELECT * FROM admin where email='$email' and role=2";
$result = mysqli_query($conn, $query);

if ($result) {
    // If the query was successful
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password_from_db = $row['password'];
        $id=$row['id'];
        // Verify the password
        $entered_password = $passwd;
        if (password_verify($entered_password, $hashed_password_from_db)) {
            echo "<script>window.location.href='../user/dashboard.php?id=$id'</script>";
        } else {
            echo "Password does not match!\n";
        }
    } else {
        echo "No user found with the specified username.\n";
    }
} else {
    // If the query failed
    echo "Error fetching password from database: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
