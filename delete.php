<?php
if (isset($_GET["id"] ) ) {
    $id = $_GET["id"];
    
    $servername = "localhost" ;
    $username = "root" ;
    $password = "";
    $database = "datapekerja" ;

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM pekerja WHERE id=$id";
    $connection->query($sql);
    
}

header("location:/anisholding/index.php");
exit;
?>