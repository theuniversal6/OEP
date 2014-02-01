<?php
$db_conx = mysqli_connect("127.0.0.1", "root", "", "online_education_portal");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}
?>