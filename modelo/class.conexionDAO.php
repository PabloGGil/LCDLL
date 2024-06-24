<?php
//phpinfo();
 function conectar(){
    $mysqli = mysqli_connect("localhost", "root", "", "pokemon");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    echo $mysqli->host_info . "\n";
    return $mysqli;
}

// $servername = "localhost";
// $database = "alavino";
// $username = "root";
// //$password = "mysql";
// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $database);
// // Check connection
// if (!$conn) {
// die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
// mysqli_close($conn);
