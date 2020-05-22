<?php 
//conect to database
//mysqli to connect to database
$conn = mysqli_connect('localhost:8889', 'hiro', '1129daNE029', 'WVCC');
//loacalhost:port number , id, pw, database name

// check connection
if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}

?>