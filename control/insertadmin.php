<?php
require_once 'connection.php';
$email="admin@gmail.com";
$password="admin123";
$passwordhash=password_hash($password,PASSWORD_DEFAULT);

$sql="insert into admin (email,password) values('$email','$passwordhash') ";
if ($conn->query($sql) === TRUE) {
 
   echo "success !";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

